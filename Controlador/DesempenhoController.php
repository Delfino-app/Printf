
<?php

 class desempenhoUserController{

 	public static function contarMediaDesempenho(){

 		$dados=desempenhoUserModel::allDadosDesempenho("desempenho");

 		if (!empty($dados)) {
 			
 			foreach ($dados as $key => $value) {
 				
 				$media = ($value["assistenciaAulas"] + $value["participacoesAulas"] + $value["resolucaoTarefas"] + $value["avaliacoesProvas"])/4;

 				$updateMediaDesemplo = desempenhoUserModel::updateMediaDesemploModel("desempenho", $value["id"], $media);
 			}
 		}
 	}

 	public static function rankingLista(){

 		$ranking=desempenhoUserModel::rakingModel("desempenho");

 		if (!empty($ranking)) {

 			echo '<ul class="ListaRaking">';

 			foreach ($ranking as $key => $value) {
 				
 				$user = desempenhoUserModel::userDados("usuarios",$value["idUser"]);

 				if (!empty($user)) {

 					$srcImgPerfil = 'src="Vista/Imagens/upload/UserPerfil/'.$user["img"].'"';

 					echo '
						<li>
					   		<a class="modal-trigger" href="#'.$user["id"].'" id="UserRaking">
					   			<img '.$srcImgPerfil.' alt="Contact Person">
					   			'.$user["primeiroNome"].'  '.$user["ultimoNome"].'
 					';
 					#Caso o nível de desempenho seja maior que 44
 					if ($value["mediaDesempenho"] > 44) {
 						echo '
 								<span class="UserRakingPontuacao">
					   				<i class="raking StatisticaMedia fa fa-level-up"></i>'.$value["mediaDesempenho"].' %
					   			</span>
					   		</a>
					   	</li>
					   	<li class="divider"></li>
 						';
 					}
 					#Caso o nível de desempenho seja menor que 45
 					else{

 						echo '
 								<span class="UserRakingPontuacao">
					   				<i class="raking StatisticaBaixo fa fa-level-down"></i>'.$value["mediaDesempenho"].' %
					   			</span>
					   		</a>
					   	</li>
					   	<li class="divider"></li>
 						';
 					}

 					desempenhoUserController::rakingModalUserInfo($value,$user,$srcImgPerfil);
 				}
 			}

 			echo '<li><a  id="ListaRakingCompleta"></a></li></ul>';
 		}
 		else{

 			echo'<p>Lista Indisponével</p>';
 		}
 	}

 	public static function rakingModalUserInfo($value,$user,$img){

 		$mediaDesempenho = false;

 		if ($value["mediaDesempenho"] > 44) {
			$mediaDesempenho = '
				<span id="MediaDesempenhoUser" title="Média do desempenho">
   				<i class="raking StatisticaMedia fa fa-level-up"></i>'.$value["mediaDesempenho"].' %
	   			</span>
			';
		}
		#Caso o nível de desempenho seja menor que 45
		else{

			$mediaDesempenho = '
				<span id="MediaDesempenhoUser" title="Média do desempenho">
	   				<i class="raking StatisticaBaixo fa fa-level-down"></i>'.$value["mediaDesempenho"].' %
	   			</span>
			';
		}

 		echo'
			<div id="'.$user["id"].'" class="modal modal-fixed-footer" style="background-color:transparent;box-shadow:none;">
			    <div class="modal-content">
			       <a id="btnFechar" title="Fechar" class="modal-action modal-close"><i class="fa fa-close"></i>
			       </a>
			       <div id="modalRakingUserInfo" class="bounceInLeft animated">
			       		<div style="padding-bottom:10px;">
			       			<img id="UserImg" '.$img.' alt="Contact Person">
				       		<h3 id="UserName_and_MediaDesempenho">
							 	'.$user["primeiroNome"].'  '.$user["ultimoNome"].'
							 	<span style="float:right">
							 		<span title="Classificação geral" style="margin-right:50px;cursor:pointer">
										'.desempenhoUserController::classificacaoModalGeral($value).'
									</span>
									<span class="pontosBtc center" title="Pontuação" style="margin-right:50px;">
										'.$value["pontuacao"].' 
										<i class="fa fa-btc"></i>
									</span>
									'.$mediaDesempenho.'
								</span>
							</h3>
			       		</div>
			       		<div class="divider"></div>
			       		<div class="row" style="margin-top:10px;padding:10px;">
			       			<!--Aproveitamento-->
			       			'.desempenhoUserController::desempenhoDadosModal($value).'
							<div class="col s12 l12" style="padding-top:10px;">
								<div class="divider"></div>
			      
			    		    </div>
			       		</div>
			       </div>
			    </div>
			</div>

 		';
 	}

 	public static function desempenhoDadosModal($dadosDesempenho){

 		return '
 			<!--Aproveitamento-->
   			<div id="DadosEstatistico" class="col s12 l12">
				<div id="EstatisticaItemModal" class="col s12 m5 l3">
					<span>1.Assistência as aulas</span>
				</div>
				<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["assistenciaAulas"].'% de aproveitamento" class="col s12 m7 l9">
					<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["assistenciaAulas"].'%;">
						'.$dadosDesempenho["assistenciaAulas"].'%
					</div>
				</div>
			</div>
			<div id="DadosEstatistico" class="col s12 l12">
				<div id="EstatisticaItemModal" class="col s12 m5 l3">
					2.Participações
				</div>
				<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["participacoesAulas"].'% de aproveitamento" class="col s12 m7 l9">
					<div  class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["participacoesAulas"].'%;">
						'.$dadosDesempenho["participacoesAulas"].'%
					</div>
				</div>
			</div>
			<div id="DadosEstatistico" class="col s12 l12">
				<div id="EstatisticaItemModal" class="col s12 m5 l3">
					3.Resolução de Tarefas
				</div>
				<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["resolucaoTarefas"].'% de aproveitamento" class="col s12 m7 l9">
					<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["resolucaoTarefas"].'%;">
						'.$dadosDesempenho["resolucaoTarefas"].'%
					</div>
				</div>
			</div>
			<div id="DadosEstatistico" class="col s12 l12">
				<div id="EstatisticaItemModal" class="col s12 m5 l3">
					4.Avaliações/Provas
				</div>
				<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["avaliacoesProvas"].'% de aproveitamento" class="col s12 m7 l9">
					<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["avaliacoesProvas"].'%;">
						'.$dadosDesempenho["avaliacoesProvas"].'%
					</div>
				</div>
			</div>
 		';
 	}

 	public static function classificacaoModalGeral($dadosDesempenho){

 		if (!empty($dadosDesempenho)) {
 			
 			if ($dadosDesempenho["mediaDesempenho"] >= 0 && $dadosDesempenho["mediaDesempenho"] < 10) {
 				
 				return '
 					<span class="Estrelas center" title="Não avaliado">
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 10 && $dadosDesempenho["mediaDesempenho"] < 20) {
 				
 				return '
 					<span class="Estrelas center" title="Baixa">
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 20 && $dadosDesempenho["mediaDesempenho"] < 30) {
 				 
 				return '
 					<span class="Estrelas center" title="Baixa">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 30 && $dadosDesempenho["mediaDesempenho"] < 40) {
 				
 				return '
 					<span class="Estrelas center" title="Normal">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 40 && $dadosDesempenho["mediaDesempenho"] < 50) {
 				
 				return '
 					<span class="Estrelas center" title="Normal">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 50 && $dadosDesempenho["mediaDesempenho"] < 60) {
 				
 				return '
 					<span class="Estrelas center" title="Boa">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 60 && $dadosDesempenho["mediaDesempenho"] < 70) {
 				
 				return '
 					<span class="Estrelas center" title="Boa">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 70 && $dadosDesempenho["mediaDesempenho"] < 80) {
 				
 				return '
 					<span class="Estrelas center" title="Muito Boa">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 80 && $dadosDesempenho["mediaDesempenho"] < 90) {
 				
 				return '
 					<span class="Estrelas center" title="Muito Boa">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 90 && $dadosDesempenho["mediaDesempenho"] < 100) {
 				
 				return '
 					<span class="Estrelas center" title="Excelente">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
					</span>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] == 100) {
 				
 				return '
 					<span class="Estrelas center" title="Excelente">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
					</span>
 				';
 			}
 		}

 	}

 	#Desempenho User Only
 	public static function classificacaoGeral(){

 		$idUser = $_SESSION['id'];

 		$dadosDesempenho=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

 		if (!empty($dadosDesempenho)) {
 			
 			if ($dadosDesempenho["mediaDesempenho"] >= 0 && $dadosDesempenho["mediaDesempenho"] < 10) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Não avaliado</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 10 && $dadosDesempenho["mediaDesempenho"] < 20) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Baixa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 20 && $dadosDesempenho["mediaDesempenho"] < 30) {
 				 
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Baixa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 30 && $dadosDesempenho["mediaDesempenho"] < 40) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Normal</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 40 && $dadosDesempenho["mediaDesempenho"] < 50) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Normal</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 50 && $dadosDesempenho["mediaDesempenho"] < 60) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Boa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 60 && $dadosDesempenho["mediaDesempenho"] < 70) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Boa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 70 && $dadosDesempenho["mediaDesempenho"] < 80) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Muito Boa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 80 && $dadosDesempenho["mediaDesempenho"] < 90) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-o"></i>
					</p>
					<h3 id="Classifi" class="center">Muito Boa</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] >= 90 && $dadosDesempenho["mediaDesempenho"] < 100) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star-half-o"></i>
					</p>
					<h3 id="Classifi" class="center">Excelente</h3>
 				';
 			}
 			elseif ($dadosDesempenho["mediaDesempenho"] == 100) {
 				
 				echo'
 					<p class="Estrelas center">
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
						<i class="IconEstrelas fa fa-star"></i>
					</p>
					<h3 id="Classifi" class="center">Excelente</h3>
 				';
 			}
 		}

 	}
 	public static function pontuacao(){

 		$idUser = $_SESSION['id'];

 		$dadosDesempenho=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

 		if (!empty($dadosDesempenho)) {
 			
 			echo'
 				<p class="pontosBtc center" title="'.$dadosDesempenho["pontuacao"].' Bitcoins">
			        '.$dadosDesempenho["pontuacao"].' 
			        <i class="fa fa-btc"></i>
			    </p>
 			';
 		}
 	}

 	public static function detalhes(){

 		$idUser = $_SESSION['id'];

 		$dadosUser=desempenhoUserModel::userDados("usuarios",$idUser);

 		if (!empty($dadosUser)) {
 			
 			 	echo '
		 			<p class="DetalhesP">
					   	Nível: <span class="DetalhesValores">'.$dadosUser["nivel"].'</span><br>
					   	Aulas: <span class="DetalhesValores">'.$dadosUser["aula_atual"].'/'.$dadosUser["total_aula"].'</span><br>
					   	Atividades: <span class="DetalhesValores">14/20</span><br>
					   	Avaliações:<span class="DetalhesValores">2/4</span><br>
				        Provas: <span class="DetalhesValores">1/6</span><br>
					</p>
		 		';
 		}
 	}

 	public static function desempenhoDados(){

 		$idUser = $_SESSION['id'];

 		$dadosDesempenho=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

 		if (!empty($dadosDesempenho)) {

 			$user = desempenhoUserModel::userDados("usuarios",$dadosDesempenho["idUser"]);
 			if (!empty($user)) {
 				
	 			$srcImgPerfil = 'src="Vista/Imagens/upload/UserPerfil/'.$user["img"].'"';

	 			$mediaDesempenho = false;

		 		if ($dadosDesempenho["mediaDesempenho"] > 44) {
					$mediaDesempenho = '
						<span id="MediaDesempenhoUser" title="Média do desempenho">
		   				<i class="raking StatisticaMedia fa fa-level-up"></i>'.$dadosDesempenho["mediaDesempenho"].' %
			   			</span>
					';
				}
				#Caso o nível de desempenho seja menor que 45
				else{

					$mediaDesempenho = '
						<span id="MediaDesempenhoUser" title="Média do desempenho">
			   				<i class="raking StatisticaBaixo fa fa-level-down"></i>'.$dadosDesempenho["mediaDesempenho"].' %
			   			</span>
					';
				}

	 			echo'
	 				<div id="UserInfo" class="col s12 l12">
						<div id="UserImgNameContainer" class="col s12 l12">
							<img id="UserImg" '.$srcImgPerfil.'>
						    <h3 id="UserName_and_MediaDesempenho">
							 	'.$user["primeiroNome"].'  '.$user["ultimoNome"].'
							 	'.$mediaDesempenho.'
							</h3>
						</div>
					</div>
					
					<!--Aproveitamento-->
	       			<div id="DadosEstatistico" class="col s12 l12">
						<div id="EstatisticaItemModal" class="col s12 m5 l3">
							<span>1.Assistência as aulas</span>
						</div>
						<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["assistenciaAulas"].'% de aproveitamento" class="col s12 m7 l9">
							<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["assistenciaAulas"].'%;">
								'.$dadosDesempenho["assistenciaAulas"].'%
							</div>
						</div>
					</div>
					<div id="DadosEstatistico" class="col s12 l12">
						<div id="EstatisticaItemModal" class="col s12 m5 l3">
							2.Participações
						</div>
						<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["participacoesAulas"].'% de aproveitamento" class="col s12 m7 l9">
							<div  class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["participacoesAulas"].'%;">
								'.$dadosDesempenho["participacoesAulas"].'%
							</div>
						</div>
					</div>
					<div id="DadosEstatistico" class="col s12 l12">
						<div id="EstatisticaItemModal" class="col s12 m5 l3">
							3.Resolução de Tarefas
						</div>
						<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["resolucaoTarefas"].'% de aproveitamento" class="col s12 m7 l9">
							<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["resolucaoTarefas"].'%;">
								'.$dadosDesempenho["resolucaoTarefas"].'%
							</div>
						</div>
					</div>
					<div id="DadosEstatistico" class="col s12 l12">
						<div id="EstatisticaItemModal" class="col s12 m5 l3">
							4.Avaliações/Provas
						</div>
						<div id="EstatisticaPercentagemConatiner" title="'.$dadosDesempenho["avaliacoesProvas"].'% de aproveitamento" class="col s12 m7 l9">
							<div class="'.$_SESSION['UserTema'].'" id="EstatisticaItemPercentagem" style="width:'.$dadosDesempenho["avaliacoesProvas"].'%;">
								'.$dadosDesempenho["avaliacoesProvas"].'%
							</div>
						</div>
					</div>
	 			';
 			}
 		}
 	}
 }