<?php
/**
 * 
 */
 class Session
 {
 	
 	public function __construct()
 	{
 	}
 	public function __destruct() {
	    gc_collect_cycles();
	}
 	public function crearSesion(){
 		session_start();
 	}
 	public function destruirSesion(){
 		session_start();
 		session_unset();
 		session_destroy();

 	}
 	public function generarToken(){
 		return  md5(uniqid(microtime(),true));
 	}
 	public function refrescar(){
 		$_SESSION["token"] = Session::generarToken();
 	}
 	public function violacion(){
 		session_unset();
 		session_destroy();
 		echo '<script>window.location.href="index.php";</script>';
 	}
 	public function existeSession(){
 		self::crearSesion();
 		if(!(isset($_SESSION["Nombre_Usuario"]) and isset($_SESSION["token"]) and ($_SESSION["ip"] == $_SERVER['REMOTE_ADDR'])))
 		{
 			header("HTTP/1.0 404 Not Found");
 			exit;
 		}
 	}
 	public function validacion(){
 		self::crearSesion();
 		$headers = apache_request_headers();
 		if(isset($_POST["accion"]) and isset($_SESSION["Nombre_Usuario"]) and isset($_SESSION["token"]) and isset($headers["token"]))
 		{
 			if($headers["token"] == $_SESSION["token"] and $_SESSION["ip"] == $_SERVER['REMOTE_ADDR']){
				return true;
			}
			else{
				return false;
			}
 		}
 	}
 	public function limpiarPeticion($recurso){
 		$conexion = new Conexion();
 		$request = $conexion->limpiarRecursivo($recurso);
 		return $request;
 	}
 } 
 ?>