
<?php

	$userInfo= new userInfo();
?>
<div class="side-nav <?php echo $_SESSION['UserTema']; ?>" id="mobile-demo">
	<div style="border-bottom: 1px solid #d1d1d1;">
		<p style="text-align: center;">
			<img id="userImgMenuMobile" <?php $userInfo->UserImagem();   ?> alt="Contact Person">
		</p>
		<p class="center" id="containerNameUser">	    
		   <?php 
			    
				$userInfo->NomeCompletoUser();
	        ?>
	        <br>
	        <button class="btnLinkRapido">
				<a href="Inicio">
					<i class="fa fa-home" style="font-size: 14pt;"></i>
				</a>
			</button>
			<button class="btnLinkRapido">
				<a class="modal-trigger" href="#modal1">
					<i class="fa fa-bell-slash-o" style="font-size: 14pt;"></i>
				</a>
			</button>
			<button class="btnLinkRapido">
				<a onclick="displayChat()" href="#">
					<i class="fa  fa-comments" style="font-size: 14pt;"></i>
				</a>
			</button>
			<button class="btnLinkRapido">
				<a href="Perfil_Usuario">
					<i class="fa fa-user" style="font-size: 14pt;"></i>
				</a>
			</button>
		</p>
	</div>

	<ul class="collapsible"  data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header waves-effect <?php echo $_SESSION['UserTema']; ?>">
		      	Aulas <i class="fa fa-angle-down"></i>
	      </div>
	      <div class="collapsible-body <?php echo $_SESSION['UserTema']; ?>">
	      	<a class="LinkCollapsiBody"  href="#">Iniciar</a>
	      	<a class="LinkCollapsiBody"  href="#">Programa de aulas</a>
	      </div>
	    </li>
    </ul>	

    <ul style="padding-left: 5px;">
		<li>
			<a class="MenuLinks waves-effect <?php echo $_SESSION['UserTema']; ?>" href="Desempenho">Desempenho</a>
		</li>
    </ul>

    <ul class="collapsible" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header waves-effect <?php echo $_SESSION['UserTema']; ?>">
		      	Multimédia <i class="fa fa-angle-down"></i>
	      </div>
	      <div class="collapsible-body <?php echo $_SESSION['UserTema']; ?>">
	      		<a class="LinkCollapsiBody"  href="m_Livros">Livros</a>
	      		<a class="LinkCollapsiBody"  href="m_Artigos">Artigos</a>
	      		<a class="LinkCollapsiBody"  href="m_Videos">Videos</a>
	      		<a class="LinkCollapsiBody"  href="m_Outros">Outros</a>
	      </div>
	    </li>
    </ul>

    <ul style="padding-left: 5px;">
		<li>
			<a class="MenuLinks waves-effect <?php echo $_SESSION['UserTema']; ?>" href="Loja">Loja</a>
		</li>
    </ul>

    <ul class="collapsible" data-collapsible="accordion">
	    <li>
	        <div class="collapsible-header waves-effect <?php echo $_SESSION['UserTema']; ?>">
		      	Suporte <i class="fa fa-angle-down"></i>
	        </div>
	        <div class="collapsible-body <?php echo $_SESSION['UserTema']; ?>">
	      		<a class="LinkCollapsiBody"  href="Defi_Ajuda">Ajuda</a>
	      		<a class="LinkCollapsiBody"  href="Defi_Sobre">Sobre</a>
	        </div>
	    </li>
    </ul>
    <ul style="padding-left: 5px;">
		<li>
			<a class="MenuLinks waves-effect <?php echo $_SESSION['UserTema']; ?>" href="Sair">Sair</a>
		</li>
    </ul>
    <footer class="page-footer <?php echo $_SESSION['UserTema']; ?>" style="margin-top:52px;">
    	<div class="footer-copyright">
		    <div class="container center-align">
		     Printf &copy; 2018 - <?php echo date("Y");?>
		    </div>
	    </div>
    </footer>
</div>
