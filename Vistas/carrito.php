
<?php
session_start();

$mensaje = "";
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
            } else {
                $mensaje .= "Incorrecto" . $ID;
            }
            if (is_string(openssl_decrypt($_POST['nombre_Produto'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre_Produto'], COD, KEY);
            } else {
                $mensaje .= "Incorrecto" . $NOMBRE;
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio_Venta'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio_Venta'], COD, KEY);
            } else {
                $mensaje .= "Incorrecto" . $PRECIO;
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
            } else {
                $mensaje .= "Incorrecto" . $CANTIDAD;
                break;
            }
            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD
                );

                $_SESSION['CARRITO'][0] = $producto;
            } else {
                $NumProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD
                );

                $_SESSION['CARRITO'][$NumProductos] = $producto;
                $_SESSION['total'] = $_POST['total'];
            }
            
            break;
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['id'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                    }
                }
            } else {
                $mensaje .= "Incorrecto" . $ID;
            }
            break;
    }
}
?>
