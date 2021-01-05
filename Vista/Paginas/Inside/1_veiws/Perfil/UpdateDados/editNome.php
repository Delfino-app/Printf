
<?php
	
	$infoUpdateNome= new userInfo();
?>
<div>
	<form method="Post" class="Edit">
		<input class="EditPerfil" type="text" id="PrimeiroNome"name="EditPrimeiroNome" 
	     placeholder="Primeiro nome" minlength="3" maxlength="18" pattern="[A-Za-z]{3,18}">

		<input class="EditPerfil" type="text" id="UltimoNome" name="EditUltimoNome" 
		 placeholder="Último nome" minlength="3" maxlength="18" pattern="[A-Za-z]{3,18}">

		<button  class="light-blue darken-3 btnEditSave" type="submit">Salvar<i class="EditIcons fa fa-save"></i></button>
	</form>
	
	<div >
		<?php
			$infoUpdateNome->UpdateNomeUserInfo();
		?>
	</div>
</div>