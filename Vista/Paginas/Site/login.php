
<?php

	ob_start();

	$loginMsg= new userInfo();

?>
<div class="col s12 l12" id="loginContainer">
	
	<?php $loginMsg->LoginMsg(); ?>

	<form method="Post" class="col l12 center" id="formLogin">

        <input type="email" id="email" name="emailIngresso" placeholder="Email" 
		pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>

        <input type="password" name="passwordIngresso" id="pass" placeholder="Senha" minlength="8" maxlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
       
        <p class="col s12 l12" id="EsqueceuSenhaContainer">
          <a href="" id="esqueceuSenhaLink">Esqueceu a senha?</a>
        </p>
        
        <button type="submit" title="Entrar" class="waves-effect light-blue darken-3" id="btnlogin">
        	Entrar<i id="iconLogin"  class="fa fa-sign-in"></i>
        </button>
       

	</form>

	<div class="divider"></div>
	<div class="footer-copyright col s12 l12">
         <div class="container center-align">
         	Printf &copy; 2018 - <?php date_default_timezone_set("Africa/Luanda"); echo date("Y");?>
         </div>
    </div>
</div>