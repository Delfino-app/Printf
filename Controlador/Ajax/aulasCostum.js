
  $(document).ready(function(){
	
  	$('.modal-trigger').leanModal({
      dismissible: false, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      starting_top: '4%', // Starting top style attribute
      ending_top: '10%', // Ending top style attribute
      ready: function() {}, // Callback for Modal open
      complete: function() {} // Callback for Modal close
    });

	//$('#teste').openModal();
	//$('#dicaAulaModal').hide();
  });

  	var n = 0;

	$('#btnSeguinteModal').click(function(){

		if (n == 0) {

			$('#resumoAulaModal').hide();
		  	$('#dicaAulaModal').addClass('fadeInLeft animated');
		  	$('#dicaAulaModal').show();

		  	n +=1;
		  	$('#btnSeguinteModal').html('Começar');
		}
		else{

			$('#teste').closeModal();
		}
	});

	function terminarAula(x){

		if (x!=0) {

			var terminarAulaRef = x;
			/*Opção - Sim*/
			$.ajax({

				url:'Controlador/Ajax/aulasAjax.php',
				type:'POST',
				data:{terminarAulaRef:terminarAulaRef},
				beforeSend:function(){
					$('#displayInfoTerminarAulaModal').html("Aguarde...");
				},
				success:function(response){
				    $('#displayInfoTerminarAulaModal').html(response);
				}
			});
		}
		if (x == 0) {
			/*Opção - Não*/
			$('#fim').closeModal();
		}
	}

	$('#frmAddAnotacoesAula').submit(function(event){

			event.preventDefault();

			var anotacaoAula = document.querySelector('#AnotacoesAulaAdd').value;
			var anotacaoAulaId = document.querySelector('#AnotacoesAulaAddId').value;

			$.ajax({

				url:'Controlador/Ajax/aulasAjax.php',
				type:'POST',
				data:{anotacaoAulaId:anotacaoAulaId,anotacaoAula:anotacaoAula},
				beforeSend:function(){
					
				},
				success:function(response){
				    
				    alert(response);
				}
			});

	});

	$('#frmAddDuvidaAula').submit(function(event){

		event.preventDefault();

		var duvidaAulaAdd = document.querySelector('#duvidaAulaAdd').value;
		var duvidaAulaAddId = document.querySelector('#duvidaAulaIdAdd').value;

		$.ajax({

			url:'Controlador/Ajax/aulasAjax.php',
			type:'POST',
			data:{duvidaAulaAddId:duvidaAulaAddId,duvidaAulaAdd:duvidaAulaAdd},
			beforeSend:function(){
				
			},
			success:function(response){
			    
			   $('#displayDuvidas').html(response);
			}
		});
	});
