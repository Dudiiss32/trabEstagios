<?php

namespace Model\VO;

final class EmpresaVO extends VO {

    private $nome;
    private $endereco;
    private $telefone;
    private $email;
    private $cnpj;
    private $representante;
    private $funcaoRepresentante;
    private $cpfRepresentante;
    private $rgRepresentante;
    private $numConvenio;
    

    public function __construct($id = 0, $nome = "", $endereco = '', $telefone = 0 , $email = '', $cnpj = 0 , $representante = 0 , $cpfRepresentante = '', $rgRepresentante = '', $funcaoRepresentante = '', $numConvenio = '' ,) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cnpj = $cnpj;
        $this->representante = $representante;
        $this->numConvenio = $numConvenio;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cpfRepresentante = $cpfRepresentante;
        $this->rgRepresentante = $rgRepresentante;
        $this->funcaoRepresentante = $funcaoRepresentante;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function getNumConvenio() {
        return $this->numConvenio;
    }

    public function setNumConvenio($numConvenio) {
        $this->numConvenio = $numConvenio;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getCpfRepresentante() {
        return $this->cpfRepresentante;
    }

    public function setCpfRepresentante($cpfRepresentante) {
        $this->cpfRepresentante = $cpfRepresentante;
    }
    public function getRgRepresentante() {
        return $this->rgRepresentante;
    }

    public function setRgRepresentante($rgRepresentante) {
        $this->rgRepresentante = $rgRepresentante;
    }
    public function getFuncaoRepresentante() {
        return $this->funcaoRepresentante;
    }

    public function setFuncaoRepresentante($funcaoRepresentante) {
        $this->funcaoRepresentante = $funcaoRepresentante;
    }
}