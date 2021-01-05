
<div class="col l12 white" style="box-shadow:0 0 10px rgba(175,175,175,.23);">
	<h3 id="aulaTitulo" class="title">Aulas</h3>
	<div class="divider" style="margin-top: -10px;"></div>
	<div id="AulaTabsContainer" class="col s12 l12" style="padding:0px;">
		<div class="col l4">
			<ul class="tabs">
				<li class="tab col s3"><a class="active" href="#adminAulas">Programa</a></li>
				<li class="tab col s3"><a class="" href="#adminExercicios">Exercicios</a></li>
				<li class="tab col s3"><a class="" href="#adminProvas">Provas</a></li>
			</ul>
		</div>
		<div class="col l8"></div>
	</div>
	<div class="col s12 l12" style="margin-top:20px;">


		<div id="adminAulas">
			<table class="bordered responsive-table" id="tabelaConteudoAula">
		        <thead id="hederTable">
		          <tr>
		              <th>Aula Nº</th>
		              <th>Tema</th>
		              <th>Resumo</th>
		              <th>Ação</th>
		          </tr>
		        </thead>

		        <tbody>
		        	<?php
						adminController::ListarProgramaAulas();	
		        	?>
		        </tbody>
            </table>
            <form id="frmEditAula" method="Post" class="col l12" style="padding-top:20px;padding-left:0px;">
            	<div class="col s12 l12" id="displayEditAulas">
            		<!--Ajax-->
            	</div>
            </form>
            <form  id="frmAddAula" method="Post" class="col l12" style="padding-top:0px;padding-left:0px;">
            	<div class="col s12 l12" id="displayAddAulas" style="margin-top:-20px;margin-left:-30px;">
            		<!--Ajax-->
            	</div>
            </form>
            <div class="left" style="padding-top: 20px;padding-bottom:20px;">
            	<div id="btnAddAulasContainer"><a title="Adicionar nova aula" class="btn btnAddAulas" onclick="addNovaAulaForm()">Nova Aula</a></div>
            </div>
		</div>

		<div class="col s12 l12">
			<!--Exercicios-->
			<div id="adminExercicios">
				<div id="adminExerciciosAllContainers">
					<?php
						adminController::ListarAllExercicios();
					?>
					<div class="left" style="padding-top: 20px;padding-bottom:20px;">
		            	<div id="btnAddAulasContainer">
		            		<a title="Adicionar novo exercicio" class="btn btnAddAulas"  onclick="addNovoExercicioForm()">Novo Exercício</a>
		            	</div>
		            </div>
				</div>
				<form  id="frmAddExercicio" method="Post" class="col l12" style="padding-top:0px;padding-left:0px;">
	            	<div class="col s12 l12" id="displayAddExercicio" style="margin-left:-40px;">
	            		<!--Ajax-->
	            	</div>
            	</form>
            	<form  id="frmEditExercicio" method="Post" class="col l12" style="padding-top:0px;padding-left:0px;">
	            	<div class="col s12 l12" id="displayEditExercicio" style="margin-left:-40px;">
	            		<!--Ajax-->
	            	</div>
            	</form>
			</div>
			<!--Provas-->
			<div id="adminProvas">
				PPp
			</div>
		</div>
	</div>
</div>