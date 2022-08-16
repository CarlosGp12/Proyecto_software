<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmacia</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>

<body>
    <div class="contenedor">
        <h2>Farmacia</h2>

        <form  action="../Modelo/login.php" method="post" class="form-box animated fadeInUp">
        <?php if (isset($_GET['error'])) { ?>
            <p style="color: orange"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
                <div class="datos">
                <input type="text" required 
                name="username">
                <label> Correo </label>
                </div>

            <div class="datos">
                <input type="password" required
                name="password">
                <label> Contraseña </label>
                
            </div>

            <button name="Login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Iniciar
                </button>
        </form>
    </div>
</body>

</html>