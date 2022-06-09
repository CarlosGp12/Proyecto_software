<?php


session_start();
if(isset($_SESSION['username']))
{
}

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">

  <title>Perfil</title>
  <script type='text/javascript' src="../../js/jquery-1.7.1.min.js"> </script>
  <script type='text/javascript'>
    function cargarcontrolador() {

      $.post("../../../Controlador/ProductosController.php", {
        'opcion': 'consultar'
      }, respuesta);
    }

    function respuesta(arg) {
      $("#datos tbody").append(arg);
    }

    function eliminar(codigo)
    {
      $.post("../../../Controlador/ProductosController.php",
        { 'opcion': 'eliminar', 'id': codigo }, respuesta);

      window.location.href = "Perfil_Supervisor.php";
    }

    function editar(codigo) {
      document.location.href = "update.php?id=" + codigo;
    }
    window.onload = cargarcontrolador;
  </script>
</head>

<body
  background="https://blakesguam.com/wp-content/uploads/2016/08/photodune-6207464-geometric-polygon-abstract-background-l-4.jpg"
  class="cuerpo">

  <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 970px;">
      <a href="../index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Farmacia</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="../Opciones.php" class="nav-link text-white" aria-current="page">
            <svg class="bi me-2" width="16" height="16">
            </svg>
            <i class="bi bi-house"></i>
            Home
          </a>
        </li>
      </ul>
    </div>

    <div class="edi">
      <h1 class="text-center">Productos</h1>

      <br />
      <table class="table" id="datos">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">descripcion</th>
            <th scope="col">f_fabricacion</th>
            <th scope="col">f_caducidad</th>
            <th scope="col">precio</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>