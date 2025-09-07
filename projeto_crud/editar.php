<?php

    include 'bd.php';

    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }

    if (!empty($id) && !empty($nome) && !empty($email) && !empty($senha)) {

        $stmt = $conn -> prepare("UPDATE funcionario SET nome = ?, email = ?, senha = ? WHERE id_func = ?");
        $stmt -> bind_param("sssi",$nome,$email,$senha,$id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Usuário atualizado com sucesso!');
                    window.location.href = 'index.php'; // redireciona para a lista
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao atualizar usuário!');
                    window.location.href = 'index.php';
                  </script>";
        }

        $stmt -> close();

    }else {
        echo "<script>
                alert('Preencha todos os campos!');
                window.location.href = 'index.php';
              </script>";
    }
    $conn = close();

?>