<?php

// session_start();
// if(isset($_SESSION['username']))
// {
// }

//     if(!isset($_SESSION['rol'])){
//         header('location: ../../login.php');
//     }else{
//         if($_SESSION['rol'] != 1){
//             header('location: ../../login.php');
//         }
//     }

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

      window.location.href = "Clientes_Table.php";
    }

    function editar(codigo) {
      document.location.href = "update.php?id=" + codigo;
    }
    window.onload = cargarcontrolador;
  </script>
</head>

  <?php require '../../../includes/dash2.php';?>
    <section class="page-content">

      <h1 class="text-center">Clientes</h1>
      <button type="button" class="btn btn-outline-dark"><a href="new.php">Nuevo Cliente</a></button>
      <br />
      <table class="table" id="datos">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </section>
</body>

</html>