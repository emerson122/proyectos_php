window.onload = inicilizar;
var fichero;
var storageRef;

function inicializar() {
   fichero = document.getElementById("fichero");
   fichero.addEventListener("change", subirImagenAFirebase,false);

}

function subirImagenAFirebase() {
    //fichero es la variable que se declaro anteriormente
    var imagenAsubir = fichero.files[0];

    var mountainsRef = storageRef.child('mountains.jpg');

    storageRef = app.storage().ref().child("comprobantes");

}