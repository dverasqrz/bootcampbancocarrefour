$(function() {

	'use strict';

	// Form

	var contactForm = function() {

		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: "required",
					email: {
						required: true,
						email: true
					},
					message: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Digite seu nome",
					email: "Digite um email válido",
					message: "Digite uma mensagem"
				},
				/* submit via ajax */
				submitHandler: function(form) {		
					var $submit = $('.submitting'),
						waitText = 'Enviando...';

					$.ajax({   	
				      type: "POST",
				      url: "/php/envia-mensagem.php",
				      data: $(form).serialize(),

				      beforeSend: function() { 
				      	$submit.css('display', 'block').text(waitText);
				      },
				      success: function(msg) {
		               if (msg == 'OK') {
		               	$('#form-message-warning').hide();
				            setTimeout(function(){
		               		$('#contactForm').fadeOut();
		               	}, 1000);
				            setTimeout(function(){
				               $('#form-message-success').fadeIn();   
		               	}, 1400);
			               
			            } else {
			               $('#form-message-warning').html(msg);
				            $('#form-message-warning').fadeIn();
				            $submit.css('display', 'none');
			            }
				      },
				      error: function() {
				      	$('#form-message-warning').html("Algo de errado aconteceu. Tenta novamente, certo?");
				         $('#form-message-warning').fadeIn();
				         $submit.css('display', 'none');
				      }
			      });    		
		  		}
				
			} );
		}
	};
	contactForm();

});