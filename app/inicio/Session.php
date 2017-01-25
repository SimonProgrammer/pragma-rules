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
 	public function violacion(){
 		session_unset();
 		session_destroy();
 		echo '<script>
    	window.location.href="login.php";
    	</script>';
 	}
 	public function validacion(){
 		self::crearSesion();
 		if(isset($_POST["accion"]) and isset($_SESSION["Nombre_Usuario"]) and isset($_SESSION["token"]) and isset($_POST["token"]))
 		{
 			if($_POST["token"] == $_SESSION["token"] and $_SESSION["ip"] == $_SERVER['REMOTE_ADDR']){
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