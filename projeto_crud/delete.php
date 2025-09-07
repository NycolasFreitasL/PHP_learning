<?php
    include 'bd.php';

        //testa se ouve conexão com o Post

        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            
            $id = $_POST['id'];
            
        }

        //prepared statement para evitar SQL injection.

        if (!empty($id)) {

            $stmt = $conn -> prepare("DELETE FROM funcionario WHERE id_func = ?");
            $stmt -> bind_param("i",$id);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Usuário excluido com sucesso!');
                        window.location.href = 'index.php'; // redireciona para a lista
                    </script>";
            } else {
                echo "<script>
                        alert('Erro ao excluir usuário!');
                        window.location.href = 'index.php';
                    </script>";
            }

            $stmt -> close();

        }else{

            echo "<script>
                alert('ID inválido!');
                window.location.href = 'index.php';
              </script>";

        }

?>