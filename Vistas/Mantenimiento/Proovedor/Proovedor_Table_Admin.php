<?php
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

      $.post("../../../Controlador/ProveedorController.php", {
        'opcion': 'consultar'
      }, respuesta);
    }

    function respuesta(arg) {
      $("#datos tbody").append(arg);
    }

    function eliminar(codigo) {
      $.post("../../../Controlador/ProveedorController.php", {
        'opcion': 'eliminar',
        'id': codigo
      }, respuesta);

      window.location.href = "Proovedor_Table.php";
    }

    function editar(codigo) {
      document.location.href = "update.php?id=" + codigo;
    }
    window.onload = cargarcontrolador;
  </script>
</head>

<?php require '../../../includes/dash2.php'; ?>
<section class="page-content">

  <h1 class="text-center">Proovedores</h1>
  <button type="button" class="btn btn-outline-dark"><a href="new.php">Nuevo Proovedor</a></button>
  <br />
  <table class="table" id="datos">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Celular</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</section>
</div>
</body>

</html>