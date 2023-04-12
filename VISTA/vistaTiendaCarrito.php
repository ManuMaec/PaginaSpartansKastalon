<?php

$cliente = new Cliente ($_SESSION['usuarioCliente'], $_SESSION['idCliente']);

if (isset($_GET['anadiendo'])) {
    $cliente->anadirProducto($conexion, $_GET['idAnadir_enviado'], $_SESSION['idCliente']);
    header('Location: tiendacarrito.php?consultarCarrito');
}

if (isset($_POST['borrando'])) {
    $cliente->borrarCarrito($conexion, $_POST['idModificar_enviado']);
    echo '<p style="color:white">Producto eliminado con éxito</p>';
}

if (isset($_POST['modificandoCantidad'])) {
    $cliente->modificarCarrito($conexion, $_POST['cantidad_enviada'], $_POST['idModificar_enviado']);
}

$carrito = $cliente->consultarCarrito($conexion, $_SESSION['idCliente']);

$precioTotal = 0;
$arrayProductos = array();

if (count($carrito) < 1) {
    echo '<p style="color:white" text-align="center">No has añadido ningún producto al carrito </p>';
} else {


    foreach ($carrito as $productoCarrito) {
        echo '
        <div class="productocarro">
            <div class="imgcarrito">
                <img width="200" height="100%" src="imagenes/' . $productoCarrito['IMG'] . '">
            </div>
            <h3>' . $productoCarrito['NOMBRE'] . '</h3>
            <h3>' . $productoCarrito['PRECIO'] . '</h3>
            <h3><form method="POST" action="tiendacarrito.php?consultarCarrito"><select name="cantidad_enviada">';
            for ($i = 1; $i < 10; $i++) {
                if ($productoCarrito['CANTIDAD'] == $i) {
                    echo    
                    '<option value='.$productoCarrito['CANTIDAD'].' selected>' . $i . '</option>';
                } else {
                    echo
                    '<option value='.$i.'>'.$i.'</option>';
                }
            }
            echo '</select><input type="hidden" value='.$productoCarrito['idProductoCliente'].' name="idModificar_enviado"><input type="submit" value="Modificar" name="modificandoCantidad"><input class="borrarinput" type="submit" value="Borrar" name="borrando"></form></h3>
        </div>
    </div>';

        $precioTotal += $productoCarrito['PRECIO']*$productoCarrito['CANTIDAD'];
        $arrayProductos[$productoCarrito['NOMBRE']] = $productoCarrito['CANTIDAD'];
    }

    $_SESSION["productosCompra"] = $arrayProductos;

    echo '<div class="listaBotones">';
    echo '<p style="color:white">Precio total: ' . $precioTotal .'</p>';
    echo '<a href="tiendacarrito.php?comprar"><button class="bt btn-block btn-warning p-3 rounded">Comprar</button></a>';
    echo '</div>';

}