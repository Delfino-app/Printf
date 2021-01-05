

<?php


class dados{

	public static function RegistroModel($tabela,$dados){

		#Prepare()

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(primeiroNome, ultimoNome, email, senha, img, tema, nivel, aula_atual, total_aula) VALUES(:nome, :ultimoNome, :email, :senha, 'default.jpg', 'blue-gray darken 3', 1, 1, 4)");

		#BindParam()

		$stmt->BindParam(":nome",$dados['nome'],PDO::PARAM_STR);
		$stmt->BindParam(":ultimoNome",$dados['sobrenome'],PDO::PARAM_STR);
		$stmt->BindParam(":email",$dados['email'],PDO::PARAM_STR);
		$stmt->BindParam(":senha",$dados['senha'],PDO::PARAM_STR);


		#execute()s
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }
	}
	#Registar o Usuário na tabela Desempenho
	public static function RegistroUserDesempenhoModel($id,$tabela){

		#Prepare()

		$stmt=conexao::conectar()->Prepare("INSERT INTO $tabela(idUser, classificacaoGeral, posicaoRakingo, assistenciaAulas, participacoesAulas, resolucaoTarefas, avaliacoesProvas, mediaDesempenho, pontuacao) VALUES (:idUser,0,0,0,0,0,0,0,0)");

		#BindParam()

		$stmt->BindParam(":idUser",$id,PDO::PARAM_STR);

		#execute()
	    if ($stmt->execute()) {
	    	
	    	return "Feito";
	    }   
	}
	public static function LoginModel($dadosLogin,$tabela){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("SELECT * FROM $tabela WHERE email= :Email");

		#BindParam()
		$stmt->BindParam(":Email",$dadosLogin["email"],PDO::PARAM_STR);

		#execute()
		$stmt->execute();

		#fetch()
		return $stmt->fetch();
	}

	public static function UploadImgModel($arquivo,$tabela){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET img=:arquivo WHERE id=:idlog ");

		#BindParam()
		$stmt->BindParam(":arquivo",$arquivo["img"],PDO::PARAM_STR);
		$stmt->BindParam(":idlog",$arquivo["id"],PDO::PARAM_INT);

		#execute()
		if ($stmt->execute()) {
			
			return "Imagem Atualizada";
		}
	}

	#Upadte de dados de registro do User
	public static function UpdateAllDadosRegistroModel($dados,$tabela){

		#Prepare()
		$stmt=conexao::conectar()->Prepare("UPDATE $tabela SET primeiroNome=:EditPrimeiroNome,
											ultimoNome=:EditUltimoNome, email=:EditEmail, 
											senha=:EditSenha WHERE id=:Idlog");
		#BindParam()
		$stmt->BindParam(":EditPrimeiroNome",$dados["primeiroNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":EditUltimoNome",$dados["ultimoNomeEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":EditEmail",$dados["emailEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":EditSenha",$dados["senhaEdit"],PDO::PARAM_STR);
		$stmt->BindParam(":Idlog",$dados["id"],PDO::PARAM_INT);
		

		#execute()
		if ($stmt->execute()) {
			
			return "Feito";
		}
	}

	#Validar Email 

	public static function ValidarEmailModel($dados,$tabela){

		$stmt = conexao::conectar()->prepare("SELECT email FROM $tabela WHERE email = :email");
		$stmt->BindParam(":email", $dados, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();
	}

	public static function ListarProgramaAulasModel($tabela){

		#prepare()
        $stmt=conexao::conectar()->prepare("SELECT * FROM $tabela");

        #execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetchAll(); 
	}
	public static function notificacoesPendenteUser($tabela, $id){

		#prepare()
        $stmt=conexao::conectar()->prepare("SELECT * FROM $tabela WHERE para =:idUser and estado =:estado");

        $estado = "pendente";

        $stmt->BindParam(":idUser", $id, PDO::PARAM_INT);	
        $stmt->BindParam(":estado", $estado, PDO::PARAM_STR);

        #execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetchAll(); 
	}
	public static function notificacoesUser($tabela, $id){

		#prepare()
        $stmt=conexao::conectar()->prepare("SELECT * FROM $tabela WHERE para =:idUser ORDER BY estado DESC, data DESC");

        $stmt->BindParam(":idUser", $id, PDO::PARAM_INT);	

        #execute()
        $stmt->execute();

        #fetchAll()
        #O fetchAll(), obtem todos os conjundo de dados associados ao objeto PDOStatement, ou seja apresenta todos os dados que estão numa tabela.
        return $stmt->fetchAll(); 
	}

	public static function notificarUserModelo($tabela,$idUser,$titulo,$link){

		$stmt=conexao::conectar()->Prepare("INSERT INTO  $tabela(de, para, titulo, link, estado) VALUES('1', :userId, :titulo, :link, 'pendente')");

		#BindParam()
		$stmt->BindParam(":userId",$idUser,PDO::PARAM_INT);
		$stmt->BindParam(":titulo",$titulo,PDO::PARAM_STR);
		$stmt->BindParam(":link",$link,PDO::PARAM_STR);
		#execute()
	    $stmt->execute();  
	}
}