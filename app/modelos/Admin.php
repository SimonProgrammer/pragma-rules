<?php

class Admin extends Conexion
{
	public function __construct()
	{
		parent::__construct();
	}
	public function iniciarSesion(){
		extract($_POST);
		$usuario = self::limpiarSql(trim($user));
		$password = hash_hmac('sha256',self::limpiarSql(trim($pass)),$GLOBALS["secreto"]);
		$sql = "SELECT id_usuario,documento,nombre,telefono,direccion,activo from usuarios where (usuario = '$usuario') and (password = '$password') limit 1;";
		$resultado = $this->ejecutarSql($sql);
		if($resultado->num_rows > 0) {
			$usu = $resultado->fetch_assoc();
			$cedula = $usu["documento"];
			Session::crearSesion();
			$_SESSION["Nombre_Usuario"] = $usu["nombre"];
			$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
			$_SESSION["cedula"] = $cedula;
			$_SESSION["token"] = Session::generarToken();
			return 1;
		}
		else{
			return 0;
		}
	}
	

}  
?>