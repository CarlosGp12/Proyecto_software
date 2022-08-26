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





</body>

</html>