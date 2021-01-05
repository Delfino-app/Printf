
<?php

require_once "../controlador.php";
require_once "../UpdateUserInfo.php";
require_once "../userInfo.php";
require_once "../LojaController.php";
require_once "../MultimidiaController.php";
require_once "../ChatMensagens.php";
require_once "../Notificacoes.php";
require_once "../DesempenhoController.php";
require_once "../Aulas.php";
require_once "../Exercicios.php";

require_once "../../Modelo/conexao.php";
require_once "../../Modelo/modelo.php";
require_once "../../Modelo/crud.php"; 
require_once "../../Modelo/UpdateDadosUser.php"; 
require_once "../../Modelo/LojaModel.php";
require_once "../../Modelo/MultimidiaModel.php";
require_once "../../Modelo/DesempenhoModel.php";
require_once "../../Modelo/AulasModel.php";
require_once "../../Modelo/ExercicioModel.php";


 session_start();
 $idUser = $_SESSION['id'];

 #Bloqueio Aula


 	$Bloqueiado = '<div class="aulaBloqueada">
 		<span class="aulaBloqueadaInfoContainer">
 			<i class="fa fa-lock aulaBloqueadaInfoIcon"></i><br>
 			Bloqueado
 			<div class="divider" style="margin-top:10px;"></div>
 			<span class="aulaBloqueadaInfo">'.$_SESSION["PrimeiroNome"].', ainda não podes aceder ao conteúdo deste aula.<br>
 			</span>
 		</span>
 	</div>';


 #--------------


 #Aula Seguinte

 if (isset($_POST["aulaSeguinte"])) {

 	$aula = $_POST["aulaSeguinte"] + 1;

	$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

	#Dados Aula
	$dadosAula = aulasModel:: dadosAulaUser("aulas", $aula, $dadosUser["nivel"]);

	#All Dados Aula
	$allDadosAula = aulasModel::AllDadosAulaUser("aulas", $dadosUser["nivel"]);

	$todas = 0;

	$anterior = $dadosAula["id"] - 1;

	foreach ($allDadosAula as $key => $value) {
		
		$todas +=1;
	}

	if ($aula == $todas) {

		#Desabilitar o link  aulaSeguintePrevisao

		echo '
		<div class="col s1 l2" style="padding:0px;">
			<a onclick="aulaAnteriorPrevisao('.$anterior.')" id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
				<i class="fa fa-angle-left" style="font-size:20px;"></i>
			</a>
		</div>
		<div class="col s10 l8 white AulasContainer" style="padding-top: 35px;padding-bottom: 35px;">
			<div id="inicioAulaPrevisaoContainer">
			';
				if ($dadosUser["aula_atual"] < $aula) {
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStartAulaBloqueada" href="#">
							Começar Aula
						</a>
					</p>
					'.$Bloqueiado.'';
				}
				elseif ($dadosUser["aula_atual"] == $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Começar Aula
						</a>
					</p>';
				}
				elseif ($dadosUser["aula_atual"] > $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Ver Aula
						</a>
					</p>';
				}
			echo '</div>
		</div>
		<div class="col s1 l2" style="padding:0px;">
			<a disabled id="aulaSeguintePrevisao" class="left btn '.$_SESSION['UserTema'].'">
				<i class="fa fa-angle-right" style="font-size:20px;"></i>
			</a>
		</div>
	';
	}
	elseif ($aula < $todas) {
		
		#Abilitar o link  aulaSeguintePrevisao
		
		echo '
			<div class="col s1 l2" style="padding:0px;">
				<a onclick="aulaAnteriorPrevisao('.$anterior.')" id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
					<i class="fa fa-angle-left" style="font-size:20px;"></i>
				</a>
			</div>
			<div class="col s10 l8 white AulasContainer" style="padding-top: 35px;padding-bottom: 35px;">
				<div id="inicioAulaPrevisaoContainer">
					';
				if ($dadosUser["aula_atual"] < $aula) {
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStartAulaBloqueada" href="#">
							Começar Aula
						</a>
					</p>
					'.$Bloqueiado.'';
				}
				elseif ($dadosUser["aula_atual"] == $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Começar Aula
						</a>
					</p>';
				}
				elseif ($dadosUser["aula_atual"] > $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Ver Aula
						</a>
					</p>';
				}
			echo '
				</div>
			</div>
			<div class="col s1 l2" style="padding:0px;">
				<a onclick="aulaSeguintePrevisao('.$dadosAula["id"].')" id="aulaSeguintePrevisao" class="left btn '.$_SESSION['UserTema'].'">
					<i class="fa fa-angle-right" style="font-size:20px;"></i>
				</a>
			</div>
		';
	}
}

#Aula Anterior

if (isset($_POST["aulaAnterior"])) {

 	$aula = $_POST["aulaAnterior"];

	$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

	#Dados Aula
	$dadosAula = aulasModel:: dadosAulaUser("aulas", $aula, $dadosUser["nivel"]);

	$anterior = $dadosAula["id"] - 1;

	if ($aula == 1) {

		#Desabilitar o link  aulaSeguintePrevisao
		echo '
		<div class="col s1 l2" style="padding:0px;">
			<a disabled id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
				<i class="fa fa-angle-left" style="font-size:20px;"></i>
			</a>
		</div>
		<div class="col s10 l8 white AulasContainer" style="padding-top: 35px;padding-bottom: 35px;">
			<div id="inicioAulaPrevisaoContainer">
		';
				if ($dadosUser["aula_atual"] < $aula) {
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStartAulaBloqueada" href="#">
							Começar Aula
						</a>
					</p>
					'.$Bloqueiado.'';
				}
				elseif ($dadosUser["aula_atual"] == $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Começar Aula
						</a>
					</p>';
				}
				elseif ($dadosUser["aula_atual"] > $aula) {
					
					echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
					</h3>
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosAula["resumo"].'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Ver Aula
						</a>
					</p>';
				}
			echo '
			</div>
		</div>
		<div class="col s1 l2" style="padding:0px;">
			<a onclick="aulaSeguintePrevisao('.$dadosAula["id"].')" id="aulaSeguintePrevisao" class="left btn '.$_SESSION['UserTema'].'">
				<i class="fa fa-angle-right" style="font-size:20px;"></i>
			</a>
		</div>
	';
	}
	elseif ($aula > 1) {
		
		#Abilitar o link  aulaSeguintePrevisao
		
		echo '
			<div class="col s1 l2" style="padding:0px;">
				<a onclick="aulaAnteriorPrevisao('.$anterior.')" id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
					<i class="fa fa-angle-left" style="font-size:20px;"></i>
				</a>
			</div>
			<div class="col s10 l8 white AulasContainer" style="padding-top: 35px;padding-bottom: 35px;">
				<div id="inicioAulaPrevisaoContainer">
		';
			if ($dadosUser["aula_atual"] < $aula) {
				echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
					Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
				</h3>
				<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
					'.$dadosAula["resumo"].'
				</p>
				<p class="center">
					<a class="center btn btn-success  light-blue darken-3" id="btnStartAulaBloqueada" href="#">
						Começar Aula
					</a>
				</p>
				'.$Bloqueiado.'';
			}
			elseif ($dadosUser["aula_atual"] == $aula) {
				
				echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
					Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
				</h3>
				<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
					'.$dadosAula["resumo"].'
				</p>
				<p class="center">
					<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
						Começar Aula
					</a>
				</p>';
			}
			elseif ($dadosUser["aula_atual"] > $aula) {
				
				echo '<h3 class="AulaTarefaInfo" style="color:#0277bd;">
					Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
				</h3>
				<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
					'.$dadosAula["resumo"].'
				</p>
				<p class="center">
					<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
						Ver Aula
					</a>
				</p>';
			}
		
		echo '
				</div>
			</div>
			<div class="col s1 l2" style="padding:0px;">
				<a onclick="aulaSeguintePrevisao('.$dadosAula["id"].')" id="aulaSeguintePrevisao" class="left btn '.$_SESSION['UserTema'].'">
					<i class="fa fa-angle-right" style="font-size:20px;"></i>
				</a>
			</div>
		';
	}
}

#Terminar Aula - Exibir Lista Exercicios

if (isset($_POST["terminarAulaRef"])) {
	
	$idAula = $_POST["terminarAulaRef"];

	#Verificar se a aula atual é = ao $idAula
	$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

	$dadosUserDesempenho=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

	if ($dadosUser["aula_atual"] == $idAula) {

		#Update Aula atual
		$novaAula = $idAula + 1;

		#Update Desempenho 

		$percentacenAula = $dadosUserDesempenho["assistenciaAulas"] + 10;

		$UpdateDadosUser = updateDados::UpdateAulaAtualModelo("usuarios", $idUser,$novaAula);

		$UpdateDadosDesempenhoAula = updateDados::UpdateDesempenhoAulaModelo("desempenho", $idUser,$percentacenAula);

		$novaPontucao = $dadosUserDesempenho["pontuacao"] + 2;

		$UpdateDadosDesempenhoPontuacao = updateDados::updatePontuacaoUserModelo("desempenho", $idUser,$novaPontucao);

		if ($UpdateDadosUser == "Feito" && $UpdateDadosDesempenhoAula == "Feito" && $UpdateDadosDesempenhoPontuacao == "Feito"){
			
			#Exercicios
			exercicios::verificarExercicio($idAula);

			#Notificar User 

			notificacoes::notificarUser($idUser,"A sua média de desempenho aumentou + 10%","Desempenho");

			notificacoes::notificarUser($idUser,"Recebeu um bônos de 2 Bitcoins","Desempenho");
		}
		else{

			echo 'Erros...';
		}
	}
	else{

		#Error - Não atualizar
		echo 'Erro...';
	}
}

#Anotação Aula

if (isset($_POST["anotacaoAulaId"]) && isset($_POST["anotacaoAula"])) {
	
	$anotacaoAulaId = $_POST["anotacaoAulaId"];
	$anotacaoAula = $_POST["anotacaoAula"];

	$dadosAnotacaoAula = array (

		'idUser' => $idUser,
		'idAula' => $anotacaoAulaId,
		'anotacao' => $anotacaoAula
	);

	$addAnotacao = aulasModel::addAnotacaoAulaModelo("anotacoes_aula",$dadosAnotacaoAula);

	if ($addAnotacao == "Feito") {
		
		echo "Anotação salva com sucesso!";
	}
	else{

		echo "Erro ao salvar anotação";
	}
}

#Dúvidas Aula

if (isset($_POST["duvidaAulaAddId"]) && isset($_POST["duvidaAulaAdd"])) {
	
	$duvidaAulaId = $_POST["duvidaAulaAddId"];
	$duvidaAula = $_POST["duvidaAulaAdd"];

	$dadosDuvidaAula = array (

		'idUser' => $idUser,
		'idAula' => $duvidaAulaId,
		'duvida' => $duvidaAula,
		'estado' => "pendente"
	);

	$addDuvida = aulasModel::addDuvidaAulaModelo("duvidas_aula",$dadosDuvidaAula);

	if ($addDuvida == "Feito") {
		
		echo '<span style="padding:10px;">Enviada com sucesso!</span>
				<form id="frmAddDuvidaAula" style="padding-bottom:5px;padding-top:10px:">
		    		<input type="text" id="duvidaAulaIdAdd" value="'.$duvidaAulaId.'" hidden>
		    		<div class="col l12" style="padding-top:0px;padding-left:0px;">
		    			<textarea id="duvidaAulaAdd" class="materialize-textarea custom" required placeholder="Escreva aqui as suas dúvidas" style="margin-left:-3px;"></textarea>
		    		</div>
		    		<button class="btn btnAddAulas btnAddSuporteAula" type="submit">Enviar</button>
	    		</form>';
	}
	else{

		echo "<span>Erro ao enviar dúvida</span>";
	}
}