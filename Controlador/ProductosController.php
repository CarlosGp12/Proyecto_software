<?php
require_once("../Modelo/Productos.php");
$objregistro = new Productos;
switch ($_POST['opcion']) {
    case 'consultar':
        $datos = $objregistro->ObtenerTodos();
        $tabla = "";

        foreach ($datos as $fila) {
            $tabla .= "<tr>";
            $tabla .= "<th scope='row'>" . $fila['id'] . "</th>";
            $tabla .= "<td>" . $fila['nombre'] . "</td>";
            $tabla .= "<td>" . $fila['descripcion'] . "</td>";
            $tabla .= "<td>" . $fila['f_fabricacion'] . "</td>";
            $tabla .= "<td>" . $fila['f_caducidad'] . "</td>";
            $tabla .= "<td>" . $fila['precio'] . "</td>";
            $tabla .= "<td><button type='button' class='btn btn-outline-dark' onclick='editar(" . $fila['id'] . ")'>Editar</button></td>";
            $tabla .= "<tr>";
        }
        echo $tabla;
        break;

    case 'ingresar':
        $datos['nombre'] = $_POST['nombre'];
        $datos['descripcion'] = $_POST['descripcion'];
        $datos['f_fabricacion'] = $_POST['f_fabricacion'];
        $datos['f_caducidad'] = $_POST['f_caducidad'];
        $datos['precio'] = $_POST['precio'];

        if ($objregistro->nuevo($datos)) {
            echo "Registro ingresado";
        } else {
            echo "Error al registrar";
        }
        break;

    case 'actualizar':
        $filtro['id'] = $_POST['codigo'];
        $datos['nombre'] = $_POST['nombre'];
        $datos['descripcion'] = $_POST['descripcion'];
        $datos['f_fabricacion'] = $_POST['f_fabricacion'];
        $datos['f_caducidad'] = $_POST['f_caducidad'];
        $datos['precio'] = $_POST['precio'];
        echo $datos = $objregistro->Guardar($datos, $filtro);
        break;

    case 'consultaxcodigo':
        $filtro['id'] = $_POST['codigo'];
        echo json_encode($datos = $objregistro->ObtenerFiltro($filtro));
        break;
}