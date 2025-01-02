<?php

namespace Controller;

use Controller\UserController;
use Model\ProfessorModel;
use Model\VO\ProfessorVO;

final class ProfessorController extends Controller
{

    public function list()
    {
        $model = new ProfessorModel();
        $data = $model->selectAll(new ProfessorVO());

        $this->loadView("listProfessor", [
            "professores" => $data,
        ]);
    }

    public function form()
    {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new ProfessorVO();
        } else {
            $model = new ProfessorModel();
            $vo = $model->selectOne(new ProfessorVO($id));
        }

        $this->loadView("formProfessor", [
            "professor" => $vo,
        ]);
    }

    public function save()
    {
        $id = $_POST['id'];
        $model = new ProfessorModel();

        $vo = new ProfessorVO(
            $id,
            $_POST['nome'],
            $_POST['email'],
            $_POST['siape']
        );

        if (empty($id)) {
            $result = $model->insert($vo);

            $userController = new UserController();
            $userController->createNewUser($result->getEmail(), 2, null, null, $result->getId());
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("../professores");
    }

    public function remove()
    {
        $model = new ProfessorModel();
        $model->delete(new ProfessorVO($_GET['id']));
        $this->redirect("../professores");
    }
}
