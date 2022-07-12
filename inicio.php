<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar Sesion</title>
</head>

<body class="hold-transition">
    <div class="wrapper">
        <!--NavBar-->
        <nav class="navbar navbar-expand-lg" style="background-color: #164b47;">
            <div class="container-fluid">
                <a class="navbar-brand nave-text nave-text1" href="#">Inicio</a>
                <button class="navbar-toggler nave-text" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nave-text" href="#">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nave-text" href="#">Contacto</a>
                        </li>
                        <div class="col-2"></div>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                        ?>
                            <li class="nav-item col-6">
                                <a class="nav-link nave-text" href="cerrar-sesion.php">Cerrar Sesion</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item col-6">
                                <a class="nav-link nave-text" href="iniciar-sesion.php">Iniciar Sesion</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <form class="d-flex" role="search" action="compras.php">
                            <button type="submit" class="btn btn-danger">Compras</button>
                            <div class="col-1"></div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Consultas
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <?php
                                    if ($_SESSION['rol'] == "Administrador") {
                                        echo "<li><a class='dropdown-item' href='ingresar-producto.php'>Productos</a></li>";
                                        echo "<li><a class='dropdown-item' href='ingresar-empleado.php'>Empleados</a></li>";
                                        echo "<li><a class='dropdown-item' href='ingresar-categoria.php'>Categorias</a></li>";
                                        echo "<li><a class='dropdown-item' href='ingresar-presentacion.php'>Presentaciones</a></li>";
                                    } else {
                                        echo "<li><a class='dropdown-item' href='consultar-producto.php'>Productos</a></li>";
                                        echo "<li><a class='dropdown-item' href='consultar-empleado.php'>Empleados</a></li>";
                                        echo "<li><a class='dropdown-item' href='consultar-categoria.php'>Categorias</a></li>";
                                        echo "<li><a class='dropdown-item' href='consultar-presentacion.php'>Presentaciones</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                    <div class="col-1"></div>
                </div>
            </div>
        </nav>
        <!--Masthead-->
        <div id="platillos">
            <div class="container-md  col-9">
                <div class="row">
                    <h3 class="text-center pb-5 pt-5 " style="color:beige"> ¡¡¡Elige tu platillo favorito!!! </h3>
                </div>
                <div class="row">
                    <?php
                    include("connect/connection-mysql.php");
                    $queryP = "SELECT * FROM producto";
                    $exeqQuery = mysqli_query($connect, $queryP);
                    while ($tabla = mysqli_fetch_array($exeqQuery)) {
                    ?>
                        <div class="col-md">
                            <div class="card w-100 card-border mb-5">
                                <img src="assets/img/pozole.jpg" class="card-img-top" alt="...">
                                <div class="card-body cards-inicio">
                                    <p class="card-text"><?php echo $tabla[1]?></p>
                                    <a href="procCarrito.php?clave=<?php echo $tabla[0];?>" class="btn btn-secondary btn-outline-light">ver</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>