
<?php

	$Livros= new multimidiacontroller();
?>
<div class="container">

	<div class="row" id="m_livros">
		<div class="col  s12 l2 hide-on-small-only white" style="padding-top: 0;border: 1px solid #d1d1d1;">
			<div>
				<h3 class="titulos" id="Livros">Livros</h3>
				<div class="divider"></div>
				<div  class="col l12" style="margin-top: 10px;padding-bottom: 10px;">
					<div class="col l2"></div>
					<div class="col l8" style="padding-left: 0;">
						<?php
				      		
							$Livros->ExibirLivrosCortesiaController();

							$Livros->ExibirLivrosCompradosController();
				        ?>
					</div>
					<div class="col l2"></div>
				</div>
				<div class="divider"></div>
				<p class="col s12 l12" id="irLoja">
					<a href="Loja#Livros">
						<i title="Comprar livros" id="AddLojaIcon" class="fa fa-cart-plus"></i>
					</a>
				</p>
			</div>
		</div>

		<?php

			$Livros->ExibirLivrosReaderController(1);
		?>
	</div>
	
</div>