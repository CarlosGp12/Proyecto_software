<?php
require_once("../Modelo/Vendedor.php");
$objregistro = new Proovedor;
switch ($_POST['opcion']) {
    case 'consultar':
        $datos = $objregistro->ObtenerTodos();
        $tabla = "";

        foreach ($datos as $fila) {
            $tabla .= "<tr>";
            $tabla .= "<th scope='row'>" . $fila['id'] . "</th>";
            $tabla .= "<td>" . $fila['usuario'] . "</td>";
            $tabla .= "<td>" . $fila['codigo'] . "</td>";
            $tabla .= "<td>" . $fila['direccion'] . "</td>";
            $tabla .= "<td>" . $fila['email'] . "</td>";
            $tabla .= "<td><button type='button' class='btn btn-outline-dark' onclick='editar(" . $fila['id'] . ")'>Editar</button></td>";
            $tabla .= "<tr>";
        }
        echo $tabla;
        break;

    case 'ingresar':
        $datos['nombre'] = $_POST['usuario'];
        $datos['apellido'] = $_POST['codigo'];
        $datos['direccion'] = $_POST['direccion'];
        $datos['direccion'] = $_POST['email'];
    
        if ($objregistro->nuevo($datos)) {
            echo "Registro ingresado";
        } else {
            echo "Error al registrar";
        }
        break;

    case 'actualizar':
        $filtro['id'] = $_POST['codigo'];
        $datos['nombre'] = $_POST['usuario'];
        $datos['apellido'] = $_POST['codigo'];
        $datos['direccion'] = $_POST['direccion'];
        $datos['direccion'] = $_POST['email'];
        echo $datos = $objregistro->Guardar($datos, $filtro);
        break;

    case 'consultaxcodigo':
        $filtro['id'] = $_POST['codigo'];
        echo json_encode($datos = $objregistro->ObtenerFiltro($filtro));
        break;
}