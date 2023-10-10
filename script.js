
function horarios(){
    var turnoSelect = document.getElementById("turno");
    var horaEntrada = document.getElementById("horaEntrada");
    var horaSalida = document.getElementById("horaSalida");



  if (turnoSelect.value === "Mañana") {
    // Establecer el rango de horas para el turno de mañana
    horaEntrada.min = "12:00";
    horaSalida.min = "13:00"
    horaEntrada.max = "16:00";
    horaSalida.max = "17:00"
  } else {
    // Establecer el rango de horas para el turno de tarde
    horaEntrada.min = "20:00";
    horaSalida.min = "21:00";
    horaEntrada.max = "23:00";
    horaSalida.max = "23:59";
}


}

