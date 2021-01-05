
<?php

class ExercicioModelo{


	public static function VerificarExercicioModelo($tabela,$idAula){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idAula =:id");

 		$stmt->BindParam(":id",$idAula,PDO::PARAM_INT);

 		$stmt->execute();

 		return $stmt->fetchAll();
	}
	public static function VerificarExercicioEstadoModelo($tabela,$idUser,$estado){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:idUser and estado =:estado");

 		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
 		$stmt->BindParam(":estado",$estado,PDO::PARAM_STR);

 		$stmt->execute();

 		return $stmt->fetchAll();
	}
	public static function VerificarExercicioUserModelo($tabela,$idUser,$idAula,$estado){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:idUser and idAula =:idAula and estado =:estado");

 		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
 		$stmt->BindParam(":idAula",$idAula,PDO::PARAM_INT);
 		$stmt->BindParam(":estado",$estado,PDO::PARAM_STR);

 		$stmt->execute();

 		return $stmt->fetchAll();
	}

	public static function addExerciciosFazerModelo($tabela,$dados){

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idUser, idAula,idExercicio, estado) VALUES (:idUser, :idAula,:idExercicio, :estado)");

		#BindParam()

		$stmt->BindParam(":idUser",$dados["idUser"],PDO::PARAM_INT);
		$stmt->BindParam(":idAula",$dados["idAula"],PDO::PARAM_INT);
		$stmt->BindParam(":idExercicio",$dados["idExercicio"],PDO::PARAM_INT);
		$stmt->BindParam(":estado",$dados["estado"],PDO::PARAM_STR);

		#execute()
	    $stmt->execute();
	}

	#Ao resolver Exercicio

	public static function VerificarExercicioUserIdExercicioModelo($tabela, $idUser,$idAula, $estado, $idExercicio){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:idUser and idAula =:idAula and idExercicio =:idExercicio and estado =:estado");

 		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
 		$stmt->BindParam(":idAula",$idAula,PDO::PARAM_INT);
 		$stmt->BindParam(":idExercicio",$idExercicio,PDO::PARAM_INT);
 		$stmt->BindParam(":estado",$estado,PDO::PARAM_STR);

 		$stmt->execute();

 		return $stmt->fetch();
	}

	public static function updateVerificarExercicioUserIdExercicioModelo($tabela, $idUser,$idAula, $estado, $idExercicio){

		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET estado =:estado WHERE idUser =:idUser and idAula =:idAula and idExercicio =:idExercicio");

 		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
 		$stmt->BindParam(":idAula",$idAula,PDO::PARAM_INT);
 		$stmt->BindParam(":idExercicio",$idExercicio,PDO::PARAM_INT);
 		$stmt->BindParam(":estado",$estado,PDO::PARAM_STR);

 		$stmt->execute();

 		return $stmt->fetch();
	}
}