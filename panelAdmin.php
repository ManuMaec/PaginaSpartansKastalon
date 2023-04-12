<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="panelAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       
    <title>Panel de Control</title>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location: index.php");
        }
        require("modeloAdmin.php");
        $a = new Administrador ();
        $admin = new Administrador();
        $productos = $admin->getProductos();
        $noticias = $admin->getNoticias();
        $miembros = $admin->getCalistenicos();
        $fotos = $admin->getFotos();

        // CRUD FOTOS
        if (isset($_POST["eliminarF"]))
        {
            @$buscar = $_POST["Eid"];
            $admin->eliminarFoto($buscar); 
            header("location:panelAdmin.php");
        }

        if(isset($_POST["registrarF"]))
        {
            $cat=$_POST['Icategoria'];
            $fecha=$_POST['Ifecha'];
            $formato=$_POST['Iformato'];

            $imagen = $_FILES["Ifoto"]["name"]; 
            $img_temp = $_FILES["Ifoto"]["tmp_name"];

            $admin->nuevoFoto($cat,$formato,$fecha,$imagen);
            $admin->addFoto($imagen, $img_temp);
            header("location:panelAdmin.php");
        }

        if(isset($_POST["editarF"]))
        {
            $id = $_POST["Eid"];
            $cat=$_POST['Icategoria'];
            $fecha=$_POST['Ifecha'];
            $formato=$_POST['Iformato'];

            if ($_FILES["Ifoto"]["name"]!=''){
                $imagen = $_FILES["Ifoto"]["name"]; 
                $img_temp = $_FILES["Ifoto"]["tmp_name"];
                $admin->addFoto($imagen, $img_temp);
            }
            else
                $imagen = $_POST['Ifoto2'];

            $admin->modificarFoto($id,$cat,$imagen,$formato,$fecha);
            header("location:panelAdmin.php");
        
        }

        // CRUD NOTICIAS 
        if (isset($_POST["registrarN"])){    
            
            $tituloNoticia = $_POST["Atitulo"];
            $contenidoNoticia = $_POST["Acontenido"];
            $fechaNoticia = $_POST["Afecha"];
            $linkNoticia = $_POST["Alink"];
            $categoriaNoticia = $_POST["Acategoria"];

            $imagen = $_FILES["Aimagen"]["name"]; 
            $img_temp = $_FILES["Aimagen"]["tmp_name"];

            $admin->nuevoNoticia($tituloNoticia, $contenidoNoticia,$fechaNoticia,$linkNoticia,$imagen,$categoriaNoticia);
            $admin->addFoto($imagen, $img_temp);

            header("location:panelAdmin.php");
        }

        if (isset($_POST["eliminarN"]))
        {
            @$buscar = $_POST["Eid"];
            $a->eliminarNoticia($buscar); 
            header("location:panelAdmin.php");
        }

        if (isset($_POST["editarN"]))
        {
            $Eid = $_POST["EID"]; 
            $Etitulo = $_POST["Etitulo"];
            $Econtenido = $_POST["Econtenido"];
            $Efecha = $_POST["Efecha"];
            $Elink = $_POST["Elink"];
            $Ecategoria = $_POST["Ecategoria"];

            if ($_FILES["Eimagen"]["name"]!=''){
                $imagen = $_FILES["Eimagen"]["name"]; 
                $img_temp = $_FILES["Eimagen"]["tmp_name"];
                $admin->addFoto($imagen,$img_temp);
            }
            else
                $imagen = $_POST['Eimagen2'];
            
            $admin->modificarNoticia($Eid, $Etitulo, $Econtenido, $Efecha, $Elink, $imagen, $Ecategoria);
            header("location:panelAdmin.php");
        } 

        // CRUD PRODUCTOS
        if (isset($_POST["registrarP"])){
            $imagen = $_FILES["Aimagen"]["name"]; 
            $img_temp = $_FILES["Aimagen"]["tmp_name"];

            $admin->addFoto($imagen, $img_temp);

            $nombre = $_POST["Anombre"];
            $descripcion = $_POST["Adescripcion"];
            $talla = $_POST["Atalla"];
            $precio = $_POST["Aprecio"];
            $stock = $_POST["Astock"];
            $categoria = $_POST["Acategoria"];

            $a->nuevoProducto($nombre, $descripcion, $precio, $stock, $categoria, $talla, $imagen);
            header("location:panelAdmin.php");
        }

        if (isset($_POST["eliminarP"]))
        {
            @$buscar = $_POST["IdProd"];
            $a->eliminarProducto($buscar);
            header("location:panelAdmin.php");
        }

        if (isset($_POST["editarP"]))
        {     
            $Eid = $_POST["EID"]; 
            $Enombre = $_POST["Enombre"];
            $Edescripcion = $_POST["Edescripcion"];
            $Etalla = $_POST["Etalla"];
            $Eprecio = $_POST["Eprecio"];
            $Estock = $_POST["Estock"];
            $Ecategoria = $_POST["Ecategoria"];
            
            if ($_FILES["Eimagen"]["name"]!=''){
                $imagen = $_FILES["Eimagen"]["name"]; 
                $img_temp = $_FILES["Eimagen"]["tmp_name"];
                $admin->addFoto($imagen,$img_temp);
            }
            else
                $imagen = $_POST['Eimagen2'];

            var_dump($imagen);
            $admin->modificarProducto($Eid,$Enombre,$Edescripcion,$Etalla,$Eprecio,$Estock,$Ecategoria,$imagen);
            header("location:panelAdmin.php");
        }

        //CRUD CALISTENICO 

        if (isset($_POST["registrarC"])){

            $nombre = $_POST["Anombre"];
            $edad = $_POST["Aedad"];
            $peso = $_POST["Apeso"];
            $altura = $_POST["Aaltura"];

            $imagen = $_FILES["Aimagen"]["name"]; 
            $img_temp = $_FILES["Aimagen"]["tmp_name"];

            $a->nuevoCalistenico($nombre, $edad, $peso, $altura, $imagen);
            $admin->addFoto($imagen, $img_temp);

            header("location:panelAdmin.php");

        }

        if (isset($_POST["eliminarC"]))
        {

            @$buscar = $_POST["Eid"];
            $a->eliminarCalistenico($buscar);
            header("location:panelAdmin.php");
        }

        // BLOQUE EDITAR CALISTENICO

        if (isset($_POST["eliminarC"]))
        {
            $idCalistenico= htmlentities(addslashes($_POST['Eid']));
            $admin->eliminarCalistenico($idCalistenico);
            header("location:panelAdmin.php");
        }


        if(isset($_POST['editarCalistenico'])){ 
            $idCalistenico = htmlentities(addslashes($_POST['idC']));        
            $nombreC= htmlentities(addslashes($_POST['nombreC']));
            $edadC=htmlentities(addslashes($_POST['edadC']));
            $pesoC=htmlentities(addslashes($_POST['pesoC']));
            $alturaC=htmlentities(addslashes($_POST['alturaC']));

            if ($_FILES["imgC"]["name"]!=''){
                $imagen = $_FILES["imgC"]["name"]; 
                $img_temp = $_FILES["imgC"]["tmp_name"];
                $admin->addFoto($imagen,$img_temp);
            }
            else
                $imagen = $_POST['imgC2'];

            $admin->modificarCalistenico($idCalistenico,$nombreC,$edadC,$pesoC,$alturaC,$imagen);
            header("location:panelAdmin.php");
        }

        if(isset($_POST['editarLogro'])){
            $idL=htmlentities(addslashes($_POST['idLogro']));
            $nombreL=htmlentities(addslashes($_POST['nombreL']));
            $fechaL=htmlentities(addslashes($_POST['fechaL']));
            $categoriaL=htmlentities(addslashes($_POST['categoriaL']));

            $admin->modificarLogro($idL,$nombreL,$fechaL,$categoriaL);
            header("location:panelAdmin.php");
        }

        if(isset($_POST['nuevoLogro'])){
            $idCalistenico = htmlentities(addslashes($_POST['idC']));        
            $nombreL=htmlentities(addslashes($_POST['nNombreL']));
            $fechaL=htmlentities(addslashes($_POST['nFechaL']));
            $categoriaL=htmlentities(addslashes($_POST['nCategoriaL']));

            $admin->nuevoLogro($idCalistenico,$nombreL,$fechaL,$categoriaL);
            header("location:panelAdmin.php");
        }

        if(isset($_POST['eliminarLogro'])){
            $idL=htmlentities(addslashes($_POST['idLogro']));
            $admin->eliminarLogro($idL);
            header("location:panelAdmin.php");
        }

        if(isset($_POST['nuevoCategoriaC'])){
            $idCalistenico = htmlentities(addslashes($_POST['idC']));        
            $idC=htmlentities(addslashes($_POST['nCategoriaC']));
            $admin->nuevoCategoria($idCalistenico,$idC);
            header("location:panelAdmin.php");

        }

        if(isset($_POST['eliminarCategoria'])){
            $idC=htmlentities(addslashes($_POST['categoriaC']));
            $admin->eliminarCategoriaCalistenico($idC);
            header("location:panelAdmin.php");
        }
        ?>
</head>
<body>
    <div class="container-fluid">
        
    <div class="row">
    <div class="col-md-2 navigation-menu">
            <div class="navigation">
                <ul>
                    <li><img src="Imagenes\logofalso.png" height="100px" id="logof"></li>
                    <li><span id="mMiembros"> Miembros Kastalon </span></li> 
                    <li><span id="mNotis"> Noticias </span></li> 
                    <li><span id="mGaleria"> Galería </span></li> 
                    <li><span id="mProductos"> Productos </span></li> 
                </ul>
            </div>
        </div>
        <div class="col-md-12" id="head">
            <span id="volver">Panel de Control</span>
            <div class="salir">
                <a class="btn btn-warning" href="index.php">Salir</a>
            </div>
        </div>
    </div>

            
    
    
    <!---FIN HEADER INICIO CONTENIDO -->

    <div class="row">
    
    <!--- COLUMNA NAVEGACION --->    
        <div class="col-md-2 navigation-menu">

        </div>
            
    <!--- COLUMNA CONTENIDO --->

        <div class="col-md-10">

 <!--- REGISTRAR MIEMBRO  --->
 <div class="row principalMiembros">
        <div class="col-md-3 mt-5 mostrar">
            <h3> NUEVO MIEMBRO </h3>
            <table class="mb-3">
                <form method="POST" name="registrar" enctype="multipart/form-data">
                        <tr>
                            <td> <label for="Anombre"> Nombre:</label></td>
                            <td> <input type="text" name="Anombre" class="form-control"  required></td>
                        </tr>
                        <tr>
                            <td> <label for="Aedad"> Edad:</label></td>
                            <td> <input type="number" name="Aedad" class="form-control"  min="0" required></td>
                        </tr>
                        <tr>
                            <td> <label for="Apeso">Peso: </label></td>
                            <td> <input type="number" name="Apeso" class="form-control" min=0 step="0.01" required></td>
                        </tr>
                    
                        <tr>
                            <td> <label for="Aaltura">Altura: </label></td>
                            <td> <input type="number" name="Aaltura" class="form-control" min=0 step="0.01" required></td>
                        </tr>
                        <tr>
                            <td> <label for="Aimagen">Imagen: </label></td>
                            <td> <input type="file" name="Aimagen" class="form-control" accept="image/*" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;"><input type="submit" id="registrar" class="btn btn-primary" name="registrarC" value="Registrar"></td>
                        </tr>
                </form>
            </table>
        </div>
        <!--- FIN REGISTRAR MIEMBRO --->

        <!--- EDITAR MIEMBRO  --->

        <!--- EDITAR INFORMACION ---->

    <?php
     if (isset($_POST["buscarC"]))
     {
          $idCalistenico = $_POST["Eid"];
          $infoC = $admin->getCalistenico($idCalistenico);
          $infoL =$admin->getLogrosCalistenico($idCalistenico);
          $infoCat = $admin->getCategorias();
          $infoCC = $admin->getCategoriasCalistenico($idCalistenico);

            echo '<div class="col-md-7 w-75 mt-5 editar">
                    <div id="perfilCalistenico">
                    <form method="POST" enctype="multipart/form-data">
                        <h3> EDITAR MIEMBRO </h3>
                        <table id="datosGenerales">
                            <tr>
                                <input type="hidden" name="idC" value="'.$idCalistenico.'">
                                <td colspan="2"><img src="Imagenes\\'.$infoC->IMG.'" width="250"></td>
                            </tr>
                            <tr>
                                <td><label for="nombre">Nombre: </label></td>
                                <td><input type="text" class="form-control" name="nombreC" value="'.$infoC->NOMBRE.'"></td>
                            </tr>
                            <tr>
                                <td><label for="nombre">Edad: </label></td>
                                <td><input type="number" class="form-control" name="edadC" value="'.$infoC->EDAD.'" min="0"></td>
                            </tr>
                            <tr>
                                <td><label for="nombre">Peso: </label></td>
                                <td><input type="number" class="form-control" min=0 step="0.01" name="pesoC" value="'.$infoC->PESO.'"></td>
                                <td> kg</td>
                            </tr>
                            <tr>
                                <td><label for="nombre">Altura: </label></td>
                                <td><input type="number" class="form-control" min=0 step="0.01" name="alturaC" value="'.$infoC->ALTURA.'"></td>
                                <td> </td>
                            </tr>
                            <tr>
                            <input type="hidden" value="'.$infoC->IMG.'" name="imgC2" >
                            <td> <label for="imgC">Imagen/Video</label></td>
                            <td> <input type="file" name="imgC" class="form-control" accept="image/*"></td>
                        </tr>
                        </table>
                        <input type="submit" class="btn btn-primary" name="editarCalistenico" value="Editar">
                </form>';

    //<!--- FIN EDITAR INFORMACION ---->

    //<!--- EDITAR/ELIMINAR/AÑADIR LOGROS ---->
    
    echo' <form method="POST"> 
            <table class="table">
                <tr>
                    <td>Logros</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Categoria</td>
                </tr>';
                foreach($infoL as $logro){
                echo'<tr>
                    <input type="hidden" value="'.$logro->ID.'" name="idLogro"> 
                    <td><input type="text" class="form-control" name="nombreL" value="'.$logro->NOMBRE.'"> </td>
                    <td><input type="date" class="form-control" name="fechaL" value="'.$logro->FECHA.'"> </td>
                    <td>
                        <select name="categoriaL">';
                     
                                //Llenamos el SELECT con las categorias y ponemos SELECTED la categoría que tiene el logro originalmente
                                $cat=$admin->getCategoria($logro->ID_CATEGORIA); 
                
                                foreach($infoCat as $categoria){
                                    if ($cat->ID==$categoria->ID)
                                        echo '<option value="'.$categoria->ID.'" selected>'.$categoria->NOMBRE.'</option>';
                                    else
                                        echo '<option value="'.$categoria->ID.'">'.$categoria->NOMBRE.'</option>';
                                }
                         
    echo'               </select>
                    </td>
                    <td><input type="submit" class="btn btn-primary" name="editarLogro" value="Editar"></td>
                    <td><input type="submit" class="btn btn-danger" name="eliminarLogro" value="Eliminar"></td>
                </tr>';
                    }
    echo            '<tr>
                    <td><input type="text" class="form-control" name="nNombreL" placeholder="Nombre Logro"> </td>
                    <td><input type="date" class="form-control" name="nFechaL"></td>
                    <td>
                        <select name="nCategoriaL">';
                        foreach($infoCat as $categoria){
    echo                       '<option value="'.$categoria->ID.'">'.$categoria->NOMBRE.'</option>';
                        };
    echo             '</select>
                    </td>
                    <input type="hidden" name="idC" value="'.$idCalistenico.'">
                    <td><input type="submit" class="btn btn-primary" name="nuevoLogro" value="Añadir"></td>
                </tr>
            </table>
        </form>
        </div></div>';
        // FIN EDITAR/ELIMINAR/AÑADIR LOGROS
        }
     ?>
    <!--- FIN EDITAR MIEMBRO --->

    <!--- LISTAR MIEMBROS --->
    <div class="row mt-5 w-100">
        <h3> MIEMBROS </h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">EDAD</th>
                <th scope="col">PESO</th>
                <th><th>
                <th><th>
            </tr>
            </thead>
            <?php foreach($miembros as $miembro): ?>
            <tbody>
            <form method='POST'>
                <tr>
                    <input type="hidden" name="Eid" value="<?php echo $miembro->ID ?>">
                    <td><?php echo $miembro->NOMBRE ?></td>
                    <td><?php echo $miembro->EDAD ?></td>
                    <td><?php echo $miembro->PESO ?></td>
                    <td><input type='submit' id='buscarMiembro' name='buscarC'  class="btn btn-primary" value='Editar'></td>
                    <td><input type='submit' id='eliminarMiembro' name='eliminarC' class="btn btn-danger" value='Eliminar'></td>
                </tr>
            </form>
            <?php endforeach; ?>
            </tbody>
     
        </table>
    </div>
</div>
    <!--- FIN LISTAR MIEMBROS --->      
                <!--- NOTICIAS  --->
                <!--- REGISTRAR NOTICIA  --->
                <div class="row principalNotis d-none">
                    <div class="col-md-5 mt-5 mostrar">
                        <h3> NUEVA NOTICIA </h3>
                        <table class="mb-3">
                            <form method="POST" enctype="multipart/form-data">
                                <tr>
                                    <td> <label for="Atitulo"> Titulo:</label></td>
                                    <td> <input type="text"  class="form-control" name="Atitulo"  required></td>
                                </tr>
                                <tr>
                                    <td> <label for="Acontenido"> Contenido:</label></td>
                                    <td> <textarea id='Acontenido'  class="form-control" name='Acontenido' width='500px'></textarea></td>
                                </tr>
                                <tr>
                                    <td> <label for="Afecha">Fecha</label></td>
                                    <td> <input type="date"  class="form-control" name="Afecha"  required></td>
                                </tr>
                                
                                <tr>
                                    <td> <label for="Alink">Link</label></td>
                                    <td> <input type="text"  class="form-control" name="Alink"  required></td>
                                </tr>
                                <tr>
                                    <td> <label for="Acategoria">Categoria</label></td>
                                    <td> <input type="text"  class="form-control" name="Acategoria"  required></td>
                                </tr>
                                <tr>            
                                    <td> <label for="Aimagen">Imagen</label></td>
                                    <td> <input type="file" name="Aimagen" class="form-control" accept="image/*" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" id="registrar" class="btn btn-primary" name="registrarN" value="Registrar"></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                    <!--- FIN REGISTRAR NOTICIA --->
                
                    <!--- EDITAR NOTICIA  --->
                       <div class="col-md-5 mt-5 editar d-none" id="NoticiaEditar">
                        <h3>EDITAR NOTICIA </h3>
                            <form method="POST" enctype="multipart/form-data">
                                <table class="mb-3">
                                    <input type="hidden" name="EID" id="Notid" value="">
                                    <tr>
                                    <td colspan="2"> <img src="" id="Notimagen" name="Eimagen2" width="150px"></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="Etitulo"> Titulo:</label></td>
                                        <td> <input type="text"  class="form-control" id="Notititulo" name="Etitulo" value="" required></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="Econtenido"> Contenido:</label></td>
                                        <td> <textarea class="form-control" name="Econtenido" id="Noticontenido" width="500px"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="Efecha">Fecha</label></td>
                                        <td> <input type="date"  class="form-control" name="Efecha" id="Notifecha" value=""  required></td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="Elink">Link</label></td>
                                        <td> <input type="text"  class="form-control" name="Elink" id="Notilink" value="" required></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="Ecategoria">Categoria</label></td>
                                        <td> <input type="text"  class="form-control" name="Ecategoria" id="Noticategoria" value="" required></td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="Eimagen2" id="Notimagen2" value="">
                                        <td> <label for="EImagen">Imagen/Video</label></td>
                                        <td> <input type="file" name="Eimagen" class="form-control" accept="image/*, video/*"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" class="btn btn-primary" name="editarN" value="Editar"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
            
       
                    
                    <!--- FIN EDITAR NOTICIA --->

                    <!--- LISTAR NOTICIAS --->

                    <div class="row mt-5 w-100">
                    <h3> NOTICIAS Y EVENTOS  </h3>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">TITULO</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">CATEGORIA</th>
                            <th><th>
                            <th><th>
                        </tr>
                        </thead>
                        <?php foreach($noticias as $noticia): ?>
                        <tbody>
                        <form method='POST'>
                            <tr>
                                <input type="hidden" name="Eid" value="<?php echo $noticia->ID ?>">
                                <td><?php echo $noticia->TITULO ?></td>
                                <td><?php echo $noticia->FECHA ?></td>
                                <td><?php echo $noticia->CATEGORIA ?></td>
                                <td><input type='submit' id='buscarNoticia' data-id="<?php echo $noticia->ID ?>" name='buscarN'  class="btn btn-primary" value='Editar'></td>
                                <td><input type='submit' id='eliminarNoticia' name='eliminarN' class="btn btn-danger" value='Eliminar'></td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!--- FIN LISTAR NOTICIAS --->
                <!--- FIN NOTICIAS  --->
                </div>


                    
            <!--- REGISTRAR PRODUCTO  --->
            <div class="row principalProductos d-none">
            <div class="col md-4 mt-5 mostrar">
                
                <table class="mb-3">
                    <tr><td colspan="2"><h3> NUEVO PRODUCTO </h3></td></tr>
                    <form method="POST" name="registrar" enctype="multipart/form-data">
                        <tr>
                            <td> <label for="Anombre"> Nombre:</label></td>
                            <td> <input type="text" name="Anombre" class="form-control"   required></td>
                        </tr>
                        <tr>
                            <td> <label for="Adescripcion"> Descripcion:</label></td>
                            <td> <textarea id='Acontenido' class="form-control" name='Adescripcion' width='300px'></textarea></td>
                        </tr>
                        <tr>
                            <td> <label for="Atalla">Talla</label></td>
                            <td> <input type="text" name="Atalla"  class="form-control" required></td>
                        </tr>
                        
                        <tr>
                            <td> <label for="Aprecio">Precio</label></td>
                            <td> <input type="number" name="Aprecio" class="form-control" min="0" step="0.01" required></td>
                        </tr>
                        <tr>
                            <td> <label for="Astock">Stock</label></td>
                            <td> <input type="number" name="Astock" class="form-control" min="0" required></td>
                        </tr>
                        <tr>
                            <td> <label for="Acategoria">Categoria</label></td>
                            <td> <input type="text" name="Acategoria" class="form-control"  required></td>
                        </tr>
                        <tr>
                            <td> <label for="Aimagen">Imagen</label></td>
                            <td> <input type="file" name="Aimagen" class="form-control" accept="image/*" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" id="registrar" class="btn btn-primary" name="registrarP" value="Registrar"></td>
                        </tr>
                    </form>
                </table>
            </div>
            <!--- FIN REGISTRAR PRODUCTO --->

            <!--- EDITAR PRODUCTOS --->


                    <div class="col md-4 mt-5 editar d-none"  id="ProductoEditar">
                    
                    <form method="POST" name="editarP" enctype="multipart/form-data">
                    <table class="mb-3">
                            <tr>
                                <td><h3> EDITAR PRODUCTO</h3></td>
                            </tr>
                            <tr>
                                <td colspan="2"><img src=""  class="imagen" id="Prodimagen" height="150px"><br></td>
                            </tr>
                            <input type="hidden" name="EID" id="Prodid" value="">
                            <tr>
                                <td> <label for="Anombre"> Nombre:</label></td>
                                <td> <input type="text" id="Prodnombre" name="Enombre" class="form-control" value="" ></td>
                            </tr>
                            <tr>
                                <td> <label for="Edescripcion"> Descripcion:</label></td>
                                <td> <textarea id="Proddescripcion" class="form-control" name="Edescripcion"></textarea></td>
                            </tr>
                            <tr>
                                <td> <label for="Atalla">Talla</label></td>
                                <td> <input type="text" name="Etalla" id="Prodtalla" class="form-control" value="" required></td>
                            </tr>
                            
                            <tr>
                                <td> <label for="Aprecio">Precio</label></td>
                                <td> <input type="number" name="Eprecio" id="Prodprecio" class="form-control" value="" min="0" step="0.01" required></td>
                            </tr>
                            <tr>
                                <td> <label for="Astock">Stock</label></td>
                                <td> <input type="number" name="Estock" id="Prodestock" class="form-control" value="" min="0" required></td>
                            </tr>
                            <tr>
                                <td> <label for="Acategoria">Categoria</label></td>
                                <td> <input type="text" name="Ecategoria" id="Prodcategoria" class="form-control" value=""  required></td>
                            </tr>
                            <tr>
                                <input type="hidden" value="" name="Eimagen2" id="Prodimagen2">
                                <td> <label for="Eimagen">Imagen</label></td>
                                <td> <input type="file" name="Eimagen" class="form-control" accept="image/*"></td>
                    
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn btn-primary" name="editarP" value="Editar"></td>
                            </tr>
                        </table>
                    </form>
                </div>
        
  
            <!--- FIN EDITAR  PRODUCTO--->

            <!--- LISTAR PRODUCTOS --->
            <div class="container mt-5 w-100">
                    <h3> PRODUCTOS  </h3>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">PRECIO</th>
                            <th><th>
                            <th><th>
                        </tr>
                        </thead>
                        <?php foreach($productos as $producto): ?>
                        <tbody>
                        <form method='POST'>
                            <tr>
                                <input type="hidden" name="IdProd" value="<?php echo $producto->ID ?>">
                                <td><?php echo $producto->NOMBRE ?></td>
                                <td><?php echo $producto->STOCK?></td>
                                <td><?php echo $producto->PRECIO ?> €</td>
                                <td><input type='button' data-id='<?php echo $producto->ID ?>' id='buscarProducto' name='buscarP'  class="btn btn-primary" value='Editar'></td>
                                <td><input type='submit' id='eliminarProducto' name='eliminarP' class="btn btn-danger" value='Eliminar'></td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!--- FIN LISTAR PRODUCTO--->
                </div>

                   <!--- IMAGENES  --->

    <!--- REGISTRAR IMAGEN --->
    <div class="row principalGaleria d-none">
        <div class="col md-4 mt-5 mostrar">
           
            <table class="mb-3">
                <tr><td colspan="2"><h3> NUEVA FOTO / VIDEO </h3></td></tr>
                <form method="POST" name="registrar" enctype="multipart/form-data">
                        <tr>
                            <td> <label for="Icategoria">Categoria: </label></td>
                            <td> 
                                <select class="form-control" name="Icategoria">
                                    <option value="eventos">Evento</option>
                                    <option value="stage">Stage</option>
                                    <option value="equipo">Equipo</option>
                                    <option value="comienzo">Comienzo</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Iformato">Formato: </label></td>
                            <td> 
                                <select class="form-control" name="Iformato">
                                    <option value="cartel">Cartel/Poster</option>
                                    <option value="imagen">Foto</option>
                                    <option value="video">Video</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Ifecha">Año</label></td>
                            <td> <input type="number" name="Ifecha" class="form-control" min="1990" required></td>
                        </tr>
                        <tr>
                            <td> <label for="Ifoto">Imagen/Video</label></td>
                            <td> <input type="file" name="Ifoto" class="form-control" accept="image/*, video/*" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" id="registrar" class="btn btn-primary" name="registrarF" value="Registrar"></td>
                        </tr>
                </form>
            </table>
        </div>
        <!--- FIN REGISTRAR IMAGEN --->

        <!--- EDITAR IMAGEN --->
        <div class="col md-4 mt-5 editar d-none" id="GaleriaEditar">
            <h3> EDITAR FOTO / VIDEO </h3>
            <table class="mb-3">
                <form method="POST" name="registrar" enctype="multipart/form-data">
                        <tr>
                            <td colspan="3" id="Fotomedia">

                            </td>
                        </tr>
                        <tr>
                            <input type="hidden" name="Eid" id="Fotoid" value="">
                            <td> <label for="Icategoria"> Cambiar Categoria: </label></td>
                            <td> <input type="text" id="Fotocategoria" value="" disabled>
                            <td>
                                <select class="form-control" name="Icategoria">
                                    <option value="eventos">Evento</option>
                                    <option value="stage">Stage</option>
                                    <option value="equipo">Equipo</option>
                                    <option value="comienzo">Comienzo</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Iformato"> Cambiar Formato: </label></td>
                            <td> <input type="text" id="Fotoformato" value="" disabled> 
                            <td> 
                                <select class="form-control" name="Iformato">
                                    <option value="cartel">Cartel/Poster</option>
                                    <option value="imagen">Imagen</option>
                                    <option value="video">Video</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Ifecha">Año</label></td>
                            <td colspan="2"> <input type="number" id="Fotofecha" name="Ifecha" class="form-control" min="1980" value="" required></td>
                        </tr>
                        <tr>
                            <input type="hidden" value="" id="Foto2" name="Ifoto2" >
                            <td> <label for="Ifoto">Cambiar: </label></td>
                            <td colspan="3"> <input type="file" id="Foto" name="Ifoto" class="form-control" accept="image/*, video/*"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="submit" id="editarF" class="btn btn-primary" name="editarF" value="Editar"></td>
                        </tr>
                </form>
            </table>
        </div>
    

        <!--- FIN EDITAR IMAGEN --->
        <!--- LISTAR IMAGENES --->
        <div class="container mt-5 w-100">
            <h3> IMAGENES </h3>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">FECHA</th>
                    <th><th>
                    <th><th>
                </tr>
                </thead>
                <?php foreach($fotos as $foto): ?>
                <tbody>
                <form method='POST'>
                    <tr>
                        <input type="hidden" name="Eid" value="<?php echo $foto->ID ?>">
                        <td><?php echo $foto->CATEGORIA ?></td>
                        <td><?php 
                            if ($foto->FORMATO=='video'){
                                echo '<video src="Imagenes\\'.$foto->IMG.'" type="video/mp4" controls width="100px"></video>';
                            }
                            else
                                echo '<img src="Imagenes\\'.$foto->IMG.'" width="100px">'; 
                        ?></td>
                        <td><?php echo $foto->FECHA ?></td>
                        <td><input type='submit' id='buscarImagen' data-id="<?php echo $foto->ID ?>" name='buscarF'  class="btn btn-primary" value='Editar'></td>
                        <td><input type='submit' id='eliminarImagen' name='eliminarF' class="btn btn-danger" value='Eliminar'></td>
                    </tr>
                </form>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--- FIN LISTAR IMAGENES --->
    <!--- FIN IMAGENES --->
                        
                       












        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" 
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
</body>
</html>