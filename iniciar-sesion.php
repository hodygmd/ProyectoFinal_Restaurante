<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location:inicio.php");
    }else{
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
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
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
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <!--Masthead-->
        <header class="sesion">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <section class="content">
                        <div class="container-fluid">
                            <form class="needs-validation" novalidate action="ingresar-producto.php" method="post">
                                <div class="card border-dark" style="width: 18rem;">
                                    <div class="card-header text-center border-dark cards">
                                        <h4>Iniciar Sesion</h4>
                                    </div>
                                    <div class="card-body cards1">
                                        <div>
                                            <label for="exampleFormControlInput1" class="form-label">Nombre de Usuario</label>
                                            <input type="text" class="textbox form-control" id="exampleFormControlInput1" placeholder="Usuario" name="txtUsuario">
                                        </div>
                                        <br>
                                        <div>
                                            <label for="exampleFormControlInput2" class="form-label">Password</label>
                                            <input type="password" class="textbox  form-control" id="exampleFormControlInput2" placeholder="Password" name="txtPassword">
                                        </div>

                                    </div>
                                    <div class="card-footer text-center border-dark cards">
                                        <div>
                                            <button name="btnIniciar" type="submit" class="btn btn-danger btn-outline-info">Iniciar Sesion</button><br>
                                            <a href="ingresar-empleado.php">Crear Cuenta</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                        </div>
                        <!-- /.container-fluid -->
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
    }
?>