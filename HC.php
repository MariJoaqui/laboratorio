<?php

include_once("conexion.php");

$nombrePaciente = $_GET['nombre'];
$examen = "Hematología completa";

$agregarBDD = "INSERT INTO exameneshematología (nombrePaciente)
                VALUES ('$nombrePaciente')";

$resultado = mysqli_query($conexion, $agregarBDD);

$agregarBDD2 = "INSERT INTO paciente (tipo_examen)
                VALUES ('$examen') WERE nombrePaciente='$nombrePaciente'";

mysqli_close($conexion);

header("Location: pacientes.php");

?>