
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

 /*---Alunos---*/
 function notificarAluno(x){

 	var idUserNotificarDados = x;

 	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{idUserNotificarDados:idUserNotificarDados},
		beforeSend:function(){
			$('#displayEnviarNotificaco').html("Aguarde...");
		},
		success:function(response){

			$('#displayEnviarNotificaco').html(response);
		}
	});
}
$('#frmEnviarNotificacaoUsuario').submit(function(event){

	event.preventDefault();

	var userIdNotificacao = document.querySelector('#IdUser').value;
	var tituloNotificacao = document.querySelector('#notificacaoTitulo').value;
	var linkNotificacao = document.querySelector('#notificacaoLink').value;
	var conteudoNotificacao = document.querySelector('#notificacaoConteudo').value;

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{tituloNotificacao:tituloNotificacao,conteudoNotificacao:conteudoNotificacao,userIdNotificacao:userIdNotificacao,linkNotificacao:linkNotificacao},
		beforeSend:function(){
			$('#displayEnviarNotificaco').html("Aguarde...");
		},
		success:function(response){

			$('#displayEnviarNotificaco').html(response);
		}
	});
});


/*-----Aulas----*/
function editAula(x){

	var editAulaDados = x;

	$('#aulaTitulo').html("Editar aula");
	$('#AulaTabsContainer').hide();
	$('#tabelaConteudoAula').hide();
	$('#btnAddAulasContainer').hide();


	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{editAulaDados:editAulaDados},
		beforeSend:function(){
			
			$('#displayEditAulas').html("Aguarde...");
		},
		success:function(response){
			
			$('#displayEditAulas').html(response);
		}
	});
}

$('#frmEditAula').submit(function(event){

	event.preventDefault();
	
	var idEdit = document.querySelector('#aulaId').value;
	var temaEdit = document.querySelector('#aulaTema').value;
	var dicaEdit = document.querySelector('#aulaDicas').value;
	var resumoEdit = document.querySelector('#aulaResumo').value;
	var subtemaEdit = document.querySelector('#aulaSubTema').value;
	var conteudoEdit = document.querySelector('#aulaConteudo').value;

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{idEdit:idEdit,temaEdit:temaEdit,dicaEdit:dicaEdit,resumoEdit:resumoEdit,subtemaEdit:subtemaEdit,conteudoEdit:conteudoEdit},
		beforeSend:function(){
			$('#displayEditAulas').html("Aguarde...");
		},
		success:function(response){

			$('#displayEditAulas').html(response);
		}
	});
});

/*Add Nova Aula*/
function addNovaAulaForm(){

	var frmAddAulaDados = true;

	$('#aulaTitulo').html("Adicionar aula");
	$('#AulaTabsContainer').hide();
	$('#tabelaConteudoAula').hide();
	$('#btnAddAulasContainer').hide();

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{frmAddAulaDados:frmAddAulaDados},
		beforeSend:function(){
			$('#displayAddAulas').html("Aguarde...");
		},
		success:function(response){

			$('#displayAddAulas').html(response);
		}
	});
}
$('#frmAddAula').submit(function(event){

	
	event.preventDefault();

	var addAulaTema = document.querySelector('#addAulaTema').value;
	var addAulaResumo = document.querySelector('#addAulaResumo').value;
	var addAulaDicas = document.querySelector('#addAulaDicas').value;
	var addAulaSubTema = document.querySelector('#addAulaSubTema').value;
	var addAulaConteudo = document.querySelector('#addAulaConteudo').value;


	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{addAulaTema:addAulaTema,addAulaResumo:addAulaResumo,addAulaDicas:addAulaDicas,addAulaSubTema:addAulaSubTema,addAulaConteudo:addAulaConteudo},
		beforeSend:function(){
			$('#displayAddAulas').html("Aguarde...");
		},
		success:function(response){

			$('#displayAddAulas').html(response);
		}
	});
});

/*Exercicios*/

function addNovoExercicioForm(){

	var frmAddExercicioDados = true;

	$('#aulaTitulo').html("Adicionar Exercício");
    $('#AulaTabsContainer').hide();
	$('#adminExerciciosAllContainers').hide();

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{frmAddExercicioDados:frmAddExercicioDados},
		beforeSend:function(){
			$('#displayAddExercicio').html("Aguarde...");
		},
		success:function(response){

			$('#displayAddExercicio').html(response);
		}
	});
}

function selectNumeroAulaNivel(){

	var selectNumeroAulaNivel = document.querySelector('#addExercicioNivel').value;

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{selectNumeroAulaNivel:selectNumeroAulaNivel},
		success:function(response){

			$('#addExercicioAula').html(response);
		}
	});
}

$('#frmAddExercicio').submit(function(event){

	var addExercicioNivel = document.querySelector('#addExercicioNivel').value;
	var addExercicioAula = document.querySelector('#addExercicioAula').value;
	var addExercicioQuestionario = document.querySelector('#addExercicioQuestionario').value;
	var addExercicioAjuda = document.querySelector('#addExercicioAjuda').value;
	var addExercicioTentativas = document.querySelector('#addExercicioTentativas').value;
	var addExercicioPontuacao = document.querySelector('#addExercicioPontuacao').value;
	var addExercicioQuestao = document.querySelector('#addExercicioQuestao').value;
	var addExercicioOpcao0 = document.querySelector('#addExercicioOpcao0').value;
	var addExercicioOpcao1 = document.querySelector('#addExercicioOpcao1').value;
	var addExercicioOpcao2 = document.querySelector('#addExercicioOpcao2').value;
	var addExercicioOpcao3 = document.querySelector('#addExercicioOpcao3').value;
	var addExercicioOpcao4 = document.querySelector('#addExercicioOpcao4').value;

	event.preventDefault();

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{addExercicioNivel:addExercicioNivel,addExercicioAula:addExercicioAula,addExercicioQuestionario:addExercicioQuestionario,addExercicioAjuda:addExercicioAjuda,addExercicioTentativas:addExercicioTentativas,addExercicioPontuacao:addExercicioPontuacao,addExercicioQuestao:addExercicioQuestao,addExercicioOpcao0:addExercicioOpcao0,addExercicioOpcao1:addExercicioOpcao1,addExercicioOpcao2:addExercicioOpcao2,addExercicioOpcao3:addExercicioOpcao3,addExercicioOpcao4:addExercicioOpcao4},
		beforeSend:function(){

			$('#displayAddExercicio').html("Aguarde...");

		},
		success:function(response){

			$('#displayAddExercicio').html(response);
		}
	});
});

function editExercicio(x){

	var editExercicioId = x;

	$('#aulaTitulo').html("Editar Exercício");
    $('#AulaTabsContainer').hide();
	$('#adminExerciciosAllContainers').hide();

	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{editExercicioId:editExercicioId},
		beforeSend:function(){

			$('#displayEditExercicio').html("Aguarde...");

		},
		success:function(response){

			$('#displayEditExercicio').html(response);
		}
	});
}
$('#frmEditExercicio').submit(function(event){

	event.preventDefault();

	var editExercicioRef = document.querySelector('#editExercicioRef').value;
	var editExercicioNivel = document.querySelector('#editExercicioNivel').value;
	var editExercicioAula = document.querySelector('#editExercicioAula').value;
	var editExercicioQuestionario = document.querySelector('#editExercicioQuestionario').value;
	var editExercicioAjuda = document.querySelector('#editExercicioAjuda').value;
	var editExercicioTentativas = document.querySelector('#editExercicioTentativas').value;
	var editExercicioPontuacao = document.querySelector('#editExercicioPontuacao').value;
	var editExercicioQuestao = document.querySelector('#editExercicioQuestao').value;
	var editExercicioOpcao0 = document.querySelector('#editExercicioOpcao0').value;
	var editExercicioOpcao1 = document.querySelector('#editExercicioOpcao1').value;
	var editExercicioOpcao2 = document.querySelector('#editExercicioOpcao2').value;
	var editExercicioOpcao3 = document.querySelector('#editExercicioOpcao3').value;
	var editExercicioOpcao4 = document.querySelector('#editExercicioOpcao4').value;


	$.ajax({

		url:'Controlador/Admin/Ajax/adminAjax.php',
		type:'POST',
		data:{editExercicioRef:editExercicioRef,editExercicioNivel:editExercicioNivel,editExercicioAula:editExercicioAula,editExercicioQuestionario:editExercicioQuestionario,editExercicioAjuda:editExercicioAjuda,editExercicioTentativas:editExercicioTentativas,editExercicioPontuacao:editExercicioPontuacao,editExercicioQuestao:editExercicioQuestao,editExercicioOpcao0:editExercicioOpcao0,editExercicioOpcao1:editExercicioOpcao1,editExercicioOpcao2:editExercicioOpcao2,editExercicioOpcao3:editExercicioOpcao3,editExercicioOpcao4:editExercicioOpcao4},
		beforeSend:function(){

			$('#displayEditExercicio').html("Aguarde...");

		},
		success:function(response){

			$('#displayEditExercicio').html(response);
		}
	});
});

