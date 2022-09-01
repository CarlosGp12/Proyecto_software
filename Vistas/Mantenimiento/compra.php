<?php
require '../../Modelo/database.php';
$db = new DataBase();
$con = $db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['codigo'];
    $stock = +intval($_POST['stock']);
    $stock1 = +intval($_POST['stock1']);
    $stockT = intval($stock1 + $stock);
    $query = $con->prepare("UPDATE producto SET stock = $stockT WHERE id = $id");
    $query->execute();
    $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
    header('Location: Articulo/Supervisor_Table_Admin.php');
}
?>
<link rel="stylesheet" href="../css/style.css">
<script type='text/javascript' src="../js/jquery-1.7.1.min.js"> </script>
<script type='text/javascript'>
    $(function() {
        $("#codigo").focusout(function() {
            $.post("../../Controlador/ProductosController.php", {
                'opcion': 'consultaxcodigo',
                'codigo': $("#codigo").val()
            }, respuesta1, 'json');
        });

        $("#guardar").click(function() {
            $.post("../../../Controlador/ProductosController.php",
                $("#datos").serialize(), respuesta2);
            window.location.href = "Articulo/Supervisor_Table_Admin.php";
        });
    });


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function cargardatos() {
        $.post("../../Controlador/ProductosController.php", {
            'opcion': 'consultaxcodigo',
            'codigo': getParameterByName('id')
        }, respuesta1, 'json');
    }

    function respuesta1(arg) {
        $("#codigo").val(arg[0].id);
        $("#nombre_Produto").val(arg[0].nombre_Produto);
        $("#stock").val(arg[0].stock);
        $("#fecha_Fabricacion").val(arg[0].fecha_Fabricacion);
        $("#fecha_Vencimiento").val(arg[0].fecha_Vencimiento);
        $("#precio_Venta").val(arg[0].precio_Venta);
    }

    function respuesta2(arg) {
        alert(arg);
    }
    window.onload = cargardatos;
</script>
<body class="fondo">
   
    <div class="contenedor_formulario">
        <a href="Articulo/Supervisor_Table_Admin.php" class="botones enviar left" >Volver</a>
        <h1 class="titulo">Pedir productos</h1>
        <form id="datos" method="post" action="compra.php">
            <form id="datos"  method="post">
                <input type="text" class="form-control is invalid" id="codigo" name="codigo" placeholder="Código" hidden>

                <div>
                    <label for="">Proveedor</label>
                    <select name="" id="">
                        <option value="">dwad</option>
                    </select>
                </div>
                <div>
                    <label for="nombre_Produto">Articulo</label>
                    <input class="campo" id="nombre_Produto" name="nombre_Produto" type="text">
                </div>
                <div>
                    <label for="stock">stock</label>
                    <input class="campo" id="stock1" name="stock1" type="number">
                    <input type="hidden" id="stock" name="stock"></input>
                </div>
                <button type="submit" class="botones enviar" name="guardar" id="guardar">Enviar</button>
            </form>
    </div>
</body>
</html>