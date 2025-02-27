const PATTERN1 = /^[A-Za-záéíóúÁÉÍÓÚñÑçÇüÜ\s]*$/; // Nombre y Apellidos
const PATTERN2 = /^[0-9]{5}$/; // CP
const PATTERN3 = /^[6-9]\d{0,8}$/; // Telefono
const PATTERN4 = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Email
const PATTERN5 = /^(?=.*[a-záéíóúñçü])(?=.*[A-ZÁÉÍÓÚÑÇÜ])(?=.*\d)(?=.*[^\w\s]).{8,}$/; // Contraseña

// Obtener elementos del DOM
var inputEmail = document.getElementById("email");
var errorEmail = document.getElementById("errorEmail");
var inputPass = document.getElementById("pass");
var errorPass = document.getElementById("errorPass");
var inputPass2 = document.getElementById("password2");
var errorPass2 = document.getElementById("errorPass2");
var inputNombre = document.getElementById("nombre");
var errorNombre = document.getElementById("errorNombre");
var inputApellidos = document.getElementById("apellidos");
var errorApellidos = document.getElementById("errorApellidos");
var inputPais = document.getElementById("pais");
var errorPais = document.getElementById("errorPais");
var inputCP = document.getElementById("codigo_postal");
var errorCP = document.getElementById("errorCP");
var inputTelf = document.getElementById("telefono");
var errorTelf = document.getElementById("errorTelf");

// Validación de Email
if (inputEmail && errorEmail) {
  inputEmail.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN4.test(valor)) {
      errorEmail.textContent = "El correo debe de seguir el siguiente formato ejemplo@ejemplo.com, además no se admiten acentos ni carácteres especiales (esto debido a sucarácter internacional)";
      errorEmail.classList.remove("noError");
      errorEmail.classList.add("error");
    } else {
      errorEmail.textContent = "";
      errorEmail.classList.remove("error");
      errorEmail.classList.add("noError");
    }
  });
}

// Validación de Contraseña
if (inputPass && errorPass) {
  inputPass.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN5.test(valor)) {
      errorPass.textContent = "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
      errorPass.classList.remove("noError");
      errorPass.classList.add("error");
    } else {
      errorPass.textContent = "";
      errorPass.classList.remove("error");
      errorPass.classList.add("noError");
    }
  });
}

// Validación de Confirmación de Contraseña
if (inputPass2 && errorPass2) {
  inputPass2.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (valor !== inputPass.value) {
      errorPass2.textContent = "Las contraseñas no coinciden.";
      errorPass2.classList.remove("noError");
      errorPass2.classList.add("error");
    } else {
      errorPass2.textContent = "";
      errorPass2.classList.remove("error");
      errorPass2.classList.add("noError");
    }
  });
}

// Validación de Nombre
if (inputNombre && errorNombre) {
  inputNombre.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
      errorNombre.textContent = "El nombre solo puede contener letras y espacios.";
      errorNombre.classList.remove("noError");
      errorNombre.classList.add("error");
    } else {
      errorNombre.textContent = "";
      errorNombre.classList.remove("error");
      errorNombre.classList.add("noError");
    }
  });
}

// Validación de Apellidos
if (inputApellidos && errorApellidos) {
  inputApellidos.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN1.test(valor)) {
      errorApellidos.textContent = "Los apellidos solo pueden contener letras y espacios.";
      errorApellidos.classList.remove("noError");
      errorApellidos.classList.add("error");
    } else {
      errorApellidos.textContent = "";
      errorApellidos.classList.remove("error");
      errorApellidos.classList.add("noError");
    }
  });
}

// Validación de Código Postal
if (inputCP && errorCP) {
  inputCP.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN2.test(valor)) {
      errorCP.textContent = "El código postal solo puede contener 5 numeros.";
      errorCP.classList.remove("noError");
      errorCP.classList.add("error");
    } else {
      errorCP.textContent = "";
      errorCP.classList.remove("error");
      errorCP.classList.add("noError");
    }
  });
}

// Validación de Teléfono
if (inputTelf && errorTelf) {
  inputTelf.addEventListener("input", function (e) {
    let valor = e.target.value;
    if (!PATTERN3.test(valor)) {
      errorTelf.textContent = "El teléfono debe comenzar con un número entre 6 y 9 y tener hasta 9 dígitos.";
      errorTelf.classList.remove("noError");
      errorTelf.classList.add("error");
    } else {
      errorTelf.textContent = "";
      errorTelf.classList.remove("error");
      errorTelf.classList.add("noError");
    }
  });
}
