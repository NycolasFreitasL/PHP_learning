<?php
    function fatorial($number){
        $res = 1;
        for ($i=1; $i <= $number ; $i++) { 
            $res = $res * $i;
            echo "$res <br>";
        }
    }

    fatorial(5)
?>