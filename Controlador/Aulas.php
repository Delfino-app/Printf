


<?php

class aulas{


	public static function tabsLinkActive(){

		$idUser = $_SESSION['id'];

		#Exercicios
		$verificarExericios = ExercicioModelo::VerificarExercicioEstadoModelo("resolver_exercicio", $idUser,"pendente");

		if (!empty($verificarExericios)) {
			
			echo '<ul id="tabsContainerInicio" class="tabs inicio">
		           <li class="tab col s3"><a class="tabsInicio" href="#aulas">Aulas</a></li>
		           <li class="tab col s3"><a class="tabsInicio active" href="#exercicios">Exercícios</a></li>
		           <li class="tab col s3"><a class="tabsInicio" href="#provas">Provas</a></li>
		      	</ul>';
		}
		else{

			echo '<ul id="tabsContainerInicio" class="tabs inicio">
		           <li class="tab col s3"><a class="tabsInicio active" href="#aulas">Aulas</a></li>
		           <li class="tab col s3"><a class="tabsInicio" href="#exercicios">Exercícios</a></li>
		           <li class="tab col s3"><a class="tabsInicio" href="#provas">Provas</a></li>
		      	</ul>';
		}
	}
	public static function infoProvas(){

		echo '
			<div class="col l2 hide-on-med-and-down"></div>
			<div class="col s12 l8 white AulasContainer" style="margin-top:25px;padding-top:35px;padding-bottom: 35px;">
				<div id="inicioAulaPrevisaoContainer">
					<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Provas
					</h3
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						Não disponível no momento.
					</p>
					<!--<p class="center">
						<a class="center btn btn-success  light-blue darken-3 modal-trigger" id="btnStart" href="#resolverExercicios">
							Resolver exercícios
						</a>
					</p>-->
				</div>
			</div><div class="col l2 hide-on-med-and-down"></div>
			';


	}
	public static function infoExercicios(){

		$idUser = $_SESSION['id'];

		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

		$idAulaAnterior = $dadosUser["aula_atual"] - 1;

		$dadosExericios = ExercicioModelo::VerificarExercicioUserModelo("resolver_exercicio", $idUser,$idAulaAnterior, "pendente");
		
		echo '
			<div class="col l2 hide-on-med-and-down"></div>
			<div class="col s12 l8 white AulasContainer" style="margin-top:25px;padding-top:35px;padding-bottom: 35px;">
				<div id="inicioAulaPrevisaoContainer">
					<h3 class="AulaTarefaInfo" style="color:#0277bd;">
						Exercícios
					</h3
			';

		if (!empty($dadosExericios)) {

			$numeroExercicios =0;
			$totalPontuacao = 0;
			foreach ($dadosExericios as $key => $value) {

				$dadosExericioInfo=desempenhoUserModel::userDados("exercicio",$value["idExercicio"]);
				
				$numeroExercicios +=1;
				$totalPontuacao +=$dadosExericioInfo["pontuacao"];
			}

			$pontuacao = '<p class="pontosBtc center" title="'.$totalPontuacao.' Bitcoins" style="font-size:14pt;">
			        '.$totalPontuacao.' 
			        <i class="fa fa-btc"></i>
			    </p>';

			echo '
				<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosUser["primeiroNome"].', tens '.$numeroExercicios.' exercícios da aula anterior para resolveres.<br>
						<span style="font-size:10.20pt;">
							Caso resolvas os '.$numeroExercicios.' exercícios terás uma pontuação total de 
						</span>
						'.$pontuacao.'
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3 modal-trigger" id="btnStart" href="#resolverExercicios">
							Resolver exercícios
						</a>
					</p>
				</div>
			</div><div class="col l2 hide-on-med-and-down"></div>
			';	
		}
		else{

			echo '
					<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
						'.$dadosUser["primeiroNome"].', ainda não tens  exercícios para resolveres.<br>
						<span style="font-size:10.20pt;">
							Para resolveres exercícios e tens que primeiro concluir a aula atual
						</span>
					</p>
					<p class="center">
						<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
							Começar Aula
						</a>
					</p>
				</div>
			</div><div class="col l2 hide-on-med-and-down"></div>';
		}
	}
	public static function infoAula(){

		$idUser = $_SESSION['id'];

 		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

 		#Dados Aula

 		$dadosAula = aulasModel:: dadosAulaUser("aulas", $dadosUser["aula_atual"], $dadosUser["nivel"]);

 		if (!empty($dadosAula)) {
 			
 			if ($dadosUser["aula_atual"] > 1) {

 				$anterior = $dadosAula["id"] - 1;
 				
 				echo '
					<div class="col s1 l2" style="padding:0px;">
						<a onclick="aulaAnteriorPrevisao('.$anterior.')" id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
							<i class="fa fa-angle-left" style="font-size:20px;"></i>
						</a>
					</div>
				';
 			}
 			else{

 				echo '
					<div class="col s1 l2" style="padding:0px;">
						<a disabled id="aulaAnteriorPrevisao" class="right btn '.$_SESSION['UserTema'].'">
							<i class="fa fa-angle-left" style="font-size:20px;"></i>
						</a>
					</div>
				';
 			}

			echo'
				<div class="col s10 l8 white AulasContainer" style="padding-top: 35px;padding-bottom: 35px;">
					<div id="inicioAulaPrevisaoContainer">
						<h3 class="AulaTarefaInfo" style="color:#0277bd;">
							Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
						</h3>
						<p class="center" style="color:#495057;padding-top:5px;padding-bottom:10px;">
							'.$dadosAula["resumo"].'
						</p>
						<p class="center">
							<a class="center btn btn-success  light-blue darken-3" id="btnStart" href="Aulas_Iniciar">
								Começar Aula
							</a>
						</p>
					</div>
				</div>
				<div class="col s1 l2" style="padding:0px;">
					<a id="aulaSeguintePrevisao" onclick="aulaSeguintePrevisao('.$dadosAula["id"].')" class="left btn '.$_SESSION['UserTema'].'">
						<i class="fa fa-angle-right" style="font-size:20px;"></i>
					</a>
				</div>
 			';
 		}
	}

	#Aula
	public static function infoAulaInside(){

		$idUser = $_SESSION['id'];

 		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

 		#Verificar Exercicio Pendente da aula anterior

 		$idAulaAnterior = $dadosUser["aula_atual"] - 1;

		$dadosExericios = ExercicioModelo::VerificarExercicioUserModelo("resolver_exercicio", $idUser,$idAulaAnterior, "pendente");

 		#Dados Aula

		if (empty($dadosExericios)) {
			

	 		$dadosAula = aulasModel:: dadosAulaUser("aulas", $dadosUser["aula_atual"], $dadosUser["nivel"]);

	 		if (!empty($dadosAula)) {
	 			
	 			echo '
	 			<div class="center '.$dadosUser["tema"].'">
					<div class="container">
						<div class="row" style="padding:10px;">
							<div class="col s12 l3"></div>
				 				<div class="col s12 l6">
									<h3 class="center nivelTitulo">Lógica de Programação</h3>
									<h3 class="AulaTarefaInfo">
										Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
									</h3>
								</div>
							<div class="col s12 l3"></div>
						</div>
					</div>	
				</div>
				<div>
					<div class="container">
						<div class="row">

							<div class="col hide-on-small-only m3 l2 white" style="padding:0px;">
							  	<p id="suporteAulasTitulo" class="white-text '.$_SESSION["UserTema"].'">Índice</p>
							      <div style="padding-left:15px;padding-top:0px;margin-top:-10px;">
							      	<ul class="section table-of-contents">
								      	'.$dadosAula["subtema"].'
								      </ul>
							      </div>
							    </p>
						    </div>
					
							<div class="col s12 l8" style="padding-top:0px;">
								<p class="responsive-text" style="background-color:#ffffff;color:#333;text-align:left;padding:25px;margin-top:-1px;">'.$dadosAula["conteudo"].'</p>
								<div class="divider" style="background-color:#d1d1d1"></div>
								<p class="right">
									<a class="center btn light-blue darken-3 modal-trigger btnTerminarAula"  href="#fim">
										Terminar aula
									</a>
								</p>
							</div>
							<div class="col hide-on-small-only m3 l2 white" style="padding-left:0px;padding-right:0px;">
								<p id="suporteAulasTitulo" class="white-text '.$_SESSION["UserTema"].'">Suporte</p>
								<ul class="collapsible" id="suporteOpcoesContainer" data-collapsible="accordion">
								    <!--<li>
								      <div class="collapsible-header waves-effect info active" title="Exibir/Ocultar Anotações"><span class="spanSuporteOpecoesTitulo"></span>Anotações
								      </div>
								      <div class="collapsible-body" style="padding-right:5px;">
								      		<form id="frmAddAnotacoesAula" style=" padding-bottom: 5px;">
								      			<input type="text" id="AnotacoesAulaAddId" value="'.$dadosAula["id"].'" hidden>
									    		<div class="col l12" style="padding-top:0px;padding-left:0px;">
									    			<textarea id="AnotacoesAulaAdd" class="materialize-textarea custom" required placeholder="Escreva aqui as suas anotações" style="margin-left:-3px;"></textarea>
									    		</div>
									    		<button class="btn btnAddAulas btnAddSuporteAula" type="submit">Salvar</button>
									    	</form>
								      </div>
								    </li>-->
								    <li>
								        <div class="collapsible-header waves-effect info active" title="Exibir/Ocultar Dúvidas"><span class="spanSuporteOpecoesTitulo"></span>Dúvidas
								        </div>
									    <div class="collapsible-body">
									    	<div id="displayDuvidas">
									    		<form id="frmAddDuvidaAula" style=" padding-bottom: 5px;">
									    		<input type="text" id="duvidaAulaIdAdd" value="'.$dadosAula["id"].'" hidden>
									    		<div class="col l12" style="padding-top:0px;padding-left:0px;">
									    			<textarea id="duvidaAulaAdd" class="materialize-textarea custom" required placeholder="Escreva aqui as suas dúvidas" style="margin-left:-3px;"></textarea>
									    		</div>
									    		<button class="btn btnAddAulas btnAddSuporteAula" type="submit">Enviar</button>
									    	</form>
									    	</div>
									    </div>
								    </li>
							    </ul>
							</div>
						</div>
					</div>
				</div>
				<div id="fim" class="modal" style="width:45%;">
				    <div class="modal-content">
				       <a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333"><i class="fa fa-close"></i>
				       </a>
				       <div class="row">
				       		<div class="col l12">
				       			<div id="displayInfoTerminarAulaModal" style="padding-top:10px;padding-bottom:10px;">
									<h3 class="center nivelTitulo" style="color:#495057;font-size:20pt;">
									   	Terminar a aula?
									</h3>
									<h3 class="AulaTarefaInfo" style="color:#495057;font-size:12pt;">
										<span style="font-size:10.25pt;">Antes de terminar a aula, certifique-se que conseguiu entender o conteúdo da aula.</span><br><br>
										<a class="btn btnTerminarAula btnResolverExercicioDepois" onclick="terminarAula(0)" style="padding-left:30px;padding-right:30px;">Não</a>
										<a class="btn btnTerminarAula btnResolverExercicioAgora" onclick="terminarAula('.$dadosAula["id"].')" style="padding-left:30px;padding-right:30px;">Sim</a>
									</h3>
								</div>
				       		</div>
				       </div>
				    </div>
				</div>
	 			';
	 		}
		}
		else{

			header("location:Inicio");
		}
	}
	public static function infoAulaInsideResumoModal(){

		$idUser = $_SESSION['id'];

 		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

 		#Dados Aula
 		$dadosAula = aulasModel:: dadosAulaUser("aulas", $dadosUser["aula_atual"], $dadosUser["nivel"]);

 		if (!empty($dadosAula)) {
 		
 			echo '
 				<div id="teste" class="modal modal-fixed-footer">
				    <div class="modal-content">
				        <div>
				       		<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333"><i class="fa fa-close"></i>
				       		</a>
				        </div>
				        <div class="row fadeIn animated" style="margin-top:20px;">
					   		<div class="col l12">
					   			<h3 class="center nivelTitulo" style="color:#495057;font-size:20pt;">
					   				Lógica de Programação
					   			</h3>
								<h3 class="AulaTarefaInfo" style="color:#495057;font-size:12pt;">
									Aula nº '.$dadosAula["id"].' - '.$dadosAula["tema"].'
								</h3>
								<div class="divider" style="color:#495057"></div>
					   		</div>
					   		<div class="col s12 l12" id="resumoAulaModal">
					   			<h3 class="col s12 l12 left nivelTitulo" style="color:#0277bd;font-size:16pt;margin-top:15px;padding-left:0px;">
					   				Resumo
					   			</h3>
					   			<div class="col s12 l12" style="margin-top:-15px;">
					   				<p  style="padding:0px;">
						   				'.$dadosAula["resumo"].'
						   			</p>
					   			</div>
					   		</div>
					   		<div class="col l12" id="dicaAulaModal">
					   			<h3 class=" col s12 l12 left nivelTitulo" style="color:#0277bd;font-size:16pt;margin-top:15px;padding-left:0px;">
					   				Frase do dia 
					   			</h3>
					   			<div class="col s12 l12" style="margin-top:-15px;">
					   				<p  style="padding:0px;">
						   				'.$dadosAula["dica"].'
						   			</p>
					   			</div>
					   		</div>
					    </div>
				    </div>
				    <div class="modal-footer">
						<a class="center btn light-blue darken-3 btnTerminarAula" id="btnSeguinteModal">
							Seguinte
						</a>
				    </div>
				</div>
 			';
 		}
 	}
}