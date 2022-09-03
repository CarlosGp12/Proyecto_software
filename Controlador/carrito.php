<?php
require 'config.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $token=$_POST['token'];

        $tokentmp = hash_hmac('sha1', $id, KEY_TOKEN);

        if($token = $tokentmp){
            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id] += 1;
            }else{
                $_SESSION['carrito']['productos'][$id] = 1;
            }
            
            $datos['numero']= count($_SESSION['carrito']['productos']);
            $datos['ok']= true;

        }else{
            
            $datos['ok']= false;
        }

    }else{
        
        $datos['ok2']= false;
    }

echo json_encode($datos);
?>