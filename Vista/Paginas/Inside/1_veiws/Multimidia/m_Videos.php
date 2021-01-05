
<?php
	
	$Videos= new multimidiacontroller();
?>
<div class="container">
	<div class="row" id="m_videos">
		<div class="col l2 hide-on-med-and-down"></div>

		<div class="col s12 l6">
			<div  id="videoConteiner">
				<!--Video Container-->
				<?php
					multimidiacontroller::displayVideo(2,"");
				?>
			</div>
		</div>

		<!--Play List area-->
		<div class="col l3">
			<?php
				include "Vista/Paginas/Inside/1_veiws/Multimidia/m_Videos_PlayList.php";
			?>
		</div>
		<div class="col l1 hide-on-med-and-down"></div>
	</div>
</div>
