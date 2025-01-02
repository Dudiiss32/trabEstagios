<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Formulário Empresa</title>
</head>
<body>
    <div class="voltar">
        <a href="javascript:history.back()" >Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Empresa</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $empresa->getId(); ?>">

            <input type="text" name="nome" value="<?php echo $empresa->getNome(); ?>" placeholder="Insira o nome da empresa:">
            <input type="text" name="endereco" value="<?php echo $empresa->getEndereco(); ?>" placeholder="Insira o endereço da empresa:">
            <input type="text" name="cnpj" value="<?php echo $empresa->getCnpj(); ?>" placeholder="Insira o CNPJ da empresa:">
            <input type="text" name="representante" value="<?php echo $empresa->getRepresentante(); ?>" placeholder="Nome do representante:">
            <input type="text" name="cpfRepresentante" value="<?php echo $empresa->getCpfRepresentante(); ?>" placeholder="CPF do representante:">
            <input type="text" name="rgRepresentante" value="<?php echo $empresa->getRgRepresentante(); ?>" placeholder="RG do representante:">
            <input type="text" name="funcaoRepresentante" value="<?php echo $empresa->getFuncaoRepresentante(); ?>" placeholder="Função do representante:">
            <input type="number" name="numConvenio" value="<?php echo $empresa->getNumConvenio(); ?>" placeholder="Número do convênio:">
            <input type="text" name="telefone" value="<?php echo $empresa->getTelefone(); ?>" placeholder="Telefone da empresa:">
            <input type="email" name="email" value="<?php echo $empresa->getEmail(); ?>" placeholder="E-mail da empresa:">

            <button type="submit">Salvar Empresa</button>
        </form>
    </div>
    
</body>
</html>
