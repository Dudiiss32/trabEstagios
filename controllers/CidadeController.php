<?php

namespace Controller;

use Model\CidadeModel;
use Model\VO\CidadeVO;

final class CidadeController extends Controller {

    public function list(){
        $model = new CidadeModel();
        $data = $model->selectAll(new CidadeVO());

        $this->loadView("listCidade", [
            "cidades" => $data
        ]);
    }

    public function form(){
        $id = $_GET['id'] ?? 0;

        if(empty($id)){
            $vo = new CidadeVO();
        } else {
            $model = new CidadeModel();
            $vo = $model->selectOne(new CidadeVO($id));
        }
        
        $this->loadView("formCidade", [
            "cidade" => $vo
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new CidadeModel();

        $vo = new CidadeVO(
            $id, 
            $_POST['nome'], 
            $_POST['cep'], 
        );
                
        if(empty($id)){
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }

        $this->redirect("../cidades");
    }
    
    public function remove() {
        $model = new CidadeModel();
        $model->delete(new CidadeVO($_GET['id']));
        $this->redirect("../cidades");
    }
}