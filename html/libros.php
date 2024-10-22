<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LibroSia</title>
        <link rel="stylesheet" href="./../CSS/style.css">
        <link rel="stylesheet" href="./../CCS/libros.css">
    </head>

    <style>
        html{
            height: 100%;
        }

        body{
            margin: 0;
            padding: 0;
            background: linear-gradient(#000000, #2b2b2b);
        }


        .libros{
            margin: 50px auto;
            width: 400px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.16);
            border-radius: 25px;
        }

        .libros h2{
            text-align: center;
            color: #ffffff;
            font-family: monospace;
            font-size: 30px;
        }

        .libros .elemento label{

            color: white;
            font-family: monospace;
            font-size: 15px;
        }

        .libros .elemento input{
            width: 100%;
            padding: 10px 0;
            color: white;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            margin-bottom: 30px;
        }

        .libros .elemento .btn_inSesion{

            background-color: #ffffff;
            border: none;
            cursor: pointer;
            letter-spacing: 5px;
        }

        .libros .elemento .btn_inSesion:hover{

            background-color: #ffffff;
            border: none;
            cursor: pointer;
            letter-spacing: 5px; 
        }

        ::placeholder{
            color: #a5c0d2;
        }

    </style>

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
                    <button id="Boton_Carrito"><img src="./../Imagenes/icons8-carrito-de-la-compra-cargado-64.png" alt=""></button>
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
                <div id="Consulta">
                    <table id="tabla_busqueda">
                        <tbody>
                            <?php
    
                                $busquedaLibros = "SELECT * FROM libro;";
                                $consulta = mysqli_query($conn, $busquedaLibros);
    
                                while($datos = mysqli_fetch_array($consulta)){ ?>
                                    <tr>
                                        <td> <img src = <?php echo $datos['imagen'] ?> width="50" height="75"> </td>
                                        <td> <b><?php echo $datos['titulo'] ?></b> </td>
                                        <td> <?php echo $datos['autor'] ?> </td>
                                        <td> <?php echo $datos['editorial'] ?> </td>
                                        <td width="40px"> <?php echo $datos['edicion'] ?> </td>
                                        <td width="120px"> <?php echo $datos['publicacion'] ?> </td>
                                        <td width="120px"> <?php echo $datos['genero'] ?> </td>
                                        <td>
                                            <form action="./../html/libro.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                                <button id="btn_libs" class="Formato_Botones" type="submit">Ver Titulo</button>
                                            </form>
                                            
                                        </td>
                                        <td>
                                            <form action="./../php/eliminarLibro.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                                <button id="btn_libs_red" class="Formato_Botones" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>  
            
            <div class="Contenido">

                <div class="libros">

                    <h2>Registro Libros</h2>

                    <form action="./../php/insertarLibro.php" method="POST"  class="forms">

                        <div class="elemento">    
                            <label>Titulo</label>
                            <input  placeholder="Ingresa el Titulo del libro" type="text" name="titulo" autocomplete="off" required>
                        </div>

                        <div class="elemento">    
                            <label>Autor</label>
                            <input  placeholder="Ingresa el Autor" type="text" name="autor" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">      
                            <label>Editorial</label>
                            <input  placeholder="Ingresa la Editorial" type="text" name="editorial" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Edicion</label>
                            <input  placeholder="Numero de Edicion" type="text" name="edicion" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Paginas</label>
                            <input  placeholder="Numero de paginas" type="text" name="paginas" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Publicacion</label>
                            <input  placeholder="Ejemplo: 2021-01-01" type="text" name="publicacion" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">   
                            <label>Genero</label>
                            <input  placeholder="Ingresa el Genero" type="text" name="genero" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Precio al cliente</label>
                            <input  placeholder="$$$" type="text" name="precioc" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Precio al proveedor</label>
                            <input  placeholder="$$$" type="text" name="preciop" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Disponibles</label>
                            <input  placeholder="Cantidad de libros disponibles" type="text" name="disponibles" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">    
                            <label>Imagen(Enlace)</label>
                            <input  placeholder="./../Recursos/ejemplo_libro.jpg" type="text" name="imagen" autocomplete="off" required>
                        </div>
                        
                        <div class="elemento">
                            <button  class="btn_forms" id="btn_libs_red" class="btn_opciones_G" type="submit">Agregar Libro</button>
                        </div> 
                    </form>
                </div>
    
            </div>

                <!-- Pie de pagina -->
            <footer id="Pie_de_Pagina">
                <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Seccion de libros</h4>
            </footer>

        </div>
        <script type="text/javascript" src="./../scripts/botones.js"></script>
    </body>
</html>