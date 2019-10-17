<?php
/***********************
conexion a base de datos
***********************/
class dbMySQL{

	/*private $host = "localhost";
	private $usuario = "root";
	private $clave = "";
	private $db = "muertos19";
	private $conn;*/

	//produccion
	private $host = "localhost";
	private $usuario = "tvp_muertos";
	private $clave = 'BRPEW$)PbRPx';
	private $db = "tvp_muertos";
	private $conn;


	//conexion a base de datos
	public function __construct(){
		$this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
		if(mysqli_connect_error()){
			printf("Error en la conexion a la base de datos: %d",mysqli_connect_error());
			exit;
		}else{
			//printf("Conexion exitosa.<br>");
		}
	}

	//query
	public function query($q, $op=true){
		$data = array();
		if($q!=""){
			if($r=mysqli_query($this->conn, $q)){
				if($op)@$data = mysqli_fetch_row($r);
			}
		}
		return $data;
	}

	public function query2($q){
		$data = array();
		if($q!=""){
			if($r=mysqli_query($this->conn, $q)){
				while($row =  mysqli_fetch_row($r)){
					array_push($data, $row);
				}
			}
		}
		return $data;
	}


	//cerrar conexion a base de datos
	public function close(){
		mysqli_close($this->conn);
		//print "Cerrar la conexion de forma exitosa";
	}
}



/***********************
funcion para usuarios
***********************/
class Usuarios{
	private $id;
	private $correo;

	function __construct(){	}

	public static function buscaEquipo($equipo){
		$respuest=array();
		$cuantos = 0;
		$nombre = "";

		$db = new dbMySQL();
		$data = $db->query("SELECT COUNT(*) cuantos FROM `tbl_baile` WHERE `cEquipo`='".$equipo."'");
		$db->close();
		unset($db);

		$cuantos = $data[0];


		if($cuantos>=1){

			$respuest=array("encontrado"=>"si");
		}else{
			$respuest=array("encontrado"=>"no","err"=>"Este usuario no existe.");
		}
		return $respuest;
	}  //termina buscaUsuario


//registro nuevo
  public static function regEquipo($data){
    $db = new dbMySQL();
    $dateReg = $db->query("INSERT INTO `tbl_baile` (`nId`, `cEquipo`,`cCategoria`,`cIntegrantes`,`cFecha`) VALUES (NULL, '".$data['equipo']."','".$data['categoria']."','".$data['integrantes']."','".$data['fecha']."');");
    $db->close();
    unset($db);
  }  //termina registro


  public static function buscaRegistro($correo){
    $respuest=array();
    $cuantos = 0;
    $nombre = "";

    $db = new dbMySQL();
    $data = $db->query("SELECT COUNT(*) cuantos, `cJurado` FROM `tbl_registro` WHERE `cCorreo`='".$correo."'");
    $db->close();
    unset($db);

    $cuantos = $data[0];
    $jurado = $data[1];


    if($cuantos>=1){

      $respuest=array("encontrado"=>"si", "jurado"=>$jurado);
    }else{
      $respuest=array("encontrado"=>"no","err"=>"Este usuario no existe.");
    }
    return $respuest;
  }  //termina buscaUsuario

  public static function loginUsuario($correo, $contrasena){
    $respuest=array();
    $cuantos = 0;
    $nombre = "";

    $db = new dbMySQL();
    $data = $db->query("SELECT COUNT(*) cuantos FROM `tbl_registro` WHERE `cCorreo`='".$correo."' AND `cContrasena`='".$contrasena."'");
    $db->close();
    unset($db);

    $cuantos = $data[0];


    if($cuantos>=1){

      $respuest=array("encontrado"=>"si");
    }else{
      $respuest=array("encontrado"=>"no","err"=>"Este usuario no existe.");
    }
    return $respuest;
  }  //termina buscaUsuario


//registro nuevo
  public static function regUsuario($data){
    $db = new dbMySQL();
    $dateReg = $db->query("INSERT INTO `tbl_registro` (`nId`, `cCorreo`, `cContrasena`,`cJurado`,`cFecha`) VALUES (NULL, '".$data['email']."','".$data['contrasena']."','".$data['jurado']."','".$data['fecha']."');");
    $db->close();
    unset($db);
  }  //termina registro


	//registro disfraz
	public static function buscaRegistroDisfraz($equipo){
		$respuest=array();
		$cuantos = 0;
		$nombre = "";

		$db = new dbMySQL();
		$data = $db->query("SELECT COUNT(*) cuantos FROM `tbl_disfraces` WHERE `cCorreo`='".$equipo."'");
		$db->close();
		unset($db);

		$cuantos = $data[0];


		if($cuantos>=1){

			$respuest=array("encontrado"=>"si");
		}else{
			$respuest=array("encontrado"=>"no","err"=>"Este usuario no existe.");
		}
		return $respuest;
	}  //termina buscaUsuario


//registro nuevo
	public static function regDisfraz($data){
		$db = new dbMySQL();
		$dateReg = $db->query("INSERT INTO `tbl_disfraces` (`nId`, `cNombre`,`cCorreo`,`cImagen`,`cFecha`) VALUES (NULL, '".$data['nombre']."','".$data['email']."','".$data['imagen']."','".$data['fecha']."');");
		$db->close();
		unset($db);
	}  //termina registro
	//termina registro disfraz


	//todos disfraces
	public static function todosDisfraces(){
		$db = new dbMySQL();
		$dateReg = $db->query2("SELECT * FROM `tbl_disfraces`");
		$db->close();
		unset($db);

		return $dateReg;
	}

	//termina todos disfraces

	//bota disfraz
	public static function botoDisfraz($data){
		$db = new dbMySQL();
		$dateReg = $db->query("INSERT INTO `tbl_botodisfraz` (`nId`, `cUsuario`,`cDisfraz`,`cFecha`) VALUES (NULL, '".$data['usuario']."','".$data['id']."','".$data['fecha']."');");
		$db->close();
		unset($db);

		return $dateReg;
	}
	//termina bota disfraz

	//numero botos disfraz
	public static function cuantosBotosDisfraz($usuarioB){
		$db = new dbMySQL();
		$dateReg = $db->query("SELECT COUNT(*) cuantos FROM `tbl_botodisfraz` WHERE `cUsuario`='".$usuarioB."'");
		$db->close();
		unset($db);

		return $dateReg[0];
	}
	//termina numeroo botos disfraz

	//busca disfraz
	public static function buscaDisfraz($nombredis){
		$db = new dbMySQL();
		$dateReg = $db->query("SELECT COUNT(*) cuantos FROM `tbl_disfraces` WHERE `cNombre` LIKE '%".$nombredis."%'");
		$db->close();
		unset($db);

		return $dateReg[0];
	}
	//termina busca disfraz

	//busca disfraz
	public static function buscaDisfrazConsulta($nombredis){
		$db = new dbMySQL();
		$dateReg = $db->query2("SELECT * FROM `tbl_disfraces` WHERE `cNombre` LIKE '%".$nombredis."%'");
		$db->close();
		unset($db);

		return $dateReg;
	}
	//termina busca disfraz

	//primeros lugares disfraz
	public static function topDisfraces(){
		$db = new dbMySQL();
		$dateReg = $db->query2("SELECT COUNT(*) cuantos, `cDisfraz` FROM `tbl_botodisfraz` GROUP BY `cDisfraz` ORDER BY cuantos LIMIT 3");
		$db->close();
		unset($db);

		return $dateReg;
	}
	//termina primeros lugares disfraz

	//datos disfraz
	public static function UsuariosDatosDisfraz($id){
		$db = new dbMySQL();
		$data = $db->query("SELECT * FROM `tbl_disfraces` WHERE `nId`=".$id);
		$db->close();
		unset($db);

		$respuest=array("nombre"=>$data[1],"imagen"=>$data[3]);

		return $respuest;
	}
	//termina datos disfraz


	//BAILE
	//busca baile
	public static function buscaBaileConsulta($nombredis){
		$db = new dbMySQL();
		$dateReg = $db->query2("SELECT * FROM `tbl_baile` WHERE `cEquipo` LIKE '%".$nombredis."%'");
		$db->close();
		unset($db);

		return $dateReg;
	}
	//termina busca baile

	//todos bailes
	public static function todosBailes(){
		$db = new dbMySQL();
		$dateReg = $db->query2("SELECT * FROM `tbl_baile`");
		$db->close();
		unset($db);

		return $dateReg;
	}

	//bota baile
	public static function botoBaile($data){
		$db = new dbMySQL();
		$dateReg = $db->query("INSERT INTO `tbl_botobaile` (`nId`, `cUsuario`,`cEquipo`,`cFecha`) VALUES (NULL, '".$data['usuario']."','".$data['id']."','".$data['fecha']."');");
		$db->close();
		unset($db);

		return $dateReg;
	}
	//termina bota baile

	//numero botos baile
	public static function cuantosBotosBaile($usuarioB){
		$db = new dbMySQL();
		$dateReg = $db->query("SELECT COUNT(*) cuantos FROM `tbl_botobaile` WHERE `cUsuario`='".$usuarioB."'");
		$db->close();
		unset($db);

		return $dateReg[0];
	}
	//termina numeroo botos baile

	public static function buscaBaile($nombredis){
		$db = new dbMySQL();
		$dateReg = $db->query("SELECT COUNT(*) cuantos FROM `tbl_baile` WHERE `cEquipo` LIKE '%".$nombredis."%'");
		$db->close();
		unset($db);

		return $dateReg[0];
	}

//primeros lugares baile
public static function topBailes(){
	$db = new dbMySQL();
	$dateReg = $db->query2("SELECT COUNT(*) cuantos, `cEquipo` FROM `tbl_botobaile` GROUP BY `cEquipo` ORDER BY cuantos LIMIT 3");
	$db->close();
	unset($db);

	return $dateReg;
}
//termina primeros lugares baile

//datos baile
public static function UsuariosDatodBaile($id){
	$db = new dbMySQL();
	$data = $db->query("SELECT * FROM `tbl_baile` WHERE `nId`=".$id);
	$db->close();
	unset($db);

	$respuest=array("nombre"=>$data[1],"imagen"=>$data[5]);

	return $respuest;
}
//termina datos baile

//datos baile
public static function UsuariosDatosBaile($id){
	$db = new dbMySQL();
	$data = $db->query("SELECT * FROM `tbl_baile` WHERE `nId`=".$id);
	$db->close();
	unset($db);

	$respuest=array("nombre"=>$data[1],"imagen"=>$data[5]);

	return $respuest;

}
//termina datos baile


//OFRENDA

//votos ofrenda
public static function votoOfrenda($data){
	$db = new dbMySQL();
	$dateReg = $db->query("INSERT INTO `tbl_votoofrenda` (`nId`, `cUsuario`,`cOfrenda`,`cFecha`) VALUES (NULL, '".$data['usuario']."','".$data['id']."','".$data['fecha']."');");
	$db->close();
	unset($db);

	return $dateReg;
}
//termina votos ofrenda

//numero votos ofrenda
public static function cuantosVotosOfrenda($usuarioB){
	$db = new dbMySQL();
	$dateReg = $db->query("SELECT COUNT(*) cuantos FROM `tbl_votoofrenda` WHERE `cUsuario`='".$usuarioB."'");
	$db->close();
	unset($db);

	return $dateReg[0];
}
//termina numeroo votos ofrenda

//primeros lugares ofrenda
public static function todosOfrenda(){
	$db = new dbMySQL();
	$dateReg = $db->query2("SELECT COUNT(*) cuantos, `cOfrenda` FROM `tbl_votoofrenda` GROUP BY `cOfrenda` ORDER BY cuantos LIMIT 2");
	$db->close();
	unset($db);

	return $dateReg;
}
//termina primeros lugares ofrenda

}  //termina funciones de usuario






/***********************
funcion encriptar
***********************/
class Tocken{
	function __construct(){	}

	public static function nuevoToken( $json ){
		// base64 encodes the header json
		$encoded_header = base64_encode('{"alg": "HS256","typ": "JWT"}');
		// base64 encodes the payload json
		$encoded_payload = base64_encode($json);
		// base64 strings are concatenated to one that looks like this
		$header_payload = $encoded_header . '.' . $encoded_payload;
		//Setting the secret key
		$secret_key = 'promosBayer18';
		// Creating the signature, a hash with the s256 algorithm and the secret key. The signature is also base64 encoded.
		$signature = base64_encode(hash_hmac('sha256', $header_payload, $secret_key, true));
		// Creating the JWT token by concatenating the signature with the header and payload, that looks like this:
		$jwt_token = $header_payload . '.' . $signature;

		return $jwt_token;
	}


	public static function validaToken( $recievedJwt  ){
		$secret_key = 'promosBayer18';
		// Split a string by '.'
		$jwt_values = explode('.', $recievedJwt);
		// extracting the signature from the original JWT
		$recieved_signature = $jwt_values[2];
		// concatenating the first two arguments of the $jwt_values array, representing the header and the payload
		$recievedHeaderAndPayload = $jwt_values[0] . '.' . $jwt_values[1];
		// creating the Base 64 encoded new signature generated by applying the HMAC method to the concatenated header and payload values
		$resultedsignature = base64_encode(hash_hmac('sha256', $recievedHeaderAndPayload, $secret_key, true));
		// checking if the created signature is equal to the received signature
		if($resultedsignature == $recieved_signature) {
			return true;
		}else{
			return false;
		}
	}


	public static function datosToken( $recievedJwt  ){
		$secret_key = 'promosBayer18';
		// Split a string by '.'
		$jwt_values = explode('.', $recievedJwt);
		// extracting the signature from the original JWT
		$recieved_signature = $jwt_values[2];
		// concatenating the first two arguments of the $jwt_values array, representing the header and the payload
		$payload = base64_decode($jwt_values[1]);
		return $payload;

	}


}

/***********************
dentro de un rango de dias
***********************/
function check_in_range($start_date, $end_date, $evaluame) {
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($evaluame);
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}


/***********************
 calcula diferencia
 ************************/
 function timeBetween($desde,$hasta) {
    $ini = explode(" ",$desde);
    $fIni = $ini[0];
    $hIni = $ini[1];
    $fIni = explode("-",$fIni);
    $hIni = explode(":",$hIni);

    $fin = explode(" ",$hasta);
    $fFin = $fin[0];
    $hFin = $fin[1];
    $fFin = explode("-",$fFin);
    $hFin = explode(":",$hFin);

    $anos = $fFin[0] - $fIni[0];
    $meses = $fFin[1] - $fIni[1];
    $dias = $fFin[2] - $fIni[2];
    $horas = $hFin[0] - $hIni[0];
    $minutos = $hFin[1] - $hIni[1];
    $segundos = $hFin[2] - $hIni[2];

    if ($segundos < 0) {
        $minutos--;
        $segundos = 60 + $segundos;
    }
    if ($minutos < 0) {
        $horas--;
        $minutos = 60 + $minutos;
    }
    if ($horas < 0) {
        $dias--;
        $horas = 24 + $horas;
    }
    if ($dias < 0)
    {
        --$meses;
        switch ($fIni[1]) {
            case 1:     $dias_mes_anterior=31; break;
            case 2:     $dias_mes_anterior=31; break;
            case 3:
                if (checkdate(2,29,$fIni[0]))
                {
                    $dias_mes_anterior=29; break;
                } else {
                    $dias_mes_anterior=28; break;
                }
            case 4:     $dias_mes_anterior=31; break;
            case 5:     $dias_mes_anterior=30; break;
            case 6:     $dias_mes_anterior=31; break;
            case 7:     $dias_mes_anterior=30; break;
            case 8:     $dias_mes_anterior=31; break;
            case 9:     $dias_mes_anterior=31; break;
            case 10:     $dias_mes_anterior=30; break;
            case 11:     $dias_mes_anterior=31; break;
            case 12:     $dias_mes_anterior=30; break;
        }

        $dias=$dias + $dias_mes_anterior;
    }
    if ($meses < 0)
    {
        --$anos;
        $meses = $meses + 12;
    }
    return array("ayos" => $anos,
                "meses" => $meses,
                "dias" => $dias,
                "horas" => $horas,
                "minutos" => $minutos,
                "segundos" => $segundos);
}


//acompletar con ceros un numero 1 -> 001
//$6digitos = number_pad($numero,6);
function number_pad($number,$n) {
  return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

?>
