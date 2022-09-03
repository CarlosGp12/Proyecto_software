<?php
require '../Controlador/config.php';
require 'database.php';
if(isset($_POST['action'])){

    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if ($action == 'agregar'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id, $cantidad);
        if($respuesta>0) {
            $datos['ok']=true;
        }else{
            $datos['ok']=false;
        }
        $datos['sub']= number_format($respuesta, 2, '.', ','); //sub es subtotal y el formato de la respuesta
    } else if ($action == 'eliminar') {
        $datos['ok']= eliminar($id); //traemos a la funcion y la almacenamos en datos 

    }else{
        $datos['ok']=false;
    }

}else{
    $datos['ok']=false;
}
echo json_encode($datos);

function agregar($id, $cantidad){
    $res = 0; //respuesta

    if($id >0 and $cantidad >0 and is_numeric(($cantidad))){ 
        if(isset($_SESSION['carrito']['productos'][$id])){//validacion para ver si existe el id del producto en la variable de session
            $_SESSION['carrito']['productos'][$id]= $cantidad;

            $db=new Database();
            $con= $db->conectar();

            $sql= $con->prepare("SELECT *FROM producto WHERE id=? LIMIT 1");
            $sql->execute([$id]); //id para que se ejecute
            $row = $sql->fetch(PDO::FETCH_ASSOC); //regresa una fila
            $precio=$row['precio_Venta'];
            $descuento='0';
            $des_total=$precio - (($precio * $descuento)/100);
            $res=$cantidad * $des_total;

            return $res;

        }
    }else{
        return $res; //caso que no valide res vale 0
    }
}

function eliminar($id){

    if ($id>0){
        if(isset($_SESSION['carrito']['productos'][$id])){//validacion para ver si existe el id del producto en la variable de session
            unset ($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }else{
        return false;
    }
}

?>