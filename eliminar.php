<?php

include_once("conexion.php");

$eliminar = $_GET['nombre'];

$sentencia = "DELETE FROM paciente WHERE nombrePaciente='$eliminar'";
mysqli_query($conexion, $sentencia);

$sentencia2 = "DELETE FROM exameneshematología WHERE nombrePaciente='$eliminar'";
mysqli_query($conexion, $sentencia2);

$sentencia3 = "DELETE FROM examenesheces WHERE nombrePaciente='$eliminar'";
mysqli_query($conexion, $sentencia3);

$sentencia4 = "DELETE FROM examenesorina WHERE nombrePaciente='$eliminar'";
mysqli_query($conexion, $sentencia4);

mysqli_close($conexion);

header("Location: pacientes.php");

?>