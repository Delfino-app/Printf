<style type="text/css">
	
	#btnFechar{

		color: #001;
		float: right;
	}
	#btnFechar:hover{
		color: #0277bd;
	}
	#Info{

		margin-top: 50px;
	} 
	#SemNotificacoesIcon{
		font-weight: 300;
		color: #9e9e9e;
		font-size: 80pt;
	}
	#SemNotificacoesInfo{

		font-size: 12pt;
		color: #9e9e9e;
	}

</style>


  <div id="modal1" class="modal" style="width:48%;">
    <div class="modal-content ">
      	<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333">
        	<i class="fa fa-close"></i>
      	</a>
      	<h3 class="title">Notificações</h3>
      	<div class="divider"></div>
        <div class="row">
       	    <div class="col s12 l12" style="padding-top:20px;padding-bottom:20px;">
	       		<?php
		       		notificacoes::exibirNotificacoes();
		        ?>
       	    </div>
        </div>
    </div>
  </div>