<?php 

    header ("Access-Control-Allow-Origin:*");
    require_once("conectar.php");
    $conexion=Conectar::conexion();


    try {
        $fotos = array();
        $conexion=Conectar::conexion();
    
        if ($_REQUEST['accion']=="verStages"){
            
            $anio = $_POST['fecha']; 
            $fotos = array();

            $consultaFotos = $conexion->query("SELECT * FROM galeria WHERE CATEGORIA='stage' AND FECHA=$anio")->fetchAll(PDO::FETCH_OBJ);
            
            foreach($consultaFotos as $foto)
            {
                $fotos[] = $foto;
            }
            echo json_encode($fotos);
          
       }elseif ($_REQUEST['accion']=="verEventos"){
            
        $anio = $_POST['fecha']; 
        $fotos = array();

        $consultaFotos = $conexion->query("SELECT * FROM galeria WHERE CATEGORIA='eventos' AND FECHA=$anio")->fetchAll(PDO::FETCH_OBJ);
        
        foreach($consultaFotos as $foto)
        {
            $fotos[] = $foto;
        }
        echo json_encode($fotos);
      
        }elseif($_REQUEST['accion']=="verProducto"){

            $id = $_POST['id'];
            $consulta = $conexion->query("SELECT * FROM producto WHERE ID=$id");
            $producto = $consulta->fetch(PDO::FETCH_OBJ);
            echo json_encode($producto);
        }elseif($_REQUEST['accion']=="verNoticia"){

            $id = $_POST['id'];
            $consulta = $conexion->query("SELECT * FROM noticia WHERE ID=$id");
            $noticia = $consulta->fetch(PDO::FETCH_OBJ);
            echo json_encode($noticia);
        }elseif($_REQUEST['accion']=="verGaleria"){

            $id = $_POST['id'];
            $consulta = $conexion->query("SELECT * FROM galeria WHERE ID=$id");
            $galeria = $consulta->fetch(PDO::FETCH_OBJ);
            echo json_encode($galeria);
        };



    } catch(Exception $e){
        die("Error " . $e->getMessage());
    }
?>