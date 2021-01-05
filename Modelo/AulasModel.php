
<?php

class aulasModel{

	public static function dadosAulaUser($tabela, $id, $nivel){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id =:id and nivel =:nivel");

		#BindParam()
		$stmt->BindParam(":id",$id,PDO::PARAM_INT);
		$stmt->BindParam(":nivel",$nivel,PDO::PARAM_INT);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetch();
	}
	public static function AllDadosAulaUser($tabela, $nivel){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE nivel =:nivel");

		#BindParam()
		$stmt->BindParam(":nivel",$nivel,PDO::PARAM_INT);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetchAll();
	}

	public static function addAnotacaoAulaModelo($tabela,$dados){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idUser, idAula, anotacao) VALUES(:idUser, :idAula, :anotacao)");

		#BindParam()
		$stmt->BindParam(":idUser",$dados["idUser"],PDO::PARAM_INT);
		$stmt->BindParam(":idAula",$dados["idAula"],PDO::PARAM_INT);
		$stmt->BindParam(":anotacao",$dados["anotacao"],PDO::PARAM_STR);

		#execute()
		
		if ($stmt->execute()) {
			
			return "Feito";
		}
	}

	public static function addDuvidaAulaModelo($tabela, $dados){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idUser, idAula, duvida, estado) VALUES(:idUser, :idAula, :duvida, :estado)");

		#BindParam()
		$stmt->BindParam(":idUser",$dados["idUser"],PDO::PARAM_INT);
		$stmt->BindParam(":idAula",$dados["idAula"],PDO::PARAM_INT);
		$stmt->BindParam(":duvida",$dados["duvida"],PDO::PARAM_STR);
		$stmt->BindParam(":estado",$dados["estado"],PDO::PARAM_STR);

		#execute()
		
		if ($stmt->execute()) {
			
			return "Feito";
		}
	}
}