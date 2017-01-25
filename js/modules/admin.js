var Admin = function(ruta){
	this.datos = [];
	this.validarCampos = function(clase){
		var respuesta = false;
		var campos = $(clase);
		$.each(campos,function( key, value ) {
			var vacio = false;
		    var texto = '';
		    if($(this).hasClass('email')){
		    	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				vacio = !regex.test($(this).val().trim());
		    }
		    else if($(this).hasClass('solo_numeros')){
		    	var regex = /^[0-9]+$/;
		    	vacio = !regex.test($(this).val().trim());
		    }
		    else if($(this).hasClass('password')){
		    	var regex =/^(?=(.*\d){2,})(?=.*[A-Z])(?=.*[!@#$%^&*()_+])(?=.*[^A-Z0-9!@#$%^&*()_+])(?!.*\s).{8,}$/;
		    	vacio = !regex.test($(this).val().trim());
		    }
		    else{
		    	vacio = (($(this).val().trim() == '') ? true : false);
		    }

			if(vacio){
				$(this).addClass('input_vacio');
				// $(this).val('');
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
	this.guardarUsuario = function(){
		if(!this.validarCampos('.agr_usuario')){
			var data = {};
			$.each($("#form_agr_usuario").serializeArray(),function(key,element){
				data[element.name] = $.trim(element.value);
			});
			data["accion"] = 'agr_usuario';
			$.ajax({
			  method: "POST",
			  url: ruta,
			  data: data,
			  success: function(result){
			  	if(result == 1){
			  		alertify.set({delay: 2500});
					alertify.success("Usuario agregado con exito");
			  	}
			  	else{
			  		alertify.set({delay: 2000});
					alertify.error("Error al almacenar, Usuario o Documento Existe");
			  	}
			  }
			});
		}
		else{
			alertify.set({delay: 3000});
			alertify.error("Complete los campos correctamente");
		}
	}
	this.obtenerDatos = function(){
		if(localStorage.datos){
		    this.datos = JSON.parse(localStorage.datos);
		} else {
		    var root = 'https://jsonplaceholder.typicode.com';
			$.ajax({
			  url: root+'/posts',
			  dataType: 'json',
			  method: 'GET'
			}).then(function(data) {
			    admin.datos = data;
			    localStorage.setItem("datos",JSON.stringify(data));
			});
		}
	}
	this.actualizarDatosDB = function(){
		if(localStorage.datos){
		    localStorage.datos = JSON.stringify(this.datos);
		}
	}
	this.visualizarComics = function(){
		var html = '';
		$.each(admin.datos,function(key,value){
			html += '<div class = "comic">';
			html += '<img src = "images/logos/comic_logo.jpg"/>';
			html += '<div class = "title"><label>'+value.title+'</label></div>';
			html += '<div class = "opciones">';
			html += '<input type = "button" data-key = "'+key+'" class = "button_success view_comic" value = "View" />';
			html += '<input type = "button" class = "button_warning edit_comic" value = "Edit"/>';
			html += '</div>';
			html += '</div>';
		});
		$("#contenedor_comics").html(html);
	}
	this.buscarComics = function(){
		var texto = $("#coincidencia_comic").val().trim();
		$('.comic > .title > label:not(:contains("'+texto+'"))').parents('.comic') .css('display','none');
	}
	this.verComic = function(){
		var comic = admin.datos[$(this).data('key')];
		
	}

}
var admin = new Admin('rest/admin.php');
$(function(){
	admin.inicializar();
	admin.obtenerDatos();
	$.ajaxSetup({
	    headers: {
	       'token': $('meta[name="token"]').attr('content')
	    }
	});
	$("body").on('click',"#cerrar_sesion",function(){
		admin.cerrarSesion();
	});
	$("body").on('click',"#save_usuario",function(){
		admin.guardarUsuario();
	});
	$("body").on('keypress change',".solo_numeros",function(e){
		var chr = String.fromCharCode(e.which);
	    if ("1234567890".indexOf(chr) < 0)
	        return false;
	});
	$("body").on('click',"#listado_comics",function(e){
		admin.visualizarComics();
	});
	$("body").on('click',"#search_comic",function(e){
		admin.buscarComics();
	});
	$("body").on('click',".view_comic",admin.verComic);
	$("body").on('keyup',"#coincidencia_comic",function(){
		console.log("prueba");
		if($(this).val().trim() == '' ){
			$('.comic').css('display','inline-block');
		}
	});
	$("#navbar").on('click',".tab-option",function(){
		var id = $(this).data('href');
		$(id).addClass('active').siblings().removeClass('active');
	});
});