
<?php

 require_once '../../Modelo/conexao.php';
 require_once '../../Modelo/UpdateDadosUser.php';
 require_once '../Multimidiacontroller.php';
 require_once '../userInfo.php';
  require_once '../ChatMensagens.php';
 require_once '../../Modelo/MultimidiaModel.php';
 require_once '../../Modelo/chatMensagensModel.php';

 session_start();

 /*Update Estado Notificação*/
 if (isset($_POST["idNotificacaoUpdateEstado"])) {

 	$idUser = $_SESSION["id"];
 	
 	$Update = updateDados::UpdateNotificacaoEstado("notificacao", $idUser, "ativo");
 }

 #Contar Comentarios Video
 if (isset($_POST["videoComentariosCount"])) {

 	$idVideo = $_POST["videoComentariosCount"];

	$comentarios = multimidiacontroller::countComentarios($idVideo);

	echo $comentarios." Comentário(s)";

 }

 #Comentar Video
 if (isset($_POST["videoRef"]) && isset($_POST["comentario"])) {

 	$idVideo = $_POST["videoRef"];
 	$idUser = $_SESSION["id"];
 	$comentario = $_POST["comentario"];
 	
	$dadosVideo =multimidiamodel::allDadosId("m_videos", $idVideo);

	if (!empty($dadosVideo)) {
		
		#Comentar
		$userInfo= new userInfo();

		$comentar = multimidiamodel::comentarVideoModel("comentarios_video",$idVideo,$idUser,$comentario);

		echo '
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
		';
	}	
 }
 #Eliminar Comentario
 if (isset($_POST["eliminarComentarioRef"]) && isset($_POST["videoComentarioRef"])) {

 	$userInfo= new userInfo();
 	
 	$comentarioRef = $_POST["eliminarComentarioRef"];
 	$idVideo = $_POST["videoComentarioRef"];

 	$idUser = $_SESSION["id"];

 	$delete = multimidiamodel::deleteComentarVideoModel("comentarios_video",$comentarioRef,$idUser);

 	$dadosVideo =multimidiamodel::allDadosId("m_videos", $idVideo);
 	
 	echo '
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
	';
 }
 #Reproduzir Videos
 if (isset($_POST["playVideoRef"])) {
 	
 	$playVideoRef = $_POST["playVideoRef"];
 	
	$dadosVideo =multimidiamodel::allDadosId("m_videos", $playVideoRef);

	if (!empty($dadosVideo)) {

		multimidiacontroller::displayVideo($playVideoRef,"autoplay");
	}
 }
 #Abrir Livro 

 if (isset($_POST["abrirLivroRef"])) {
 	
 	$idItem = $_POST["abrirLivroRef"];

 	if ($idItem > 0) {
 		
 		$dadosLivro =multimidiamodel::allDadosId("m_livros", $idItem);

 		if (!empty($dadosLivro)) {
 			
 			echo '<iframe  class="col s12 l12" style="border: 1px solid #37474f;" height="700" src="Vista/Files_Pdf/Livros/'.$dadosLivro["livro"].'.pdf">
				</iframe>';
 		}

 	}
 }

 #Anotações Livros

 if (isset($_POST["anotacaoLivro"]) && isset($_POST["anotacaoLivroRef"])) {
 	
 	#Dados
 	$idUser = $_SESSION["id"];
 	$idItem = $_POST["anotacaoLivroRef"];
 	$categoria = "livro";
 	$anotacao = $_POST["anotacaoLivro"];

 	multimidiamodel::addAnotacoes("anotacoes_livro_artigo", $idItem, $idUser, $categoria, $anotacao);

	$livro=multimidiamodel::allDadosId("m_livros", $idItem);

	echo '

		'.multimidiacontroller::anotacoesLivrDef($idItem,"livro").'
		<div id="displayFrmAnotacoes">
			<form class="col s12 l12 " id="frmAnotacoesLivro">
			<input type="text" value="'.$livro["id"].'" id="livroAnotacaoRef" hidden>
				<textarea id="txtNotas" placeholder="Escreva aqui  as suas anotações.." class="materialize-textarea" name="Anotacoes" maxlength="50" required></textarea>
				<a onclick="anotacoesLivro()" href="#" id="btnSalvarAnotacao">Slavar</a>
			</form>
		</div>
	';
 }

 #Eliminar Anotacoes Livros Artigos 

 if (isset($_POST["eliminarAnotacoesLivroArtigoRef"]) && isset($_POST["eliminarAnotacoesLivroArtigoCAtegoria"])) {



	if ($_POST["eliminarAnotacoesLivroArtigoCAtegoria"] > 0 && $_POST["eliminarAnotacoesLivroArtigoCAtegoria"] < 3) {

 		if ($_POST["eliminarAnotacoesLivroArtigoCAtegoria"] == 1) {
 			
 			$categoria = "livro";
 			$tabela = "m_livros";
 		}
 		elseif ($_POST["eliminarAnotacoesLivroArtigoCAtegoria"] == 2) {
 			
 			$categoria = "artigo";
 			$tabela = "m_artigos";
 		}
 		
 		$idUser = $_SESSION["id"];
	 	$idItem = $_POST["eliminarAnotacoesLivroArtigoRef"];

	 	multimidiamodel::delefteAnotacoes("anotacoes_livro_artigo", $idItem, $idUser);

		$livro=multimidiamodel::allDadosId($tabela, $idItem);

		echo '

			'.multimidiacontroller::anotacoesLivrDef($idItem,$categoria).'
			<div id="displayFrmAnotacoes">
				<form class="col s12 l12 " id="frmAnotacoesLivro">
				<input type="text" value="'.$livro["id"].'" id="livroAnotacaoRef" hidden>
					<textarea id="txtNotas" placeholder="Escreva aqui  as suas anotações.." class="materialize-textarea" name="Anotacoes" maxlength="50" required></textarea>
					<a onclick="anotacoesLivro()" href="#" id="btnSalvarAnotacao">Slavar</a>
				</form>
			</div>
		';
 	}

 }

 #Send Sms Chat User

 if (isset($_POST["smsChatUser"])) {


 	$de = $_SESSION["id"];
 	$para =1;
 	$Sms = $_POST["smsChatUser"];

 	$sendSms = chatMensagensModel::sendSms("chat_sms", $de,$para,$Sms);

 	chatmensagens::exibirSmsUserChat($de);
 }

 #Eliminar Sms Chat User

 if (isset($_POST["eliminarChatUser"])) {
 	
 	$de = $_SESSION["id"];

 	$ref = $_POST["eliminarChatUser"];

	multimidiamodel::deleteDados("chat_sms", $ref);

	chatmensagens::exibirSmsUserChat($de);
 }