<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<?php

include_once("conexion.php");

$nombre = $_GET['nombre'];

$analisisHeces = $_POST['resultadoHeces'];

$agregarBDD = "UPDATE examenesheces SET resultado_heces='$analisisHeces' WHERE nombrePaciente='$nombre'";

$resultado = mysqli_query($conexion, $agregarBDD);

$consultax = "SELECT * FROM examenesheces WHERE nombrePaciente='$nombre'";

$resultadox = mysqli_query($conexion, $consultax);

$mostrar = "SELECT * FROM paciente WHERE nombrePaciente='$nombre'"; 
$consultar = mysqli_query($conexion, $mostrar);

ob_start();

while ($obtener = mysqli_fetch_array($consultar)) {
            
    echo '<div class="section">
            <h5>Nombre: ' . $obtener['nombrePaciente'] . '</h5>
            <h5>Edad: ' . $obtener['edad'] . '</h5>
            <h5>Cédula: ' . $obtener['cedula'] . '</h5>
            <h5>Número de teléfono: ' . $obtener['telefono'] . '</h5>
            <h5>Correo electrónico: ' . $obtener['correo'] . '</h5>
            <h5>Dirección: ' . $obtener['direccion'] . '</h5>
        </div';
    }

    while ($obtenerTodo = mysqli_fetch_array($resultadox)) { 
    
        echo '<p>Resultado del análisis: ' . $obtenerTodo['resultado_heces'] . '</p>';
    }

    $html = ob_get_clean();

    $consulta = "SELECT * FROM paciente WHERE nombrePaciente='$nombre'"; //Obtener correo
    $resultado2 = mysqli_query($conexion, $consulta);

    while ($obtenerEmail = mysqli_fetch_array($resultado2)) {        
        $email = $obtenerEmail['correo']; // Correo a donde se quiere enviar
    }

    $consultaa = "SELECT * FROM correo";
    $resultadoo = mysqli_query($conexion, $consultaa);

    while ($obtenerEmaill = mysqli_fetch_array($resultadoo)) {        
        $asunto = $obtenerEmaill['asunto'];
    }

    $header = "From: noreply@example.com";
    $header.= "Reply-To: noreply@example.com";
    $header.= "X-Mailer: PHP/" . phpversion();
    $mail = @mail($email, $asunto, $html, $header);

    mysqli_close($conexion);

    header("Location: index.php");

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/d6ff169d2d.js" crossorigin="anonymous"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });

    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems,{
                duration: 500,
                indicators: true,
                fullWidth: true
            });
        });

    </script>
</body>
</html>