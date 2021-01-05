
 <div class="col s12 l6" style="padding-left:0px;">
    <div class="col s12 l12" style="padding-right:0px;">
    	<div class="col s12 l6" style="padding-left:0px;">
    		  <label>Nível</label>
			  <select onchange="selectNumeroAulaNivel()" id="addExercicioNivel" class="browser-default">
			    <option value="Selecione" selected>Selecione</option>
			    <option value="1">1</option>
			  </select>
    	</div>
    	<div class="col s12 l6" style="padding-right:0px;">
    		<label>Aula Nº</label>
			  <select id="addExercicioAula" class="browser-default">
			   
			  </select>
    	</div>
    </div>
    <div class="col s12 l12" style="padding-top: 10px;">
        <label>Questionário</label>
        <textarea id="addExercicioQuestionario" class="materialize-textarea custom" placeholder="Um breve introdução ao Exercício" required></textarea>
    </div>
    <div class="col s12 l12">
    	<label>Ajuda</label>
    	<textarea id="addExercicioAjuda" class="materialize-textarea custom" placeholder="Uma dica que ajude o usúario a resolver o exercício" required></textarea>
    </div>
    <div class="col s12 l6">
        <label>Tentativas</label>
        <input class="inputsEdit" type="number" id="addExercicioTentativas" required value="1">
    </div>
    <div class="col s12 l6">
        <label>Pontuação</label>
        <input class="inputsEdit" type="number" id="addExercicioPontuacao" required value="1">
    </div>
</div>
<div class="col s12 l6">
	<div class="col l12">
        <label>Exercício(Questão)</label>
        <textarea id="addExercicioQuestao" class="materialize-textarea custom" required></textarea>
    </div>
    <div class="col s12 l6" style="padding-right:0px;">
        <label>Opção Certa</label>
          <select id="addExercicioOpcao0" class="browser-default">
                <option value="Selecione" selected>Selecione</option>
                <option value="opcao1">Opção 1</option>
                <option value="opcao2">Opção 2</option>
                <option value="opcao3">Opção 3</option>
                <option value="opcao4">Opção 4</option>
          </select>
    </div>
	<div class="col s12 l6">
		<label>Opção 1</label>
    	<input class="inputsEdit" type="text" id="addExercicioOpcao1" required>
	</div>
	<div class="col s12 l6">
    	<label>Opção 2</label>
    	<input class="inputsEdit" type="text" id="addExercicioOpcao2" required>
    </div>
    <div class="col s12 l6">
    	<label>Opção 3</label>
    	<input class="inputsEdit" type="text" id="addExercicioOpcao3" required>
    </div>
    <div class="col s12 l6">
    	<label>Opção 4</label>
    	<input class="inputsEdit" type="text" id="addExercicioOpcao4" required>
    </div>
</div>
    <div class="col s12 l12" style="padding:10px;">
    <button class="btn btnAddAulas" type="submit">Adicionar</button>
</div>