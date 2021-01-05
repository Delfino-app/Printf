
<?php
		
ob_start();#Evitar erro de redirecionamento de página (header)
class controller{
 
 
 
    public function HomePage(){
	 
	   include "Vista/Home.php";
    }
    public function MostrarMenu(){

    	$Menu=false;

    	if (isset($_GET["pg"])) {
    		
    		$Menu=$_GET["pg"];
    	}
    	$RetornoMenu=modelo::MostrarMenuModel($Menu);
    	if ($RetornoMenu!="") {
    		include $RetornoMenu;
    	}
    	
    }
	public function RequisisaoPaginas(){
		
		if(isset($_GET["pg"])){
			
			$pagina=$_GET["pg"];
		}else{
			$pagina="index";
		}
		$Retorno=modelo::RequisisaoPaginasModelo($pagina);
		if($Retorno!=""){
			
			include $Retorno;
		}
	}
	/*-------------------------------------*/
	public function RegistroController(){

		if(isset($_POST["usuarioPrimeiroNomeRegistro"])){

			#preg_match -> comparação de expressões regulares

			if (preg_match('/^[A-Za-z]+$/', $_POST["usuarioPrimeiroNomeRegistro"])&&
				preg_match('/^[A-Za-z]+$/', $_POST["usuarioUltimoNomeRegistro"])&&
				preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}+$/', $_POST["usuarioPasswordRegistro"]) &&
				preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]+$/', $_POST["usuarioEmailRegistro"])) {

				$encriptarSenha = crypt($_POST["usuarioPasswordRegistro"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$dadosRegistro = array(
					'nome' => $_POST["usuarioPrimeiroNomeRegistro"] , 
					'sobrenome' => $_POST["usuarioUltimoNomeRegistro"], 
					'email' => $_POST["usuarioEmailRegistro"], 
					'senha' => $encriptarSenha
				);

				$verificarEmail=dados::ValidarEmailModel($dadosRegistro["email"],"usuarios");
				
				if ($verificarEmail["email"]==$dadosRegistro["email"]) {
					
					header("location:index.php?pg=PrintfHome&registroInfo=ErroEmail#registro");
				}
				else{

					$Registrar=dados::RegistroModel("usuarios",$dadosRegistro);

					if ($Registrar=="Feito") {

						#Inserir Id user na tabela Desempenho
						$dadosUser=dados::LoginModel($dadosRegistro,"usuarios");
						
						$RegistrarD=dados::RegistroUserDesempenhoModel($dadosUser["id"],"desempenho");

						if ($RegistrarD=="Feito") {
							
							header("location:index.php?pg=PrintfHome&loginInfo=ConfimarDados#login");
						}
						else{

							#Caso aconteça algum erro
							header("location:index.php?pg=PrintfHome&registroInfo=Erro#registro");
						}
					}
				}

			}else{

				$cript= crypt("ErroExpressaoRegular",'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				header("location:index.php?pg=PrintfHome&registroInfo=".$cript."#registro");
			}
		}
	}
	public function LoginController(){

		if (isset($_POST["emailIngresso"])) {

			$encriptarSenhaLogin = crypt($_POST["passwordIngresso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$dadosLogin= array('email' =>$_POST["emailIngresso"] , 'senha'=>$encriptarSenhaLogin);

			$logar=dados::LoginModel($dadosLogin,"usuarios");

			if ($logar["email"]==$_POST["emailIngresso"] && $logar["senha"]==$encriptarSenhaLogin) {

				$_SESSION["login"]=true;
				$_SESSION['id']=$logar["id"];
				$_SESSION["PrimeiroNome"]=$logar["primeiroNome"];
				$_SESSION["UltimoNome"]=$logar["ultimoNome"];
				$_SESSION["UserEmail"]=$logar["email"];
				$_SESSION["UserSenha"]=$logar["senha"];
				$_SESSION["UserImg"]=$logar["img"]; 
				$_SESSION["UserTema"]=$logar["tema"]; #Tema do sistema
				$_SESSION["startAula"]=false; #ao iniciar aulas, display Modal

				header("location:Inicio");
			}
			else{

				unset($_SESSION["login"]);
				unset($_SESSION["PrimeiroNome"]);
				header("location:index.php?pg=PrintfHome&loginInfo=Erro#login");
			}	
		}
	}

	public function ListarProgramaAulasController(){

        $resposta= dados::ListarProgramaAulasModel("nivel_1");

        #Converção da variavel resposta em uma coluna
        foreach ($resposta as $row => $item) {
          
            if ($item["Estado"]==true) {
           	 	echo'
	            	<tr>
		                <td>'.$item["AulaN"].'</td>
		                <td>'.$item["Tema"].'</td>
		                <td>'.$item["Exercicios"].'</td>
		                <td><i id="aulaVista" title="Vista" class="fa fa-check-circle"></i></td>
	                </tr>
	            ';
            }
            else{
            	echo'
	            	<tr>
		                <td>'.$item["AulaN"].'</td>
		                <td>'.$item["Tema"].'</td>
		                <td>'.$item["Exercicios"].'</td>
		                <td></td>
		            </tr>
	            ';
            } 
        }
    }
    public function ListarResumoProgramaAulasController(){

    	$resposta= dados::ListarProgramaAulasModel("nivel_1");

    	$contarDados = array( 'TotalAulas'=>0,'TotalAtividades'=>0,
    							'TotalAvaliacoes'=>0,'TotalProvas'=>0);
        #Converção da variavel resposta em uma coluna
        foreach ($resposta as $row => $item) {
          
           $contarDados['TotalAulas']+=1;
           $contarDados['TotalAtividades']+=$item["Exercicios"];
        }
        echo'
	        <tr>
	            <td>1</td> 
	            <td>'.$contarDados["TotalAulas"].'</td>
	            <td>'.$contarDados["TotalAtividades"].'</td>
	            <td>0</td>
	            <td>0</td>
	        </tr>
	    ';    
    } 
}