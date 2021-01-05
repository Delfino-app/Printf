
<?php

class chatMensagensModel{


	public static function AllSmsUserId($tabela, $idUser){


		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE de =:idUser || para =:idUser");

 		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);

 		$stmt->execute();

 		return $stmt->fetchAll();
	}

	public static function sendSms($tabela, $de,$para,$Sms){

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(de, para, Sms, estado) VALUES(:de, :para, :Sms, :estado)");

		$estado="pendente";

 		$stmt->BindParam(":de",$de,PDO::PARAM_INT);
 		$stmt->BindParam(":para",$para,PDO::PARAM_INT);
		$stmt->BindParam(":Sms",$Sms,PDO::PARAM_STR);
		$stmt->BindParam(":estado",$estado,PDO::PARAM_STR);
		


 		$stmt->execute();
	}
}