<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['rol'])) {
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Compras</title>
        </head>
        <body class="hold-transition" id="platillos">
            <!--NavBar-->
            <nav class="navbar navbar-expand-lg" style="background-color: #164b47;">
                <div class="container-fluid">
                    <a class="navbar-brand nave-text nave-text1" href="inicio.php">Inicio</a>
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
                            }
                            ?>
                        </ul>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                        ?>
                            <form class="d-flex" role="search" action="inicio.php">
                                <button type="submit" class="btn btn-danger">Regresar</button>

                            </form>
                            <div class="carrostylo">
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    include("connect/connection-mysql.php");
                                    $queryP = "SELECT count(*) FROM carrito WHERE idUsuario=(SELECT idUsuario FROM usuario WHERE nombre_usuario='" . $_SESSION['usuario'] . "');";
                                    $exeqQuery = mysqli_query($connect, $queryP);
                                    $tabla = mysqli_fetch_array($exeqQuery);

                                ?>
                                    <a href="procCarrito.php"><i class='fa-solid fa-cart-shopping w3-xxlarge' style='color: #f3da35;font-size:50px; justify-content: flex-end;'>
                                            <span class="badge bg-primary rounded-pill" style='color: #f3da35;font-size:15px;'><?php echo $tabla[0] ?></span></i>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-1"></div>
                    </div>
                </div>
            </nav>
            <!--Masthead-->
            <div class="carrostylo" style="margin-top: 2rem;">
                <h2 style="text-align: center; justify-content: center;color:beige;"> Categorias</h2>
            </div>
            <div style="margin: 2rem;">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-3">
                        <div class="list-group col-5">
                            <?php
                            include("connect/connection-mysql.php");
                            $queryP = "SELECT * FROM categoria";
                            $exeqQuery = mysqli_query($connect, $queryP);
                            while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                echo "<a class='list-group-item-success list-group-item list-group-item-action col-2' href='compras.php?clave=" . $tabla[0] . "'>$tabla[1]</a>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="d-flex justify-content-between">
                            <?php
                            if (isset($_GET['clave'])) {
                                include("connect/connection-mysql.php");
                                $queryP = "SELECT * FROM producto WHERE id_categoria='" . $_GET['clave'] . "'";
                                $exeqQuery = mysqli_query($connect, $queryP);
                                while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                    echo "<div class='col-2'>
                                            <div class='card card-border' style='width: 9rem;height:18rem;'>
                                                <img src='assets/img/pozole.jpg' class='card-img-top' alt='...'>
                                                    <div class='card-body cards-inicio'>
                                                        <h5 class='card-title' style='height: 3rem;'>" . $tabla[1] . "</h5>
                                                        <p class='card-text' style='height: 3rem;'>" . $tabla[3] . "</p>
                                                        <a href='procCarrito.php?clave=" . $tabla[0] . "' class='btn btn-secondary btn-outline-light'>" . $tabla[2] . "</a>
                                                    </div>
                                            </div>
                                        </div>";
                                }
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
<?php
    } else {
        header("Location:inicio.php");
    }
} else {
    header("Location:iniciar-sesion.php");
}
?>