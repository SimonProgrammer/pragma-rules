<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	  header('Method Not Allowed', true, 405);
	  echo "Error";
	  exit;
	}
    // echo "<pre>".print_r(scandir("../../"), 1)."</pre>";
    require_once('../app/inicio/inicio.php');
    require_once('../app/modelos/Login.php');

	if(isset($_POST["accion"])){
		$login = new Login();
		print_r("entra");
		switch ($_POST["accion"]) {
			case 'login':
				echo $login->iniciarSesion();
				break;
			case 'cerrar_sesion':
				echo $login->cerrarSesion();
				break;
			default:
				echo "Error";
 				break;
		}
	}
	else if(isset($_GET)){
		echo "Error";
	}  
?>