<?php

class updateDados{

	public static function  EditPrimeiroNomeModel($dadosEdit,$tabela){

		#Esta função atualizará o Primeiro Nome do Usuário

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET primeiroNome=:PrimeiroNome WHERE id=:idlog");

		#BindParam()
		$stmt->BindParam(":PrimeiroNome",$dadosEdit["primeiroNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}
	public static function  EditUltimoNomeModel($dadosEdit,$tabela){

		#Esta função atualizará o Ultimo Nome do Usuário

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET ultimoNome=:UltimoNome WHERE id=:idlog");

		#BindParam()
		$stmt->BindParam(":UltimoNome",$dadosEdit["ultimoNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}
	public static function EditFullNameModel($dadosEdit,$tabela){

		#Esta função atualizará o Primeiro e o  Ultimo Nome do Usuário

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET primeiroNome=:PrimeiroNome, ultimoNome=:UltimoNome WHERE  id=:idlog");

		#BindParam()
		$stmt->BindParam(":PrimeiroNome",$dadosEdit["primeiroNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":UltimoNome",$dadosEdit["ultimoNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}
	public static function EditEmailModel($dadosEdit,$tabela){

		#Esta função atualizará o Email do Usuário

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET email=:Email WHERE id=:idlog");

		#BindParam()
		$stmt->BindParam(":Email",$dadosEdit["novoEmail"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}
	public static function EditSenhaModel($dadosEdit,$tabela){

		#Esta função atualizará a Senha do Usuário

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET senha=:Senha WHERE id=:idlog");

		#BindParam()
		$stmt->BindParam(":Senha",$dadosEdit["novaSenha"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}

	public static function PersonalizarTemaSistemaModel($dadosEdit,$tabela){

		#Esta função atualizará ou alterar o tema do sistema

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET tema=:Tema WHERE id=:idlog");

		#BindParam()
		$stmt->BindParam(":Tema",$dadosEdit["novoTema"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$dadosEdit["id"],PDO::PARAM_INT);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}

	public static function updateValidarEmailModel($dadosEmail,$tabela){

		$stmt = conexao::conectar()->prepare("SELECT email FROM $tabela WHERE email =:Email");
		$stmt->BindParam(":Email", $dadosEmail, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();
	}

	//Notificações - Update Estado

	public static function UpdateNotificacaoEstado($tabela,$idUser,$estado){

		$stmt = conexao::conectar()->prepare("UPDATE $tabela SET estado =:estado WHERE para =:idUser");
		$stmt->BindParam(":idUser", $idUser, PDO::PARAM_INT);
		$stmt->BindParam(":estado", $estado, PDO::PARAM_STR);	
		

		if ($stmt->execute()) {
			
			return "Feito";
		}
	}

	//Update Aula atual User

	public static function UpdateAulaAtualModelo($tabela,$idUser,$novaAula){

		$stmt = conexao::conectar()->prepare("UPDATE $tabela SET aula_atual =:novaAula WHERE id =:idUser");
		
		$stmt->BindParam(":idUser", $idUser, PDO::PARAM_INT);
		$stmt->BindParam(":novaAula", $novaAula, PDO::PARAM_INT);

		if ($stmt->execute()) {
			
			return "Feito";
		}
	}

	//Update Desempenho Aula + 10%

	public static function UpdateDesempenhoAulaModelo($tabela,$idUser,$percentacenAula){

		$stmt = conexao::conectar()->prepare("UPDATE $tabela SET assistenciaAulas =:assistenciaAulas WHERE idUser =:idUser");
		
		$stmt->BindParam(":idUser", $idUser, PDO::PARAM_INT);
		$stmt->BindParam(":assistenciaAulas", $percentacenAula, PDO::PARAM_INT);

		if ($stmt->execute()) {
			
			return "Feito";
		}
	}

	public static function updatePontuacaoUserModelo($tabela,$idUser,$pontuacao){

 		$stmt = conexao::conectar()->prepare("UPDATE $tabela SET pontuacao =:pontuacao WHERE idUser =:idUser");
		
		$stmt->BindParam(":idUser", $idUser, PDO::PARAM_INT);
		$stmt->BindParam(":pontuacao", $pontuacao, PDO::PARAM_INT);

		if ($stmt->execute()) {
			
			return "Feito";
		}
 	}
 	public static function updateResolucaoTarefasUserModelo($tabela,$idUser,$resolucaoTarefas){

 		$stmt = conexao::conectar()->prepare("UPDATE $tabela SET resolucaoTarefas =:resolucaoTarefas WHERE idUser =:idUser");
		
		$stmt->BindParam(":idUser", $idUser, PDO::PARAM_INT);
		$stmt->BindParam(":resolucaoTarefas", $resolucaoTarefas, PDO::PARAM_INT);

		if ($stmt->execute()) {
			
			return "Feito";
		}
 	}
}