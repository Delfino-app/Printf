
<style type="text/css">
	#rowPerfil{
		margin-top: 50px;
		padding-bottom: 0;
	}
	#PerfilContainer{

		border: 1px solid #ddd;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 10px;
		padding-right: 10px;
	}
	#PerfilInfoImg{
		/*margin-top:14px;
	    margin-right: 5px; */
	    height: 90px;
	    width: 90px;
	    border-radius: 50%;
	}
	#PerfilInfoUserName{
		font-size: 18pt;
		font-weight: 300;
		margin-top: -1px;
	}
	/*-------------------------Tabs----------------------------*/
	.tabs{

		background-color: transparent;
	}
	.tabs .tab a {
	   color: #455a64;
	   display: block;
	   width: 100%;
	   height: 100%;
	   text-overflow: ellipsis;
	   overflow: hidden;
	   transition: color .28s ease;
	   text-transform: none;
	}
    .tabs .indicator {
	   position: absolute;
	   bottom: 0;
	   height: 1px;
	   background-color:   #455a64;
	   will-change: left, right;
	}
	.tabs .tab a:hover {
	  color:  #0277bd;
	}
	/*-------------------------------------------------------*/
	.PerfinMenuIcons{
		margin-left: 5px;
	}

	/*------------------------Menu Perfil Contentes----------*/
	#rowMenuPerfilContentes{
		margin-top: -10px;
		padding-bottom: 50px;	
	}

</style>
<?php
	
	$userInfo = new userInfo();
?>
<div class="container">
	<div class="row" id="rowPerfil">
		<div class="col l3 hide-on-med-and-down"></div>
		<div class="col s12 l6">
			<div id="PerfilContainer" class="white center">
				<img id="PerfilInfoImg" <?php $userInfo->UserImagem(); ?> alt="Contact Person">
				<h3 id="PerfilInfoUserName">
				    <?php 
				    	
				    	$userInfo->NomeCompletoUser();
				    ?>
				</h3>
				<div class="divider"></div>
				<div>

					
					<ul class="tabs">
			            <li class="tab col s3">
			           		<a href="#InfoPerfil">
			           			Infomações<i class="PerfinMenuIcons fa fa-info"></i>
			           		</a>
			            </li>
			            <li class="tab col s3">
			           		<a href="#AlterarFotoPerfil">
			           			Alterar foto<i class="PerfinMenuIcons fa fa-image"></i>
			           		</a>
			            </li>
			            <li class="tab col s3">
			           		<a href="#PersonalizarPerfil">
			           			Personalizar<i class="PerfinMenuIcons fa fa-paint-brush"></i>
			           		</a>
			            </li>
			            <li class="tab col s3">
			           		<a href="#DefinicoesPerfil">
			           			Definições<i class="PerfinMenuIcons fa fa-cog"></i>
			           		</a>
			            </li>
			        </ul>
			   </div>
			   <div class="divider" style="margin-top: -1px;"></div>
			</div>
		</div>
		<div class="col l3 hide-on-med-and-down"></div>
	</div>

	<div class="row" id="rowMenuPerfilContentes">

		<div class="col l3 hide-on-med-and-down"></div>
		<div class="col s12 l6" style="padding-top: 0px;">
		   
	    	<!--Menu Perfil Contentes-->
		    <div id="InfoPerfil">
				<?php include "Vista/Paginas/Inside/1_veiws/Perfil/Info.php" ?>
			</div>
			<div id="AlterarFotoPerfil">
				<?php include "Vista/Paginas/Inside/1_veiws/Perfil/UploadFoto.php" ?>
			</div>
			<div id="PersonalizarPerfil">
				<?php include "Vista/Paginas/Inside/1_veiws/Perfil/Personalizar.php" ?>
			</div>
			<div id="DefinicoesPerfil">
				<?php include "Vista/Paginas/Inside/1_veiws/Perfil/Definicoes.php" ?>
			</div>
		</div>
		<div class="col l3 hide-on-med-and-down"></div>
	</div>
</div>