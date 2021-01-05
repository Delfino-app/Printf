
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

 #Imagens de Interacao

 $imgSorry = 'src="../../Vista/Imagens/interacao/sorry.jpeg"';

 $imgHappy = 'src="../../Vista/Imagens/interacao/happy.jpeg"';


 if (isset($_POST["itemCategoria"]) && isset($_POST["itemRef"])) {

 	$itemCategoria = $_POST["itemCategoria"];

 	$itemRef = $_POST["itemRef"];

 	$pontuacaoUser=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

 	
 	if ($itemCategoria == 1) {
 		
 		#Comprar Livro

 		$dadosItemLoja = lojamodel::AllIdModel("m_livros", $itemRef);

 		if (!empty($dadosItemLoja)) {

 			#Verificar se já comprou este item

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$itemRef,$idUser,"livros");
 			
 			if (empty($verificarItemComprado)) {
 				
 				$precoNecessario = intval($dadosItemLoja["preco"] - $pontuacaoUser["pontuacao"]);

	 			$precoNecessarioInfo ='
					<span class="pontosBtc" title="'.$precoNecessario.' Bitcoins" style="padding-right:0px">
			        	'.$precoNecessario.' 
			        	<i class="fa fa-btc"></i>
			   		</span>
				';

				$precoDescontadoInfo ='
					<span class="pontosBtc" title="'.$dadosItemLoja["preco"].' Bitcoins">
			        	'.$dadosItemLoja["preco"].' 
			        	<i class="fa fa-btc"></i>
			   		</span>
				';

	 			if ($pontuacaoUser["pontuacao"] < $dadosItemLoja["preco"]) {

	 				
	 				echo '
	 					<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Pontuação insuficiente<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Para comprar este livro precisa de '.$precoNecessarioInfo.'
	 						</span>
	 					</p>
	 				';
	 			}
	 			else{

	 				#Comprar - Comfirmar compra

	 				echo '

	 					<p class="center nivelTitulo" style="color:#495057;font-size:13pt;">
						   	Comprar livro?
						</p>
						<p class="nivelTitulo center" style="color:#495057;font-size:11pt;">
							<span style="font-size:10.25pt;">
								Se comprar este livro, será discontado  '.$precoDescontadoInfo.' da sua Pontuação.
							</span>
							<br><br>
							<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
								Não
							</a>
							<a class="btn btnTerminarAula btnResolverExercicioAgora"  style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada('.$itemRef.','.$itemCategoria.')">
								Sim
							</a>
						</p>
	 				';
	 			}
 			}
 			else{

 				#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este livro!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este livro já foi adicionado à sua lista de livros.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';
 			}
 		}
 	}
 	elseif ($itemCategoria == 2) {

 		#Comprar Artigo
 		
 		$dadosItemLoja = lojamodel::AllIdModel("m_artigos", $itemRef);

 		if (!empty($dadosItemLoja)) {

 			#Verificar se já comprou este item

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$itemRef,$idUser,"artigos");
 			
 			if (empty($verificarItemComprado)) {

	 			$precoDescontadoInfo ='
					<span class="pontosBtc" title="'.$dadosItemLoja["preco"].' Bitcoins">
			        	'.$dadosItemLoja["preco"].' 
			        	<i class="fa fa-btc"></i>
			   		</span>
				';
	 			
	 			if ($pontuacaoUser["pontuacao"] < $dadosItemLoja["preco"]) {

	 				$precoNecessario = $dadosItemLoja["preco"] - $pontuacaoUser["pontuacao"];

	 				$precoNecessarioInfo ='

	 					<span class="pontosBtc" title="'.$precoNecessario.' Bitcoins">
				        	'.$precoNecessario.' 
				        	<i class="fa fa-btc"></i>
				   		</span>
				   	';
	 				
	 				echo '
	 					<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Pontuação insuficiente<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Para comprar este livro precisa de '.$precoNecessarioInfo.'
	 						</span>
	 					</p>
	 				';
	 			}
	 			else{

	 				#Comprar - Comfirmar compra

	 				echo '

	 					<p class="center nivelTitulo" style="color:#495057;font-size:13pt;">
						   	Comprar artigo?
						</p>
						<p class="nivelTitulo center" style="color:#495057;font-size:11pt;">
							<span style="font-size:10.25pt;">
								Se comprar este artigo, será discontado  '.$precoDescontadoInfo.' da sua Pontuação.
							</span>
							<br><br>
							<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
								Não
							</a>
							<a class="btn btnTerminarAula btnResolverExercicioAgora"  style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada('.$itemRef.','.$itemCategoria.')">
								Sim
							</a>
						</p>
	 				';
	 			}
	 		}
	 		else{

	 			#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este artigo!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este artigo já foi adicionado à sua lista de artigos.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';
	 		}
 		}
 	}
 	elseif ($itemCategoria == 3) {

 		#Comprar Video
 		
 		$dadosItemLoja = lojamodel::AllIdModel("m_videos", $itemRef);

 		if (!empty($dadosItemLoja)) {

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$itemRef,$idUser,"videos");
 			
 			if (empty($verificarItemComprado)) {

	 			$precoDescontadoInfo ='
					<span class="pontosBtc" title="'.$dadosItemLoja["preco"].' Bitcoins">
			        	'.$dadosItemLoja["preco"].' 
			        	<i class="fa fa-btc"></i>
			   		</span>
				';
	 			
	 			if ($pontuacaoUser["pontuacao"] < $dadosItemLoja["preco"]) {

	 				$precoNecessario = $dadosItemLoja["preco"] - $pontuacaoUser["pontuacao"];

	 				$precoNecessarioInfo ='

	 					<span class="pontosBtc" title="'.$precoNecessario.' Bitcoins">
				        	'.$precoNecessario.' 
				        	<i class="fa fa-btc"></i>
				   		</span>
				   	';
	 				
	 				echo '
	 					<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Pontuação insuficiente<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Para comprar este livro precisa de '.$precoNecessarioInfo.'
	 						</span>
	 					</p>
	 				';
	 			}
	 			else{

	 				#Comprar - Comfirmar compra

	 				echo '

	 					<p class="center nivelTitulo" style="color:#495057;font-size:13pt;">
						   	Comprar video?
						</p>
						<p class="nivelTitulo center" style="color:#495057;font-size:11pt;">
							<span style="font-size:10.25pt;">
								Se comprar este video, será discontado  '.$precoDescontadoInfo.' da sua Pontuação.
							</span>
							<br><br>
							<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
								Não
							</a>
							<a class="btn btnTerminarAula btnResolverExercicioAgora"  style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada('.$itemRef.','.$itemCategoria.')">
								Sim
							</a>
						</p>
	 				';
	 			}
	 		}
	 		else{

	 			#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este video!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este video já foi adicionado à sua lista de videos.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';
	 		}
 		}
 	}
 	else{

 		echo 'Erro..';
 	}
}




#Comprar - depois de confirmar

if (isset($_POST["comprarItemLojaRef"]) && isset($_POST["comprarItemLojaCetgoria"])) {
	
	$comprarItemLojaRef = $_POST["comprarItemLojaRef"];

 	$comprarItemLojaCetgoria = $_POST["comprarItemLojaCetgoria"];

 	$pontuacaoUser=desempenhoUserModel::userDesempenhoModel("desempenho",$idUser);

 	
 	if ($comprarItemLojaCetgoria == 1) {
 		
 		#Comprar Livro

 		$dadosItemLoja = lojamodel::AllIdModel("m_livros", $comprarItemLojaRef);

 		if (!empty($dadosItemLoja)) {

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$comprarItemLojaRef,$idUser,"livros");
 			
 			if (empty($verificarItemComprado)) {

	 			if ($pontuacaoUser["pontuacao"] >= $dadosItemLoja["preco"]) {

	 				
	 				#Add Livros Comprados

	 				$dados = array (

	 					'idUser' => $idUser,
	 					'idItem' => $comprarItemLojaRef,
	 					'categoria' => "livros"
	 				);

	 				$addLivrosComprados = lojamodel::addComprarItenLojaModelo("comprar_item_loja",$dados);

	 				#Nova pontuacao 
	 				$novaPontuacao = $pontuacaoUser["pontuacao"] - $dadosItemLoja["preco"];

	 				#Update Pontuacao

	 				$UpdatePontuacoaUser = updateDados::updatePontuacaoUserModelo("desempenho", $idUser,$novaPontuacao);

	 				if ($addLivrosComprados == "Feito" && $UpdatePontuacoaUser == "Feito") {


	 					
	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgHappy.'>
		 						<br>Livro comprado com sucesso!<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							O livro foi adicionado à sua lista de livros.
		 						</span><br><br>
		 						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
									Ok
								</a>
		 					</p>
	 					';
	 				}
	 				else{


	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgSorry.'>
		 						<br>Erro ao comprar livro<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							Houve um erro inesperado ao comprar o livro. Tente de novo mais tarde.
		 						</span>
		 					</p>
	 					';
	 				}
	 			}
	 			else{


	 				echo '
						<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Erro ao comprar livro<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Houve um erro inesperado ao comprar o livro. Tente de novo mais tarde.
	 						</span>
	 					</p>
					';
	 			}
	 		}
	 		else{

	 			#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este livro!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este livro já foi adicionado à sua lista de livros.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';

	 		}
 		}
 		else{


			echo '
				<p class="center interacaoSorry">
					<img class="imgInteracao" '.$imgSorry.'>
					<br>Erro ao comprar livro<br>
					<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
						Houve um erro inesperado ao comprar o livro. Tente de novo mais tarde.
					</span>
				</p>
			';
		}
 	}
 	elseif ($comprarItemLojaCetgoria == 2) {

 		#Comprar Artigo
 		
 		$dadosItemLoja = lojamodel::AllIdModel("m_artigos", $comprarItemLojaRef);

 		if (!empty($dadosItemLoja)) {

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$comprarItemLojaRef,$idUser,"artigos");
 			
 			if (empty($verificarItemComprado)) {
 			
	 			if ($pontuacaoUser["pontuacao"] >= $dadosItemLoja["preco"]) {

	 				
	 				#Add Livros Comprados

	 				$dados = array (

	 					'idUser' => $idUser,
	 					'idItem' => $comprarItemLojaRef,
	 					'categoria' => "artigos"
	 				);

	 				$addLivrosComprados = lojamodel::addComprarItenLojaModelo("comprar_item_loja",$dados);

	 				#Nova pontuacao 
	 				$novaPontuacao = $pontuacaoUser["pontuacao"] - $dadosItemLoja["preco"];

	 				#Update Pontuacao

	 				$UpdatePontuacoaUser = updateDados::updatePontuacaoUserModelo("desempenho", $idUser,$novaPontuacao);

	 				if ($addLivrosComprados == "Feito" && $UpdatePontuacoaUser == "Feito") {
	 					
	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgHappy.'>
		 						<br>Artigo comprado com sucesso!<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							O Artigo foi adicionado à sua lista de artigos.
		 						</span><br><br>
		 						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
									Ok
								</a>
		 					</p>
	 					';
	 				}
	 				else{


	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgSorry.'>
		 						<br>Erro ao comprar artigo<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							Houve um erro inesperado ao comprar o artigo. Tente de novo mais tarde.
		 						</span>
		 					</p>
	 					';
	 				}
	 			}
	 			else{


	 				echo '
						<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Erro ao comprar artigo<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Houve um erro inesperado ao comprar o artigo. Tente de novo mais tarde.
	 						</span>
	 					</p>
					';
	 			}
	 		}
	 		else{

	 			#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este artigo!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este artigo já foi adicionado à sua lista de artigos.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';	
	 		}
 		}
 		else{


			echo '
				<p class="center interacaoSorry">
					<img class="imgInteracao" '.$imgSorry.'>
					<br>Erro ao comprar artigo<br>
					<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
						Houve um erro inesperado ao comprar o artigo. Tente de novo mais tarde.
					</span>
				</p>
			';
		}
 	}
 	elseif ($comprarItemLojaCetgoria == 3) {

 		#Comprar Video
 		
 		$dadosItemLoja = lojamodel::AllIdModel("m_videos", $comprarItemLojaRef);

 		if (!empty($dadosItemLoja)) {

 			$verificarItemComprado = lojamodel::verificarItemCompradoModelo("comprar_item_loja",$comprarItemLojaRef,$idUser,"videos");
 			
 			if (empty($verificarItemComprado)) {
 			
	 			if ($pontuacaoUser["pontuacao"] >= $dadosItemLoja["preco"]) {

	 				
	 				#Add Livros Comprados

	 				$dados = array (

	 					'idUser' => $idUser,
	 					'idItem' => $comprarItemLojaRef,
	 					'categoria' => "videos"
	 				);

	 				$addLivrosComprados = lojamodel::addComprarItenLojaModelo("comprar_item_loja",$dados);

	 				#Nova pontuacao 
	 				$novaPontuacao = $pontuacaoUser["pontuacao"] - $dadosItemLoja["preco"];

	 				#Update Pontuacao

	 				$UpdatePontuacoaUser = updateDados::updatePontuacaoUserModelo("desempenho", $idUser,$novaPontuacao);

	 				if ($addLivrosComprados == "Feito" && $UpdatePontuacoaUser == "Feito") {
	 					
	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgHappy.'>
		 						<br>Video comprado com sucesso!<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							O Video foi adicionado à sua lista de videos.
		 						</span>
		 						<br><br>
		 						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
									Ok
								</a>
		 					</p>
	 					';
	 				}
	 				else{


	 					echo '
	 						<p class="center interacaoSorry">
		 						<img class="imgInteracao" '.$imgSorry.'>
		 						<br>Erro ao comprar video<br>
		 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
		 							Houve um erro inesperado ao comprar o video. Tente de novo mais tarde.
		 						</span>
		 					</p>
	 					';
	 				}
	 			}
	 			else{


	 				echo '
						<p class="center interacaoSorry">
	 						<img class="imgInteracao" '.$imgSorry.'>
	 						<br>Erro ao comprar video<br>
	 						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
	 							Houve um erro inesperado ao comprar o video. Tente de novo mais tarde.
	 						</span>
	 					</p>
					';
	 			}
	 		}
	 		else{

	 			#Item Já existente
 				echo '
					<p class="center interacaoSorry">
						<img class="imgInteracao" '.$imgHappy.'>
						<br>Já tens este video!<br>
						<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
							Este video já foi adicionado à sua lista de videosvideo.
						</span><br><br>
						<a class="btn btnTerminarAula btnResolverExercicioDepois" style="padding-left:30px;padding-right:30px;" onclick="compraItemLojaConfirmada(0)">
							Ok
						</a>
					</p>
				';	
	 		}
 		}
 		else{


			echo '
				<p class="center interacaoSorry">
					<img class="imgInteracao" '.$imgSorry.'>
					<br>Erro ao comprar video<br>
					<span class="interacaoSorryDetalhes" style="font-size:10.25pt;">
						Houve um erro inesperado ao comprar o video. Tente de novo mais tarde.
					</span>
				</p>
			';
		}
 	}
 	else{

 		echo 'Erro..';
 	}
}