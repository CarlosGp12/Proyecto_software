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
            <span class="fs-4">Farmacia</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="Opciones.php" class="nav-link text-white" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Home
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../imagenes/admin.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php echo $admin; ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">

                <li><a class="dropdown-item" href="http://localhost/Pasarela/Vistas/Proyecto/Logout.php?logout">Sign out</a></li>
            </ul>
        </div>
    </div>

    <div class="edi">
        <h1 class="text-center">Planes</h1>
        <button type="button" class="btn btn-outline-dark"><a href="../Planes/NuevoPlanes.php">Nuevo Plan</a></button>
        <br />

        <table class="table" id="datos">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">GIGAS</th>
                    <th scope="col">Promocion1</th>
                    <th scope="col">Promocion2</th>
                    <th scope="col">Promocion3</th>
                    <th scope="col">Promocion4</th>
                    <th scope="col">Detalle1</th>
                    <th scope="col">Detalle2</th>
                    <th scope="col">Detalle3</th>
                    <th scope="col">Detalle4</th>
                    <th scope="col">Detalle5</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>