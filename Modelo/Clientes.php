<?php
require_once("Conexion.php");
class Clientes
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('cliente');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('cliente', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('cliente', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('cliente', $filtro);
		return $Admin;
	}
	public function Eliminar($filtro)
	{
		$conexion=new Conexion;
		$Admin=$conexion->eliminar('cliente',$filtro);
		return $Admin;
	}

}
