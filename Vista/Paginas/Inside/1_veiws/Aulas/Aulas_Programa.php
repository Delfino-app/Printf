<style type="text/css">
	/*INICIO Menu Tabs*/
	#Aulas_Programarow{
		margin-top: 50px;
	}
    .tabs .tab a {
	   color: #0277bd;
	   display: block;
	   width: 100%;
	   height: 100%;
	   text-overflow: ellipsis;
	   overflow: hidden;
	   transition: color .28s ease;
	}
    .tabs .indicator {
	   position: absolute;
	   bottom: 0;
	   height: 2px;
	   background-color:  #0277bd;
	   will-change: left, right;
	}
	.tabs .tab a:hover {
	  color: #455a64;
	}
	.tabs .tab.disabled a {
		color: #455a64;
		cursor: default;
	}

</style>

<div class="container">
	<!--<div class="row" id="Aulas_Programarow">
		<div class="col l3 hidden-on-med-and-down"></div>
		<div class="col s12 l6">
		    <ul class="tabs">
	           <li class="tab col s3"><a href="#Nivel_1">Nível 1</a></li>
	           <li class="tab col s3 disabled"><a href="#Nivel_2">Nível 2</a></li>
	           <li class="tab col s3 disabled"><a href="#Nivel_3">Nível 3</a></li>
	           <li class="tab col s3 disabled"><a href="#Nivel_4">Nível 4</a></li>
            </ul>
		</div>
		<div class="col l3 hidden-on-med-and-down"></div>
	</div>-->
	
    <?php include "Vista/Paginas/Inside/1_veiws/Aulas/Nivel_1.php"; ?>  
</div>
