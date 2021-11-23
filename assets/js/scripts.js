// Aleta de como jugar
function info(){
  swal.fire(
  '¿Como jugar?',
  'Introduce del 1-7...',
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
  timer: 4000,
  timerProgressBar: true,
  showConfirmButton: false

})
}

// Columna plena
function columna_plena(){
let timerInterval
Swal.fire({
  title: 'Columna plena',
  timer: 2000,
  timerProgressBar: true,
  showConfirmButton: false

})
}

// Only Numbers
function only_numbers(){
  let timerInterval
  Swal.fie({
    title: 'Introduce solamente numeros',
    timer: 2000,
    timerProgressBar: true,
    showConfirmButton: false
  })
}