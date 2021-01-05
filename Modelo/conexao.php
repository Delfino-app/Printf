
<?php

class conexao{


	public static function conectar(){



		try{

			$link= new PDO("mysql:host=localhost;dbname=printf","root","");
			 return $link;
			 $link->setAttribute(PDO::ATT_ERRMODE,PDO::ERRMODE_EXCEPTION);
		   
		}
		catch(PDOException $e){

			#echo "Conexão Falhou: ".$e->getMessage();
		}
	}
}