<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyect_anti_antidesercion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$query = "SELECT * FROM d_personales";
$result = $conn->query($query);

$personales = array();
while ($row = $result->fetch_assoc()) {
    $personales[] = $row;
}

$query = "SELECT * FROM d_emocional";
$result = $conn->query($query);

$emocionales = array();
while ($row = $result->fetch_assoc()) {
    $emocionales[] = $row;
}

$query = "SELECT * FROM d_economico";
$result = $conn->query($query);

$economicos = array();
while ($row = $result->fetch_assoc()) {
    $economicos[] = $row;
}

$query = "SELECT * FROM d_social";
$result = $conn->query($query);

$social = array();
while ($row = $result->fetch_assoc()) {
    $social[] = $row;
}

$query = "SELECT * FROM d_institucional";
$result = $conn->query($query);

$intitucionales = array();
while ($row = $result->fetch_assoc()) {
    $intitucionales[] = $row;
}

$response = array(
    'personales' => $personales,
    'emocional'=>$emocionales,
    'economico'=>$economicos,
    'social' => $social,
    'institucional' => $intitucionales,
);

echo json_encode($response);

$conn->close();
?>