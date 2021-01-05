
<div class="Videos">
	
	<div class="col l12 hide-on-med-and-down" style="padding-bottom: 20px;">
		<!--#-Exibir Videos por categoria - Vou emplementar mais tarde
		<div class="col l3" style="padding-bottom: 10px;padding-left: 0px;">
			<label>Escola uma categória</label>
              <select id="selectCategoriaVideosValue" class="browser-default" style="cursor: pointer;" onchange="selectCategoriaVideos()">
                <option value="Todos" selected>Todos</option>
                <option value="Entrevistas">Entrevistas</option>
                <option value="Motivação">Motivação</option>
                <option value="Inteligência Artificial">Inteligência Artificial</option>
                <option value="Séries">Séries</option>
              </select>
		</div>-->
		<div class="divider col l12"></div>
	</div>
	<div id="displayVideos">
		<?php

			$exibirVideos = new lojacontroller();
			$exibirVideos->ExibirVideosController();
		?>
	</div>
</div>
