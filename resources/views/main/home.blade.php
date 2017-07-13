@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){

  $('#myModal').modal('show')
});
</script>
    <!--/Menu-->

    <!--Carousel-->
      <div id="carousel-container">
        <div id="productosCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#productosCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#productosCarousel" data-slide-to="1"></li>
            <li data-target="#productosCarousel" data-slide-to="2"></li>
            <li data-target="#productosCarousel" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
              <img src="CelularesPeru/imagenes/portada1.jpg" alt="Primer producto">
              <div class="carousel-caption">

              </div>
            </div>


            <div class="carousel-item">
              <img src="CelularesPeru/imagenes/portada2.jpg" alt="Segundo producto">
               <div class="carousel-caption">

               </div>
            </div>

            <div class="carousel-item">
               <img src="CelularesPeru/imagenes/portada3.jpg" alt="Tercer producto">
                <div class="carousel-caption">

                </div>
            </div>



            <div class="carousel-item">
              <img src="CelularesPeru/imagenes/portada4.jpg" alt="Cuarto producto">
               <div class="carousel-caption">

                
              </div>


            
          </div>
          <a class="left carousel-control" href="#productosCarousel" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Producto Anterior</span>
          </a>
          <a class="right carousel-control" href="#productosCarousel" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Producto Siguiente</span>
          </a>
        </div>
      </div>
    <!--/Carousel-->
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/pQqH-GkkfWg?autoplay=1" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">CERRAR</button>
       
      </div>
    </div>
  </div>
</div>

@stop