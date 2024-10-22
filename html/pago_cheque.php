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
    <link rel="stylesheet" href="../CSS/pago_cheque.css">


</head>
<style>
    ::placeholder{
        color: #caf0f8;
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
                <h2>Pago con Cheque</h2>

                <form action="./../php/pago.php" method="POST" class="forms">
                    
                    <div class="elemento">    
                        <label>Solicitante</label>
                        <input placeholder="Ingresa el Nombre" type="text" name="solicitante" autocomplete="off" required>
                    </div>
                   
                    <div class="elemento">    
                        <label>No. Cheque</label>
                        <input placeholder="Ingresa el No. de Cheque" type="text" name="cheque" autocomplete="off" required>
                    </div>

                    <div class="elemento">    
                        <label>Fecha Emision</label>
                        <input placeholder="Ejemplo: 2021-01-01" type="text" name="emi" autocomplete="off" required>
                    </div>
                    
                    <div class="elemento">    
                        <label>Fecha Pago</label>
                        <input placeholder="Ejemplo: 2021-01-01" type="text" name="pag" autocomplete="off" required>
                    </div>
                    
                    <div class="elemento">    
                        <label>Tipo de envio</label>
                        <select name="envio">
                            <option value="Mensajeria">Paqueteria</option>
                            <option value="Retiro">Sucursal</option>
                        </select>
                    </div>
                    
    
                    <?php $idOrd = $_POST['idOrd']; ?>
                    <input value=<?php echo $idOrd; ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">

                    <div class="elemento">    
                        <button  class="btn_forms" class="btn_inSesion" class="btn_opciones_G" type="submit">Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    
        <!-- Pie de pagina -->
        <footer id="Pie_de_Pagina">
            <h2 style="text-align:center;">LibroSia</h2><br><h4 style="text-align:center;">Apartado de pago con cheque</h4>
        </footer>

        <script type="text/javascript" src="../scripts/botones_Global.js"></script>

    </div>   

</body>

</html>