//Aparece y desaparece el Menu con animación
function GuiaFoto(){
    var x = document.getElementById('Guia');
    var y = document.getElementById('preview');

    if (x.style.display === 'block') {
        document.getElementById("preview").style.animation = "zoomOut 1s 1";
        document.getElementById("Guia").style.animation = "UpGuia 1s 1";
        var z = setTimeout(closeGuia,1000);
        y.style.display = 'none';
      } else {
        x.style.display = 'block';
        document.getElementById("Guia").style.animation = "DownGuia 1s 1";
        var p = setTimeout(openGuia,200);
        document.getElementById("preview").style.animation = "zoomIn 1s 1";
    }
    return false;
}
function closeGuia(){
  document.getElementById('Guia').style.display = "none";
}
function openGuia(){
    document.getElementById('preview').style.display = "block";
  }