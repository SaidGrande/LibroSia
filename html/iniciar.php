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
    background-color: #ffffff; /* Cambia este color al que desees */
    color: #000000; /* Color del texto dentro del botón */
    border: none;
    cursor: pointer;
    letter-spacing: 5px;
    padding: 10px 20px; /* Ajusta el tamaño del botón si es necesario */
    border-radius: 5px; /* Añade bordes redondeados si lo deseas */
}

.libros .elemento .btn_inSesion:hover{
    background-color: #fcfcfc; /* Color cuando el botón está en hover */
    color: #000000; /* Cambia el color del texto en hover si es necesario */
    cursor: pointer;
    letter-spacing: 5px; 
}

.libros .elemento .btn_inSesion:hover{
    background-color: #ffffff; /* Azul oscuro cuando se pasa el ratón */
    color: white;
    cursor: pointer;
    letter-spacing: 5px;
}

</style>

<body>
    <div id="Contenedor">
        <header id="Header">

            <a href="./../index.php"><img class="Logo" src="../Imagenes/LibroSia.jpg" alt=""></a>
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
                <button id="Boton_Carrito"><img src="../Imagenes/Icono_Carrito.png"alt=""></button>
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

        <div class="Contenido">
            
            <div class="libros">

                <h2>Iniciar Sesion</h2>
                <form action="./../php/iniciar.php" method="POST" class="forms">

                    <div class="elemento">
                        <label for="usuario">Usuario</label>
                        <input  placeholder="Ingresa el nombre del Usuario" type="text" id="usuario" name="usuario" autocomplete="off" required>
                    </div>

                    <div class="elemento">
                        <label for="pass">Contraseña</label>
                        <input placeholder="Tu contraseña" type="password" id="pass" name="pass" required>
                    </div>
                    
                    <div class="elemento">
                        <button  class="btn_inSesion" class="Formato_Botones" type="submit">Ingresar</button>
                    </div>
                
                </form>
            </div>
        </div>

        <footer id="Pie_de_Pagina">
            <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Hecho por Inges</h4>
            
        </footer>

    </div>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>

</html>