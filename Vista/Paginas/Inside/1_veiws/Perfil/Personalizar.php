<style type="text/css">
	div#PersonalizarSistema{
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
	p.dados{
		text-align: left;
		color: #9e9e9e;
		font-size:10pt;
		padding-right: 2px;
	}
	/*Temas */
	#frmTemas{

		padding-left: 10px;
		padding-bottom: 50px;
	}
	.temas{

		float: left;
		width: 90px;
		height: 50px;
		border:none;
		color: white;
		padding-top: 5px;
		padding-left: 8px;
		padding-right: 8px;
		padding-bottom: 5px;
		margin-right: 20px;
		margin-top: 10px;
		margin-bottom: 10px;

	}
	#TemaPadrao{
		background-color: #37474f;
	}
	#TemaCyan{
		
		background-color: #006064;	
	}
	#TemaPink{

		background-color: #880e4f;
	}
	/*Fim Temas */
	.select-wrapper input.select-dropdown {
		position: relative;
		cursor: pointer;
		border: none;
		border-bottom: 1px solid #9e9e9e;
		outline: none;
		height: 3rem;
		line-height: 3rem;
		width: 100%;
		font-size: 1rem;
		padding: 0;
		display: block;

	}
	.dropdown-content{
		margin-top: 45px;
	}
	.dropdown-content li > span {
		font-size: 16px;
		color: black;
		display: block;
		line-height: 22px;
		padding: 14px 16px;
	}

	/*Upadate Information*/
	.updateInfo{
		text-align: center;
		padding-bottom: 10px;
		padding-top: 10px;
		padding-left: 4px;
		padding-right: 4px;
		font-weight: normal;
		font-size: 10.25pt;
		color:black;
	}
	#feito{
		background-color: rgba(76, 175, 80,0.5);
		border-left: 5px solid #4CAF50;
	}
	#erro{

		background-color: rgba(255, 0, 0,0.5);
		border-left: 5px solid red;
	}

</style>
<?php

	$UpdateTema = new userInfo();
?>
<div class="col s12 l12" id="PersonalizarSistema" >
	<h3 id="tituloInfoUser" class="<?php echo $_SESSION['UserTema']; ?>">
		Personalizar o sistema
	</h3>
	<p class="dados">
		Personaliza o sistema escolhendo um tema de cores que preferes. E podes alterar o tema de cores sempre que quiseres.
	</p>
	<p>Temas disponivéis:</p>
	<form method="Post" id="frmTemas">
		
		<button  <?php $UpdateTema->DesabilitarBtnTema_PadraoSelecionado(); ?> class="temas" type="submit" name="TemaPadrao"  id="TemaPadrao">Padrão <?php $UpdateTema->IconTema_PadraoSelecionado(); ?></button>

		<button <?php $UpdateTema->DesabilitarBtnTema_CyanSelecionado(); ?> class="temas" type="submit" name="TemaCyan" id="TemaCyan">Cyan <?php $UpdateTema->IconTema_CyanSelecionado(); ?></button>

		<button <?php $UpdateTema->DesabilitarBtnTema_PinkSelecionado(); ?> class="temas" type="submit" name="TemaPink" id="TemaPink">Pink <?php $UpdateTema->IconTema_PinkSelecionado(); ?></button>
	</form>
	<div class="col s12 l12"  style="padding-left: 10px;padding-right: 10px;">
		<?php

			$UpdateTema->UpdateTemaUserInfo();
		?>
	</div>
</div>
