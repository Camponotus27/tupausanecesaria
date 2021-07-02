
var $tituloLginClic = document.querySelector('.titulo_login_clic');
var $panelLogin = document.querySelector('.panel-login');

$tituloLginClic.addEventListener('click', function(){
	if(!window.matchMedia("screen and (min-width: 768px)").matches){
		$panelLogin.classList.toggle('mostrar_panel_login');	
	}
});

var $tituloRegisterClic = document.querySelector('.titulo_register_clic');
var $panelRegister = document.querySelector('.panel-register');

$tituloRegisterClic.addEventListener('click', function(){
	if(!window.matchMedia("screen and (min-width: 768px)").matches){
		$panelRegister.classList.toggle('mostrar_panel_login');
	}
}); 


if(window.matchMedia("screen and (min-width: 768px)").matches){
		$panelLogin.classList.add("mostrar_panel_login");
		$panelRegister.classList.add("mostrar_panel_login");

}


var mql = window.matchMedia('screen and (min-width: 768px)');

function screenTest(e) {
  if (e.matches) {
		$panelLogin.classList.add("mostrar_panel_login");
		$panelRegister.classList.add("mostrar_panel_login");
  } else {
  		$panelLogin.classList.remove("mostrar_panel_login");
		$panelRegister.classList.remove("mostrar_panel_login");
  }
}

mql.addListener(screenTest);