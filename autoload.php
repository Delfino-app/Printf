
<?php

	session_start();

	require_once "Controlador/controlador.php";
	require_once "Controlador/UpdateUserInfo.php";
	require_once "Controlador/userInfo.php";
	require_once "Controlador/LojaController.php";
	require_once "Controlador/MultimidiaController.php";
	require_once "Controlador/ChatMensagens.php";
	require_once "Controlador/Notificacoes.php";
	require_once "Controlador/DesempenhoController.php";
	require_once "Controlador/Aulas.php";
	require_once "Controlador/Exercicios.php";


	require_once "Modelo/conexao.php";
	require_once "Modelo/modelo.php";
	require_once "Modelo/crud.php"; 
	require_once "Modelo/UpdateDadosUser.php"; 
	require_once "Modelo/LojaModel.php";
	require_once "Modelo/MultimidiaModel.php";
	require_once "Modelo/DesempenhoModel.php";
	require_once "Modelo/AulasModel.php";
	require_once "Modelo/ExercicioModel.php";
	require_once "Modelo/chatMensagensModel.php";



	 
	$objeto = new controller();
	 
	$objeto->HomePage(); #Mostrar a página Inicial
	 
	#login de Usuario(o método só é executado quando o user  faz o login)
	$objeto->LoginController();

	$UpdateUserInfoObjeto =  new UpdateUserInfo();

	#Atualização da imagem do perfil do usuario (o método só é executado quando o user atualiza a imagem)
	$UpdateUserInfoObjeto->UploadImgController();

	#Atualizar dados do registro do usuário(ex.:PrimeiroNome, UltimoNome, Email e Senha)
	$UpdateUserInfoObjeto->UpdateNomeRegistroController();

	#Atualizar o Email do Usuário
	$UpdateUserInfoObjeto->UpdateEmailRegistroController();

	#Atualizar a Senha do Usuário
	$UpdateUserInfoObjeto->UpdateSenhaRegistroController();

	#Personalizar o Sistema
	$UpdateUserInfoObjeto->PersonalizarTemaSistemaController();
	 #Desempenho 

	 desempenhoUserController::contarMediaDesempenho();