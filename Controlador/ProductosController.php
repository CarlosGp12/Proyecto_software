<?php
require_once("../Modelo/Admin.php");
$objregistro = new Admin;
switch ($_POST['opcion']) {
	case 'consultar':
		$datos = $objregistro->ObtenerTodos();
		$tabla = "";

		foreach ($datos as $fila) {
			$tabla .= "<tr>";
			$tabla .= "<th scope='row'>" . $fila['id_admin'] . "</th>";
			$tabla .= "<td>" . $fila['usuario'] . "</td>";
			$tabla .= "<td>" . $fila['clave'] . "</td>";
			$tabla .= "<td><button type='button' class='btn btn-outline-dark' onclick='editar(" . $fila['id_admin'] . ")'>Editar</button></td>";
			$tabla .= "<tr>";
		}
		echo $tabla;
		break;

	case 'ingresar':
		$datos['usuario'] = $_POST['usuario'];
		$datos['clave'] = $_POST['clave'];

		if ($objregistro->nuevo($datos)) {
			echo "Registro ingresado";
		} else {
			echo "Error al registrar";
		}
		break;

	case 'actualizar':
		$filtro['id_admin'] = $_POST['codigo'];
		$datos['usuario'] = $_POST['usuario'];
		$datos['clave'] = $_POST['clave'];
		echo $datos = $objregistro->Guardar($datos, $filtro);
		break;

	case 'consultaxcodigo':
		$filtro['id_admin'] = $_POST['codigo'];
		echo json_encode($datos = $objregistro->ObtenerFiltro($filtro));
		break;
}
