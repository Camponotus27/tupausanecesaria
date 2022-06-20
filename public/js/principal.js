// mumero maximo en text area
var $numero = $('#max-descripcion-numero');
var $textarea = $('#max-descripcion-textarea');


$textarea.on('keyup', function(){
	$numero.text(500 - $(this).val().length);
});


var $numero2 = $('#max-descripcion-numero-2');
var $textarea2 = $('#max-descripcion-textarea-2');


$textarea2.on('keyup', function(){
	$numero2.text(500 - $(this).val().length);
});

//desactivar checkbox permiso
var $check = $('#radio-check-personalizar');
var $opciones = $('.chekbox-permisos');
var $lista = $('#radio-check-personalizar-lista');

var La_funcion = function() {

   	if($check.length > 0){
	   	 if( $check.is(':checked')) {
	        $opciones.removeAttr('disabled');
	    }else{
	    	$opciones.prop('disabled' , 'disabled');
	    }
	}

};

$check.ready(La_funcion);
$lista.click(La_funcion);


// rol-slug-form

var $rolslug = $('#slug');
var $rolnom = $('#name');

var funcion_slug_rol = function(){
	$rolslug.prop('value', $rolnom.val());
};

$rolnom.on('keyup', funcion_slug_rol );

$check.ready(funcion_slug_rol);

//Video reverse https://www.w3schools.com/tags/ref_av_dom.asp

