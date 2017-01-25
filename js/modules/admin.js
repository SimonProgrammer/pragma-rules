var Admin = function(ruta){
	this.validarCampos = function(clase){
		var respuesta = false;
		var campos = $(clase);
		$.each(campos,function( key, value ) {
			var vacio = false;
		    var texto = '';
		  	if($(this).is('input[type="text"]') || $(this).is('input[type="password"]') || $(this).is('textarea')) {
		  		vacio = (($(this).val().trim() == '') ? true : false);
			}
			else if($(this).is('input[type="email"]')){
			    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				vacio = !regex.test($(this).val().trim());
			}

			if(vacio){
				$(this).addClass('input_vacio');
				$(this).val('');
				$("body").on('click keyup keypress blur change',clase,function(){
					$(this).removeClass('input_vacio');
				});
				respuesta = true;
			}
		});
		return respuesta;
	}
	this.cerrarSesion = function(){
		$.ajax({
		  method: "POST",
		  url: 'rest/login.php',
		  data: {accion :'cerrar_sesion'},
		  success: function(result){
		  	if(result == 1){
		  		window.location.href = "index.php";
		  	}
		  }
		});
	}
	this.prueba = function(){
		$.ajax({
		  method: "POST",
		  url: ruta,
		  data: {accion :'cerrar_sesion'},
		  success: function(result){
		  	if(result == 1){
		  		window.location.href = "index.php";
		  	}
		  }
		});
	}
	this.inicializar = function(){
		$("#navbar").menumaker({
		    title: "Menu",              // The text of the button which toggles the menu
		    breakpoint: 768,            // The breakpoint for switching to the mobile view
		    format: "multitoggle"       // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
		});
	}

}
var admin = new Admin('rest/admin.php');
$(function(){
	admin.inicializar();
	$.ajaxSetup({
	    headers: {
	       'token': $('meta[name="token"]').attr('content')
	    }
	});
	$("body").on('click',"#cerrar_sesion",function(){
		admin.cerrarSesion();
	});
	$("#navbar").on('click',".tab-option",function(){
		var id = $(this).data('href');
		$(id).addClass('active').siblings().removeClass('active');
	});
});