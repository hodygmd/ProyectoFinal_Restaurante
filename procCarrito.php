<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['rol'])) {
        include("connect/connection-mysql.php");
        try {
            $proc = $connect->prepare("CALL insertar_carrito(?,?)");
            $proc->bind_param("ss", $_SESSION['usuario'], $_GET['clave']);
            $proc->execute();
        } catch (Exception $e) {
            echo 'Excepcion capturada', $e->getMessage(), "\n";
        }
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
    <title>Carrito</title>
</head>

<body>
    <div class="wrapper">
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
                        if(isset($_SESSION['usuario'])){
                        ?>
                        <li class="nav-item col-6">
                            <a class="nav-link nave-text" href="cerrar-sesion.php">Cerrar Sesion</a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <form class="d-flex" method="post" action="compras.php">
                        <button type="submit" class="btn btn-danger">Regresar</button>
                    </form>
                    <div class="col-1"></div>
                    <form class="d-flex" method="post" action="generarVenta.php">
                        <button type="submit" class="btn btn-danger">Procesar Venta</button>
                    </form>
                    <div class="col-1"></div>
                </div>
            </div>
        </nav>
        <header class="carrito">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <section class="content">
                        <div class="container-fluid" style="min-height: 200px;">
                            <?php
                            if (isset($_GET['clave'])) {
                                include('connect/connection-mysql.php');
                                $consulta = "DELETE FROM carrito where id_carrito='" . $_GET['clave'] . "'";
                                if (mysqli_query($connect, $consulta)) {
                                    echo "Producto eliminado";
                                } else {
                                    echo "Unos pedillos";
                                }
                            }
                            ?>
                            <table class="table table-hover text-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Id_Carrito</th>
                                        <th scope="col">Id_Usuario</th>
                                        <th scope="col">Clave Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("connect/connection-mysql.php");
                                    $queryP = "call mostrar_carrito('".$_SESSION['usuario']."')";
                                    $exeqQuery = mysqli_query($connect, $queryP);
                                    while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                        echo "<tr>
                                    <td>" . $tabla[0] . "</td>
                                    <td>" . $tabla[1] . "</td>
                                    <td>" . $tabla[2] . "</td>
                                    <td>" . $tabla[3] . "</td>
                                    <td>" . $tabla[4] . "</td>
                                    <td><a href='procCarrito.php?clave=$tabla[0]'><i class='fas fa-trash-alt' title='Eliminar'></i></a></td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </header>

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