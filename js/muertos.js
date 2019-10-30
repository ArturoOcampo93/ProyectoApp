//Modal
$(document).ready(function(){

	$("#votasteerror").hide();

	$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

	$("#btBuscarTodos").click(function(event) {
		location.reload();
	});

	$("#btBuscar").click(function(event) {
		/* Act on the event */
		var nombredisfraz = $.trim($("#nombredisfraz").val());

		if (nombredisfraz.length == 0 ){
			$("#alertaRegistro").html("Debe proporcionar nombre del disfraz.");
			DisclaimerForm();
			return false;
		}

		//envia informacion
		var data = {nombredisfraz:nombredisfraz};
		var pathPost="gdr_busca.php";

		var xhr_posts = $.post(pathPost, data, function(data) {
			var json= $.parseJSON(data);
			if(json.success==1){
				// reset form
				window.location='VotacionDisfraz.php';
			}else{
					$("#alertaRegistro").html(json.error_msg);
					DisclaimerForm();
				return false;
			}
		});
		xhr_posts.fail(function(data){
				$("#alertaRegistro").html(json.error_msg);
				DisclaimerForm();
			return false;
		});

		return false;

	});

	$(".votaDrisfraz").click(function(event) {
		/* Act on the event */
		var id = $(this).data( "id" );
		//guarda boto
		//envia informacion
		var data = {id:id};
		var pathPost="gdr_votoDisfraz.php";

		var xhr_posts = $.post(pathPost, data, function(data) {
			var json= $.parseJSON(data);
			if(json.success==1){
				// reset form
				window.location='DisfracesGanadores.php';
			}else{
				$("#votasteerror").show('slow/400/fast');
				setTimeout(cierraError, 1000);
				return false;
			}
		});
		xhr_posts.fail(function(data){
			alert(json.error_msg);
			return false;
		});

		return false;

	});
	$(".votaBaile").click(function(event) {
		/* Act on the event */
		var id = $(this).data( "id" );
		var nombre = $(this).data( "nombre" );
		$("#id").val(id);
		$("#nombrepart").html(nombre);
		//muestra rango de calificacion
		$('#Calificar').modal('show');
		//calificacion

		//guarda boto
		//envia informacion
		/*var data = {id:id};
		var pathPost="gdr_votoBaile.php";

		var xhr_posts = $.post(pathPost, data, function(data) {
			var json= $.parseJSON(data);
			if(json.success==1){
				// reset form
				window.location='BaileGanadores.php';
			}else{
				$("#votasteerror").show('slow/400/fast');
				setTimeout(cierraError, 1000);
				return false;
			}
		});
		xhr_posts.fail(function(data){
			alert(json.error_msg);
			return false;
		});*/

		return false;

	});
	$("#btCalifica").click(function(event) {
		/* Act on the event */
		var id = $("#id").val();
		var calificacion = $("input[name='estrellas']:checked").val();

		//calificacion

		if (calificacion>0) {
			//guarda boto
			//envia informacion
			var data = {id:id, calificacion:calificacion};
			var pathPost="gdr_votoBaile.php";

			var xhr_posts = $.post(pathPost, data, function(data) {
				var json= $.parseJSON(data);
				if(json.success==1){
					// reset form
					$("#votasteerror").html(json.error_msg);
					$("#votasteerror").show('slow/400/fast');
					setTimeout(cierraError, 2000);
					return false;
				}else{
					$("#votasteerror").html(json.error_msg);
					$("#votasteerror").show('slow/400/fast');
					setTimeout(cierraError, 2000);
					return false;
				}
			});
			xhr_posts.fail(function(data){
				$("#votasteerror").html(json.error_msg);
				$("#votasteerror").show('slow/400/fast');
				setTimeout(cierraError, 2000);
				return false;
			});

		}else {
			$("#votasteerror").html("Que calificacion le das a esta parejo o equipo.");
			$("#votasteerror").show('slow/400/fast');
			setTimeout(cierraError, 2000);
		}


		return false;

	});



closeForm();
closeFormLogin();
closeFormDisfraz();


/* registro */
  $("#btRegistro").click(function(event) {
    //Email
		var email = $.trim($("#email").val());
		if (email.length == 0 ){
			$("#alertaRegistro").html("Debe proporcionar su email");
			DisclaimerForm();
			return false;
		}else{
			if (valEmail(email)){
			}else{
				$("#alertaRegistro").html("La dirección de correo" +" "+email+" " + "no es correcta");
				DisclaimerForm();
				return false;
			}
		}

    //contrasena
		var password = $.trim($("#contrasena").val());
		if (password.length == 0 ) {
			$("#alertaRegistro").html("Debe proporcionar su contraseña.");
			DisclaimerForm();
			return false;
		}


    //envia informacion
    var data = $("#formMuertos").serialize();
    var pathPost="gdr_registro.php";

    var xhr_posts = $.post(pathPost, data, function(data) {
      var json= $.parseJSON(data);
      if(json.success==1){
        // reset form
				guardar_localstorage(email);
				window.location='MiCuenta.php';
        return false;
      }else{

				$("#alertaRegistro").html(json.error_msg);
				DisclaimerForm();
				return false;
      }
    });
    xhr_posts.fail(function(data){
			$("#alertaRegistro").html(json.error_msg);
			DisclaimerForm();
			return false;
    });

    return false;

  });
	/* termina registro */

	/* login */

	$("#bt_login").click(function(event) {
		//Email
		var email = $.trim($("#email").val());
		if (email.length == 0 ){
			$("#alerta-login").html("Debe proporcionar su email");
			DisclaimerFormLogin();
			return false;
		}else{
			if (valEmail(email)){
			}else{
				$("#alerta-login").html("La dirección de correo" +" "+email+" " + "no es correcta");
				DisclaimerFormLogin();
				return false;
			}
		}

		//contrasena
		var password = $.trim($("#contrasena").val());
		if (password.length == 0 ) {
			$("#alerta-login").html("Debe proporcionar su contraseña.");
			DisclaimerFormLogin();
			return false;
		}

		//envia informacion
		var data = $("#formlogin").serialize();
		var pathPost="gdr_login.php";

		var xhr_posts = $.post(pathPost, data, function(data) {
			var json= $.parseJSON(data);
			if(json.success==1){
				// reset form
				guardar_localstorage(email);
				window.location='MiCuenta.php';
				return false;
			}else{

				$("#alerta-login").html(json.error_msg);
				DisclaimerFormLogin();
				return false;
			}
		});
		xhr_posts.fail(function(data){
			$("#alerta-login").html(json.error_msg);
			DisclaimerFormLogin();
			return false;
		});

		return false;

	});

	/* termina login */

	/* registro disfraz */
	  $("#btRegistrate").click(function(event) {
			//Nombre
			//contrasena
			var nombre = $.trim($("#nombre").val());
			if (nombre.length == 0 ) {
				$("#alerta-inscripcion").html("Debe proporcionar su nombre del persoanje.");
				DisclaimerFormDisfraz();
				return false;
			}

	    //Email
			var email = $.trim($("#email").val());
			if (email.length == 0 ){
				$("#alerta-inscripcion").html("Debe proporcionar su email");
				DisclaimerFormDisfraz();
				return false;
			}else{
				if (valEmail(email)){
				}else{
					$("#alerta-inscripcion").html("La dirección de correo" +" "+email+" " + "no es correcta");
					DisclaimerFormDisfraz();
					return false;
				}
			}

	    //contrasena
			var imagen = $.trim($("#imagen").val());
			if (imagen.length == 0 ) {
				$("#alerta-inscripcion").html("Debe proporcionar su imagen.");
				DisclaimerFormDisfraz();
				return false;
			}


	    //envia informacion
	    var data = $("#formDisfraz").serialize();
	    var pathPost="gdr_disfraz.php";

	    var xhr_posts = $.post(pathPost, data, function(data) {
	      var json= $.parseJSON(data);
	      if(json.success==1){
	        // reset form
					$("#alerta-inscripcion").html(json.error_msg);
					DisclaimerFormDisfraz();
					$("#formDisfraz")[0].reset();
					return false;
	      }else{

					$("#alerta-inscripcion").html(json.error_msg);
					DisclaimerFormDisfraz();
					return false;
	      }
	    });
	    xhr_posts.fail(function(data){
				$("#alerta-inscripcion").html(json.error_msg);
				DisclaimerFormDisfraz();
				return false;
	    });

	    return false;

	  });

		//upload imagen
		$("#upload").change(function(){

				var file = $("#upload")[0].files[0];
				var fileName = file.name;
				var fileSize = file.size;

				var data = new FormData();
				jQuery.each($('#upload')[0].files, function(i, file) {
					data.append('file-'+i, file);
				});

				$.ajax({
					url: 'uploadImagen.php',
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					dataType: 'json',
					success: function(data){
						$("#alertaRegistro").html(data.error_msg);
						DisclaimerFormDisfraz();
						$('#exampleModal').modal('show')
							$("#imagen").val(data.nombre);
							$("#imagen01").html('<img src="imagesFTP/'+data.nombre+'" class="img-fluid">');//.val(data.nombre);
					}
				});
		});
		/* termina registro disfraz*/



		//buscar baile
		$("#btBuscarBaile").click(function(event) {
			/* Act on the event */
			var nombreequipo = $.trim($("#nombreequipo").val());

			if (nombreequipo.length == 0 ){
				$("#alertaRegistro").html("Debe proporcionar nombre del equipo.");
				DisclaimerForm();
				return false;
			}

			//envia informacion
			var data = {nombredisfraz:nombreequipo};
			var pathPost="gdr_buscaBaile.php";

			var xhr_posts = $.post(pathPost, data, function(data) {
				var json= $.parseJSON(data);
				if(json.success==1){
					// reset form
					window.location='VotacionBaile.php';
				}else{
						$("#alertaRegistro").html(json.error_msg);
						DisclaimerForm();
					return false;
				}
			});
			xhr_posts.fail(function(data){
					$("#alertaRegistro").html(json.error_msg);
					DisclaimerForm();
				return false;
			});

			return false;

		});
		//trermina buscar baile


		///////OFRENDA
		$(".votaOfrenda").click(function(event) {
			/* Act on the event */
			var id = $(this).data( "id" );
			//guarda boto
			//envia informacion
			var data = {id:id};
			var pathPost="gdr_votoOfrenda.php";

			var xhr_posts = $.post(pathPost, data, function(data) {
				var json= $.parseJSON(data);
				if(json.success==1){
					// reset form
					window.location='OfrendaGanadores.php';
				}else{
					$("#votasteerror").show('slow/400/fast');
					setTimeout(cierraError, 1000);
					return false;
				}
			});
			xhr_posts.fail(function(data){
				alert(json.error_msg);
				return false;
			});

			return false;

		});


});



//errores formularios

//registro
function DisclaimerForm() {
  document.getElementById('alertaRegistro').style.display = "block";
  document.getElementById("alertaRegistro").style.animation = "fadeInUp 1s 1";
  var x = myFunctionForm();
}
function myFunctionForm() {
  var myVar = setTimeout(alertFuncForm, 2500);
}

function alertFuncForm() {
  document.getElementById("alertaRegistro").style.animation = "fadeOutDown 2s 1";
  var y = setTimeout(closeForm,1000);
}
function closeForm(){
	if (document.getElementById('alertaRegistro')) {
		document.getElementById('alertaRegistro').style.display = "none";
	}
}

//login
function DisclaimerFormLogin() {
  document.getElementById('alerta-login').style.display = "block";
  document.getElementById("alerta-login").style.animation = "fadeInUp 1s 1";
  var x = myFunctionFormLogin();
}
function myFunctionFormLogin() {
  var myVar = setTimeout(alertFuncFormLogin, 2500);
}

function alertFuncFormLogin() {
  document.getElementById("alerta-login").style.animation = "fadeOutDown 2s 1";
  var y = setTimeout(closeFormLogin,1000);
}
function closeFormLogin(){
	if (document.getElementById('alerta-login')) {
		document.getElementById('alerta-login').style.display = "none";
	}
}

//registro disfraces
function DisclaimerFormDisfraz() {
  document.getElementById('alerta-inscripcion').style.display = "block";
  document.getElementById("alerta-inscripcion").style.animation = "fadeInUp 1s 1";
  var x = myFunctionFormDisfraz();
}
function myFunctionFormDisfraz() {
  var myVar = setTimeout(alertFuncFormDisfraz, 2500);
}

function alertFuncFormDisfraz() {
  document.getElementById("alerta-inscripcion").style.animation = "fadeOutDown 2s 1";
  var y = setTimeout(closeFormDisfraz,1000);
}
function closeFormDisfraz(){
	if (document.getElementById('alerta-inscripcion')) {
		document.getElementById('alerta-inscripcion').style.display = "none";
	}
}


function cierraError(){
	$("#votasteerror").hide('slow/400/fast');
}

//local storage
function guardar_localstorage(miCorreo){
	let correo = miCorreo;
	localStorage.setItem("usuario", correo);
}

function obtener_localstorage(){

	if (localStorage.getItem("usuario")) {
		let correo = localStorage.getItem("usuario");
		return correo;
	}else{
		return "noEncontrado";
	}

}

function borrar_localstorage(){
	localStorage.clear();
	window.location='salir.php';
}


//VALIDA CORREO

function valEmail(valor){

	re=/^[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
	if(!re.exec(valor))
	{
		//alert("El correo no es correcto");
		return false;
	}else{
		return true;
	}
}
