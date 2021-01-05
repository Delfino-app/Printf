
<?php 

	require_once "Controlador/Admin/controlador.php";
	require_once "Modelo/Admin/modelo.php"; 
?>

<div>
	<?php
		include 'autoloadAdmin.php';
		include 'Menu.php';
		#include 'sidNavMenu.php';
	?>
</div>

<div class="container">
	<div class="row" style="margin-top:20px;">
		<div class="col l2" style="padding: 0px;">
			<?php
				include 'sidNavMenu.php';
			?>
		</div>
		<div class="col l10" style="margin-top: 15px;">
			<?php
				$paginas= new adminController();
				$paginas->RequisisaoPaginasAdmin();	
			?>
		</div>
	</div>
</div>
<Script src="1_Outros/Estilo/code.jquery.com/3.3.1/jquery.min.js"></script>
<script src="Controlador/Admin/adminCustom.js"></script>