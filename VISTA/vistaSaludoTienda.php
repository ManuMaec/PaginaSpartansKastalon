<?php

require_once ('./modelo/modeloCliente.php');

if (isset($_SESSION['usuarioCliente'])) {
        $cliente = new Cliente($_SESSION["usuarioCliente"], $_SESSION["idCliente"]);
        echo '<h4 style="color:white;">Bienvenid@ a la tienda ' . $_SESSION["usuarioCliente"] . '</h4>';
        echo '<p style="color:white;"><a href="tiendaSpartan.php?cerrar=true">Cerrar sesión</a></p>';
} else {
    echo '<h4 style="color:white;">Por favor, <a href="tiendaSpartan.php?login=true">inicia sesión</a> para comprar</h4>';

}

if (isset($_GET["cerrar"])) {
        session_destroy();
        header('Location: tiendaSpartan.php');
}


?>