<?php

$registroCorrecto = array(false, true, true);

if (isset($_POST['registrando'])) {
    $registroCorrecto = Cliente::registrarse($conexion, $_POST['nombre_enviado'], $_POST['email_enviado'], $_POST['contrasena_enviada'], $_POST['comprobacion_enviada']);
    if ($registroCorrecto[0]) {
        echo '<p style="color:white;">Registro exitoso. Por favor, inicie sesión para continuar.</p>';
    } else if ($registroCorrecto[1]) {
        echo '<p style="color:white;">Ese e-mail ya está registrado.</p>';
    } else if ($registroCorrecto[2]) {
        echo '<p style="color:white;">No se pudo completar el registro. Por favor, rellene todos los campos e inténtelo de nuevo.</p>';
    }
}


if (isset($_POST['loguearse'])) {
    $loginCorrecto = Cliente::loguearse($conexion, $_POST['email_enviado'], $_POST['contrasena_enviada']);
    if ($loginCorrecto) {
        header('Location: tiendacarrito.php');
    } else {
        header('Location: tiendacarrito.php?login');
    }
}

if ($registroCorrecto[0]) {
echo

'<div class="container" style="width:30%; margin-top: 1%;">
            <div class="form-group ">
                <form action="" method="POST">
                    <h2 style="color:white; text-align: center; margin-bottom: 3%">Por favor, inicie sesión</h2>
                    <input type="email"
                        class="form-control text-center" name="email_enviado" id="" aria-describedby="helpId" placeholder="E-mail de usuario" required>
                        <input type="text"
                        class="form-control text-center mt-3" name="contrasena_enviada" id="" aria-describedby="helpId" placeholder="Contraseña" required>
                        <div class="col"> <button type="submit" name="loguearse" class="btn btn-primary w-100 bg-warning text-dark mt-3">Iniciar sesion</button>
                </form>
                <p style="text-align:center; color:white; margin-top: 1%">¿No tienes cuenta? <a href="tiendacarrito.php?registrarse" style="color:yellow; display: in-line;">Regístrate</a> </p>
               
             
            </div>
        </div>';
} else {
echo

'<div class="container" style="width:30%; margin-top: 1%;">
            <div class="form-group ">
                <form action="" method="POST">
                    <h2 style="color:white; text-align: center; margin-bottom: 3%">Formulario de registro</h2>
                        <input type="email"
                        class="form-control text-center" name="email_enviado" id="" aria-describedby="helpId" placeholder="E-mail de usuario" required>
                        <input type="password"
                        class="form-control text-center mt-3" name="contrasena_enviada" id="" aria-describedby="helpId" placeholder="Contraseña" required>
                        <input type="password"
                        class="form-control text-center mt-3" name="comprobacion_enviada" id="" aria-describedby="helpId" placeholder="Introduzca la misma contraseña" required>
                        <input type="text"
                        class="form-control text-center" name="nombre_enviado" id="" aria-describedby="helpId" placeholder="Nombre y apellidos" required>
                        <div class="col"> <button type="submit" name="registrando" class="btn btn-primary w-100 bg-warning text-dark mt-3">Registrarse</button>
                </form>
                <p style="text-align:center; color:white; margin-top: 1%">¿Ya tiene una cuenta? <a href="tiendacarrito.php?login" style="color:yellow; display: in-line;">Inicie sesión</a> </p>
               
             
            </div>
        </div>';
}

?>