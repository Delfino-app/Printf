	
 <!--===================================================================

	Autor: Delfino Torres 
	Email: delfinoapp@gmail.com
	Telefone: 994 300 111
	
	Nome do Projeto: Printf - Sistema Integrado de Ensino de Programação
	CopyRight: 2018

========================================================================-->
<?php

  require_once "Modelo/conexao.php";

 if (conexao::conectar()) {
 	
 	include 'autoload.php';
 }
 else{

 	include 'SystemNotFound.php';
 }