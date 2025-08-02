<?php
//$produtos = ["shampoo" => 17.90,"sabonete"=> 8.00];
    function produto($produtos){
        foreach ($produtos as $key => $value) {
            echo "$key : $value <br>";
        };
    };

    produto(["shampoo" => 17.91,"sabonete"=> 8.81, "pasta de dente"=> 17.50]);
?>