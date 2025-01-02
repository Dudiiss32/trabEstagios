<?php

namespace Model;

use Model\VO\CursoVO;

final class CursoModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Database();
        $query = "SELECT c.*, p.nome as nomeOrientador FROM curso c JOIN professor p ON p.id = c.idOrientador WHERE c.isVisible = 1";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new CursoVO(
                $row["id"],
                $row["nome"],
                $row["idOrientador"],
                $row["emailOrientador"],
                $row["nomeOrientador"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM curso WHERE id = :id AND isVisible = 1";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CursoVO(
            $data[0]["id"],
            $data[0]["nome"],
            $data[0]["idOrientador"],
            $data[0]["emailOrientador"]
        );
    }

    public function insert($vo)
    {
        $db = new Database();
        $query = "INSERT INTO curso (nome, idOrientador, emailOrientador, isVisible)
                  VALUES (:nome, :idOrientador, :emailOrientador, 1)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":emailOrientador" => $vo->getEmailOrientador(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Database();
        $query = "UPDATE curso
                  SET nome = :nome, idOrientador = :idOrientador, emailOrientador = :emailOrientador, isVisible = 1 WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":emailOrientador" => $vo->getEmailOrientador(),
            ":id" => $vo->getId(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "UPDATE curso
                  SET isVisible = 0 WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
