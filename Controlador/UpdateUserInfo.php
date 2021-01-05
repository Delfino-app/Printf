
<?php

/*Esta classe contém funções que servem para atualizar(Update) informações do usuario
como atualizar  a foto de perfil, atualizar o primeiro nome, o ultimo nome ou os dois ao mesmo tempo e ainda serve para atualizar o email e a senha do usuário bem como o tema do sistema que é personalizavél
*/

class UpdateUserInfo{


	#Upload de Arquivos(Imagem)
	public function UploadImgController(){


		if (isset($_FILES["arquivo"])) {
			
			#Pegar a extenção do arquivo
			$formato = $_FILES["arquivo"]["name"];
			$new = explode('.', $formato);
			$extensao=end($new);

			#Validar a extensão do arquivo
			if ($extensao=="jpg" || $extensao=="png" || $extensao=="jpeg"){
				#Atribuir um novo nome ao aqruivo
				$novo_nome= md5(time()).$extensao;

				#Diretorio do arquivo
				$diretorio="Vista/Imagens/upload/UserPerfil/";

				#Mover o arquivo para o diretorio
				move_uploaded_file($_FILES["arquivo"]["tmp_name"], $diretorio.$novo_nome);


				#Enviar o arquivo para ser adicionado no banco de dados
				$dadosUpload = array('img' =>$novo_nome , 'id'=>$_SESSION['id']);
				$Enviar=dados::UploadImgModel($dadosUpload,"usuarios");

				if ($Enviar=="Imagem Atualizada") {
				

					$_SESSION["UserImg"]=$novo_nome;#Atualizar o valor da $_SESSION, para que receba a imagem atualizada sem ter reiniciar o sistema. 
					
					header("location:index.php?pg=Perfil_Usuario&perfilLink=UploadFoto&infoUploadImg=Sucesso#AlterarFotoPerfil");#Redirecionar para o Perfil para que a novo imagem seja exibida.
				}	
			}
			else{
				header("location:index.php?pg=Perfil_Usuario&perfilLink=UploadFoto&infoUploadImg=Erro-extensao#AlterarFotoPerfil");	
			}		
		}
	}
	#Update de dados de registro do usuário
	public function UpdateNomeRegistroController(){

		#Inicio------Editar Nome do usuário 
		if (isset($_POST["EditPrimeiroNome"])) {
			
			if ($_POST["EditPrimeiroNome"]=="" && $_POST["EditUltimoNome"]=="") {
				
				header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=ErrorFullNameVazio");
			}

			/*se o primeiroNome não for vazio mas o Ultimo nome for vazio, então apenas o
			primeiro nome deve ser Atualizado*/
			elseif ($_POST["EditPrimeiroNome"]!="" && $_POST["EditUltimoNome"]=="") {

				/*Verificar se o Nome a ser editado é igual ao Primeiro Nome da sesão do usuario, se for, o nome não deve ser atualizado porque é o mesmo nome*/
				if ($_POST["EditPrimeiroNome"]!=$_SESSION["PrimeiroNome"]) {

				    #criando um vetor que armazenará as informações necessaria para editar o Primeiro nome do usuário(PrimeiroNome e o id)
					$dadosEditPrimeiroNome= array('primeiroNomeEdit' => $_POST["EditPrimeiroNome"],'id' => $_SESSION["id"]);

					#Enviar o novo primeiroNome para ser Atualizado na Base de dados
					$updatePrimeiroNome=updateDados::EditPrimeiroNomeModel($dadosEditPrimeiroNome,"usuarios");

					if ($updatePrimeiroNome="Feito") {

						/*Atualizar a Informação da variavel de sessão do Primeiro Nome*/
						$_SESSION["PrimeiroNome"]=$dadosEditPrimeiroNome["primeiroNomeEdit"];
						/* redirecionar a pagina e informar ao user que o primeiro nome foi atualizado*/
						header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=FeitoEditPrimeiroNome");
					}
				}
				else{
					#Se o Nome a ser atualizado for igual ao primeiro Nome do usuario, ou seja se os nomes forem iguais
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=ErroEditPrimeiroNomeIgual");
				}
			}


			/*se o ultimoNome não for vazio mas o primeiro nome for vazio, então apenas o
			ultimo nome deve ser Atualizado*/
			elseif ($_POST["EditUltimoNome"]!="" && $_POST["EditPrimeiroNome"]=="") {

				/*Verificar se o ultimo nome do usuario a ser editado é diferente da  sessão do usuario, se for o ultimo nome não deve ser atualizado pk é o mesmo nome.*/
				if ($_POST["EditUltimoNome"]!=$_SESSION["UltimoNome"]) {
					#criando um vetor que armazenará as informações necessaria para editar o ultimo nome do usuário(Ultimo e o id)
					$dadosEditUltimoNome= array('ultimoNomeEdit' => $_POST["EditUltimoNome"],
						                        'id' => $_SESSION["id"]);

					#Enviar o novo primeiroNome para ser Atualizado na Base de dados
					$updateUltimoNome=updateDados::EditUltimoNomeModel($dadosEditUltimoNome,"usuarios");
					if ($updateUltimoNome=="Feito") {

						/*Atualizar a Informação da variavel de sessão do Ultimo Nome*/
						$_SESSION["UltimoNome"]=$dadosEditUltimoNome["ultimoNomeEdit"];

						/* redirecionar a pagina e informar ao user que o ultimo nome foi atualizado*/
						header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=FeitoEditUltimoNome");
					}
				}
				else{

					#se o ultimo nome a ser Atualizado for igual ao ultimo nome do usuario, ou seja se os nomes forem iguas
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=ErroEditUltimoNomeIgual");
				}
			}

			#se o primeiro e o ultimo nome forem diferente de vazio, então os dois deverão ser atualizados
			elseif ($_POST["EditPrimeiroNome"]!="" && $_POST["EditUltimoNome"]!="") {
				#Verificar se os nomes não são iguais os das variavéis de sessão
				if ($_POST["EditPrimeiroNome"]!=$_SESSION["PrimeiroNome"] && 
					$_POST["EditUltimoNome"]!=$_SESSION["UltimoNome"]) {
					
					$dadosEditFullName= array('primeiroNomeEdit' => $_POST["EditPrimeiroNome"], 
						                       'ultimoNomeEdit'  => $_POST["EditUltimoNome"],
						                   	   'id' => $_SESSION["id"]);

					#passando como parametro os dados a serem atualizados e o nome da tabela que armazenará os dados
					$UpdateFullName=updateDados::EditFullNameModel($dadosEditFullName,"usuarios");

					if ($UpdateFullName=="Feito") {

						#Atualizar as informações das variáveis de sessão.
						$_SESSION["PrimeiroNome"]=$dadosEditFullName["primeiroNomeEdit"];
						$_SESSION["UltimoNome"]=$dadosEditFullName["ultimoNomeEdit"];

						#redirecionar a pagina e informar ao user que os dados foram atualizados
						header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=FeitoEditFullName");
					}
				}
				else{

					#se o primeiro e o ultimo nome forem iguais os da variaveis de sessão
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editNome&infoUpdateEdit=ErroEdiFullNomeIgual");
				}	
			}
		}	
	}
	#Fim------Editar Nome do usuário

	#Inicio---Editar Email do usuário
	public function UpdateEmailRegistroController(){
		if (isset($_POST["EditEmailAtual"])) {
			
			if ($_POST["EditEmailAtual"]==$_SESSION["UserEmail"]) {
				
				
				if ($_POST["EditEmailAtual"]!=$_POST["EditEmailNovo"]) {
					

					$dadosEditEmail= array('novoEmail' => $_POST["EditEmailNovo"], 
										'id' => $_SESSION["id"]);

					#Verificar se o novo email já existe na base de dados
					$verificarEmail=updateDados::updateValidarEmailModel($dadosEditEmail["novoEmail"],"usuarios");

					if ($verificarEmail["email"] == $dadosEditEmail["novoEmail"]) {
						
						#Caso exista o email ja exista na base de dados
						header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editEmail&infoUpdateEdit=ErroEditEmailExiste");
					}
					else{

						$UpdateEmail=updateDados::EditEmailModel($dadosEditEmail,"usuarios");

						if ($UpdateEmail=="Feito") {
							
							#Atualizar a informação da variavel de sessão que recebe o email do usuario
							$_SESSION["UserEmail"]=$dadosEditEmail["novoEmail"];

							#redirecionar a pagina e informar ao user que os dados foram atualizados
							header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editEmail&infoUpdateEdit=FeitoEditEmail");	
						}
					}
				}
				else{

					#Quando o novo email for igual ao atual email do usuário
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editEmail&infoUpdateEdit=ErroEditEmailIguais");		
				}
			}
			else{

				#email atual diferente da variavel de sessão que recebe o email do usuario
				header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editEmail&infoUpdateEdit=ErroEmailDiferente_de_EmailAtual");	

               	
			}
		}
	}
	#Fim---Editar Email do usuário

	#Inicio---Editar Senha do usuário
	public function UpdateSenhaRegistroController(){

		if (isset($_POST["EditSenhaAtual"])) {
			
			#Criptografar todas as informações enviadas
			$senhaAtual= crypt($_POST["EditSenhaAtual"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$novaSenha= crypt($_POST["EditSenhaNova"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$novaSenhaConfirmar= crypt($_POST["EditSenhaNovaConfirmar"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


			#Verificar informações enviadas
			#Verificando se a senha atual é igual ao da variavel de sessão da senha do usuario
			if ($senhaAtual==$_SESSION["UserSenha"]) {
				
				#Verificar se a senha atual é igual a nova senha
				if ($senhaAtual==$novaSenha) {
					
					#Senha iguais, não pode realizar Update
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editSenha&infoUpdateEdit=ErroEditSenhaAtualigualNovaSenha");
				}
				#Verficar se a senha atual é diferente da nova senha e se a nova senha é igual a nova senha confirmar
				elseif ($senhaAtual!=$novaSenha && $novaSenha==$novaSenhaConfirmar) {
					
					$dadosEditSenha = array('novaSenha' => $novaSenha, 'id' => $_SESSION["id"]);

					$UpdateSenha=updateDados::EditSenhaModel($dadosEditSenha,"usuarios");

					if ($UpdateSenha=="Feito") {
						#Atualizar a informação da variavel de sessão da senha do usúário
						$_SESSION["UserSenha"]=$dadosEditSenha["novaSenha"];
	                    #Redirecionar a pagina e informar que a senha foi Atualizada
						header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editSenha&infoUpdateEdit=FeitoEditSenha");
					}
				}
				else{

					#Algum outro erro
					header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editSenha&infoUpdateEdit=ErroEditSenhaDesc");
				}
			}
			else{

				#Senha atual diferente da senha da varialvel de sessão da senha do usuario
				header("location:Perfil_Usuario&perfilLink=EditPerfil&EditPerfilLink=editSenha&infoUpdateEdit=ErroEditSenhaAtualdiferenteSenhaSessaoUser");
			}
		}
	}
	#Fim---Editar Senha do usuário

	#Inicio---Personalizar Tema do sistema
	public function PersonalizarTemaSistemaController(){

		if (isset($_POST["TemaPadrao"])) {

			$temaPadrao="blue-grey darken-3"; #Tema Padrão do Sistema
			
			$dadosEditTema = array('novoTema' => $temaPadrao, 'id' => $_SESSION["id"]);

		    $UpdateTema = updateDados:: PersonalizarTemaSistemaModel($dadosEditTema,"usuarios");

			if ($UpdateTema=="Feito") {
				
				#Atualizar o Tema na variavel de sessão
				$_SESSION["UserTema"]=$temaPadrao;
				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Feito#PersonalizarPerfil");
			}
			else{

				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Erro#PersonalizarPerfil");
			}
		}
		elseif (isset($_POST["TemaCyan"])) {
			
			$temaCyan="cyan darken-4"; #Tema Padrão do Sistema
			
			$dadosEditTema = array('novoTema' => $temaCyan, 'id' => $_SESSION["id"]);

		    $UpdateTema = updateDados:: PersonalizarTemaSistemaModel($dadosEditTema,"usuarios");

			if ($UpdateTema=="Feito") {
				
				#Atualizar o Tema na variavel de sessão
				$_SESSION["UserTema"]=$temaCyan;
				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Feito#PersonalizarPerfil");
			}
			else{

				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Erro#PersonalizarPerfil");
			}
		}
		elseif (isset($_POST["TemaPink"])) {
			
			$temaPink="pink darken-4"; #Tema Padrão do Sistema
			
			$dadosEditTema = array('novoTema' => $temaPink, 'id' => $_SESSION["id"]);

		    $UpdateTema = updateDados:: PersonalizarTemaSistemaModel($dadosEditTema,"usuarios");

			if ($UpdateTema=="Feito") {
				
				#Atualizar o Tema na variavel de sessão
				$_SESSION["UserTema"]=$temaPink;
				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Feito#PersonalizarPerfil");
			}
			else{

				header("location:index.php?pg=Perfil_Usuario&perfilLink=Personalizar&UpdateTema=Erro#PersonalizarPerfil");
			}
		}
	}
	#Fim---Personalizar Tema do sistema
}