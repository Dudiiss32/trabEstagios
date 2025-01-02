<?php

namespace Model\VO;

final class ProfessorVO extends VO {

    private $nome;
    private $email;
    private $siape;

    public function __construct($id = 0, $nome = "", $email = '', $siape = '') {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->siape = $siape;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getSiape() {
        return $this->siape;
    }

    public function setSiape($siape) {
        $this->siape = $siape;
    }
}