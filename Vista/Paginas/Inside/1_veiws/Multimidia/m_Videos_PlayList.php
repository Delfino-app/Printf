
<div id="meusvideos" class="white" style="margin-top:25px;">
	<ul class="collapsible" id="ListaPlay" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header waves-effect info active" title="Exibir/Ocultar Lista">Meus Videos</div>
	      <div class="collapsible-body">
	      		<?php
	      			$Videos->ExibirVideosCortesiaController();
	      			$Videos->ExibirVideosCompradosController();
	            ?>
	            <div class="divider"></div>
	            <p class="center" id="irLoja"><a href="Loja#Videos"><i title="Comprar videos" id="AddLojaIcon" class="fa fa-shopping-cart"></i></a></p>
	      </div>
	    </li>
    </ul>
</div>