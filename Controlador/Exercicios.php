
<?php

class exercicios{


	public static function verificarExercicio($idAula){

		$idUser = $_SESSION['id'];

		$exercicios = ExercicioModelo::VerificarExercicioModelo("exercicio",$idAula);

		$totalExercicios = 0;

		if (!empty($exercicios)) {
			
			foreach ($exercicios as $key => $value) {

				$dadosExercicio = array ( 

					'idUser' => $idUser,
					'idAula' => $idAula,
					'idExercicio' => $value["id"],
					'estado' => "pendente"
				);

				#Add User na Lista de Exercicios a fazer 
				$addExerciciosUser = ExercicioModelo::addExerciciosFazerModelo("resolver_exercicio",$dadosExercicio);
				
				$totalExercicios +=1;
			}

			#Notificar Usuario
			$titulo = 'Tens '.$totalExercicios.' exercicio(s) da aula nº '.$idAula.' para resolveres';
			$link = 'Inicio#exercicios';

			notificacoes::notificarUser($idUser,$titulo,$link);

			echo '
				<h3 class="center nivelTitulo" style="color:#495057;font-size:20pt;">
				   	Exercícios
				</h3>
				<h3 class="AulaTarefaInfo" style="color:#495057;font-size:12pt;">
					Esta aula, tem '.$totalExercicios.' exercicios para resolveres.<br><br>
					<span style="font-size:10pt;">Ao resolveres os exercícios, podes melhorar o teu desempenho e ganhar pontuações.</span><br><br>
					<a class="btn btnTerminarAula btnResolverExercicioDepois" href="Inicio">Ver Detalhes</a>
				</h3>';
		}
		else{


			echo '
				<h3 class="center nivelTitulo" style="color:#495057;font-size:20pt;">
				   	Exercícios
				</h3>
				<h3 class="AulaTarefaInfo" style="color:#495057;font-size:12pt;">
					Esta aula, não tem exercicios para resolveres.<br><br>
					<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:20px;padding-right:20px;" href="Inicio">Ok</a>
				</h3>';
		}
	}

	public static function dadosExercicio(){

		$idUser = $_SESSION['id'];

		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

		$idAulaAnterior = $dadosUser["aula_atual"] - 1;

		$dadosExericios = ExercicioModelo::VerificarExercicioUserModelo("resolver_exercicio", $idUser,$idAulaAnterior, "pendente");

		if (!empty($dadosExericios)) {
			
			$totalExercicios = 0;

			foreach ($dadosExericios as $key => $value) {

				$totalExercicios +=1;

				$dadosExericioInfo=desempenhoUserModel::userDados("exercicio",$value["idExercicio"]);

				echo '
					<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333;">
			        	<i class="fa fa-close"></i>
			      	</a>
			      	<h3 class="title">Exercícios 1/'.$totalExercicios.'</h3>	
			      	<div class="divider"></div>
			        <div class="row">
			       	    <div class="col s12 l12" id="displayExerciciosContainers" style="padding-top:20px;padding-bottom:20px;">
				';

				echo  '<p class="title" style="font-size:14pt;"> 1º. '.$dadosExericioInfo["exercicio"].'</p><br>
						<p class="title" style="font-size:12pt;padding-left:30px;margin-top:-15px">
						    <form id="frmSubmitExercicio" style="margin-top:-25px;padding-left:15px;padding-bottom:0px;">
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao2" />
							      <label for="opcao2">'.$dadosExericioInfo["opcao2"].'</label>
							    </p>
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao3" />
							      <label for="opcao3">'.$dadosExericioInfo["opcao3"].'</label>
							    </p>
							    <p>
							      <input type="text" id="questaoRef" value="'.$dadosExericioInfo["id"].'" hidden>
							      <input class="with-gap" name="group1" type="radio" id="opcao1" />
							      <label for="opcao1">'.$dadosExericioInfo["opcao1"].'</label>
							    </p>
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao4" />
							      <label for="opcao4">'.$dadosExericioInfo["opcao4"].'</label>
							    </p>
						</p>
						<div class="col s12 l6 right" id="displayRespostaExercicio" style="margin-top:-20px;"></div>
						<div class="col s12 l12" style="padding:0px;margin-top:20px;">
							<div class="divider"></div>
							<p class="left">Tentativas: 0/'.$dadosExericioInfo["tentativas"].'</p>
							<p class="left" style="margin-left:30px;">Pontuação: '.$dadosExericioInfo["pontuacao"].'</p>
							<div class="right" style="margin-top:10px; padding-bottom: 10px;">
								<input type="submit" class="btn btnVerificarOpcaoExercicio"  value="Verificar">
							</div>
							</form>
							<div class="col s12 l12" style="padding:0px;">
							<div class="divider"></div>
							</div>
						</div>
				';
			}

			/*if ($totalExercicios > 1) {

				$index = $totalExercicios-2;
				
				$dadosExericioInfo=desempenhoUserModel::userDados("exercicio",$dadosExericios[$index]["idExercicio"]);

				echo '
					<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333;">
			        	<i class="fa fa-close"></i>
			      	</a>
			      	<h3 class="title">Exercícios 1/'.$totalExercicios.'</h3>	
			      	<div class="divider"></div>
			        <div class="row">
			       	    <div class="col s12 l12" style="padding-top:20px;padding-bottom:20px;">
				';

				echo  '<p class="title" style="font-size:14pt;"> 1º. '.$dadosExericioInfo["exercicio"].'</p><br>
						<p class="title" style="font-size:12pt;padding-left:30px;margin-top:-15px">
						    <form id="frmSubmitExercicio" style="margin-top:-25px;padding-left:15px;padding-bottom:0px;">
							    <p>
							      <input type="text" id="questaoRef" value="'.$dadosExericioInfo["id"].'" hidden>
							      <input class="with-gap" name="group1" type="radio" id="opcao1" />
							      <label for="opcao1">'.$dadosExericioInfo["opcao4"].'</label>
							    </p>
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao2" />
							      <label for="opcao2">'.$dadosExericioInfo["opcao2"].'</label>
							    </p>
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao3" />
							      <label for="opcao3">'.$dadosExericioInfo["opcaoCerta"].'</label>
							    </p>
							    <p>
							      <input class="with-gap" name="group1" type="radio" id="opcao4" />
							      <label for="opcao4">'.$dadosExericioInfo["opcao3"].'</label>
							    </p>
						</p>
						<div class="col s12 l6 right" id="displayRespostaExercicio" style="margin-top:-20px;"></div>
						<div class="col s12 l12" style="padding:0px;margin-top:20px;">
							<div class="divider"></div>
							<p class="left">Tentativas: 0/'.$dadosExericioInfo["tentativas"].'</p>
							<p class="left" style="margin-left:30px;">Pontuação: '.$dadosExericioInfo["pontuacao"].'</p>
							<div class="right" style="margin-top:10px; padding-bottom: 10px;">
								<input type="submit" class="btn btnVerificarOpcaoExercicio"  value="Verificar">
							</div>
							</form>
							<div class="col s12 l12" style="padding:0px;">
							<div class="divider"></div>
							</div>
						</div>
				';
			}*/
		}
	}
}