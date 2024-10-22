<?php
    include("./conexion.php");

    // Obtener los valores enviados por POST
    $id_usu = $_POST['idusu'];
    $id_lib = $_POST['idlib'];

    // Verificar que los valores no estén vacíos
    if (!$id_usu || !$id_lib) {
        echo "<script type='text/javascript'>alert('Error, datos de usuario o libro no recibidos');</script>";
        exit();
    }

    // Obtener datos del libro
    $busquedaLibro = "SELECT * FROM libro WHERE id_libro_pk = '$id_lib';";
    $consultaLibro = mysqli_query($conn, $busquedaLibro);
    $datosLibro = mysqli_fetch_array($consultaLibro);

    // Verificar si el libro fue encontrado
    if (!$datosLibro) {
        echo "<script type='text/javascript'>alert('Error, no se encontró el libro');</script>";
        exit();
    }

    // Obtener los datos del usuario
    $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$id_usu';";
    $consultaUsu = mysqli_query($conn, $busquedaUsu);
    $datosUsu = mysqli_fetch_array($consultaUsu);

    // Verificar si el usuario fue encontrado
    if (!$datosUsu) {
        echo "<script type='text/javascript'>alert('Error, no se encontró el usuario');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/libros.php');</script>";
        exit();
    }

    $importe = $datosLibro['precio_cliente'];
    $permisos = $datosUsu['permisos'];

    // Consulta en las órdenes para comprobar que no se haya creado una orden ya
    $busquedaComprobacion = "SELECT * FROM orden WHERE id_usuario_fk = '$id_usu' AND carrito = true;";
    $consultaComprobacion = mysqli_query($conn, $busquedaComprobacion);
    $datosOrdenComprobacion = mysqli_fetch_array($consultaComprobacion);

    if ($datosOrdenComprobacion) {
        // Si ya existe una orden en el carrito, se inserta el pedido
        $idOrden = $datosOrdenComprobacion['id_orden_pk'];

        $registroPedido = "INSERT INTO pedido(id_orden_fk, id_libro_fk, importe, cantidad)
                           VALUES('$idOrden', '$id_lib', '$importe', 1);";
        $insercionPedido = mysqli_query($conn, $registroPedido);

        if (!$insercionPedido) {
            echo "<script type='text/javascript'>alert('Error, no se han registrado los datos de pedido');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Se han registrado los datos del pedido');</script>";
        }

        header('Location: ./../html/carrito.php');
    } else {
        // Si no existe una orden, se crea una nueva
        $cliente = ($permisos == "cliente") ? true : false;
        $admin = !$cliente;

        $registroOrden = "INSERT INTO orden(id_envio_retiro_fk, id_envio_mensj_fk, id_pago_tarjeta_fk, id_pago_cheque_fk,
                              id_usuario_fk, importe_total, cantidad_total, compra_normal, compra_proveedor, carrito)
                          VALUES(null, null, null, null, '$id_usu', 0, 0, '$cliente', '$admin', true);";
        $insercionOrden = mysqli_query($conn, $registroOrden);

        if (!$insercionOrden) {
            echo "<script type='text/javascript'>alert('Error, no se han registrado los datos de la orden');</script>";
            exit();
        }

        // Buscar la nueva orden creada
        $busquedaOrden = "SELECT * FROM orden WHERE id_usuario_fk = '$id_usu' AND carrito = true;";
        $consultaOrden = mysqli_query($conn, $busquedaOrden);
        $datosOrden = mysqli_fetch_array($consultaOrden);

        if (!$datosOrden) {
            echo "<script type='text/javascript'>alert('Error, no se encontró la orden después de crearla');</script>";
            exit();
        }

        $idOrden = $datosOrden['id_orden_pk'];

        // Insertar el pedido asociado a la nueva orden
        $registroPedido = "INSERT INTO pedido(id_orden_fk, id_libro_fk, importe, cantidad)
                           VALUES('$idOrden', '$id_lib', '$importe', 1);";
        $insercionPedido = mysqli_query($conn, $registroPedido);

        if (!$insercionPedido) {
            echo "<script type='text/javascript'>alert('Error, no se han registrado los datos de pedido');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Se han registrado los datos del pedido');</script>";
        }

        header('Location: ./../html/carrito.php');
    }

?>
