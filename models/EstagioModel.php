<?php

namespace Model;

use Model\VO\EstagioVO;

final class EstagioModel extends Model
{

    public function selectAll($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM estagio";
        $data = $db->select($query);

        $arrayDados = [];

        foreach ($data as $row) {
            $vo = new EstagioVO($row["id"], $row["dataInicio"], $row["dataFinal"], $row["area"], $row["cargaHoraria"], $row["idEstudante"],
                $row["idOrientador"], $row["idEmpresa"], $row["representante"], $row["idCidade"], $row["idCoorientador"],
                $row["nomeSupervisor"], $row["cargoSupervisor"], $row["telefoneSupervisor"], $row["emailSupervisor"],
                $row["tipoProcesso"], $row["status"], $row["planoAtividades"], $row["relatorioFinal"], $row["autoavaliacaoEmpresa"],
                $row["autoavaliacao"], $row["termoCompromisso"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectAllInfo()
    {
        $db = new Database();
        $query = "SELECT
            estagio.*,
            cidade.nome AS nomeCidade,
            estudante.nome AS nomeEstudante,
            orientador.nome AS nomeOrientador,
            empresa.nome AS nomeEmpresa,
            coorientador.nome AS nomeCoorientador
          FROM estagio
          LEFT JOIN cidade ON estagio.idCidade = cidade.id
          LEFT JOIN estudante ON estagio.idEstudante = estudante.id
          LEFT JOIN professor AS orientador ON estagio.idOrientador = orientador.id
          LEFT JOIN professor AS coorientador ON estagio.idCoorientador = coorientador.id
          LEFT JOIN empresa ON estagio.idEmpresa = empresa.id";

        $data = $db->select($query);

        $arrayDados = [];
        foreach ($data as $row) {
            $vo = new EstagioVO($row["id"], $row["dataInicio"], $row["dataFinal"], $row["area"], $row["cargaHoraria"], $row["idEstudante"],
                $row["idOrientador"], $row["idEmpresa"], $row["representante"], $row["idCidade"], $row["idCoorientador"],
                $row["nomeSupervisor"], $row["cargoSupervisor"], $row["telefoneSupervisor"], $row["emailSupervisor"],
                $row["tipoProcesso"], $row["status"], $row["planoAtividades"], $row["relatorioFinal"], $row["autoavaliacaoEmpresa"],
                $row["autoavaliacao"], $row["termoCompromisso"], $row["nomeCidade"], $row['nomeEstudante'], $row["nomeOrientador"], $row["nomeEmpresa"], $row["nomeCoorientador"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectAllByUser($userId, $userType)
    {
        $db = new Database();
        $query = "SELECT estagio.*, cidade.nome AS nomeCidade, estudante.nome AS nomeEstudante, orientador.nome AS nomeOrientador, empresa.nome AS nomeEmpresa, coorientador.nome AS nomeCoorientador FROM estagio LEFT JOIN cidade ON estagio.idCidade = cidade.id LEFT JOIN estudante ON estagio.idEstudante = estudante.id LEFT JOIN professor AS orientador ON estagio.idOrientador = orientador.id LEFT JOIN professor AS coorientador ON estagio.idCoorientador = coorientador.id LEFT JOIN empresa ON estagio.idEmpresa = empresa.id WHERE ";

        switch ($userType) {
            case 'estudante':
                $query .= "estagio.idEstudante = :userId";
                break;
            case 'professor':
                $query .= "(estagio.idOrientador = :userId OR estagio.idCoorientador = :userId)";
                break;
            case 'empresa':
                $query .= "estagio.idEmpresa = :userId";
                break;
            default:
                throw new Exception("Tipo de usuário desconhecido");
        }

        $params = [":userId" => $userId];
        $data = $db->select($query, $params);

        $arrayDados = [];
        foreach ($data as $row) {
            $vo = new EstagioVO($row["id"], $row["dataInicio"], $row["dataFinal"], $row["area"], $row["cargaHoraria"], $row["idEstudante"],
                $row["idOrientador"], $row["idEmpresa"], $row["representante"], $row["idCidade"], $row["idCoorientador"],
                $row["nomeSupervisor"], $row["cargoSupervisor"], $row["telefoneSupervisor"], $row["emailSupervisor"],
                $row["tipoProcesso"], $row["status"], $row["planoAtividades"], $row["relatorioFinal"], $row["autoavaliacaoEmpresa"],
                $row["autoavaliacao"], $row["termoCompromisso"], $row["nomeCidade"], $row['nomeEstudante'], $row["nomeOrientador"], $row["nomeEmpresa"], $row["nomeCoorientador"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM estagio WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstagioVO($data[0]["id"], $data[0]["dataInicio"], $data[0]["dataFinal"], $data[0]["area"], $data[0]["cargaHoraria"],
            $data[0]["idEstudante"], $data[0]["idOrientador"], $data[0]["idEmpresa"], $data[0]["representante"], $data[0]["idCidade"],
            $data[0]["idCoorientador"], $data[0]["nomeSupervisor"], $data[0]["cargoSupervisor"], $data[0]["telefoneSupervisor"],
            $data[0]["emailSupervisor"], $data[0]["tipoProcesso"], $data[0]["status"], $data[0]["planoAtividades"],
            $data[0]["relatorioFinal"], $data[0]["autoavaliacaoEmpresa"], $data[0]["autoavaliacao"], $data[0]["termoCompromisso"]);
    }

    public function insert($vo)
    {
        $db = new Database();

        $query = "INSERT INTO estagio (dataInicio, dataFinal, area, cargaHoraria, idEstudante, idOrientador, idEmpresa, representante,
        idCidade, idCoorientador, nomeSupervisor, cargoSupervisor, telefoneSupervisor, emailSupervisor, tipoProcesso,
        status, planoAtividades, relatorioFinal, autoavaliacaoEmpresa, autoavaliacao, termoCompromisso) VALUES
        (:dataInicio, :dataFinal, :area, :cargaHoraria, :idEstudante, :idOrientador, :idEmpresa, :representante, :idCidade,
        :idCoorientador, :nomeSupervisor, :cargoSupervisor, :telefoneSupervisor, :emailSupervisor, :tipoProcesso,
        :status, :planoAtividades, :relatorioFinal, :autoavaliacaoEmpresa, :autoavaliacao, :termoCompromisso)";

        $binds = [
            ":dataInicio" => $vo->getDataInicio(),
            ":dataFinal" => $vo->getDataFinal(),
            ":area" => $vo->getArea(),
            ":cargaHoraria" => $vo->getCargaHoraria(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":representante" => $vo->getRepresentante(),
            ":idCidade" => $vo->getIdCidade(),
            ":idCoorientador" => $vo->getIdCoorientador(),
            ":nomeSupervisor" => $vo->getNomeSupervisor(),
            ":cargoSupervisor" => $vo->getCargoSupervisor(),
            ":telefoneSupervisor" => $vo->getTelefoneSupervisor(),
            ":emailSupervisor" => $vo->getEmailSupervisor(),
            ":tipoProcesso" => $vo->getTipoProcesso(),
            ":status" => $vo->getStatus(),
            ":planoAtividades" => $vo->getPlanoAtividades(),
            ":relatorioFinal" => $vo->getRelatorioFinal(),
            ":autoavaliacaoEmpresa" => $vo->getAutoavaliacaoEmpresa(),
            ":autoavaliacao" => $vo->getAutoavaliacao(),
            ":termoCompromisso" => $vo->getTermoCompromisso(),
        ];

        return $db->execute($query, $binds);

    }

    public function update($vo)
    {
        $db = new Database();

        $query = "UPDATE estagio SET dataInicio = :dataInicio, dataFinal = :dataFinal, area = :area, cargaHoraria = :cargaHoraria, idEstudante = :idEstudante, idOrientador = :idOrientador,
        idEmpresa = :idEmpresa, representante = :representante, idCidade = :idCidade,
        idCoorientador = :idCoorientador, nomeSupervisor = :nomeSupervisor, cargoSupervisor = :cargoSupervisor,
        telefoneSupervisor = :telefoneSupervisor, emailSupervisor = :emailSupervisor,
        tipoProcesso = :tipoProcesso, status = :status, planoAtividades = :planoAtividades,
        relatorioFinal = :relatorioFinal, autoavaliacaoEmpresa = :autoavaliacaoEmpresa, autoavaliacao = :autoavaliacao,
        termoCompromisso = :termoCompromisso WHERE id = :id";

        $binds = [
            ":dataInicio" => $vo->getDataInicio(),
            ":dataFinal" => $vo->getDataFinal(),
            ":area" => $vo->getArea(),
            ":cargaHoraria" => $vo->getCargaHoraria(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":representante" => $vo->getRepresentante(),
            ":idCidade" => $vo->getIdCidade(),
            ":idCoorientador" => $vo->getIdCoorientador(),
            ":nomeSupervisor" => $vo->getNomeSupervisor(),
            ":cargoSupervisor" => $vo->getCargoSupervisor(),
            ":telefoneSupervisor" => $vo->getTelefoneSupervisor(),
            ":emailSupervisor" => $vo->getEmailSupervisor(),
            ":tipoProcesso" => $vo->getTipoProcesso(),
            ":status" => $vo->getStatus(),
            ":planoAtividades" => $vo->getPlanoAtividades(),
            ":relatorioFinal" => $vo->getRelatorioFinal(),
            ":autoavaliacaoEmpresa" => $vo->getAutoavaliacaoEmpresa(),
            ":autoavaliacao" => $vo->getAutoavaliacao(),
            ":termoCompromisso" => $vo->getTermoCompromisso(),
            ":id" => $vo->getId(),
        ];

        print_r($binds);

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "DELETE FROM estagio WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function removeFileFromDatabase($id, $field)
    {
        $db = new Database();
        $query = "UPDATE estagio SET " . $field . " = NULL WHERE id = :id";
        $binds = [":id" => $id];
        return $db->execute($query, $binds);
    }

}
