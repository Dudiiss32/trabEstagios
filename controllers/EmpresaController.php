<?php

namespace Controller;

use Model\EmpresaModel;
use Model\VO\EmpresaVO;


use Controller\UserController;

final class EmpresaController extends Controller {

    public function list(){
        $model = new EmpresaModel();
        $data = $model->selectAll(new EmpresaVO());

        $this->loadView("listEmpresa", [
            "empresas" => $data
        ]);
    }

    public function form(){
        $id = $_GET['id'] ?? 0;

        if(empty($id)){
            $vo = new EmpresaVO();
        } else {
            $model = new EmpresaModel();
            $vo = $model->selectOne(new EmpresaVO($id));
        }
        
        $this->loadView("formEmpresa", [
            "empresa" => $vo
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new EmpresaModel();

        $vo = new EmpresaVO(
            $id, 
            $_POST['nome'], 
            $_POST['endereco'],
            $_POST['telefone'],
            $_POST['email'],
            $_POST['cnpj'],
            $_POST['representante'],
            $_POST['cpfRepresentante'],
            $_POST['rgRepresentante'],
            $_POST['funcaoRepresentante'],
            $_POST['numConvenio'],
        );
                
        if(empty($id)){
            $result = $model->insert($vo);
            
            $userController = new UserController();
            $userController->createNewUser($result->getEmail(), 2, $result->getId(), null, null );
        }else{
            $result = $model->update($vo);
        }

        $this->redirect("../empresas");
    }
    
    public function remove() {
        $model = new EmpresaModel();
        $model->delete(new EmpresaVO($_GET['id']));
        $this->redirect("../empresas");
    }
}