
<div class="<?php echo $_SESSION['UserTema']; ?>">
	<div class="container">
		<div class="row" id="tete">
		
			<div class="col l4 hide-on-med-and-down"></div>

			<div class="col s12 l4">
				<div class="col s12 l12 hide-on-med-and-down" style="padding-top: 20px;padding-left: 0px;padding-right: 0px;">
					<form class="col l12" method="Post" style="padding-left:38px;padding-right:0px;">

						<input class="col  l8 white-text" id="txtPesquisar" type="text" name="PesquisaLoja" minlength="10" maxlength="50" placeholder="Pesquisar..." required>
						<button  class="col  l2" id="btnPesquisar" type="submit" title="Pesquisar" >
							<i class="fa fa-search"></i>
						</button>
					</form>
				</div>
			</div>

			<div class="col l4 hide-on-med-and-down"></div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row" id="L_Row">

		<div class="col l3 hide-on-med-and-down">
			<p></p>
		</div>
		<div class="col s12 l6" style="padding-left: 0;padding-right: 0;">
			<div>
				<ul class="tabs">
		           <li class="tab col s3"><a href="#Livros">Livros</a></li>
		           <li class="tab col s3"><a href="#Artigos">Artigos</a></li>
		           <li class="tab col s3"><a href="#Videos">Videos</a></li>
		      </ul>
			</div>
			<div class="divider" style="margin-top: -1px;"></div>
		</div>
		<div class="col l3 hide-on-med-and-down"></div>
	</div>
	<div class="row">

		<div class="col l2 hide-on-med-and-down"></div>
		<div class="col s12 l8" style="padding-bottom: 50px;">
			<div id="Livros">
		       <?php include "Vista/Paginas/Inside/1_veiws/Loja/Livros.php"; ?>
		    </div>

		    <div id="Artigos">
		    	<?php include "Vista/Paginas/Inside/1_veiws/Loja/Artigos.php"; ?>
		    </div>

		    <div id="Videos">
		    	<?php include "Vista/Paginas/Inside/1_veiws/Loja/Videos.php"; ?>
		    </div>
		</div>
		<div class="col l2 hide-on-med-and-down"></div>
	</div>
</div>
<div id="comprarItemLoja" class="modal" style="width:35%;padding:20px;background-color:#ffffff">
    <a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333">
    	<i class="fa fa-close"></i>
  	</a>
  	<h3 class="title">Loja</h3>
  	<div class="divider"></div>
    <div class="row">
   	    <div id="displayInfoComprarItemLoja" class="col s12 l12" style="padding-top:20px;padding-bottom:20px;">
       		
   	    </div>
    </div>
</div>