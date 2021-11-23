// Aleta de como jugar
function info(){
  swal.fire(
  '¿Como jugar?',
  'Uno de los jugadores coloca cuatro o más fichas en una línea contínua vertical, horizontal o diagonalmente. Este jugador gana la partida. Todas las casillas del tablero están ocupadas y ningún jugador cumple la condición anterior para ganar. En este caso la partida finaliza en empate.',
  'info'
  );
}

// Alerta jugador ganador
function ganador1(){
  let timerInterval
  Swal.fire({
    title: 'Ha ganado el jugador 1',
    timer: 3500,
    timerProgressBar: true,
    showConfirmButton: false
  
  })
}

function ganador2(){
  let timerInterval
  Swal.fire({
    title: 'Ha ganado el jugador 2',
    timer: 3500,
    timerProgressBar: true,
    showConfirmButton: false
  
  })
}

// Columna erronea
function columna_erronea(){
let timerInterval
Swal.fire({
  title: 'Error',
  text: 'Introduce una columna que no esté completa y asegurate de que introdcues solamente numeros del 1 al 7.',
  timer: 2500,
  timerProgressBar: true,
  showConfirmButton: false

})
}