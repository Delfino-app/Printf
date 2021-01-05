
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
});
function requisisaoPagina(pagina){

	var paginaAjax = pagina;

	var display = document.getElementById('testeDisplay');

	$.ajax({

		url:'Controlador/Ajax/requisicaoPaginaAjax.php',
		type:'POST',
		data:{paginaAjax:paginaAjax},
		success:function(data){

			display.innerHTML = data;

			//alert(data);
		}
	}); 
}

function displayChat(){


	$('#cahtDialog').dialog('open');
}

$('#aulaAnteriorPrevisao').click(function(){

	$('#inicioAulaPrevisaoContainer').removeClass('fadeInRight animated');
	$('#inicioAulaPrevisaoContainer').addClass('fadeInLeft animated');
});


function aulaSeguintePrevisao(aulaSeguinte){

	$.ajax({

		url:'Controlador/Ajax/aulasAjax.php',
		type:'POST',
		data:{aulaSeguinte:aulaSeguinte},
		success:function(response){
		  $('#aulas').html(response);
		  $('#inicioAulaPrevisaoContainer').addClass('fadeInRight animated');	
		}
	});
}
function aulaAnteriorPrevisao(aulaAnterior){

	$.ajax({

		url:'Controlador/Ajax/aulasAjax.php',
		type:'POST',
		data:{aulaAnterior:aulaAnterior},
		success:function(response){
		  $('#aulas').html(response);
		  $('#inicioAulaPrevisaoContainer').addClass('fadeInLeft animated');	
		}
	});
}

function updateEstadoNotificacao(x){

	var idNotificacaoUpdateEstado = x;

	$.ajax({

		url:'Controlador/Ajax/customAjax.php',
		type:'POST',
		data:{idNotificacaoUpdateEstado:idNotificacaoUpdateEstado},
		success:function(response){
		 console.log(response);
		}
	});
}

$('#frmSubmitExercicio').submit(function(event){

	event.preventDefault();

	var questaoRef = document.querySelector('#questaoRef').value;

	var opcao1 = document.querySelector('#opcao1').checked;
	var opcao2 = document.querySelector('#opcao2').checked;
	var opcao3 = document.querySelector('#opcao3').checked;
	var opcao4 = document.querySelector('#opcao4').checked;
   
    var opcaoEscolhida = "noSelected";

	if (opcao1) {

		opcaoEscolhida = "opcao1";
	}
	if(opcao2){

		opcaoEscolhida = "opcao2";
	}
	if(opcao3){

		opcaoEscolhida = "opcao3";
	}
	if(opcao4){

		opcaoEscolhida = "opcao4";
	}


	$.ajax({

		url:'Controlador/Ajax/exerciciosAjax.php',
		type:'POST',
		data:{questaoRef:questaoRef,opcaoEscolhida:opcaoEscolhida},
		success:function(response){
		 		
		 	$('#displayExerciciosContainers').html(response);
		}
	});
});

function verDicaExercicio(x){

	var dicasExercicioRef = x;

	if(dicasExercicioRef != ""){

		$.ajax({

			url:'Controlador/Ajax/exerciciosAjax.php',
			type:'POST',
			data:{dicasExercicioRef:dicasExercicioRef},
			success:function(response){
			 		
			 	$('#displayExerciciosContainers').html(response);
			}
		});
	}
}
function tentarNovamenteExercicio(x){

	var tentarNovamenteExercicioRef = x;

	if(tentarNovamenteExercicioRef != ""){

		$.ajax({

			url:'Controlador/Ajax/exerciciosAjax.php',
			type:'POST',
			data:{tentarNovamenteExercicioRef:tentarNovamenteExercicioRef},
			success:function(response){
			 		
			 	$('#displayExerciciosContainers').html(response);
			}
		});
	}
}

function comprarItemLoja(x,z){

	var itemCategoria = x;
	var itemRef = z;

	$.ajax({

		url:'Controlador/Ajax/lojaAjax.php',
		type:'POST',
		data:{itemCategoria:itemCategoria,itemRef:itemRef},
		success:function(response){
		 		
		 	$('#displayInfoComprarItemLoja').html(response);
		}
	});
}

function compraItemLojaConfirmada(x,z){

	if (x=="0") {

		$('#comprarItemLoja').closeModal();
	}
	else{

		var comprarItemLojaRef = x;
		var comprarItemLojaCetgoria = z;

		$.ajax({

			url:'Controlador/Ajax/lojaAjax.php',
			type:'POST',
			data:{comprarItemLojaRef:comprarItemLojaRef,comprarItemLojaCetgoria:comprarItemLojaCetgoria},
			success:function(response){
			 		
			 	$('#displayInfoComprarItemLoja').html(response);
			}
		});
	}
}



function requisicaoPagina(x){

	var pagina = x;

	$('#displayPaginasHeader').hide();

	$.ajax({

		url:'Controlador/Ajax/requisicaoPaginaAjax.php',
		type:'POST',
		data:{pagina:pagina},
		success:function(response){
		 		
		 	$('#displayPaginas').html(response);
		}
	});
}

/*========Loja==========*/

function selectCategoriaVideos(){

	//Não Funcional ainda

	var categoria = document.querySelector('#selectCategoriaVideosValue').value

	alert(categoria);
}

/*========Multimidia==========*/

function countComentarios(z){

	var videoComentariosCount = z;

	$.ajax({

		url:'Controlador/Ajax/customAjax.php',
		type:'POST',
		data:{videoComentariosCount:videoComentariosCount},
		success:function(response){
		 	
		 	$('#countVideoComentarios').html(response);
		}
	});
}

function comentarVideo(){

	var videoRef = document.querySelector('#txtVideoRef').value;

	var comentario = document.querySelector('#txtComentar').value;

	if (comentario !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{videoRef:videoRef,comentario:comentario},
			success:function(response){
			 	
			 	$('#ComentariosContainer').html(response);
			 	countComentarios(videoRef);
			}
		});
	}
}

function eliminarComentario(y){

	var eliminarComentarioRef = y;
	var videoComentarioRef = document.querySelector('#txtVideoRef').value;

	$.ajax({

		url:'Controlador/Ajax/customAjax.php',
		type:'POST',
		data:{eliminarComentarioRef:eliminarComentarioRef,videoComentarioRef:videoComentarioRef},
		success:function(response){
		 	
		 	$('#ComentariosContainer').html(response);
		 	countComentarios(videoComentarioRef);
		}
	});
}

function reproduzirVideo(x){

	var playVideoRef = x;

	$.ajax({

		url:'Controlador/Ajax/customAjax.php',
		type:'POST',
		data:{playVideoRef:playVideoRef},
		success:function(response){
		 	
		 	$('#videoConteiner').html(response);
		}
	});
}

function abrirLivro(x){

	var abrirLivroRef = x;

	if (abrirLivroRef !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{abrirLivroRef:abrirLivroRef},
			success:function(response){
			 	
			 	$('#LivroContainer').html(response);
			}
		});
	}
}

function abrirArtigo(y){

	alert(".."+y);
}

function anotacoesLivro(){

	var anotacaoLivro = document.querySelector("#txtNotas").value;

	var anotacaoLivroRef = document.querySelector("#livroAnotacaoRef").value;

	if (anotacaoLivro != "" && anotacaoLivroRef !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{anotacaoLivro:anotacaoLivro,anotacaoLivroRef:anotacaoLivroRef},
			success:function(response){
			 	
			 	$('#displayAnotacoes').html(response);
			}
		});
	}
}

function eliminarAnotacoesLivroArtigo(x,z){

	var eliminarAnotacoesLivroArtigoRef = x;

	var eliminarAnotacoesLivroArtigoCAtegoria = z;

	if (eliminarAnotacoesLivroArtigoRef != "" && eliminarAnotacoesLivroArtigoCAtegoria !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{eliminarAnotacoesLivroArtigoRef:eliminarAnotacoesLivroArtigoRef,eliminarAnotacoesLivroArtigoCAtegoria:eliminarAnotacoesLivroArtigoCAtegoria},
			success:function(response){
			 	
			 	$('#displayAnotacoes').html(response);
			}
		});
	}
}

$('#frmSendSmsChat').submit(function(event){

	event.preventDefault();

	var smsChatUser = document.querySelector("#SendSmsChat").value;

	if (smsChatUser !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{smsChatUser:smsChatUser},
			success:function(response){
			 	
			 	$('#displaySmsChatUser').html(response);
			}
		});
	}
});
function eliminarSmsChatUser(x){

	var eliminarChatUser = x;

	if (eliminarChatUser !="") {

		$.ajax({

			url:'Controlador/Ajax/customAjax.php',
			type:'POST',
			data:{eliminarChatUser:eliminarChatUser},
			success:function(response){
			 	
			 	$('#displaySmsChatUser').html(response);
			}
		});
	}
}