<?php
 session_start();
 if(isset($_SESSION['username']))
 {
}

   if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
     }else{
         if($_SESSION['rol'] != 1){
             header('location: ../login.php');
         }
     }
require '../../includes/dash.php';
 ?>

<section class="page-content" >
    <div class="grid">
    

        <a href="Articulo_Chart_s.php">
            <p>Ingrese aqui para ver los productos mas vendidos del dia</p>

        </a>

        <a href="">
            <p>Ingrese aqui para ver los productos mas vendidos del dia</p>

        </a>


    </div>
    

</section>



</html>