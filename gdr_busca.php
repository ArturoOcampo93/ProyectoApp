<?php
session_start();
require_once("js/clases.php");
$valid = true;
if (isset($_SESSION['muertos']) ) {  //existe la session
	//echo "valida usuario";
	$recievedJwt=$_SESSION['muertos'];
	//token valido
	$tokenValid = Tocken::validaToken($recievedJwt);

	if($tokenValid){  //el token es valido
		//datos de token
		$usuarioC = Tocken::datosToken($recievedJwt);
		$usuarioC = json_decode($usuarioC, true);
		//print_r($usuarioC);
		$existe=Usuarios::buscaRegistro($usuarioC['usuario']);

		if($existe['encontrado'] == "si"){ //el usuario es valido
		}else{
			$valid = true;
		}  //termina usuario
	}else{
		$valid = true;
	}// termina token
}else{
	$valid = true;
}  //termina session

//zona horarios de mexico
date_default_timezone_set('America/Mexico_City');
$fechad=date("Y-m-d H:i:s");
$hoy=date("Y-m-d");
$origen = "web";

$data = array();

//array para el JSON
$response = array (
	"nombre" => "",
	"success" => 0,
	"idregistro" => 0,
	"error" => 0,
	"error_msg" => ""
);

//vigencia de promocion
$vigencia=false;
$inicioPromo=date("2019-09-23");
$finPromo=date("2019-10-31");
$vigencia=check_in_range($inicioPromo, $finPromo, $hoy);

if (isset($_POST['nombredisfraz'])) {
	//verifica vigencia
	if($vigencia){
		//pasa datos del post a nuestro array usamos una sola variable
		$data =array_map('trim',$_POST);
		//$data['origen']=$origen;
		$data['fecha']=$fechad;
		$data['hoy']=$hoy;
		$data['ip']=$_SERVER['REMOTE_ADDR'];
		//valida datos
		$valid = TRUE;

		//guarda registro
		if($valid){
			//si el codigo aun no esta registrado primero guardo registro
			$existe=Usuarios::buscaDisfraz($data['nombredisfraz']);
			if($existe == 0){
				//ya existe el usuario
				$response["error_msg"]="Nombre no encontrado.";
			}else{
					$response["success"]=1;
					$_SESSION['busco']=$data['nombredisfraz'];

			}
		}

	}else{
		$response["error_msg"]="Vigencia de registro para votar en el Camino de las animas ya termino.";
	}
}else{

	//$response["error_msg"]="El formato de la fecha de nacimiento es incorrecto (Ej: aaaa-mm-dd) y recuerde no dejar espacios.";
	$response["error_msg"]="Todos los datos son obligatorios";
	//header("Location: registro.php");
}

echo json_encode($response);

?>
