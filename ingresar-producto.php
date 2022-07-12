<?php
session_start();
$cont = 0;
if (isset($_POST["btnIniciar"])) {
    include("connect/connection-mysql.php");
    $queryP = "CALL comprobar_sesion";
    $exeqQuery = mysqli_query($connect, $queryP);
    while ($tabla = mysqli_fetch_array($exeqQuery)) {
        if ($_POST["txtUsuario"] == $tabla[0]) {
            if ($_POST["txtPassword"] != $tabla[1]) {
                header("Location:iniciar-sesion.php");
            }else{
                $_SESSION['usuario'] = $_POST["txtUsuario"];
                $_SESSION['rol'] = $tabla[2];

            }
        }
    }
}
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['rol']) && $_SESSION['rol']=="Administrador") {
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
    <title>Ingresar Producto</title>
</head>

<body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg fixed-top">
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
                <form class="d-flex" role="search">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item active" href="#">Ingresar</a></li>
                            <li><a class="dropdown-item" href="consultar-producto.php">Consultar</a></li>
                        </ul>
                    </div>
                    <div class="col-1"></div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Otros
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="ingresar-empleado.php">Empleados</a></li>
                            <li><a class="dropdown-item" href="ingresar-categoria.php">Categorias</a></li>
                            <li><a class="dropdown-item" href="ingresar-presentacion.php">Presentaciones</a></li>
                        </ul>
                    </div>
                </form>
                <div class="col-1"></div>
            </div>
        </div>
    </nav>

    <!--Masthead-->
    <header class="productos">
        <div class="container">
            <div class="d-flex justify-content-center">
                <section class="content">
                    <div class="container-fluid">
                        <form class="row g-3 needs-validation" novalidate action="#" method="post">
                            <div class="col-2"></div>
                            <div class="col-4">
                                <label class="text-light">Nombre Produto:</label>
                                <input name="nombreProducto" type="text" class="textbox form-control" required placeholder="Ingesar el nombre del Producto">
                            </div>
                            <div class="col-4">
                                <label class="text-light">Descripcion</label>
                                <input name="descripcion" type="text" class="textbox form-control" required placeholder="Ingesar una descripcion del Producto">
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <label class="text-light">Precio:</label>
                                <input name="precio" type="number" class="textbox form-control" required placeholder="Ingesar el precio del Producto">
                            </div>
                            <div class="col-4">
                                <label class="text-light">Categoria:</label>
                                <br>
                                <select name="categoria" class="col-6 custom-select" required>
                                    <option selected disabled>Choose...</option>
                                    <?php
                                    include("connect/connection-mysql.php");
                                    $queryP = "SELECT * FROM categoria";
                                    $exeqQuery = mysqli_query($connect, $queryP);
                                    while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                        echo "<option value='$tabla[1]'>" . $tabla[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <label class="text-light">Existencias</label>
                                <input name="exis" type="number" class="textbox form-control" required placeholder="Ingesar una existencias">
                            </div>
                            <div class="col-4">
                                <label class="text-light">Stock Minimo:</label>
                                <input name="smin" type="number" class="textbox form-control" required placeholder="Ingesar stock minimo">
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <label class="text-light">Stock Maximo:</label>
                                <input name="smax" type="number" class="textbox form-control" required placeholder="Ingesar stock maximo">
                            </div>
                            <div class="col-8"></div>
                            <div class="col-12"></div>
                            <div class="col-4"></div>
                            <div class="col-2">
                                <button class="btn btn-danger btn-outline-info" type="reset">Limpiar</button>
                            </div>
                            <div class="col-2">
                                <button name="btnRegistrar" class="btn btn-danger btn-outline-info" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div>
    </header>
    <?php
    if (isset($_POST["btnRegistrar"])) {
        include("connect/connection-mysql.php");
        $clave = "pro" . date('mYhis', time());
        try {
            $proc = $connect->prepare("CALL insertar_producto(?,?,?,?,?,?,?,?)");
            $proc->bind_param("ssissiii", $clave, $_POST['nombreProducto'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $_POST['exis'], $_POST['smin'], $_POST['smax']);
            $proc->execute();
        } catch (Exception $e) {
            echo 'Excepcion capturada', $e->getMessage(), "\n";
        }
    }
    ?>
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