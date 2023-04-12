
<?php
    if(isset($_POST["registrar"])){
    try{
    $conexion = new PDO("mysql:host=localhost;dbname=spartans","root","");
    $conexion->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
    $conexion->exec("SET CHARACTER SET utf8");

    $usuario= $_POST["nombre"];
    $password = $_POST["pass"];

    $query ="INSERT INTO usuario(id,nombre, clave) VALUES(NULL,'". $usuario . "', '" . $password . "')";

    $resultado=$conexion->prepare($query);
    $resultado->execute(array());
    
    header("Location:main.php");
    }catch(Exception $e){
        die("Error".$e->getMessage());
    }
    }
        
    if(isset($_POST["enviar"])){
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=spartans", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $consulta = "SELECT * FROM usuario WHERE nombre=:nombre AND clave=:pass";
        
            $resultado= $conexion->prepare($consulta);
        
            $nombre = htmlentities(addslashes($_POST["nombre"]));
            $pass = htmlentities(addslashes($_POST["pass"]));
        
            $resultado -> bindValue(":nombre", $nombre);
            $resultado -> bindValue(":pass", $pass);
        
            $resultado->execute();
        
            if($resultado->rowCount()!=0){
                session_start();
                $_SESSION["usuario"]=$_POST["nombre"];
                header("location:panelAdmin.php");
            }else{
                header("location:index.php");
            }
       
        
        }catch(Exception $e){
            die("Error".$e->getMessage());
        }
        }
?>


