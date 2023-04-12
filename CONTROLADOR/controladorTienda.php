<?php





require_once ('./modelo/conexionTienda.php');
require_once('./modelo/modeloCliente.php');

if (!$_GET || isset($_GET['buscando'])) {
    require_once ('./vista/vistaTienda.php');
} else if ((isset($_GET['anadiendo']) || isset($_GET['consultarCarrito'])) && !isset($_SESSION['usuarioCliente'])) {
    require_once ('./vista/vistaTiendaLogin.php');
} else if (isset($_GET['login'])) {
    require_once ('./vista/vistaTiendaLogin.php');
} else if ((isset($_GET['anadiendo']) || isset($_GET['consultarCarrito'])) && isset($_SESSION['usuarioCliente'])) {
    require_once ('./vista/vistaTiendaCarrito.php');
} else if (isset($_GET['cerrar'])) {
    session_destroy();
    header ('Location: tiendacarrito.php');
} else if (isset($_GET['registrarse'])) {
    require_once ('./vista/vistaRegistrarse.php');
} else if (isset($_GET['comprar'])) {
    require_once ('./vista/vistaComprar.php');
}





















?>