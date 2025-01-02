<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Estudantes</title>
</head>
<body>
    <div class="voltar">   
        <a href="javascript:history.back()">Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Estudante</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $estudante->getId(); ?>">
            <input type="text" name="nome" value="<?php echo $estudante->getNome(); ?>" placeholder="Insira o nome do estudante:">
            <input type="text" name="matricula" value="<?php echo $estudante->getMatricula(); ?>" placeholder="Insira a matrícula do estudante:">
            <label for="idCurso">Selecione o Curso:</label>
            <select name="idCurso" id="idCurso" required>
                <option value="">Selecione um curso</option>
                <?php foreach ($cursos as $curso): ?>
                    <option value="<?php echo $curso->getId(); ?>" 
                        <?php echo $estudante->getIdCurso() == $curso->getId() ? 'selected' : ''; ?>>
                        <?php echo $curso->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="cpf" value="<?php echo $estudante->getCpf(); ?>" placeholder="Insira o CPF do estudante:">
            <input type="text" name="rg" value="<?php echo $estudante->getRg(); ?>" placeholder="Insira o RG do estudante:">
            <input type="text" name="endereco" value="<?php echo $estudante->getEndereco(); ?>" placeholder="Insira o endereço do estudante:">
            <label for="idCidade">Selecione a Cidade:</label>
            <select name="idCidade" id="idCidade" required>
                <option value="">Selecione uma cidade</option>
                <?php foreach ($cidades as $cidade): ?>
                    <option value="<?php echo $cidade->getId(); ?>" 
                        <?php echo $estudante->getIdCidade() == $cidade->getId() ? 'selected' : ''; ?>>
                        <?php echo $cidade->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="telefone" value="<?php echo $estudante->getTelefone(); ?>" placeholder="Insira o telefone do estudante:">
            <input type="email" name="email" value="<?php echo $estudante->getEmail(); ?>" placeholder="Insira o email do estudante:">
            <button type="submit">Salvar Estudante</button>
        </form>
    </div>
    
</body>
</html>
