<?php

namespace Model;

use Model\VO\CidadeVO;

final class CidadeModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidade WHERE isVisible = 1";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CidadeVO(
                $row["id"],
                $row["nome"],
                $row["cep"], 
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidade WHERE id = :id and isVisible = 1";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CidadeVO(
            $data[0]["id"],
            $data[0]["nome"],
            $data[0]["cep"],
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO cidade (nome, cep, isVisible) 
                  VALUES (:nome, :cep, 1)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":cep" => $vo->getCep(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE cidade 
                  SET nome = :nome, cep = :cep, isVisible = 1 WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":cep" => $vo->getCep(),
            ":id" => $vo->getId(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "UPDATE cidade 
                  SET isVisible = 0 WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
