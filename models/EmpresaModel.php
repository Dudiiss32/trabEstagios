<?php

namespace Model;

use Model\VO\EmpresaVO;

final class EmpresaModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM empresa";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EmpresaVO(
                $row["id"], 
                $row["nome"], 
                $row["endereco"], 
                $row["cnpj"], 
                $row["representante"], 
                $row["numConvenio"], 
                $row["telefone"], 
                $row["email"], 
                $row["cpfRepresentante"], 
                $row["rgRepresentante"], 
                $row["funcaoRepresentante"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM empresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EmpresaVO(
            $data[0]["id"], 
            $data[0]["nome"], 
            $data[0]["endereco"], 
            $data[0]["telefone"], 
            $data[0]["email"], 
            $data[0]["cnpj"], 
            $data[0]["representante"], 
            $data[0]["cpfRepresentante"], 
            $data[0]["rgRepresentante"], 
            $data[0]["funcaoRepresentante"],            $data[0]["numConvenio"]
        );
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO empresa (nome, endereco, cnpj, representante, numConvenio, telefone, email, cpfRepresentante, rgRepresentante, funcaoRepresentante) 
                  VALUES (:nome, :endereco, :cnpj, :representante, :numConvenio, :telefone, :email, :cpfRepresentante, :rgRepresentante, :funcaoRepresentante)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":endereco" => $vo->getEndereco(),
            ":cnpj" => $vo->getCnpj(),
            ":representante" => $vo->getRepresentante(),
            ":numConvenio" => $vo->getNumConvenio(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
            ":cpfRepresentante" => $vo->getCpfRepresentante(),
            ":rgRepresentante" => $vo->getRgRepresentante(),
            ":funcaoRepresentante" => $vo->getFuncaoRepresentante(),
        ];

        $result = $db->execute($query, $binds);

        if ($result) {
            $lastId = $db->getLastInsertedId();
            return $this->selectOne(new EmpresaVO($lastId));
        }

        return false;
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE empresa 
                  SET nome = :nome, endereco = :endereco, cnpj = :cnpj, representante = :representante, numConvenio = :numConvenio, 
                      telefone = :telefone, email = :email, cpfRepresentante = :cpfRepresentante, rgRepresentante = :rgRepresentante, funcaoRepresentante = :funcaoRepresentante 
                  WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":endereco" => $vo->getEndereco(),
            ":cnpj" => $vo->getCnpj(),
            ":representante" => $vo->getRepresentante(),
            ":numConvenio" => $vo->getNumConvenio(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
            ":cpfRepresentante" => $vo->getCpfRepresentante(),
            ":rgRepresentante" => $vo->getRgRepresentante(),
            ":funcaoRepresentante" => $vo->getFuncaoRepresentante(),
            ":id" => $vo->getId(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM empresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
