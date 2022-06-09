<?php
class Conexion
{
    private $usuario = "root";
    private $pass = "";
    private $dbcon = null;
    private $dns = "mysql:host=localhost:3306;dbname=farmacia";
    private $error = null;

    private function conectar()
    {
        try {
            $this->dbconn = new PDO(
                $this->dns,
                $this->usuario,
                $this->pass
                );
            $this->dbconn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            return true;
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function consultar($tabla)
    {
        try {
            if (!$this->conectar()) {
                return "No conecta" . $this->error;
                exit;
            }
            $query = "Select * from $tabla";
            $result_set = $this->dbconn->prepare($query);
            $result_set->execute();
            $result = $result_set->fetchAll();
            return $result;
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertar($tabla, $datos)
    {
        try {
            $this->conectar();
            $sql = "INSERT INTO $tabla(";
            foreach ($datos as $clave => $valor) {
                $sql .= $clave . ",";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . ") VALUES(";
            foreach ($datos as $clave => $valor) {
                $sql .= ":" . $clave . ",";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . ")";
            $stmt = $this->dbconn->prepare($sql);
            foreach ($datos as $clave => $valor) {
                $clave = ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            $stmt->execute();
            return "Datos insertados...";
        }
        catch (Exception $e) {
            $this->error = $e->getMessage();
            return "Error al insertar... " . $this->error;
        }
    }

    public function consultarFiltro($tabla, $filtro)
    {
        try {
            if (!$this->conectar()) {
                return "No conecta" . $this->error;
                exit;
            }
            $query = "Select * from $tabla where ";
            foreach ($filtro as $clave => $valor) {
                $query .= "$clave = :$clave and ";
            }
            $query = substr($query, 0, strlen($query) - 4);
            $result_set = $this->dbconn->prepare($query);
            foreach ($filtro as $clave => $valor) {
                $clave = ':' . $clave;
                $result_set->bindValue($clave, $valor);
            }
            $result_set->execute();
            $result = $result_set->fetchAll();
            return $result;
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizar($tabla, $datos, $filtro)
    {
        try {
            $this->conectar();
            $sql = "Update $tabla set ";
            foreach ($datos as $clave => $valor) {
                $sql .= "$clave= :$clave,";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . " where ";
            foreach ($filtro as $clave => $valor) {
                $sql .= "$clave = :$clave and ";
            }
            $sql = substr($sql, 0, strlen($sql) - 4);
            $stmt = $this->dbconn->prepare($sql);
            foreach ($datos as $clave => $valor) {
                $clave = ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            foreach ($filtro as $clave => $valor) {
                $clave = ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            $stmt->execute();
            return "Datos actualizados...";
        }
        catch (Exception $e) {
            $this->error = $e->getMessage();
            return "Error al actualizar... " . $this->error;
        }
    }
    public function eliminar($tabla,$datos)
	{	
		try {
			$this->conectar();
			$sql = "delete from $tabla where id = $datos";
			$stmt = $this->dbconn->prepare($sql);
			// execute the insert statement
			$stmt->execute();
			return "Registro Eliminado...";
		} catch (Exception $e) {
			$this->error= $e->getMessage();
			return "Error al eliminar... ".$this->error;
		}
	}
}
