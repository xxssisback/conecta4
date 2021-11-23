// Aleta de como jugar
function info(){
  swal.fire(
  '¿Como jugar?',
  'Introduce del 1-7...',
  'info'
  );
}

// Alerta jugador ganador
function ganador(){
  let timerInterval
  Swal.fire({
    title: 'Ha ganado el jugador <?php $_SESSION["jugador"]; ?>',
    timer: 3500,
    timerProgressBar: true,
    showConfirmButton: false
  
  })
}

// Columna erronea
function columna_erronea(){
let timerInterval
Swal.fire({
  title: 'Columna erronea',
  timer: 3500,
  timerProgressBar: true,
  showConfirmButton: false

})
}

// Columna plena
function columna_plena(){
let timerInterval
Swal.fire({
  title: 'Columna erronea',
  timer: 3500,
  timerProgressBar: true,
  showConfirmButton: false

})
}
