<?php

  class chatmensagens{


  	public static function exibirSmsUserChat($idUser){

  		

  		$Sms = chatMensagensModel::AllSmsUserId("chat_sms", $idUser);

  		if (!empty($Sms)) {

         foreach ($Sms as $key => $value) {

             if ($value["de"] == $idUser) {
              echo '
                  <div style="padding-left:50px;">
                    <p class="anotacoesLivroArtigo responsive-text" style="border-radius:5px;">
                      <a href="#" class="eliminarAnotacoesLivroArtigoLink" onclick="eliminarSmsChatUser('.$value["id"].')">
                        x
                      </a>
                      <span>'.$value["sms"].'</span>
                    </p>
                  </div>

              ';
            }
            else{

              echo '
                <div style="padding-right:50px;">
                  <p class="anotacoesLivroArtigo responsive-text blue-grey darken-3" style="border-radius:5px;">
                    <span>'.$value["sms"].'</span>
                 </p>
                </div>
              ';
            }
         }
  		}
  		else{

  			echo '
 				<p id="Info" class="bounceInLeft animated center">
					  <i id="SemNotificacoesIcon" class="fa fa-comments"></i>
	      		<br><br>
	      		<span id="SemNotificacoesInfo">Sem mensagens.</span>
	       </p>
 			';
  		}

      echo '
          <div class="divider"></div>
          <form id="frmSendSmsChat" class="col s12 l12" style="padding:0px;">
            <div class="col l10" style="padding-left:0px;">
              <textarea class="materialize-textarea custom" id="SendSmsChat" requerid></textarea>
            </div>
            <div class="col l2">
              <button type="submit" class="btn btnAddAulas">Enviar</button>
            </div>
          </form>
      ';
  	}
  }
 