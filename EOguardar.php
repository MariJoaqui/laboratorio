<?php

include_once("conexion.php");

$nombre = $_GET['nombre'];

$EO1 = $_POST['densidad'];
$EO2 = $_POST['proteína'];
$EO3 = $_POST['glucosa'];
$EO4 = $_POST['bilirrubina'];
$EO5 = $_POST['urubilinogeno'];
$EO6 = $_POST['eritrocitos'];
$EO7 = $_POST['nitritos'];
$EO8 = $_POST['leucocitos'];
$EO9 = $_POST['bacterias'];

$agregarBDD = "UPDATE examenesorina SET densidad_relativa='$EO1', proteína='$EO2', glucosa='$EO3',
                bilirrubina='$EO4', urubilinogeno='$EO5', eritrocitos='$EO6', nitritos='$EO7',
                leucocitos='$EO8', bacterias='$EO9' WHERE nombrePaciente='$nombre'";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

?>