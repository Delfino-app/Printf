
<div class="container" >
  <div class="row" id="RooDesemp">
      <?php
        desempenhoUserController::contarMediaDesempenho();
      ?>
   	<div class="col s12 l2" id="classificacaoGeralContaineir">
 			  <div class="ClassificacaoGeral white">
          <h3 id="ClassGeral" class="center <?php echo $_SESSION['UserTema']; ?>">Classificação Geral</h3>
          <?php
            desempenhoUserController::classificacaoGeral();
          ?>
        </div>

        <div class="Pontuacao white">
            <h3 id="ClassGeral" class="center <?php echo $_SESSION['UserTema']; ?>">Pontuação</h3>
            <?php
              desempenhoUserController::pontuacao();
            ?>
        </div>

        <div class="Detalhes white">
          <h3 id="DetalhesTitulo" class="center <?php echo $_SESSION['UserTema']; ?>">Detalhes</h3>
          <div>
            <?php
                desempenhoUserController::detalhes();
              ?>
          </div>
        </div>
    </div>

   	<div class="col s12  l7" id="userDesempenhoConteiner">
      <div  id="UserDesempenho" class="col l12 white">
        <?php
        
          desempenhoUserController::desempenhoDados();
        ?>
        <div id="PrintfDicas" class="col s12 l12">
          <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active waves-effect" onclick="ChangeIcon()">
                    <span id="dicasPrintfMaster">
                      Dicas Printf Master
                    </span>
                  <span class="waves-effect waves-circle waves-light btn-floating secondary-content" id="Ver_Ocultar_Container"  title="Clique pra ocultar">
                    <span id="Ver_Ocultar_Icon"  style="font-size: 18pt;text-align: center;">-</span>
                  </span>
                </div>
                <div class="collapsible-body">
                  <p class="DesenInfo">
                  De acordo com o desempenho do User, elogiar pelo esforço e dar algumas dicas que ajudarão o User a melhorar o seu desempenho caso seja nescessário e mostras areas especificas onde o User deve prestar mais atenção.
                  </p>
                </div>
              </li>
              </ul>
        </div>

        
        <div id="InfoAdd" class="col s12 l12" style="padding-bottom:10px;">
          <p hidden class="AddInfo"><i class="fa fa-calendar"></i> Última atualização: 00/00/000
              <a href="#" id="AddInfoLink">Critério de avaliação</a>
            </p>
        </div>
      </div>

      <script type="text/javascript">
        
        function ChangeIcon(){

          var x = document.getElementById("Ver_Ocultar_Icon");
          var y = document.getElementById("Ver_Ocultar_Container");

          if (x.innerHTML=="-") {

            x.innerHTML="+";
            y.title="Clique para ver";
          }
          else{

            x.innerHTML="-";
            y.title="Clique para ocultar";
          }
        }

      </script>
   	</div>


   	<div class="col s12 l3" id="rakingUsersContainer">
      <div class="Raking white">
        <h3 id="RakingTitulo" class="center <?php echo $_SESSION['UserTema']; ?>">Raking<b><p id="RakingSubtitulo">Lista de usuários com melhor desempenho</p></h3>
        <div>
          <?php
            desempenhoUserController::rankingLista();
          ?>
        </div>
      </div>
   	</div>

  </div>
</div>