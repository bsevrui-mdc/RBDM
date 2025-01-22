const PATTERN1 = /^[A-Za-z\s]*$/; // Nombre, Apellidos, País
const PATTERN2 = /^[a-zA-Z0-9]+$/ // CP
var inputNombre = document.getElementById("nombre");
var errorNombre = document.getElementById("errorNombre");
var inputApellidos = document.getElementById("apellidos");
var errorApellidos = document.getElementById("errorApellidos");
var inputPais = document.getElementById("pais");
var errorPais = document.getElementById("errorPais");
var inputCP = document.getElementById("cp");
var errorCP = document.getElementById("errorCP");

inputNombre.addEventListener("input", function(e){
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
        e.target.value = valor.slice(0, -1);
        errorNombre.classList.remove("noError");
        errorNombre.classList.add('error');
    } else {
        errorNombre.classList.remove("error");
        errorNombre.classList.add("noError");
    }
});

inputApellidos.addEventListener("input", function(e){
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
        e.target.value = valor.slice(0, -1);
        errorApellidos.classList.remove("noError");
        errorApellidos.classList.add("error");
    } else {
        errorApellidos.classList.remove("error");
        errorApellidos.classList.add("noError");
    }
});

inputPais.addEventListener("input", function(e){
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
        e.target.value = valor.slice(0, -1);
        errorPais.classList.remove("noError");
        errorPais.classList.add("error");
    } else {
        errorPais.classList.remove("error");
        errorPais.classList.add("noError");
    }
});

inputCP.addEventListener("input", function(e){
    let valor = e.target.value;
    if (!PATTERN2.test(valor)) {
        e.target.value = valor.slice(0, -1);
        errorCP.classList.remove("noError");
        errorCP.classList.add("error");
    } else {
        errorCP.classList.remove("error");
        errorCP.classList.add("noError");
    }
});