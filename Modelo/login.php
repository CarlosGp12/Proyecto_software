<?php
require_once ('database.php');
    $db=new Database();
    $con=$db->conectar();
    session_start();

if (isset($_POST['Login'])) {

    $user_data='usuario='.$_POST['usuario'].'&password='.$_POST['password'];
    
    if(empty($_POST['usuario'])){
        header("Location: http://localhost/Proyecto_software/Vistas/login.php?error=El usuario es requerido&$user_data");
        exit();
    }else if (empty ($_POST['password'])){
        header("Location: http://localhost/Proyecto_software/Vistas/login.php?error=La contrasena es requerido");
        exit();
    }else{
        $sql = "SELECT * FROM supervisor WHERE user= '".$_POST['usuario']."' AND password='".$_POST['password']."'";
        $result = $con->query($sql);
        
        if($result->fetch()){
                
                $_SESSION['User']=$_POST['usuario'];
            
                 header("Location: http://localhost/Proyecto_software/Vistas/index_t.php");
                exit();
            
            }else{
               header("Location: http://localhost/Proyecto_software/Vistas/login.php?error=Usuario o Contraseña Incorrecta");
                exit();
        }
        
        
    
        
   }
}else{
    header("Location:login.php");
    exit();
}