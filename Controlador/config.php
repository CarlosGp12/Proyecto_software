<?php

define("CLIENT_ID", "AdZ66r9il-dpVgDtYdO-W4TPZiqzfismlD276jilKUNbc8-CWCF2AMZC4sti_InNUFn9hQ0r7jNSjJaH");
define("KEY_TOKEN", "ESK*ATv}Dz");

    session_start();

$num_cart = 0;
//Indicar si la variable carito y producto existe , y si esta cuentala

 if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count ($_SESSION['carrito']['productos']);

}

?>