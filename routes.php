<?php
return [
    ['GET', '/', 'HomeController@index'],

    // Login
    ['GET', '/login', 'LoginController@login'],
    ['POST', '/login', 'LoginController@fazerLogin'],
    ['GET', '/logout', 'LoginController@logout', ['Middleware\AuthMiddleware']],
    ['GET', '/mandarEmail', 'LoginController@sendEmail'],

    // Usuários (Protegido por middleware)
    ['GET', '/usuarios', 'UserController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/usuarios/form', 'UserController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/usuarios/save', 'UserController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/usuarios/remove', 'UserController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Estudantes (Protegido por middleware)
    ['GET', '/estudantes', 'EstudanteController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/estudantes/form', 'EstudanteController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/estudantes/save', 'EstudanteController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/estudantes/remove', 'EstudanteController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Cidades (Protegido por middleware)
    ['GET', '/cidades', 'CidadeController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/cidades/form', 'CidadeController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/cidades/save', 'CidadeController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/cidades/remove', 'CidadeController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Professores (Protegido por middleware)
    ['GET', '/professores', 'ProfessorController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/professores/form', 'ProfessorController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/professores/save', 'ProfessorController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/professores/remove', 'ProfessorController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Cursos (Protegido por middleware)
    ['GET', '/cursos', 'CursoController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/cursos/form', 'CursoController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/cursos/save', 'CursoController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/cursos/remove', 'CursoController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Empresas (Protegido por middleware)
    ['GET', '/empresas', 'EmpresaController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/empresas/form', 'EmpresaController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/empresas/save', 'EmpresaController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/empresas/remove', 'EmpresaController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],

    // Recuperação de senha (rotas públicas)
    ['GET', '/recuperarSenha', 'LoginController@recuperarSenha'],
    ['POST', '/enviarRecuperacao', 'LoginController@enviarRecuperacao'],
    ['GET', '/resetSenha', 'LoginController@resetSenha'],
    ['POST', '/processarNovaSenha', 'LoginController@processarNovaSenha'],

    // Estágios (Protegido por middleware)
    ['GET', '/estagiosSecao', 'EstagioController@listSecao', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/estagios', 'EstagioController@list', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 2]]],
    ['GET', '/estagios/form', 'EstagioController@form', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/estagios/save', 'EstagioController@save', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/estagios/remove', 'EstagioController@remove', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/estagios/salvar', 'EstagioController@salvar', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['POST', '/estagios/removeFile', 'EstagioController@removeFile', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
    ['GET', '/mudaSectionEstagio', 'EstagioController@mudaSectionEstagio', ['Middleware\AuthMiddleware', ["Middleware\NivelMiddleware", 1]]],
];
