
<?php

    if(!isset($_SESSION["login"])){

    	session_destroy();

       header("location:PrintfHome");
    }    
   
    $userInfo= new userInfo();
	$notfi= new notificacoes();
    
?>
<nav class="MenuInside  <?php echo $_SESSION['UserTema']; ?>">

  <div class="container">

		<div class="nav-wrapper ">
			
			<!--Logo Icon-->
			<?php include "Vista/Paginas/logoIcon.php"; ?>
			
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
			
			<ul class="right hide-on-med-and-down">

			    <li>
			    	<a  href="Inicio"></i> Inicio</a>
			    <li>

				<li>
					<a class="dropdown-button" data-activates="dropAulas" id="Aulas" href="#">Aulas<i class="Menu fa fa-angle-down"></i></a>
				</li>

				<li>
					<a href="Desempenho">Desempenho<i class="Menu fa fa-line-chart"></i></a>
				</li>

				<li>
					<a class="modal-trigger" href="#modal1">Notificações <?php $notfi->VerificarExistenciaNotificacoes(); ?></a>
				</li>

				<li>
					<a class="dropdown-button" data-activates="dropMulti" id="Aulas" href="#">Multimédia<i class="Menu fa fa-angle-down"></i></a>
				</li>

				<li>
					<a href="Loja">Loja<i class="Menu fa fa-shopping-cart"></i></a>
				</li>

				<li>
					<a class="dropdown-button" data-activates="dropSuporte" href="#">Suporte<i class="Menu fa fa-angle-down"></i></a>
				</li>

				<li>
					<a href="#" class="dropdown-button" data-activates="dropUsuario" id="User">
						<img <?php $userInfo->UserImagem();   ?> alt="Contact Person">
						<?php 
							$userInfo->PrimeiroNomeUser();
							echo ''; 
						?>
						<i class="Menu fa fa-angle-down"></i>
					 </a>
				</li>
			</ul>
	
			<!--Dropdown Conteudos-->
			<ul id="dropAulas" class="Menu dropdown-content" style="width:100px;">
			    <li>
			   		<a href="Aulas_Iniciar">Iniciar <i class="Menu fa fa-edit"></i></a>
			   	</li>

			    <li>
			   		<a href="Aulas_Programa">Programa <i class="Menu fa fa-tags"></i></a>
			    </li>
			</ul>

			<ul id="dropMulti" class="Menu dropdown-content" style="width:100px;">
			    <li>
			   		<a href="m_Livros">Livros<i class="Menu fa fa-book"></i></a>
			   	</li>

			    <li>
			   		<a href="m_Artigos">Artigos<i class="Menu fa fa-file-text"></i></a>
			   	</li>

			    <li>
			   		<a href="m_Videos">Videos<i class="Menu fa fa-play"></i></a>
			   	</li>
			</ul>
				
			<ul id="dropSuporte" class="Menu dropdown-content">
				<li>
					<a href="#chat" class="modal-trigger">Chat <i class="Menu fa fa-comments-o"></i></a>
				</li>

				

				<!--
				<li class="divider"></li>
				<li>
					<a href="Defi_Ajuda">Ajuda <i class="Menu fa fa-question-circle"></i></a>
				</li>

				<li>
					<a href="Defi_Sobre">Sobre <i class="Menu fa fa-info-circle"></i></a>
				</li>-->
			</ul>
			
			<ul id="dropUsuario" class="Menu dropdown-content">
				<li>
					<a href="Perfil_Usuario">Perfil<i class="Menu fa fa-user"></i></a>
				</li>

				<li class="divider"></li>

				<li>
					<a href="Sair">Sair<i class="Menu fa fa-sign-out"></i></a>
				</li>
			</ul>

			<!--Menu Mobile-->

			<?php 

				include "Vista/Paginas/Inside/MenuMobile.php"; 
			?>
		</div>
	<div>
</nav>

<?php 
include "Vista/Paginas/Inside/1_veiws/Suporte/Suport_Chat.php"; 

include "Vista/Paginas/Inside/1_veiws/Notificacoes.php";
include "Vista/Paginas/Inside/1_veiws/ResolverExercicio.php"; 
  

