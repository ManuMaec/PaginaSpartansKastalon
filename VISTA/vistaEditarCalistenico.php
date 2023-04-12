<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Editar</title>
</head>
<body>
    <?php
        require_once ("modeloAdmin.php");
        $admin = new Administrador();
        $idCalistenico=1; //Esto está ahora mismo solo paraque no pete hasta que se ponga el controlador. El problema es que solo se van a editar el calistenico 1 xd
      
        if (isset($_POST['buscarC'])){
            $idCalistenico= htmlentities(addslashes($_POST['EID']));  
            //Esto peta cada vez que se actualiza la pagina pero en el MVC no debería haber problema pasándole el $id del calistenico bien
        }
        if (isset($_POST["eliminarC"]))
        {
            $idCalistenico= htmlentities(addslashes($_POST['EID']));
            $admin->eliminarCalistenico($idCalistenico);
            header("location:vistaAdministrador.php");
        }


        $infoC =$admin->getCalistenico($idCalistenico);
        $infoL =$admin->getLogrosCalistenico($idCalistenico);
        $infoCat = $admin->getCategorias();
        $infoCC = $admin->getCategoriasCalistenico($idCalistenico);

        if(isset($_POST['editarCalistenico'])){          
            $nombreC= htmlentities(addslashes($_POST['nombreC']));
            $imgC= htmlentities(addslashes($_POST['imgC']));
            $edadC=htmlentities(addslashes($_POST['edadC']));
            $pesoC=htmlentities(addslashes($_POST['pesoC']));
            $alturaC=htmlentities(addslashes($_POST['alturaC']));

            $admin->modificarCalistenico($idCalistenico,$nombreC,$edadC,$pesoC,$alturaC,$imgC);
            header("location:vistaEditarCalistenico.php");
        }

        if(isset($_POST['editarLogro'])){
            $idL=htmlentities(addslashes($_POST['idLogro']));
            $nombreL=htmlentities(addslashes($_POST['nombreL']));
            $fechaL=htmlentities(addslashes($_POST['fechaL']));
            $categoriaL=htmlentities(addslashes($_POST['categoriaL']));

            $admin->modificarLogro($idL,$nombreL,$fechaL,$categoriaL);

            header("location:vistaEditarCalistenico.php");
        }
        
        if(isset($_POST['nuevoLogro'])){
            $nombreL=htmlentities(addslashes($_POST['nNombreL']));
            $fechaL=htmlentities(addslashes($_POST['nFechaL']));
            $categoriaL=htmlentities(addslashes($_POST['nCategoriaL']));

            $admin->nuevoLogro($idCalistenico,$nombreL,$fechaL,$categoriaL);
            header("location:vistaEditarCalistenico.php");
        }

        if(isset($_POST['eliminarLogro'])){
            $idL=htmlentities(addslashes($_POST['idLogro']));
            $admin->eliminarLogro($idL);
            header("location:vistaEditarCalistenico.php");
        }

        if(isset($_POST['nuevoCategoriaC'])){
            $idC=htmlentities(addslashes($_POST['nCategoriaC']));
            $admin->nuevoCategoria($idCalistenico,$idC);
            header("location:vistaEditarCalistenico.php");

        }

        if(isset($_POST['eliminarCategoria'])){
            $idC=htmlentities(addslashes($_POST['categoriaC']));
            $admin->eliminarCategoriaCalistenico($idC);
            header("location:vistaEditarCalistenico.php");
        }
    ?>
    <!--- EDITAR CALISTENICO ---->
    <div id="perfilCalistenico">
        <form method="POST">
            <table id="datosGenerales">
                <tr>
                    <input type="hidden" name="idC" value="<?php echo $idCalistenico ?>">
                    <td colspan="2"><img src="<?php echo $infoC->IMG ?>"></td>
                </tr>
                <tr>
                    <td><label for="imgC">Foto: </td>
                    <td><input type="text" class="form-control" name="imgC" value="<?php echo $infoC->IMG ?>"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input type="text" class="form-control" name="nombreC" value="<?php echo $infoC->NOMBRE ?>"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Edad: </label></td>
                    <td><input type="number" class="form-control" name="edadC" value="<?php echo $infoC->EDAD ?>" min="0"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Peso: </label></td>
                    <td><input type="number" class="form-control" min=0 step="0.01" name="pesoC" value="<?php echo $infoC->PESO ?>"></td>
                    <td> kg</td>
                </tr>
                <tr>
                    <td><label for="nombre">Altura: </label></td>
                    <td><input type="number" class="form-control" min=0 step="0.01" name="alturaC" value="<?php echo $infoC->ALTURA ?>"></td>
                    <td> m</td>
                </tr>
            </table>
            <input type="submit" class="btn btn-primary" name="editarCalistenico" value="Editar">
        </form>
        <!--- FIN EDITAR CALISTENICO ---->

        <!--- EDITAR/ELIMINAR/AÑADIR LOGROS ---->
        <form method="POST"> 
            <table >
                <tr>
                    <td>Logros</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Categoria</td>
                </tr>
                <?php foreach($infoL as $logro):?>
                <tr>
                    <input type="hidden" value="<?php echo $logro->ID?>" name="idLogro"> 
                    <td><input type="text" class="form-control" name="nombreL" value="<?php echo $logro->NOMBRE ?>"> </td>
                    <td><input type="date" class="form-control" name="fechaL" value="<?php echo $logro->FECHA ?>"> </td>
                    <td>
                        <select name="categoriaL">
                            <?php 
                                //Llenamos el SELECT con las categorias y ponemos SELECTED la categoría que tiene el logro originalmente
                                $cat=$admin->getCategoria($logro->ID_CATEGORIA); 
                
                                foreach($infoCat as $categoria){
                                    if ($cat->ID==$categoria->ID)
                                        echo '<option value="'.$categoria->ID.'" selected>'.$categoria->NOMBRE.'</option>';
                                    else
                                        echo '<option value="'.$categoria->ID.'">'.$categoria->NOMBRE.'</option>';
                                }
                            ?> 
                        </select>
                    </td>
                    <td><input type="submit" class="btn btn-primary" name="editarLogro" value="Editar"></td>
                    <td><input type="submit" class="btn btn-danger" name="eliminarLogro" value="Eliminar"></td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td><input type="text" class="form-control" name="nNombreL" placeholder="Nombre Logro"> </td>
                    <td><input type="date" class="form-control" name="nFechaL"></td>
                    <td>
                        <select name="nCategoriaL">
                        <?php foreach($infoCat as $categoria):?>
                            <option value="<?php echo $categoria->ID?>"><?php echo $categoria->NOMBRE?></option>
                        <?php endforeach;?>
                        </select>
                    </td>
                    <td><input type="submit" class="btn btn-primary" name="nuevoLogro" value="Añadir"></td>
                </tr>
            </table>
        </form>
        <!--- FIN EDITAR/ELIMINAR/AÑADIR LOGROS ---->

        <!--- EDITAR CATEGORIA ---->
        <form method="POST"> 
            <table>
                <tr>
                    <td>Categoria</td>
                </tr>
                <?php  foreach($infoCC as $catCal):?>
                <tr>
                    <td> <input type="hidden" value="<?php echo $catCal->ID ?>" name="categoriaC"><?php echo $catCal->NOMBRE;?> </td>
                    <td> <input type="submit" class="btn btn-danger" name="eliminarCategoria" value="Eliminar"></td>
                </tr>    
                <?php endforeach; ?>  
                <td>
                    <select name="nCategoriaC">
                        <?php foreach($infoCat as $categoria):?>
                            <option value="<?php echo $categoria->ID?>"><?php echo $categoria->NOMBRE?></option>
                        <?php endforeach;?>
                    </select>
                </td>      
                <!--- Se pueden añadir varias veces la misma categoria, se tiene que arreglar eso ---->
                <td><input type="submit" class="btn btn-primary"  name="nuevoCategoriaC" value="Añadir"></td>
             
            </table>
        </form>
        <!--- FIN CATEGORIA ---->
    </div>

    <!--- ESTO SOLO PA QUE SE VEA EN LA PRESENTACION --->
    <button type="button" class="btn btn-primary" onclick="volver()" value="Volver al Menu">Volver</button>
    <script>
        function volver() {
            window.location.href = "vistaAdministrador.php";
        };
    </script>
    <!--- HASTA AQUI --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>