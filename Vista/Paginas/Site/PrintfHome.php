
<?php
	
	
			
	if (isset($_SESSION["login"])) {
	   
	   session_destroy();
    }
	
?>
<div class="container">
	<div class="row" style="margin-top: 70px;">
		<div class="col s12 l12">
			<h3 class="col s12 l12" style="text-align: center;">
				<?php #include "Vista/Paginas/logoIcon.php"; ?>
			</h3>
			
			<div class="col s12 l4 hide-on-med-and-down"></div>
			
			<div class="col s12 l4">
				<div class="col l1 hide-on-med-and-down"></div>
				<div class="col s12 l10 white" id="ConatinerLoginRegistro">
					<div>
						<ul class="tabs">
							<li class="tab col s3"><a class="active" href="#login">Entrar</a></li>
	        				<li class="tab col s3"><a  href="#registro">Criar Conta</a></li>
						</ul>
						<div class="divider"></div>
					</div>
					<div  id="login">
						<?php include "Vista/Paginas/Site/login.php" ?>
					</div>
					<div  id="registro">
						<?php include "Vista/Paginas/Site/Registro.php" ?>
					</div>
				</div>
				<div class="col l1 hide-on-med-and-down"></div>
			</div>
			
			<div class="col s12 l4 hide-on-med-and-down"></div>
		</div>
	</div>
</div>

