<?php

namespace Model\VO;

final class EstudanteVO extends VO {

    private $nome;
    private $matricula;
    private $idCurso;
    private $cpf;
    private $rg;
    private $idCidade;
    private $telefone;
    private $endereco;
    private $email;
    private $nomeCurso;
    private $nomeCidade;
    
    public function __construct($id = 0, $nome = "", $matricula = "", $idCurso = 0,$cpf = 0 , $rg = 0 , $idCidade = '' , $telefone = 0 ,  $endereco = '',  $email = '', $nomeCurso = "", $nomeCidade = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->idCurso = $idCurso;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->idCidade = $idCidade;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->nomeCurso = $nomeCurso;
        $this->nomeCidade = $nomeCidade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }
    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }
    public function getIdCidade() {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getNomeCurso() {
        return $this->nomeCurso;
    }

    public function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }
    
    public function getNomeCidade() {
        return $this->nomeCidade;
    }

    public function setNomeCidade($nomeCidade) {
        $this->nomeCidade = $nomeCidade;
    }
}