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
<body class="pink lighten-4">

    <!--HEADER-->

    <nav class="nav-wrapper black">
        <div class="container">
            <a href="index.html" class="brand-logo">Laboratorio clínico</a>

            <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>

            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="examenes.php">Examenes</a></li>
                <li><a href="pacientes.php">pacientes</a></li>
                <li><a href="resultados.php">Resultados</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="menu-responsive">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="examenes.php">Examenes</a></li>
        <li><a href="pacientes.php">pacientes</a></li>
        <li><a href="resultados.php">Resultados</a></li>
    </ul>

    <!--BODY-->

    <div class="fondo-section">
        <div class="container section black-text">

            <div class="section">

                <h5>Datos del paciente</h5>

            </div>

            <div class="divider"></div>

            <?php

            include_once("conexion.php");

            $nombre = $_POST['nombrePaciente'];

            $mostrar = "SELECT * FROM paciente WHERE nombrePaciente='$nombre'"; 
            $consulta = mysqli_query($conexion, $mostrar);
        
                while ($obtener = mysqli_fetch_array($consulta)) {
            
                    echo '<div class="section">

                            <h5>Nombre: ' . $obtener['nombrePaciente'] . '</h5>
                            <h5>Edad: ' . $obtener['edad'] . '</h5>
                            <h5>Cédula: ' . $obtener['cedula'] . '</h5>
                            <h5>Número de teléfono: ' . $obtener['telefono'] . '</h5>
                            <h5>Correo electrónico: ' . $obtener['correo'] . '</h5>
                            <h5>Dirección: ' . $obtener['direccion'] . '</h5>
    
                        </div';
                }

                mysqli_close($conexion);
            ?>
                
            <div class="divider"></div>
        </div>
    </div>

    <div class="fondo-section">
        <div class="container section black-text">

            <div class="divider"></div>

            <div class="section">

                <h5>Resultados: </h5>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php

            echo '<form class="col s12" action="HCguardar.php?nombre='. $nombre .'" method="post">';

            ?>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="globulosRojos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Globulos rojos:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="hemoglobina" required>
                        <label class="pink-text text-lighten-2" for="input_text">Hemoglobina:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="hematocrito" required>
                        <label class="pink-text text-lighten-2" for="input_text">Hematocrito:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="leucocitos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Leucocitos totales:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="neutrofilos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Neutrofilos segmentados:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="linfocitos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Linfocitos:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="monocitos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Monocitos:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="basofilos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Basofilos:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="eosinofilos" required>
                        <label class="pink-text text-lighten-2" for="input_text">Eosinofilos:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" data-length="10" name="plaquetas" required>
                        <label class="pink-text text-lighten-2" for="input_text">Plaquetas:</label>
                        <?php echo "Númerico"; ?>
                    </div>
                </div>
                
                <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action" value="si">Guardar</button>
            </form>
        </div>
    </div>

    <div class="fondo-section">
        <div class="container section black-text">

            <div class="divider"></div>

            <div class="section">

                <p>Al guardar se envía automaticamente un informa PDF al correo registrado del paciente.</p>

            </div>

        </div>
    </div>

    <!--FOOTER-->

    <footer class="page-footer black">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">

                    <h5 class="white-text">Medición de manómetros</h5>
                    <p class="grey-text text-lighten-4">En esta aplicación se podrá crear un histórico
                        de las distintas mediciones manuales realizadas a los manómetros de los pozos 
                        petroleros en diferentes periodos de tiempos.
                    </p>
                
                </div>

                <div class="col l4 offset-l2 s12">

                    <h5 class="white-text">Menú</h5>

                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index.php">Inicio</a></li>
                    </ul>

                </div>
            </div>
        </div>

            <div class="footer-copyright">
                <div class="container">

                © 2021 María Moreno - Programación Web
             
                </div>
            </div>

    </footer>

    <!--SCRIPT-->

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