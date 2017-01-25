<?php
	require_once('app/inicio/Session.php');
	Session::existeSession();
	Session::refrescar();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="images/icos/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="images/icos/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="images/icos/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="images/icos/manifest.json">
	<link rel="mask-icon" href="images/icos/safari-pinned-tab.svg" color="#0d00a8">
	<meta name="token" content="<?=$_SESSION["token"]?>">
	<meta name="theme-color" content="#ffffff">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/alertify/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="css/alertify/alertify.default.css">
    <link rel="stylesheet" type="text/css" href="css/menumaker/menumaker.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src = "https://code.jquery.com/jquery-3.1.1.min.js" ></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src = "js/menumaker/menumaker.min.js" ></script>
	<script type="text/javascript" src = "js/alertify/alertify.min.js"></script>
	<script type="text/javascript" src = "js/modules/admin.js"></script>
	<title>Admin</title>
</head>
<body>
	<div id="navbar">
	  <ul>
	    <li><a>Empleados</a>
	       <ul>
			    <li class="tab-option" data-href = "#agregar_usuario"><a>Agregar Empleado</a></li>
		   </ul>
	    </li>
	    <li><a>Comics</a>
	       <ul>
			    <li class="tab-option" data-href = "#tabs-3"><a>Agregar Comic</a></li>
			    <li id = "listado_comics" class="tab-option" data-href = "#listar_comics"><a>Listar Comic</a></li>
		   </ul>
	    </li>
	    <li id = "perfil_menu" ><a><?=$_SESSION["Nombre_Usuario"]?></a>
	       	<ul>
			    <li id ="cerrar_sesion"><a>Cerrar Sesion</a></li>
		  	</ul>
		</li>
	  </ul>
	</div>
  <div id = "tab-content">
  	  <div id="agregar_usuario" class="tab-pane active">
	     <h3>Agregar Empleado</h3>
	     <form id = "form_agr_usuario">
	     	<div class = "input_admin">
	     		<label>Nombre Completo</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="nombre" placeholder="Nombre Completo" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Documento</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form solo_numeros" name="documento" placeholder="Documento" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Telefono</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="telefono" placeholder="Telefono" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Direccion</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="direccion" placeholder="Direccion" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Usuario</label>
	     		<div>
	     			<input type="text" class="agr_usuario input-form email" name="correo" placeholder="Correo Electronico" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Password</label>
	     		<div>
	     			<input type="text" class="agr_usuario input-form password" name="password" placeholder="Password" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin derecha">
	     	    <label>          </label>
	     		<div>
	     			<input type="button" id = "save_usuario" class="agr_usuario button_success" name="" value="Guardar Usuario"/>
	     		</div>
	     	</div>
	     </form>
	  </div>
	  <div id="listar_comics" class="tab-pane">
	      <h3>Buscar Comics</h3>
	  	  <div id="busqueda_comic">
	  	  	  <div id = "input_comic">
	      		 <input type="text" id = "coincidencia_comic" class="input-form" placeholder="Digite el texto" value = ""/>
		      </div>
		      <div id = "button_search_comic">
		      	<input type="button" id = "search_comic" class="button_success" name="" value="Buscar"/>
		      </div>
	  	  </div>
	  	  <div id="contenedor_comics">
	  	  	
	  	  </div>
	  </div>
	  <div id="ver_comic" class="tab-pane">
	    
	  </div>
  </div>	
  
</body>
</html>