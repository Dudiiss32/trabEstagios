<?php

namespace Model;

use Model\VO\EstudanteVO;

final class EstudanteModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Database();
        $query = "SELECT e.*, cu.nome as nomeCurso, ci.nome as nomeCidade
                  FROM estudante e
                  JOIN curso cu ON cu.id = e.idCurso
                  JOIN cidade ci ON ci.id = e.idCidade
                  WHERE e.isVisible = 1";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new EstudanteVO(
                $row["id"],
                $row["nome"],
                $row["matricula"],
                $row["idCurso"],
                $row["cpf"],
                $row["rg"],
                $row["idCidade"],
                $row["telefone"],
                $row["endereco"],
                $row["email"],
                $row["nomeCurso"],
                $row["nomeCidade"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM estudante WHERE id = :id AND isVisible = 1";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO(
            $data[0]["id"],
            $data[0]["nome"],
            $data[0]["matricula"],
            $data[0]["idCurso"],
            $data[0]["cpf"],
            $data[0]["rg"],
            $data[0]["idCidade"],
            $data[0]["telefone"],
            $data[0]["endereco"],
            $data[0]["email"]
        );
    }

    public function insert($vo)
    {
        $db = new Database();
        $query = "INSERT INTO estudante (nome, matricula, idCurso, cpf, rg, endereco, idCidade, telefone, email, isVisible)
                  VALUES (:nome, :matricula, :idCurso, :cpf, :rg, :endereco, :idCidade, :telefone, :email, 1)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":idCurso" => $vo->getIdCurso(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":endereco" => $vo->getEndereco(),
            ":idCidade" => $vo->getIdCidade(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
        ];

        $result = $db->execute($query, $binds);

        if ($result) {
            $lastId = $db->getLastInsertedId();
            return $this->selectOne(new EstudanteVO($lastId));
        }

        return false;
    }

    public function update($vo)
    {
        $db = new Database();
        $query = "UPDATE estudante
                  SET nome = :nome, matricula = :matricula, idCurso = :idCurso, cpf = :cpf, rg = :rg, endereco = :endereco, idCidade = :idCidade, telefone = :telefone, email = :email, isVisible = 1
                  WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":idCurso" => $vo->getIdCurso(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":endereco" => $vo->getEndereco(),
            ":idCidade" => $vo->getIdCidade(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
            ":id" => $vo->getId(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "UPDATE estudante
                  SET isVisible = 0 WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
