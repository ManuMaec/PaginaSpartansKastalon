<?php

if(!isset($_GET["buscando"])) {
    $productos = Cliente::getProductos($conexion);
    $idFormulario = 1;

    echo
    '<div class="contenedortienda">
        <div class="columnaproductos">';

    foreach($productos as $producto) {
  
        echo
                '<div class="producto">
                    <div class="contenedorimg"> 
                        <img src="Imagenes/'.$producto['IMG'].'">
                                <button type="submit" id="botoncomprar" name="anadiendo" form="'.$idFormulario.'">Añadir a la cesta</button>
                    </div>
                        <h2>'.$producto['NOMBRE'].'</h2>
                        <h3>'.$producto['PRECIO'].'</h3>
                </div>
                <form action="tiendacarrito.php" method="GET" id="'.$idFormulario.'">
                    <input type="hidden" value='.$producto['ID'].' name="idAnadir_enviado">
                </form>';

        $idFormulario +=1;
    }
    echo
        '</div>
    </div>';
}


?>