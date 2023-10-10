<?php
declare(strict_types=1);

function obtenerPdoConexionBD(): PDO
{
    // Lee el contenido del archivo JSON
    $configData = file_get_contents('config.json');

    // Decodifica el contenido JSON en un objeto PHP
    $config = json_decode($configData);

    $servername = $config->bbddConf->servername;
    $username = $config->bbddConf->username;
    $password = $config->bbddConf->password;
    $dbname = $config->bbddConf->dbname;

    try {
        // Crear una conexión
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    } catch (Exception $e) {
        // La conexión da error
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $conn;


}

// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
function redireccionar(string $url)
{
    echo "<script>window.location= '$url'</script>";
    exit;
}

function comprobarFechas($fecha, $turno, $horaEntrada, $horaSalida)
{
    $conn = obtenerPdoConexionBD();

    // Control de fechas y turno
    $sql = "SELECT * FROM reservas WHERE Fecha=? AND Turno=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$fecha,$turno]);

    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Control de horas
    $tiempoEntrada = strtotime($horaEntrada);
    $tiempoSalida = strtotime($horaSalida);

    if (!empty($resultados)) {

        return 1;

    }else if($tiempoEntrada>$tiempoSalida){
        return 2;
    } 
    else {
        return 3;
    }
}

?>