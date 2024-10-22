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
                <table id="tabla_busqueda">
                    <tbody>
                        <?php
                            $buscar = $_POST['buscar'];
    
                            $busquedaUsuario = "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' OR autor LIKE '%$buscar%';";
                            $consulta = mysqli_query($conn, $busquedaUsuario);
    
                            while($datos = mysqli_fetch_array($consulta)){ ?>
                                <tr>
                                    <td> <img src = <?php echo $datos['imagen'] ?> width="100" height="154"> </td>
                                    <td> <b><?php echo $datos['titulo'] ?></b> </td>
                                    <td> <?php echo $datos['autor'] ?> </td>
                                    <td> <?php echo "$ " . $datos['precio_cliente']; ?> </td>
                                    <td>
                                        <form action="./libro.php" method="POST" id="iniciar">
                                        <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <button id="btn_lib" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                        </form>
                                    </td>
                                </tr>
    
                        <?php } ?>
                        
                    </tbody>
    
                </table>
    
            </div>
        </div>
    
        <!-- Pie de pagina -->
        <footer id="Pie_de_Pagina">
            <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Seccion de Libros Buscados</h4>
        </footer>

        <script type="text/javascript" src="../scripts/botones_Global.js"></script>
</body>

</html>