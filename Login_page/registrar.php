<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Registro</title>
  </head>
  <body>
    <div class="container">
      <div class="col">
        <h2>Registrar novo usuário</h2>

        <form action="registro.php" method="post">

          <div class="formd">
            <label>Nome:</label>
            <input type="text" name="nome" required />
          </div>

          <div class="formd">
            <label>Email:</label>
            <input type="email" name="email" required />
          </div>

          <div class="formd">
            <label>Senha:</label>
            <input type="password" name="senha" required />
          </div>

          <div class="formd">
            <label>Confirmar senha:</label>
            <input type="password" name="confirmar_senha" required />
          </div>

          <div class="btn-container">
            <button class="btn" type="submit" value="Registrar">
              Registrar
            </button>
          </div>

        </form>
      
        <?php if (isset($_GET['erro']) && $_GET['erro'] === 'senhas'): ?>
        <div class="erro">As senhas devem ser iguais!</div>
        <?php elseif (isset($_GET['sucesso'])): ?>
        <div class="sucesso">Usuário cadastrado com sucesso!</div>
        <?php endif; ?>

      </div>
    </div>
  </body>
</html>
