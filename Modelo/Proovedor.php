<?php
require_once("Conexion.php");
class Proovedor
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('proveedor');
		return $Admin;
	}
	public function nuevo($datos)
	{
		$conexion = new Conexion;
		$Admin = $conexion->insertar('proveedor', $datos);
		return $Admin;
	}
	public function Guardar($datos, $filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->actualizar('proveedor', $datos, $filtro);
		return $Admin;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultarFiltro('proveedor', $filtro);
		return $Admin;
	}
	
	public function Eliminar($filtro)
	{
		$conexion=new Conexion;
		$Admin=$conexion->eliminar('proveedor',$filtro);
		return $Admin;
	}

}
