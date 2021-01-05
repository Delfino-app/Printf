<style type="text/css">
	div#perfilUploadImg{
		border: 1px solid #ddd;
		padding-bottom: 20px;
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
		font-size: 10pt;
		padding-right: 2px;
	}
	input[type=File].uploadImgInput{
		float: left;
	    padding-left: 0px;
	    cursor: pointer;
	}
	button#btnAtualizar{
	    margin-top: 5px;
	    border: none;
		text-align: center;
		font-weight: 300;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 10px;
		padding-right:10px;
		color: white;
	    border-radius: 2px;
	    background-color: #0277bd;
	}
	/*Upload Information*/
	p.uploadImageInfo{
		text-align: center;
		padding-bottom: 10px;
		padding-top: 10px;
		padding-left: 4px;
		padding-right: 4px;
		font-size: 10.25pt;
		font-weight: normal;
		color:black;
	}
	#sucesso{
		background-color: rgba(76, 175, 80,0.5);
		border-left: 5px solid #4CAF50;
		color:black;
	}
	#erro{
		background-color: rgba(255, 0, 0,0.5);
		border-left: 5px solid red;
		margin-right: 10px;
	}
	/*---------------------------*/	
</style>



<div  class="col s12 l12" id="perfilUploadImg">
	<h3 id="tituloInfoUser" class="<?php echo $_SESSION['UserTema']; ?>">
		Alterar foto de perfil
	</h3>
	
	<p class="dados" id="dadosRegistro">
		Clique em escolher ficheiro para escolher a foto de perfil e depois clique em Atualizar foto.
	</p>
    
    <form method="Post" class="col l12" enctype="multipart/form-data" id="frmUploadImg">
    	<input class="uploadImgInput col s12  l12" type="File" id="btnEscolherFoto" name="arquivo"  required>
    	<button class="uploadImgInput" type="submit" id="btnAtualizar">Atualizar foto</button>
    </form>
    <div class="col s12 l12"  style="padding-left: 10px;padding-right: 10px;">
    	<?php 
		    $uploadInfo = new userInfo();
	    	$uploadInfo->UploadImgInfo();
	    ?>
    </div>
</div>

