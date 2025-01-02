<?php

namespace Model\VO;

final class UserVO extends VO
{
    private $login;
    private $senha;
    private $nivel;
    private $idEstudante;
    private $idProfessor;
    private $idEmpresa;
    
    public function __construct($id = 0, $login = "", $senha = "", $nivel = "", $idEmpresa = NULL, $idEstudante = NULL, $idProfessor = NULL){
        parent::__construct($id);
        $this->login = $login;
        $this->senha = $senha;
        $this->nivel = $nivel;
        $this->idEmpresa = $idEmpresa;
        $this->idEstudante = $idEstudante;
        $this->idProfessor = $idProfessor;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    public function getIdEstudante(){
        return $this->idEstudante;
    }
    public function setIdEstudante($idEstudante){
        $this->idEstudante = $idEstudante;
    }

    public function getIdProfessor(){
        return $this->idProfessor;
    }
    public function setIdProfessor($idProfessor){
        $this->idProfessor = $idProfessor;
    }

    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa = $idEmpresa;
    }
}
