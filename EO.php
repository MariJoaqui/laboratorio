<?php

include_once("conexion.php");

$nombrePaciente = $_GET['nombre'];

$agregarBDD = "INSERT INTO examenesorina (nombrePaciente)
                VALUES ('$nombrePaciente')";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

header("Location: pacientes.php");

?>