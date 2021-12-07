<?php

include_once("conexion.php");

$nombre = $_GET['nombre'];

$analisisHeces = $_POST['resultadoHeces'];

$agregarBDD = "UPDATE examenesheces SET resultado_heces='$analisisHeces' WHERE nombrePaciente='$nombre'";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

?>