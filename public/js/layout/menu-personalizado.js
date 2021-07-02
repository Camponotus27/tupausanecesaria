//boton menu

var $botonMenuMovile = document.querySelector('.conteiner-barrita-menu');
var $conteinerMenuMovile = document.querySelector('.container-buttons-botom');
var $btnMenuRight = document.querySelector('.item-buttons-botom-right');
var $btnMenuLeft = document.querySelector('.item-buttons-botom-left');



$botonMenuMovile.addEventListener('click' , menuMovileActive );
$btnMenuLeft.addEventListener('click' , menuMovileActive );
$btnMenuRight.addEventListener('click' , menuMovileActive );



function menuMovileActive(){
	
if(!window.matchMedia("screen and (min-width: 768px)").matches){
	var $btn1Menu1 = document.querySelector('.item-buttons-botom-right');
	var $btn1Menu2 = document.querySelector('.item-buttons-botom-left');
	

	if(!$conteinerMenuMovile.classList.contains('menu-movile-active')){
		var $heightHeaderMenu = 70;
  
		//var $btnMenu1 = document.querySelector('.item-buttons-botom-right').childNodes;
		var $btnMenu2 = document.querySelector('.item-buttons-botom-left').childNodes;

		/*var $contador1Div = 0;
		for(i=0; i< $btnMenu1.length; i++){
			if($btnMenu1[i].nodeName == 'DIV'){
				$contador1Div++;
			}
		}	*/
		var $contador2Div = 0;
		for(i=0; i< $btnMenu2.length; i++){
			if($btnMenu2[i].nodeName == 'DIV'){
				$contador2Div++;
			}
		}

		var $hieght2 = $heightHeaderMenu ;
		var $hieght1 = $hieght2 + (42 * $contador2Div);

	}else{
		var $hieght2 = -42*3;
		var $hieght1 = -42*3;
	}

		var $heightpx1 = $hieght1 + "px";
		var $heightpx2 = $hieght2 + "px";

		$btn1Menu2.style.top = $heightpx2;
		$btn1Menu1.style.top = $heightpx1;


	$conteinerMenuMovile.classList.toggle("menu-movile-active");
	//$btn1Menu1.classList.toggle("menu-movile-active");
	//$btn1Menu2.classList.toggle("menu-movile-active");
}
	
}

function menuMovileActive2(){
	
	if(!window.matchMedia("screen and (min-width: 768px)").matches){
		var $btn1Menu1 = document.querySelector('.item-buttons-botom-right');
		var $btn1Menu2 = document.querySelector('.item-buttons-botom-left');
		

		if($conteinerMenuMovile.classList.contains('menu-movile-active')){
			var $heightHeaderMenu = 70;
	  
			//var $btnMenu1 = document.querySelector('.item-buttons-botom-right').childNodes;
			var $btnMenu2 = document.querySelector('.item-buttons-botom-left').childNodes;

			/*var $contador1Div = 0;
			for(i=0; i< $btnMenu1.length; i++){
				if($btnMenu1[i].nodeName == 'DIV'){
					$contador1Div++;
				}
			}	*/
			var $contador2Div = 0;
			for(i=0; i< $btnMenu2.length; i++){
				if($btnMenu2[i].nodeName == 'DIV'){
					$contador2Div++;
				}
			}

			var $hieght2 = $heightHeaderMenu ;
			var $hieght1 = $hieght2 + (42 * $contador2Div);

		}else{
			var $hieght2 = -42*3;
			var $hieght1 = -42*3;
		}

			var $heightpx1 = $hieght1 + "px";
			var $heightpx2 = $hieght2 + "px";

			$btn1Menu2.style.top = $heightpx2;
			$btn1Menu1.style.top = $heightpx1;
	}
  
}

var mql = window.matchMedia('screen and (min-width: 768px)');

function screenTest(e) {
  if (e.matches) {
    var $btn1Menu1 = document.querySelector('.item-buttons-botom-right');
	var $btn1Menu2 = document.querySelector('.item-buttons-botom-left');

	$btn1Menu2.style.top = "auto";
	$btn1Menu1.style.top = "auto";
  } else {
  	
    menuMovileActive2();

  }
}

mql.addListener(screenTest);