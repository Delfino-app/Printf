
<?php



    if($_SESSION["login"]==false){

     header("location:PrintfHome");
    }

	aulas::infoAulaInside();



	if ($_SESSION["startAula"] == false) {
		
		#Permitir mostrar automaticamente o Modal de Boas Vindas e Resumo da aula, bem como o texto do dia
		include 'AulasCustom.php';

		$_SESSION["startAula"] = true; 
	}
?>
