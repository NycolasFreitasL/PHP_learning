<?php
    //csp para impedir que outros tipos de arquivos entre no banco de dados.
    header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; object-src 'none'; base-uri 'self'; frame-ancestors 'none'; script-src 'self'; style-src 'self';");
    //chamando conexões e processos
    include 'bd.php';

    //segurança
    function e($v) {
        return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>painel</title>
</head>

<body>
    
    <section>
        <div class ="centralizar">
            <h1>Painel de usuários</h1>
        </div>
        <div class="container">
            <div class = col>
                <!-- painel para inserir mais usuarios ao banco de dados -->
                <div>
                    <h2>Inserir Usuários</h2>
                </div>
        
                <form class = "form-box" action="into.php" method="POST">
        
                    <p>digite o nome do usuario: <input type="text" name="nome"></p>
        
                    <p>digite o email do usuario: <input type="email" name="email"></p>
        
                    <p>digite a senha do usuario: <input type="password" name="senha"></p>
        
                    <button type="submit">inserir</button>
        
        
                </form>
        
            </div>
        
            <div class ="col">
                <?php
                    $row = null;
        
                    if (isset($_POST['id_busca']) && !empty($_POST['id_busca'])) {
                        $ID_user = $_POST['id_busca'];
        
                        $stmt_search = $conn->prepare("SELECT id_func, nome, email, senha FROM funcionario WHERE id_func = ?");
                        $stmt_search->bind_param("i", $ID_user);
                        $stmt_search->execute();
                        $result = $stmt_search->get_result();
                        $row = $result->fetch_assoc();
                    }
        
                    $result_all = $conn->query("SELECT id_func, nome, email, senha FROM funcionario");
        
        
                ?>
                <!-- painel para buscar usuarios pelo id do banco de dados -->
                <h2>Buscar Usuário por ID</h2>
                <form class = "form-box" action="" method="post">
                    <input type="number" name="id_busca" placeholder="Digite o ID" required>
                    <button type="submit">Buscar</button>
                </form> 
        
                <table>
                    <?php if ($row) {?>
                        <tr>
                            <!--tabela mostrada quando se encontra o usuario-->
                            <?php echo "<h3>Usuário encontrado:</h3>";?>
        
                            <td><?php echo "ID: " . e($row['id_func']) . "<br>";?></td>
        
                            <td><?php echo "Nome: " . e($row['nome']) . "<br>";?></td>
        
                            <td><?php echo "Email: " . e($row['email']) . "<br>"; ?></td>
        
                            <td><?php echo "Senha: " . e($row['senha']) . "<br>"; ?></td>
        
                            <td>
                            <!-- Botão Editar -->
                            <button class="bicon edit"
                                data-id="<?= e($row['id_func']) ?>"
                                data-nome="<?= e($row['nome']) ?>"
                                data-email="<?= e($row['email']) ?>">
                                <img class="icon" src="img/botao-editar.png" alt="Editar">
                            </button>
                            </td>
                            <td>
                                <form class="form-box" action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= e($row['id_func']) ?>">
                                <button class="bicon delete" type="submit">
                                     <img class="icon" src="img/excluir (1).png" alt="">
                                </button>
                                </form>
                            </td>
                            </tr>
                </table>
                <?php } else { ?>
                    <p>Usuário não encontrado</p>
                <?php } ?>
                        </tr>
                </table>
            </div>
        </div>
    </section>
                    <!-- lista de todos os usuarios do banco -->
    <section>
        <div>
            <h2>Lista de Usuários</h2>
            <table class="users">
                <tr>
                    <th class="user">ID</th>
                    <th class="user">Nome</th>
                    <th class="user">Email</th>
                    <th class="user">Senha</th>
                    <th class="user">Ações</th>
                </tr>
                <?php while ($row = $result_all->fetch_assoc()) { ?>
                <tr>
                    <td class="user">
                        <?php // evitando xss
                             echo htmlspecialchars($row['id_func'], ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="user">
                        <?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="user">
                        <?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="user">
                
                        <?php echo htmlspecialchars($row['senha'], ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="user">
                        <div class="actions">
                            <!-- Botão Editar seguro usando data-* -->
                            <button class="bicon edit"
                                data-id="<?php echo htmlspecialchars($row['id_func'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-nome="<?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-email="<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-senha="<?php echo htmlspecialchars($row['senha'], ENT_QUOTES, 'UTF-8'); ?>">
                                <img class="icon" src="img/botao-editar.png" alt="Editar">
                            </button>

                            <!-- Botão Excluir -->
                            <form action="delete.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id_func'], ENT_QUOTES, 'UTF-8'); ?>">
                                <button class="bicon delete" type="submit">
                                    <img class="icon" src="img/excluir (1).png" alt="Excluir">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>

        </div>
    </section>

                    <!-- modal para editar usuarios -->
   
        <div class="modal" id="modal">
        <div class="modal-content">
            <button class="close" onclick="fecharModal()">&times;</button>
            <form class="form-box" action="editar.php" method="post">
                
                <div class="form-group">
                    <p>ID do usuário:</p>
                    <input type="text" id="idvizual" disabled>
                    <input type="hidden" name="id" id="idUsuario">
                </div>
                
                <div class="form-group">
                    <p>nome de usuario:</p>
                    <input type="text" name="nome" id="nomeUsuario">
                </div>
                
                <div class="form-group">
                    <p>email de usuario:</p>
                    <input type="email" name="email" id="emailUsuario">
                </div>
                
                <div class="form-group">
                    <p>senha de usuario:</p>
                    <input type="text" name="senha" id="senhausuario">
                </div>
                
                <button type="submit" class="salvar-alteracoes">salvar alterações</button>
            </form> 
        </div>
    </div>
    <footer>
        <p>&copy; Nycolas & Mateus</p>
    </footer>
 
   <script src="index.js"></script>

    <!--feito por nycolas e matheus-->
</body>
</html>
