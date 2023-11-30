<?php
$carnet = $_POST['carnet'];
$nombreCompleto = $_POST['nombreCompleto'];
$email = $_POST['email'];
$carrera = $_POST['carrera'];

$host = '';
$bd = '';
$username = '';
$password = '';

$fechaRegistro = date('Y-m-d');

try {
  $dbh = new PDO("mysql:host=$host;dbname=$bd", $username, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $stmt = $dbh->prepare("INSERT INTO alumnos (carnet, nombreCompleto, email, carrera, fechaRegistro) VALUES (:numeroCuenta, :nombreCompleto, :email, :carrera, :fechaRegistro)");
  $stmt->bindParam(':carnet', $carnet);
  $stmt->bindParam(':nombreCompleto', $nombreCompleto);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':carrera', $carrera);
  $stmt->bindParam(':fechaRegistro', $fechaRegistro);
  $stmt->execute();
  
  $dbh = null;
  
  header("Location: " . $url);
} catch (PDOException $e) {
  header("Location: " . $urlError);
}
?>
