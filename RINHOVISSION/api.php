<?php
header('Content-Type: application/json');

// Connect to the 'dashboard_estudiantil' database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard_estudiantil";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student identifier from the request
$num_control = $_GET['num_control'];

// Fetch data from `usuarios` for a specific student
$query = "SELECT * FROM usuarios WHERE num_control = '$num_control'";
$result = $conn->query($query);
$usuario = $result->fetch_assoc();

// Fetch data from `materias`
$query = "SELECT * FROM materias";
$result = $conn->query($query);
$materias = array();
while ($row = $result->fetch_assoc()) {
    $materias[] = $row;
}

// Fetch data from `inscripciones`
$query = "SELECT * FROM inscripciones WHERE num_control = '$num_control'";
$result = $conn->query($query);
$inscripciones = array();
while ($row = $result->fetch_assoc()) {
    $inscripciones[] = $row;
}

// Fetch data from `tareas`
$query = "SELECT * FROM tareas WHERE num_control = '$num_control'";
$result = $conn->query($query);
$tareas = array();
while ($row = $result->fetch_assoc()) {
    $tareas[] = $row;
}

// Fetch data from `eventos`
$query = "SELECT * FROM eventos WHERE num_control = '$num_control'";
$result = $conn->query($query);
$eventos = array();
while ($row = $result->fetch_assoc()) {
    $eventos[] = $row;
}

// Fetch data from `calificaciones_historicas`
$query = "SELECT * FROM calificaciones_historicas WHERE num_control = '$num_control'";
$result = $conn->query($query);
$calificaciones = array();
while ($row = $result->fetch_assoc()) {
    $calificaciones[] = $row;
}

// Calculate average grade for a specific student
$query = "SELECT AVG(calificacion) AS promedio FROM calificaciones_historicas WHERE num_control = '$num_control'";
$result = $conn->query($query);
$promedio = $result->fetch_assoc();

// Prepare the response
$response = array(
    'usuario' => $usuario,
    'materias' => $materias,
    'inscripciones' => $inscripciones,
    'tareas' => $tareas,
    'eventos' => $eventos,
    'calificaciones' => $calificaciones,
    'promedio' => $promedio['promedio']  // Include calculated average
);

// Return the JSON-encoded response
echo json_encode($response);

// Close connection
$conn->close();
?>
