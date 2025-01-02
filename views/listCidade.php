<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <base href="./trabEstagios">
    <title>Lista de Cidade</title>
</head>
<body>
    <?php include("includes/navbarAdmin.php"); ?>
    <div class="body">
    <h2>Lista de Cidade</h2>
    <a href="./cidades/form" class="cadastrar">Cadastrar Cidade</a>
    <div class="table">
        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Cidade</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cidades as $cidade): ?>
                <tr>
                    <td><?php echo $cidade->getId(); ?></td>
                    <td><?php echo $cidade->getNome(); ?></td>
                    <td><?php echo $cidade->getCEP(); ?></td>
                    <td>
                        <a href="./cidades/form?id=<?= $cidade->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./cidades/remove?id=<?= $cidade->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>
