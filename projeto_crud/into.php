<?php
    //conexão com banco de dados.
    include "bd.php";
     
    if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
    $nome_user = $_POST['nome'];
    $email_user = $_POST['email'];
    $senha_user = $_POST['senha'];

    if (!empty($nome_user) && !empty($email_user) && !empty($senha_user)) {
    
        $stmt = $conn->prepare("INSERT INTO funcionario (nome,email,senha) VALUES (?,?,?)");
        $stmt->bind_param("sss", $nome_user, $email_user, $senha_user);
        $stmt->execute();  
    }


    // Redireciona para a mesma página para evitar reenvio
    header("Location: index.php");
    exit;
}


?>