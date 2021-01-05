

<div class="InicioConteiner <?php echo $_SESSION['UserTema']; ?>">
	<div class="container">
		<div class="row" id="rowStartAulaTarefaInfo">
			<div class="col s12 l3"></div>
			 	<div class="col s12 l6" style="padding:0px;">
			 		<h3 class="AulaTarefaInfo" style="font-size:16pt;">Nível 1</h3>
					<h3 class="center nivelTitulo">Lógica de Programação</h3>
				</div>
			<div class="col s12 l3"></div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row" style="margin-top:-10px;">
		<div class="col l2 hide-on-med-and-down"></div>
		<div class="col s12 l8 center">
			<div class="col l3 hide-on-med-and-down"></div>
			<div class="col s12 12 l6">
				<div>
					<?php
						aulas::tabsLinkActive();
					?>
				</div>
				<div class="divider" style="margin-top: -1px;"></div>
			</div>
			<div class="col l3 hide-on-med-and-down"></div>
			<div class="col s12 l12" id="aulas">
				<?php
					aulas::infoAula();
				?>
			</div>
			<div class="col l12" id="exercicios">
				<?php
					aulas::infoExercicios();
				?>
			</div>
			<div class="col l12" id="provas">
				<?php
					aulas::infoProvas();
				?>
			</div>
		</div>
		<div class="col l2 hide-on-med-and-down"></div>
	</div>
</div>
	
	