<?php
    
    include 'config.php';
    session_start();

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';



    $stmt = $pdo ->prepare("SELECT * FROM usuarios_cad WHERE email = :email");
    $stmt -> execute(['email' => $email]);
    $usuario = $stmt->fetch();



    if ($usuario) {  // Se achou algum usuário
        if (password_verify($senha, $usuario['senha'])) {  // Compara a senha digitada com o hash do banco
            session_start();               // Começa a sessão
            $_SESSION['usuario_id'] = $usuario['id'];  // Salva o ID do usuário na sessão
            $_SESSION['usuario_email'] = $usuario['email']; // Salva o email na sessão
            
            
            header("Location: dashboard.php"); exit;
        } else {
            
            header("location: index.php?erro=senha");
        }
    } else {
        
        header("location: index.php?erro=senha");
    }


    




?>



