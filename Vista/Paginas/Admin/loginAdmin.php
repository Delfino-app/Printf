
<?php

	include 'autoloadAdmin.php';
	
	
			
	if (isset($_SESSION["loginMaster"])) {
	   
	   $_SESSION["loginMaster"]=false;
    }
	

	ob_start();
	$loginMsg= new userInfo();
	$paginas= new adminController();
	$paginas->loginAdmin();	
?>
<div class="container">
	<div class="row" style="margin-top: 70px;">
		<div class="col s12 l12">
			<h3 class="col s12 l12" style="text-align: center;">
				<?php #include "Vista/Paginas/logoIcon.php"; ?>
			</h3>
			
			<div class="col s12 l4 hide-on-med-and-down"></div>
			
			<div class="col s12 l4">
				<div class="col l1 hide-on-med-and-down"></div>
				<div class="col s12 l10 white" id="ConatinerLoginRegistro">
					<div>
						<ul class="tabs">
							<li class="tab col s3"><a class="active" href="#login">Entrar</a></li>
						</ul>
						<div class="divider"></div>
					</div>
					<div  id="login">
						<div class="col s12 l12" id="loginContainer">
							
							<?php $loginMsg->LoginMsg(); ?>

							<form method="Post" class="col l12 center" id="formLogin">

						        <input type="email" id="email" name="emailIngressoAdmin" placeholder="Email" 
								pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>

						        <input type="password" name="passwordIngressoAdmin" id="pass" placeholder="Senha" minlength="8" maxlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						       
						        <button type="submit" name="loginAdminbtn" title="Entrar" class="waves-effect light-blue darken-3" id="btnlogin">
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
					</div>
				</div>
				<div class="col l1 hide-on-med-and-down"></div>
			</div>
			<div class="col s12 l4 hide-on-med-and-down"></div>
		</div>
	</div>
</div>
