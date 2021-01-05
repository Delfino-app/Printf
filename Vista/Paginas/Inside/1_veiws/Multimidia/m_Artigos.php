
<?php

	$Artigos= new multimidiacontroller();
?>
<div class="container">

	<div class="row" id="m_artigos">
		<div class="col  s12 l2 hide-on-small-only white" style="padding-top: 0;">
			<div>
				<h3 class="titulos" id="Artigos">Meus Artigos</h3>
				<div class="divider"></div>
				<div  class="col l12" style="margin-top: 10px;padding-bottom: 10px;">
					<div class="col l2"></div>
					<div class="col l8" style="padding-left: 0;">
						<?php
				      		
							$Artigos->ExibirArtigosCortesiaController();
							$Artigos->ExibirArtigosCompradosController();
				        ?>
					</div>
					<div class="col l2"></div>
				</div>
				<div class="divider"></div>
				<p class="col s12 l12" id="irLoja">
					<a href="Loja#Artigos">
						<i title="Comprar artigos" id="AddLojaIcon" class="fa fa-cart-plus"></i>
					</a>
				</p>
			</div>
		</div>
		<div class="col l8" id="ArtigosContainer">
			<iframe  class="col s12 l12" style="border: 2px solid #37474f;" height="700" src="Vista/Files_Pdf/Artigos/artigo1.pdf">
			</iframe>
		</div>
		<div class="col  l2 hide-on-small-only white" style="padding-top: 0;padding-bottom: 20px;">
			<h3 class="titulos" id="Notas">Minhas Anotações</h3>
			<div class="divider"></div>
			<form class="col s12 l12" id="frmAnotacoesArtigos" method="post">
				<textarea id="txtNotas" placeholder="Escreva aqui  as suas anotações.." class="materialize-textarea" name="Anotacoes" legnth="120" required></textarea>
				<input type="submit" value="Salvar" id="btnSalvarAnotacao">
			</form>
		</div>
	</div>
</div>