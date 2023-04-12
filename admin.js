$(document).ready(function () {

  $(document).on("click","#volver", function () {
    location.reload();  
  });

    $(document).on("click","#mNotis",function (e) {
        e.preventDefault();
        $(".principalNotis").removeClass("d-none");
        $(".principalProductos").addClass("d-none");
        $(".principalMiembros").addClass("d-none"); 
        $(".principalGaleria").addClass("d-none"); 
    });

    $(document).on("click","#mProductos",function (e) {
        e.preventDefault();
        $(".principalProductos").removeClass("d-none"); 
        $(".principalMiembros").addClass("d-none");
        $(".principalNotis").addClass("d-none");
        $(".principalGaleria").addClass("d-none");
    });


    $(document).on("click","#mGaleria",function (e) {
        e.preventDefault();
        $(".principalProductos").addClass("d-none");
        $(".principalMiembros").addClass("d-none"); 
        $(".principalNotis").addClass("d-none");
        $(".principalGaleria").removeClass("d-none");

    });

    
    $(document).on("click","#mMiembros",function (e) {
      e.preventDefault();
      console.log("holi");
      $(".principalProductos").addClass("d-none"); 
      $(".principalNotis").addClass("d-none");
      $(".principalGaleria").addClass("d-none");
      $(".principalMiembros").removeClass("d-none");
  });



    
    $(document).on("click","#buscarProducto",function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        console.log(id);

        $("#ProductoEditar").removeClass("d-none"); 

        $.post("verEventos.php", {"accion":"verProducto", "id":id},
        function (data, textStatus, jqXHR) {
          let producto = JSON.parse(data);
          $("#Prodnombre").val(producto.NOMBRE);
          $("#Proddescripcion").val(producto.DESCRIPCION);
          $("#Prodtalla").val(producto.TALLA);
          $("#Prodprecio").val(producto.PRECIO);
          $("#Prodestock").val(producto.STOCK);
          $("#Prodcategoria").val(producto.CATEGORIA);
          $("#Prodimagen").attr('src','Imagenes\\'+producto.IMG);
          $("#Prodimagen2").val(producto.IMG);
          $("#Prodid").val(producto.ID);

        }
      );

    });


    $(document).on("click","#buscarNoticia",function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $("#NoticiaEditar").removeClass("d-none"); 

        $.post("verEventos.php", {"accion":"verNoticia", "id":id},
        function (data, textStatus, jqXHR) {
          let noti = JSON.parse(data);
          $("#Notititulo").val(noti.TITULO);
          $("#Noticontenido").val(noti.CONTENIDO);
          $("#Notifecha").val(noti.FECHA);
          $("#Notilink").val(noti.LINK);
          $("#Noticategoria").val(noti.CATEGORIA);
          $("#Notimagen").attr('src','Imagenes\\'+noti.IMG);
          $("#Notimagen2").val(noti.IMG);
          $("#Notid").val(noti.ID);
        }
      );

    });


    
    $(document).on("click","#buscarImagen",function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);

        $("#GaleriaEditar").removeClass("d-none"); 

        $.post("verEventos.php", {"accion":"verGaleria", "id":id},
        function (data, textStatus, jqXHR) {

          let foto = JSON.parse(data);
          console.log(data)
          $("#Fotocategoria").val(foto.CATEGORIA);
          $("#Fotoformato").val(foto.FORMATO);
          $("#Fotofecha").val(foto.FECHA);
          $("#Foto2").val(foto.IMG);
          $("#Fotoid").val(foto.ID);

          if(foto.FORMATO=='video'){
            $("#Fotomedia").html('<video src="Imagenes\\'+ foto.IMG +'" type="video/mp4" controls width="250px"></video>');
          }
          else{
            $("#Fotomedia").html('<img src="Imagenes\\'+ foto.IMG +'" width="250px">');
          }
         
        }
      );

    });


});