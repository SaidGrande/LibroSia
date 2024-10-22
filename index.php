<?php include("./php/conexion.php") ?>
<?php session_start(); 

    $masVendidos = "SELECT id_libro_fk, SUM( importe ) AS total
                    FROM  pedido
                    GROUP BY id_libro_fk
                    ORDER BY total DESC LIMIT 3;";
    $consulta2 = mysqli_query($conn, $masVendidos);
    
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LibroSia</title>
        <link rel="stylesheet" href="CSS/style.css">

    </head>

    <body>
        <div id="Contenedor">
            <header id="Header">
            <a href="index.php"><img class="Logo" src="Imagenes/LibroSia.jpg" alt=""></a>

            <form action="./html/libros_buscados.php" method="POST" id="iniciar">
                <button class="Boton_Busqueda" type="submit"><img class="Icono" src="Imagenes/Icono_Busqueda.png"alt=""></button>
                <input  class="Input_Busqueda" value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda" class="campo_busqueda_G">
            </form>
                <p id="bienvenido" class="Usuario">Bienveneido 
                    <?php  
                        error_reporting(0); 
                        $nom = $_SESSION['nombre']; 
                        if(!($nom == null || $nom == '')){
                            echo $_SESSION['nombre'];
                        }
                    ?>
                </p>
                <form action="./html/Carrito.php">
                    <button id="Boton_Carrito"><img src="Imagenes/icons8-carrito-de-la-compra-cargado-64.png"alt=""></button>
                </form>
            
            </header>
            <div id="Opciones">
                <form action="./html/iniciar.php">
                    <button id="Boton_Inicio" class="Formato_Boton">Iniciar Sesion</button>
                </form>
                <form action="./html/registro.php">
                    <button id="Boton_Registro" class="Formato_Boton">Registro de un Usuario</button>
                </form>
                <form action="./php/destruir.php">
                    <button id="Boton_Cerrae" class="Formato_Boton">Cerrar Sesion</button>
                </form>
                <form action="./html/ordenes.php">
                    <button id="Boton_Ordenes" class="Formato_Boton">Ordenes</button>
                </form>
                <form action="./html/libros.php">
                    <button id="Boton_Libros" class="Formato_Boton">Libros</button>
                </form>
                
            </div>
            <!-- FIN DE HEADER -->

            <div id="Preventa"><img src="Imagenes/fondo.png" width="100%" alt=""></div>
            <div id="Contenido">

                <h2 style="text-align: center;">Tus Libros</h2>
                <table>
                    <tbody id="tabla_rec">
                        <?php
        
                                while($recomendaciones = mysqli_fetch_array($consulta2)){ 
                                    $idLib = $recomendaciones['id_libro_fk'];
                                    $conLibro = "SELECT * FROM libro WHERE id_libro_pk = '$idLib';";
                                    $consulta3 = mysqli_query($conn, $conLibro);
                                    $topVendidos = mysqli_fetch_array($consulta3)
                                    
                                    ?>
                                    <td width="100px" > <img src=<?php echo "./php/" . $topVendidos['imagen']; ?> width="110"height="160" style="margin-right: 10px;"> </td>
                                    <td width="70px" style="margin-right: 0px;">
                                        <?php echo $topVendidos['titulo'] ?>
                                    </td>
                                    <td width="100px">
                                        <form action="./html/libro.php" method="POST" id="iniciar">
                                        <input value=<?php echo $topVendidos['id_libro_pk'] ?> type="text" name="id"
                                        autocomplete="off" class="ocultos">
                                        <button class="c_btn_rec" class="btn_opciones_G" type="submit">Ver Titulo</button>
                            </form>
                        </td>

                        <?php } ?>
                    </tbody>

                </table>
            </div>

           

        </div>

        <div class="Fondo">
            <div class="Fondo_degradado">
              <div class="Info">
                    <div class="Descripcion">
                        <h3>Caso de estudio #1 Act.-18</h3>
                        <h2>cout << "Los mas inges ++" << endl; </h2>
                        <p> Clio Vanessa Guzman Ruiz <br>
                            Said Omar Hernandez Grande <br>
                        </p>
                    </div>
                </div>       
            </div>
               
        </div>   


        <script type="text/javascript" src="./scripts/botones.js"></script>


    </body>

</html>