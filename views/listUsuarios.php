<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0x">
        <link rel="stylesheet" href="css/list.css">
        <base href="./trabEstagios">
        <title>Lista de Usuários</title>
    </head>
    <body>
    <?php include("includes/navbarAdmin.php"); ?>
    <div class="body">
    <h2>Lista de Usuários</h2>
    <a href="./usuarios/form" class="cadastrar">Cadastrar Usuário</a>
    
    <div class="table">
        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Nível</th>
                <th>Id Empresa</th>
                <th>Id Estudante</th>
                <th>Id Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getLogin(); ?></td>
                    <td><?php echo $usuario->getNivel(); ?></td>
                    <td><?php echo $usuario->getIdEmpresa(); ?></td>
                    <td><?php echo $usuario->getIdEstudante(); ?></td>
                    <td><?php echo $usuario->getIdProfessor(); ?></td>
                    <td>
                        <a href="./usuarios/form?id=<?= $usuario->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./usuarios/remove?id=<?= $usuario->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>

    
    </div>
    
</body>
</html>
