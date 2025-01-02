<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <base href="./trabEstagios">
    <title>Lista de Professores</title>
</head>
<body>
    <?php include("includes/navbarAdmin.php"); ?>
    <div class="body">
    <h2>Lista de Professores</h2>
    <a href="./professores/form" class="cadastrar">Cadastrar Professor</a>

    <div class="table">
<table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>SIAPE</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professores as $professor): ?>
                <tr>
                    <td><?php echo $professor->getId(); ?></td>
                    <td><?php echo $professor->getNome(); ?></td>
                    <td><?php echo $professor->getEmail(); ?></td>
                    <td><?php echo $professor->getSiape(); ?></td>
                    <td>
                        <a href="./professores/form?id=<?= $professor->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./professores/remove?id=<?= $professor->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>

        
    </div>
    
</body>
</html>
