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

//historial de guias
//print_r($existe);


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
                    <li><a class="TextoMenu" href="javascript:void(0);" onclick="borrar_localstorage()">- Salir</a></li>
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
                        <!--LOG OUT-->
                        <div class="LogOut">
                            <a href="javascript:void(0);" onclick="borrar_localstorage()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39.998" height="29.744" viewBox="0 0 39.998 29.744">
                                    <g id="logout" transform="translate(0 -42.299)">
                                        <g id="XMLID_2_" transform="translate(0 42.299)">
                                        <path id="XMLID_4_" d="M6.207,114.091H27.271a1.818,1.818,0,0,0,0-3.636H6.207L8.558,108.1a1.818,1.818,0,0,0-2.571-2.571L.533,110.987c-.042.042-.082.086-.12.132-.009.011-.017.023-.026.035-.028.035-.055.071-.08.108-.007.011-.013.022-.02.033-.025.039-.049.078-.072.12L.2,111.44c-.023.044-.045.09-.064.136l-.006.018c-.02.049-.038.1-.054.15,0,.006,0,.013,0,.02-.015.05-.028.1-.038.152,0,.015,0,.031-.007.047-.008.043-.015.086-.019.13a1.793,1.793,0,0,0,0,.363c0,.044.012.088.019.131,0,.015,0,.03.007.045.01.052.024.1.039.154,0,.006,0,.012,0,.018.016.051.034.1.054.151l.006.016c.019.047.042.092.065.137l.012.024c.022.041.047.081.072.12.007.011.013.022.02.032.025.037.053.073.08.108.009.011.017.023.026.035.038.046.078.09.12.132l5.454,5.454a1.818,1.818,0,1,0,2.571-2.571Z" transform="translate(0 -97.401)" fill="#fff"/>
                                        <path id="XMLID_5_" d="M115.505,42.3a14.861,14.861,0,0,0-12.351,6.585,1.818,1.818,0,0,0,3.018,2.028,11.236,11.236,0,1,1,.015,12.539,1.818,1.818,0,0,0-3.013,2.036A14.873,14.873,0,1,0,115.505,42.3Z" transform="translate(-90.379 -42.299)" fill="#fff"/>
                                        </g>
                                    </g>
                                </svg>
                                <p class="Salir">Salir</p>
                            </a>
                        </div>
                        <div class="ContentTitle">
                            <h1 class="shadowText title">Mi cuenta</h1>
                            <p class="shadowText heading-4">Bienvenid@</p>
                            <p class="UsuarioTexto shadowText">(<?php echo $usuarioC['usuario']; ?>)</p>
                        </div>
                    </div>
                </div>

                <!--Sección de Contenido Principal-->
                <div class="BoxContainer">
                    <div class="ContentBox MiCuenta-section">
                        <div class="contenedor-titulo-flex">
                            <h2>¿Ya votaste?</h2>
                            <p>Recuerda que sólo tienes una oportunidad para votar</p>
                        </div>
                        <div class="contenedor-botones-flex">
                            <button id="disfraces" class="totalsize" onclick="window.location.href='VotacionDisfraz.php'">Concurso de disfraces</button>

                            <?php if ($existe['jurado'] == "baile") { ?>
															<button id="baile" class="totalsize" onclick="window.location.href='VotacionBaile.php'">Concurso de baile</button>
													<?php } if ($existe['jurado'] == "ofrenda") { ?>
                            <button id="ofrenda" class="totalsize" onclick="window.location.href='VotacionOfrenda.php'">Concurso de la ofrenda</button>
													<?php } ?>


                        </div>
                        <div class="EndSpace"></div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <!--Footer de la App-->
        <footer>
            <div class="BoxFooter">
                <div class="ContainerFooter">
                    <a href="DisfracesGanadores.php">
                        <!-- SVG | ICONO | COPA -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.468" height="35.58" viewBox="0 0 30.468 35.58">
                            <g id="Grupo_6" data-name="Grupo 6" transform="translate(57 -579)">
                              <g id="trophy_1_" data-name="trophy (1)" transform="translate(-93.785 579)">
                                <g id="Grupo_3" data-name="Grupo 3" transform="translate(36.785)">
                                  <g id="Grupo_2" data-name="Grupo 2" transform="translate(0)">
                                    <path id="Trazado_30" data-name="Trazado 30" d="M66.644,3.431a2.575,2.575,0,0,0-1.964-.908H62.193V1.745A1.747,1.747,0,0,0,60.448,0H43.59a1.747,1.747,0,0,0-1.745,1.745v.778H39.358a2.575,2.575,0,0,0-1.964.908,2.543,2.543,0,0,0-.576,2.059A13.323,13.323,0,0,0,43.587,15a17.57,17.57,0,0,0,1.112,2.23,10.375,10.375,0,0,0,4.769,4.5,3.761,3.761,0,0,1-2.9,4.024l-.011,0a.823.823,0,0,0-.632.8v3.778H44.394a2.473,2.473,0,0,0-2.47,2.47v1.95a.823.823,0,0,0,.823.823H61.37a.823.823,0,0,0,.823-.823v-1.95a2.473,2.473,0,0,0-2.47-2.47H58.195V26.559a.823.823,0,0,0-.634-.8l-.01,0a3.758,3.758,0,0,1-2.9-4.058,10.435,10.435,0,0,0,4.689-4.466A17.577,17.577,0,0,0,60.451,15,13.324,13.324,0,0,0,67.22,5.49,2.543,2.543,0,0,0,66.644,3.431Zm-28.2,1.794a.887.887,0,0,1,.2-.727.93.93,0,0,1,.71-.328h2.486V5.685a25.875,25.875,0,0,0,.878,6.781A11.661,11.661,0,0,1,38.444,5.225ZM59.723,31.983a.824.824,0,0,1,.823.823v1.126H43.57V32.807a.824.824,0,0,1,.823-.823Zm-3.175-4.6v2.954H47.569V27.382Zm-6.82-1.647a5.452,5.452,0,0,0,.556-.727,5.357,5.357,0,0,0,.85-2.827,6.456,6.456,0,0,0,1.848-.011A5.421,5.421,0,0,0,54.4,25.735H49.728ZM60.546,5.685A21.277,21.277,0,0,1,57.923,16.39c-1.612,2.712-3.708,4.206-5.9,4.206s-4.293-1.494-5.9-4.206A21.276,21.276,0,0,1,43.492,5.685V1.745a.1.1,0,0,1,.1-.1H60.448a.1.1,0,0,1,.1.1Zm5.048-.459a11.662,11.662,0,0,1-4.279,7.24,25.878,25.878,0,0,0,.878-6.781V4.17h2.486a.93.93,0,0,1,.71.328A.888.888,0,0,1,65.594,5.225Z" transform="translate(-36.785 0)"/>
                                  </g>
                                </g>
                                <g id="Grupo_5" data-name="Grupo 5" transform="translate(46.979 4.822)">
                                  <g id="Grupo_4" data-name="Grupo 4" transform="translate(0)">
                                    <path id="Trazado_31" data-name="Trazado 31" d="M193.518,73.023a.824.824,0,0,0-.665-.56l-2.485-.361-1.111-2.252a.823.823,0,0,0-1.477,0L186.669,72.1l-2.485.361a.823.823,0,0,0-.456,1.4l1.8,1.753-.425,2.475a.823.823,0,0,0,1.195.868l2.223-1.168,2.223,1.168a.823.823,0,0,0,1.195-.868l-.425-2.475,1.8-1.753A.823.823,0,0,0,193.518,73.023Zm-3.466,1.72a.823.823,0,0,0-.237.729l.216,1.257-1.129-.594a.824.824,0,0,0-.766,0l-1.129.594.216-1.257a.823.823,0,0,0-.237-.729l-.913-.89,1.262-.183a.823.823,0,0,0,.62-.45l.564-1.144.564,1.144a.824.824,0,0,0,.62.45l1.262.183Z" transform="translate(-183.479 -69.391)"/>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        <p class="TextoGanadores">Ver ganadores</p>
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
    <script src="js/muertos.js"></script>
  </body>
</html>
