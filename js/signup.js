const PATTERN1 = /^[A-Za-z\s]*$/; // Nombre, Apellidos, País
const PATTERN2 = /^[a-zA-Z0-9]+$/; // CP
const PATTERN3 = /^[6-9]\d{0,8}$/; // Telefono
const PATTERN4 = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Email
var inputEmail = document.getElementById("email");
var errorEmail = document.getElementById("errorEmail");
var inputNombre = document.getElementById("nombre");
var errorNombre = document.getElementById("errorNombre");
var inputApellidos = document.getElementById("apellidos");
var errorApellidos = document.getElementById("errorApellidos");
var inputPais = document.getElementById("pais");
var errorPais = document.getElementById("errorPais");
var inputCP = document.getElementById("cp");
var errorCP = document.getElementById("errorCP");
var inputTelf = document.getElementById("telf");
var errorTelf = document.getElementById("errorTelf");

if (inputEmail != null) {
  inputEmail.addEventListener("change", function (e) {
    let valor = e.target.value;
    if (!PATTERN4.test(valor)) {
      e.target.value = null;
      errorEmail.classList.remove("noError");
      errorEmail.classList.add("error");
    } else {
      errorEmail.classList.remove("error");
      errorEmail.classList.add("noError");
    }
  });
}

if (inputNombre != null) {
  inputNombre.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
      e.target.value = valor.slice(0, -1);
      errorNombre.classList.remove("noError");
      errorNombre.classList.add("error");
    } else {
      errorNombre.classList.remove("error");
      errorNombre.classList.add("noError");
    }
  });
}
if (inputApellidos != null) {
  inputApellidos.addEventListener("input", function (e) {
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
}

inputPais.addEventListener("input", function (e) {
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

inputCP.addEventListener("input", function (e) {
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

inputTelf.addEventListener("input", function (e) {
  let valor = e.target.value;
  if (!PATTERN3.test(valor)) {
    e.target.value = valor.slice(0, -1);
    errorTelf.classList.remove("noError");
    errorTelf.classList.add("error");
  } else {
    errorTelf.classList.remove("error");
    errorTelf.classList.add("noError");
  }
});
