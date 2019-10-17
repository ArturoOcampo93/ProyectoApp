<?php
session_start();
require_once("js/clases.php");
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
			session_destroy();
			header("Location: index.html");
			exit(0);
		}  //termina usuario

	}else{
		session_destroy();
		header("Location: index.thml");
		exit(0);
	}// termina token

}else{
	session_destroy();
	header("Location: index.html");
	exit(0);
}  //termina session

//top ganadores
$topdisfraces = Usuarios::topDisfraces();


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="css/style.css">
    <!--Animación CSS-->
    <link rel="stylesheet" href="css/animate.css">

    <title>Halloween 2019 | TVP</title>

  </head>
  <body>
    <header></header>
    <main>
    <div class="Mobile">
            <!--Sección del menu-->
            <div id="menu">
                <ul id="aparicion">
                    <li><a class="TextoMenu" href="inscribete.html">- Inscríbete al concurso</a></li>
                    <li><a class="TextoMenu" href="registrate.html">- Regístrate para votar</a></li>
                    <li><a class="TextoMenu" href="login.html">- Ingresa</a></li>
                </ul>
            </div>
            <!--Comienza el GRID-->
            <div class="ContainerGrid">
                <!--Sección imagen | Texto Principal-->
                <div class="ImgContainer">
                    <div class="background">
                        <img src="images/FondoPrincipal.png" alt="Background">
                    </div>
                    <div class="opacity">
                        <div class="menu shadowText">
                            <a href="#menu" id="toggle" onclick="menu()"><span></span></a>
                        </div>
                        <div class="ContentTitle">
                            <h1 class="shadowText title letter-spacing margin-top">Ganadores</h1>
                        </div>
                    </div>
                </div>

                <!--Sección de Contenido Principal-->
                <div class="BoxContainer">
                    <div class="ContentBox Ganadores-section">
                        <div class="Icono-Titulo">
                            <div class="center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="95.747" height="98.936" viewBox="0 0 95.747 98.936">
                                        <g id="Grupo_19" data-name="Grupo 19" transform="translate(0 0)">
                                          <g id="mask" transform="translate(0 0)">
                                            <path id="Trazado_45" data-name="Trazado 45" d="M101.046,19.829a1.932,1.932,0,0,0-3.747.664,8.678,8.678,0,0,1-1.225,3.959c-1.624,2.675-4.614,4.032-8.887,4.032a25.249,25.249,0,0,0-3.463.238,45.684,45.684,0,0,0,4.758-11.591A84.626,84.626,0,0,0,90.59,7.624a1.932,1.932,0,0,0-2.2-2.2C87.9,5.5,77.156,7.143,69.4,11.1A75.548,75.548,0,0,0,63.139.783a1.932,1.932,0,0,0-3.107,0A75.563,75.563,0,0,0,53.767,11.1c-7.751-3.962-18.5-5.6-18.988-5.678a1.932,1.932,0,0,0-2.2,2.2,84.629,84.629,0,0,0,2.109,9.507,45.675,45.675,0,0,0,4.758,11.591,25.222,25.222,0,0,0-3.463-.238c-4.2,0-7.169-1.314-8.81-3.906a8.771,8.771,0,0,1-1.3-4.084,1.932,1.932,0,0,0-3.747-.664,48.4,48.4,0,0,0-2.953,16.692V41.56a5.868,5.868,0,0,0-2.029-.36h-3a5.9,5.9,0,0,0-5.893,5.893v9.019a5.9,5.9,0,0,0,5.459,5.876V97a1.932,1.932,0,0,0,3.865,0V61.988a5.854,5.854,0,0,0,1.6-.343A16.373,16.373,0,0,0,35.457,77.833a16.516,16.516,0,0,0,5.654-1.009l.082-.03c.037-.013.074-.027.111-.042,1.185-.452,5.255-2.023,9.563-3.876a27.011,27.011,0,0,1,21.259,0c3.1,1.336,6.343,2.623,9.9,3.938a16.27,16.27,0,0,0,6.8.968,1.932,1.932,0,1,0-.276-3.855,12.441,12.441,0,0,1-5.188-.74c-3.492-1.29-6.669-2.553-9.711-3.861a30.893,30.893,0,0,0-24.313,0c-4.27,1.836-8.3,3.391-9.438,3.824h0l-.053.019c-.014,0-.005,0-.009,0l-.035.014a12.472,12.472,0,0,1-16.767-11.7V36.521A44.7,44.7,0,0,1,24.078,26.9c1.734,2.583,5.176,5.446,11.907,5.446a20.67,20.67,0,0,1,9.259,2.129c.281.159.563.3.846.44a25.858,25.858,0,0,1,7.429,6.333,10.424,10.424,0,0,0,8.066,3.813h0a10.433,10.433,0,0,0,8.069-3.816,25.855,25.855,0,0,1,7.4-6.315c.3-.143.6-.3.9-.47a20.671,20.671,0,0,1,9.23-2.115c6.731,0,10.172-2.863,11.907-5.446a44.7,44.7,0,0,1,1.041,9.618V61.486a12.55,12.55,0,0,1-.571,3.763,1.932,1.932,0,1,0,3.687,1.157,16.417,16.417,0,0,0,.748-4.92V36.521a48.412,48.412,0,0,0-2.954-16.692ZM39.833,73.176l-.02.008-.008,0ZM17.143,58.141h-3a2.031,2.031,0,0,1-2.029-2.029V47.093a2.031,2.031,0,0,1,2.029-2.029h3a2.031,2.031,0,0,1,2.029,2.029v9.019A2.031,2.031,0,0,1,17.143,58.141ZM86.282,9.735c-.331,1.659-.837,3.936-1.532,6.386-1.769,6.239-3.941,10.773-6.279,13.112a10.928,10.928,0,0,1-9.6,3.1,13.551,13.551,0,0,0,3.563-6.258,15.234,15.234,0,0,0-.055-7.109,29.767,29.767,0,0,0-1.383-4.332c4.977-2.587,11.633-4.166,15.288-4.9ZM61.586,5.33c.84,1.267,1.922,2.98,3,4.9,1.933,3.464,3.9,7.331,4.328,11.331a9.849,9.849,0,0,1-1.13,5.86,13.537,13.537,0,0,1-4.261,4.2V18.269a1.932,1.932,0,1,0-3.865,0v13.4a10.927,10.927,0,0,1-4.678-5.042,10.991,10.991,0,0,1-.372-6.977c1.231-5.14,4.09-9.951,6.982-14.316Zm-24.7,4.405c3.655.731,10.312,2.311,15.289,4.9a22.45,22.45,0,0,0-1.846,8.051,13.7,13.7,0,0,0,3.9,9.644A10.821,10.821,0,0,1,44.7,29.233c-2.339-2.339-4.51-6.873-6.279-13.112C37.726,13.671,37.22,11.394,36.889,9.735ZM56.5,38.793a33.593,33.593,0,0,0-2.36-2.58,19.506,19.506,0,0,0,4.149-.9c.5.264.965.477,1.364.644v4.955A6.6,6.6,0,0,1,56.5,38.793Zm10.173,0a6.6,6.6,0,0,1-3.156,2.117V35.934c.386-.168.834-.38,1.321-.64a19.517,19.517,0,0,0,4.19.921,33.579,33.579,0,0,0-2.356,2.575Z" transform="translate(-8.253 0)" fill="#00cfc6"/>
                                            <path id="Trazado_46" data-name="Trazado 46" d="M315.236,241.316c-8.026.337-13.358,7.09-13.581,7.377a1.933,1.933,0,0,0,.053,2.435c4.184,4.932,8.819,7.433,13.776,7.433,8.333,0,14.3-7.152,14.555-7.456a1.932,1.932,0,0,0-.072-2.536C325.337,243.54,320.384,241.1,315.236,241.316Zm.248,13.38c-3.354,0-6.609-1.617-9.692-4.81,1.689-1.669,5.215-4.535,9.633-4.71,3.512-.138,7.013,1.446,10.43,4.715C323.983,251.661,320.1,254.7,315.484,254.7Z" transform="translate(-244.633 -194.675)" fill="#00cfc6"/>
                                            <path id="Trazado_47" data-name="Trazado 47" d="M129.981,241.316c-8.026.337-13.358,7.09-13.581,7.377a1.932,1.932,0,0,0,.053,2.435c4.184,4.932,8.819,7.433,13.776,7.433,8.333,0,14.3-7.152,14.555-7.456a1.932,1.932,0,0,0-.072-2.536C140.083,243.54,135.128,241.1,129.981,241.316Zm.248,13.38c-3.354,0-6.609-1.617-9.692-4.81,1.69-1.669,5.215-4.535,9.633-4.71,3.511-.139,7.013,1.446,10.43,4.715-1.872,1.77-5.755,4.805-10.371,4.805Z" transform="translate(-95.175 -194.675)" fill="#00cfc6"/>
                                            <path id="Trazado_48" data-name="Trazado 48" d="M459.89,367.269a1.931,1.931,0,1,0-1.045,2.522A1.95,1.95,0,0,0,459.89,367.269Z" transform="translate(-369.623 -295.341)" fill="#00cfc6"/>
                                          </g>
                                        </g>
                                      </svg>
                            </div>
                            <div>
                                <h2>Concurso de disfraces</h2>
                            </div>
                        </div>
												<?php
												if (COUNT($topdisfraces)>0) {
													for ($i=0; $i < COUNT($topdisfraces); $i++) {
														$votos = $topdisfraces[$i][0];
														$id = $topdisfraces[$i][1];
														$datosDisfraz = Usuarios::UsuariosDatosDisfraz($id);
														$nombre = $datosDisfraz['nombre'];
														$imagen = $datosDisfraz['imagen'];

														if ($i == 0) {
															?>
															<!--Contenedor de Foto de ganadores-->
															<div class="Contenedor-Ganadores primerlugar">
																<div class="opacidad-ganadores">
																	<p class="Lugares">1º</p>
																</div>
																<div id="PrimerLugar" class="overflow">
																	<div>
																		<img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
																	</div>
																</div>
															</div>
															<!--Nombre y numero de votos-->
															<div class="Nombre-Votos-1">
																<h4><?php echo $nombre; ?></h4>
																<p class="text-votos"><?php echo $votos; ?> Votos</p>
															</div>
															<?php
														}

														if ($i == 1) {
															?>
															<!--Contenedor de Foto de ganadores-->
															<div class="Contenedor-Ganadores segundolugar">
																<div class="opacidad-ganadores">
																	<p class="Lugares">2º</p>
																</div>
																<div id="PrimerLugar" class="overflow">
																	<div>
																		<img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
																	</div>
																</div>
															</div>
															<!--Nombre y numero de votos-->
															<div class="Nombre-Votos-2">
																<h4><?php echo $nombre; ?></h4>
																<p class="text-votos"><?php echo $votos; ?> Votos</p>
															</div>

															<?php
														}

														if ($i == 2) {
															?>
															<!--Contenedor de Foto de ganadores-->
															<div class="Contenedor-Ganadores tercerlugar">
																<div class="opacidad-ganadores">
																	<p class="Lugares">3º</p>
																</div>
																<div id="PrimerLugar" class="overflow">
																	<div>
																		<img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
																	</div>
																</div>
															</div>
															<!--Nombre y numero de votos-->
															<div class="Nombre-Votos-3">
																<h4><?php echo $nombre; ?></h4>
																<p class="text-votos"><?php echo $votos; ?> Votos</p>
															</div>

															<?php
														}
													}
												}
												?>



                    </div>
                </div>
            </div>
        </div>
        </main>
        <!--Footer de la App-->
        <footer>
            <div class="BoxFooter">
                <div class="ContainerFooter flex-footer">
                    <!--Icono Home-->
                    <a href="MiCuenta.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39.49" height="39.739" viewBox="0 0 39.49 39.739">
                            <g id="home" transform="translate(-0.183)">
                              <path id="Trazado_49" data-name="Trazado 49" d="M39.455,18.133,19.927,0,.4,18.133a.681.681,0,0,0,.927,1l2.26-2.1V39.739H36.268V17.032l2.26,2.1a.681.681,0,0,0,.927-1ZM34.907,38.377H4.948V15.768L19.927,1.858,34.907,15.768Z" transform="translate(0)"/>
                              <path id="Trazado_50" data-name="Trazado 50" d="M13.182,30.9h9.532V21.365H13.182Zm1.362-8.17h6.809v6.809H14.544Z" transform="translate(-4.148 -6.818)"/>
                              <path id="Trazado_51" data-name="Trazado 51" d="M40.714,21.365H31.182V30.9h9.532Zm-1.362,8.17H32.544V22.727h6.809Z" transform="translate(-9.893 -6.818)"/>
                              <path id="Trazado_52" data-name="Trazado 52" d="M13.182,48.9h9.532V39.365H13.182Zm1.362-8.17h6.809v6.809H14.544Z" transform="translate(-4.148 -12.563)"/>
                              <path id="Trazado_53" data-name="Trazado 53" d="M40.714,39.365H31.182V48.9h9.532Zm-1.362,8.17H32.544V40.727h6.809Z" transform="translate(-9.893 -12.563)"/>
                            </g>
                          </svg>
                    </a>
                    <!--Icono Disfraces-->
                    <a href="DisfracesGanadores.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.422" height="42.801" viewBox="0 0 41.422 42.801">
                            <g id="Grupo_16" data-name="Grupo 16" transform="translate(0)">
                              <g id="mask" transform="translate(0 0)">
                                <path id="Trazado_45" data-name="Trazado 45" d="M48.4,8.578a.836.836,0,0,0-1.621.287,3.754,3.754,0,0,1-.53,1.713c-.7,1.157-2,1.744-3.845,1.744a10.923,10.923,0,0,0-1.5.1,19.764,19.764,0,0,0,2.058-5.015A36.61,36.61,0,0,0,43.873,3.3a.836.836,0,0,0-.95-.95A31.376,31.376,0,0,0,34.708,4.8,32.683,32.683,0,0,0,32,.339a.836.836,0,0,0-1.344,0A32.69,32.69,0,0,0,27.943,4.8a31.376,31.376,0,0,0-8.215-2.456.836.836,0,0,0-.95.95,36.611,36.611,0,0,0,.912,4.113,19.76,19.76,0,0,0,2.058,5.015,10.911,10.911,0,0,0-1.5-.1,4.171,4.171,0,0,1-3.811-1.69,3.794,3.794,0,0,1-.564-1.767.836.836,0,0,0-1.621-.287A20.938,20.938,0,0,0,12.977,15.8v2.18a2.539,2.539,0,0,0-.878-.156H10.8a2.553,2.553,0,0,0-2.55,2.55v3.9a2.552,2.552,0,0,0,2.362,2.542V41.965a.836.836,0,0,0,1.672,0V26.817a2.533,2.533,0,0,0,.691-.148,7.083,7.083,0,0,0,7.044,7,7.145,7.145,0,0,0,2.446-.437l.035-.013.048-.018c.513-.2,2.273-.875,4.137-1.677a11.686,11.686,0,0,1,9.2,0c1.343.578,2.744,1.135,4.285,1.7a7.039,7.039,0,0,0,2.94.419.836.836,0,1,0-.119-1.668,5.382,5.382,0,0,1-2.244-.32c-1.511-.558-2.885-1.1-4.2-1.67a13.365,13.365,0,0,0-10.518,0c-1.847.794-3.592,1.467-4.083,1.654h0l-.023.008h0l-.015.006A5.4,5.4,0,0,1,14.649,26.6V15.8a19.338,19.338,0,0,1,.451-4.161c.75,1.118,2.239,2.356,5.151,2.356a8.942,8.942,0,0,1,4.006.921c.122.069.244.132.366.19a11.186,11.186,0,0,1,3.214,2.74,4.51,4.51,0,0,0,3.489,1.65h0a4.513,4.513,0,0,0,3.491-1.651,11.186,11.186,0,0,1,3.2-2.732c.13-.062.26-.129.39-.2a8.943,8.943,0,0,1,3.993-.915c2.912,0,4.4-1.238,5.151-2.356A19.338,19.338,0,0,1,48,15.8V26.6a5.429,5.429,0,0,1-.247,1.628.836.836,0,1,0,1.6.5,7.1,7.1,0,0,0,.324-2.129V15.8A20.944,20.944,0,0,0,48.4,8.578ZM21.915,31.657l-.009,0h0l.012,0Zm-9.816-6.5H10.8a.879.879,0,0,1-.878-.878v-3.9A.879.879,0,0,1,10.8,19.5h1.3a.879.879,0,0,1,.878.878v3.9A.879.879,0,0,1,12.1,25.153ZM42.01,4.212c-.143.718-.362,1.7-.663,2.763a13.659,13.659,0,0,1-2.716,5.672,4.728,4.728,0,0,1-4.154,1.34,5.862,5.862,0,0,0,1.542-2.707A6.59,6.59,0,0,0,35.994,8.2a12.879,12.879,0,0,0-.6-1.874A27.168,27.168,0,0,1,42.01,4.212ZM31.326,2.306c.363.548.831,1.289,1.3,2.122a13.411,13.411,0,0,1,1.872,4.9A4.261,4.261,0,0,1,34,11.865a5.856,5.856,0,0,1-1.843,1.815V7.9a.836.836,0,1,0-1.672,0v5.8a4.727,4.727,0,0,1-2.024-2.181A4.755,4.755,0,0,1,28.305,8.5a20.106,20.106,0,0,1,3.021-6.193ZM20.642,4.212a27.164,27.164,0,0,1,6.614,2.119,9.712,9.712,0,0,0-.8,3.483,5.926,5.926,0,0,0,1.685,4.172,4.681,4.681,0,0,1-4.122-1.339A13.658,13.658,0,0,1,21.3,6.975C21,5.914,20.785,4.929,20.642,4.212Zm8.484,12.571A14.533,14.533,0,0,0,28.1,15.666a8.439,8.439,0,0,0,1.8-.391c.217.114.418.206.59.279V17.7A2.854,2.854,0,0,1,29.126,16.782Zm4.4,0a2.857,2.857,0,0,1-1.365.916V15.546c.167-.073.361-.164.572-.277a8.443,8.443,0,0,0,1.813.4,14.527,14.527,0,0,0-1.019,1.114Z" transform="translate(-8.253 0)"/>
                                <path id="Trazado_46" data-name="Trazado 46" d="M307.3,241.309a8.685,8.685,0,0,0-5.875,3.191.836.836,0,0,0,.023,1.053c1.81,2.134,3.815,3.216,5.96,3.216,3.6,0,6.188-3.094,6.3-3.226a.836.836,0,0,0-.031-1.1C311.67,242.271,309.527,241.215,307.3,241.309Zm.107,5.788a5.87,5.87,0,0,1-4.193-2.081,6.635,6.635,0,0,1,4.167-2.038,6.225,6.225,0,0,1,4.512,2.04A6.967,6.967,0,0,1,307.408,247.1Z" transform="translate(-276.756 -221.131)"/>
                                <path id="Trazado_47" data-name="Trazado 47" d="M122.046,241.309a8.685,8.685,0,0,0-5.875,3.191.836.836,0,0,0,.023,1.053c1.81,2.134,3.815,3.216,5.96,3.216,3.6,0,6.188-3.094,6.3-3.226a.836.836,0,0,0-.031-1.1C126.416,242.271,124.272,241.215,122.046,241.309Zm.107,5.788a5.871,5.871,0,0,1-4.193-2.081,6.636,6.636,0,0,1,4.167-2.038,6.224,6.224,0,0,1,4.512,2.04,6.967,6.967,0,0,1-4.487,2.079Z" transform="translate(-106.988 -221.131)"/>
                                <path id="Trazado_48" data-name="Trazado 48" d="M457.784,366.595a.835.835,0,1,0-.452,1.091A.843.843,0,0,0,457.784,366.595Z" transform="translate(-418.733 -335.478)"/>
                              </g>
                            </g>
                          </svg>
                    </a>
                    <!--Icono Baile-->
                    <a href="BaileGanadores.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39.872" height="42.567" viewBox="0 0 39.872 42.567">
                            <g id="Grupo_15" data-name="Grupo 15" transform="translate(165 110)">
                              <g id="dance_1_" data-name="dance (1)" transform="translate(-165 -110)">
                                <path id="Trazado_41" data-name="Trazado 41" d="M4.627,16.475v9.086L1.99,28.209a4.259,4.259,0,0,0,3.015,7.266h.009l3.162-.007v4.614a2.485,2.485,0,0,0,4.969,0V35.223a2.472,2.472,0,0,0,0-4.472V23.027l3.928-2.072a2.13,2.13,0,0,0,.506-3.4L13.766,13.78a3.526,3.526,0,0,0-2.5-1.028H7.517a1.413,1.413,0,0,1-1-.414L4.627,10.456V9.888A12.954,12.954,0,0,1,4.84,6.8a11.026,11.026,0,0,1,.832-2.334,6.144,6.144,0,0,1,.32-.545A3.464,3.464,0,0,0,6.73,1.851,2.059,2.059,0,0,0,4.668,0H4.654A3.229,3.229,0,0,0,2.12,1.749,10.381,10.381,0,0,0,.962,4.528a21.328,21.328,0,0,0-.594,5.918,4.231,4.231,0,0,0,1.245,3.01Zm6.034,24.672A1.065,1.065,0,0,1,9.6,40.082V35.468h2.129v4.614A1.065,1.065,0,0,1,10.661,41.147Zm2.174-7.409a1.054,1.054,0,0,1-.53.284,1.19,1.19,0,0,1-.225.026H8.887l-3.874.007H5.006a2.839,2.839,0,0,1-2.011-4.844l2.843-2.852a.713.713,0,0,0,.151-.228.7.7,0,0,0,.05-.246c0-.008,0-.016,0-.024v-.33h5.679V30.5H9.6V28.189a1.065,1.065,0,0,0-1.818-.752L5.115,30.1a1.065,1.065,0,0,0,.752,1.818h6.214a1.3,1.3,0,0,1,.213.022,1.065,1.065,0,0,1,.538,1.8Zm-.549-13.466.73,1.217-.912.481c-.016.008-.04.023-.063.039l-.2.1a.715.715,0,0,1-.96-.3.678.678,0,0,1-.079-.326.69.69,0,0,1,.052-.246.648.648,0,0,1,.329-.382ZM8.177,30.5H6.724l1.453-1.453ZM9.763,14.172l-.876,1.46-.876-1.46Zm-4.251-.829a2.845,2.845,0,0,0,.627.459c0,.008,0,.017.009.026L7.974,16.87a1.065,1.065,0,0,0,1.826,0l1.61-2.684a2.106,2.106,0,0,1,1.356.6l3.814,3.777a.71.71,0,0,1-.167,1.136l-2.138,1.124-.732-1.218.743-.394a.71.71,0,0,0,.171-1.129l-1.518-1.518a.71.71,0,0,0-1.213.5v1.894l-1.2.633a2.186,2.186,0,0,0-1.146,1.888,2.106,2.106,0,0,0,.247.994,2.138,2.138,0,0,0,2.1,1.122v.511H6.047V16.181a.709.709,0,0,0-.207-.5L2.618,12.452a2.819,2.819,0,0,1-.83-2.007,20.18,20.18,0,0,1,.54-5.526c.055-.193.114-.393.18-.6l1.393.7A12.362,12.362,0,0,0,3.46,6.475,14.248,14.248,0,0,0,3.208,9.9v.6a1.311,1.311,0,0,0,.388.935ZM4.66,1.417h0a.633.633,0,0,1,.649.551,2.543,2.543,0,0,1-.522,1.193c-.12.191-.23.374-.325.552L3.046,3c.084-.165.171-.329.27-.485.438-.687.941-1.1,1.347-1.1Zm0,0" transform="translate(-0.351 0.001)"/>
                                <path id="Trazado_42" data-name="Trazado 42" d="M60.289,54.807a3.9,3.9,0,1,0,3.9-3.9A3.9,3.9,0,0,0,60.289,54.807Zm3.9-2.485a2.485,2.485,0,1,1-2.485,2.485A2.484,2.484,0,0,1,64.193,52.322Zm0,0" transform="translate(-55.303 -46.668)"/>
                                <path id="Trazado_43" data-name="Trazado 43" d="M294.591,67.194a3.737,3.737,0,0,0,1.386-.258,3.9,3.9,0,1,0-5.29-3.646,3.832,3.832,0,0,0,.225,1.309A3.908,3.908,0,0,0,294.591,67.194Zm0-6.389a2.485,2.485,0,0,1,.872,4.807,2.33,2.33,0,0,1-.872.162,2.485,2.485,0,0,1-2.343-1.655,2.431,2.431,0,0,1-.142-.83,2.485,2.485,0,0,1,2.485-2.485Zm0,0" transform="translate(-266.535 -54.441)"/>
                                <path id="Trazado_44" data-name="Trazado 44" d="M210.612,42.729a1.42,1.42,0,0,0,.095,2.179l.652.5a.745.745,0,0,0,.092.071c.142.091.284.173.426.257v9.1a2.485,2.485,0,1,0,4.969,0V47.293a15.385,15.385,0,0,0,1.552.085,20.226,20.226,0,0,0,4.806-.639l4.726,8.2a2.484,2.484,0,0,0,4.551-.6,2.457,2.457,0,0,0-.248-1.881l-4.252-7.369c.142-.064.284-.129.4-.187a1.42,1.42,0,0,0,.439-2.23l-2.956-3.281a2.1,2.1,0,0,0,1.367-.219,2.14,2.14,0,0,0,1.116-1.633l.46-3.926a2.839,2.839,0,0,0-1.633-2.91l-4.984-2.3a2.84,2.84,0,0,0-1.981-.149l-2.38.691a.542.542,0,0,1-.446-.065.553.553,0,0,1-.249-.4l-1.9-10.573a2.153,2.153,0,0,0-2.114-1.816c-.081,0-.171.008-.316.023a2.149,2.149,0,0,0-1.782,2.441l2.022,11.7a17.27,17.27,0,0,0,.384,1.7l1.068,3.809a4.561,4.561,0,0,1-1.331,4.632Zm4.816,12.1a1.065,1.065,0,1,1-2.13,0V46.436c.219.089.439.17.66.243h0l.023.008h.006c.176.065.355.119.532.17q.444.128.9.223Zm15.684-.862a1.065,1.065,0,0,1-1.95.259l-4.543-7.879q1.026-.313,2.042-.716l4.347,7.533A1.048,1.048,0,0,1,231.112,53.968Zm-18.68-35.642a.71.71,0,0,1,.572-.81.733.733,0,0,1,.838.62l1.9,10.572a1.966,1.966,0,0,0,2.492,1.6l2.38-.691a1.41,1.41,0,0,1,.994.071l4.982,2.3a1.42,1.42,0,0,1,.815,1.454l-.459,3.924a.721.721,0,0,1-.375.55.71.71,0,0,1-.678,0,.751.751,0,0,1-.355-.765l.114-.958.223-1.888a1.415,1.415,0,0,0-.815-1.455l-2.5-1.15a1.047,1.047,0,0,0-.933.027,3.636,3.636,0,0,0-3.39-.03,4.658,4.658,0,0,0-3.424-.092l-.006-.02a15.728,15.728,0,0,1-.355-1.562Zm11.253,18.628L222.66,33.3l1.8.829-.224,1.887-.113.958c0,.014,0,.026,0,.04h-.008a2.37,2.37,0,0,0-.007.421Zm-7.809-1.571-.671-2.391a3.075,3.075,0,0,1,2.519.016,1.391,1.391,0,0,0,1.162-.079,2.3,2.3,0,0,1,2.233.121l1.246,4.447c0,.006.007.011.008.018a.716.716,0,0,0,.034.071.707.707,0,0,0,.092.158c.008.009.01.021.018.031l5.254,5.841c-.291.142-.654.3-1.079.484a24.72,24.72,0,0,1-3.321,1.149,15.794,15.794,0,0,1-8.455.252c-.153-.045-.307-.089-.486-.156a9.643,9.643,0,0,1-2.176-1.037l-.686-.523,2.564-2.331a5.97,5.97,0,0,0,1.742-6.072Zm0,0" transform="translate(-192.696 -14.748)"/>
                              </g>
                            </g>
                          </svg>
                    </a>
                    <!--Icono Ofrenda-->
                    <a href="OfrendaGanadores.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="52.504" height="42.557" viewBox="0 0 52.504 42.557">
                            <g id="catrina_1_" data-name="catrina (1)" transform="translate(0 -48.5)">
                              <path id="Trazado_67" data-name="Trazado 67" d="M230.96,288.624l-3.23-3.23-3.23,3.23v1.908h6.46Zm-4.655.37,1.425-1.425,1.425,1.425Z" transform="translate(-201.478 -212.601)"/>
                              <path id="Trazado_68" data-name="Trazado 68" d="M141.114,193.037a2.394,2.394,0,0,0,1.463,1.123,2.421,2.421,0,0,0,.628.083,2.378,2.378,0,0,0,.534-.062,2.41,2.41,0,0,0,4.607,0,2.378,2.378,0,0,0,.534.062,2.426,2.426,0,0,0,.628-.083,2.41,2.41,0,0,0,1.141-3.968,2.41,2.41,0,0,0-2.3-3.99,2.41,2.41,0,0,0-4.607,0,2.41,2.41,0,0,0-2.3,3.99A2.414,2.414,0,0,0,141.114,193.037Zm1.332-.769a.873.873,0,0,1,.319-1.191l.148-.085a3.23,3.23,0,0,0,.874,1.508l-.15.087A.872.872,0,0,1,142.447,192.268Zm5.289-2.077a1.692,1.692,0,1,1-1.692-1.692A1.694,1.694,0,0,1,147.735,190.191Zm-1.692,4.153a.873.873,0,0,1-.872-.872V193.3a3.213,3.213,0,0,0,1.743,0v.172A.873.873,0,0,1,146.043,194.344Zm3.6-2.077a.872.872,0,0,1-1.191.319l-.15-.087a3.231,3.231,0,0,0,.874-1.508l.148.085A.873.873,0,0,1,149.64,192.268Zm0-4.153a.873.873,0,0,1-.319,1.191l-.148.085a3.231,3.231,0,0,0-.874-1.509l.15-.087A.873.873,0,0,1,149.64,188.115Zm-3.6-2.076a.873.873,0,0,1,.872.872v.172a3.213,3.213,0,0,0-1.743,0v-.172A.873.873,0,0,1,146.043,186.038Zm-3.6,2.077a.873.873,0,0,1,1.191-.319l.15.087a3.231,3.231,0,0,0-.874,1.508l-.148-.085A.873.873,0,0,1,142.447,188.115Z" transform="translate(-126.354 -122.054)"/>
                              <path id="Trazado_69" data-name="Trazado 69" d="M278.972,187.346a2.414,2.414,0,0,0-2.625-1.144,2.41,2.41,0,0,0-4.607,0,2.41,2.41,0,0,0-2.3,3.99,2.412,2.412,0,0,0,1.769,4.052,2.378,2.378,0,0,0,.534-.062,2.41,2.41,0,0,0,4.607,0,2.378,2.378,0,0,0,.534.062,2.426,2.426,0,0,0,.628-.083,2.41,2.41,0,0,0,1.141-3.968,2.414,2.414,0,0,0,.322-2.846Zm-1.332.769a.873.873,0,0,1-.319,1.191l-.148.085a3.232,3.232,0,0,0-.874-1.509l.15-.087A.873.873,0,0,1,277.64,188.115Zm-5.289,2.077a1.692,1.692,0,1,1,1.692,1.692A1.694,1.694,0,0,1,272.351,190.191Zm1.692-4.153a.873.873,0,0,1,.872.872v.172a3.213,3.213,0,0,0-1.743,0v-.172A.873.873,0,0,1,274.043,186.038Zm-3.6,2.077a.873.873,0,0,1,1.191-.319l.15.087a3.231,3.231,0,0,0-.874,1.508l-.148-.085A.873.873,0,0,1,270.447,188.115Zm0,4.153a.873.873,0,0,1,.319-1.191l.148-.085a3.23,3.23,0,0,0,.874,1.508l-.15.087A.872.872,0,0,1,270.447,192.268Zm3.6,2.077a.873.873,0,0,1-.872-.872V193.3a3.213,3.213,0,0,0,1.743,0v.172A.873.873,0,0,1,274.043,194.344Zm3.6-2.077a.872.872,0,0,1-1.191.319l-.15-.087a3.23,3.23,0,0,0,.874-1.508l.148.085A.873.873,0,0,1,277.64,192.268Z" transform="translate(-241.228 -122.054)"/>
                              <path id="Trazado_70" data-name="Trazado 70" d="M135.572,73.88a5.648,5.648,0,0,0-1.3-3.619,15.393,15.393,0,0,0,1.3-6.226,15.572,15.572,0,0,0-3.453-9.766l-1.2.968a14.029,14.029,0,0,1,3.11,8.8,13.868,13.868,0,0,1-1.364,6.034l-.235.491.384.385a4.153,4.153,0,0,1-2.939,7.088h-.769v4.922h-1.743v-.872a2.408,2.408,0,0,0-4.051-1.763,2.4,2.4,0,0,0-3.281,0,2.4,2.4,0,0,0-3.281,0,2.408,2.408,0,0,0-4.051,1.763v.872H110.96V78.033h-.769a4.153,4.153,0,0,1-2.939-7.088l.384-.385-.235-.491a14.037,14.037,0,0,1,12.635-20.032h.12a13.981,13.981,0,0,1,9.21,3.563l1.026-1.146A15.517,15.517,0,0,0,120.17,48.5h-.134A15.543,15.543,0,0,0,105.8,70.261a5.692,5.692,0,0,0,3.624,9.258v7.486a4.055,4.055,0,0,0,4.051,4.051H126.6a4.055,4.055,0,0,0,4.051-4.051V79.52A5.7,5.7,0,0,0,135.572,73.88Zm-21.33,10.614h1.743v.872a.872.872,0,0,1-1.743,0Zm3.281,0h1.743v.872a.872.872,0,0,1-1.743,0Zm3.281,0h1.743v.872a.872.872,0,1,1-1.743,0Zm3.281,0h1.743v.872a.872.872,0,1,1-1.743,0Zm.872-3.281a.873.873,0,0,1,.872.872v.872h-1.743v-.872A.873.873,0,0,1,124.958,81.212Zm-3.281,0a.873.873,0,0,1,.872.872v.872H120.8v-.872A.873.873,0,0,1,121.676,81.212Zm-3.281,0a.873.873,0,0,1,.872.872v.872h-1.743v-.872A.873.873,0,0,1,118.4,81.212Zm-4.153.872a.872.872,0,0,1,1.743,0v.872h-1.743ZM126.6,89.519H113.473a2.515,2.515,0,0,1-2.512-2.512V84.494H112.7v.872a2.408,2.408,0,0,0,4.051,1.763,2.4,2.4,0,0,0,3.281,0,2.4,2.4,0,0,0,3.281,0,2.408,2.408,0,0,0,4.051-1.763v-.872h1.743v2.512A2.515,2.515,0,0,1,126.6,89.519Z" transform="translate(-93.784 0)"/>
                              <path id="Trazado_71" data-name="Trazado 71" d="M394.614,283.369V271.883h-3.281v-1.049a2.414,2.414,0,0,0,1.641-2.283,6.887,6.887,0,0,0-1.621-3.782l-.23-.269H390l-.23.269a6.889,6.889,0,0,0-1.621,3.782,2.414,2.414,0,0,0,1.641,2.283v1.049h-3.281v5.691h1.538v-4.153h5.025v9.947h-5.025v-4.153h-1.538v4.153H384v1.538h13.126v-1.538Zm-4.051-17.089a4.592,4.592,0,0,1,.872,2.271.872.872,0,0,1-1.743,0A4.593,4.593,0,0,1,390.563,266.28Z" transform="translate(-344.622 -193.85)"/>
                              <path id="Trazado_72" data-name="Trazado 72" d="M4.051,273.422H9.075v8.255h1.538v-9.793H7.332v-1.049a2.414,2.414,0,0,0,1.641-2.283,6.887,6.887,0,0,0-1.621-3.782l-.23-.269H6l-.23.269a6.888,6.888,0,0,0-1.621,3.782,2.414,2.414,0,0,0,1.641,2.283v1.049H2.512v11.485H0v1.538H13.126v-1.538H4.051Zm2.512-7.142a4.592,4.592,0,0,1,.872,2.271.872.872,0,0,1-1.743,0A4.592,4.592,0,0,1,6.563,266.28Z" transform="translate(0 -193.85)"/>
                              <path id="Trazado_73" data-name="Trazado 73" d="M215.064,72.941l-.507-.1a4.04,4.04,0,0,0-2.468.294,4.351,4.351,0,0,0-.723-1.038,5.853,5.853,0,0,0-.958-.839l-.429-.287-.429.287a5.851,5.851,0,0,0-.958.839,4.35,4.35,0,0,0-.723,1.038,4.04,4.04,0,0,0-2.468-.294l-.507.1-.1.507a3.579,3.579,0,0,0,.666,2.967,2.987,2.987,0,0,0,2.128.74c.137,0,.263-.006.375-.015a2.41,2.41,0,1,0,4.03,0c.111.009.238.015.375.015a2.987,2.987,0,0,0,2.128-.74h0a3.579,3.579,0,0,0,.666-2.967Zm-5.082-.058a2.345,2.345,0,0,1,.87,1.475,2.36,2.36,0,0,1-.874,1.475,2.345,2.345,0,0,1-.87-1.475A2.36,2.36,0,0,1,209.982,72.883Zm-3.433,2.444a1.544,1.544,0,0,1-.288-1.021,1.549,1.549,0,0,1,1.021.289h0a1.543,1.543,0,0,1,.288,1.021A1.543,1.543,0,0,1,206.549,75.327Zm3.43,4a.872.872,0,1,1,.872-.872A.873.873,0,0,1,209.98,79.331Zm3.43-4a1.544,1.544,0,0,1-1.021.288,1.087,1.087,0,0,1,1.309-1.309A1.544,1.544,0,0,1,213.41,75.327Z" transform="translate(-183.728 -20.167)"/>
                              <path id="Trazado_74" data-name="Trazado 74" d="M168,152.5h1.641v1.538H168Z" transform="translate(-150.772 -93.335)"/>
                              <path id="Trazado_75" data-name="Trazado 75" d="M200,152.5h1.641v1.538H200Z" transform="translate(-179.491 -93.335)"/>
                              <path id="Trazado_76" data-name="Trazado 76" d="M296,152.5h1.641v1.538H296Z" transform="translate(-265.646 -93.335)"/>
                              <path id="Trazado_77" data-name="Trazado 77" d="M328,152.5h1.641v1.538H328Z" transform="translate(-294.365 -93.335)"/>
                            </g>
                          </svg>
                    </a>
                </div>
            </div>
        </footer>

        <!-- Vista de Desktop | Tablet -->
        <div class="Responsive">
            <div class="fondoDesktop">
                <div class="FloatBox">
                    <div class="BoxContainer-Responsive">
                        <h3>Tu pantalla es muy grande</h3>
                        <p class="textResponsive">Si quieres visualizar el sitio desde tu desktop, haz la pantalla de tu browser lo más pequeña posible.</p>
                        <img src="images/AjusteDePantalla.gif" alt="...">
                    </div>
                </div>
                <img src="images/BackgroundAnimas.png" alt="Background Animas">
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Mis JS-->
    <script src="js/menu.js"></script>

  </body>
</html>