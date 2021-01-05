
<?php

 class lojacontroller{

 	/*Exibir Livros*/
 	public function ExibirLivrosController(){

 		$Livros=lojamodel::ExibirAllDadosLojaItensModel("m_livros");

 		foreach ($Livros as $row => $itensLivros) {

 			echo '

				<article class="col s12 m3 l3">
			 	    <div class="card">
				        <div class="card-image">
				          <img  src="Vista/Imagens/upload/livros/'.$itensLivros["imglivro"].'">
				          <p id="videoPlayIcon"><span ><i class="fa fa-book"></i></span><span style="padding-left: 10px;font-size: 10pt;">'.$itensLivros["fonte"].'</span></p>
				        </div>
				        <div class="card-content  center" style="padding-left:5px;padding-right:5px;padding-top:10px;">

				          <p class="infoText">
				           '.$itensLivros["tema"].'
				          </p>
				           <div>
				           	 <p id="preco"  class="btc card-title col s12 l12" title="'.$itensLivros["preco"].' Bitcoins">'.$itensLivros["preco"].'<i class="BtcIcon fa fa-btc"></i><br>
						  	 </p>
						  	 <a  onclick="comprarItemLoja(1,'.$itensLivros["id"].')" class="btnComprar modal-trigger" href="#comprarItemLoja" title="Comprar livro">comprar</a>
				           </div>
				        </div>
			        </div> 
				</article>
			';
 		}
 	}


 	/*Exibir Artigos*/
 	public function ExibirArtigosController(){

 		$Artigos=lojamodel::ExibirAllDadosLojaItensModel("m_artigos");

 		foreach ($Artigos as $row => $itensArtigos) {

			echo'

				<article class="col s12 m3 l3">
			 	    <div class="card">
				        <div class="card-image">
				          <img  src="Vista/Imagens/upload/artigos/'.$itensArtigos["imgartigo"].'">
				          <p id="videoPlayIcon"><span ><i class="fa fa-file-text"></i></span><span style="padding-left: 10px;font-size: 10pt;">'.$itensArtigos["fonte"].'</span></p>
				        </div>
				        <div class="card-content  center" style="padding-left:5px;padding-right:5px;padding-top:10px;">

				          <p class="infoText">
				           '.$itensArtigos["tema"].'
				          </p>
				           <div>
				           	 <p id="preco" class="btc card-title col s12 l12" title="'.$itensArtigos["preco"].' Bitcoins">'.$itensArtigos["preco"].'<i class="BtcIcon fa fa-btc"></i><br>
						  	 </p>
						  	 <a  class="btnComprar modal-trigger" href="#comprarItemLoja" onclick="comprarItemLoja(2,'.$itensArtigos["id"].')" title="Comprar artigo">comprar</a>
				           </div>
				        </div>
			        </div> 
				</article>
		    ';

 		}
 	}


 	/*Exibir Videos*/
 	public function ExibirVideosController(){

 		$Videos=lojamodel::ExibirAllDadosLojaItensModel("m_videos");

 		foreach ($Videos as $row => $itensVideo) {

			echo '

				<article class="col s12 m3 l3">
			 	    <div class="card">
				        <div class="card-image">
				          <img  src="Vista/Imagens/upload/videos/'.$itensVideo["imgvideo"].'">
				          <p id="videoPlayIcon"><span id="borderplay"><i class="fa fa-play"></i></span><span style="padding-left: 10px;font-size: 10pt;">'.$itensVideo["duracao"].'</span></p>

				          	<p class="infoText">
				           		'.$itensVideo["tema"].'
				          	</p>
				        </div>
				        <div class="card-content  center"          style="padding-left:5px;padding-right:5px;padding-top:0px;">
				           
			           	 	<p id="preco" class="btc card-title col s12 l12" title="'.$itensVideo["preco"].' Bitcoins">'.$itensVideo["preco"].'<i class="BtcIcon fa fa-btc"></i>
					  	 	</p>
					  	 	<a  class="btnComprar modal-trigger" href="#comprarItemLoja" onclick="comprarItemLoja(3,'.$itensVideo["id"].')" title="Comprar video">comprar</a>
				           
				        </div>
			        </div> 
				</article>
			';
 			
 		}
 	}

 }

 