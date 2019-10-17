<?php
session_start();
$timeout = time() + 3600*24*1; //Expiramos los cookies en 1 dia
require_once("js/clases.php");
ini_set('display_errors', 1);

header('Content-Type: text/html; charset=utf-8');
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

if (isset($_POST['email']) && isset($_POST['contrasena'])) {
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
			$existe=Usuarios::buscaRegistro($data['email']);
			if($existe['encontrado']=="si"){
				//ya existe el usuario
				$response["success"]=1;
				$resultado=array("usuario"=>$data['email'],"promo"=>"muertos");
				$ses = Tocken::nuevoToken(json_encode($resultado));
				$_SESSION['muertos']=$ses;
			}else{
				$response["error_msg"]="Usuario o contraseña es incorrecto.";
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
