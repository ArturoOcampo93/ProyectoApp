
function buscar() {
    var x = document.getElementById('buscador');
    if (x.style.display === 'flex') {
      document.getElementById("buscador").style.animation = "UpFooter 1s 1";
      var z = setTimeout(closeFooter,1000);
    } else {
      document.getElementById("buscador").style.animation = "DownFooter 1s 1";
      x.style.display = 'flex';
    }
  }
  function closeFooter(){
    document.getElementById('buscador').style.display = "none";
  }
