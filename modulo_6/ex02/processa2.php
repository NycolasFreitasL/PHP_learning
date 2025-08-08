<?php

    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $opcao = $_POST["opcao"];

    if ($opcao == "soma") {
        $res = $n1 + $n2;
        echo "o resultado é: $res";
    }elseif ($opcao == "sub") {
        $res = $n1 - $n2;
        echo "o resultado é: $res";
    }elseif ($opcao == "div") {
        $res = $n1 / $n2;
        echo "o resultado é: $res";
    }elseif ($opcao == "mult") {
        $res = $n1 * $n2;
        echo "o resultado é: $res";
    }
?>