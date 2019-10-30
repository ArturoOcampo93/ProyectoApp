<?php
require_once("js/clases.php");

$categoria = "";
$siguiente = "";
if (isset($_GET['categoria'])) {
  // code...
  $categoria = $_GET['categoria'];
  if ($categoria == "") {
    // code...
    $categoria = "pareja";
    $siguiente = "equipo";
  }else{
    if ($categoria == "pareja") {
      $siguiente = "equipo";
    }else{
      $siguiente = "pareja";
    }
  }
}else{
  $categoria = "pareja";
  $siguiente = "equipo";
}

//votos ofrenda
$topOfrenda = Usuarios::todosOfrenda();
//top disfraces
$topdisfraces = Usuarios::topDisfraces();
//top bailes
$topBailes = Usuarios::topBailes($categoria);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!--Mis estilos-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fireworks.css">

    <title>Estatus de ganadores</title>
  </head>
  <body>
    <p class="titulo-principal-ganadores-pantalla shadowText">Estatus de ganadores</p>
    <div class="opacidad-general"></div>
    <div class="container-fluid FondoPrincipal">

            <div class="fireworks">
                    <div class="col-12">
                      <div class="pyro">
                        <div class="before"></div>
                        <div class="after"></div>
                      </div>
                    </div>
                  </div>


        <div class="contenedor-ganadores pantalla">
            <div class="cont-disfraz">
                <div class="titulo-ganadores-pantalla">

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

                    <h3 class="TituloDisfraces">Concurso de<br>disfraces</h3>
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
                      <!--Primer lugar-->
                      <div class="cont-Primerlugar animated swing">
                        <div class="opacidad-ganadores-primer-lugar opacidad-pantalla">
                          <p class="Lugares">1º</p>
                        </div>
                        <div class="overflow">
                          <div>
                            <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                          </div>
                        </div>
                      </div>
                      <div class="primer-lugar">
                        <h4><?php echo $nombre; ?>
                          <span class="text-votos"> (<?php echo $votos; ?> Votos)</span>
                        </h4>
                      </div>

                      <?php
                    }

                    if ($i == 1) {
                      ?>
                      <!--Segundo lugar-->
                      <div class="cont-Segundolugar animated swing">
                        <div class="opacidad-ganadores-segundo-lugar opacidad-pantalla">
                          <p class="Lugares">2º</p>
                        </div>
                        <div class="overflow">
                          <div>
                            <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                          </div>
                        </div>
                      </div>
                      <div class="segundo-lugar">
                        <h4><?php echo $nombre; ?>
                          <span class="text-votos"> (<?php echo $votos; ?> Votos)</span>
                        </h4>
                      </div>


                      <?php
                    }

                    if ($i == 2) {
                      ?>
                      <!--Tercer lugar-->
                      <div class="cont-Tercerlugar animated swing">
                        <div class="opacidad-ganadores-tercer-lugar opacidad-pantalla">
                          <p class="Lugares">3º</p>
                        </div>
                        <div class="overflow">
                          <div>
                            <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                          </div>
                        </div>
                      </div>
                      <div class="tercer-lugar">
                        <h4><?php echo $nombre; ?>
                          <span class="text-votos"> (<?php echo $votos; ?> Votos)</span>
                        </h4>
                      </div>


                      <?php
                    }
                  }
                }
                ?>


            </div>
            <div class="cont-baile">
                    <div class="titulo-ganadores-pantalla">

                            <svg xmlns="http://www.w3.org/2000/svg" width="94.747" height="101.151" viewBox="0 0 94.747 101.151">
                                <g id="Grupo_20" data-name="Grupo 20" transform="translate(165 110)">
                                  <g id="dance_1_" data-name="dance (1)" transform="translate(-165 -110)">
                                    <path id="Trazado_41" data-name="Trazado 41" d="M10.512,39.149V60.741L4.246,67.032A10.121,10.121,0,0,0,11.411,84.3h.021l7.515-.017V95.246a5.9,5.9,0,0,0,11.808,0V83.7a5.874,5.874,0,0,0,0-10.627V54.718L40.088,49.8a5.061,5.061,0,0,0,1.2-8.071l-9.063-8.978A8.379,8.379,0,0,0,26.291,30.3H17.378A3.358,3.358,0,0,1,15,29.319l-4.484-4.472V23.5a30.783,30.783,0,0,1,.506-7.345A26.2,26.2,0,0,1,13,10.606a14.6,14.6,0,0,1,.761-1.295A8.231,8.231,0,0,0,15.509,4.4a4.892,4.892,0,0,0-4.9-4.4h-.034C8.4.011,6.265,1.492,4.553,4.158a24.669,24.669,0,0,0-2.75,6.6A50.682,50.682,0,0,0,.392,24.823a10.053,10.053,0,0,0,2.959,7.152ZM24.851,97.777a2.53,2.53,0,0,1-2.53-2.53V84.282h5.06V95.246A2.53,2.53,0,0,1,24.851,97.777Zm5.167-17.605a2.5,2.5,0,0,1-1.259.674,2.828,2.828,0,0,1-.534.063H20.633l-9.205.017h-.017A6.747,6.747,0,0,1,6.633,69.414l6.756-6.778a1.693,1.693,0,0,0,.359-.543,1.669,1.669,0,0,0,.118-.585c0-.02.012-.037.012-.057v-.785h13.5V72.474H22.32V66.987A2.53,2.53,0,0,0,18,65.2l-6.329,6.329a2.53,2.53,0,0,0,1.788,4.32H28.224a3.086,3.086,0,0,1,.506.052,2.531,2.531,0,0,1,1.279,4.272Zm-1.306-32,1.736,2.892L28.28,52.209c-.039.02-.095.056-.151.093l-.472.242a1.7,1.7,0,0,1-2.281-.718,1.611,1.611,0,0,1-.188-.774,1.641,1.641,0,0,1,.123-.585,1.541,1.541,0,0,1,.783-.909Zm-9.765,24.3H15.5l3.452-3.452Zm3.768-38.8-2.082,3.47-2.081-3.47Zm-10.1-1.97A6.76,6.76,0,0,0,14.105,32.8c.01.019.01.041.022.061l4.336,7.228a2.531,2.531,0,0,0,4.339,0l3.827-6.378a5,5,0,0,1,3.222,1.434l9.063,8.976a1.687,1.687,0,0,1-.4,2.7l-5.081,2.672L31.7,46.6l1.766-.935a1.687,1.687,0,0,0,.406-2.683l-3.608-3.608a1.688,1.688,0,0,0-2.882,1.191v4.5l-2.844,1.5a5.194,5.194,0,0,0-2.723,4.487,5.005,5.005,0,0,0,.586,2.361,5.081,5.081,0,0,0,4.98,2.666v1.215H13.886V38.451a1.686,1.686,0,0,0-.493-1.191L5.737,29.591a6.7,6.7,0,0,1-1.972-4.768A47.953,47.953,0,0,1,5.049,11.692c.13-.459.272-.934.429-1.418l3.31,1.655a29.375,29.375,0,0,0-1.049,3.458,33.858,33.858,0,0,0-.6,8.129v1.429a3.116,3.116,0,0,0,.921,2.222ZM10.59,3.369h.01a1.5,1.5,0,0,1,1.541,1.31A6.044,6.044,0,0,1,10.9,7.514c-.286.454-.547.889-.773,1.313L6.754,7.14c.2-.391.406-.781.642-1.152,1.041-1.632,2.237-2.609,3.2-2.615Zm0,0" transform="translate(-0.351 0.001)" fill="#ff012c"/>
                                    <path id="Trazado_42" data-name="Trazado 42" d="M60.289,60.18A9.278,9.278,0,1,0,69.567,50.9,9.278,9.278,0,0,0,60.289,60.18Zm9.278-5.9a5.9,5.9,0,1,1-5.9,5.9A5.9,5.9,0,0,1,69.567,54.276Zm0,0" transform="translate(-48.441 -40.84)" fill="#ff012c"/>
                                    <path id="Trazado_43" data-name="Trazado 43" d="M299.965,77.946a8.879,8.879,0,0,0,3.292-.614,9.278,9.278,0,1,0-12.57-8.664,9.107,9.107,0,0,0,.535,3.111A9.285,9.285,0,0,0,299.965,77.946Zm0-15.182a5.9,5.9,0,0,1,2.073,11.422,5.537,5.537,0,0,1-2.073.386,5.9,5.9,0,0,1-5.567-3.932,5.776,5.776,0,0,1-.337-1.972,5.905,5.905,0,0,1,5.9-5.9Zm0,0" transform="translate(-233.295 -47.642)" fill="#ff012c"/>
                                    <path id="Trazado_44" data-name="Trazado 44" d="M211.252,79.4a3.374,3.374,0,0,0,.225,5.179l1.55,1.181a1.768,1.768,0,0,0,.219.168c.337.216.675.412,1.012.611v21.617a5.9,5.9,0,1,0,11.808,0V90.242a36.557,36.557,0,0,0,3.689.2,48.061,48.061,0,0,0,11.42-1.518l11.23,19.474a5.9,5.9,0,0,0,10.814-1.435,5.839,5.839,0,0,0-.59-4.47l-10.1-17.51c.337-.153.675-.307.957-.443a3.374,3.374,0,0,0,1.044-5.3l-7.025-7.8a5,5,0,0,0,3.248-.521,5.086,5.086,0,0,0,2.652-3.879l1.093-9.329a6.747,6.747,0,0,0-3.88-6.916l-11.843-5.464a6.75,6.75,0,0,0-4.706-.353l-5.655,1.643a1.288,1.288,0,0,1-1.059-.154,1.315,1.315,0,0,1-.591-.947L222.253,20.4a5.115,5.115,0,0,0-5.024-4.316c-.192,0-.406.019-.751.054a5.105,5.105,0,0,0-4.234,5.8l4.806,27.81a41.049,41.049,0,0,0,.912,4.048l2.539,9.051a10.838,10.838,0,0,1-3.163,11.008ZM222.7,108.153a2.53,2.53,0,1,1-5.061,0V88.2c.52.211,1.042.4,1.567.577h.01l.054.02h.015c.418.154.844.282,1.264.4q1.055.3,2.15.53Zm37.269-2.049a2.53,2.53,0,0,1-4.634.615L244.534,88q2.439-.745,4.853-1.7l10.329,17.9A2.49,2.49,0,0,1,259.964,106.1ZM215.575,21.409a1.687,1.687,0,0,1,1.36-1.926,1.741,1.741,0,0,1,1.992,1.473l4.51,25.122a4.671,4.671,0,0,0,5.923,3.791l5.654-1.642a3.352,3.352,0,0,1,2.361.169l11.838,5.462a3.374,3.374,0,0,1,1.937,3.456l-1.092,9.325a1.714,1.714,0,0,1-.892,1.307,1.687,1.687,0,0,1-1.611-.012,1.784,1.784,0,0,1-.844-1.817l.272-2.277.53-4.487a3.363,3.363,0,0,0-1.937-3.458l-5.941-2.733a2.488,2.488,0,0,0-2.218.064,8.641,8.641,0,0,0-8.055-.071,11.069,11.069,0,0,0-8.137-.218l-.013-.047a37.358,37.358,0,0,1-.844-3.711Zm26.739,44.264-2.434-8.689,4.275,1.969-.532,4.485-.27,2.277c0,.032.01.063.008.095h-.02a5.634,5.634,0,0,0-.017,1ZM223.759,61.94l-1.6-5.682a7.308,7.308,0,0,1,5.985.037,3.306,3.306,0,0,0,2.761-.188,5.472,5.472,0,0,1,5.306.287l2.96,10.566c0,.015.016.026.02.043a1.723,1.723,0,0,0,.081.169,1.68,1.68,0,0,0,.219.376c.018.022.024.05.042.073L252.026,81.5c-.692.337-1.554.724-2.564,1.149a58.737,58.737,0,0,1-7.892,2.731,37.53,37.53,0,0,1-20.09.6c-.364-.106-.729-.211-1.155-.371a22.914,22.914,0,0,1-5.172-2.465l-1.63-1.242,6.093-5.54a14.187,14.187,0,0,0,4.14-14.429Zm0,0" transform="translate(-168.677 -12.906)" fill="#ff012c"/>
                                  </g>
                                </g>
                              </svg>


                        <h3 class="TituloBaile">Concurso de<br>baile <br> Categoria <?php echo $categoria; ?>s</h3>
                    </div>

                    <?php
                    if (COUNT($topBailes)>0) {
                      for ($i=0; $i < COUNT($topBailes); $i++) {
                        $votos = $topBailes[$i][0];
                        $id = $topBailes[$i][1];
                        $datosDisfraz = Usuarios::UsuariosDatosBaile($id);
                        $nombre = $datosDisfraz['nombre'];
                        $imagen = $datosDisfraz['imagen'];

                        if ($imagen=="") {
                          $imagen = "getimage.jpg";
                        }

                        if ($i == 0) {
                          ?>
                          <!--Primer lugar-->
                          <div class="cont-Primerlugar animated swing">
                            <div class="opacidad-ganadores-primer-lugar opacidad-baile opacidad-pantalla">
                              <p class="Lugares">1º</p>
                            </div>
                            <div class="overflow">
                              <div>
                                <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                              </div>
                            </div>
                          </div>
                          <div class="primer-lugar">
                            <h4><?php echo $nombre; ?>
                              <span class="text-votos"> (calificación <?php echo $votos; ?>)</span>
                            </h4>
                          </div>

                          <?php
                        }

                        if ($i == 1) {
                          ?>
                          <!--Segundo lugar-->
                          <div class="cont-Segundolugar animated swing">
                            <div class="opacidad-ganadores-segundo-lugar opacidad-baile opacidad-pantalla">
                              <p class="Lugares">2º</p>
                            </div>
                            <div class="overflow">
                              <div>
                                <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                              </div>
                            </div>
                          </div>
                          <div class="segundo-lugar">
                            <h4><?php echo $nombre; ?>
                              <span class="text-votos"> (calificación <?php echo $votos; ?>)</span>
                            </h4>
                          </div>

                          <?php
                        }

                        if ($i == 2) {
                          ?>
                          <!--Tercer lugar-->
                          <div class="cont-Tercerlugar animated swing">
                            <div class="opacidad-ganadores-tercer-lugar opacidad-baile opacidad-pantalla">
                              <p class="Lugares">3º</p>
                            </div>
                            <div class="overflow">
                              <div>
                                <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                              </div>
                            </div>
                          </div>
                          <div class="tercer-lugar">
                            <h4><?php echo $nombre; ?>
                              <span class="text-votos"> (calificación <?php echo $votos; ?>)</span>
                            </h4>
                          </div>

                          <?php
                        }

                      }
                    }
                    ?>


            </div>
            <div class="cont-ofrenda">
                    <div class="titulo-ganadores-pantalla">

                            <svg xmlns="http://www.w3.org/2000/svg" width="125.406" height="101.647" viewBox="0 0 125.406 101.647">
                                <g id="catrina_1_" data-name="catrina (1)" transform="translate(0 -48.5)">
                                  <path id="Trazado_67" data-name="Trazado 67" d="M239.931,293.109l-7.715-7.715-7.715,7.715v4.557h15.431Zm-11.118.883,3.4-3.4,3.4,3.4Z" transform="translate(-169.513 -178.871)" fill="#e2b600"/>
                                  <path id="Trazado_68" data-name="Trazado 68" d="M141.562,204.891a5.718,5.718,0,0,0,3.495,2.682,5.782,5.782,0,0,0,1.5.2,5.68,5.68,0,0,0,1.277-.148,5.756,5.756,0,0,0,11,0,5.678,5.678,0,0,0,1.277.148,5.8,5.8,0,0,0,1.5-.2,5.756,5.756,0,0,0,2.726-9.479,5.756,5.756,0,0,0-5.5-9.529,5.756,5.756,0,0,0-11,0,5.756,5.756,0,0,0-5.5,9.529A5.766,5.766,0,0,0,141.562,204.891Zm3.182-1.837a2.085,2.085,0,0,1,.762-2.844l.353-.2a7.715,7.715,0,0,0,2.087,3.6l-.359.207A2.084,2.084,0,0,1,144.744,203.054Zm12.632-4.96a4.041,4.041,0,1,1-4.041-4.041A4.046,4.046,0,0,1,157.376,198.094Zm-4.041,9.92a2.084,2.084,0,0,1-2.082-2.082v-.41a7.675,7.675,0,0,0,4.164,0v.41A2.084,2.084,0,0,1,153.335,208.014Zm8.591-4.96a2.084,2.084,0,0,1-2.844.762l-.359-.207a7.716,7.716,0,0,0,2.087-3.6l.353.2A2.085,2.085,0,0,1,161.925,203.054Zm0-9.92a2.085,2.085,0,0,1-.762,2.844l-.353.2a7.718,7.718,0,0,0-2.087-3.6l.359-.207A2.085,2.085,0,0,1,161.925,193.134Zm-8.591-4.96a2.084,2.084,0,0,1,2.082,2.082v.41a7.675,7.675,0,0,0-4.164,0v-.41A2.084,2.084,0,0,1,153.335,188.174Zm-8.591,4.96a2.084,2.084,0,0,1,2.844-.762l.359.207a7.716,7.716,0,0,0-2.087,3.6l-.353-.2A2.084,2.084,0,0,1,144.744,193.134Z" transform="translate(-106.308 -102.689)" fill="#e2b600"/>
                                  <path id="Trazado_69" data-name="Trazado 69" d="M293.107,191.3a5.765,5.765,0,0,0-6.271-2.732,5.756,5.756,0,0,0-11,0,5.756,5.756,0,0,0-5.5,9.53,5.761,5.761,0,0,0,4.225,9.677,5.68,5.68,0,0,0,1.277-.148,5.756,5.756,0,0,0,11,0,5.679,5.679,0,0,0,1.277.148,5.8,5.8,0,0,0,1.5-.2,5.756,5.756,0,0,0,2.726-9.479,5.766,5.766,0,0,0,.769-6.8Zm-3.182,1.837a2.085,2.085,0,0,1-.762,2.844l-.353.2a7.719,7.719,0,0,0-2.087-3.6l.359-.207A2.085,2.085,0,0,1,289.925,193.134Zm-12.632,4.96a4.041,4.041,0,1,1,4.041,4.041A4.046,4.046,0,0,1,277.293,198.094Zm4.041-9.92a2.084,2.084,0,0,1,2.082,2.082v.41a7.675,7.675,0,0,0-4.164,0v-.41A2.084,2.084,0,0,1,281.335,188.174Zm-8.591,4.96a2.085,2.085,0,0,1,2.844-.762l.359.207a7.717,7.717,0,0,0-2.087,3.6l-.353-.2A2.084,2.084,0,0,1,272.744,193.134Zm0,9.92a2.085,2.085,0,0,1,.762-2.844l.353-.2a7.716,7.716,0,0,0,2.087,3.6l-.359.207A2.084,2.084,0,0,1,272.744,203.054Zm8.591,4.96a2.084,2.084,0,0,1-2.082-2.082v-.41a7.675,7.675,0,0,0,4.164,0v.41A2.084,2.084,0,0,1,281.335,208.014Zm8.591-4.96a2.084,2.084,0,0,1-2.844.762l-.359-.207a7.715,7.715,0,0,0,2.087-3.6l.353.2A2.085,2.085,0,0,1,289.925,203.054Z" transform="translate(-202.956 -102.689)" fill="#e2b600"/>
                                  <path id="Trazado_70" data-name="Trazado 70" d="M178.715,109.121a13.491,13.491,0,0,0-3.1-8.644,36.766,36.766,0,0,0,3.1-14.87,37.194,37.194,0,0,0-8.247-23.326l-2.856,2.311a33.508,33.508,0,0,1,7.429,21.015,33.124,33.124,0,0,1-3.258,14.413l-.561,1.172.918.919a9.92,9.92,0,0,1-7.019,16.93h-1.837V130.8H159.12v-2.082a5.752,5.752,0,0,0-9.675-4.21,5.741,5.741,0,0,0-7.838,0,5.741,5.741,0,0,0-7.838,0,5.752,5.752,0,0,0-9.675,4.21V130.8H119.93V119.041h-1.837a9.92,9.92,0,0,1-7.019-16.93l.918-.919-.561-1.172A33.527,33.527,0,0,1,141.61,52.174h.287a33.394,33.394,0,0,1,22,8.511l2.45-2.738A37.063,37.063,0,0,0,141.929,48.5h-.32A37.124,37.124,0,0,0,107.6,100.477a13.6,13.6,0,0,0,8.656,22.114v17.881a9.686,9.686,0,0,0,9.675,9.675h31.351a9.686,9.686,0,0,0,9.675-9.675V122.591A13.614,13.614,0,0,0,178.715,109.121Zm-50.946,25.351h4.164v2.082a2.082,2.082,0,0,1-4.164,0Zm7.838,0h4.164v2.082a2.082,2.082,0,1,1-4.164,0Zm7.838,0h4.164v2.082a2.082,2.082,0,1,1-4.164,0Zm7.838,0h4.164v2.082a2.082,2.082,0,1,1-4.164,0Zm2.082-7.838a2.084,2.084,0,0,1,2.082,2.082V130.8h-4.164v-2.082A2.084,2.084,0,0,1,153.364,126.634Zm-7.838,0a2.084,2.084,0,0,1,2.082,2.082V130.8h-4.164v-2.082A2.084,2.084,0,0,1,145.526,126.634Zm-7.838,0a2.084,2.084,0,0,1,2.082,2.082V130.8h-4.164v-2.082A2.084,2.084,0,0,1,137.688,126.634Zm-9.92,2.082a2.082,2.082,0,0,1,4.164,0V130.8h-4.164Zm29.514,17.758H125.932a6.008,6.008,0,0,1-6-6v-6h4.164v2.082a5.752,5.752,0,0,0,9.675,4.21,5.741,5.741,0,0,0,7.838,0,5.741,5.741,0,0,0,7.838,0,5.752,5.752,0,0,0,9.675-4.21v-2.082h4.164v6A6.008,6.008,0,0,1,157.283,146.473Z" transform="translate(-78.905 0)" fill="#e2b600"/>
                                  <path id="Trazado_71" data-name="Trazado 71" d="M409.351,309.568V282.135h-7.838v-2.507a5.765,5.765,0,0,0,3.919-5.454c0-4.465-3.713-8.849-3.871-9.033l-.55-.642h-2.669l-.55.642c-.158.184-3.871,4.568-3.871,9.033a5.765,5.765,0,0,0,3.919,5.454v2.507H390v13.594h3.674v-9.92h12v23.758h-12v-9.92H390v9.92h-6v3.674h31.351v-3.674Zm-9.675-40.817a10.967,10.967,0,0,1,2.082,5.424,2.082,2.082,0,0,1-4.164,0A10.969,10.969,0,0,1,399.676,268.751Z" transform="translate(-289.946 -163.095)" fill="#e2b600"/>
                                  <path id="Trazado_72" data-name="Trazado 72" d="M9.675,285.809h12v19.717h3.674V282.135H17.513v-2.507a5.765,5.765,0,0,0,3.919-5.454c0-4.465-3.713-8.849-3.871-9.033l-.55-.642h-2.67l-.55.642c-.158.184-3.871,4.568-3.871,9.033a5.765,5.765,0,0,0,3.919,5.454v2.507H6v27.432H0v3.674H31.351v-3.674H9.675Zm6-17.058a10.967,10.967,0,0,1,2.082,5.424,2.082,2.082,0,1,1-4.164,0A10.969,10.969,0,0,1,15.676,268.751Z" transform="translate(0 -163.095)" fill="#e2b600"/>
                                  <path id="Trazado_73" data-name="Trazado 73" d="M229.425,75.676l-1.21-.238a9.65,9.65,0,0,0-5.9.7,10.392,10.392,0,0,0-1.727-2.48,13.98,13.98,0,0,0-2.288-2l-1.024-.686-1.024.686a13.977,13.977,0,0,0-2.288,2,10.391,10.391,0,0,0-1.727,2.48,9.65,9.65,0,0,0-5.9-.7l-1.211.238-.238,1.21c-.092.47-.833,4.664,1.59,7.087a7.135,7.135,0,0,0,5.083,1.768c.327,0,.629-.014.895-.035a5.756,5.756,0,1,0,9.627,0c.266.021.568.035.895.035a7.134,7.134,0,0,0,5.083-1.768h0c2.423-2.423,1.683-6.617,1.59-7.087Zm-12.139-.138c.95.879,2.077,2.226,2.077,3.522s-1.132,2.638-2.087,3.522c-.95-.879-2.077-2.226-2.077-3.522S216.331,76.423,217.286,75.539Zm-8.2,5.837a3.688,3.688,0,0,1-.689-2.439,3.7,3.7,0,0,1,2.438.69h0a3.684,3.684,0,0,1,.689,2.438A3.686,3.686,0,0,1,209.088,81.376Zm8.194,9.564a2.082,2.082,0,1,1,2.082-2.082A2.084,2.084,0,0,1,217.281,90.94Zm8.194-9.564a3.688,3.688,0,0,1-2.439.689,2.6,2.6,0,0,1,3.127-3.127A3.687,3.687,0,0,1,225.475,81.376Z" transform="translate(-154.579 -16.967)" fill="#e2b600"/>
                                  <path id="Trazado_74" data-name="Trazado 74" d="M168,152.5h3.919v3.674H168Z" transform="translate(-126.851 -78.527)" fill="#e2b600"/>
                                  <path id="Trazado_75" data-name="Trazado 75" d="M200,152.5h3.919v3.674H200Z" transform="translate(-151.013 -78.527)" fill="#e2b600"/>
                                  <path id="Trazado_76" data-name="Trazado 76" d="M296,152.5h3.919v3.674H296Z" transform="translate(-223.5 -78.527)" fill="#e2b600"/>
                                  <path id="Trazado_77" data-name="Trazado 77" d="M328,152.5h3.919v3.674H328Z" transform="translate(-247.662 -78.527)" fill="#e2b600"/>
                                </g>
                              </svg>



                        <h3 class="TituloOfrenda">Concurso de<br>la ofrenda</h3>
                    </div>

                    <?php
                    if (COUNT($topOfrenda)>0) {
                      for ($i=0; $i < COUNT($topOfrenda); $i++) {
                        $votos = $topOfrenda[$i][0];
                        $id = $topOfrenda[$i][1];
                        $nombre = "";
                        $imagen = "";
                        if ($id == 1) {
                          $nombre = "Niebla";
                          $imagen = "niebla.jpg";
                        }else{
                          $nombre = "San Jerónimo";
                          $imagen = "sanjeronimo.jpg";
                        }

                        if ($i == 0) {
                          ?>
                          <!--Primer lugar-->
                      <div class="cont-Primerlugar animated swing">
                              <div class="opacidad-ganadores-primer-lugar opacidad-ofrenda opacidad-pantalla">
                                  <p class="Lugares">1º</p>
                              </div>
                              <div class="overflow">
                                  <div>
                                      <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                                  </div>
                              </div>
                          </div>
                          <div class="primer-lugar">
                              <h4><?php echo $nombre; ?>
                                  <span class="text-votos"> (<?php echo $votos; ?> Votos)</span>
                              </h4>
                          </div>

                          <?php
                        }

                        if ($i == 1) {
                          ?>
                          <!--Segundo lugar-->
                          <div class="cont-Segundolugar animated swing">
                            <div class="opacidad-ganadores-segundo-lugar opacidad-ofrenda opacidad-pantalla">
                              <p class="Lugares">2º</p>
                            </div>
                            <div class="overflow">
                              <div>
                                <img src="imagesFTP/<?php echo $imagen; ?>" alt="...">
                              </div>
                            </div>
                          </div>
                          <div class="segundo-lugar">
                            <h4><?php echo $nombre; ?>
                              <span class="text-votos"> (<?php echo $votos; ?> Votos)</span>
                            </h4>
                          </div>
                          <?php
                        }
                      }
                    }
                    ?>



            </div>
        </div>
    </div>

     <!-- Vista de Desktop | Tablet | Mobile-->
     <div class="Responsive-2">
            <div class="fondoDesktop">
                <div class="FloatBox">
                    <div class="BoxContainer-Responsive">
                        <h3>Tu pantalla es muy pequeña</h3>
                        <p class="textResponsive">Sólo se puede vizualizar en pantallas mayores de 1000px</p>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
        window.location='EstatusGanadores.php?categoria=<?php echo $siguiente; ?>';
      }, 6000);
    });

    </script>


  </body>
</html>
