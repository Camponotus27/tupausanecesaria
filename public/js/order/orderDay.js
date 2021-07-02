///////////////// DELETE ////////////////


window.addEventListener('load', function(){



	
	var formBotones = {
			formss: null,
			formB: null,
			status: null,
			hidden: null,
			run: function(){

				formBotones.formB = document.querySelectorAll('.botonFormOrdeDay');
				 
				 for( var i = 0 ; i < formBotones.formB.length ; i++){
				 	formBotones.formB[i].addEventListener('click' , formBotones.clickButtom , false);
				 }
	
			},
			clickButtom: (e)=>{

				id = e.target.dataset.orderid;
			
				formBotones.status = document.querySelector('.statusbFOD-' + id);
				formBotones.formss = document.querySelector('.formsOrderDay-' + id);
				formBotones.hidden = document.querySelector('.hiddenFormOrdeDay-' + id);


				var x = e.target.classList[2];
				switch (x){
					case "bFOD1":
							formBotones.bFOD1( formBotones.status , e.target);
							break;
					case "bFOD2":
							formBotones.bFOD2( formBotones.status , e.target);
							break;
					case "bFOD3":
							formBotones.bFOD3( formBotones.status , e.target);
							break;
					case "bFODI":
							formBotones.bFODI( formBotones.status , e.target);
							break;
					case "bFODD":
							formBotones.bFODD( formBotones.status , e.target);
							break;
				}

				formBotones.status.addEventListener('change', formBotones.iniciarForm(), false)
			},
			bFOD1: (status , boton)=>{
				status.innerText = "creado";
				status.style.background = 'red';
				status.style.color = 'white';
			},
			bFOD2: (status , boton)=>{
				status.innerText = "preparando";
				status.style.background = 'yellow';
				status.style.color = 'black';
			},
			bFOD3: (status , boton)=>{
				status.innerText = "servido";
				status.style.background = 'green';
			},
			bFODI: (status , boton)=>{

				
				if(status.innerText.toLowerCase() == "preparando"){
					formBotones.bFOD1(status , boton);
				}else if(status.innerText.toLowerCase() == "servido"){
					formBotones.bFOD2(status , boton);
				}else if(status.innerText.toLowerCase() == "creado"){
					
				}else{
					formBotones.bFOD1(status , boton);
				}
			},
			bFODD: (status , boton)=>{
				if(status.innerText.toLowerCase() == "creado"){
					formBotones.bFOD2(status , boton);
				}else if(status.innerText.toLowerCase() == "preparando"){
					formBotones.bFOD3(status , boton);
				}else if(status.innerText.toLowerCase() == "servido"){
					
				}else{
					formBotones.bFOD1(status , boton);
				}
			},
			iniciarForm: function(){
				formBotones.hidden.setAttribute('value', formBotones.status.innerText.toLowerCase());
			}
		};
	




	$(".formsOrderDay").on("submit" , function(e){
		e.preventDefault();

		var $form = $(this);		
		//peticion AJAX

		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			dataType:"JSON",
			beforeSend:function(){
				
			},
			success:function(data){
				if($form.find('.statusbFOD').text() == "servido"){
			    	removeContOrderDay($form);
				}
			},
			error:function(error){
				
				console.log(error);
				$($form).closest('.contOrdersDay').css('background','white');
			},
		});

		return false;
	});



function removeContOrderDay($form){
	$($form).closest('.contOrdersDay').fadeOut(500, function(){ 
		$(this).remove();
	});
}

formBotones.run();
	
} ,false);