<?php
    include 'config.php';

    $nome  = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senha2 = $_POST['confirmar_senha'] ?? '';

    if ($senha !== $senha2) {
        // Redireciona de volta para o formulário com aviso
        header("Location: registrar.php?erro=senhas");
        exit;
    }

    try {
        $senhasegura = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO usuarios_cad (nome, email, senha)
            VALUES (:nome, :email, :senha)
        ");

        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhasegura
        ]);

        // Redireciona com mensagem de sucesso
        header("Location: registrar.php?sucesso=1");
        exit;

    } catch (PDOException $e) {
        header("Location: registrar.php?erro=banco");
        exit;
    }
?>
