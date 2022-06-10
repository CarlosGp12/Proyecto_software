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
            $tabla .= "<td>" . $fila['codigo1'] . "</td>";
            $tabla .= "<td>" . $fila['direccion'] . "</td>";
            $tabla .= "<td>" . $fila['email'] . "</td>";
            $tabla .= "<td><button type='button' class='btn btn-outline-dark' onclick='editar(" . $fila['id'] . ")'>Editar</button></td>";
            $tabla .= "<td> <button type='button' class='btn btn-danger' onclick='eliminar(" . $fila['id'] . ")' </button>
            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='Black' class='bi bi-pencil' viewBox='0 0 16 16' onclick='eliminar(" . $fila['id'] . ")'>Eliminar>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg></td>";
            $tabla .= "<tr>";
        }
        echo $tabla;
        break;

    case 'ingresar':
        $datos['usuario'] = $_POST['usuario'];
        $datos['codigo1'] = $_POST['codigo1'];
        $datos['direccion'] = $_POST['direccion'];
        $datos['email'] = $_POST['email'];
    
        if ($objregistro->nuevo($datos)) {
            echo "Registro ingresado";
        } else {
            echo "Error al registrar";
        }
        break;

    case 'actualizar':
        $filtro['id'] = $_POST['codigo'];
        $datos['usuario'] = $_POST['usuario'];
        $datos['codigo1'] = $_POST['codigo1'];
        $datos['direccion'] = $_POST['direccion'];
        $datos['email'] = $_POST['email'];
        echo $datos = $objregistro->Guardar($datos, $filtro);
        break;

    case 'consultaxcodigo':
        $filtro['id'] = $_POST['codigo'];
        echo json_encode($datos = $objregistro->ObtenerFiltro($filtro));
        break;
    case 'eliminar':
        echo json_encode($datos = $objregistro->Eliminar($_POST['id']));
        break;
    
}