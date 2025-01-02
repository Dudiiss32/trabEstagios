<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <base href="./trabEstagios">
    <title>Lista de Cursos</title>
</head>
<body>
    <?php include "includes/navbarAdmin.php";?>
    <div class="body">
    <h2>Lista de Cursos</h2>
    <a href="./cursos/form" class="cadastrar">Cadastrar Curso</a>
    <div class="table">
        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Curso</th>
                <th>Nome Orientador</th>
                <th>Email do Orientador</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?php echo $curso->getId(); ?></td>
                    <td><?php echo $curso->getNome(); ?></td>
                    <td><?php echo $curso->getNomeOrientador(); ?></td>
                    <td><?php echo $curso->getEmailOrientador(); ?></td>
                    <td>
                        <a href="./cursos/form?id=<?=$curso->getId();?>" class="edit">Editar</a>
                        <br>
                        <a href="./cursos/remove?id=<?=$curso->getId();?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>
