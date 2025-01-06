var base_preguntas = readText("../assets/json/juegoPreguntas.json");
var interprete_bp = JSON.parse(base_preguntas);
var botones = [
  select_id("btn1"),
  select_id("btn2"),
  select_id("btn3"),
  select_id("btn4"),
];

var respondida = false;

var preguntasTodas;
var indicePregunta = 0;
var respuestasCorrectas = 0;

function cargarPreguntas() {
  preguntasTodas = [];
  for (let i = 0; i < 10; i++) {
    do {
      numero = Math.floor(Math.random() * interprete_bp.length);
    } while (preguntasTodas.includes(numero));
    preguntasTodas.push(numero);
  }
}
cargarPreguntas();
escogerPreguntaAleatoria();

function escogerPreguntaAleatoria() {
  if (indicePregunta > preguntasTodas.length - 1) {
    let jugar = confirm(
      "¿Quieres volver ha jugar?. Has acertado " +
        respuestasCorrectas +
        " de " +
        preguntasTodas.length
    );
    if (jugar) {
      reiniciarJuego();
    } else {
      select_id("juego").innerHTML =
        "<div class='btn' id='reiniciar' onclick='recargarJuego()'>Reiniciar juego</div>";
    }

    return;
  } else {
    escogerPregunta(preguntasTodas[indicePregunta]);
  }
}
function cargarBotones() {
  botones = [
    select_id("btn1"),
    select_id("btn2"),
    select_id("btn3"),
    select_id("btn4"),
  ];
}

function recargarJuego() {
  select_id("juego").innerHTML =
    "<div class='contadorPreguntas' id='contadorPreguntas'>Pregunta: 1/10</div><div class='encabezado bg-info'><img src='' class='imagen' id='imagen'><div class='pregunta' id='pregunta'>¿Que pelicula es?</div></div><div class='btn' id='btn1' onclick='boton(0)'>Opcion 1</div><div class='btn' id='btn2' onclick='boton(1)'>Opcion 2</div><div class='btn' id='btn3' onclick='boton(2)'>Opcion 3</div><div class='btn' id='btn4' onclick='boton(3)'>Opcion 4</div>";
  cargarBotones();
  reiniciarJuego();
}

function reiniciarJuego() {
  cargarPreguntas();
  indicePregunta = 0;
  select_id("contadorPreguntas").innerHTML = "Pregunta: " + 1 + "/10";

  respuestasCorrectas = 0;
  reiniciar();
}

function escogerPregunta(n) {
  pregunta = interprete_bp[n];
  select_id("pregunta").innerHTML = pregunta.pregunta;
  select_id("imagen").src = pregunta.imagen;
  desordenarRespuestas();
}

function desordenarRespuestas() {
  posibles_respuestas = [
    pregunta.respuesta,
    pregunta.incorrecta1,
    pregunta.incorrecta2,
    pregunta.incorrecta3,
  ];

  posibles_respuestas.sort(() => Math.random() - 0.5);

  select_id("btn1").innerHTML = posibles_respuestas[0];
  select_id("btn2").innerHTML = posibles_respuestas[1];
  select_id("btn3").innerHTML = posibles_respuestas[2];
  select_id("btn4").innerHTML = posibles_respuestas[3];
}

function boton(i) {
  if (respondida == true) {
    return;
  }

  if (posibles_respuestas[i] == pregunta.respuesta) {
    botones[i].style.background = "green";
    respuestasCorrectas++;
  } else {
    botones[i].style.background = "red";
    botones.forEach((btn) => {
      if (btn.innerText == pregunta.respuesta) {
        setTimeout(() => {
          btn.style.background = "green";
        }, 500);
      }
    });
  }
  respondida = true;
  indicePregunta++;

  setTimeout(() => {
    select_id("contadorPreguntas").innerHTML =
      "Pregunta: " + (indicePregunta + 1) + "/10";
    reiniciar();
  }, 3000);
}

function reiniciar() {
  botones.forEach((btn) => {
    btn.style.background = " #BBDEFB";
  });

  respondida = false;

  escogerPreguntaAleatoria();
}

function select_id(id) {
  return document.getElementById(id);
}

function style(id) {
  return select_id(id).style;
}

function readText(ruta_local) {
  var texto = null;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", ruta_local, false);
  xmlhttp.send();
  if (xmlhttp.status == 200) {
    texto = xmlhttp.responseText;
  }

  return texto;
}
