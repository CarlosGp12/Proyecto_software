<?php
require_once("Conexion.php");
class Clientes
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('clientes');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('clientes', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('clientes', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('clientes', $filtro);
		return $Admin;
	}
	public function Eliminar($filtro)
	{
		$conexion=new Conexion;
		$Admin=$conexion->eliminar('clientes',$filtro);
		return $Admin;
	}

}
