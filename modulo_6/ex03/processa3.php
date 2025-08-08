<?php

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == "admin" && $senha == 1234) {
        echo "bem vindo de volta usuário";
    }else {
        echo "usuário ou senha incorretos";
    }
//feito por nycolas e mateus
?>