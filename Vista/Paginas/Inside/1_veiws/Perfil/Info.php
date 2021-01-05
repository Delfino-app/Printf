<style type="text/css">
	div#perfilInfoContente{
		border: 1px solid #ddd;
		padding-bottom: 10px;
		padding-left: 0px;
		padding-right: 0px;
		background-color: white;
	}
	h3#tituloInfoUser{
		margin-top: -1px;
		text-align: center;
		font-size: 12pt;
    	font-weight: 300;
    	padding-top:10px;
    	padding-bottom:10px;
    	color: white;
	}
	/*------------------------------Editar dados de registro-------------*/
	.InfoEdit{

		margin-top: -5px;
		font-size: 11pt;
		padding-left: 0px;
		font-weight: normal;
	}
	.LinkInfoEdit{


		font-size: 16pt;
		color: #0277bd;
		font-weight: normal;
	}

	
</style>
<?php

	$dados= new userInfo();	

?>
<div class="col s12  l12" id="perfilInfoContente">
	<h3 id="tituloInfoUser" class="<?php echo $_SESSION['UserTema']; ?>">
		Informações
	</h3>
	<div class="col s12 l12" style="padding-left: 0px;padding-right: 0px;">
		<div class="col s12 m4 l4">
			<label>Nome do usuário</label>
			<p class="InfoEdit">
				<?php $dados->NomeCompletoUser(); ?>
				<a class="LinkInfoEdit" href="#" title="Editar Nome">
					<i class="fa fa-pencil-square"></i>
				</a>
			</p>
		</div>
		<div class="col s12 m5 l5">
			<label>Email do usuário</label>
			<p class="InfoEdit">
				<?php $dados->emailUser(); ?>
				<a class="LinkInfoEdit" href="#" title="Editar Email">
					<i class="fa fa-pencil-square"></i>
				</a>
			</p>
		</div>
		<div class="col s12 m3 l3">
			<label>Senha do usuário</label>
			<p class="InfoEdit">
				<?php $dados->NomeCompletoUser(); ?>
				<a class="LinkInfoEdit" href="#" title="Editar Senha">
					<i class="fa fa-pencil-square"></i>
				</a>
			</p>
		</div>
	</div>
</div>