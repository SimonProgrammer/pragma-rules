<?php

class Admin extends Conexion
{
	public function __construct()
	{
		parent::__construct();
	}
	public function AgrUsuario(){
		$request = Session::limpiarPeticion($_POST);
		extract($request);
		$usuario = trim($correo);
		$nombre = trim($nombre);
		$documento = trim($documento);
		$direccion = trim($direccion);
		$telefono = trim($telefono);
		$password = hash_hmac('sha256',trim($password),$GLOBALS["secreto"]);
		$sql = "SELECT * from usuarios where (usuario = '$usuario') or (documento = $documento);";
		$resultado = $this->ejecutarSql($sql);
		if($resultado->num_rows == 0) {
	        $sql = "INSERT INTO usuarios(documento,nombre,telefono,direccion,usuario,password)
	        VALUES($documento,'$nombre','$telefono','$direccion','$usuario','$password')";
	        $this->ejecutarSql($sql);
			return 1;
		}
		else{
			return 0;
		}
	}
	

}  
?>