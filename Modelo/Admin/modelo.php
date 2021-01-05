
<?php

class adminModelo{

	public static function RequisisaoPaginasAdminModelo($pagina){

		$mostar = false;

		if ($pagina == 'dashboard' || $pagina == 'alunos' || $pagina == 'aulas' || $pagina == 'loja' || $pagina == 'definicoes') {
			
			$mostar = 'Vista/Paginas/Admin/pages/'.$pagina.'.php';
		}
		elseif ($pagina == 'sair') {

			$mostar = 'logout';
		}
		return $mostar;
	}

	public static function LoginAdmin($dadosLogin,$tabela){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE email= :Email");

		#BindParam()
		$stmt->BindParam(":Email",$dadosLogin,PDO::PARAM_STR);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetch();
	}

	public static function ListarAllDadosTabela($tabela){


		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela");

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetchAll();
	}

	public static function ListarAllDdadosId($tabela, $id){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE id=:id");

		#BindParam()
		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetch();
	}

	public static function updateAula($tabela, $dados){

		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET resumo =:resumo,tema =:tema, dica =:dica, subtema =:subtema, conteudo =:conteudo  WHERE id =:id");

		#BindParam()
		$stmt->BindParam(":tema",$dados["tema"],PDO::PARAM_STR);
		$stmt->BindParam(":dica",$dados["dica"],PDO::PARAM_STR);
		$stmt->BindParam(":resumo",$dados["resumo"],PDO::PARAM_STR);
		$stmt->BindParam(":subtema",$dados["subtema"],PDO::PARAM_STR);
		$stmt->BindParam(":conteudo",$dados["conteudo"],PDO::PARAM_STR);
		$stmt->BindParam(":id",$dados["id"],PDO::PARAM_INT);

		#execute()
		$stmt->execute();

		#fetch()
		return "Feito";
	}

	#Add Aula
	public static function addAulaModelo($tabela,$dados){

		$stmt=conexao::conectar()->Prepare("INSERT INTO  $tabela(nivel, tema, subtema, resumo, dica, conteudo, estado) VALUES(:nivel, :tema, :subtema, :resumo, :dica, :conteudo, :estado)");

		#BindParam()
		$stmt->BindParam(":nivel",$dados["nivel"],PDO::PARAM_INT);
		$stmt->BindParam(":tema",$dados["tema"],PDO::PARAM_STR);
		$stmt->BindParam(":subtema",$dados["subtema"],PDO::PARAM_STR);
		$stmt->BindParam(":resumo",$dados["resumo"],PDO::PARAM_STR);
		$stmt->BindParam(":dica",$dados["dica"],PDO::PARAM_STR);
		$stmt->BindParam(":conteudo",$dados["conteudo"],PDO::PARAM_STR);
		$stmt->BindParam(":estado",$dados["estado"],PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "Feito";
		}
	}

	#Add Exercicio
	public static function addExercicioModelo($tabela, $dados){

		$stmt=conexao::conectar()->Prepare("INSERT INTO  $tabela(nivel, idAula, questionario, exercicio, tentativas, pontuacao, opcaoCerta, opcao1, opcao2, opcao3, opcao4, ajuda) VALUES(:nivel, :idAula, :questionario, :exercicio, :tentativas, :pontuacao, :opcaoCerta, :opcao1, :opcao2, :opcao3, :opcao4, :ajuda)");

		#BindParam()
		$stmt->BindParam(":nivel",$dados["nivel"],PDO::PARAM_INT);
		$stmt->BindParam(":idAula",$dados["idAula"],PDO::PARAM_INT);
		$stmt->BindParam(":questionario",$dados["questionario"],PDO::PARAM_STR);
		$stmt->BindParam(":exercicio",$dados["exercicio"],PDO::PARAM_STR);
		$stmt->BindParam(":tentativas",$dados["tentativas"],PDO::PARAM_STR);
		$stmt->BindParam(":pontuacao",$dados["pontuacao"],PDO::PARAM_STR);
		$stmt->BindParam(":opcaoCerta",$dados["opcaoCerta"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao1",$dados["opcao1"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao2",$dados["opcao2"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao3",$dados["opcao3"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao4",$dados["opcao4"],PDO::PARAM_STR);
		$stmt->BindParam(":ajuda",$dados["ajuda"],PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "Feito";
		}
	}
	#Update Exercicio
	public static function updateExercicioModelo($tabela, $dados){

		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET nivel =:nivel, idAula =:idAula, questionario =:questionario, exercicio =:exercicio, tentativas =:tentativas, pontuacao =:pontuacao, opcaoCerta =:opcaoCerta, opcao1 =:opcao1, opcao2 =:opcao2, opcao3 =:opcao3, opcao4 =:opcao4, ajuda =:ajuda WHERE id =:id");

		#BindParam()
		$stmt->BindParam(":id",$dados["id"],PDO::PARAM_INT);
		$stmt->BindParam(":nivel",$dados["nivel"],PDO::PARAM_INT);
		$stmt->BindParam(":idAula",$dados["idAula"],PDO::PARAM_INT);
		$stmt->BindParam(":questionario",$dados["questionario"],PDO::PARAM_STR);
		$stmt->BindParam(":exercicio",$dados["exercicio"],PDO::PARAM_STR);
		$stmt->BindParam(":tentativas",$dados["tentativas"],PDO::PARAM_STR);
		$stmt->BindParam(":pontuacao",$dados["pontuacao"],PDO::PARAM_STR);
		$stmt->BindParam(":opcaoCerta",$dados["opcaoCerta"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao1",$dados["opcao1"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao2",$dados["opcao2"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao3",$dados["opcao3"],PDO::PARAM_STR);
		$stmt->BindParam(":opcao4",$dados["opcao4"],PDO::PARAM_STR);
		$stmt->BindParam(":ajuda",$dados["ajuda"],PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "Feito";
		}
	}


	public static function ListarAllDesempenhoAlunosModelo($tabela){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela ORDER BY mediaDesempenho DESC");

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetchAll();
	}

	public static function ListarDesempenhoAlunoIdModelo($tabela,$id){

		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE idUser =:id");
		
		$stmt->BindParam(":id",$id,PDO::PARAM_INT);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetch();
	}

	#Notificacão
	public static function notificarUsuarioModelo($tabela,$dados){

		$stmt=conexao::conectar()->Prepare("INSERT INTO  $tabela(de, para, titulo, notificacao, link, estado) VALUES(:adminId, :userId, :titulo, :notificacao, :link, :estado)");

		#BindParam()
		$stmt->BindParam(":adminId",$dados["idAdmin"],PDO::PARAM_INT);
		$stmt->BindParam(":userId",$dados["idUser"],PDO::PARAM_INT);
		$stmt->BindParam(":titulo",$dados["titulo"],PDO::PARAM_STR);
		$stmt->BindParam(":notificacao",$dados["conteudo"],PDO::PARAM_STR);
		$stmt->BindParam(":link",$dados["link"],PDO::PARAM_STR);
		$stmt->BindParam(":estado",$dados["estado"],PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "Feito";
		}
	}
}