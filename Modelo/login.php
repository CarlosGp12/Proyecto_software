<?php
    include_once 'database.php';
    session_start();
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ../Vistas/index_t.php');
            break;

            case 2:
            header('location: ../Vistas/Mantenimiento/Opciones2.php');
            break;

            case 3:
                header('location: ../Vistas/index.html');
                break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    

        $db = new Database();
        $query = $db->conectar()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);
        $_SESSION['username']= $username;
        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){  
             // validar rol
            $rol = $row[4];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('location: ../Vistas/index_t.php');
                break;
    
                case 2:
                header('location: ../Vistas/Mantenimiento/Opciones2.php');
                break;
    
                case 3:
                    header('location: ../Vistas/index.html');
                    break;
    
                default:
            }
 
        }else{
            header("Location: http://localhost/Proyecto_software/Vistas/login.php?error=Usuario o Contraseña Incorrecta");
             exit();
        }   
    }else{
    header("Location:login.php");
    exit();
    }
?>