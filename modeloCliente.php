<?php

include('conectar.php');

class Cliente {
    protected $usuarioCliente;
    protected $idCliente;
    protected $conexion;

    public function __construct($usuario, $id) {
        $this->conexion = Conectar::conexion();
        $this->usuarioCliente = $usuario;
        $this->idCliente = $id;
    }

    public static function getProductos() {
        $conexion = Conectar::conexion();
        $consultaProductos = $conexion->prepare("SELECT * FROM producto");
        $consultaProductos->execute();
        $resultado = $consultaProductos->fetchAll();

        return $resultado;
    }

    public function anadirProducto($idProducto, $idCliente) {
        $consultaCarrito = $this->conexion->prepare("SELECT * FROM carrito WHERE ID_PRODUCTO = $idProducto AND ID_CLIENTE = $idCliente");
        $consultaCarrito->execute();
        if ($consultaCarrito->rowCount() > 0) {
            $consultaSubir = $this->conexion->prepare("UPDATE carrito SET CANTIDAD = (CANTIDAD+1) WHERE ID_PRODUCTO = $idProducto AND ID_CLIENTE = $idCliente")->execute();
        } else {
            $consultaAnadir = $this->conexion->prepare("INSERT INTO carrito (ID_PRODUCTO, ID_CLIENTE, CANTIDAD) VALUES ($idProducto, $idCliente, 1)");
            $consultaAnadir->execute();
        }
    }

    public function consultarCarrito($idUsuario) {
        $consultaProductosCarrito = $this->conexion->prepare("SELECT * FROM carrito LEFT JOIN producto ON carrito.ID_PRODUCTO = producto.ID WHERE carrito.ID_CLIENTE = $idUsuario");
        $consultaProductosCarrito->execute();
        $resultado = $consultaProductosCarrito->fetchAll();

        return $resultado;
    }
}