

$(document).ready(function () {

  contadorhover=0  
  contadorhovercontenido=0  
  console.log(contadorhover)
 
//SUBMENUS DESPEGABLES   
$("#enlacesobrenosotros").mouseover(function(){

  contadorhover++
  console.log(contadorhover)

  if(contadorhover==1){
    contadorhover=2
  }
  
  if(contadorhover==2){
  $('#opcionsobrenosotros').css({opacity:"1"})
  $('#opcionsobrenosotros').css({transform:"translateY(-10px)"})

  }
  if(contadorhover>2){
      $('#opcionsobrenosotros').css({opacity:"0"})
      $('#opcionsobrenosotros').css({transform:"translateY(-30px)"})
    contadorhover=0
  }


 

})

$("#enlacecontenido").mouseover(function(){

  contadorhovercontenido++
  console.log(contadorhovercontenido)
  if(contadorhovercontenido==1){
    contadorhovercontenido=2
  }
  
  if(contadorhovercontenido==2){
  $('#opcioncontenido').css({opacity:"1"})
  $('#opcioncontenido').css({transform:"translateY(-10px)"})

  }
  if(contadorhovercontenido>2){
      $('#opcioncontenido').css({opacity:"0"})
      $('#opcioncontenido').css({transform:"translateY(-30px)"})
    contadorhovercontenido=0
  }


 

})

// FIN DE LOS SUBMENUS


// LOGIN OCULTO PARA EL ADMIN

$("#flechaoculta").click(function(){


$("#flechaoculta").css({

  transform:"translateX(20px)"

})



})

//ENLACES A LAS DIFERENTES CATEGORIAS

$("#enlaceindex").click(function (e) { 
window.location.replace("index.php");
});

$("#enlacetienda").click(function(){

console.log("hola")

window.location.replace("tiendacarrito.php")



})

$("#enlacenoticias").click(function(){

console.log("hola")

window.location.replace("noticias.php")



})
$("#enlacegaleria").click(function(){

console.log("hola")

window.location.replace("galeria.php")



})

$("#enlaceunete").click(function(){

  console.log("hola")
  
  window.location.replace("unete.php")
  
  
  
  })
  


//Ventanas emergentes

$("#cerraremergente").click(function(){

$(".contenedornegro").addClass("d-none")
$(".ventanainiciar").addClass("d-none")
$(".ventanacarrito").addClass("d-none")


})

$("#cerraremergentelogin").click(function(){


$(".ventanainiciar").addClass("d-none")
$(".contenedornegro").addClass("d-none")



})



/// Stages Galeria

$("#mostrar").click(function(){
  $(".imagenes").removeClass("d-none");
  $(".imagenes1").addClass("d-none");
  $(".cartelStages").html("");
  $(".btfecha1").addClass("d-none");
  $(".btfecha2").addClass("d-none");
  $(".imgStages").addClass("d-none");
});

$("#mostrar1").click(function(){
  $(".imagenes1").removeClass("d-none");
  $(".imagenes").addClass("d-none");
  $(".cartelStages").html("");
  $(".btfecha1").addClass("d-none");
  $(".btfecha2").addClass("d-none");
  $(".imgStages").addClass("d-none");
});

$("#mostrarStages").on("click", function () {
  $(".btfecha2").addClass("d-none");
  $(".btfecha1").removeClass("d-none");
  $(".imagenes1").addClass("d-none");
  $(".imagenes").addClass("d-none");
  $(".imgStages").html("");
});

$("#mostrarEventos").on("click", function () {
  $(".btfecha1").addClass("d-none");
  $(".btfecha2").removeClass("d-none");
  $(".imagenes1").addClass("d-none");
  $(".imagenes").addClass("d-none");
  $(".imgStages").html("");
});

$(".btnStages").on("click", function () {

  let anio = $(this).attr("id");
  console.log("Este es el año" + anio );

  $(".imgStages").html("");
  $(".cartelStages").html("");
  $(".imgStages").removeClass("d-none")
  $(".imagenes1").addClass("d-none");
  $(".imagenes").addClass("d-none");

  $.post("verEventos.php", {"accion":"verStages", "fecha":anio},
    function (data, textStatus, jqXHR) {
     
     
      let fotos = JSON.parse(data);
      
      $.each(fotos, function (indexInArray, foto) {
        if (foto.FORMATO=="cartel")
          $(".cartelStages").append(`<div class="cartelImagen"> <img src="Imagenes\\${foto.IMG}" class="cartelImagen" width="600" heigth="600"></div>`);
        else if (foto.FORMATO=="imagen")
          $(".imgStages").append(`<div class="fotoStage"><img src="Imagenes\\${foto.IMG}" class="fotoStage" width="400" heigth="400"></div>`);
        else if (foto.FORMATO=="video")
          $(".imgStages").append(`<video src="Imagenes\\${foto.IMG}" class="videoStage" type="video/mp4" controls width="400" heigth="400"></video>`);
      });
    
    }
  );

});

$(".btnEventos").on("click", function () {

  let anio = $(this).attr("id");
  console.log("Este es el año" + anio );

  $(".imgStages").html("");
  $(".cartelStages").html("");
  $(".imgStages").removeClass("d-none")
  $(".imagenes1").addClass("d-none");
  $(".imagenes").addClass("d-none");

  $.post("verEventos.php", {"accion":"verEventos", "fecha":anio},
    function (data, textStatus, jqXHR) {
      
      let fotos = JSON.parse(data);
      
      $.each(fotos, function (indexInArray, foto) {
        console.log(fotos);
        if (foto.FORMATO=="cartel")
          $(".cartelStages").append(`<div class="cartelStage"> <img src="Imagenes\\${foto.IMG}"  width="400" heigth="400"></div><br>`);
        else if (foto.FORMATO=="imagen")
          $(".imgStages").append(`<div class="fotoStage"><img src="Imagenes\\${foto.IMG}" width="400" heigth="400"></div>`);
        else if (foto.FORMATO=="video")
          $(".imgStages").append(`<video src="Imagenes\\${foto.IMG}" class="videoStage" type="video/mp4" controls  width="400" heigth="400"></video>`);
      });
    
    }
  );

});
$("#enlacecontacto").click(function(){
  window.scrollTo(0,document.body.scrollHeight);
});
});