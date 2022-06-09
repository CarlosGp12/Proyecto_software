<?php
require_once("Conexion.php");
class Proovedor
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('proovedor');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('proovedor', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('proovedor', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('proovedor', $filtro);
		return $Admin;
	}
	
	public function Eliminar($filtro)
	{
		$conexion=new Conexion;
		$Admin=$conexion->eliminar('proovedor',$filtro);
		return $Admin;
	}

}
