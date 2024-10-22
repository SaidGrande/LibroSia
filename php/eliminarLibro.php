<?php
    include("./../php/conexion.php");

    // Obtener el ID del libro a eliminar
    $id_libro = $_POST['id'];

    // Primero eliminar los pedidos asociados al libro
    $eliminarPedidos = "DELETE FROM pedido WHERE id_libro_fk = '$id_libro';";
    $quitarPedidos = mysqli_query($conn, $eliminarPedidos);

    // Verificar si se eliminaron los pedidos
    if (!$quitarPedidos) {
        echo "<script type='text/javascript'>alert('Error: No se han quitado los pedidos asociados');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
    } else {
        // Si se eliminan los pedidos, ahora se puede eliminar el libro
        $modificacion = "DELETE FROM libro WHERE id_libro_pk = '$id_libro';";
        $quitarLibro = mysqli_query($conn, $modificacion);

        // Verificar si el libro fue eliminado correctamente
        if (!$quitarLibro) {
            echo "<script type='text/javascript'>alert('Error: No se ha quitado el libro');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
        } else {
            echo "<script type='text/javascript'>alert('El libro se ha eliminado correctamente');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
        }
    }

    // Redireccionar a la página de libros después de completar el proceso
    header('Location: ./../html/libros.php');
?>
