<?php

$host = '';
$user = '';
$contra = '';
$bd = '';

$conexion = new mysqli($host, $user, $contra, $bd);

$carnet = $_POST['carnet'];

$consulta = "UPDATE alumnos SET carrera = 'Graduado' WHERE carnet = $carnet";

$conexion->query($consulta);

header("Location: " . "lista.php");

$conexion->close();
?>