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

            <div class="libros">
                <h2>Registro de Usuario</h2>

                <form action="./../php/registro.php" method="POST" class="forms">
                    
                    <div class="elemento">
                        <label for="nombre">Nombre</label>
                        <input placeholder="Ingresa tu nombre, por favor" type="text" id="nombre" name="nombre" autocomplete="off" required>
                    </div>

                    <div class="elemento">
                        <label for="usuario">Usuario</label>
                        <input placeholder="Creacion del Usuario" type="text" name="usuario" autocomplete="off" required>
                    </div>
                    
                    <div class="elemento">
                        <label for="telefono">Telefono</label>
                        <input placeholder="Ingresa un Telefono" type="text" id="telefono" name="telefono" autocomplete="off">
                    </div>
                    
                    <div class="elemento">
                        <label for="correo">Correo</label>
                        <input placeholder="ej. usuario@dominio.com" type="email" id="correo" name="correo" autocomplete="off" required>
                    </div>

                    <div class="elemento">
                        <label for="domicilio">Domicilio</label>
                        <input placeholder="Ingresa un domicilio" type="text" id="domicilio" name="domicilio" autocomplete="off" required>
                    </div>
                    
                    <div class="elemento">
                        <label for="cp">Código Postal</label>
                        <input placeholder="Codigo Postal" type="text" id="cp" name="cp" autocomplete="off" required>
                    </div>
                    
                    <div class="elemento">
                        <label for="pass">Contraseña</label>
                        <input placeholder="Crea tu contraseña" type="password" id="pass" name="pass" required>
                    </div>
                    
                    <div class="elemento">
                        <button class="btn_forms" class="btn_inSesion" class="btn_opciones_G" type="submit">Registrarme</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pie de pagina -->
        <footer id="Pie_de_Pagina">
            <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Ay mama, INCOMODO</h4>
        </footer>

    </div>

        <script type="text/javascript" src="../scripts/botones_Global.js"></script>
</body>

</html>