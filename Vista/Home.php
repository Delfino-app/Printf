<!DOCTYPE html>

<html>
    <head>
	   <title>Printf - Sistema Integrado de Ensino de Programação</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/plugins/pace/pace-theme-flash.css" media="screen">
	   <link rel="shortcut icon" href="Vista/Imagens/Logo.png">
	   <!--<link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/summernote.css">-->
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/font-awesome.css">
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/materialize.css">
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/custom.css">
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/animate.css">
	   <link rel="stylesheet" type="text/css" href="1_Outros/Estilo/css/jquery-ui.css">


	</head>
	<body>
		<!--Menu-->
		<div>
			<?php

				#Menu
			  	$Menu= new controller();
			  	$Menu->MostrarMenu();
			?>
		</div>
		<div class="efeito" id="testeDisplay">
			
			<?php 
			  	
				#Conteudo das Páginas
				$paginas= new controller();
				$paginas->RequisisaoPaginas();		
			?>

			<!--<script src="1_Outros/Estilo/plugins/pace/pace.min.js"></script>-->
			<Script src="1_Outros/Estilo/code.jquery.com/3.3.1/jquery.min.js"></script>
			<script src="1_Outros/Estilo/js/jquery-ui.min.js"></script>
			<Script src="1_Outros/Estilo/dist/js/materialize.js"></Script>
			<Script src="1_Outros/Estilo/js/init.js"></Script>
			<Script src="Vista/Paginas/Site/validarRegistro.js"></script>
			<Script src="Controlador/Ajax/costum.js"></script>
			<Script src="Controlador/Ajax/aulasCostum.js"></script>

			<script type="text/javascript">
				
				$('.modal-trigger').leanModal({
			      dismissible: false, // Modal can be dismissed by clicking outside of the modal
			      opacity: .6, // Opacity of modal background
			      in_duration: 300, // Transition in duration
			      out_duration: 200, // Transition out duration
			      starting_top: '4%', // Starting top style attribute
			      ending_top: '10%', // Ending top style attribute
			      ready: function() {}, // Callback for Modal open
			      complete: function() {} // Callback for Modal close
				});  
			</script>
		</div>
	</body>	
</html>