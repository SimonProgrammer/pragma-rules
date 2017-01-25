var Login = function(){
	this.iniciarFondo = function(){
		var pattern = Trianglify({
	    height: screen.height,
	    width: screen.width,
	    cell_size: 30 + Math.random() * 100});
	  	document.body.appendChild(pattern.canvas());
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
			console.log("no vacios");
		}
	}
}
var login = new Login();
$(function(){
	login.iniciarFondo();
	$("body").on('click',"#loguear_usu",function(){
		login.loguear();
	});
});