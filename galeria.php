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
    <link rel="stylesheet" href="mainGaleria.css">
    <title>Inicio</title>
</head>
<body>
<header>
     
     <?php
         require_once("modeloAdmin.php");
         $admin = new Administrador();
         $botones = $admin->getBotones('stage');  
         $botones2= $admin->getBotones('eventos');        
     ?>
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
        <img src="Imagenes/galeria.png" alt="">
        <span class="material-symbols-outlined flechadown">
            keyboard_double_arrow_down
            </span>
        
    </div> 

 </header>

<main class="maingaleria"> 

 <div class="contenedorBotones"> 
           
            <button type="button" class="btn btn-warning tituloGaleria" id="mostrar">EQUIPO</button>
            <button type="button" class="btn btn-warning tituloGaleria" id="mostrar1">COMIENZOS</button>
            <button type="button" class="btn btn-warning tituloGaleria" id="mostrarStages">STAGES</button>
            <button type="button" class="btn btn-warning tituloGaleria" id="mostrarEventos">EVENTOS</button>
            <div class="btfecha1  btfecha d-none">
            <?php            
                foreach($botones as $boton){
                    if ($boton->FECHA!="")
                        echo '<button type="button" class="btn btn-dark bg-gradient-dark btnStages" id="'.$boton->FECHA.'">'.$boton->FECHA.'</button>';
                }
                
            ?>        
            </div>   
            <div class="btfecha2 btfecha d-none">
                <?php            
                    foreach($botones2 as $boton){
                        if ($boton->FECHA!="")
                            echo '<button type="button" class="btn btn-dark  bg-gradient-dark btnEventos" id="'.$boton->FECHA.'">'.$boton->FECHA.'</button>';
                    } 
                ?>        
            </div> 
</div>
           
 </div>
    <div class="contenedorgaleria">

            <div class="cartelStages"> 
              
            </div>
            
            <div class="imgStages"> 
              
            </div>
            
            <div class="imagenes d-none">
            <?php
                try{
                    $conexion = new PDO("mysql:host=localhost;dbname=spartans","root","");
                    $conexion->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                    $conexion->exec("SET CHARACTER SET utf8");

                    $sql="SELECT IMG FROM galeria WHERE CATEGORIA='equipo'";
                    $resultado=$conexion->prepare($sql);
                    $resultado->execute(array());

                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){


                        echo'
                              
                        <div class="fotoStages">

                                <img src="Imagenes\\' . $fila["IMG"] . '" class="fotoStage" width="400" heigth="400"><br>
                                                      
                        </div>';
                    }
                }catch(Exception $e){
                    die("Error".$e->getMessage());
                }
            ?>
            </div>
       
            <div class="imagenes1 d-none">
            <?php
                try{
                    $conexion = new PDO("mysql:host=localhost;dbname=spartans","root","");
                    $conexion->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                    $conexion->exec("SET CHARACTER SET utf8");

                    $sql="SELECT IMG FROM galeria WHERE CATEGORIA='comienzo'";
                    $resultado=$conexion->prepare($sql);
                    $resultado->execute(array());

                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){


                        echo'
                              
                        <div class="fotoStages">

                                <img src="Imagenes\\' . $fila["IMG"] . '" class="fotoStage" width="400" heigth="400"><br>
                                                      
                            </div>';
                    }
                }catch(Exception $e){
                    die("Error".$e->getMessage());
                }
            ?>
            </div>
    </div>
</main>

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