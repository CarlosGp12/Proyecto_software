<?php
session_start();

if(isset($_SESSION['User']))
{
}
else
{
    header("location:http://localhost/Proyecto_software/Vistas/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../css/botones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script type='text/javascript' src="../../js/jquery-1.7.1.min.js"> </script>
    <script type='text/javascript'>
        function cargarcontrolador() {

            $.post("../../../Controlador/PlanesController.php", {
                'opcion': 'consultar'
            }, respuesta);
        }

        function respuesta(arg) {
            $("#datos tbody").append(arg);
        }

        function editar(codigo) {
            document.location.href = "../Planes/updatePlanes.php?id_plan=" + codigo;
        }
        window.onload = cargarcontrolador;
    </script>
</head>

<body background="https://blakesguam.com/wp-content/uploads/2016/08/photodune-6207464-geometric-polygon-abstract-background-l-4.jpg" class="cuerpo">


    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 970px;">
        <a href="../Index-Login-Admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="../../imagenes/1.png" width="50" height="50" alt="">
            <span class="fs-4">Pillo-Phone</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="" class="nav-link text-white  active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="PerfilAdmin.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Planes
                </a>
            </li>
            <li>
                <a href="PerfilAdminRe.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Recargas
                </a>
            </li>
            <li>
                <a href="PerfilUsuarios.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Usuarios
                </a>
                <a href="PerfilAdminTb.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Admin
                </a>
            </li>
            <li>
                <a href="PerfilPagosPlan.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Pagos Planes
                </a>
            </li>
            <li>
                <a href="PerfilPagosRecarga.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Pagos Recargas
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../imagenes/admin.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php  echo $admin; ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">

                <li><a class="dropdown-item" href="http://localhost/Pasarela/Vistas/Proyecto/Logout.php?logout">Sign out</a></li>
            </ul>
        </div>
    </div>


    <div class="edi">
        <main class="menu">
            <div class="container py-4">


                
                    <div>
                        <div class="container-fluid py-5 pb-5 m-5">
                            <h1 class="display-5 fw-bold">Bienvenido al sistema de administracion</h1>
                            <p class="col-md-8 fs-4">Antes de salir del sitio web por favor verificar si todos los datos modificados fueron editados y guardados con exito.</p>

                        </div>
                    </div>

                    <div class="row align-items-md-stretch ">
                        <div class="col-md-6">
                            <div class="mt-2 h-100 p-5 text-white bg-dark rounded-3">
                                <h2>Interfaz de planes</h2>
                                <p class="mb-5">Se le enviara a la interfaz de planes para ver los planes creados (y) (o) modificados</p>
                                <a href="../Planes/Planes-Con-Login-Admin.php"><button class="btn btn-outline-light mt-5" type="button">Dirigir a Planes</button></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" mt-2 h-100 p-5 bg-light border rounded-3">
                                <h2>Interfaz de recargas</h2>
                                <p class="mb-5">Se le enviara a la interfaz de recargas para ver las recargas creadas (y) (o) modificadas.</p>
                                <a href="../Recarga/Recarga-Admin.php"><button class="btn btn-outline-secondary mt-5" type="button">Dirigir a Recargas</button></a>
                            </div>
                        </div>
                    </div>

                    <footer class=" pt-3 mt-4 text-muted border-top">
                        © 2021
                    </footer>
               
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>