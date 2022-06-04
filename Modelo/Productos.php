<?php
require_once("Conexion.php");
class Productos
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('productos');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('productos', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('productos', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('productos', $filtro);
		return $Admin;
	}
}
