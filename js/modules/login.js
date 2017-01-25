var Login = function(ruta){
	this.iniciarFondo = function(){
		var pattern = Trianglify({
	    height: screen.height,
	    width: screen.width,
	    cell_size: 30 + Math.random() * 100});
	  	document.body.appendChild(pattern.canvas());
	  	$("canvas").fadeTo("slow",1);
	}
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
	this.loguear = function(){
		if(!this.validarCampos('.login_input')){
			var usuario = $("#usuario").val();
			var password = $("#password").val();
			$.ajax({
			  method: "POST",
			  url: ruta,
			  data: { user: usuario, pass: password, accion : 'login' },
			  success: function(result){
			  	if(result == 1){
			  		window.location.href = "admin.php";
			  	}
			  	else{
			  		alertify.set({delay: 2000});
					alertify.error("Usuario o Password Erroneo");
			  	}
			  }
			});
		}
		else{
			alertify.set({delay: 3000});
			alertify.error("Complete los campos");
		}
	}
}
var login = new Login('rest/login.php');
$(function(){
	login.iniciarFondo();
	$("body").on('click',"#loguear_usu",function(){
		login.loguear();
	});
	$("body").on('keypress',".login_input",function(e){
		if(e.which == 13) {
       	   login.loguear();
    	}
	});
});