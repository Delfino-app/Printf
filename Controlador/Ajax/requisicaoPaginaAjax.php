

<?php

	session_start();

 	require_once "../Aulas.php";
 	require_once "../DesempenhoController.php";
 	require_once "../../Modelo/conexao.php";
 	require_once "../../Modelo/ExercicioModel.php";
 	require_once "../../Modelo/DesempenhoModel.php";
 	require_once "../../Modelo/AulasModel.php";

 	if (isset($_POST["paginaAjax"])) {
 		
 		$pagina = $_POST["paginaAjax"];

 		if ($pagina == 1) {

 			#Inicio
 			
 			include "../../Vista/Paginas/Inside/1_veiws/Inicio.php";
 		}
 		elseif ($pagina == 2) {

 			#Desempenho

 			include "../../Vista/Paginas/Inside/1_veiws/Desempenho.php";
 		}
 	}