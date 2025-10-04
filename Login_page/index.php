<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="col">
        <h2>login</h2>
        <form action="login.php" method="post">
          <div class="formd">
            <label>email</label>
            <input type="email" name="email" id="" required />
          </div>

          <div class="formd">
            <label>senha</label>
            <input type="password" name="senha" id="" required />
          </div>
          <div class="btn-container">
            <button class="btn" type="submit">Entrar</button>
          </div>
          <div>não é usuario? <a href="registrar.php">registre-se</a></div>
        </form>

        <?php if (isset($_GET['erro']) && $_GET['erro'] === 'senha'): ?>
        <div class="erro">usuario ou senha incorreta</div>
        <?php elseif (isset($_GET['sucesso'])): ?>
        <div class="sucesso">Usuário cadastrado com sucesso!</div>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>
