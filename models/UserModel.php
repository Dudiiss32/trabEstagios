<?php

namespace Model;

use Model\Database;
use Model\VO\UserVO;

final class UserModel extends Model
{
    public function selectAll($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM usuario WHERE isVisible = 1";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new UserVO(
                $row['id'],
                $row['login'],
                $row['senha'],
                $row['nivel'],
                $row['idEmpresa'],
                $row['idEstudante'],
                $row['idProfessor']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM usuario WHERE id = :id AND isVisible = 1";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new UserVO(
            $data[0]['id'],
            $data[0]['login'],
            $data[0]['senha'],
            $data[0]['nivel'],
            $data[0]['idEmpresa'],
            $data[0]['idEstudante'],
            $data[0]['idProfessor']
        );
    }

    public function insert($vo)
    {
        $db = new Database();
        $query = "INSERT INTO usuario (login, senha, nivel, idEmpresa, idEstudante, idProfessor, isVisible)
                    VALUES (:login, :senha, :nivel, :idEmpresa, :idEstudante, :idProfessor, 1)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idProfessor" => $vo->getIdProfessor(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Database();
        if (empty($vo->getSenha())) {
            $query = "UPDATE usuario SET login = :login, nivel = :nivel
                      WHERE id = :id AND isVisible = 1";

            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId(),
            ];
        } else {
            $query = "UPDATE usuario SET login = :login, senha = :senha, nivel = :nivel
                      WHERE id = :id AND isVisible = 1";
            $binds = [
                ":login" => $vo->getLogin(),
                ":senha" => md5($vo->getSenha()),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId(),
            ];
        }

        return $db->execute($query, $binds);
    }

    public function updatePassword($id, $password)
    {
        $db = new Database();
        $query = "UPDATE usuario SET senha = :senha
                    WHERE id = :id AND isVisible = 1";
        $binds = [
            ":senha" => md5($password),
            ":id" => $id,
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "UPDATE usuario SET isVisible = 0 WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM usuario
                WHERE login = :login AND senha = :senha AND isVisible = 1";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];

        $data = $db->select($query, $binds);

        if (count($data) == 0) {
            return null;
        }

        $_SESSION['usuario'] = new UserVO(
            $data[0]['id'],
            $data[0]['login'],
            $data[0]['senha'],
            $data[0]['nivel'],
            $data[0]['idEmpresa'],
            $data[0]['idEstudante'],
            $data[0]['idProfessor']
        );

        return $_SESSION['usuario'];
    }

    public function verificaEmail($email)
    {
        $db = new Database();
        $query = "SELECT u.*
                FROM usuario u
                LEFT JOIN professor p ON u.idProfessor = p.id
                LEFT JOIN estudante e ON u.idEstudante = e.id
                LEFT JOIN empresa em ON u.idEmpresa = em.id
                WHERE (p.email = :email OR e.email = :email OR em.email = :email) AND u.isVisible = 1
                LIMIT 1";

        $binds = [':email' => $email];
        $data = $db->select($query, $binds);

        if (!empty($data)) {
            return new UserVO(
                $data[0]['id'],
                $data[0]['login'],
                $data[0]['senha'],
                $data[0]['nivel'],
                $data[0]['idEmpresa'],
                $data[0]['idEstudante'],
                $data[0]['idProfessor']
            );
        }

        return $data;
    }

    public function updateRecoveryToken($userId, $token, $tokenExpiration)
    {
        $db = new Database();
        $query = "UPDATE usuario SET token_recuperacao = :token, token_expiracao = :token_expiracao WHERE id = :id AND isVisible = 1";
        $binds = [
            ":token" => $token,
            ":token_expiracao" => $tokenExpiration,
            ":id" => $userId,
        ];
        return $db->execute($query, $binds);
    }

    public function validateRecoveryToken($token)
    {
        $db = new Database();

        $query = "SELECT id, token_expiracao FROM usuario WHERE token_recuperacao = :token AND isVisible = 1";
        $binds = [":token" => $token];
        $data = $db->select($query, $binds);

        if (empty($data)) {
            return [
                'status' => false,
                'message' => 'Token de recuperação inválido.',
            ];
        }

        $tokenExpiration = $data[0]['token_expiracao'];
        $currentTime = date('Y-m-d H:i:s');

        if ($currentTime > $tokenExpiration) {
            return [
                'status' => false,
                'message' => 'O token de recuperação expirou.',
            ];
        }

        return [
            'status' => true,
            'userId' => $data[0]['id'],
        ];
    }
}
