<?php

namespace Controller;

use Model\CursoModel;
use Model\VO\CursoVO;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;

final class CursoController extends Controller {

    public function list(){
        $model = new CursoModel();
        $data = $model->selectAll(new CursoVO());

        $this->loadView("listCurso", [
            "cursos" => $data
        ]);
    }

    public function form(){
        $id = $_GET['id'] ?? 0;

        $modelCursos = new ProfessorModel();
        $cursos = $modelCursos->selectAll(new ProfessorVO());

        if(empty($id)){
            $vo = new CursoVO();
        } else {
            $model = new CursoModel();
            $vo = $model->selectOne(new CursoVO($id));
        }
        
        $this->loadView("formCurso", [
            "curso" => $vo,
            "professores" => $cursos
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new CursoModel();

        $vo = new CursoVO(
            $id, 
            $_POST['nome'], 
            $_POST['idOrientador'],
            $_POST['emailOrientador'], 
        );
                
        if(empty($id)){
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }

        $this->redirect("../cursos");
    }
    
    public function remove() {
        $model = new CursoModel();
        $model->delete(new CursoVO($_GET['id']));
        $this->redirect("../cursos");
    }
}