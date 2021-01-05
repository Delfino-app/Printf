
<div class="col l12 white" style="box-shadow:0 0 10px rgba(175,175,175,.23);">
	<div class="col l12">
		<h3 class="title">
			Alunos 
			<a class="btn right white-text" id="btnNotificarAlunos" href="#">
				<i class="fa fa-bell iconTabela" style="font-size: 10pt;"></i>
				Notificar alunos
			</a>
		</h3>
		<div class="divider"></div>	
	</div>
	<div class="col l12">
		<div>
			<?php
				adminController::ListarAllAlunos();
			?>
		</div>
	</div>
</div>
<div id="notificarAluno" class="modal">
	<div class="modal-content" style="padding-bottom:10px;">
      	<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333">
        	<i class="fa fa-close"></i>
      	</a>
      	<h3 class="title">Notificação</h3>
      	<div class="divider"></div>
	  	<div class="row">
	    	<div class="col s12 l12">
	      		<form id="frmEnviarNotificacaoUsuario" method="Post" class="col l12" style="padding-top:20px;padding-left:0px;">
	        		<div class="col l12" id="displayEnviarNotificaco">
	        			<!--Ajax-->
	        		</div>
	      		</form>
	    	</div>	    	
	    </div>
	</div>
</div>