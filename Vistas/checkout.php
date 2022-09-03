<!DOCTYPE html>
<html lang="es">
    <?php

    require '../Modelo/database.php';
    require '../Controlador/config.php';
    $db=new Database();
    $con=$db->conectar();

    $productos=isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos']: null;

    // print_r($_SESSION);

    $lista_carrito = array();

    if($productos != null){ //validar si el producto no esta nulo, entonces traemos el arreglo con el foreach
        foreach($productos as $clave => $cantidad){ //$clave es id del producto y la cantidad que va a tener
            $sql= $con->prepare("SELECT id, nombre_Produto, precio_Venta, $cantidad AS cantidad FROM producto WHERE id=?");
            $sql->execute([$clave]); //arreglo con la clave
            $lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC); //va a traer producto por producto
        }
    }




    // session_start();


    ?>

    <head>

        <meta charset="UTF-8">

        <title>Electronicos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/estilos.css">
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z" />
                        </svg>

                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="checkout.php" class="nav-link text-white">

                                <svg class="bi d-block mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                                Compras <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="Mantenimiento/Opciones.php" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex">
                <div class="me-auto p-2 align-self-center">
                    <h4> Bienvenido
                        <i>
                            <?php echo $_SESSION['username'] ?>
                        </i>
                    </h4>
                </div>
                <div class="text-end align-self-center">
                    <button type="button" class="btn btn-light text-dark me-2">Bienvenido </button>
                    <a href="../Modelo/logout.php?logout"><button type="button" class="btn btn-primary">Log-out</button></a>
                </div>
            </div>
        </div>
    </header>

        <main>
            <div class="container">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if($lista_carrito == null){
    echo '<tr><td colspan="5" class="text-center"><b>Carrito Vacio</b></td></tr>';
}else{
    $total = 0;

    foreach($lista_carrito as $producto){
        $_id = $producto['id'];
        $nombre = $producto['nombre_Produto'];
        $precio= $producto['precio_Venta'];
        $descuento= 0;
        $cantidad = $producto['cantidad'];
        $des_total= $precio - (($precio * $descuento)/100);
        $subtotal = $cantidad * $des_total;
        $total += $subtotal;

                            ?>

                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td>$<?php echo number_format($des_total, 2, '.', ','); ?></td>
                                <td>
                                    <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id;?>)"> 
                                </td>
                                <td>
                                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">$<?php echo number_format($subtotal, 2, '.', ','); ?></div></td>
                                <td>
                                    <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">
                                    <p class="h3" id="total">$<?php echo number_format($total, 2, '.',','); ?></p>

                                </td>
                            </tr>

                        </tbody>
                        <?php } ?>

                    </table>

                </div> 
                <?php if($lista_carrito != null){ //validacion para que aparezca cuando tengamos productos agregados ?> 
                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <a href="pago.php" class="btn btn-primary btn-lg"> Siguiente</a>
                    </div>
                </div>
                <?php } ?>
            </div>


        </main>

        <!-- Modal -->
        <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar el producto de la lista?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id ="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Si, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let eliminaModal = document.getElementById('eliminaModal') //eliminaModal va a tomar el id de elimina Modal
            eliminaModal.addEventListener('show.bs.modal' , function(event){
                let button = event.relatedTarget //trae losd atos del vinculo 
                let id= button.getAttribute('data-bs-id') //obtener el id que se pasa por el boton
                let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina') //buscamos el boton al cual vamos a pasar el id
                buttonElimina.value=id
            })

            function actualizaCantidad(cantidad, id){

                let url='../Modelo/actualizar_carrito.php'
                let formData= new FormData()
                formData.append('id', id)
                formData.append('cantidad', cantidad)
                formData.append('action','agregar')

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode:'cors'
                }).then(response => response.json())
                    .then(data => {
                    if(data.ok){ 
                        let divsubtotal=document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML=data.sub

                        let total= 0.00
                        let list =document.getElementsByName('subtotal[]')

                        for(let i = 0; i<list.length; i++){
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g,''))
                        }
                        total = new Intl.NumberFormat('en-US' ,{
                            minimumFractionDigits: 2
                        }).format(total)

                        document.getElementById('total').innerHTML= '$'+total
                    }

                })
            }


            function eliminar(){
                let botonElimina= document.getElementById('btn-elimina') //traemos el parametro atraves del id
                let id = botonElimina.value //trae el valor dinamico que se esta agregando en el boton del modal 

                let url='../Modelo/actualizar_carrito.php'
                let formData= new FormData()
                formData.append('id', id)
                formData.append('action','eliminar')

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode:'cors'
                }).then(response => response.json())
                    .then(data => {
                    if(data.ok){ 
                        location.reload() //actualiza la ventana
                    }

                })
            }
        </script>
        <br>

        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

</html>