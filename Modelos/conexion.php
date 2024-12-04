<?php
class Conexion{
	
	static public function conectar(){
		include "config.php";
		$link = new PDO("mysql:host=".$configuracionesBDlocal['conexion']['host'].";dbname=".$configuracionesBDlocal['conexion']['dbname'],$configuracionesBDlocal['conexion']['usuario'],$configuracionesBDlocal['conexion']['contrasena']);
		$link->exec("set names utf8");
		return $link;
	}
}

