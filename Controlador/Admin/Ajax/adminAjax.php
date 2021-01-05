
<?php

 include '../Controlador.php';
 include '../../../Modelo/conexao.php';
 include '../../../Modelo/Admin/modelo.php';

 	session_start();



  #Alunos 

 	#Notificar Aluno - Form Modal

 	if (isset($_POST["idUserNotificarDados"])) {
 		
 		$id = $_POST["idUserNotificarDados"];

	  	$dadosUser = adminModelo::ListarAllDdadosId("usuarios",$id);
	  	$dadosDesempenhoUser = adminModelo::ListarDesempenhoAlunoIdModelo("desempenho",$id);

	  	$mediaDesempenho=false;

	  	if (!empty($dadosUser)) {

	  		$srcImgPerfil = 'src="Vista/Imagens/upload/UserPerfil/'.$dadosUser["img"].'"';

	  		if ($dadosDesempenhoUser["mediaDesempenho"] > 44) {
						
				$mediaDesempenho = '
					<span id="MediaDesempenhoUser" title="Média do desempenho">
	   				<i class="raking StatisticaMedia fa fa-level-up"></i>'.$dadosDesempenhoUser["mediaDesempenho"].' %
		   			</span>
				';
			}
			#Caso o nível de desempenho seja menor que 45
			else{

				$mediaDesempenho = '
					<span id="MediaDesempenhoUser" title="Média do desempenho">
		   				<i class="raking StatisticaBaixo fa fa-level-down"></i>'.$dadosDesempenhoUser["mediaDesempenho"].' %
		   			</span>
				';
			}
	  		
	  		echo '
	  		<div id="UserInfo" class="col s12 l12">
				<div id="UserImgNameContainer" class="col s12 l12" style="margin-top:-20px;">
					<img id="UserImg" '.$srcImgPerfil.'>
				    <h3 id="UserName_and_MediaDesempenho">
					 	'.$dadosUser["primeiroNome"].'  '.$dadosUser["ultimoNome"].'
					 	'.$mediaDesempenho.'
					</h3>
				</div>
			</div>
	  		<div class="col l12" style="padding-top:10px;">
	  			<div class="col l6" style="padding-left:0px;">
	  				<label>Título</label>
					<input class="inputsEdit" type="text" id="notificacaoTitulo"  required>
					<input class="inputsEdit" type="text" id="IdUser" name="notificacaoIdUser" value="'.$dadosUser["id"].'" hidden required>
	  			</div>
	  			<div class="col l6" style="padding-right:0px;">
					<label>Link</label>
					<input class="inputsEdit" type="text" id="notificacaoLink"  required>
				</div>
				<label>Conteúdo</label>
				<textarea id="notificacaoConteudo" class="materialize-textarea custom" name="Conteudo"  required></textarea>
				<div class="left">
					<button class="btn btnAddAulas" type="submit">Notificar</button>
				</div>
	  		</div>';
	  	}
 	}

 	#Notificar Aluno - Enviar Notificacao

 	if (isset($_POST["userIdNotificacao"]) && isset($_POST["tituloNotificacao"])  && isset($_POST["conteudoNotificacao"]) && isset($_POST["linkNotificacao"])) {
 		
 		$dadosNotificacao = array(
 			
 			'idAdmin' => $_SESSION['idMaster'],
 			'idUser'=> $_POST["userIdNotificacao"],
 			'titulo' => $_POST["tituloNotificacao"],
 			'link' => $_POST["linkNotificacao"],
 			'conteudo' => $_POST["conteudoNotificacao"],
 			'estado' => "pendente"
 		); 

 		$Notificar = adminModelo::notificarUsuarioModelo("notificacao",$dadosNotificacao);

 		if ($Notificar == "Feito") {
 			
 			echo 'Enviada Com Sucesso';
 		}
 		else{

 			echo 'Erro ao enviar notificação';
 		}
 	}

  #Edit Aula - Mostrar Dados

	if (isset($_POST["editAulaDados"])) {

	  	$id = $_POST["editAulaDados"];

	  	$dadosAula = adminModelo::ListarAllDdadosId("aulas",$id);
	  	
	  	echo 
	  	'
		 <div class="col l4" style="padding-left:0px;">
			<div class="col l12">
			<input class="inputsEdit" type="text" id="aulaId"  value="'.$dadosAula["id"].'" required hidden>
				<label>Tema</label>
				<input class="inputsEdit" type="text" id="aulaTema" name="aulaTema" value="'.$dadosAula["tema"].'" required>
			</div>
			<div class="col l12">
				<label>Resumo</label>
				<textarea id="aulaResumo" class="materialize-textarea custom" name="Resumo"  required>'.$dadosAula["resumo"].'</textarea>
			</div>
			<div class="col l12">
				<label>Frase do dia</label>
				<textarea id="aulaDicas" class="materialize-textarea custom" name="Conteudo"  required>'.$dadosAula["dica"].'</textarea>
			</div>
		</div>
		<div class="col s12 l8">
			<label>Sub Tópicos</label>
			<textarea id="aulaSubTema" class="materialize-textarea custom" name="Conteudo"  required>'.$dadosAula["subtema"].'</textarea>
			<label>Conteúdo</label>
			<textarea id="aulaConteudo" class="materialize-textarea custom" name="Conteudo" style="text-align:left" required>'.$dadosAula["conteudo"].'</textarea>
		</div>
			<div class="col l12" style="padding:10px;">
			<button class="btn btnAddAulas" type="submit">Atualizar</button>
		</div>
		';
	}

	if (isset($_POST["idEdit"]) && isset($_POST["temaEdit"]) && isset($_POST["resumoEdit"]) && isset($_POST["dicaEdit"]) && isset($_POST["subtemaEdit"]) && isset($_POST["conteudoEdit"])) {
		
		$dadosEdit = array(

			'id' => $_POST["idEdit"], 
			'tema' => $_POST["temaEdit"],
			'dica' => $_POST["dicaEdit"],
			'resumo' => $_POST["resumoEdit"],
			'subtema' => $_POST["subtemaEdit"],
			'conteudo' => $_POST["conteudoEdit"] 
		);

		$updateAula = adminModelo::updateAula("aulas",$dadosEdit);

		if ($updateAula == "Feito") {
			
			echo "Sucesso!";
		}
		else{

			echo "Erro!";
		}
	}

	#Frm Add Aula

	if (isset($_POST["frmAddAulaDados"])) {
		
		include '../../../Vista/Paginas/Admin/pages/aulas/addAula.php';
	}

	#Add Aulas
	if (isset($_POST["addAulaTema"]) && isset($_POST["addAulaResumo"]) && isset($_POST["addAulaDicas"]) && isset($_POST["addAulaSubTema"]) && isset($_POST["addAulaConteudo"])) {
		
		$dadosAddAula = array(

			'nivel' => 1,
			'tema' => $_POST["addAulaTema"],
			'resumo' => $_POST["addAulaResumo"],
			'dica' => $_POST["addAulaDicas"],
			'subtema'=> $_POST["addAulaSubTema"],
			'conteudo'=> $_POST["addAulaConteudo"],
			'estado'=> "bloqueado"
		);

		$addAula = adminModelo::addAulaModelo("aulas",$dadosAddAula);

		if ($addAula == "Feito") {
			
			echo "Secesso!";
		}
	}

	#frm Add Exercicio

	if (isset($_POST["frmAddExercicioDados"])) {
		
		include '../../../Vista/Paginas/Admin/pages/aulas/addExercicio.php';
	}

	#Select Numero Aula
	if (isset($_POST["selectNumeroAulaNivel"])) {
		
		$nivel = $_POST["selectNumeroAulaNivel"];

		$expressaoNumero = '/^[1-9]+$/';

		if (preg_match($expressaoNumero,$nivel)) {
			
			$Aulas = adminModelo::ListarAllDadosTabela("aulas");

			if (!empty($Aulas)) {

				$opcoes = false;
				
				foreach ($Aulas as $key => $value) {
					
					$opcoes .= '<option value="'.$value["id"].'">'.$value["id"].'</option>';
				}

				echo '<option value="Selecione">Selecione</option>'.$opcoes;
			}
		}
	}

	#Add Exercicio

	if (isset($_POST["addExercicioNivel"]) && isset($_POST["addExercicioAula"]) && isset($_POST["addExercicioQuestionario"]) && isset($_POST["addExercicioAjuda"]) && isset($_POST["addExercicioTentativas"]) && isset($_POST["addExercicioPontuacao"]) && isset($_POST["addExercicioQuestao"]) && isset($_POST["addExercicioOpcao0"]) && isset($_POST["addExercicioOpcao1"]) && isset($_POST["addExercicioOpcao2"]) && isset($_POST["addExercicioOpcao3"]) && isset($_POST["addExercicioOpcao4"])) {
		
		$nivel = $_POST["addExercicioNivel"];
		$aula = $_POST["addExercicioAula"];
		$questionario = $_POST["addExercicioQuestionario"];
		$ajuda = $_POST["addExercicioAjuda"];
		$tentativas = $_POST["addExercicioTentativas"];
		$pontuacao = $_POST["addExercicioPontuacao"];
		$questao = $_POST["addExercicioQuestao"];
		$opcao0 = $_POST["addExercicioOpcao0"];
		$opcao1 = $_POST["addExercicioOpcao1"];
		$opcao2 = $_POST["addExercicioOpcao2"];
		$opcao3 = $_POST["addExercicioOpcao3"];
		$opcao4 = $_POST["addExercicioOpcao4"];

		$expressaoNumero = '/^[1-9]+$/';

		if (preg_match($expressaoNumero, $nivel) && preg_match($expressaoNumero, $aula) && preg_match($expressaoNumero, $tentativas) && preg_match($expressaoNumero, $pontuacao)) {
			
			#Add Exercicio, mas antes, verificar se as opções de resposta são diferentes

			$dadosExercicio = array (
				
				'nivel' => $nivel,
				'idAula' => $aula,
				'questionario' => $questionario,
				'ajuda' => $ajuda,
				'tentativas' => $tentativas,
				'pontuacao' => $pontuacao,
				'exercicio' => $questao,
				'opcaoCerta' => $opcao0,
				'opcao1' => $opcao1,
				'opcao2' => $opcao2,
				'opcao3' => $opcao3,
				'opcao4' => $opcao4
			);

			$addExercicio = adminModelo::addExercicioModelo("exercicio", $dadosExercicio);

			if ($addExercicio == "Feito") {
				
				echo 'Sucesso!';
			}
			else{

				echo 'Erro...';
			}
		}
		else{

			echo 'Erro Expressão regular';
		}
	}

	#Edit Exercicios - formDados
	if (isset($_POST["editExercicioId"])) {
		
		$id = $_POST["editExercicioId"];

		$expressaoNumero = '/^[1-9]+$/';

		if (preg_match($expressaoNumero, $id)) {


			$exercicio = adminModelo::ListarAllDdadosId("exercicio", $id);
			
			if (!empty($exercicio)) {
				
				echo '
					<div class="col s12 l6" style="padding-left:0px;">
					    <div class="col s12 l12" style="padding-right:0px;">
					    	<div class="col s12 l6" style="padding-left:0px;">
					    		<input class="inputsEdit" type="text" id="editExercicioRef" required value="'.$exercicio["id"].'" hidden>
					    		  <label>Nível</label>
								  <select onchange="selectNumeroAulaNivel()" id="editExercicioNivel" class="browser-default">
								    <option value="'.$exercicio["nivel"].'" selected>'.$exercicio["nivel"].'</option>
								  </select>
					    	</div>
					    	<div class="col s12 l6" style="padding-right:0px;">
					    		<label>Aula Nº</label>
								  <select id="editExercicioAula" class="browser-default">
								   	 <option value="'.$exercicio["idAula"].'" selected>'.$exercicio["idAula"].'</option>
								  </select>
					    	</div>
					    </div>
					    <div class="col s12 l12" style="padding-top: 10px;">
					        <label>Questionário</label>
					        <textarea id="editExercicioQuestionario" class="materialize-textarea custom" placeholder="Um breve introdução ao Exercício" required>'.$exercicio["questionario"].'</textarea>
					    </div>
					    <div class="col s12 l12">
					    	<label>Ajuda</label>
					    	<textarea id="editExercicioAjuda" class="materialize-textarea custom" placeholder="Uma dica que ajude o usúario a resolver o exercício" required>'.$exercicio["ajuda"].'</textarea>
					    </div>
					    <div class="col s12 l6">
					        <label>Tentativas</label>
					        <input class="inputsEdit" type="number" id="editExercicioTentativas" required value="'.$exercicio["tentativas"].'">
					    </div>
					    <div class="col s12 l6">
					        <label>Pontuação</label>
					        <input class="inputsEdit" type="number" id="editExercicioPontuacao" required value="'.$exercicio["pontuacao"].'">
					    </div>
					</div>
					<div class="col s12 l6">
						<div class="col l12">
					        <label>Exercício(Questão)</label>
					        <textarea id="editExercicioQuestao" class="materialize-textarea custom" required>'.$exercicio["exercicio"].'</textarea>
					    </div>
					    <div class="col s12 l6">
							<label>Opção Certa</label>
							<select id="editExercicioOpcao0" class="browser-default">
						   	 	<option value="'.$exercicio["opcaoCerta"].'" selected>'.$exercicio["opcaoCerta"].'</option>
						  	</select>
						</div>
						<div class="col s12 l6">
							<label>Opção 1</label>
					    	<input class="inputsEdit" type="text" id="editExercicioOpcao1" required value="'.$exercicio["opcao1"].'">
						</div>
						<div class="col s12 l6">
					    	<label>Opção 2</label>
					    	<input class="inputsEdit" type="text" id="editExercicioOpcao2" required value="'.$exercicio["opcao2"].'">
					    </div>
					    <div class="col s12 l6">
					    	<label>Opção 3</label>
					    	<input class="inputsEdit" type="text" id="editExercicioOpcao3" required value="'.$exercicio["opcao3"].'">
					    </div>
					    <div class="col s12 l6">
					    	<label>Opção 4</label>
					    	<input class="inputsEdit" type="text" id="editExercicioOpcao4" required value="'.$exercicio["opcao4"].'">
					    </div>
					</div>
					    <div class="col s12 l12" style="padding:10px;">
					    <button class="btn btnAddAulas" type="submit">Atualizar</button>
					</div>

				';
			}
			else{

				echo 'Não existe..';
			}
		}
		else{

			echo 'Erro..';
		}
	}

	#Edit Exercicios - Upadate

	if (isset($_POST["editExercicioRef"]) && isset($_POST["editExercicioNivel"]) && isset($_POST["editExercicioAula"]) && isset($_POST["editExercicioQuestionario"]) && isset($_POST["editExercicioAjuda"]) && isset($_POST["editExercicioTentativas"]) && isset($_POST["editExercicioPontuacao"]) && isset($_POST["editExercicioQuestao"]) && isset($_POST["editExercicioOpcao0"]) && isset($_POST["editExercicioOpcao1"]) && isset($_POST["editExercicioOpcao2"]) && isset($_POST["editExercicioOpcao3"]) && isset($_POST["editExercicioOpcao4"])) {
		
		$id = $_POST["editExercicioRef"];
		$nivel = $_POST["editExercicioNivel"];
		$aula = $_POST["editExercicioAula"];
		$questionario = $_POST["editExercicioQuestionario"];
		$ajuda = $_POST["editExercicioAjuda"];
		$tentativas = $_POST["editExercicioTentativas"];
		$pontuacao = $_POST["editExercicioPontuacao"];
		$questao = $_POST["editExercicioQuestao"];
		$opcao0 = $_POST["editExercicioOpcao0"];
		$opcao1 = $_POST["editExercicioOpcao1"];
		$opcao2 = $_POST["editExercicioOpcao2"];
		$opcao3 = $_POST["editExercicioOpcao3"];
		$opcao4 = $_POST["editExercicioOpcao4"];

		$expressaoNumero = '/^[1-9]+$/';

		if (preg_match($expressaoNumero, $id) && preg_match($expressaoNumero, $nivel) && preg_match($expressaoNumero, $aula) && preg_match($expressaoNumero, $tentativas) && preg_match($expressaoNumero, $pontuacao)) {
			
			#Add Exercicio, mas antes, verificar se as opções de resposta são diferentes

			$dadosExercicio = array (
				
				'id' => $id,
				'nivel' => $nivel,
				'idAula' => $aula,
				'questionario' => $questionario,
				'ajuda' => $ajuda,
				'tentativas' => $tentativas,
				'pontuacao' => $pontuacao,
				'exercicio' => $questao,
				'opcaoCerta' => $opcao0,
				'opcao1' => $opcao1,
				'opcao2' => $opcao2,
				'opcao3' => $opcao3,
				'opcao4' => $opcao4
			);

			$update = adminModelo::updateExercicioModelo("exercicio", $dadosExercicio);

			if ($update == "Feito") {
				
				echo 'Sucesso';
			}
		}
		else{

			echo 'Erro Expressão regular';
		}
	}

