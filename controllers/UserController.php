<?php
namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;

final class UserController extends Controller
{
    public function list()
    {
        $model = new UserModel();
        $data = $model->selectAll(new UserVO());

        $this->loadView("listUsuarios", [
            "usuarios" => $data,
        ]);
    }
    public function form()
    {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new UserVO();
        } else {
            $model = new UserModel();
            $vo = $model->selectOne(new UserVO($id));
        }

        $this->loadView("formUsuarios", [
            "usuario" => $vo,
        ]);
    }

    public function save()
    {
        $id = $_POST['id'];
        $model = new UserModel();

        $vo = new UserVO($id, $_POST['login'], $_POST['senha'], $_POST["nivel"]);

        if (empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("../usuarios");
    }

    public function remove()
    {
        $model = new UserModel();
        $model->delete(new UserVO($_GET['id']));
        $this->redirect("../usuarios");
    }

    public function createNewUser($login, $nivel, $idEmpresa, $idEstudante, $idProfessor)
    {
        echo $nivel;
        $model = new UserModel();
        $vo = new UserVO(null, $login, null, $nivel, $idEmpresa, $idEstudante, $idProfessor);

        $result = $model->insert($vo);
    }
}
