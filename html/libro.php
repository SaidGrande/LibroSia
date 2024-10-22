<?php 
    include("./../php/conexion.php");
    session_start();

    $id = $_POST['id'];

    $busquedaUsuario = "SELECT * FROM libro WHERE id_libro_pk = '$id';";
    $consulta = mysqli_query($conn, $busquedaUsuario);
    $datos = mysqli_fetch_array($consulta);

    $genero = $datos["genero"];
    //$busquedaGenero = "SELECT * FROM libro WHERE genero = '$genero' LIMIT 3";
    $busquedaGenero = "SELECT * FROM libro ORDER BY RAND() LIMIT 3";
    $consulta2 = mysqli_query($conn, $busquedaGenero);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LibroSia</title>
        <link rel="stylesheet" href="./../CSS/style.css">
        <link rel="stylesheet" href="./../CSS/libro.css">
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

            <div id="Contenido">
                <div id="libro_todo">
                    <div id="imagen_libro">
                        <td id="img"><img src = <?php echo $datos['imagen'] ?> ></td>
                    </div>
                    <div id="informacion">
                        <p id="titulo"> <?php echo $datos['titulo'] ?> </p>
                        <p class="info"><b>Autor: </b><?php echo $datos['autor'] ?> </p>
                        <p class="info"><b>Editorial: </b><?php echo $datos['editorial'] ?> </p>
                        <p class="info"><b>Edicion: </b><?php echo $datos['edicion'] ?> </p>
                        <p class="info"><b>Paginas: </b><?php echo $datos['paginas'] ?> </p>
                        <p class="info"><b>Publicacion: </b><?php echo $datos['publicacion'] ?> </p>
                        <p class="info"><b>Genero: </b><?php echo $datos['genero'] ?> </p>
                        <p class="info"><b>Disponibles: </b><?php echo $datos['disponibles'] ?> </p>
                    </div>
                    <div id="pago">
                        <p id="precio">Precio: <?php echo "$ " . $datos['precio_cliente']; ?> </p>
                        <form action="./../php/agregarCarrito.php" method="POST" id="iniciar">
                            <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="idlib" autocomplete="off" class="ocultos">
                            <input  value=<?php echo $_SESSION['id_usuario_pk'] ?> type="text" name="idusu" autocomplete="off" class="ocultos">
                            <button id="agregar_carrito" class="btn_opciones_G">Añadir al Carrito</button>
                        </form>
                        
                    </div>
                    <div id="recomendacion">
                    <h2>Recomendaciones</h2><br>
                        <table>
                            <tbody id="tabla_rec">
                                <?php
                                    while($recomendaciones = mysqli_fetch_array($consulta2)){ ?>
                                        <td> <img src = <?php echo $recomendaciones['imagen'] ?> width="110" height="160"> </td>
                                        <td>
                                            <form action="./libro.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $recomendaciones['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class="ocultos">
                                                <button class="c_btn_rec" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                            </form>
                                        </td>
                                                
                                <?php } ?>
                            </tbody>
                            
                        </table>
        
                    </div>
                </div>>
            </div>

            <footer id="Pie_de_Pagina">
                <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Informacion del Libro</h4>
                
            </footer>

        </div>
        <script type="text/javascript" src="./../scripts/botones_Global.js"></script>

    </body>

</html>