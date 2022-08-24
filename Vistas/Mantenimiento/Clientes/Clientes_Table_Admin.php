<?php

?>


<head>

  <title>Perfil</title>
  <script type='text/javascript' src="../../js/jquery-1.7.1.min.js"> </script>
  <script type='text/javascript'>
    function cargarcontrolador() {

      $.post("../../../Controlador/ClientesController.php", {
        'opcion': 'consultar'
      }, respuesta);
    }

    function respuesta(arg) {
      $("#datos tbody").append(arg);
    }

    function eliminar(codigo)
    {
      $.post("../../../Controlador/ClientesController.php",
        { 'opcion': 'eliminar', 'id': codigo }, respuesta);

      window.location.href = "Clientes_Table_Admin.php";
    }

    function editar(codigo) {
      document.location.href = "update_a_.php?id=" + codigo;
    }
    window.onload = cargarcontrolador;
  </script>
</head>

  <?php require '../../../includes/dash2.php';?>
    <section class="page-content">

      <h1 class="text-center">Clientes</h1>
      <button type="button" class="btn btn-outline-dark"><a href="new_a.php">Nuevo Cliente</a></button>
      <br />
      <table class="table" id="datos">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Celular</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </section>
</body>

</html>