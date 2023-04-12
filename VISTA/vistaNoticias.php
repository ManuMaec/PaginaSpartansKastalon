<?php
    require_once("../modelo/modeloAdmin.php");
    $admin = new Administrador ();
    $noticias = $admin->getNoticias();
?>
<header>CABECERA Y COSAS </header>
<section>
    <?php foreach($noticias as $noticia):?>
    
    <article class="noticia">
        <h1 class="titulo"><?php echo $noticia->TITULO ?></h1>
        <img src="<?php echo $noticia->IMG ?>">
        <?php echo $noticia->CONTENIDO ?>
        <?php echo $noticia->FECHA ?>
        <?php echo $noticia->CATEGORIA ?>
    </article>

    <?php endforeach; ?>
<section>
