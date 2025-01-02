<?php

namespace Model\VO;

final class CursoVO extends VO {

    private $nome;
    private $idOrientador;
    private $emailOrientador;
    private $nomeOrientador;

    public function __construct($id = 0, $nome = "", $idOrientador = "", $emailOrientador = '', $nomeOrientador = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->idOrientador = $idOrientador;
        $this->emailOrientador = $emailOrientador;
        $this->nomeOrientador = $nomeOrientador;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdOrientador() {
        return $this->idOrientador;
    }

    public function setIdOrientador($idOrientador) {
        $this->idOrientador = $idOrientador;
    }

    public function getEmailOrientador() {
        return $this->emailOrientador;
    }

    public function setEmailOrientador($emailOrientador) {
        $this->emailOrientador = $emailOrientador;
    }

    public function getNomeOrientador() {
        return $this->nomeOrientador;
    }

    public function setNomeOrientador($nomeOrientador) {
        $this->nomeOrientador = $nomeOrientador;
    }
}