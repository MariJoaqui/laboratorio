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
                <li><a href="pacientes.php">Pacientes</a></li>
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

            <div class="divider"></div>

            <div class="section">
                
                <h5>Pacientes: </h5>

                <?php

                include_once("conexion.php");

                $mostrar = "SELECT * FROM paciente"; 
                $consulta = mysqli_query($conexion, $mostrar);

                echo '<div class="row pink lighten-2">
                            <div class="col s12 m4 l2"><p>Paciente</p></div>
                            <div class="col s12 m4 l1"><p>Edad</p></div>
                            <div class="col s12 m4 l2"><p>Teléfono</p></div>
                            <div class="col s12 m4 l4"><p>Correo</p></div>
                            <div class="col s12 m4 l1"><p>Eliminar</p></div>
                        </div>';
                    
                    while ($obtener = mysqli_fetch_array($consulta)) {
                        
                        echo '<div class="row pink lighten-4">
                                <div class="col s12 m4 l2"><p>' . $obtener['nombrePaciente'] . '</p></div>
                                <div class="col s12 m4 l1"><p>' . $obtener['edad'] . '</p></div>
                                <div class="col s12 m4 l2"><p>' . $obtener['telefono'] . '</p></div>
                                <div class="col s12 m4 l4"><p>' . $obtener['correo'] . '</p></div>
                                <div class="col s12 m4 l1">
                                    <a href="eliminar.php?nombre=' . $obtener['nombrePaciente'] . '" class="waves-effect waves-light btn pink lighten-2">Eliminar</a>
                                </div>
                            </div>';
                    }

                mysqli_close($conexion);
                ?>
                          
            </div>

            <div class="divider"></div>

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