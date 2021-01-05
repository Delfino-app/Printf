<?php


class multimidiacontroller{


	public function ExibirVideosCortesiaController(){

		$Estado="unlock";

		$Videos=multimidiamodel::ExibirVideosCortesiaModel($Estado,"m_videos");


	    if (empty($Videos)) {
	   		
	   		echo '<p class="center" style="color:#ddd;padding-top:0;padding-bottom:0;margin-bottom:10px;">Lista Vazia</p>';
	    }
	    else{

	    	foreach ($Videos as $row => $ItemVideo) {
			    echo '
					<div class="row" id="ListaVideos" title="Reproduzir">
						<a class="col l12 waves-effect" href="#" onclick="reproduzirVideo('.$ItemVideo["id"].')">
							<div class="col s4 m4 l4" style="padding-left:0;padding-right:0;">
								<img src="Vista/Imagens/upload/Videos/'.$ItemVideo["imgvideo"].'" class="imgVideoLista">
							</div>
							<span style="margin-left:-62px;float:left;margin-top:30px; background-color:rgba(0,0,0,0.6);padding-top: 5px;padding-left: 10px;padding-right: 8px;padding-bottom: 5px;border-radius: 50%;font-size: 11pt;font-weight: normal;"><i class="fa fa-play" style="color:white;"></i>
						    </span>
							<div class="col s8 m8 l8" style="height:80px;padding-left:0;">
								<p class="videoTituloPlayLista" style="margin-top:-20px;text-align:left;padding-left:10px;color:#495057;">'.$ItemVideo["tema"].'<br><span class="hide-on-med-and-down duracao"> '.$ItemVideo["duracao"].'</span>
								</p>
							</div>
						</a>
					</div>
			    ';
		    }
	    }	
	}

	public function ExibirVideosCompradosController(){

		$idUser = $_SESSION['id'];

		$listaVideos=lojamodel::listarItensCompradosLoja("comprar_item_loja", $idUser,"videos");


	    if (!empty($listaVideos)) {
	    	
	    	foreach ($listaVideos as $row => $ItemVideo) {

	    		$Videos=multimidiamodel::ExibirVideosCompradosModel("m_videos", $ItemVideo["idItem"]);

			   if (!empty($Videos)) {
			   		
			   		echo '
						<div class="row" id="ListaVideos" title="Reproduzir">
						<a class="col l12 waves-effect" href="#" onclick="reproduzirVideo('.$Videos["id"].')">
							<div class="col s4 m4 l4" style="padding-left:0;padding-right:0;">
								<img src="Vista/Imagens/upload/Videos/'.$Videos["imgvideo"].'" class="imgVideoLista">
							</div>

							<span style="margin-left:-62px;float:left;margin-top:30px; background-color:rgba(0,0,0,0.6);padding-top: 5px;padding-left: 10px;padding-right: 8px;padding-bottom: 5px;border-radius: 50%;font-size: 11pt;font-weight: normal;"><i class="fa fa-play" style="color:white;"></i>
							</span>

							<div class="col s8 m8 l8" style="height:80px;padding-left:0;">
								<p class="videoTituloPlayLista" style="margin-top:-25px;text-align:left;padding-left:10px;color:#495057;">'.$Videos["tema"].'<br><span class="hide-on-med-and-down duracao"> '.$Videos["duracao"].'</span>
								</p>
							</div>
						</a>
					</div>
				   ';
			    }
		    }
	    }
	}

	/*---------------------------------------------------------------------------*/

	/*-------------------------------Livros--------------------------------------*/

	public function ExibirLivrosCortesiaController(){

		$Estado="unlock";

		$Livros=multimidiamodel::ExibirLivrosCortesiaModel($Estado,"m_livros");


		foreach ($Livros as $row => $ItemLivro) {
			
			echo '

				<div class="ListaLivros">
					<a  title="'.$ItemLivro["tema"].'" onclick="abrirLivro('.$ItemLivro["id"].')">
						<img src="Vista/Imagens/upload/livros/Amostra/'.$ItemLivro["imglivro"].'" class="imgLivroLista">
					</a>
				</div>
			';
		}
	}

	public function ExibirLivrosCompradosController(){

		$idUser = $_SESSION['id'];

		$listaLivros=lojamodel::listarItensCompradosLoja("comprar_item_loja", $idUser,"livros");


	    if (!empty($listaLivros)){

	    	foreach ($listaLivros as $row => $ItemLivro) {

	    		$livros=multimidiamodel::ExibirVideosCompradosModel("m_livros", $ItemLivro["idItem"]);


			    echo '
					<div class="ListaLivros">
						<a  title="'.$livros["tema"].'" onclick="abrirLivro('.$livros["id"].',1)">
							<img src="Vista/Imagens/upload/livros/Amostra/'.$livros["imglivro"].'" class="imgLivroLista">
						</a>
				    </div>
			    ';
		    }
	    }
	}

	public  function ExibirLivrosReaderController($ref){

	    $livro=multimidiamodel::allDadosId("m_livros", $ref);

		echo '
			<div class="col s12 l8" id="LivroContainer">
				<iframe  class="col s12 l12" style="border: 1px solid #37474f;" height="700" src="Vista/Files_Pdf/Livros/'.$livro["livro"].'.pdf">
				</iframe>
			</div>
			<div class="col  l2 hide-on-small-only white" style="padding-top: 0;padding-bottom: 20px;border: 1px solid #d1d1d1;">
				<h3 class="titulos" id="Notas">Anotações</h3>
				<div class="divider"></div>
				<div id="displayAnotacoes">
					'.multimidiacontroller::anotacoesLivrDef($ref,"livro").'
					<div id="displayFrmAnotacoes">
						<form class="col s12 l12 " id="frmAnotacoesLivro">
							<input type="text" value="'.$livro["id"].'" id="livroAnotacaoRef" hidden>
							<textarea id="txtNotas" placeholder="Escreva aqui  as suas anotações.." class="materialize-textarea" name="Anotacoes" maxlength="50" required></textarea>
							<a onclick="anotacoesLivro()" href="#" id="btnSalvarAnotacao">Slavar</a>
						</form>
					</div>
				</div>
			</div>
		';
	}

	public static function anotacoesLivrDef($idItem,$categoria){

		$idUser = $_SESSION["id"];

		$limite = 3;

		$anotaco=multimidiamodel::allAnotacoes("anotacoes_livro_artigo", $idItem,$idUser,$categoria,$limite);

		$anotacao = false;
		foreach ($anotaco as $key => $value) {

			$anotacao .= '
						<p class="anotacoesLivroArtigo responsive-text">
							<a href="#" class="eliminarAnotacoesLivroArtigoLink" onclick="eliminarAnotacoesLivroArtigo('.$value["id"].',1)">x</a>
							'.$value["anotacao"].'
						</p>';
		}

		return $anotacao;
	}

	/*-------------------------------Artigos--------------------------------------*/

	public function ExibirArtigosCortesiaController(){

		$Estado="unlock";

		$Artigos=multimidiamodel::ExibirArtigosCortesiaModel($Estado,"m_artigos");


		foreach ($Artigos as $row => $ItemArtigo) {
			
			echo '

				<div class="ListaArtigos">
					<a  title="'.$ItemArtigo["tema"].'" onclick="abrirArtigo('.$ItemArtigo["id"].')">
						<img src="Vista/Imagens/upload/artigos/'.$ItemArtigo["imgartigo"].'" class="imgArtigoLista">
					</a>
				</div>
			';
		}
	}

	public function ExibirArtigosCompradosController(){

		$idUser = $_SESSION['id'];

		$listaArtigos=lojamodel::listarItensCompradosLoja("comprar_item_loja", $idUser,"artigos");


	    if (!empty($listaArtigos)){

	    	foreach ($listaArtigos as $row => $ItemArtigo) {

	    		$artigos=multimidiamodel::ExibirVideosCompradosModel("m_artigos", $ItemArtigo["idItem"]);


			    echo '
					<div class="ListaArtigos">
						<a  title="'.$ItemArtigo["tema"].'" onclick="abrirArtigo('.$ItemArtigo["id"].')">
							<img src="Vista/Imagens/upload/artigos/'.$artigos["imgartigo"].'" class="imgLivroLista">
						</a>
				    </div>
			    ';
		    }
	    }
	}

	public static function countComentarios($idVideo){

		$countComentarios = multimidiamodel::countComentariosVideoModelo("comentarios_video",$idVideo);

		if (!empty($countComentarios)) {

			$comentarios =0;
			
			foreach ($countComentarios as $key => $value) {
				
				$comentarios +=1;
			}

			return $comentarios;
		}
		else{

			return 0;
		}

	}

	public static function displayVideo($idVideo,$autoplay){

		$dadosVideo =multimidiamodel::allDadosId("m_videos", $idVideo);

		$comentarios = multimidiacontroller::countComentarios($idVideo);

		if (!empty($dadosVideo)) {

			$userInfo= new userInfo();
			
			echo '
				<video poster="Vista/Imagens/upload/Videos/'.$dadosVideo["imgvideo"].'"  class="responsive-video" controls id="videoContent" '.$autoplay.'>
					<source src="Vista/Videos/Repositorio/cortesia/'.$dadosVideo["video"].'.mp4" type="video/mp4">
				</video>

				<p id="tituloVideioPlaying" class="info">
					'.$dadosVideo["tema"].'
					<span id="countVideoComentarios" style="float:right;color:#d1d1d1;font-size:11pt;margin-top:2px;">
						'.$comentarios.' Comentário(s)
					</span>
				</p>
				
				<div class="divider"></div>

				<!--Formulário de Comentários-->
				<div id="ComentariosContainer">
					<form id="frmComentarVideo">
						<div class="col s1 l1" style="padding-left: 5px;padding-right: 5px;"> 
							<img  id="ImgUserComentario" '.$userInfo->UserImagemReturn().'>
						</div>
						<div class="col s11 l11" style="padding-right: 0px;">
						<input class="col s12 l12" type="text" id="txtVideoRef" value="'.$dadosVideo["id"].'" required hidden>
							<input class="col s12 l12" type="text" name="comentariovideo" placeholder="Escreva um comentário sobre o video..." id="txtComentar"  required>
							<a href="#ComentariosContainer" id="btnComentarVideo" onclick="comentarVideo()">Comentar</a>
							<br>
							<br>
							<br>
						</div>
					</form>
					<!--Area dos Comentários-->
					'.multimidiacontroller::comentariosVideo($dadosVideo["id"]).'
				</div>

			';
		}
	}

	public static function comentariosVideo($ref){

		$idVideo = $ref;

		$comentarios = multimidiamodel::comentariosVideoModelo("comentarios_video", $idVideo);

		$comentariosVeiw = "";

		if (!empty($comentarios)) {

			foreach ($comentarios as $key => $value) {

				$dadosUser =multimidiamodel::allDadosId("usuarios", $value["idUser"]);

				$UserImg='Vista/Imagens/upload/UserPerfil/'.$dadosUser["img"];

				if ($value["idUser"] == $_SESSION["id"]) {
					
					$comentariosVeiw .= '
						<div class="row">
							<div class="col s1 l1"></div>
							<div class="col s11 l11">
								<div class="col  l12">
									<div class="col l2" style="padding-right:25px;padding-bottom:10px;">
										<img  id="ImgUserComentario"  src="'.$UserImg.'">
									</div>
									<p id="NomeUserComentario" class="col l10 info">
										'.$dadosUser["primeiroNome"].' '.$dadosUser["ultimoNome"].'
									</p>
								</div>
								
								<div class="col s12 l12" style="margin-top:-10px;padding-right: 0px;">
									<div  class="col l1 hide-on-med-and-down">
										<div>
											<a  title="Eliminar Comentário" id="EliminarComentario" onclick="eliminarComentario('.$value["id"].')">
												<i class="fa fa-trash-o"></i>
											</a>
										</div>
									</div>
									<div class="col s12 l11" id="SmsUserComentarioContainer">
									 	<p id="SmsUserComentario" >
									 		'. $value["comentario"].'
									 	</p>
									</div>
								</div>
							</div>
						</div>
					';

				}
				else{

					$comentariosVeiw .= '
						<div class="row">
							<div class="col s1 l1"></div>
							<div class="col s11 l11">
								<div class="col  l12">
									<div class="col l2" style="padding-right: 25px; padding-bottom: 18px;">
										<img  id="ImgUserComentario"  src="'.$UserImg.'">
									</div>
									<p id="NomeUserComentario" class="col l10 info">
										'.$dadosUser["primeiroNome"].' '.$dadosUser["ultimoNome"].'
									</p>
								</div>
								
								<div class="col s12 l12" style="margin-top:-10px;padding-right: 0px;">
									<div  class="col l1 hide-on-med-and-down">
									</div>
									<div class="col s12 l11" id="SmsUserComentarioContainer">
									 	<p id="SmsUserComentario" >
									 		'. $value["comentario"].'
									 	</p>
									</div>
								</div>
							</div>
						</div>
					';
				}
			}
		}

		return $comentariosVeiw;
	}
}