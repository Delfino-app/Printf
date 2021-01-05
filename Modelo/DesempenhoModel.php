
<?php

 class desempenhoUserModel{

 	public static function allDadosDesempenho($tabela){

 		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela ");

 		$stmt->execute();

 		return $stmt->fetchAll();
 	}

 	public static function rakingModel($tabela){

 		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela ORDER BY mediaDesempenho DESC LIMIT 5");

 		$stmt->execute();

 		return $stmt->fetchAll();
 	}
 	public static function userDesempenhoModel($tabela,$id){

 		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:id");

 		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

 		$stmt->execute();

 		return $stmt->fetch();
 	}

 	public static function userDados($tabela,$id){

 		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id=:idUser");

 		$stmt->BindParam(":idUser",$id,PDO::PARAM_INT);

 		$stmt->execute();

 		return $stmt->fetch();
 	}

 	#Upadate

 	public static function updateMediaDesemploModel($tabela,$id,$media){

 		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET mediaDesempenho =:media WHERE id =:id");

 		$stmt->BindParam(":id",$id,PDO::PARAM_INT);
 		$stmt->BindParam(":media",$media,PDO::PARAM_INT);
 		

 		$stmt->execute();
 	}
 }