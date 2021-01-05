<?php


class lojamodel{

	
	public static function ExibirAllDadosLojaItensModel($tabela){


		#Prepare()

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE estado=:s LIMIT 4");
		$estado="lock";
		$stmt->BindParam(":s",$estado,PDO::PARAM_STR);
		#execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetchAll(); 
	}

	public static function AllIdModel($tabela, $id){


		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id=:id");


		$stmt->BindParam(":id",$id,PDO::PARAM_INT);
		#execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetch(); 
	}

	#Verificar comprar Item Loja Existente

	public static function verificarItemCompradoModelo($tabela,$idItem, $idUser, $categoria){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:idUser and idItem =:idItem and categoria =:categoria");


		$stmt->BindParam(":idItem",$idItem,PDO::PARAM_INT);
		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":categoria",$categoria,PDO::PARAM_STR);

		#execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetch(); 
	}

	#Add comprar itens loja

	public static function addComprarItenLojaModelo($tabela, $dados){


		#Prepare()
		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idUser, idItem, categoria) VALUES(:idUser, :idItem, :categoria)");


		$stmt->BindParam(":idUser",$dados["idUser"],PDO::PARAM_INT);
		$stmt->BindParam(":idItem",$dados["idItem"],PDO::PARAM_INT);
		$stmt->BindParam(":categoria",$dados["categoria"],PDO::PARAM_STR);


		#execute()
        if($stmt->execute()){

       		return "Feito";
        }
	}

	#Listar Itens Comprados

	public static function listarItensCompradosLoja($tabela, $idUser, $categoria){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:idUser and categoria =:categoria ORDER BY data DESC");

		$stmt->BindParam(":idUser",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":categoria",$categoria,PDO::PARAM_STR);

		#execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetchAll(); 
	}
}