<?php
	
	$infoUpdateEmail= new userInfo();
?>
<form method="Post" class="Edit">
	
	<input  class="EditPerfil" type="email" id="Email" name="EditEmailAtual" 
	 required placeholder="Email atual" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
	 value="<?php $infoUpdateEmail->emailUser(); ?>">

	<input class="EditPerfil" type="email" id="Email" name="EditEmailNovo" 
	 required placeholder="Novo email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

	<button  class="light-blue darken-3 btnEditSave" type="submit">Salvar<i class="EditIcons fa fa-save"></i></button>
</form>
<?php
	
	$infoUpdateEmail->UpdateEmailUserInfo();

?>