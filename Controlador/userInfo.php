<?php

/*Esta classe é uma classe que interage com o usuario. Ela mostra as informações do usuario como o Nome, Foto , etc. e serve também para enviar sms quando o usuario faz uma atualização das suas informações. essas sms podem ser sms de Erro OU Feito(quando uma operação é realizada com sucesso)
*/


class userInfo{

 	
 	public function UserImagem(){

		$UserImg='Vista/Imagens/upload/UserPerfil/'.$_SESSION["UserImg"];
		echo  "src=$UserImg";
		 #Ainda não implementado-> 25-03-2019!
	}

	public function UserImagemReturn(){

		$UserImg='Vista/Imagens/upload/UserPerfil/'.$_SESSION["UserImg"];
		return  "src=$UserImg";
		 #Ainda não implementado-> 25-03-2019!
	}

	public function PrimeiroNomeUser(){

		$primeironome=$_SESSION["PrimeiroNome"]; 
		echo "$primeironome"; 
	}


	public function UltimoNomeUser(){

		
		$UserLastName=$_SESSION["UltimoNome"]; 
		echo  "$UserLastName"; 
	}


	public function NomeCompletoUser(){

		$UserFristName=$_SESSION["PrimeiroNome"];
		$UserLastName=$_SESSION["UltimoNome"]; 
		echo "$UserFristName"." "." $UserLastName"; 
	}


	public function emailUser(){

		$Useremail=$_SESSION["UserEmail"]; 
		echo "$Useremail"; 
	}


	public function senhaUser(){

		$Usersenha=$_SESSION["UserSenha"]; 
		echo "$Usersenha"; 
	}	
	#Login -> Mensagem de erro
	public function LoginMsg(){

		

		if (isset($_GET["loginInfo"])) {
			
			if ($_GET["loginInfo"]=="Erro") {

				echo'<h6 class="loginTitulo erro">Os dados inseridos estão incorretos</h6>';
			}
			elseif ($_GET["loginInfo"]=="ConfimarDados") {
				
				echo'<h6 class="loginTitulo confirmar">Confirme os seus dados de registro</h6>';
			}
		}
		else{

			echo'<h6 class="loginTitulo">Faça o login para entrar no sistema</h6>';
		}
	}

	#Registro -> Mensagem de erro
	public function RegistroMsg(){


		if (isset($_GET["registroInfo"])) {
			
			if ($_GET["registroInfo"]=="Erro") {
				
				echo'<h6 class="registroTitulo erro">Erro ao registrar. Tente novamente</h6>';
			}
			elseif ($_GET["registroInfo"]=="ErroEmail") {

				echo'<h6 class="registroTitulo erro">Já existe um registro com esse email. Insira o seu email</h6>';
			}
		}
		else{

			echo'<h6 class="registroTitulo">Preencha o formulário  para criar uma conta</h6>';
		}
	}


	#Upload de Imagem -> Informações de Erro e Sucesso de Upload
	public function UploadImgInfo(){
		if (isset($_GET["infoUploadImg"])){
	    	if ($_GET["infoUploadImg"]=="Erro-extensao") {
	    		
	    		
	    		echo "
	    			<p class='uploadImageInfo center' id='erro' style='color:black;'>
	    				Extensão inválida, use apenas arquivos com as seguintes extenções:JPG, PNG ou GIF.
	    			</p>";
	    	}
	    	elseif ($_GET["infoUploadImg"]=="Erro-tamanho") {
	    		echo '
	    			<p class="uploadImageInfo center" id="erro">
	    				tamanho do arquivo não pode ser superior a 2MB</span
	    			</p>';
	    	}
	    	elseif ($_GET["infoUploadImg"]=="Sucesso") {
	    		echo 
	    			"<p class='uploadImageInfo center' id='sucesso'>
	    				Foto de perfil atualizada com sucesso
	    			</p>";
	    	}
	    } 
	}


	
	#Update do Nome(Primeiro e Último) do Usuário
	#Esta função interagirá com o usuario dando informações de atualização do Nome do usuário.
	#Informações como erro ou sucesso no Update.
	public function UpdateNomeUserInfo(){

		if (isset($_GET["infoUpdateEdit"])) {
			
		   
			#-----------Inicio Nome Completo-------------

			if ($_GET["infoUpdateEdit"]=="ErrorFullNameVazio") {
				#Quando o Nome(Primeiro e o Ultimo forem vazios)
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>Nome de usuário não pode estar vazio, preencha ao menos um dos campos para ser editado</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="FeitoEditFullName") {
				#Quando o Nome completo for editado com sucesso!
				echo "<p class='updateInfo center' id='feito'>Feito<i class='PerfinIcons fa fa-check'></i><br>Nome Completo editado com sucesso</p>";
			}
			elseif ($_GET["infoUpdateEdit"]=="ErroEdiFullNomeIgual") {
				#Quando o Nome completo for igual ao Nome completo do usuario!
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>Os dados inseridos não podem ser iguais ao atual Nome completo do usuário</p>";
			}
			#-----------Fim Nome Completo-------------

			#----------Inicio Primeiro Nome-----------

			elseif ($_GET["infoUpdateEdit"]=="FeitoEditPrimeiroNome") {
				#Quando o primeiro nome for editado com sucesso!
				echo "<p class=' updateInfo center' id='feito'>Feito<i 
				class='PerfinIcons fa fa-check'></i><br>Primeiro Nome editado com sucesso</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEditPrimeiroNomeIgual") {
				#Quando o primeiro nome for igual ao atual primeiro Nome do usuário
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>O dado inserido não pode ser igual ao  atual  Primeiro Nome do usuário</p>";
			}
			#----------Fim Primeiro Nome-----------

			#----------Inicio Ultimo Nome-----------

			elseif ($_GET["infoUpdateEdit"]=="FeitoEditUltimoNome") {
				#Quando o ultimo nome for editado com sucesso!
				echo "<p class='updateInfo center' id='feito'>Feito<i 
				class='PerfinIcons fa fa-check'></i><br>Último Nome editado com sucesso</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEditUltimoNomeIgual") {
				#Quando o ultimo nome for igual ao atual ultimo Nome do usuário
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>O dado inserido não pode ser igual ao  atual  Último Nome do usuário</p>";
			}
			#----------Fim Ultimo Nome-----------
		}
	}

	#Update do Email do Usuário
	#Esta função interagirá com o usuario dando informações de atualização do Email do usuário.
	#Informações como erro ou sucesso no Update.
	public function UpdateEmailUserInfo(){

		if (isset($_GET["infoUpdateEdit"])) {
			
			if ($_GET["infoUpdateEdit"]=="FeitoEditEmail") {
				#Atualizar o Email do usuário
				echo "<p class='updateInfo center' id='feito'>Feito<i 
				class='PerfinIcons fa fa-check'></i><br>Email atualizado com sucesso</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEmailDiferente_de_EmailAtual") {
				#quando o email enserido como sendo o atual for diferente  da variavel de sessão do email do usuário
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>O email enserido como atual não pode ser  direfente do  atual email do usuário</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEditEmailIguais") {
				#Quando email atual for igual ao novo email
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>O novo email não pode ser igual do email atual do usuário</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEditEmailExiste") {
				#quando ja existe um registro na base de dados com o mesmo email
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>Já existe um registro com esse email. Insira um novo email válido</p>";
			}
		}
	}
	#Update da Senha do Usuário
	#Esta função interagirá com o usuario dando informações de atualização da Senha do usuário.
	#Informações como erro ou sucesso no Update.
	public function UpdateSenhaUserInfo(){

		if (isset($_GET["infoUpdateEdit"])) {
			
			if ($_GET["infoUpdateEdit"]=="ErroEditSenhaAtualigualNovaSenha") {
				#Quando a Senha atual for igual a nova Senha
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>A nova senha não pode ser igual a Senha atual do usuário</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="FeitoEditSenha") {
				#Atualizar a Senha
				echo "<p class='updateInfo center' id='feito'>Feito<i 
				class='PerfinIcons fa fa-check'></i><br>Senha atualizada com sucesso</p>";
			}
			elseif ($_GET["infoUpdateEdit"]=="ErroEditSenhaAtualdiferenteSenhaSessaoUser") {
				#quando a Senha enserida como sendo o atual for diferente  da variavel de sessão da Senha do usuário
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>A senha enserida como atual é direfente da senha atual do usuário</p>";
			}

			elseif ($_GET["infoUpdateEdit"]=="ErroEditSenhaDesc") {
				#Algum outro erro
				echo "<p class='updateInfo center' id='erro'>Erro<i class='PerfinIcons fa fa-close'></i><br>Os dados enseridos estão incorretos</p>";
			}
		}
	}

	#UpdateTema
	#Esta função será executado quando o user atualizar o Tema. E vai dar informações(sms) se a atualização foi realizado com sucesso ou não.
	public function UpdateTemaUserInfo(){

		if (isset($_GET["UpdateTema"])) {
			
			if ($_GET["UpdateTema"]=="Feito") {
				#TemaAtualizado
				echo "<p class='updateInfo center' id='feito'>Tema atualizado com sucesso</p>";
			}
			elseif ($_GET["UpdateTema"]=="Erro") {
				#Erro ao atualizar Tema
				echo "<p class='updateInfo center' id='erro'>Ocorreu um erro ao atualizar o tema. Tente novamente</p>";
			}
			elseif ($_GET["UpdateTema"]=="TemaIgual") {
				#O Tema for igual ao tema atual
				echo "<p class='updateInfo center' id='erro'>Escolha um tema diferente do tema atual</p>";
			}
		}
	}
	/* As três funcções asseguir, exibirão um icon no tema atual do sistema*/
	/*----------Inicio Exibir Icon------------*/
	public function IconTema_PadraoSelecionado(){
		
		if ($_SESSION["UserTema"]=="blue-grey darken-3") {
			
			echo "<i class='fa fa-check-circle'></i>";
		}
	}
	public function IconTema_CyanSelecionado(){

		if ($_SESSION["UserTema"]=="cyan darken-4") {
			
			echo "<i class='fa fa-check-circle'></i>";
		}
	}
	public function IconTema_PinkSelecionado(){
		if ($_SESSION["UserTema"]=="pink darken-4") {
			
			echo "<i class='fa fa-check-circle'></i>";
		}
	}
	/*----------Fim Exibir Icon------------*/

	/*As três funções que se seguem servem para desabilitar 
	O botão do tema selecionado e serão aplicadas na pagina de 
	Personalizar o sistema*/

	/*-----------Inicio Desabilitar Botões-------*/

	public function DesabilitarBtnTema_PadraoSelecionado(){

		if ($_SESSION["UserTema"]=="blue-grey darken-3") {
			
			echo "Disabled";
		}
	}
	public function DesabilitarBtnTema_CyanSelecionado(){

		if ($_SESSION["UserTema"]=="cyan darken-4") {
			
			echo "Disabled";
			
		}
	}
		public function DesabilitarBtnTema_PinkSelecionado(){

		if ($_SESSION["UserTema"]=="pink darken-4") {
			
			echo "Disabled";
		}
	}
}