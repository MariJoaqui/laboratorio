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
