<?php

include_once("conexion.php");

$nombrePaciente = $_GET['nombre'];

$agregarBDD = "INSERT INTO exameneshematología (nombrePaciente)
                VALUES ('$nombrePaciente')";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

header("Location: pacientes.php");

?>