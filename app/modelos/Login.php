<?php

class Login extends Conexion
{
	public function __construct()
	{
		parent::__construct();
	}
	public function iniciarSesion(){
		extract($_POST);
		$usuario = self::limpiarSql(trim($user));
		$password = hash_hmac('sha256',self::limpiarSql(trim($pass)),$GLOBALS["secreto"]);
		$sql = "SELECT * from usuarios where vigente = 1;";
		$resultado = $this->ejecutarSql($sql);
		$arrayUsers = array();
		while ($row = $resultado->fetch_assoc()) {
            $arrayUsers[] = $row;
        }
        $array_usuario = array_filter($arrayUsers, function($usuario_fontana) use($usuario,$password){ 
        	//print_r($usuario." ".$password."<br/>"); 
			return trim($usuario_fontana["usuario"]) == $usuario and trim($usuario_fontana["password"]) == $password;
		}) ;
		if(count($array_usuario) > 0){
			$usu = $array_usuario[0];
			Session::crearSesion();
			$cedula = $usu["cedula"];
			$this->ejecutarSql("UPDATE usuarios set fecha_hora_ultimo_acceso = now() where cedula = $cedula and no_accesos = no_accesos + 1");
			$_SESSION["Nombre_Usuario"] = $usu["nombres"]." ".$usu["apellidos"];
			$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
			$_SESSION["cedula"] = $usu["cedula"];
			$_SESSION["token"] = Session::generarToken();
			return 1;
		}
		else{
			Session::destruirSesion();
			return "Error";
		}

	}
	public function cerrarSesion(){
		Session::destruirSesion();
		return 1;
	}

}  
?>