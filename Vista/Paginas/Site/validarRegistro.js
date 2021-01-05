
/*Valigar Registro de Usuario*/

function ValidarRegistro(){

 	
 	var primeiroNomeUser =  document.querySelector("#primeiroNome").value;
 	var ultimoNomeUser =  document.querySelector("#ultimoNome").value;
 	var senhaUser = document.querySelector("#usuarioPassword").value;
 	var emailUser = document.querySelector("#usuarioEmail").value;
 		
	
 	if(primeiroNomeUser != ""){

		var caracteres = primeiroNomeUser.length;
		var expresion = /^[A-Za-z]+$/;

		if(caracteres < 3){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter menos de 3 caracteres.";

			return false;
		}

		if(caracteres > 18){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter mais de 18 caracteres";

			return false;
		}

		if(!expresion.test(primeiroNomeUser)){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter números nem caracteres especias";

			return false;
		}
	}

	if (ultimoNomeUser != "") {

		var caracteres = ultimoNomeUser.length;
		var expresion = /^[A-Za-z]+$/;

		if(caracteres < 3){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter menos de 3 caracteres.";

			return false;
		}

		if(caracteres > 18){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter mais de 18 caracteres";

			return false;
		}

		if(!expresion.test(ultimoNomeUser)){

			document.querySelector("#Subtitulo").innerHTML = "O Nome não pode ter números nem caracteres especias";

			return false;
		}
 	}

 	/*--Ainda não Implementado -> A expressão regular n esta funcionando
	if(senhaUser != ""){

		var caracteres = senhaUser.length;
		var expresion = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])*$/;

		if(caracteres < 8){

			document.querySelector("#Subtitulo").innerHTML = "A senha deve ter até 8 caracteres, incluíndo um número, um simbólo e uma maiúscula.";

			return false;
		}

		if(!expresion.test(senhaUser)){

			document.querySelector("#Subtitulo").innerHTML = "No escriba caracteres especiales.";

			return false;
		}
	}
	*/

	if(emailUser != ""){

		var expresion = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]*$/;

		if(!expresion.test(emailUser)){

			document.querySelector("#Subtitulo").innerHTML = "Escreva o email corretamente o email";

			return false;
		}
	}

  return true;
}