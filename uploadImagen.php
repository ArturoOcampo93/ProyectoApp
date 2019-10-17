<?php
session_start();
//include("resize.php");
header('Content-Type: text/plain; charset=utf-8');

//echo $pais."<br>";

$ruta="imagesFTP/";

$response = array (
"nombre" => "",
"success" => 0,
"idregistro" => 0,
"error" => 0,
"error_msg" => "no se selecciono ninguna imagen."
);

if(isset($_FILES['file-0'])){
	set_time_limit(300);
	$tamanyomax = 2000000;
	$nombretemp = $_FILES['file-0'] ['tmp_name'];
	$nombrearchivo = $_FILES['file-0'] ['name'];
	$tamayoarchivo = $_FILES['file-0'] ['size'];
	$tipo = getimagesize($nombretemp);

	if ($tipo[2] == 1 || $tipo[2] == 2 || $tipo[2] == 3){

		if($tipo[2] == 1){
			$extencion="gif";
			$imagen = imagecreatefromgif($_FILES['file-0'] ['tmp_name']);
		}
		if($tipo[2] == 2){
			$extencion="jpg";
			$imagen = imagecreatefromjpeg($_FILES['file-0'] ['tmp_name']);
		}
		if($tipo[2] == 3){
			$extencion="png";
			$imagen = imagecreatefrompng($_FILES['file-0'] ['tmp_name']);
		}

		$nuevoNom=time();
		$nombrearchivo=$nuevoNom."_img.".$extencion;
		$nombrearchivoTumb=$nuevoNom."_img";
		if($tamayoarchivo <= $tamanyomax){
			if(move_uploaded_file($nombretemp, $ruta.$nombrearchivo)){
				$nombreImagen=$nombrearchivo;
				//$nombrearchivoTumb=$nombreImagen;


				$response["error_msg"]="La imagen se cargo correctamente.";
				$response["nombre"]=$nombrearchivo;
				$response["success"]=1;

			}else{
				$response["error_msg"]="No se a podido cargar la imagen.";
			}

		}else{
			$response["error_msg"]="La Imagen es demasiado grande.";
		}
	}else{
		$response["error_msg"]="No es un archivo GIF, JPG o PNG Válido.";
	}

}

echo json_encode($response);

?>
