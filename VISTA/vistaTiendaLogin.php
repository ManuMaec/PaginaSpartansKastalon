<?php

if (isset($_POST['loguearse'])) {
    $loginCorrecto = Cliente::loguearse($conexion, $_POST['email_enviado'], $_POST['contrasena_enviada']);
    if ($loginCorrecto) {
        header('Location: tiendacarrito.php');
    } else {
        echo "Datos incorrectos. Por favor, compruébelos e inténtelo de nuevo.";
    }
}

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

?>