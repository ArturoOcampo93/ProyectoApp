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

//historial de disfraces

$busco="";
if (isset($_SESSION['busco']) ) {

	$busco= $_SESSION['busco'];
	$_SESSION['busco']="";
}
if($busco){
	$noRes = 0;
	$todosDiafraces=Usuarios::buscaBaileConsulta($busco);
}else{
	$todosDiafraces = Usuarios::todosBailes();

}
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
                            <h1 class="shadowText title">concurso de baile</h1>
                            <!--<p class="shadowText heading-4">Concurso de Baile</p>-->
                        </div>
                    </div>
                </div>

                <!--Carousel-->
                <div class="BoxContainer">
                    <div id="carouselExampleControls" class="carousel slide ContentBox contenedor-carousel" data-ride="carousel">


                        <div class="carousel-inner Grid-Position-Carousel">
                            <!--Contenedor del participante-->

                            <?php

                            if (count($todosDiafraces) >0) {
                              for ($i=0; $i < count($todosDiafraces); $i++) {
                                // code...
                                $id = $todosDiafraces[$i][0];
                                $nombre = $todosDiafraces[$i][1];
                                //$usuario = $todosDiafraces[$i][2];
                                $categoria = $todosDiafraces[$i][2];
                                $imagen = $todosDiafraces[$i][5];
                                $fecha = $todosDiafraces[$i][4];

																if ($imagen=="") {
																	$imagen = "getimage.jpg";
																}

                                if ($i == 0) {
                                  echo '
                                  <!--Contenedor del participante-->

                                  <div class="carousel-item active opacity-carousel">
                                  <div class="Grid-Position-Carousel">
                                  <div class="opacity-carousel">
                                  <div class="contenedor-info">
                                  <p class="nombre shadowText">'.$nombre.'('.$categoria.')</p>
                                  <button class="boton-votar votaBaile" data-id="'.$id.'" data-nombre="'.$nombre.'" >Calificar</button>
                                  </div>
                                  </div>
                                  <img class="img-carousel" src="imagesFTP/'.$imagen.'" alt="...">
                                  </div>
                                  </div>

                                  ';
                                }else{
                                  echo '
                                  <div class="carousel-item opacity-carousel">
                                  <div class="Grid-Position-Carousel">
                                  <div class="opacity-carousel">
                                  <div class="contenedor-info">
                                  <p class="nombre shadowText">'.$nombre.'('.$categoria.')</p>
                                  <button class="boton-votar votaBaile" data-id="'.$id.'" data-nombre="'.$nombre.'" >Calificar</button>
                                  </div>
                                  </div>
                                  <img class="img-carousel" src="imagesFTP/'.$imagen.'" alt="...">
                                  </div>
                                  </div>
                                  ';
                                }
                              }
                            }


                            ?>
                            <!--<div class="carousel-item active opacity-carousel">
                                    <div class="Grid-Position-Carousel">
                                        <div class="opacity-carousel">
                                            <div class="contenedor-info">
                                                <p class="nombre shadowText">Nombre del participante</p>
                                                <button class="boton-votar" onclick="window.location.href='ThankYouPage.html'">Votar</button>
                                            </div>
                                        </div>
                                        <img class="img-carousel" src="images/PrimerLugar.jpg" alt="...">
                                    </div>
                                </div>
                                Contenedor del participante
                                <div class="carousel-item opacity-carousel">
                                    <div class="Grid-Position-Carousel">
                                        <div class="opacity-carousel">
                                            <div class="contenedor-info">
                                                <p class="nombre shadowText">Nombre del participante</p>
                                                <button class="boton-votar" onclick="window.location.href='ThankYouPage.html'">Votar</button>
                                            </div>
                                        </div>
                                        <img class="img-carousel" src="images/SegundoLugar.jpg" alt="...">
                                    </div>
                                </div>

                                <div class="carousel-item opacity-carousel">
                                    <div class="Grid-Position-Carousel">
                                        <div class="opacity-carousel">
                                            <div class="contenedor-info">
                                                <p class="nombre shadowText">Nombre del participante</p>
                                                <button class="boton-votar" onclick="window.location.href='ThankYouPage.html'">Votar</button>
                                            </div>
                                        </div>
                                        <img class="img-carousel" src="images/TercerLugar.jpg" alt="...">
                                    </div>
                                </div>
                            </div>-->
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
                        <!--Icono Disfraces-->
                        <div onclick="buscar()">
                                <svg id="loupe" xmlns="http://www.w3.org/2000/svg" width="39.739" height="39.739" viewBox="0 0 39.739 39.739">
                                    <g id="Grupo_39" data-name="Grupo 39" transform="translate(23.284 14.747)">
                                      <g id="Grupo_38" data-name="Grupo 38">
                                        <path id="Trazado_61" data-name="Trazado 61" d="M300.776,190a.776.776,0,1,0,.776.776A.776.776,0,0,0,300.776,190Z" transform="translate(-300 -190)"/>
                                      </g>
                                    </g>
                                    <g id="Grupo_41" data-name="Grupo 41">
                                      <g id="Grupo_40" data-name="Grupo 40">
                                        <path id="Trazado_62" data-name="Trazado 62" d="M38.829,34.439l-10.36-10.36a15.384,15.384,0,0,0,2.577-8.556A15.523,15.523,0,1,0,15.523,31.046a15.384,15.384,0,0,0,8.556-2.577l2.864,2.864h0l7.5,7.5a3.1,3.1,0,1,0,4.39-4.39ZM23.714,26.834h0a13.985,13.985,0,1,1,3.12-3.12A14.038,14.038,0,0,1,23.714,26.834Zm1.628.7a15.576,15.576,0,0,0,2.195-2.195l2.2,2.2a18.839,18.839,0,0,1-2.195,2.195ZM37.732,37.732a1.551,1.551,0,0,1-2.195,0L28.645,30.84a20.4,20.4,0,0,0,2.195-2.195l6.892,6.892a1.551,1.551,0,0,1,0,2.194Z"/>
                                      </g>
                                    </g>
                                    <g id="Grupo_43" data-name="Grupo 43" transform="translate(3.105 3.105)">
                                      <g id="Grupo_42" data-name="Grupo 42">
                                        <path id="Trazado_63" data-name="Trazado 63" d="M52.418,40A12.418,12.418,0,1,0,64.837,52.418,12.432,12.432,0,0,0,52.418,40Zm0,23.284A10.866,10.866,0,1,1,63.284,52.418,10.878,10.878,0,0,1,52.418,63.284Z" transform="translate(-40 -40)"/>
                                      </g>
                                    </g>
                                    <g id="Grupo_45" data-name="Grupo 45" transform="translate(14.747 6.209)">
                                      <g id="Grupo_44" data-name="Grupo 44">
                                        <path id="Trazado_64" data-name="Trazado 64" d="M199.474,85.982a9.328,9.328,0,0,0-8.7-5.982.776.776,0,1,0,0,1.552,7.814,7.814,0,0,1,7.249,4.987.776.776,0,1,0,1.449-.557Z" transform="translate(-190 -80)"/>
                                      </g>
                                    </g>
                                  </svg>
                        </div>
                            <div id="buscador">
                                <form action="">
                                    <div class="alerta-buscador" id="alertaRegistro">Nombre no encontrado</div>
                                    <input class="input-flex" name="nombreequipo" id="nombreequipo" type="text" placeholder="Nombre del participante">
                                    <input class="input-flex submit" type="button" id="btBuscarBaile" value="Buscar">
                                    <input class="input-flex submit" type="button" id="btBuscarTodos" value="Mostrar todos">
                                </form>
                                <div class="EndPage"></div>
                            </div>
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


        <!-- Modal Star Raiting-->
        <div class="modal fade" id="Calificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Califica al participante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h4 class="nombre-participante" id="nombrepart" >Nombre del participante</h4>
										<input type="hidden" name="id" id="id">
										<!--Alerta de "Ya Votaste"-->
										<div class="contenedor-alerta-votacion" id="votasteerror">¡Ya votaste!</div>

                    <!--Star Raiting-->
                        <div class="ContainerStars">

                            <form action="">
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                    <label for="radio1">★</label>
                                    <input id="radio2" type="radio" name="estrellas" value="4">
                                    <label for="radio2">★</label>
                                    <input id="radio3" type="radio" name="estrellas" value="3">
                                    <label for="radio3">★</label>
                                    <input id="radio4" type="radio" name="estrellas" value="2">
                                    <label for="radio4">★</label>
                                    <input id="radio5" type="radio" name="estrellas" value="1">
                                    <label for="radio5">★</label>
                                </p>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="submit" data-dismiss="modal" id="btCalifica" value="Registrar Voto">
                </form>
                </div>
            </div>
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
