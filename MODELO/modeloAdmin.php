<?php

class Administrador { 
    protected $conexion;

    public function __construct() {
        require_once ("conectar.php");
        $this->conexion=Conectar::conexion();
    }

    // Getters y Setters
    // Consultar productos
    
    public function getProductos() {

        $producto= array();

        $consultaDatosProductos = $this->conexion->query("SELECT * FROM producto");
        while($productos=$consultaDatosProductos->fetch(PDO::FETCH_OBJ)){
            $producto[] = $productos;
        }

        return $producto;
    }

    // Consultar 1 producto
    public function getProducto($id) {

        $consultaDatosProductos = $this->conexion->query("SELECT * FROM producto WHERE ID=$id");
        $producto = $consultaDatosProductos->fetch(PDO::FETCH_OBJ);
        return $producto;
    }


  
    // Consultar calistenicos
    public function getCalistenicos() {

        $calistenico = array();

        $consultaDatosCalistenico = $this->conexion->query("SELECT * FROM CALISTENICO");
        while($calistenicos=$consultaDatosCalistenico->fetch(PDO::FETCH_OBJ)){
            $calistenico[] = $calistenicos;
        }

        return $calistenico;
    }
  

    // Consultar 1 calistenico
    public function getCalistenico($id) {

        $calistenico = array();

        $consultaDatosCalistenico = $this->conexion->query("SELECT * FROM CALISTENICO WHERE ID=$id");
        $calistenico=$consultaDatosCalistenico->fetch(PDO::FETCH_OBJ); 

        return $calistenico;
    }



    // Consultar noticias

    public function getNoticias() {

        $noticia= array();

        $consultaDatosNoticias = $this->conexion->query("SELECT * FROM noticia");
        while($noticias=$consultaDatosNoticias->fetch(PDO::FETCH_OBJ)){
                $noticia[] = $noticias;
        }

        return $noticia;
    }

    // Consultar 1 noticia
    public function getNoticia($id) {

        $consultaDatosNoticias = $this->conexion->query("SELECT * FROM noticia WHERE ID=$id");
        $noticia=$consultaDatosNoticias->fetch(PDO::FETCH_OBJ);
        
        return $noticia;
    }

    // Consultar logros
    public function getLogros() {

        $logro= array();
    
        $consultaDatosLogro = $this->conexion->query("SELECT * FROM logro");
        while($logros=$consultaDatosLogro->fetch(PDO::FETCH_OBJ)){
                $logro[] = $logros;
        }
    
        return $logro;
    }

    public function getLogrosCalistenico($id) {

        $logro= array();
    
        $consultaDatosLogro = $this->conexion->query("SELECT l.* FROM logro l JOIN calistenico_logro cl WHERE cl.id_calistenico=$id AND l.id=cl.id_logro");
        while($logros=$consultaDatosLogro->fetch(PDO::FETCH_OBJ)){
                $logro[] = $logros;
        }
    
        return $logro;
    }

    //Consultar ultimo logro
    public function getLastLogro(){
            $consultaLastLogro = "SELECT * FROM logro ORDER BY id DESC LIMIT 1";
            $ultimoLogroId = $this->conexion->query($consultaLastLogro)->fetch(PDO::FETCH_OBJ);
            return $ultimoLogroId;
    }

        
    //Consultar 1 logro
    public function getLogro(){
        $consultaLogros = $this->conexion->query("SELECT * FROM logro WHERE ID=$id");
        $logro = $consultaLogro->fetch(PDO::FETCH_OBJ);
        return $logro;
    }
    
    // Consultar categorias
    public function getCategorias(){

        $categoria=array();
        
        $consultaDatosCategoria = $this->conexion->query("SELECT * FROM categoria");
        while($categorias=$consultaDatosCategoria->fetch(PDO::FETCH_OBJ)){
            $categoria[] = $categorias;
        }

        return $categoria;
    }


    //Consultar 1 categoria
    public function getCategoria($id){
        $consultaCategoria = $this->conexion->query("SELECT * FROM categoria WHERE ID=$id");
        $categoria = $consultaCategoria->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }
    
    //Consultar las categorias de un calistenico
    public function getCategoriasCalistenico($id){
        
        $categoriaC=array();
        
        $consultaDatosCategoriaCalistenico = $this->conexion->query("SELECT c.NOMBRE, cc.* FROM calistenico_categoria cc JOIN categoria c WHERE cc.id_calistenico=$id AND c.id= cc.id_categoria");
        while($categorias=$consultaDatosCategoriaCalistenico->fetch(PDO::FETCH_OBJ)){
            $categoriaC[] = $categorias;
        }

        return $categoriaC;
    }


    // Modificar productos 
    public function modificarProducto($idProducto, $nombreProducto, $descripcionProducto, $tallaProducto, $precioProducto, $stockProducto, $categoriaProducto, $imgProducto) {
     
        $sql= "UPDATE PRODUCTO SET NOMBRE= :nombreProducto, DESCRIPCION=:descripcionProducto, TALLA=:tallaProducto, PRECIO=:precioProducto, STOCK=:stockProducto, CATEGORIA=:categoriaProducto, IMG=:imgProducto WHERE ID=:idProducto";

        $consultamodificarP = $this->conexion->prepare($sql);
        $consultamodificarP->execute(array(":idProducto"=>$idProducto, ":nombreProducto"=>$nombreProducto, ":descripcionProducto" => $descripcionProducto, ":tallaProducto"=>$tallaProducto, ":precioProducto"=>$precioProducto, ":stockProducto"=>$stockProducto, ":categoriaProducto"=>$categoriaProducto, ":imgProducto"=>$imgProducto));
        
    }
  
    // Modificar calistenico
    public function modificarCalistenico($idCalistenico, $nombreCalistenico,$edadCalistenico,$pesoCalistenico, $alturaCalistenico, $fotoCalistenico) {

        $sql = "UPDATE calistenico SET nombre=:nombreCalistenico, edad=:edadCalistenico, peso=:pesoCalistenico, altura=:alturaCalistenico, img=:imgCalistenico WHERE id=:idCalistenico";

        $consultaModificarC = $this->conexion->prepare($sql);
        $consultaModificarC->execute(array(':idCalistenico'=>$idCalistenico, ':nombreCalistenico'=>$nombreCalistenico, ':edadCalistenico'=>$edadCalistenico, ':pesoCalistenico'=> $pesoCalistenico, 'alturaCalistenico'=>$alturaCalistenico, ':imgCalistenico'=>$fotoCalistenico));
    }

  
    // Modificar noticia
    public function modificarNoticia($idNoticia, $tituloNoticia, $contenidoNoticia, $fechaNoticia, $linkNoticia, $imgNoticia, $categoriaNoticia) {

        $sql = "UPDATE noticia SET titulo=:tituloNoticia, contenido=:contenidoNoticia, fecha=:fechaNoticia, link=:linkNoticia, img=:imgNoticia, categoria=:categoriaNoticia WHERE id=:idNoticia";

        $consultamodificarN = $this->conexion->prepare($sql);

        $consultamodificarN->execute(array(':idNoticia'=>$idNoticia, ':tituloNoticia'=>$tituloNoticia, ':contenidoNoticia'=>$contenidoNoticia, 'fechaNoticia'=>$fechaNoticia, ':linkNoticia'=>$linkNoticia, ':imgNoticia'=>$imgNoticia, ':categoriaNoticia'=>$categoriaNoticia));
    }

    
    // Modificar categoria
    public function modificarCategoria($idCategoria, $nombreCategoria){
        
        $sql = "UPDATE categoria SET nombre=:nombreCategoria WHERE ID=:idCategoria";
        
        $consultamodificarCa = $this->conexion->prepare($sql);
        $consultamodificarCa->execute(array(':idCategoria'=>$idCategoria, ':nombreCategoria'=>$nombreCategoria));
    }


    // Modificar logro
    public function modificarLogro($idLogro, $nombreLogro,$fechaLogro,$idCategoria){
        
            $sql = "UPDATE logro SET nombre=:nombreLogro, fecha=:fechaLogro, id_categoria=:idCategoria WHERE ID=:idLogro";
            
            $consultamodificarL = $this->conexion->prepare($sql);
            $consultamodificarL->execute(array(':nombreLogro'=>$nombreLogro,':fechaLogro'=>$fechaLogro, ':idCategoria'=>$idCategoria,':idLogro'=>$idLogro));
    }
    
    // Añadir producto
    public function nuevoProducto($nombreProducto, $descripcionProducto, $precioProducto, $stockProducto, $categoriaProducto, $tallaProducto, $imgProducto){
        $sql="INSERT INTO producto (nombre, descripcion, talla, precio, stock, categoria,img) VALUES (:nombreProducto,:descripcionProducto,:tallaProducto,:precioProducto,:stockProducto,:categoriaProducto,:imgProducto)";

        $consultaAddProducto = $this->conexion->prepare($sql);
        $consultaAddProducto->execute(array(":nombreProducto"=>$nombreProducto, ":descripcionProducto" => $descripcionProducto, ":precioProducto"=>$precioProducto, ":stockProducto"=>$stockProducto, ":categoriaProducto"=>$categoriaProducto, ":tallaProducto"=>$tallaProducto, ":imgProducto"=>$imgProducto));

    }

    //Añadir Noticia
    public function nuevoNoticia($tituloNoticia, $contenidoNoticia,$fechaNoticia,$linkNoticia,$imgNoticia,$categoriaNoticia){
        $sql="INSERT INTO noticia (titulo,contenido,fecha,link,img,categoria) VALUES (:tituloNoticia,:contenidoNoticia,:fechaNoticia,:linkNoticia,:imgNoticia,:categoriaNoticia)";

        $consultaAddNoticia=$this->conexion->prepare($sql);
        $consultaAddNoticia->execute(array(':tituloNoticia'=>$tituloNoticia, ':contenidoNoticia'=>$contenidoNoticia, 'fechaNoticia'=>$fechaNoticia, ':linkNoticia'=>$linkNoticia, ':imgNoticia'=>$imgNoticia, ':categoriaNoticia'=>$categoriaNoticia));
    }

    //Añadir Calistenico
    public function nuevoCalistenico($nombreCalistenico,$edadCalistenico,$pesoCalistenico,$alturaCalistenico,$imgCalistenico){
        $sql="INSERT INTO calistenico (nombre,edad,peso,altura,img) VALUES (:nombreCalistenico,:edadCalistenico,:pesoCalistenico,:alturaCalistenico, :imgCalistenico)";

        $consultaAddCalistenico=$this->conexion->prepare($sql);
        $consultaAddCalistenico->execute(array(':nombreCalistenico'=>$nombreCalistenico, ':edadCalistenico'=>$edadCalistenico, ':pesoCalistenico'=> $pesoCalistenico, 'alturaCalistenico'=>$alturaCalistenico, ':imgCalistenico'=>$imgCalistenico));
    }

    //Añadir Logro a un Calistenico
    public function nuevoLogro($idCalistenico,$nombreLogro,$fechaLogro,$idCategoria){
        
        //Añadimos el logro
        $sql="INSERT INTO logro (nombre,fecha,id_categoria) VALUES (:nombreLogro,:fechaLogro,:idCategoria)";

        $consultaAddLogro=$this->conexion->prepare($sql);
        $consultaAddLogro->execute(array(':nombreLogro'=>$nombreLogro, ':fechaLogro'=>$fechaLogro, ':idCategoria'=>$idCategoria));

        //Cogemos el ID del ultimo logro que hemos introducido
        $sql2 = "SELECT * FROM logro ORDER BY id DESC LIMIT 1";
        $ultimoLogroId = $this->conexion->query($sql2)->fetch(PDO::FETCH_OBJ);
        
        $ultimoId=$ultimoLogroId->ID;

        //Relacionamos el calistenico con el ultimo logro
        $sql="INSERT INTO calistenico_logro (id_calistenico, id_logro) VALUES (:idCalistenico,:idLogro)";
        $consultaCalLogro=$this->conexion->prepare($sql);
        $consultaCalLogro->execute(array(':idCalistenico'=>$idCalistenico, ':idLogro'=>$ultimoId));    
    }


    //Añadir Categoria a un Calistenico
    public function nuevoCategoria($idCalistenico,$idCategoria){
        $sql="INSERT INTO calistenico_categoria (id_calistenico, id_categoria) VALUES (:idCalistenico, :idCategoria)";

        $consultaAddCategoria=$this->conexion->prepare($sql);
        $consultaAddCategoria->execute(array(':idCalistenico'=>$idCalistenico, ':idCategoria'=>$idCategoria));
    }

   // Eliminar noticia
    public function eliminarNoticia($idNoticia) {
        $sql = "DELETE FROM noticia WHERE id=:idNoticia";
        $consultaEliminarN =$this->conexion->prepare($sql);
        $consultaEliminarN->execute(array(':idNoticia'=>$idNoticia));
    }

   // Eliminar producto

    public function eliminarProducto($idProducto) {
        $sql = "DELETE FROM producto WHERE id=:idProducto";
        $consultaEliminarP=$this->conexion->prepare($sql);
        $consultaEliminarP->execute(array(':idProducto'=>$idProducto));
    }


   // Eliminar calistenico
    public function eliminarCalistenico($idCalistenico) {

        $sql="DELETE FROM calistenico_logro WHERE id_calistenico=:idCalistenico";
        $consultaEliminarC=$this->conexion->prepare($sql);
        $consultaEliminarC->execute(array(':idCalistenico'=>$idCalistenico));
        
        $sql="DELETE FROM calistenico WHERE id=:idCalistenico";
        $consultaEliminarC=$this->conexion->prepare($sql);
        $consultaEliminarC->execute(array(':idCalistenico'=>$idCalistenico));
    }

   // Eliminar categoria
   public function eliminarCategoria($idCategoria) {
        $sql="DELETE FROM categoria WHERE id=:idCategoria";
        $consultaEliminarC=$this->conexion->prepare($sql);
        $consultaEliminarC->execute(array(':idCategoria'=>$idCategoria));
    }
    
    // Eliminar logro de calistenico
    public function eliminarLogro($idLogro){

        $sql="DELETE FROM calistenico_logro WHERE id_logro=:idLogro";
        $consultaEliminarCL=$this->conexion->prepare($sql);
        $consultaEliminarCL->execute(array(':idLogro'=>$idLogro));

        $sql="DELETE FROM logro WHERE id=:idLogro";
        $consultaEliminarL=$this->conexion->prepare($sql);
        $consultaEliminarL->execute(array(':idLogro'=>$idLogro));
    }

    //Eliminar categoria de calistenico
    public function eliminarCategoriaCalistenico($idCC){

        $sql="DELETE FROM calistenico_categoria WHERE id=:idCC";
        $consultaEliminarCC=$this->conexion->prepare($sql);
        $consultaEliminarCC->execute(array(':idCC'=>$idCC));
    }
}
?>