var botonOpciones = {
	botonO: document.querySelector('.boton-opciones'),
	conteinerO: document.querySelector('.container-menu-herramientras'),
	claseMostrar: 'mostrar-container-menu-herramientras',

	inicio: function() {
		botonOpciones.botonO.addEventListener('click', botonOpciones.mostrarO);
	},
	mostrarO: function() {
		botonOpciones.conteinerO.classList.toggle(botonOpciones.claseMostrar);
	},
	añadirO: function() {
		botonOpciones.conteinerO.classList.add(botonOpciones.claseMostrar);
	},
	removerO: function() {
		botonOpciones.conteinerO.classList.remove(botonOpciones.claseMostrar);
	},
}


var mql2 = window.matchMedia('screen and (min-width: 768px)');

function ventanaEvent(e) {
	botonOpciones.removerO();
}

mql2.addListener(ventanaEvent);

botonOpciones.inicio();


ventanaEvent(mql2);