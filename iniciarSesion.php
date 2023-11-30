<?php
$server = "localhost";
$usuario = "";
$contra = "";
$bd = "";

$conn = new mysqli($server, $usuario, $contra, $bd);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$email = $_POST['email'];
$carnet = $_POST['carnet'];

$url = "lista.php";
$urlError = "inicioError.html";

$stmt = $conn->prepare("SELECT * FROM alumnos WHERE email = ? AND carnet = ?");
$stmt->bind_param("ss", $email, $carnet);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    header("Location: " . $url);
} else {
    header("Location: " . $urlError);
}

$stmt->close();
$conn->close();
?>
