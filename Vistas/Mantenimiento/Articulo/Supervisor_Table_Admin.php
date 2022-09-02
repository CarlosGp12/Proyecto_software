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

  function eliminar(codigo) {
    $.post("../../../Controlador/ProductosController.php", {
      'opcion': 'eliminar',
      'id': codigo
    }, respuesta);

    window.location.href = "Supervisor_Table_Admin.php";
  }

  function editar(codigo) {
    document.location.href = "update_a.php?id=" + codigo;
  }

  function comprar(codigo) {
    document.location.href = "../compra.php?id=" + codigo;
  }
  window.onload = cargarcontrolador;
</script>
</head>

<?php require '../../../includes/dash2.php'; ?>
<section class="page-content">


  <h1 class="text-center">Productos</h1>
  <button type="button" class="botones"><a href="new_a.php">Nuevo Producto</a></button>
  <br />
  <table class="table" id="datos">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Stock</th>
        <th scope="col">Fecha de fabricacion</th>
        <th scope="col">Fecha de vencimiento</th>
        <th scope="col">Precio</th>
        <th scope="col">Compra</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type='text/javascript' src="../../js/dashboard.js"> </script>
</body>

</html>