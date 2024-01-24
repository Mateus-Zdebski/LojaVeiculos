





function validaCampo(){

var senha = document.getElementById('pwd');
var email = document.getElementById('email');
	

if(email.value != 'email' || senha.value != 'pwd'){
document.getElementById("erro").innerHTML= '<p id="txterro">Erro na autenticação, por favor tente novamente</p>';
email.focus();
return false;

}

return true;
}
function limpa(){
	document.getElementById('erro').innerHTML = "";

}

function salvar(){



}