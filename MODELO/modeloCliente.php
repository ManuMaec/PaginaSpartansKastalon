<?php

class Cliente {
    protected $usuarioCliente;
    protected $idCliente;

    public function __construct($usuario, $id) {       
        $this->usuarioCliente = $usuario;
        $this->idCliente = $id;
    }

    public static function getProductos($conexion) {
        $consultaProductos = $conexion->prepare("SELECT * FROM producto");
        $consultaProductos->execute();
        $resultado = $consultaProductos->fetchAll();

        return $resultado;
    }

    public static function loguearse($conexion, $email, $contrasena) {
        $consultaLogin = $conexion->prepare("SELECT * FROM clientes WHERE emailCliente = :email");
        $consultaLogin->bindValue(':email', $email);
        $consultaLogin->execute();
        $loginexitoso = false;
        if ($consultaLogin->rowCount() > 0) {
            $datosLogin = $consultaLogin->fetch();
            if (password_verify($contrasena, $datosLogin['contrasenaCliente'])) {
                $_SESSION['usuarioCliente'] = $email;
                $_SESSION['idCliente'] = $datosLogin['idCliente'];
                $loginexitoso = true;
            }
        } else {
                $loginexitoso = false;
        }

        return $loginexitoso;
    }

    public static function registrarse($conexion, $nombre, $email, $contrasena, $comprobacionContrasena) {
        $consultaYaRegistrado = $conexion->prepare("SELECT * FROM clientes WHERE emailCliente = :email");
        $consultaYaRegistrado->bindValue(':email', $email);
        $consultaYaRegistrado->execute();
        $resultado = array();
        $yaRegistrado = false;
        if ($consultaYaRegistrado->rowCount() > 0) {
            $registrado = false;
            $yaRegistrado = true;
            $faltanCampos = false;
            array_push($resultado, $registrado, $yaRegistrado, $faltanCampos);
        } else {
            if (($contrasena == $comprobacionContrasena) && !empty($email) && !empty($nombre)) {
                $consultaRegistro = $conexion->prepare("INSERT INTO clientes (emailCliente, contrasenaCliente, nombreCliente) VALUES (:email, :contrasena, :nombre)");
                $consultaRegistro->execute(array(
                    ':email' => $email,
                    ':contrasena' => password_hash($contrasena, PASSWORD_DEFAULT),
                    ':nombre' => $nombre
                ));
                $registrado = true;
                $yaRegistrado = false;
                $faltanCampos = false;
                array_push($resultado, $registrado, $yaRegistrado, $faltanCampos);
            } else {
                $registrado = false;
                $yaRegistrado = false;
                $faltanCampos = true;
                array_push($resultado, $registrado, $yaRegistrado, $faltanCampos);
            }
        }

        return $resultado;
    }

    public function anadirProducto($conexion, $idProducto, $idCliente) {
        $consultaCarrito = $conexion->prepare("SELECT * FROM carrito WHERE ID_PRODUCTO = $idProducto AND ID_CLIENTE = $idCliente");
        $consultaCarrito->execute();
        if ($consultaCarrito->rowCount() > 0) {
            $consultaSubir = $conexion->prepare("UPDATE carrito SET CANTIDAD = (CANTIDAD+1) WHERE ID_PRODUCTO = $idProducto AND ID_CLIENTE = $idCliente")->execute();
        } else {
            $consultaAnadir = $conexion->prepare("INSERT INTO carrito (ID_PRODUCTO, ID_CLIENTE, CANTIDAD) VALUES ($idProducto, $idCliente, 1)");
            $consultaAnadir->execute();
        }
    }

    public function consultarCarrito($conexion, $idUsuario) {
        $consultaProductosCarrito = $conexion->prepare("SELECT * FROM carrito LEFT JOIN producto ON carrito.ID_PRODUCTO = producto.ID WHERE carrito.ID_CLIENTE = $idUsuario");
        $consultaProductosCarrito->execute();
        $resultado = $consultaProductosCarrito->fetchAll();

        return $resultado;
    }

    public function borrarCarrito($conexion, $idProducto) {
        $consultaBorrarCarrito = $conexion->prepare("DELETE FROM carrito WHERE idProductoCliente = :id");
        $consultaBorrarCarrito->bindValue(':id', $idProducto);
        $consultaBorrarCarrito->execute();
    }

    public function modificarCarrito($conexion, $cantidad, $idProducto) {
        $consultaModificarCarrito = $conexion->prepare("UPDATE carrito SET CANTIDAD = :cantidad WHERE idProductoCliente = :id");
        $consultaModificarCarrito->execute(array(
            ':cantidad' => $cantidad,
            ':id' => $idProducto
        ));
    }

    public function confirmarCompra($conexion, $email, $pedido, $direccion, $id) {
        $consultaConfirmar = $conexion->prepare("INSERT INTO pedidos (emailCliente, productos, direccion) VALUES (:email, :productos, :direccion)");
        $consultaConfirmar->execute(array(
            ':email' => $email,
            ':productos' => $pedido,
            ':direccion' => $direccion
        ));
        $consultaBorrarCarrito = $conexion->query("DELETE FROM carrito WHERE ID_CLIENTE = $id ");
    }
}