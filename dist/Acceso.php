<!DOCTYPE html>

<html lang="en">

<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-4 p-4 mb-0">
                            <div class="card-body">
                                <center>
                                    <h1>BIENVENIDO <br>A SICAFI</h1>
                                </center>
                                <p class="text-medium-emphasis">Iniciar Sesión</p>
                                <form action="autenticar.php" method="post" autocomplete="off">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Usuario" name="username"
                                            id="username" >
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                                                </use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Contraseña"
                                            name="password" id="password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Acceder</button>
                                        </div>
                                        <div class="col-6 text-end">
                                        <a href="olvido_contrasena.php" class="btn btn-link px-0">¿Olvidó contraseña?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

</body>

</html>
