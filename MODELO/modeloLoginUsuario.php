<?php

require_once('conectar.php');

Class Login {
    protected $usuario;
    protected $id;

    public static function loguearse($usuario, $clave) {
        if (!isset($conexion)) {
            $conexion = Conectar::conexion();
        }
        $nombreUsuario;
        $idUsuario;

        $consultaLogin = $conexion->prepare("SELECT * FROM cliente WHERE user = :usuario AND pass = :clave");
        $consultaLogin->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
        if ($consultaLogin->rowCount() > 0) {
            session_start();
            $resultado = $consultaLogin->fetch();
            $nombreUsuario = $resultado['user'];
            $idUsuario = $resultado['ID'];
            $_SESSION['usuarioCliente'] = $nombreUsuario;
            $_SESSION['idCliente'] = $idUsuario;
            header('location: ./tiendaSpartan.php');
        } else {
            echo "Datos incorrectos";
        }
    }
}