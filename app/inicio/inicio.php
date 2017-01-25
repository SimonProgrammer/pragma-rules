<?php  
   // print_r(scandir("../app/configuracion/"));
   $array = parse_ini_file('../app/configuracion/init_pragma.ini');
   foreach ($array as $key => $value) {
   	  $GLOBALS[$key] = $value;
   }
   
   if($GLOBALS["errores"] == 0){
      error_reporting($GLOBALS["errores"]);
   }
   
   require_once('Conexion.php');
   require_once('Session.php');
?>