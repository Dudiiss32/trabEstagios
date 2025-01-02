<?php

namespace Model\VO;

final class EstagioVO extends VO {

    //Dados Gerais 
    private $area;
    private $idCidade;
    private $status; 
    private $tipoProcesso;
    
    // Carga Horário e Período 
    private $cargaHoraria;
    private $dataInicio;
    private $dataFinal;
    
    // Atores
    private $idEstudante;
    private $idOrientador;
    private $idEmpresa;
    private $idCoorientador;
    
    //Representante 
    private $representante;
    private $nomeSupervisor;
    private $cargoSupervisor;  
    private $telefoneSupervisor;
    private $emailSupervisor;
    
    //Documentos 
    private $planoAtividades;
    private $relatorioFinal;
    private $autoavaliacaoEmpresa;
    private $autoavaliacao;
    private $termoCompromisso;
    
    private $nomeCidade; 
    private $nomeEstudante;
    private $nomeOrientador;
    private $nomeEmpresa;
    private $nomeCoorientador;
    
    public function __construct($id = 0, $dataInicio = '0000-00-00', $dataFinal = '0000-00-00', $area = "", $cargaHoraria = 0,$idEstudante = 0 , $idOrientador = 0 , 
    $idEmpresa = 0 , $representante = '' , $idCidade = 0, $idCoorientador = 0, $nomeSupervisor = '', $cargoSupervisor = '', 
    $telefoneSupervisor = '', $emailSupervisor = '', $tipoProcesso = '', $status = '', $planoAtividades = '', $relatorioFinal = '', 
    $autoavaliacaoEmpresa = '', $autoavaliacao = '', $termoCompromisso = '', $nomeCidade = "", $nomeEstudante = "", $nomeOrientador = "", $nomeEmpresa = "", $nomeCoorientador = "") {
        parent::__construct($id);
        $this->dataInicio = $dataInicio;
        $this->dataFinal = $dataFinal;
        $this->area = $area;
        $this->cargaHoraria = $cargaHoraria;
        $this->idEstudante = $idEstudante;
        $this->idOrientador = $idOrientador;
        $this->idEmpresa = $idEmpresa;
        $this->representante = $representante;
        $this->idCidade = $idCidade;
        $this->idCoorientador = $idCoorientador;
        $this->nomeSupervisor = $nomeSupervisor;
        $this->cargoSupervisor = $cargoSupervisor;
        $this->telefoneSupervisor = $telefoneSupervisor;
        $this->emailSupervisor = $emailSupervisor;
        $this->tipoProcesso = $tipoProcesso;
        $this->status = $status;
        $this->planoAtividades = $planoAtividades;
        $this->relatorioFinal = $relatorioFinal;
        $this->autoavaliacaoEmpresa = $autoavaliacaoEmpresa;
        $this->autoavaliacao = $autoavaliacao;
        $this->termoCompromisso = $termoCompromisso;

        $this->nomeCidade = $nomeCidade; 
        $this->nomeEstudante = $nomeEstudante;
        $this->nomeOrientador = $nomeOrientador;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->nomeCoorientador = $nomeCoorientador;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    public function getDataFinal() {
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }
    public function getIdEstudante() {
        return $this->idEstudante;
    }

    public function setIdEstudante($idEstudante) {
        $this->idEstudante = $idEstudante;
    }
    public function getIdOrientador() {
        return $this->idOrientador;
    }

    public function setIdOrientador($idOrientador) {
        $this->idOrientador = $idOrientador;
    }
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function getIdCidade() {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
    }

    public function setIdCoorientador($idCoorientador) {
        $this->idCoorientador = $idCoorientador;
    }
    public function getIdCoorientador() {
        return $this->idCoorientador;
    }

    public function setNomeSupervisor($nomeSupervisor) {
        $this->nomeSupervisor = $nomeSupervisor;
    }
    public function getNomeSupervisor() {
        return $this->nomeSupervisor;
    }

    public function setCargoSupervisor($cargoSupervisor) {
        $this->cargoSupervisor = $cargoSupervisor;
    }
    public function getCargoSupervisor() {
        return $this->cargoSupervisor;
    }
    public function setTelefoneSupervisor($telefoneSupervisor) {
        $this->telefoneSupervisor = $telefoneSupervisor;
    }
    public function getTelefoneSupervisor() {
        return $this->telefoneSupervisor;
    }
    public function setEmailSupervisor($emailSupervisor) {
        $this->emailSupervisor = $emailSupervisor;
    }
    public function getEmailSupervisor() {
        return $this->emailSupervisor;
    }
    public function setTipoProcesso($tipoProcesso) {
        $this->tipoProcesso = $tipoProcesso;
    }
    public function getTipoProcesso() {
        return $this->tipoProcesso;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setPlanoAtividades($planoAtividades) {
        $this->planoAtividades = $planoAtividades;
    }
    public function getPlanoAtividades() {
        return $this->planoAtividades;
    }
    public function setRelatorioFinal($relatorioFinal) {
        $this->relatorioFinal = $relatorioFinal;
    }
    public function getRelatorioFinal() {
        return $this->relatorioFinal;
    }
    public function setAutoavaliacaoEmpresa($autoavaliacaoEmpresa) {
        $this->autoavaliacaoEmpresa = $autoavaliacaoEmpresa;
    }
    public function getAutoavaliacaoEmpresa() {
        return $this->autoavaliacaoEmpresa;
    }
    public function setAutoavaliacao($autoavaliacao) {
        $this->autoavaliacao = $autoavaliacao;
    }
    public function getAutoavaliacao() {
        return $this->autoavaliacao;
    }
    public function setTermoCompromisso($termoCompromisso) {
        $this->termoCompromisso = $termoCompromisso;
    }
    public function getTermoCompromisso() {
        return $this->termoCompromisso;
    }

    // Getters e setters para $nomeCidade 
    public function getNomeCidade() { 
        return $this->nomeCidade; 
    } 
    
    public function setNomeCidade($nomeCidade) { 
        $this->nomeCidade = $nomeCidade; 
    } 

    // Getters e setters para $nomeEstudante 
    public function getNomeEstudante() { 
        return $this->nomeEstudante; 
    } 

    public function setNomeEstudante($nomeEstudante) { 
        $this->nomeEstudante = $nomeEstudante; 
    } 

    // Getters e setters para $nomeOrientador 
    public function getNomeOrientador() { 
        return $this->nomeOrientador;
    } 

    public function setNomeOrientador($nomeOrientador) {
        $this->nomeOrientador = $nomeOrientador; 
    } 

    // Getters e setters para $nomeEmpresa 
    public function getNomeEmpresa() { 
        return $this->nomeEmpresa; 
    } 

    public function setNomeEmpresa($nomeEmpresa) { 
        $this->nomeEmpresa = $nomeEmpresa; 
    } 

    public function getNomeCoorientador() { 
        return $this->nomeCoorientador; 
    } 

    public function setNomeCoorientador($nomeCoorientador) { 
        $this->nomeCoorientador = $nomeCoorientador; 
    } 
}
