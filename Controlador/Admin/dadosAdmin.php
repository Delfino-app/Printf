
<?php

 class dadosAdmin{

 	public static function primeiroNome(){

 		echo $_SESSION["PrimeiroNomeMaster"];
 	}

 	public static function nomeCompleto(){

 		echo $_SESSION["PrimeiroNomeMaster"]." ".$_SESSION["UltimoNomeMaster"];
 	}

 	public static function imgAdmin(){

 		echo 'src="Vista/Imagens/upload/UserPerfil/'.$_SESSION["UserImgMaster"].'"';
 	}
 }