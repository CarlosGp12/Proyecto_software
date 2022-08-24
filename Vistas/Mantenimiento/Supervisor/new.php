<?php

session_start();
if(isset($_SESSION['username']))
{
}

    if(!isset($_SESSION['rol'])){
        header('location: ../../login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../../login.php');
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Nueva Recarga</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script type='text/javascript' src="../../js/jquery-1.7.1.min.js"> </script>
    <script type='text/javascript'>
        $(function () {
            $("#guardar").click(function () {
                $.post("../../../Controlador/SupervisorController.php",
                    $("#datos").serialize(), respuesta);
                window.location.href = "Supervisor_Table.php";
            });
        });

        function respuesta(arg) {
            alert(arg);
        }
        window.onload = cargarcontroladorCombo;
    </script>

</head>

<body
    background="https://blakesguam.com/wp-content/uploads/2016/08/photodune-6207464-geometric-polygon-abstract-background-l-4.jpg">

    <div class="d-grid gap-2 col-6 mx-auto py-3">
        <a href="Supervisor_Table.php" class="btn btn-warning " tabindex="-1" role="button"
            aria-disabled="true">Regresar</a>
    </div>

    <h1 class="text-center">Ingresar nuevo supervisor</h1>
    <form id="datos">
        <input type="text" class="form-control" name="opcion" value="ingresar" hidden />

        <div class="form-row py-2">
            <label for="nombre_Usuario" class="col-sm-4 text-right py-1 col-form-label col-form-label-lg">Usuario</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="nombre_Usuario" name="nombre_Usuario" placeholder="Usuario">
            </div>
        </div>

        <div class="form-row py-2">
            <label for="correo" class="col-sm-4 text-right py-1 col-form-label col-form-label-lg">Correo</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
            </div>
        </div>

        <div class="form-row py-2">
            <label for="password" class="col-sm-4 text-right py-1 col-form-label col-form-label-lg">Contraseña</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
        </div>

        <div class="form-row py-2">
            <label for="direccion_Supervisor" class="col-sm-4 text-right py-1 col-form-label col-form-label-lg">Direccion</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="direccion_Supervisor" name="direccion_Supervisor" placeholder="Direccion">
            </div>
        </div>
        
        <div class="d-grid gap-2 col-6 mx-auto py-3">
            <button type="button" class="w-75  btn btn-warning btn-lg " id="guardar">Guardar</button>
        </div>
    </form>
</body>

</html>