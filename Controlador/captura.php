<?php
    require '../Modelo/database.php';
    require 'config.php';

    $db=new Database();
    $con=$db->conectar();

    $productos=isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos']: null;

    $cliente = $_POST['cbx_cliente'];
    $vendedor =  $_POST['vendedor'];

    $res_cliente = $db->conectar()->prepare('SELECT  * FROM usuario WHERE nombre_Usuario = :vendedor');
    $res_cliente->execute(['vendedor' => $vendedor]);
    $rowcliente = $res_cliente->fetch(PDO::FETCH_NUM);

  

    if($rowcliente == true){  
       
        $row = $rowcliente[0];

        

        foreach($productos as $clave => $cantidad){ //$clave es id del producto y la cantidad que va a tener
            $sql= $con->prepare("SELECT id, nombre_Produto, stock, precio_Venta FROM producto WHERE id=?");
            $sql->execute([$clave]); //arreglo con la clave
            $row_prod =$sql->fetch(PDO::FETCH_ASSOC); //va a traer producto por producto

            //$fecha =Date('Y/m/d/H/i/s');
            $precio= $row_prod['precio_Venta'];
            $descuento= '0';
            $des_total= $precio - (($precio * $descuento)/100);
            $total = $cantidad * $des_total;
            $stock = $row_prod['stock'];
            $stock1 = $cantidad;
            $stockT = ($stock - $stock1);

            $sql_insert= $con->prepare("INSERT INTO factura (ID_Usuario, ID_Cliente, fecha, detalle, ID_Producto, nombre_Producto, nombre_Proveedor,
             precio_Venta, cantidad, total) VALUES (?,?,NOW(),?,?,?,?,?,?,?)");
            $sql_insert->execute([$row, $cliente, 'Venta', $clave, $row_prod['nombre_Produto'], '', $row_prod['precio_Venta'], $cantidad, 
            $total ]);
            
           
            $query = $con->prepare("UPDATE producto SET stock = $stockT WHERE id = $clave");
            $query->execute();
            //Retorno

            switch($_SESSION['rol']){
                case 1:
                    header('location: ../Vistas/index_t.php');
                break;
    
                case 2:
                header('location: ../Vistas/Mantenimiento/Opciones2.php');
                break;
    
                case 3:
                    header('location: ../Vistas/index_v.php');
                    break;
    
                default:
            }
 
        }
        unset($_SESSION['carrito']); //finaliza la session del carrito
       

    }else{
        header("Location: pago.php?error=Usuario o Contraseña Incorrecta");
        exit();
    }
    



?>