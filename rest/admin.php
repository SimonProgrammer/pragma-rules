<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	  header('Method Not Allowed', true, 405);
	  echo "Error";
	  exit;
	}

    require_once('../app/inicio/inicio.php');
    require_once('../app/modelos/Admin.php');


	if(Session::validacion()){
		$admin = new Admin();
		switch ($_POST["accion"]) {
			case 'agrnoticia':
				echo $admin->AgrNoticia();
				break;
			default:
				echo "Error";
 				break;
		}	
	}
	else if(isset($_GET)){
		echo "Error";
	}
	else{
		echo "Error";
	}  
?>