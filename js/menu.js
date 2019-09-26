var theToggle = document.getElementById('toggle');

// based on Todd Motto functions
// https://toddmotto.com/labs/reusable-js/

// hasClass
function hasClass(elem, className) {
	return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}
// addClass
function addClass(elem, className) {
    if (!hasClass(elem, className)) {
    	elem.className += ' ' + className;
    }
}
// removeClass
function removeClass(elem, className) {
	var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
	if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}
// toggleClass
function toggleClass(elem, className) {
	var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0 ) {
            newClass = newClass.replace( " " + className + " " , " " );
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    } else {
        elem.className += ' ' + className;
    }
}

theToggle.onclick = function() {
   toggleClass(this, 'on');
   var y = menu();
   return false;
}

function menu(){
    var x = document.getElementById('menu');
    var y = document.getElementById('aparicion');

    if (x.style.display === 'block') {
        document.getElementById("aparicion").style.animation = "slideInLeft 1s 1";
        document.getElementById("menu").style.animation = "Up 1s 1";
        y.style.display = 'none';
        var z = setTimeout(close,1000);
      } else {
        x.style.display = 'block';
        y.style.display = 'block';
        document.getElementById("menu").style.animation = "Down 1s 1";
        document.getElementById("aparicion").style.animation = "slideInLeft 1s 1";
    }
    return false;
}
function close(){
  document.getElementById('menu').style.display = "none";
}