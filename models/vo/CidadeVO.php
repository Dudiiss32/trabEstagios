<?php

namespace Model\VO;

final class CidadeVO extends VO {

    private $nome;
    private $cep;

    public function __construct($id = 0, $nome = "", $cep = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->cep = $cep;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
}