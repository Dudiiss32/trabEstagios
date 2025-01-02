<?php

namespace Controller;

use Model\CidadeModel;
use Model\EmpresaModel;
use Model\EstagioModel;
use Model\EstudanteModel;
use Model\ProfessorModel;
use Model\VO\CidadeVO;
use Model\VO\EmpresaVO;
use Model\VO\EstagioVO;
use Model\VO\EstudanteVO;
use Model\VO\ProfessorVO;

class EstagioController extends Controller
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function list()
    {
        $model = new EstagioModel();
        $usuario = $_SESSION['usuario'];

        if (!empty($usuario->getIdEstudante())) {
            $userType = 'estudante';
            $userId = $usuario->getIdEstudante();
        } elseif (!empty($usuario->getIdProfessor())) {
            $userType = 'professor';
            $userId = $usuario->getIdProfessor();
        } elseif (!empty($usuario->getIdEmpresa())) {
            $userType = 'empresa';
            $userId = $usuario->getIdEmpresa();
        } else {
            throw new Exception("Tipo de usuário desconhecido");
        }

        $data = $model->selectAllByUser($userId, $userType);
        $this->loadView("listEstagioUser", [
            "estagios" => $data,
        ]);
    }

    public function listSecao()
    {
        $model = new EstagioModel();
        $data = $model->selectAllInfo(new EstagioVO());

        if (isset($_SESSION['estagio_vo']) || isset($_SESSION['sectionAtual'])) {
            unset($_SESSION['estagio_vo']);
            unset($_SESSION['sectionAtual']);
        }

        $this->loadView("listEstagioSecao", [
            "estagios" => $data,
        ]);
    }

    public function form()
    {
        $id = $_GET['id'] ?? 0;
        $section = $_SESSION['sectionAtual'] ?? 'dados-gerais';

        $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] : new EstagioVO;

        if (!empty($id)) {
            $model = new EstagioModel();
            $vo = $model->selectOne(new EstagioVO($id));
        }
        $this->saveVoToSession($id, $vo);

        if ($section == "atores") {
            $modelEmpresa = new EmpresaModel();
            $empresas = $modelEmpresa->selectAll(new EmpresaVO());

            $modelEstudante = new EstudanteModel();
            $estudantes = $modelEstudante->selectAll(new EstudanteVO());

            $modelProfessor = new ProfessorModel();
            $professores = $modelProfessor->selectAll(new ProfessorVO());

            $this->loadView("formEstagio", [
                "empresas" => $empresas,
                "estudantes" => $estudantes,
                "professores" => $professores,
            ]);
        } else if ($section == "dados-gerais") {
            $modelCidades = new CidadeModel();
            $cidades = $modelCidades->selectAll(new CidadeVO());

            $this->loadView("formEstagio", [
                "cidades" => $cidades,
            ]);
        } else {
            $this->loadView("formEstagio", []);
        }

    }

    public function save()
    {
        $section = $_SESSION["sectionAtual"] ?? 'dados-gerais';
        $id = $_SESSION["estagio_vo"]->getId() ?? 0;

        $model = new EstagioModel();
        $this->saveSectionDataToSession($section);

        if ($section != "documentos") {
            $nextSection = $this->getNextSection($section);
            $_SESSION["sectionAtual"] = $nextSection;

            if ($nextSection == "atores") {
                $modelEmpresa = new EmpresaModel();
                $empresas = $modelEmpresa->selectAll(new EmpresaVO());

                $modelEstudante = new EstudanteModel();
                $estudantes = $modelEstudante->selectAll(new EstudanteVO());

                $modelProfessor = new ProfessorModel();
                $professores = $modelProfessor->selectAll(new ProfessorVO());

                $this->loadView("formEstagio", [
                    "empresas" => $empresas,
                    "estudantes" => $estudantes,
                    "professores" => $professores,
                ]);
            } else if ($nextSection == "dados-gerais") {
                $modelCidades = new CidadeModel();
                $cidades = $modelCidades->selectAll(new CidadeVO());

                $this->loadView("formEstagio", [
                    "cidades" => $cidades,
                ]);
            } else {
                $this->loadView("formEstagio", []);
            }

        } else {
            $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] : new EstagioVO;

            if ($id != 0) {
                $vo->setId($id);
                $model->update($vo);
            } else {
                $model->insert($vo);
            }

            unset($_SESSION['estagio_vo']);
            unset($_SESSION['sectionAtual']);
            $this->redirect("../estagiosSecao");
        }
    }

    public function mudaSectionEstagio()
    {
        $nextSection = isset($_GET['section']) ? $_GET['section'] : "dados-gerais";
        $id = $_SESSION["estagio_vo"]->getId() ?? 0;

        $_SESSION["sectionAtual"] = $nextSection;
        $this->redirect("./estagios/form");
    }

    public function remove()
    {
        $model = new EstagioModel();
        $model->delete(new EstagioVO($_GET['id']));
        $this->redirect("../estagiosSecao");
    }

    private function saveSectionDataToSession($section)
    {
        $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] : new EstagioVO;

        switch ($section) {
            case 'dados-gerais':
                $vo->setArea($_POST['area'] ?? "");
                $vo->setIdCidade($_POST['idCidade'] ?? 0);
                $vo->setStatus($_POST['status'] ?? "");
                $vo->setTipoProcesso($_POST['tipoProcesso'] ?? "");
                break;

            case 'periodo':
                $vo->setCargaHoraria($_POST['cargaHoraria'] ?? 0);
                $vo->setDataInicio($_POST['dataInicio'] ?? "0000-00-00");
                $vo->setDataFinal($_POST['dataFinal'] ?? "0000-00-00");
                break;

            case 'atores':
                $vo->setIdEstudante($_POST['idEstudante'] ?? 0);
                $vo->setIdOrientador($_POST['idOrientador'] ?? 0);
                $vo->setIdEmpresa($_POST['idEmpresa'] ?? 0);
                $vo->setIdCoorientador(isset($_POST['idCoorientador']) && $_POST['idCoorientador'] !== '' ? $_POST['idCoorientador'] : null);
                break;

            case 'representante':
                $vo->setRepresentante($_POST['representante'] ?? "");
                $vo->setNomeSupervisor($_POST['nomeSupervisor'] ?? "");
                $vo->setCargoSupervisor($_POST['cargoSupervisor'] ?? "");
                $vo->setTelefoneSupervisor($_POST['telefoneSupervisor'] ?? "");
                $vo->setEmailSupervisor($_POST['emailSupervisor'] ?? "");
                break;

            case 'documentos':
                if (isset($_FILES['planoAtividades']) && $_FILES['planoAtividades']['error'] === UPLOAD_ERR_OK) {
                    $vo->setPlanoAtividades($this->uploadFile($_FILES['planoAtividades'], $vo->getPlanoAtividades()));
                } elseif (!file_exists("uploads/" . $vo->getPlanoAtividades())) {
                    $vo->setPlanoAtividades(null);
                }

                if (isset($_FILES['relatorioFinal']) && $_FILES['relatorioFinal']['error'] === UPLOAD_ERR_OK) {
                    $vo->setRelatorioFinal($this->uploadFile($_FILES['relatorioFinal'], $vo->getRelatorioFinal()));
                } elseif (!file_exists("uploads/" . $vo->getRelatorioFinal())) {
                    $vo->setRelatorioFinal(null);
                }

                if (isset($_FILES['autoavaliacaoEmpresa']) && $_FILES['autoavaliacaoEmpresa']['error'] === UPLOAD_ERR_OK) {
                    $vo->setAutoavaliacaoEmpresa($this->uploadFile($_FILES['autoavaliacaoEmpresa'], $vo->getAutoavaliacaoEmpresa()));
                } elseif (!file_exists("uploads/" . $vo->getAutoavaliacaoEmpresa())) {
                    $vo->setAutoavaliacaoEmpresa(null);
                }

                if (isset($_FILES['autoavaliacao']) && $_FILES['autoavaliacao']['error'] === UPLOAD_ERR_OK) {
                    $vo->setAutoavaliacao($this->uploadFile($_FILES['autoavaliacao'], $vo->getAutoavaliacao()));
                } elseif (!file_exists("uploads/" . $vo->getAutoavaliacao())) {
                    $vo->setAutoavaliacao(null);
                }

                if (isset($_FILES['termoCompromisso']) && $_FILES['termoCompromisso']['error'] === UPLOAD_ERR_OK) {
                    $vo->setTermoCompromisso($this->uploadFile($_FILES['termoCompromisso'], $vo->getTermoCompromisso()));
                } elseif (!file_exists("uploads/" . $vo->getTermoCompromisso())) {
                    $vo->setTermoCompromisso(null);
                }
                break;

        }

        $this->saveVoToSession(0, $vo);
    }

    private function getNextSection($currentSection)
    {
        $sections = ['dados-gerais', 'periodo', 'atores', 'representante', 'documentos', 'finalizar'];
        $currentIndex = array_search($currentSection, $sections);
        return $sections[$currentIndex + 1] ?? 'dados-gerais';
    }

    private function saveVoToSession($id, $vo)
    {
        if (!session_id()) {
            session_start();
        }
        $_SESSION['estagio_vo'] = $vo;
    }

    public function uploadFile($file, $oldFile = "")
    {
        if (!empty($oldFile)) {
            $this->deleteFile($oldFile);
        }

        if (empty($file) || $file['error'] !== UPLOAD_ERR_OK) {
            return '';
        }

        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nomeArquivos = uniqid() . "." . $extension;
        move_uploaded_file($file["tmp_name"], "uploads/" . $nomeArquivos);

        return $nomeArquivos;
    }

    public function deleteFile($file_name)
    {
        $path = "uploads/" . $file_name;
        if (file_exists($path)) {
            unlink($path);
        }
    }
    public function removeFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['file']) && isset($_POST['field'])) {
                $file = basename($_POST['file']);
                $field = $_POST['field']; // Campo a ser atualizado
                $filePath = 'uploads/' . $file;

                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        // Atualizar o banco de dados
                        $model = new EstagioModel();
                        $id = $_SESSION["estagio_vo"]->getId();
                        $model->removeFileFromDatabase($id, $field);
                        echo 'success';
                    } else {
                        echo 'error';
                    }
                } else {
                    echo 'file_not_found';
                }
            } else {
                echo 'no_file_specified';
            }
        } else {
            echo 'invalid_request';
        }
    }

}
