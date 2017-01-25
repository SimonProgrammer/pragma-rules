<?php 
    
    /**
    * Clase conexion Creada por Simon Lopez Higuera
    */
    class Conexion
    {
    	public static $con = '';
    	public function __construct()
    	{
    		self::$con = mysqli_connect($GLOBALS["host"],$GLOBALS["usuario"],$GLOBALS["password"],$GLOBALS["base"]);
    		if (mysqli_connect_errno())
		    {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
    	}
    	public function __destruct() {
	       gc_collect_cycles();
	   	}
	   	public function ejecutarSql($sql){
	   		self::$con->set_charset("utf8");
	   		$resultado = self::$con->query($sql);
	   		$response = ((preg_match("/INSERT/i",$sql) == true) ? self::$con->insert_id : $resultado);
	   		//self::cerrarConexion();
	   		return $response;
	   	}
	   	public function limpiarSql($sql){
	   		return mysqli_real_escape_string(self::$con,$sql);
	   	}
	   	public function limpiarRecursivo($recurso){
	   		$array = $recurso;
			is_array($array) ? array_walk_recursive($array, function(&$item, $key){
				mysqli_real_escape_string(self::$con,$item);
			}) : null;
			return $array;
	   	}
	   	public function cerrarConexion(){
	   		self::$con->close();
	   	}

    }
?>    