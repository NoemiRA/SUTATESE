<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="resources/SUTATESE.png" />

<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="d-flex navbar-color">
                <img src="resources\SUTATESE.png" class="me-3 mx-2" alt="" width="60" height="80">
                <div class="my-auto">
                    <p class="fw-bold mb-0 ">SUTATESE</p>
                    <small>Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de
                        Ecatepec</small>
                </div>
            </div>
            <?php
                if(isset($_SESSION['NumEmpleado5'])){
                ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-color" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto" style="margin-left: 10%;">
                            <li class="nav-item">
                                <a class="nav-link" href="inicio.php"><i class="fa-solid fa-house mx-2"></i>Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="perfil.php"><i class="fa-solid fa-user mx-2"></i>Datos Generales</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="prestamos.php">Prestamos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="registroCA.php">Caja de ahorro</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="cerrarSesion.php"><i class="fa-solid fa-power-off mx-2"></i> Cerrar sesión </a>
                            </li>
                        </ul>
                    </div>
                <?php
                }
            ?>
        </div>
    </nav>