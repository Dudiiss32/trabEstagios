<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Curso</title>
</head>
<body>
    <div class="voltar">
        <a href="javascript:history.back()">Voltar</a>
    </div>
    <div class="body">
        <h1><b>Formulário Curso</b></h1>
        <form action="./save" method="POST">
            <input type="hidden" name="id" value="<?php echo $curso->getId(); ?>">
            <input type="text" name="nome" value="<?php echo $curso->getNome(); ?>" placeholder="Insira o nome do curso:">
            <label for="idOrientador">Selecione o Orientador:</label>
            <select name="idOrientador" id="idOrientador" required>
                <option value="">Selecione um orientador</option>
                <?php foreach ($professores as $professor): ?>
                    <option value="<?php echo $professor->getId(); ?>" 
                        <?php echo $curso->getIdOrientador() == $professor->getId() ? 'selected' : ''; ?>>
                        <?php echo $professor->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="email" name="emailOrientador" value="<?php echo $curso->getEmailOrientador(); ?>" placeholder="Insira o email do orientador:">
            <button type="submit">Salvar Curso</button>
        </form>
    </div>
    
</body>
</html>
