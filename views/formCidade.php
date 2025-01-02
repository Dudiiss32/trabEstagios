<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Formulário Cidade</title>
</head>
<body>
    <div class="voltar">
        <a href="javascript:history.back()" >Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Cidade</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $cidade->getId(); ?>">

            <input type="text" name="nome" value="<?php echo $cidade->getNome(); ?>" placeholder="Insira o nome da cidade:">
            <input type="text" name="cep" value="<?php echo $cidade->getCEP(); ?>" placeholder="Insira o endereço da cidade:">
            <button type="submit">Salvar Cidade</button>
        </form>
    </div>
    
</body>
</html>
