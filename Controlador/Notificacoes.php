
<?php

class notificacoes{

 	public function VerificarExistenciaNotificacoes(){

 		$id = $_SESSION['id'];

 		$notificacoesUser = dados::notificacoesPendenteUser("notificacao",$id);

 		if (!empty($notificacoesUser)) {
 			
 			$notificacoesN = 0;

 			foreach ($notificacoesUser as $key => $value) {
 				
 				$notificacoesN +=1;
 			}
 			echo '
 				<span class="badge new">'.$notificacoesN.'</span>
 			';
 		}
 		else{

 			echo '

 				<i class="Menu fa fa-bell-slash-o"></i>
 			';
 		}
 	}

 	public static function TituloNotificacoes(){

 		$id = $_SESSION['id'];

 		$notificacoesUser = dados::notificacoesPendenteUser("notificacao",$id);

 		if (!empty($notificacoesUser)) {
 			
 			$notificacoesN = 0;

 			foreach ($notificacoesUser as $key => $value) {
 				
 				$notificacoesN +=1;
 			}

 			if ($notificacoesN == 1) {

	 			echo 'title="Uma nova notificação"';
	 		}
	 		elseif ($notificacoesN == 2) {

	 			echo 'title="Duas novas notificações"';
	 		}
	 		elseif ($notificacoesN >1) {
	 			
	 			echo 'title="'.$notificacoesN.' novas notificações';
	 		}
 		}
 		else{

 			echo 'title="Sem novas notificações"';
 		}
 	}

 	public static function exibirNotificacoes(){

 		$id = $_SESSION['id'];

 		$notificacoesUser = dados::notificacoesUser("notificacao",$id);

 		if (!empty($notificacoesUser)) {

 			$notificacaoIcon=false;
 		
 			foreach ($notificacoesUser as $key => $value) {

 				if ($value["estado"] == "pendente") {
 					
 					$notificacaoIcon = '<i class="fa fa-bell notificacaoIcon"></i>';

 					echo '
		 				<p class="notificacoesContainer">
		 					<a class="notificacoesLink" onclick="updateEstadoNotificacao('.$value["id"].')" href="'.$value["link"].'">
		 						'.$notificacaoIcon.' 
		 						'.$value["titulo"].'. 
		 						<span style="color:#9e9e9e;font-size:9pt;">
		 							'.$value["data"].'
		 						</span>
		 					</a>
		 				</p>
		 				<div class="divider"></div>
	 				';
 				}
 				elseif ($value["estado"] == "ativo") {
 					
 					$notificacaoIcon = '<i class="fa fa-bell-o notificacaoIcon"></i>';

 					echo '
		 				<p class="notificacoesContainer">
		 					<a class="notificacoesLink" href="'.$value["link"].'">
		 						'.$notificacaoIcon.' 
		 						'.$value["titulo"].'. 
		 						<span style="color:#9e9e9e;font-size:9pt;">
		 							'.$value["data"].'
		 						</span>
		 					</a>
		 				</p>
		 				<div class="divider"></div>
	 				';
 				}
 			}
 		}
 		else{

 			echo '
 				<p id="Info" class="bounceInLeft animated center">
 					<i id="SemNotificacoesIcon" class="fa fa-bell-slash-o"></i>
		      		<br><br>
		      		<span id="SemNotificacoesInfo">Sem notificações no momento.</span>
		       </p>
 			';
 		}
 	}

 	public static function notificarUser($idUser,$titulo,$link){

 		dados::notificarUserModelo("notificacao",$idUser,$titulo,$link);
 	}
}