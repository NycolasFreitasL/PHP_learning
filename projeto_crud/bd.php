<?php

    //realiza a conexão com o banco de dados

    $host ="localhost";
    $user = "root";
    $pass ="";
    $bdname = "funcionarios";


    $conn = new mysqli($host,$user,$pass,$bdname);

    if ($conn-> connect_error) {
        die("falha na conexão: ".$con->connect_error);}
    else {
        //echo "tá funfando essa bomba";
    }
    


?>