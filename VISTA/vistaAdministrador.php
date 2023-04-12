<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="mainAdmin.css">
       
    </head>
    <body>

        <h1>CABECERA</h1>

        <?php
            require("modeloAdmin.php");
            $a = new Administrador ();
            if (isset($_POST["registrarN"])){    
                
                $tituloNoticia = $_POST["Atitulo"];
                $contenidoNoticia = $_POST["Acontenido"];
                $fechaNoticia = $_POST["Afecha"];
                $linkNoticia = $_POST["Alink"];
                $imagenNoticia = $_POST["Aimagen"];
                $categoriaNoticia = $_POST["Acategoria"];

                $a->nuevoNoticia($tituloNoticia, $contenidoNoticia,$fechaNoticia,$linkNoticia,$imagenNoticia,$categoriaNoticia);
            }
            if (isset($_POST["registrarP"])){
                
                $nombre = $_POST["Anombre"];
                $descripcion = $_POST["Adescripcion"];
                $talla = $_POST["Atalla"];
                $precio = $_POST["Aprecio"];
                $stock = $_POST["Astock"];
                $categoria = $_POST["Acategoria"];
                $imagen = $_POST["Aimagen"];

                $a->nuevoProducto($nombre, $descripcion, $precio, $stock, $categoria, $talla, $imagen);
            }
            if (isset($_POST["registrarC"])){

                $nombre = $_POST["Anombre"];
                $edad = $_POST["Aedad"];
                $peso = $_POST["Apeso"];
                $altura = $_POST["Aaltura"];
                $imagen = $_POST["Aimagen"];

                $a->nuevoCalistenico($nombre, $edad, $peso, $altura, $imagen);
            }
        ?>

    <h2>BIENVENIDO</h2>

    <div class="registrarArticulos">
        <div class="registrarNoticia">
        <h3> REGISTRAR NOTICIA </h3>
        <form  action="vistaAdministrador.php" method="POST" class="formulario" name="registrar">
            <table>
                <tr>
                    <td> <label for="Atitulo"> Titulo:</label></td>
                    <td> <input type="text" name="Atitulo"  required></td>
                </tr>
                <tr>
                    <td> <label for="Acontenido"> Contenido:</label></td>
                    <td> <textarea id='Acontenido' name='Acontenido' width='300px'></textarea></td>
                </tr>
                <tr>
                    <td> <label for="Afecha">Fecha</label></td>
                    <td> <input type="date" name="Afecha"  required></td>
                </tr>
            
                <tr>
                    <td> <label for="Alink">Link</label></td>
                    <td> <input type="text" name="Alink"  required></td>
                </tr>
                <tr>
                    <td> <label for="Acategoria">Categoria</label></td>
                    <td> <input type="text" name="Acategoria"  required></td>
                </tr>
                <tr>
                    <td> <label for="Aimagen">Imagen</label></td>
                    <td> <input type="text" name="Aimagen"  required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="registrar" name="registrarN" value="Registrar"></td>
                </tr>
            </table>
        </form>
        </div>

        <div class="registrarProducto">
        <h3> REGISTRAR PRODUCTO </h3>
        <form  action="vistaAdministrador.php" method="POST" class="formulario" name="registrar">
            <table>
                <tr>
                    <td> <label for="Anombre"> Nombre:</label></td>
                    <td> <input type="text" name="Anombre"  required></td>
                </tr>
                <tr>
                    <td> <label for="Adescripcion"> Descripcion:</label></td>
                    <td> <textarea id='Acontenido' name='Adescripcion' width='300px'></textarea></td>
                </tr>
                <tr>
                    <td> <label for="Atalla">Talla</label></td>
                    <td> <input type="number" name="Atalla"  required></td>
                </tr>
            
                <tr>
                    <td> <label for="Aprecio">Precio</label></td>
                    <td> <input type="number" name="Aprecio"  required></td>
                </tr>
                <tr>
                    <td> <label for="Astock">Stock</label></td>
                    <td> <input type="number" name="Astock"  required></td>
                </tr>
                <tr>
                    <td> <label for="Acategoria">Categoria</label></td>
                    <td> <input type="text" name="Acategoria"  required></td>
                </tr>
                <tr>
                    <td> <label for="Aimagen">Imagen</label></td>
                    <td> <input type="text" name="Aimagen"  required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="registrar" name="registrarP" value="Registrar"></td>
                </tr>
            </table>
        </form>
        </div>

        <div class="registrarCalistenico">
        <h3> REGISTRAR CALISTENICO </h3>
        <form  action="vistaAdministrador.php" method="POST" class="formulario" name="registrar">
            <table>
                <tr>
                    <td> <label for="Anombre"> Nombre:</label></td>
                    <td> <input type="text" name="Anombre"  required></td>
                </tr>
                <tr>
                    <td> <label for="Aedad"> Edad:</label></td>
                    <td> <input type="number" name="Aedad"  required></td>
                </tr>
                <tr>
                    <td> <label for="Apeso">Peso</label></td>
                    <td> <input type="number" name="Apeso"  required></td>
                </tr>
            
                <tr>
                    <td> <label for="Aaltura">Altura</label></td>
                    <td> <input type="number" name="Aaltura"  required></td>
                </tr>
                <tr>
                    <td> <label for="Aimagen">Imagen</label></td>
                    <td> <input type="text" name="Aimagen"  required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="registrar" name="registrarC" value="Registrar"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>

    <div class="listas">
        <div class="listaNoticias">
            <h3>NOTICIAS</h3>
        <?php
                $noticias=$a->getNoticias();
                echo "<table id='tablaP'>";
                 echo " <td  id='tabla'> ID </td>
                        <td  id='tabla'> Titulo </td>
                        <td  id='tabla'> Fecha </td>
                        <td  id='tabla'> Categoria </td>
                        <td  id='tabla'> Imagen </td>
                        <td  id='tabla'></td>
                        <td  id='tabla'></td>
                        ";
                foreach($noticias as $fila){
                    echo "<tr>";
                            echo "<form action='vistaAdministrador.php' method='POST' class='formulario'>";
                            echo "<td id='tabla'>" . $fila->ID . "</td>";
                            echo "<td id='tabla'>" . $fila->TITULO . "</td>";
                            echo "<td id='tabla'>" . $fila->FECHA . "</td>";
                            echo "<td id='tabla'>" . $fila->CATEGORIA . "</td>";
                            echo "<td id='tabla'>" . $fila->IMG . "</td>";
                            echo "<td id='tabla'><input type='submit' id='buscar' name='buscarN' value='Editar'></td>";
                            echo "<td id='tabla'><input type='submit' id='eliminar' name='eliminarN' value='Eliminar'></td>";
                            echo "<td><input type='hidden' name='Eid' value='" . $fila->ID . "' readonly></td>";
                            echo "</form>";

                    echo "</tr>";
                }
                echo "</table>";
        ?>
        <?php  

//NOTICIAS----------------------------------------------------

    if (isset($_POST["buscarN"]))
    {
        @$buscar = $_POST["Eid"];
        if ( $fila=$a->getNoticia($buscar))
        {

            echo "<div class='formularioModificar'>
            <form action='vistaAdministrador.php' method='POST' class='formulario'><table>
                <caption> Editar Noticia </caption>
                <tr><td>ID</td><td><input type='text' id='EID' name='EID' value='" . $fila->ID . "' readonly></td></tr>
                <tr><td>Titulo</td><td><input type='text' id='Etitulo' name='Etitulo' value='" . $fila->TITULO . "'></td></tr>
                <tr><td>Contenido</td><td><textarea id='Econtenido' name='Econtenido' width='300px'>" . $fila->CONTENIDO . "</textarea></td></tr>
                <tr><td>Fecha</td><td><input type='date' id='Efecha' name='Efecha' value='" . $fila->FECHA . "'></td></tr>
                <tr><td>Link</td><td><input type='text' id='Elink' name='Elink' value='" . $fila->LINK . "'></td></tr>
                <tr><td>Imagen</td><td><input type='text' id='Eimagen' name='Eimagen' value='" . $fila->IMG . "'></td></tr>
                <tr><td>Categoria</td><td><input type='text' id='Ecategoria' name='Ecategoria' value='" . $fila->CATEGORIA . "'></td></tr>
                </table>
                <input type='submit' id='eliminar' name='editarN' value='Editar'></form>
                </div>";
                
        }
    }
    if (isset($_POST["eliminarN"]))
        {
            @$buscar = $_POST["Eid"];
            $a->eliminarNoticia($buscar);
            
            
            
        }

 

        if (isset($_POST["editarN"]))
        {
            $Eid = $_POST["EID"]; 
            $Etitulo = $_POST["Etitulo"];
            $Econtenido = $_POST["Econtenido"];
            $Efecha = $_POST["Efecha"];
            $Elink = $_POST["Elink"];
            $Eimagen = $_POST["Eimagen"];
            $Ecategoria = $_POST["Ecategoria"];

            $a->modificarNoticia($Eid, $Etitulo, $Econtenido, $Efecha, $Elink, $Eimagen, $Ecategoria);
            
            

}
?>
        </div><br>
        <div class="listaProductos">
            <h3>PRODUCTOS</h3>
        <?php
            
            $productos= $a-> getProductos();

                echo "<table id='tablaP'>";
                 echo " <td  id='tabla'> ID </td>
                        <td  id='tabla'> Nombre </td>
                        <td  id='tabla'> Stock </td>
                        <td  id='tabla'> Categoria </td>
                        <td  id='tabla'> Imagen </td>
                        <td  id='tabla'></td>
                        <td  id='tabla'></td>
                        ";
                foreach($productos as $fila){
                    echo "<tr>";
                            echo "<form action='vistaAdministrador.php' method='POST' class='formulario'>";
                            echo "<td id='tabla'>" . $fila->ID . "</td>";
                            echo "<td id='tabla'>" . $fila->NOMBRE . "</td>";
                            echo "<td id='tabla'>" . $fila->STOCK . "</td>";
                            echo "<td id='tabla'>" . $fila->CATEGORIA . "</td>";
                            echo "<td id='tabla'>" . $fila->IMG . "</td>";
                            echo "<td id='tabla'><input type='submit' id='buscar' name='buscarP' value='Editar'></td>";
                            echo "<td id='tabla'><input type='submit' id='eliminar' name='eliminarP' value='Eliminar'></td>";
                            echo "<td><input type='hidden' name='Eid' value='" . $fila->ID . "' readonly></td>";
                            echo "</form>";

                    echo "</tr>";
                }
                echo "</table>";
                

        ?>
        <?php  

//PRODUCTOS---------------------------- ------------------------

    if (isset($_POST["buscarP"]))
    {
        @$buscar = $_POST["Eid"];
        if ( $fila=$a->getProducto($buscar))
        {
        
            echo "<div class='formularioModificar'>
            <form action='vistaAdministrador.php' method='POST' class='formulario'><table>
                <caption> Editar Producto </caption>
                <tr><td>ID</td><td><input type='text' id='EID' name='EID' value='" . $fila->ID . "' readonly></td></tr>
                <tr><td>Nombre</td><td><input type='text' id='Enombre' name='Enombre' value='" . $fila->NOMBRE . "'></td></tr>
                <tr><td>Descripcion</td><td><input type='text' id='Edescripcion' name='Edescripcion' value='" . $fila->DESCRIPCION . "'></td></tr>
                <tr><td>Talla</td><td><input type='text' id='Etalla' name='Etalla' value='" . $fila->TALLA . "'></td></tr>
                <tr><td>Stock</td><td><input type='number' id='Estock' name='Estock' value='" . $fila->STOCK . "'></td></tr>
                <tr><td>Precio</td><td><input type='number' id='Eprecio' name='Eprecio' value='" . $fila->PRECIO . "'></td></tr>
                <tr><td>Categoria</td><td><input type='text' id='Ecategoria' name='Ecategoria' value='" . $fila->CATEGORIA . "'></td></tr>
                <tr><td>Imagen</td><td><input type='text' id='Eimagen' name='Eimagen' value='" . $fila->IMG . "'></td></tr>
                </table>
                <input type='submit' id='eliminar' name='editarP' value='Editar'></form>
                </div>
                ";
                
        }
    }
         
if (isset($_POST["eliminarP"]))
    {

        @$buscar = $_POST["Eid"];
        $a->eliminarProducto($buscar);
        

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
    $Eimagen = $_POST["Eimagen"];

    $a->modificarProducto($Eid,$Enombre,$Edescripcion,$Etalla,$Eprecio,$Estock,$Ecategoria,$Eimagen);
    

    

}
?>
        </div><br>
        <div class="listaCalistenicos">
            <h3>CALISTENICOS</h3>
        <?php

                $calistenicos = $a->getCalistenicos();

                echo "<table id='tablaP'>";
                 echo " <td  id='tabla'> ID </td>
                        <td  id='tabla'> Nombre </td>
                        <td  id='tabla'> Edad </td>
                        <td  id='tabla'> Imagen </td>
                        <td  id='tabla'></td>
                        <td  id='tabla'></td>
                        ";
                foreach($calistenicos as $fila){
                    echo "<tr>";
                            echo "<form action='vistaEditarCalistenico.php' method='POST' class='formulario'>";
                            echo "<input type=hidden value='".$fila->ID."' name='EID'>";
                            echo "<td id='tabla'>" . $fila->ID . "</td>";
                            echo "<td id='tabla'>" . $fila->NOMBRE . "</td>";
                            echo "<td id='tabla'>" . $fila->EDAD . "</td>";
                            echo "<td id='tabla'>" . $fila->IMG . "</td>";
                            echo "<td id='tabla'><input type='submit' id='buscar' name='buscarC' value='Editar'></td>";
                            echo "<td id='tabla'><input type='submit' id='eliminar' name='eliminarC' value='Eliminar'></td>";
                            echo "<td><input type='hidden' name='Eid' value='" . $fila->ID . "' readonly></td>";
                            echo "</form>";

                    echo "</tr>";
                }
                echo "</table>";
        ?>
        <?php  


//CALISTENICOS----------------------------------------------------




?>
        </div><br>
    </div>
    </body>
</html>