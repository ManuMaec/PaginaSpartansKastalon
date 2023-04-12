<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="chosen/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="mainTienda.css">
    <title>Inicio</title>
</head>
<body>
    
<header>
     
     <div class="logotipo">
                 <img id="enlaceindex" src="Imagenes/logofalso.png">
         </div>
         <div class="filaopciones">
                <div class="barraopciones">
                    <nav class="apartados">

                        
                        <h4 id='enlacesobrenosotros'>Sobre nosotros<span class="material-symbols-outlined">expand_more</span></h4>
                        <h4 id='enlacecontenido'>Contenido <span class="material-symbols-outlined">expand_more</span></h4>
                        <h4 id='enlacenoticias'>Noticias</h4>
                        <h4 id='enlacetienda'>Tienda</h4>
                

                    </nav>
                </div>
                <div class="submenu">

               

                        <div class="opcionsubmenu" id="opcionsobrenosotros">
                                <div class="contenidosubmenu">
                                    <p id='enlaceunete'>Unete a nosotros</p>
                                    <p>Logros</p>
                                    <p id='enlacecontacto'>Contactos</p>
                                </div>
                        </div>
                        <div class="opcionsubmenu" id="opcioncontenido">
                        <div class="contenidosubmenu">
                                    <p>Set&reps</p>
                                    <p id='enlacegaleria'>Galeria</p>
                                    <p>Rutinas</p>           
                                </div>
                        </div>
                       

                        


                </div>
        </div>
         
         <div class="categoriatitulo">
        <img src="Imagenes/tienda.png" alt="">
        <span class="material-symbols-outlined flechadown">
            keyboard_double_arrow_down
            </span>
        
        </div> 
    </header>
    <main>
    <div class="logueado">
        <?php
        if (isset($_SESSION['usuarioCliente'])) {
            echo '<p class="saludo" style="color:white;"> Bienvenido ' . $_SESSION['usuarioCliente'] . ' <a href="tiendacarrito.php?cerrar" style="display:inline-block">Cerrar sesión</a></p><div class="listaBotones"><a href="tiendacarrito.php?consultarCarrito">
            <button class="butoninvisible btn-warning p-3 rounded">Tu cesta</button></a><a href="tiendacarrito.php"><button class="butoninvisible btn-warning p-3 rounded">Volver a la tienda</button></a></div>';
        } else {
            echo '<p class="saludo" style="color:white";>Por favor, <a href="tiendacarrito.php?login" style="display:inline-block">inicie sesión</a></p>';
        }
        ?>
        <?php
        require_once('controlador/controladorTienda.php');
        ?>
</main>
</body>



<div id="piedepagina" class="footer">

<div class="columnasfooter">


    <div class="footerow">
        <form action="login.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col">
                                <input type="text" placeholder="Usuario" name="nombre">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="password" placeholder="Contrasena" name="pass">
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit"  class="btn btn-primary" value="Log In" name="enviar">
                        </div>
                    </div>    
                </div>
        </form>
    </div>   



        <div class="footerow"></div>

            <span class="material-symbols-outlined" id="flechaoculta">
            arrow_forward_ios
            </span>
        </div>
        <div class="redessociales">
            <div class="imgredsocial">
                <img src="Imagenes/twitter.png">
            </div>
            <div class="imgredsocial">
                <img src="Imagenes/instagram.png">
            </div>
            <div class="imgredsocial">
                <img src="Imagenes/facebook.png">
            </div>
        </div>

        </div>



    <script src="chosen/chosen.jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" 
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="main.js"></script>
</body>
</html>

        