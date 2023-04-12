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

	<link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="main.css">
    <title>Inicio</title>
</head>
<body>
    <header>
            
    <?php
            require_once("modeloAdmin.php");
            $admin = new Administrador();
            $ultimoL = $admin->getLastLogro();
            $infoCalistenico=$admin->getCalistenicoXLogro($ultimoL->ID);
            $ultimaN = $admin->getLastNoticia();     
        ?>

        <div class="logotipo">
                <img id='enlaceindex'src="Imagenes/logofalso.png">
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
        
    
    <div class="contenedorvideo">
            <video src="Imagenes/VIDEO.mp4" autoplay loop muted></video>
     



    </div>
    </header>
  
<main>


    
<!--ULTIMO LOGRO DE UN CALISTENICO-->
<section class="barraheader">



</section>

<div class="welcome">
    <img src="Imagenes/welcome.png" alt="">

</div>


<section class="ultimologro">
    
    <div class="imgbarra">
        <img src="Imagenes/barra.png" alt="">
    </div>
    <div class="row1">
        

        <h1><?php echo $ultimoL->NOMBRE ?> </h1>
        <h2><?php echo $infoCalistenico->NOMBRE ?></h2>
        <h2><?php echo $ultimoL->FECHA ?> </h2>
       
       

    </div>
        
    <div class="row2 logroscolumnas">
    
        <div class="imgcalistenico imgperspectiva">
         
                  <!--<img src='https://images.unsplash.com/photo-1618073194091-9b24230ddb2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80' class="calistenico">-->
              <img src="Imagenes/<?php echo $infoCalistenico->IMG ?>" class="calistenico">
         
        </div>

     </div>

           


</section>

<div class="imgseparador">
    <img src="Imagenes/separador2.png" alt="">
</div>
<!--ULTIMAS NOTICIAS/EVENTOS-->


<section class="ultimasnoticias">


    <div class="row1noticia">
        <h1><?php echo $ultimaN->TITULO ?></h1>
        <h2>¡Échale un vistazo a nuestra ultima noticia!</h2>
        <p id='categoria'><a href="<?php echo $ultimaN->LINK ?>"> Link </a></p>

    </div>

    <div class="row2noticia">
            <div class="imgbandera">
                    <img src="Imagenes/bandera.png" alt="">
                </div>
            <div class="imgperspectiva">
                    
                <img src="Imagenes/<?php echo $ultimaN->IMG?>" class="noticiaimg">
            
            </div>
    </div>

  

</section>

<!--INTRODUCCION A LA TIENDA -->

<div class="imgintrotienda">
   
    <img src="Imagenes/separadortienda.png" alt="">

</div>

<div class="tiendaintroduccion">

<img src="Imagenes/chinchetapng.png" id="chincheta1" alt="">
<img src="Imagenes/chinchetapng.png" id="chincheta2" alt="">
<img src="Imagenes/chinchetapng.png" id="chincheta3" alt="">
<img src="Imagenes/chinchetapng.png" id="chincheta4" alt="">

</div>

</main>
<!--CONTACTOS -->

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


    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" 
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="main.js"></script>
</body>
</html>