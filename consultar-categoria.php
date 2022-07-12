<?php
    session_start();
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
    <title>Consultar Categoria</title>
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
                                Categorias
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                    if($_SESSION['rol']=="Administrador"){
                                        echo "<li><a class='dropdown-item' href='ingresar-categoria.php'>Ingresar</a></li>";
                                    }
                                ?>
                                <li><a class="dropdown-item active" href="#">Consultar</a></li>
                            </ul>
                        </div>
                        <div class="col-1"></div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-outline-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Otros
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <?php    
                                    if($_SESSION['rol']=="Administrador"){
                                        echo "<li><a class='dropdown-item' href='ingresar-empleado.php'>Empleados</a></li>";
                                        echo "<li><a class='dropdown-item' href='ingresar-producto.php'>Productos</a></li>";
                                        echo "<li><a class='dropdown-item' href='ingresar-presentacion.php'>Presentaciones</a></li>";
                                    }else{
                                        echo "<li><a class='dropdown-item' href='consultar-empleado.php'>Empleados</a></li>";
                                        echo "<li><a class='dropdown-item' href='consultar-producto.php'>Productos</a></li>";
                                        
                                    }
                                ?>
                                
                                

                            </ul>
                        </div>
                    </form>
                    <div class="col-1"></div>
                </div>
            </div>
        </nav>
        <!--Masthead-->
        <header class="categorias">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <section class="content">
                        <div class="container-fluid">
                            <?php
                            if (isset($_GET['clave'])) {
                                include('connect/connection-mysql.php');
                                $consulta = "UPDATE categoria SET status_categoria=0 WHERE id_categoria='" . $_GET['clave'] . "'";
                                if (mysqli_query($connect, $consulta)) {
                                    echo "Producto eliminado";
                                } else {
                                    echo "Unos pedillos";
                                }
                            }
                            ?>
                            <table class="table table-hover text-light">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre Categoria</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("connect/connection-mysql.php");
                                    $queryP = "SELECT * FROM categoria WHERE status_categoria=1";
                                    $exeqQuery = mysqli_query($connect, $queryP);
                                    while ($tabla = mysqli_fetch_array($exeqQuery)) {
                                        echo "<tr>
                                    <td>" . $tabla[0] . "</td>
                                    <td>" . $tabla[1] . "</td>
                                    <td>" . $tabla[2] . "</td>
                                    <td>" . $tabla[3] . "</td>";
                                    if($_SESSION['rol']=="Administrador"){
                                        echo "<td><a href='actualizar-categoria.php?clave=$tabla[0]'><i class='fas fa-edit' title='Editar'></i></a></td>
                                        <td><a href='consultar-categoria.php?clave=$tabla[0]'><i class='fas fa-trash-alt' title='Eliminar'></i></a></td>
                                        </tr>";
                                    }
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