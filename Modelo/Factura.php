<?php
require_once("Conexion.php");
class Factura
{
	public function ObtenerTodos()
	{
		$conexion = new Conexion;
		$Admin = $conexion->consultar('factura');
		return $Admin;
	}
}
