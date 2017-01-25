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
			    <li class="tab-option" data-href = "#tabs-2"><a>Listar Empleados</a></li>
		   </ul>
	    </li>
	    <li><a>Comics</a>
	       <ul>
			    <li class="tab-option" data-href = "#tabs-3"><a>Agregar Comic</a></li>
			    <li class="tab-option"><a>Buscar Comic</a></li>
			    <li class="tab-option"><a>Listar Comic</a></li>
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
	     <h4>Agregar Usuario</h4>
	     <form>
	     	<div class = "input_admin">
	     		<label>Nombre Completo</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="" placeholder="Nombre Completo" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Documento</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="" placeholder="Nombre Completo" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Telefono</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="" placeholder="Telefono" value = ""/>
	     		</div>
	     	</div>
	     	<div class = "input_admin">
	     		<label>Direccion</label>
	     		<div >
	     			<input type="text" class="agr_usuario input-form" name="" placeholder="Telefono" value = ""/>
	     		</div>
	     	</div>
	     </form>
	  </div>
	  <div id="tabs-2" class="tab-pane">
	    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
	  </div>
	  <div id="tabs-3" class="tab-pane">
	    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
	    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	  </div>
  </div>	
  
</body>
</html>