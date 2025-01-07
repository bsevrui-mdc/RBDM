// Creamos el escenario
var stage = new Konva.Stage({
    container: 'container', // id del contenedor <div>
    width: 850,
    height: 850,
});

// Creamos la capa
var layer = new Konva.Layer();

// Definir la matriz del laberinto
const maze = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 1, 0, 0, 0, 1, 1, 1],
    [1, 0, 1, 0, 1, 0, 0, 1, 1],
    [1, 0, 1, 0, 1, 1, 0, 0, 1],
    [1, 0, 1, 0, 1, 1, 1, 0, 1],
    [1, 0, 0, 0, 1, 1, 1, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 1 ,1],
];

// Generar los muros dinámicamente
let walls = [];
const cellSize = 100; // Tamaño de cada celda del laberinto

function drawMaze(maze, layer, cellSize) {
    for (let i = 0; i < maze.length; i++) {
        for (let j = 0; j < maze[i].length; j++) {
            if (maze[i][j] === 1) {
                const wall = new Konva.Rect({
                    x: j * cellSize,
                    y: i * cellSize,
                    width: cellSize,
                    height: cellSize,
                    fill: 'black',
                });
                walls.push(wall); // Guardar muro para detección de colisiones
                layer.add(wall);
            }
        }
    }
    layer.draw();
}

// Dibujar el laberinto generado
drawMaze(maze, layer, cellSize);

// Crear el círculo
const initialX = cellSize + cellSize / 2; // Posición inicial en una celda libre
const initialY = cellSize + cellSize / 2;

var circulo = new Konva.Circle({
    x: initialX, // Posición inicial
    y: initialY,
    radius: cellSize / 2.5, // Tamaño del círculo
    fill: 'red',
    stroke: 'black',
    strokeWidth: 2.5,
});

// Añadimos el círculo a la capa
layer.add(circulo);

// Definir la celda objetivo (meta)
const goalCell = { x: 7, y: 5 }; // Coordenadas de la meta (columna 5, fila 3)
const goalX = goalCell.x * cellSize + cellSize / 2; // Posición x de la meta
const goalY = goalCell.y * cellSize + cellSize / 2; // Posición y de la meta

// Dibujar la meta en el laberinto
const goal = new Konva.Rect({
    x: goalCell.x * cellSize,
    y: goalCell.y * cellSize,
    width: cellSize,
    height: cellSize,
    fill: 'green', // Color de la meta
});
layer.add(goal);
layer.draw();

// Añadimos la capa al escenario
stage.add(layer);

// Detección de colisiones
function isColliding(circle, walls) {
    return walls.some((wall) => {
        const circleX = circle.x();
        const circleY = circle.y();
        const radius = circle.radius();

        const rectX = wall.x();
        const rectY = wall.y();
        const rectWidth = wall.width();
        const rectHeight = wall.height();

        return (
            circleX + radius > rectX &&
            circleX - radius < rectX + rectWidth &&
            circleY + radius > rectY &&
            circleY - radius < rectY + rectHeight
        );
        
    });
}

// Verificar si el círculo está en la meta
function isAtGoal(circle, goalX, goalY) {
    const dx = circle.x() - goalX;
    const dy = circle.y() - goalY;
    const distance = Math.sqrt(dx * dx + dy * dy);
    return distance < circle.radius(); // Considera alcanzado si está dentro del radio
}

// Reiniciar el juego
function restartGame() {
    circulo.x(initialX);
    circulo.y(initialY);
    velocity = { x: 0, y: 0 };
    anima.start();
}

// Cargar sonido
const successSound = new Audio('assets/music/end.mp3');
const fail = new Audio('assets/music/chill-guy.mp3');
// Control de movimiento
let velocity = { x: 0, y: 0 };

// Eventos de teclado
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowUp') velocity.y = -8;
    if (e.key === 'ArrowDown') velocity.y = 8;
    if (e.key === 'ArrowLeft') velocity.x = -8;
    if (e.key === 'ArrowRight') velocity.x = 8;
});

document.addEventListener('keyup', (e) => {
    if (['ArrowUp', 'ArrowDown'].includes(e.key)) velocity.y = 0;
    if (['ArrowLeft', 'ArrowRight'].includes(e.key)) velocity.x = 0;
});

// Animación
var anima = new Konva.Animation(() => {
    let newX = circulo.x() + velocity.x;
    let newY = circulo.y() + velocity.y;

    const prevX = circulo.x();
    const prevY = circulo.y();

    circulo.x(newX);
    circulo.y(newY);

    if (isColliding(circulo, walls)) {
        circulo.x(prevX);
        circulo.y(prevY);
        restartGame();
        fail.play();
    }

    // Verificar si llega a la meta
    if (isAtGoal(circulo, goalX, goalY)) {
        anima.stop(); // Detener la animación
        successSound.play();
        if (confirm('¡Has llegado al final del laberinto! ¿Quieres jugar de nuevo?')) {
            restartGame();
        }
    }

    // Limitar el movimiento dentro del escenario
    circulo.x(Math.max(circulo.radius(), Math.min(stage.width() - circulo.radius(), circulo.x())));
    circulo.y(Math.max(circulo.radius(), Math.min(stage.height() - circulo.radius(), circulo.y())));
}, layer);

anima.start();
