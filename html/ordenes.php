<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibroSia</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/libros_buscados.css">
    <link rel="stylesheet" href="../CSS/ordenes.css">


</head>

<body>
    <div id="Contenedor">
        <header id="Header">

            <a href="./../index.php"><img class="Logo" src="./../Imagenes/LibroSia.jpg" alt=""></a>
            <form action="./../html/libros_buscados.php" method="POST" id="iniciar">
                <button class="Boton_Busqueda" type="submit"><img class="Icono" src="Imagenes/Icono_Busqueda.png"alt=""></button>
                <input  class="Input_Busqueda" value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda" class="campo_busqueda_G">
            </form>

            <p id="bienvenido" class="Usuario">Bienvenido
                <?php  
                        error_reporting(0); 
                        $nom = $_SESSION['nombre']; 
                        if(!($nom == null || $nom == '')){
                            echo $_SESSION['nombre'];
                        }
                    ?>
            </p>
            <form action="./../html/Carrito.php">
                <button id="Boton_Carrito"><img src="./../Imagenes/icons8-carrito-de-la-compra-cargado-64.png"
                        alt=""></button>
            </form>
        </header>
        <div id="Opciones">
            <form action="./../html/iniciar.php">
                <button id="Boton_Inicio" class="Formato_Boton">Iniciar Sesion</button>
            </form>
            <form action="./../html/registro.php">
                <button id="Boton_Registro" class="Formato_Boton">Registro de Usuario</button>
            </form>
            <form action="./../php/destruir.php">
                <button id="Boton_Cerrae" class="Formato_Boton">Cerrar Sesion</button>
            </form>
            <form action="./../html/ordenes.php">
                <button id="Boton_Ordenes" class="Formato_Boton">Ordenes</button>
            </form>
            <form action="./../html/libros.php">
                <button id="Boton_Libros" class="Formato_Boton">Libros</button>
            </form>       
        </div>
        <!-- FIN DE HEADER -->

        <!-- DE AQUI SE ELIMINA -->

        <div id="contenido">
            <div id="libros">
                <div id="ordenes">
                    <table id="tabla_busqueda">
                        <theader>
                            <th>_</th>
                            <th>Orden </th>
                            <th>Nombre </th>
                            <th>Precio </th>
                            <th>Cantidad </th>                           
                            <th>Sucursal </th>
                            <th>Paqueteria </th>
                            <th>Tarjeta </th>
                            <th>Cheque </th>
                        </theader>
                        <tbody>
                            <?php
    
                                $busquedaOrdenes = "SELECT * FROM orden;";
                                $consulta = mysqli_query($conn, $busquedaOrdenes);
    
                                while($datos = mysqli_fetch_array($consulta)){ 
    
                                    $usu = $datos['id_usuario_fk'];
                                    $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$usu';";
                                    $consultaUsu= mysqli_query($conn, $busquedaUsu);
                                    $datosUsu = mysqli_fetch_array($consultaUsu);
    
                                    $usu = $datos['id_usuario_fk'];
                                    $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$usu';";
                                    $consultaUsu= mysqli_query($conn, $busquedaUsu);
                                    $datosUsu = mysqli_fetch_array($consultaUsu);
                                    
                                    
                                    ?>
        
                                    <tr>
                                        <td width="40px">
                                            <form action="./ordenes.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $datos['id_orden_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                                <button id="btn_lib_ord" class="btn_opciones_G" type="submit">Desglose</button>
                                            </form>
                                        </td>
    
                                        <td width="40px"> <?php echo $datos['id_orden_pk'] ?>  </td>
                                        <td width="120px"> <?php echo $datosUsu['nombre'] ?>  </td>
                                        <td width="80px"> <?php echo $datos['importe_total'] ?>  </td>
                                        <td width="40px"> <?php echo $datos['cantidad_total'] ?>  </td>
                                        <td width="40px"> <?php echo $datos['id_envio_retiro_fk'] ?>  </td>
                                        <td width="40px"> <?php echo $datos['id_envio_mensj_fk'] ?>  </td>
                                        <td width="40px"> <?php echo $datos['id_pago_tarjeta_fk'] ?>  </td>
                                        <td width="40px"> <?php echo $datos['id_pago_cheque_fk'] ?>  </td>
    
                                    </tr>
    
                            <?php } ?>
                            
                        </tbody>
    
                    </table>
                </div>

                <div id="pedidos">
    
                    <table id="tabla_busqueda">
                        <theader>
                            
                        </theader>
                        <tbody>
                            <?php
    
                                $orden = $_POST['id'];
    
                                $busquedaPedidos = "SELECT * FROM pedido WHERE id_orden_fk = '$orden';";
                                $consulta = mysqli_query($conn, $busquedaPedidos);
    
                                while($datos = mysqli_fetch_array($consulta)){ 
                                $libro = $datos['id_libro_fk'];
                                $busquedaLibro = "SELECT * FROM libro WHERE id_libro_pk = '$libro';";
                                $consultaLibro = mysqli_query($conn, $busquedaLibro);
                                $datosLibro = mysqli_fetch_array($consultaLibro);
    
                                ?>
                                    <tr>
                                        <td width="40px"> <?php echo $datos['id_pedido_pk'] ?> </td>
                                        <td width="80px"> <?php echo $datos['importe'] ?> </td>
                                        <td width="80px"> <?php echo $datosLibro['titulo'] ?> </td>
                                        <td width="80px"> <img src = <?php echo $datosLibro['imagen'] ?> width="35" height="50"> </td>
    
                                    </tr>
    
                            <?php } ?>
                            
                        </tbody>
    
                    </table>
    
                </div>
            </div>
        </div>
    
        <!-- Pie de pagina -->
        <footer id="Pie_de_Pagina">
            <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Seccion de Ordenes</h4>
        </footer>
        <script type="text/javascript" src="../scripts/botones_Global.js"></script>
</body>

</html>