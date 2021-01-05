<?php


class modelo{
	
	
	public static function MostrarMenuModel($MenuModel){

		$mostrarMenu=false;
		
		if ($MenuModel=="Aulas_Iniciar" || $MenuModel=="Sair" || $MenuModel=="login" || $MenuModel=="Registro" || $MenuModel=="PrintfHome" || $MenuModel=="loginAdmin" || $MenuModel=="admin") {
			
			#$mostrarMenu="Vista/Paginas/Site/MenuBlog.php";
		}
		else{
			
			$mostrarMenu="Vista/Paginas/Inside/Menu.php";
		}

		return $mostrarMenu;
	}
 
    public static function RequisisaoPaginasModelo($pagina){
		
		#Paginas 
		if($pagina=="Inicio" || $pagina=="Desempenho"){
	  
		   $mostrar="Vista/Paginas/Inside/1_veiws/".$pagina.".php";
		  
		}
		
		#Aulas->Paginas 
		elseif($pagina=="Aulas_Iniciar" || $pagina=="Aulas_Programa"){
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Aulas/".$pagina.".php";
			
		}
		#Loja
		elseif($pagina=="Loja"){
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Loja/".$pagina.".php";
		}
		#Multimidia
		elseif ($pagina=="m_Livros" || $pagina=="m_Artigos" || $pagina=="m_Videos") {
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Multimidia/".$pagina.".php";
		}
		#Definicões->Paginas
		elseif($pagina=="Defi_Ajuda" || $pagina=="Defi_Sobre" ){
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Definicoes/".$pagina.".php";
		}
		#Suporte->Paginas
		elseif($pagina=="Suport_Blog" || $pagina=="Suport_Chat"){
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Suporte/".$pagina.".php";
		}
		#Perfil do Usuário
		elseif ($pagina=="Perfil_Usuario") {
			$mostrar="Vista/Paginas/Inside/1_veiws/Perfil/".$pagina.".php";
		}
		#Sair->Sair do Inside
		elseif($pagina=="Sair"){
			
			$mostrar="Vista/Paginas/Site/PrintfHome.php";
			
		}
		elseif ($pagina=="PrintfHome" || $pagina=="login" || $pagina=="Registro") {
			$mostrar="Vista/Paginas/Site/".$pagina.".php";
		}
		#Admin
		elseif ($pagina=="loginAdmin") {

			$mostrar="Vista/Paginas/Admin/".$pagina.".php";
		}
		elseif ($pagina=="admin") {

			$mostrar="Vista/Paginas/Admin/HomeContainer.php";
		}
		elseif($pagina=="index"){
			
			$mostrar="Vista/Paginas/Inside/1_veiws/Inicio.php";
			
		}else{
			
			$mostrar="Vista/Paginas/Inside/1_veiws/404.php";
		}
		
		return $mostrar;	
    }
}