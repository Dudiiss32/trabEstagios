<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Professor</title>
</head>
<body>
    <div class="voltar">
        <a href="javascript:history.back()">Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Professor</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $professor->getId(); ?>">
            <input type="text" name="nome" value="<?php echo $professor->getNome(); ?>" placeholder="Insira o nome do professor:">
            <input type="email" name="email" value="<?php echo $professor->getEmail(); ?>" placeholder="Insira o e-mail do professor:">
            <input type="text" name="siape" value="<?php echo $professor->getSiape(); ?>" placeholder="Insira o SIAPE do professor:">
            <button type="submit">Salvar Professor</button>
        </form>
    </div>
    
</body>
</html>
