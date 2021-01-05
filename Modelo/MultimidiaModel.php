
<?php


class multimidiamodel{


	public static function allDadosId($tabela,$id){


		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id=:id");

		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();
	}

	public static function countComentariosVideoModelo($tabela,$id){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idVideo=:id");

		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function comentarVideoModel($tabela, $idVideo, $idUser, $comentario){

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idVideo, idUser, comentario) VALUES(:idVideo, :idUser, :comentario)");

		$stmt->BindParam(":idVideo",$idVideo,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":comentario",$comentario,PDO::PARAM_STR);


		$stmt->execute();
	}

	public static function comentariosVideoModelo($tabela,$id){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idVideo=:id ORDER BY id ASC LIMIT 8");

		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function deleteComentarVideoModel($tabela,$id,$idUser){

		$stmt=conexao::conectar()->Prepare("DELETE FROM $tabela WHERE id =:id and idUser =:idUser");

		$stmt->BindParam(":id",$id,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		
		$stmt->execute();
	}

	public static function ExibirVideosCortesiaModel($estado,$tabela){


		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:Estado");

		$stmt->BindParam(":Estado",$estado,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function ExibirVideosCompradosModel($tabela,$id){


		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id=:id");

		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();
	}


	public static function ExibirLivrosCortesiaModel($estado,$tabela){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:Estado");

		$stmt->BindParam(":Estado",$estado,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function ExibirLivrosCompradosModel($estado,$tabela){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:Estado");

		$stmt->BindParam(":Estado",$estado,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}


	public static function ExibirArtigosCortesiaModel($estado,$tabela){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:Estado");

		$stmt->BindParam(":Estado",$estado,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function ExibirArtigosCompradosModel($estado,$tabela){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:Estado");

		$stmt->BindParam(":Estado",$estado,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}
	public static function addAnotacoes($tabela, $idItem, $idUser, $categoria,$anotacao){

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idItem, idUser, categoria, anotacao)  VALUES(:idItem, :idUser, :categoria, :anotacao)");

		$stmt->BindParam(":idItem",$idItem,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":categoria",$categoria,PDO::PARAM_STR);
		$stmt->BindParam(":anotacao",$anotacao,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}
	public static function allAnotacoes($tabela, $idItem, $idUser, $categoria,$limite){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idItem =:idItem and idUser =:idUser and categoria =:categoria ORDER BY id DESC LIMIT $limite");

		$stmt->BindParam(":idItem",$idItem,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":categoria",$categoria,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public static function delefteAnotacoes($tabela, $idItem, $idUser){

		$stmt=conexao::conectar()->Prepare("DELETE FROM $tabela WHERE id =:idItem and idUser =:idUser");

		$stmt->BindParam(":idItem",$idItem,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);

		$stmt->execute();
	}

	public static function deleteDados($tabela, $idItem){

		$stmt=conexao::conectar()->Prepare("DELETE FROM $tabela WHERE id =:idItem");

		$stmt->BindParam(":idItem",$idItem,PDO::PARAM_INT);
		$stmt->execute();
	}
}