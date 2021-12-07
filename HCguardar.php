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

    $consultax = "SELECT * FROM exameneshematología WHERE nombrePaciente='$nombre'";

    $resultadox = mysqli_query($conexion, $consultax);

    ob_start();

    while ($obtenerTodo = mysqli_fetch_array($resultadox)) { 
    
        echo '<table>
                <tbody>
                    <tr>
                        <td>Globulos rojos</td>
                        <td>' . $obtenerTodo['Globulos_rojos'] .'</td>
                        <td>3.9 a 5.4 millones</td>
                    </tr>
                    <tr>
                        <td>Hemoglobina</td>
                        <td>' . $obtenerTodo['hemoglobina'] .'</td>
                        <td>12.0 a 16.0 g/dL</td>
                    </tr>
                    <tr>
                        <td>Hematocrito</td>
                        <td>' . $obtenerTodo['Hematocrito'] .'</td>
                        <td>35 a 47%</td>
                    </tr>
                    <tr>
                        <td>Leucocitos totales</td>
                        <td>' . $obtenerTodo['leucocitos_totales'] .'</td>
                        <td>4000 a 11000</td>
                    </tr>
                    <tr>
                        <td>Neutrofilos segmentados</td>
                        <td>' . $obtenerTodo['neutrofilos_segmentados'] .'</td>
                        <td>1600 a 8000</td>
                    </tr>
                    <tr>
                        <td>Linfocitos</td>
                        <td>' . $obtenerTodo['linfocitos'] .'</td>
                        <td>900 a 4000</td>
                    </tr>
                    <tr>
                        <td>Monocitos</td>
                        <td>' . $obtenerTodo['monocitos'] .'</td>
                        <td>100 a 1000</td>
                    </tr>
                    <tr>
                        <td>Eosinofilos</td>
                        <td>' . $obtenerTodo['eosinofilos'] .'</td>
                        <td>0 a 500</td>
                    </tr>
                    <tr>
                        <td>Basofilos</td>
                        <td>' . $obtenerTodo['basofilos'] .'</td>
                        <td>0 a 200</td>
                    </tr>
                    <tr>
                        <td>Plaquetas</td>
                        <td>' . $obtenerTodo['plaquetas'] .'</td>
                        <td>140000 a 450000</td>
                    </tr>
                </tbody>
            </table>';
    }

    $consulta = "SELECT * FROM paciente WHERE nombrePaciente='$nombre'";

    $resultado2 = mysqli_query($conexion, $consulta);

    while ($obtenerEmail = mysqli_fetch_array($resultado2)) {        
        $email = $obtenerEmail['correo'];
    }
        
    mysqli_close($conexion);

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

<?php

$html = ob_get_clean();

require_once 'libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

$dompdf->setPaper('letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("archivo.pdf", array("Attachment" => false));

?>