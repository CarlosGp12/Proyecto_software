<?php
require_once("Conexion.php");
class Productos
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('producto');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('producto', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('producto', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('producto', $filtro);
		return $Admin;
	}
	
	public function Eliminar($filtro)
	{
		$conexion=new Conexion;
		$Admin=$conexion->eliminar('producto',$filtro);
		return $Admin;
	}

}
