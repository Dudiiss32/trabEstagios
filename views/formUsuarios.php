<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Usuários</title>
</head>
<body>
    <div class="voltar">
        <a href="javascript:history.back()">Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Usuário</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
            <input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>" placeholder="Insira o login do usuário:">
            <input type="password" name="senha" placeholder="Insira a senha do novo usuário:">
            <input type="number" name="nivel" value="<?php echo $usuario->getNivel(); ?>" placeholder="Insira o nivel do usuário:">
            <?php
                if(!empty($usuario->getId())){
            ?>
            <p>Para deixar a senha atual, basta deixar o campo em branco!</p>
            <?php
                }
            ?>
            <button type="submit">Salvar Usuário</button>
        </form>
    </div>
    
</body>
</html>