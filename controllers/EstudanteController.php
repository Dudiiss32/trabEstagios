<?php

namespace Controller;

use Controller\UserController;
use Model\CidadeModel;
use Model\CursoModel;
use Model\EstudanteModel;
use Model\VO\CidadeVO;
use Model\VO\CursoVO;
use Model\VO\EstudanteVO;

final class EstudanteController extends Controller
{

    public function list()
    {
        $model = new EstudanteModel();
        $data = $model->selectAll(new EstudanteVO());

        $this->loadView("listEstudante", [
            "estudantes" => $data,
        ]);
    }

    public function form()
    {
        $id = $_GET['id'] ?? 0;

        $modelCurso = new CursoModel();
        $cursos = $modelCurso->selectAll(new CursoVO());

        $modelCidade = new CidadeModel();
        $cidades = $modelCidade->selectAll(new CidadeVO());

        if (empty($id)) {
            $vo = new EstudanteVO();
        } else {
            $model = new EstudanteModel();
            $vo = $model->selectOne(new EstudanteVO($id));
        }

        $this->loadView("formEstudante", [
            "estudante" => $vo,
            "cursos" => $cursos,
            "cidades" => $cidades,
        ]);
    }

    public function save()
    {
        $id = $_POST['id'];
        $model = new EstudanteModel();

        $vo = new EstudanteVO(
            $id,
            $_POST['nome'],
            $_POST['matricula'],
            $_POST['idCurso'],
            $_POST['cpf'],
            $_POST['rg'],
            $_POST['idCidade'],
            $_POST['telefone'],
            $_POST['endereco'],
            $_POST['email']
        );

        if (empty($id)) {
            $result = $model->insert($vo);

            $userController = new UserController();
            $userController->createNewUser($result->getEmail(), 2, null, $result->getId(), null);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("../estudantes");
    }

    public function remove()
    {
        $id = $_GET['id'];
        $model = new EstudanteModel();

        $estudante = $model->selectOne(new EstudanteVO($id));

        if ($estudante) {
            $email = $estudante->getEmail();

            $userController = new UserController();

            $model->delete(new EstudanteVO($id));
        }

        $this->redirect("../estudantes");
    }

}
