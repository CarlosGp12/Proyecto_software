<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login 01</title>
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>

<body>
    <form  action="../Modelo/login.php" method="post" class="form-box animated fadeInUp">
        <h1 class="form-title">Sign-In</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p style="color: white"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="datos">
            <?php if (isset($_GET['usuario'])) { ?>
                    <input type="text" 
                           name="usuario" 
                           class="texto" 
                           placeholder="Usuario" 
                           autofocus 
                           value="<?php echo $_GET['usuario']; 
                           ?>">
                <?php }else{  ?>
                    <input type="text" 
                           name="usuario" 
                           class="texto" 
                           placeholder="Usuario"
                           autofocus>
                <?php }?>


        
                <input type="password" name="password" placeholder="Contraseña" >

        <button  name="Login">Iniciar Sesion</button>
    </form>
</body>

</html>