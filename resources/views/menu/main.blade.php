@extends ('layouts.admin')
@section ('contenido')
<div class="background_image">
	<img src="{{asset('img/Cafetres.jpg')}}" alt="">
</div>


<!-- Video -->

<div class="container_video_background">
	@include('menu.menu-button')
	<video muted autoplay loop="loop" poster="{{asset('img/coffe.jpg')}}" preload="auto" class="video_background" >
  		<source src="{{asset('img/coffe.mp4')}}" media="(max-width:768px)"/>
  		<source src="{{asset('img/coffe.webm')}}" media="(max-width:768px)"type="video/webm" />
  		<source src="{{asset('img/coffe_1.ogv')}}" media="(max-width:768px)" type="video/ogg"/>
  		<source class="video_background_img" src="{{asset('img/coffe_imagen.jpg')}}" alt="">
	</video>
</div>



<div class="conteiner-panel txl">
	<h1 class="titulo_linea_inferior txl">¡¡Bienvenido!!</h1>
	<p class="margin-bottom-xl">
		"Descubre a pocos pasos del banco estado de buin, este pequeño espacio donde podras disfrutar con quien desees una pausa rodeada de tranquilidad, buena musica, los mejores productos artesanales, escapando de la rutina"
	</p>											

</div>

<div class="Hueco_backgroud"></div>

<div class="container-localizacion flex-row-center">
	<div class="localizacion-descripcion txl">
		<h3>Encuentranos en la calle José Manuel Balmaceda, Buin</h3>
		<h3>Frente al banco estado</h3>
	</div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6636.1513413727425!2d-70.7411582095385!3d-33.73285934681358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966922399dca91f1%3A0x5ce583070cb3a89f!2sStopTime!5e0!3m2!1ses-419!2scl!4v1529463931505" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

@endsection

