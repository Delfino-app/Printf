
<?php

 class adminController{

 	public function RequisisaoPaginasAdmin(){

 		$pagina=false;

 		if (isset($_GET['in'])) {
 			
 			$pagina=$_GET['in'];
 		}
 		else{

 			$pagina="alunos";
 		}

 		$Retorno=adminModelo::RequisisaoPaginasAdminModelo($pagina);
			
		if($Retorno!=""){
			
			if ($Retorno=="logout") {
				 
				#Terminar Sessão
				header("location:loginAdmin");

			}else{

				include $Retorno;
			}
		}
 	}

 	public function loginAdmin(){

 		if (isset($_POST["emailIngressoAdmin"])) {
 			
 			
			$encriptarSenhaLogin = crypt($_POST["passwordIngressoAdmin"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$dadosLogin= array('email' =>$_POST["emailIngressoAdmin"] , 'senha'=>$encriptarSenhaLogin);

			$logar=adminModelo::LoginAdmin($dadosLogin['email'],"admin");

			if ($logar["email"]==$_POST["emailIngressoAdmin"] && $logar["senha"]==$encriptarSenhaLogin) {
				
				session_start();
				$_SESSION["loginMaster"]=true;
				$_SESSION['idMaster']=$logar["id"];
				$_SESSION["PrimeiroNomeMaster"]=$logar["primeiroNome"];
				$_SESSION["UltimoNomeMaster"]=$logar["ultimoNome"];
				$_SESSION["UserEmailMaster"]=$logar["email"];
				$_SESSION["UserSenhaMaster"]=$logar["senha"];
				$_SESSION["UserImgMaster"]=$logar["img"]; 

				header("location:admin");
			}
			else{

				unset($_SESSION["loginMaster"]);
				unset($_SESSION["idMaster"]);
				header("location:index.php?pg=loginAdmin&loginInfo=Erro#login");
			}
 		}
 	}

 	public static function ListarProgramaAulas(){

        $resposta= adminModelo::ListarAllDadosTabela("aulas");

        #Converção da variavel resposta em uma coluna
        foreach ($resposta as $row => $item) {
        	echo'
            	<tr>
	                <td>'.$item["id"].'</td>
	                <td>'.$item["tema"].'</td>
	                <td>'.$item["resumo"].'</td>
	                <td>
	                	<p>
		                	<a class="accaoTabela" id="ver" onclik=""><i class="fa fa-bars iconTabela"></i></a>
		                </p>
	                </td>
	                <td style="padding-left:3px">
	                	<a class="accaoTabela" id="editar" onclick="editAula('.$item["id"].')" href="#"><i class="fa fa-edit iconTabela"></i></a>    
	                </td>
	                <td style="padding-left:3px">
	                	<a class="accaoTabela" id="eliminar" onclik=""><i class="fa fa-trash iconTabela"></i></a>    
	                </td>
	            </tr>
            ';
        }
    }

    public static function ListarAllExercicios(){

    	$listaExercicios = adminModelo::ListarAllDadosTabela("exercicio");

    	if (!empty($listaExercicios)) {
    		
    		echo '<table class="bordered responsive-table" id="tabelaConteudoExercicios">
			        <thead id="hederTable">
			          <tr>
			              <th>Aula Nº</th>
			              <th>Exercicio</th>
			              <th>Pontuação</th>
			              <th>Data publicação</th>
			              <th>Ação</th>
			          </tr>
			        </thead>
			        <tbody>';

			$pontuacao = false;

    		foreach ($listaExercicios as $row => $value) {

    			$pontuacao = '<span class="pontosBtc" title="Pontuação">
						'.$value["pontuacao"].' 
						<i class="fa fa-btc"></i>
					</span>';
    			
    			echo '<tr>
		                <td>'.$value["idAula"].'</td>
		                <td>'.$value["exercicio"].'</td>
		                <td>'.$pontuacao.'</td>
		                <td>'.$value["data"].'</td>
		                <td>
		                	<p>
			                	<a class="accaoTabela" id="ver" onclik=""><i class="fa fa-bars iconTabela"></i></a>
			                </p>
		                </td>
		                <td style="padding-left:3px">
		                	<a class="accaoTabela" id="editar" onclick="editExercicio('.$value["id"].')" href="#"><i class="fa fa-edit iconTabela"></i></a>    
		                </td>
		                <td style="padding-left:3px">
		                	<a class="accaoTabela" id="eliminar" onclik=""><i class="fa fa-trash iconTabela"></i></a>    
		                </td>
		            </tr>';
    		}

    		echo ' </tbody>
	            </table>';
    	}
    	else{

    		echo '<h3 class="title" style="font-size:16pt;">Lista Vazia</h3>';
    	}
    }


    public static function ListarAllAlunos(){

    	$dadosDesempenho=adminModelo::ListarAllDesempenhoAlunosModelo("desempenho");

    	if (!empty($dadosDesempenho)) {

    		echo '
    			<table class="bordered responsive-table" id="tabelaConteudoNivel">
			        <thead id="hederTable">
			          <tr>
			              <th>Foto</th>
			              <th>Nome</th>
			              <th>Nível</th>
			              <th>Aula actual</th>
			              <th>Média desempenho</th>
			              <th>Pontuação</th>
			              <th>Posição Raking</th>
			              <th>Açção</th>
			          </tr>
			        </thead>
		        	<tbody>
		    ';

    		$posicaoRaking = 0;
			$mediaDesempenho = false;
    		
    		foreach ($dadosDesempenho as $key => $item) {

    			

    			$alunos = adminModelo::ListarAllDdadosId("usuarios", $item["idUser"]);
    			
    			if (!empty($alunos)) {

    				$srcImgPerfil = 'src="Vista/Imagens/upload/UserPerfil/'.$alunos["img"].'"';
    				
    				$posicaoRaking +=1;

		 			$pontuacao = '<span class="pontosBtc" title="Pontuação">
						'.$item["pontuacao"].' 
						<i class="fa fa-btc"></i>
					</span>';


			 		if ($item["mediaDesempenho"] > 44) {
						
						$mediaDesempenho = '
							<span id="MediaDesempenhoUser" title="Média do desempenho" style="float:none;">
			   				<i class="raking StatisticaMedia fa fa-level-up"></i>'.$item["mediaDesempenho"].' %
				   			</span>
						';
					}
					#Caso o nível de desempenho seja menor que 45
					else{

						$mediaDesempenho = '
							<span id="MediaDesempenhoUser" title="Média do desempenho" style="float:none;">
				   				<i class="raking StatisticaBaixo fa fa-level-down"></i>'.$item["mediaDesempenho"].' %
				   			</span>
						';
					}

	    			echo'
		            	<tr>
			                <td><img class="userImgAlunos" '.$srcImgPerfil.'></td>
			                <td>'.$alunos["primeiroNome"].' '.$alunos["ultimoNome"].'</td>
			                <td>'.$alunos["nivel"].'</td>
			                <td>'.$alunos["aula_atual"].'</td>
			                <td>'.$mediaDesempenho.'</td>
			                <td>'.$pontuacao.'</td>
			                <td>'.$posicaoRaking.' ª </td>
			                <td>
				                <a class="accaoTabelaAlunos" id="detalhes" onclick=""><i class="fa fa-bars iconTabelaAlunos"></i></a>

				                <a class="accaoTabelaAlunos modal-trigger" id="notificar" onclick="notificarAluno('.$alunos["id"].')" href="#notificarAluno"><i class="fa fa-bell iconTabelaAlunos"></i></a>
				   
				               <a class="accaoTabelaAlunos" id="enviarSms" onclick=""><i class="fa fa-comments iconTabelaAlunos"></i></a>

				                <a class="accaoTabelaAlunos" id="definicoes" onclick=""><i class="fa fa-cog iconTabelaAlunos"></i></a>
			                </td>
			            </tr>
	            	';
    			}
    		}

    		echo '
    			</tbody>
            </table>
    		';
    	}
    	else{

    		echo '<h3 class="title" style="font-size:16pt;">Lista Vazia</h3>';
    	}
    }
}

