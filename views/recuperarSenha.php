<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <base href="./trabEstagios">
    <title>Recuperação de Senha</title>
</head>
<body>
    <div class="voltar">   
        <a href="javascript:history.back()">Voltar</a>
    </div>
    <div class="body">
        <h1><b>Recuperação de Senha</b></h1>
        <?php if (isset($erro)): ?>
            <p style="color: red;"><?php echo $erro; ?></p>
        <?php endif; ?>
        
        <form action="./enviarRecuperacao" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
            <br>
            <button type="submit">Enviar link</button>
        </form>
        
        <p><a href="./login">Voltar ao login</a></p>
    </div>
</body>
</html>
