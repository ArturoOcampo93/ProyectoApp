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
                        <li><a class="TextoMenu" href="DisfracesGanadores.html">- Ver Ganadores</a></li>
                        <li><a class="TextoMenu" href="index.html">- Salir</a></li>
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
                            <a href="index.html">
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
                            <h1 class="shadowText title">concurso de la ofrenda</h1>
                            <!--<p class="shadowText heading-4">Concurso de Baile</p>-->
                        </div>
                    </div>
                </div>

                <!--Carousel-->
                <div class="BoxContainer">
                    <div id="carouselExampleControls" class="carousel slide ContentBox contenedor-carousel" data-ride="carousel">

                        <!--Alerta de "Ya Votaste"-->
                        <div class="contenedor-alerta-votacion">¡Ya votaste!</div>

                        <div class="carousel-inner Grid-Position-Carousel">
                            <!--Contenedor del participante-->
                            <div class="carousel-item active opacity-carousel">
                                    <div class="Grid-Position-Carousel">
                                        <div class="opacity-carousel ofrenda">
                                            <div class="contenedor-info">
                                                <p class="nombre shadowText">Niebla</p>
                                                <button class="boton-votar boton-ofrenda votaOfrenda" data-id="1">Votar</button>
                                            </div>
                                        </div>
                                        <img class="img-carousel" src="imagesFTP/niebla.jpg" alt="...">
                                    </div>
                                </div>
                                <!--Contenedor del participante-->
                                <div class="carousel-item opacity-carousel">
                                    <div class="Grid-Position-Carousel">
                                        <div class="opacity-carousel ofrenda">
                                            <div class="contenedor-info">
                                                <p class="nombre shadowText">San Jerónimo</p>
                                                <button class="boton-votar boton-ofrenda votaOfrenda" data-id="2">Votar</button>
                                            </div>
                                        </div>
                                        <img class="img-carousel" src="imagesFTP/sanjeronimo.jpg" alt="...">
                                    </div>
                                </div>
                            <!--Controles | Flechas-->
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <!--Footer de la App-->
        <footer>
                <div class="BoxFooter">
                    <div class="ContainerFooter flex-footer wrap">
                        <!--Icono Home-->
                        <a class="margin-bottom" href="MiCuenta.php">
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Mis JS-->
    <script>
        $('.carousel').carousel({
        interval: 4000
        })
    </script>
    <script src="js/buscar.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/muertos.js"></script>

  </body>
</html>
