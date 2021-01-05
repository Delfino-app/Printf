<style type="text/css">
	
	#resgistroContainer{

		padding-left: 0px;
		padding-right: 8px;
		padding-bottom: 20px;
		padding-top: 20px;
	}
	/*-----------------------*/
		/*Pertencem ou foram definidos no metodo RegistroMsg() da classe userInfo()*/
		h6.registroTitulo{

			text-align: center;
			padding-bottom: 20px;
		}
		h6.erro{

			color: red;
		}
	/*-----------------------*/
	#formRegistro{
		padding-bottom: 40px;
	}
	input[type=text].texto{

		border:1px solid #d1d1d1;
		padding-left: 5px;
		border-radius: 5px;
		transition: border .5s;
	}
	input[type=email]#usuarioEmail{

		border:1px solid #d1d1d1;
		padding-left: 5px;
		border-radius: 5px;
		transition: border .5s;
	}
	input[type=password]#usuarioPassword{

		border:1px solid #d1d1d1;
		padding-left: 5px;
		border-radius: 5px;
		transition: border .5s;
	}
	input:not([type]):focus:not([readonly]),
	input[type=text].texto:focus:not([readonly]),
	input[type=email]#usuarioEmail:focus:not([readonly]),
	input[type=password]#usuarioPassword:focus:not([readonly]){
	 	
	 	box-shadow: none;
	  	border:1px solid #0277bd;
	}
	#btnRegistro{

		border: none;
		color: white;
		background-color: #0277bd;
		padding-top: 8px;
		padding-bottom: 8px;
		padding-left: 40px;
		padding-right: 40px;
		margin-top: 10px;
		border-radius: 5px;
	}
	#iconRegistro{

		padding-left: 5px;
	}

</style>

<?php

	ob_start();

	$registroMsg= new userInfo();

	$objeto = new controller();
	 
	$objeto->RegistroController();

?>
<div class="col s12 l12" id="resgistroContainer">
	
	<?php $registroMsg->RegistroMsg(); ?>

	<form method="Post" class="col l12 center" id="formRegistro">

		<input type="text" class="texto" id="primeiroNome" name="usuarioPrimeiroNomeRegistro" minlength="3" maxlength="18"  placeholder="Primeiro nome" pattern="[A-Za-z]{3,18}" required>

        <input type="text" class="texto" id="ultimoNome" name="usuarioUltimoNomeRegistro" minlength="3" maxlength="18" placeholder="Último nome" pattern="[A-Za-z]{3,18}" required>


        <input type="email" id="usuarioEmail" name="usuarioEmailRegistro" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>

        <input type="password" name="usuarioPasswordRegistro" id="usuarioPassword" placeholder="Senha" minlength="8" maxlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

         <button type="submit" title="Criar Conta" class="waves-effect light-blue darken-3" id="btnRegistro">
        	Criar Conta<i id="iconRegistro"  class="fa fa-plus-circle"></i>
        </button>

	</form>
	<div class="divider"></div>
	<div class="footer-copyright col s12 l12">
         <div class="container center-align">
         	Printf &copy; 2018 - <?php echo date("Y");?>
         </div>
    </div>
</div>

