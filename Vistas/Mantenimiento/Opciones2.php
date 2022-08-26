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
?>




<div class="edi">
    <main class="menu">
        <div class="container py-4">



    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>