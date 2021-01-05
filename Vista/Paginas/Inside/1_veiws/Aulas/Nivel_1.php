<style type="text/css">
	#Nivel_1{

		margin-top: 50px;
		padding-bottom: 50px;
	}
	.NivelTema{
		font-weight: 300;
		font-size: 20pt;
		margin-top: 25px;
		padding-bottom: 0;
		text-align: center;
	}
	#tabelaConteudoNivel{

		margin-top: 10px;
	    border: 1px solid #ddd;
	}
	th{
		/*color:white;*/
		font-weight: 400;
		text-align: center;
	}
	td{
		padding-left: 0px;
		text-align: center;
	}
	/*------------Inside Table-----------------*/
	#aulaVista{

		color: #0277bd;
		cursor: pointer;
	}
	/*----------------------------------------*/
	#InfoNota{
		background-color: rgba(2, 119, 189,0.5);
		border-left: 5px solid #0277bd;
		color:#f1f1;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-right: 10px;
	}
	.InfoSpan{
		font-size: 9pt;
	}
	#Resumo{

		margin-top: 50px;
	}
</style>

<div class="row" id="Nivel_1">
	<div class="col l1"></div>
	<div class="col s12 l7">
		<h3  class="NivelTema">Lógica de Programação</h3>
		<table class="bordered responsive-table" id="tabelaConteudoNivel">
	        <thead id="hederTable">
	          <tr>
	              <th>Aula Nº</th>
	              <th>Tema</th>
	              <th>Atividades</th>
	              <th>Estado</th>
	          </tr>
	        </thead>

	        <tbody>

	        	<?php
					$programaAulas = new controller();
					$programaAulas->ListarProgramaAulasController();	
	        	?>
	        </tbody>
        </table>
        
        <div id="Resumo">
        	<h3  class="NivelTema">Detalhes</h3>
        	<table class="bordered responsive-table" id="tabelaConteudoNivel">
		        <thead id="hederTable">
		          <tr>
		              <th>Nível</th>
		              <th>Aulas</th>
		              <th>Atividades</th>
		              <th>Avaliações</th>
		              <th>Provas</th>
		          </tr>
		        </thead>

		        <tbody>

		        	<?php
						$resumoPrograma = new controller();
						$resumoPrograma->ListarResumoProgramaAulasController();	
		        	?>
		        </tbody>
            </table>
        </div>
	</div>
	<div class="col l3">
		<div style="margin-top: 70px;">
        	<p id="InfoNota">
        	*Atividades:<span class="InfoSpan">
        	O Printf da-lhe a oportunidade de contribuir para o crescimento do projeto. Envie-nos as suas críticas, elogios ou sugestões e seja um colaborador.	
        	</span>
        	<br><br>*Avaliações:<span class="InfoSpan">
        	As avaliações serão feita duas vezes em cada duas aulas, ou seja, depois de duas aulas.	
        	</span>
        	<br><br>*Provas:<span class="InfoSpan">
        	As provas serão feitas em cada três aulas.	
        	</span>
        	</p>
        </div>
	</div>
	<div class="col l1"></div>
</div>