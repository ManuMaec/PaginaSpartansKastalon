<?php

$cliente = new Cliente ($_SESSION['usuarioCliente'], $_SESSION['idCliente']);


    $confirmado = false;

    if (isset($_POST['confirmandoCompra'])) {
        $cliente->confirmarCompra($conexion, $_SESSION['usuarioCliente'], print_r($_SESSION['productosCompra'], true), $_POST['direccion_enviada'], $_SESSION['idCliente']);

        echo '<p style="color:white;">Compra confirmada. Se ha limpiado su carrito.</p>';
        $confirmado = true;
    }

    if (!$confirmado) {

    echo '<h5 style="color:white;">Actualmente no disponemos de un sistema de pagos automatizado. Para confirmar la compra es necesario que introduzcas tu dirección de envío. Pasados unos días, el administrador se pondrá en contacto contigo vía e-mail para darte los detalles del pago y envío.';


    echo '<form action="tiendacarrito.php?comprar" method="POST">';
    echo '<h4 style="display: block;">Por favor, introduce la dirección de envío:</h4><form="tiendacarrito.php?comprar" class="form-group"><input type="text" name="direccion_enviada" class="form-control" placeholder="Dirección de envío">';
    echo '<h5 style="display: block;">El administrador se pondrá en contacto contigo por e-mail para facilitarte los detalles del pago</h5>';

    echo '<input type="submit" value="Enviar compra" name="confirmandoCompra">';

    echo '</form>';

    echo '</div>';

    }



?>