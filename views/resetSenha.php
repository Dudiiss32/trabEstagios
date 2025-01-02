<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/form.css">
  <base href="./trabEstagios">
  <title>Redefinir Senha</title>
</head>
<body>
  <div class="voltar">
        <a href="javascript:history.back()">Voltar</a>
  </div>
  <div class="body">
    <form action="./processarNovaSenha" method="POST">
      <h2>Redefinir Senha</h2>
      <?php
      if (isset($erro)) {
        echo $erro;
      }
      ?>
      <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : $token; ?>">
      <label for="nova_senha">Nova Senha:</label>
      <input type="password" id="nova_senha" name="nova_senha" required>
      <label for="confirmar_nova_senha">Confirmar Nova Senha:</label>
      <input type="password" id="confirmar_nova_senha" name="confirmar_nova_senha" required>
      <button type="submit">Redefinir Senha</button>
    </form>
  </div>
</body>
</html>
