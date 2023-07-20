
<?php
include("calculadora.html");

    $v1 = $_POST['v1'];
    $valor2 = $_POST['v2'];
    $op = $_POST['op'];

    if(empty($v1) || empty($v2) || empty($op))
    {
        echo "Faltou alguma coisa...";
    }
    else
    {
        switch($operacao)
        {
            case "Soma":
                $r = $v1 + $v2;
                echo "Resultado: $r";
            break;
            case "Subtração":
                $r = $v1 - $v2;
                echo "Resultado: $r";
            break;
            case "Divisão":
                $r = $v1 / $v2;
                echo "Resultado: $r";
            break;
            case "Multiplicação":
                $r = $v1 * $v2;
                echo "Resultado: $r";
            break;
        }
    }


?>
