<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];

    echo "nome: $nome<br> email: $email<br> idade: $idade";

}
   


?>