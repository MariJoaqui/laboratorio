<?php

include_once("conexion.php");

$nombre = $_GET['nombre'];

$HC1 = $_POST['globulosRojos'];
$HC2 = $_POST['hemoglobina'];
$HC3 = $_POST['hematocrito'];
$HC4 = $_POST['leucocitos'];
$HC5 = $_POST['neutrofilos'];
$HC6 = $_POST['linfocitos'];
$HC7 = $_POST['monocitos'];
$HC8 = $_POST['basofilos'];
$HC9 = $_POST['eosinofilos'];
$HC10 = $_POST['plaquetas'];

$agregarBDD = "UPDATE exameneshematología SET Globulos_rojos='$HC1', hemoglobina='$HC2', Hematocrito='$HC3',
                leucocitos_totales='$HC4', neutrofilos_segmentados='$HC5', linfocitos='$HC6',monocitos='$HC7',
                eosinofilos='$HC9', basofilos='$HC8', plaquetas='$HC10' WHERE nombrePaciente='$nombre'";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

?>