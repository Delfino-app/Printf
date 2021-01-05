




  <!-- Modal Structure -->
  <div id="chat" class="modal" style="width:40%;">
    <div class="modal-content">
      	<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333">
        	<i class="fa fa-close"></i>
      	</a>
      	<h3 class="title">Chat</h3>
      	<div class="divider"></div>
        <div class="row" style="padding:0px;">
       	    <div class="col s12 l12" id="displaySmsChatUser" style="padding:0px;">
       	    	<?php
       	    	
       	    		$idUser = $_SESSION["id"];
       	    		chatmensagens::exibirSmsUserChat($idUser);
       	    	?>
       	    </div>
        </div>
    </div>
  </div>
          