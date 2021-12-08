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

$consultax = "SELECT * FROM examenesorina WHERE nombrePaciente='$nombre'";

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

    echo '<h5>Resultados</h5>';

    while ($obtenerTodo = mysqli_fetch_array($resultadox)) { 

        echo '<table>
                <tbody>
                    <tr>
                        <td>Densidad relativa</td>
                        <td>' . $obtenerTodo['densidad_relativa'] .'</td>
                        <td>1023-1035 g/ml</td>
                    </tr>
                    <tr>
                        <td>Proteína</td>
                        <td>' . $obtenerTodo['proteína'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                    <tr>
                        <td>Glucosa</td>
                        <td>' . $obtenerTodo['glucosa'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                    <tr>
                        <td>Bilirrubina</td>
                        <td>' . $obtenerTodo['bilirrubina'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                    <tr>
                        <td>Urubilinogeno</td>
                        <td>' . $obtenerTodo['urubilinogeno'] .'</td>
                        <td>1 mg/dl</td>
                    </tr>
                    <tr>
                        <td>Eritrocitos</td>
                        <td>' . $obtenerTodo['eritrocitos'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                    <tr>
                        <td>Nitritos</td>
                        <td>' . $obtenerTodo['nitritos'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                    <tr>
                        <td>Leucocitos</td>
                        <td>' . $obtenerTodo['leucocitos'] .'</td>
                        <td>5 pc</td>
                    </tr>
                    <tr>
                        <td>Bacterias</td>
                        <td>' . $obtenerTodo['bacterias'] .'</td>
                        <td>Presente-Ausente</td>
                    </tr>
                </tbody>
            </table>';
    }

    $resultado = mysqli_query($conexion, $agregarBDD);

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