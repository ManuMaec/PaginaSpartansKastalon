<?php
if (isset($_POST["loguearse"])) {
    include ('./modelo/modeloLoginUsuario.php');
    Login::loguearse($_POST["email_enviado"], $_POST["clave_enviada"]);
}

if (!isset($_SESSION["usuarioCliente"]) && (isset($_POST["anadiendo"]))) {
    echo
    '<div class="contenedornegro"></div>

    <div class="ventanacarrito d-none">
        <div class="columnalista">

        </div>
        <div class="columnadatoscompra">

        </div>
   

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="cerraremergente" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    </div>' .
    '<div class="ventanainiciar">
    <div class="login w-100">

        <div class="container">
            <div class="form-group ">
                <form action="" method="POST">
                    <h2 style="color:white;">Por favor, inicie sesión</h2>
                    <input type="text"
                        class="form-control text-center" name="email_enviado" id="" aria-describedby="helpId" placeholder="E-mail de usuario" required>
                        <input type="text"
                        class="form-control text-center mt-3" name="clave_enviada" id="" aria-describedby="helpId" placeholder="Contraseña" required>
                        <div class="col"> <button type="submit" name="loguearse" class="btn btn-primary w-100 bg-warning text-dark mt-3">Iniciar sesion</button>
                </form>
               
             
            </div>
        </div>

    </div>

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="cerraremergentelogin" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
</div>';

}