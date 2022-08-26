<?php
session_start();
if (isset($_SESSION['username'])) {
}

if (!isset($_SESSION['rol'])) {
  header('location: ../login.php');
} else {
  if ($_SESSION['rol'] != 2) {
    header('location: ../login.php');
  }
}
require '../../includes/dash.php';
require_once("../../Modelo/Factura.php");

$objregistro = new Factura;
$datos = $objregistro->ObtenerTodos();

foreach ($datos as $fila) {

  $nombre[] = $fila['nombre_Producto'];
  $cantidad[] = $fila['cantidad'];
}

?>

<section class="page-content">
  <main class="menu">
    <div class="container py-4">

      <div class="grafBarra">
        <canvas id="myChart"></canvas>
        
        
      </div>

  </main>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>



<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($nombre) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Productos mas vendidos al final del dia',
      data: <?php echo json_encode($cantidad) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</html>