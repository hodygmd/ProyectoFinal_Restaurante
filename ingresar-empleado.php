<?php
    session_start();
/*if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['rol']) && $_SESSION['rol']=="Administrador") {*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <?php
        if(isset($_SESSION['usuario'])){
    ?>
    <title>Ingresar Empleado</title>
    <?php
        }else{
    ?>
    <title>Registrar Usuario</title>
    <?php
        }
    ?>
</head>

<body>
    <div class="wrapper">
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
                        if(isset($_SESSION['usuario'])&&isset($_SESSION['rol'])&&$_SESSION['rol']=="Administrador"){

                        
                    ?>
                    <form class="d-flex" role="search">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Empleados
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item active" href="#">Ingresar</a></li>
                                <li><a class="dropdown-item" href="consultar-empleado.php">Consultar</a></li>
                            </ul>
                        </div>
                        <div class="col-1"></div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Otros
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="ingresar-producto.php">Productos</a></li>
                                <li><a class="dropdown-item" href="ingresar-categoria.php">Categorias</a></li>
                                <li><a class="dropdown-item" href="ingresar-presentacion.php">Presentaciones</a></li>
                            </ul>
                        </div>
                    </form>
                    <div class="col-1"></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <!--Masthead-->
        <header class="empleados">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <section class="content">
                        <div class="container-fluid">
                            <form class="row g-3 needs-validation text-light" novalidate action="#" method="post">
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label>Nombre:</label>
                                    <input name="nombre" type="text" class="textbox form-control" required placeholder="Ingesar el nombre">
                                </div>
                                <div class="col-5">
                                    <label>Primer Apellido:</label>
                                    <input name="ape1" type="text" class="textbox form-control" required placeholder="Ingesar primer apellido">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label>Segundo Apellido:</label>
                                    <input name="ape2" type="text" class="textbox form-control" required placeholder="Ingesar segundo apellido">
                                </div>
                                <div class="col-5">
                                    <label>Direccion:</label>
                                    <input name="dir" type="text" class="textbox form-control" required placeholder="Ingesar direccion">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label>Correo:</label>
                                    <input name="email" type="text" class="textbox form-control" required placeholder="Ingesar correo">
                                </div>
                                <div class="col-5">
                                    <label>Telefono:</label>
                                    <input name="tel" type="text" class="textbox form-control" required placeholder="Ingesar telefono">
                                </div>
                                <div class="col-1"></div>
                                <?php
                                    if(isset($_SESSION['rol'])=="Administrador")
                                    {
                                ?>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <label>Puesto:</label>
                                    <br>
                                    <select name="puesto" class="col-8 custom-select" required>
                                        <option selected disabled>Choose...</option>
                                        <?php
                                        include("connect/connection-mysql.php");
                                        $queryP = "SELECT * FROM puesto";
                                        $exeqQuery = mysqli_query($connect, $queryP);
                                        while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                            echo "<option value='$tabla[1]'>" . $tabla[1] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-4">
                                    <label>Rol:</label>
                                    <br>
                                    <select name="rol" class="col-8 custom-select" required>
                                        <option selected disabled>Choose...</option>
                                        <?php
                                        include("connect/connection-mysql.php");
                                        $queryP = "SELECT * FROM rol";
                                        $exeqQuery = mysqli_query($connect, $queryP);
                                        while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                            echo "<option value='$tabla[1]'>" . $tabla[1] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-1"></div>
                                <?php
                                    }
                                ?>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label>Usuario:</label>
                                    <input name="usuario" type="text" class="textbox form-control" required placeholder="Ingesar Usuario">
                                </div>
                                <div class="col-5">
                                    <label>Password:</label>
                                    <input name="pass" type="password" class="textbox form-control" required placeholder="Ingesar Password">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-12"></div>
                                <div class="col-12"></div>
                                <div class="col-3"></div>
                                <div class="col-2">
                                    <button class="btn btn-danger btn-outline-info" type="reset">Limpiar</button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-2">
                                    <button name="btnRegistrar" class="btn btn-danger btn-outline-info" type="submit">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </header>
    </div>
    <?php
        if(isset($_POST["btnRegistrar"])){
            include("connect/connection-mysql.php");
            $clave = "emp" . date('mYhis', time());
            if(isset($_SESSION['usuario'])){
                if($_SESSION['rol']=="Administrador"){
                    try{
                        $proc=$connect->prepare("CALL insertar_empleado(?,?,?,?,?,?,?,?,?)");
                        $proc->bind_param("sssssssss", $clave, $_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['dir'],$_POST['email'],$_POST['tel'], $_POST['puesto'],$_POST['rol']);
                        $proc->execute();
                    }catch(Exception $e){
                        echo 'Excepcion capturada', $e->getMessage(),"\n";
                    }
                    try{
                        $proc=$connect->prepare("CALL insertar_usuario(?,?,?)");
                        $proc->bind_param("sss", $_POST['usuario'],$_POST['pass'],$clave);
                        $proc->execute();
                    }catch(Exception $e){
                        echo 'Excepcion capturada', $e->getMessage(),"\n";
                    }
                    echo "<script>alert('Usuario agregado correctamente');</script>";
                }
            }else{
                try{
                    $proc=$connect->prepare("CALL insertar_empleado_nol(?,?,?,?,?,?,?)");
                    $proc->bind_param("sssssss", $clave, $_POST['nombre'],$_POST['ape1'],$_POST['ape2'],$_POST['dir'],$_POST['email'],$_POST['tel']);
                    $proc->execute();
                }catch(Exception $e){
                    echo 'Excepcion capturada', $e->getMessage(),"\n";
                }
                try{
                    $proc=$connect->prepare("CALL insertar_usuario(?,?,?)");
                    $proc->bind_param("sss", $_POST['usuario'],$_POST['pass'],$clave);
                    $proc->execute();
                }catch(Exception $e){
                    echo 'Excepcion capturada', $e->getMessage(),"\n";
                }
                echo "<script>alert('Usuario agregado correctamente');</script>";
                echo "<meta http-equiv='refresh' content='0;url=iniciar-sesion.php'>";
            }
        }
    ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>
<?php
    /*} else {
        header("Location:inicio.php");
    }
} else {
    header("Location:iniciar-sesion.php");
}*/
?>