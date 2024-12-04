<?php
require_once "conexion.php";
function insertar_los_datos($tablainsertar, $datosAInsertar)
{
    $key   = array_keys($datosAInsertar); //get key( column name)
    $value = array_values($datosAInsertar); //get values (values to be inserted)
    $query = "INSERT INTO $tablainsertar ( " . implode(',', $key) . ") VALUES('" . implode("','", $value) . "')";
    return $query;
}
function ActualizarDatos($table_name, $data, $where)
{
    $cols = array();
    foreach ($data as $key => $val) {
        if ($val == null) {
            $cols[] = "$key = NULL";
        } else {
            $cols[] = "$key = '$val'";
        }
    }
    $query = "UPDATE $table_name SET " . implode(', ', $cols) . " WHERE $where";
    return $query;
}
class ModeloPlantilla
{

    public static function mdlMostrarElementos($tabla)
    {
            $sql  = "SELECT * FROM $tabla";
            $stmt = Conexion::conectar()->prepare($sql);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
                $stmt->close();
                $stmt = null;
            } else {
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $stmt->errorInfo();
                print_r($arr);
            }
        
    }
    public static function mdlMostrarElementosConID($tabla, $id)
    {
            $sql  = "SELECT * FROM $tabla WHERE id = $id";
            $stmt = Conexion::conectar()->prepare($sql);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
                $stmt->close();
                $stmt = null;
            } else {
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $stmt->errorInfo();
                print_r($arr);
            }
        
    }

    public static function mdlIngresarDatas($tabla, $datos)
    {
        $sql  = insertar_los_datos($tabla, $datos);
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute()) {
            return "ok";
            $stmt->close();
            $stmt = null;
        } else {
            echo "\nPDOStatement::errorInfo():\n";
            $arr = $stmt->errorInfo();
            print_r($arr);
        }
    }

    public static function mdlActualizarDatas($tabla, $datos, $where)
    {
        $sql  = ActualizarDatos($tabla, $datos, $where);
        $stmt = Conexion::conectar()->prepare($sql);
        if ($stmt->execute()) {
            return "ok";
            $stmt->close();
            $stmt = null;
        } else {
            echo "\nPDOStatement::errorInfo():\n";
            $arr = $stmt->errorInfo();
            print_r($arr);
        }
    }

    static public function mdlBorrarEmpleado($tabla, $datos){
        $sql='DELETE FROM '.$tabla.' WHERE id = :idempleado';
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> bindParam(":idempleado", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";	
        }
        $stmt -> close();
        $stmt = null;
    }


}