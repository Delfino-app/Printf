
<?php

require_once "../Notificacoes.php";


 require_once '../../Modelo/conexao.php';
 require_once "../../Modelo/crud.php"; 
 require_once '../../Modelo/DesempenhoModel.php';
 require_once '../../Modelo/ExercicioModel.php';
 require_once '../../Modelo/UpdateDadosUser.php';
 require_once "../../Modelo/ExercicioModel.php";


 session_start();

 $idUser = $_SESSION['id'];

 #Imagens de Interacao

 $imgSorry = 'src="../../Vista/Imagens/interacao/sorry.jpeg"';

 $imgHappy = 'src="../../Vista/Imagens/interacao/happy.jpeg"';


if (isset($_POST["questaoRef"]) && isset($_POST["opcaoEscolhida"])) {
 	
 	if ($_POST["opcaoEscolhida"] == "noSelected") {


 		echo '<div class="right AulasContainer" style="padding:20px;">
 				<p class="center" style="margin-top:-5px;color:red">Selecione uma opção</p>
 			</div>';
 	}
 	else{

 		$idExercicio = $_POST["questaoRef"];

 		#Verificar Exercicios User
 		
		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

		$idAulaAnterior = $dadosUser["aula_atual"] - 1;

		$dadosExericios = ExercicioModelo::VerificarExercicioUserIdExercicioModelo("resolver_exercicio", $idUser,$idAulaAnterior, "pendente", $idExercicio);

		if (!empty($dadosExericios)) {
			
			$respostaExercicio=desempenhoUserModel::userDados("exercicio",$dadosExericios["idExercicio"]);

			if (!empty($respostaExercicio)) {

				if ($respostaExercicio["opcaoCerta"] == $_POST["opcaoEscolhida"]) {

					$dadosUserDesempenho=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

					$novaPontucao = $dadosUserDesempenho["pontuacao"] + $respostaExercicio["pontuacao"];

					$UpdateDadosDesempenhoPontuacao = updateDados::updatePontuacaoUserModelo("desempenho", $idUser,$novaPontucao);

					$novaPercentagemResolucaoTarefas = $dadosUserDesempenho["resolucaoTarefas"] + 10;

					$updateResolucaoTarefas =updateDados::updateResolucaoTarefasUserModelo("desempenho", $idUser, $novaPercentagemResolucaoTarefas);

					$updateNotExercicio = ExercicioModelo::updateVerificarExercicioUserIdExercicioModelo("resolver_exercicio", $idUser,$idAulaAnterior, "feito", $idExercicio);

					#Notificar User 

					notificacoes::notificarUser($idUser,"A sua média de desempenho aumentou + 10%","Desempenho");

					notificacoes::notificarUser($idUser,"A sua pontuação aumentou + ".$respostaExercicio["pontuacao"]." Bitcoins","Desempenho");

					echo '
					<div style="padding:20px;">
						<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgHappy.'>
	 						<br>Resposta Certa<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							A sua resposta está certa
	 						</span>
	 					</p>
	 				</div>';
				}
				else{

					echo '
					<div style="padding:20px;">
						<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Resposta errada<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							A sua resposta está incorreta
	 						</span><br><br>
	 						<a class="btn btnTerminarAula btnResolverExercicioDepois" onclick="verDicaExercicio('.$idExercicio.')" style="padding-left:30px;padding-right:30px;">
	 							Ver Dica
	 						</a>
							<a class="btn btnTerminarAula btnResolverExercicioAgora" onclick="tentarNovamenteExercicio('.$idExercicio.')" style="padding-left:30px;padding-right:30px;">
								Tentar Novamente
							</a>
	 					</p>
	 				</div>';
				}
			}
		}
 	}
}

#Dica Exercicio

if (isset($_POST["dicasExercicioRef"])) {
	
	echo "Dicas do Exercicio...";
}

#Tentar Novamente Exercicio

if (isset($_POST["tentarNovamenteExercicioRef"])) {
	
	echo "Tentar Novamente Exercicio...";
}