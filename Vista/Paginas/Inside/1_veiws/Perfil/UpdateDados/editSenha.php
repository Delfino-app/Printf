<?php
	
	$infoUpdateSenha= new userInfo();
?>
<form method="Post" class="Edit">
	
	<input class="EditPerfil" type="password" id="Senha"name="EditSenhaAtual" 
	value=""  placeholder="Senha atual" minlength="8" maxlength="8" 
	pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Max. 8 caracteres, incluíndo um número, um símbolo, uma maíuscula" required>
	
	<input class="EditPerfil" type="password" id="Senha"name="EditSenhaNova" 
	value=""  placeholder="Nova senha" minlength="8" maxlength="8" 
	pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Max. 8 caracteres, incluíndo um número, um símbolo, uma maíuscula" required>
	
	<input class="EditPerfil" type="password" id="Senha" name="EditSenhaNovaConfirmar" 
	value=""  placeholder="Confirmar nova senha" minlength="8" maxlength="8" 
	pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Max. 8 caracteres, incluíndo um número, um símbolo, uma maíuscula" required>
	
	<button  class="light-blue darken-3 btnEditSave" type="submit">Salvar<i class="EditIcons fa fa-save"></i></button>
</form>
<?php
	
	$infoUpdateSenha->UpdateSenhaUserInfo();
?>