<?php


session_start();
if (isset($_SESSION['username'])) {
}

if (!isset($_SESSION['rol'])) {
  header('location: login.php');
} else {
  if ($_SESSION['rol'] != 1) {
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

  <title>Perfil</title>
  <script type='text/javascript' src="../../js/jquery-1.7.1.min.js"> </script>
  <script type='text/javascript'>
    function cargarcontrolador() {

      $.post("../../../Controlador/SupervisorController.php", {
        'opcion': 'consultar'
      }, respuesta);
    }

    function respuesta(arg) {
      $("#datos tbody").append(arg);
    }

    function eliminar(codigo) {
      $.post("../../../Controlador/SupervisorController.php", {
        'opcion': 'eliminar',
        'ID_Supervisor': codigo
      }, respuesta);

      window.location.href = "Supervisor_Table.php";
    }

    function editar(codigo) {
      document.location.href = "update.php?id=" + codigo;
    }
    window.onload = cargarcontrolador;
  </script>
</head>


<?php require '../../../includes/dash2.php'; ?>
<section class="page-content">

  <h1 class="text-center">Supervisores</h1>
  <button type="button" class="botones"><a href="new.php">Nuevo Supervisor</a></button>
  <br />
  <table class="table" id="datos">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Contraseña</th>
        <th scope="col">Direccion</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</section>
</div>

</body>

</html>