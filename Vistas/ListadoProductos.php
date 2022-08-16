<?php

  require'../Modelo/database.php';
  $db = new DataBase();
  $con = $db->conectar();
  $sql = $con->prepare("SELECT id, nombre_Produto, stock, precio_Venta FROM producto");
  $sql->execute();
  $resultado = $sql->fetchALL(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin=anonymous">
</head>
<body>
  <!-- lista de productos que se van agregando en la base -->
  <main>
    <div class="container mt-4 mb-4">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($resultado as $row){ ?>
        <div class="col">
          <div class="card" style="width: 20rem;" id="datos">
            <span class="border border-5">
              <p align="center"><img class="imagenP" src="../img/paracetamol.png" width="200" height="200"></p>
            </span>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre_Produto']?></h5>
              <p class="card-text">$<?php echo $row['precio_Venta']?></p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </main>
</body>
</html>