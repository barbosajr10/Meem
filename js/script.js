function mudamodal(clicked_id){

var bota1 = (clicked_id);
var email = document.getElementById('email');
var modaqmuda = document.getElementById('modaqmuda');
var divnick = document.getElementById('divnick');
var enviarlogcad = document.getElementById('enviarlogcad');

if (bota1 == "login") {
email.innerHTML = "Nick/Email";
divnick.style = "display:none";
enviarlogcad.innerHTML = "Entrar";
}else {
email.innerHTML = "Email";
divnick.style = "display:all";
enviarlogcad.innerHTML = "Registrar";
}

}

//function reply_click(clicked_id){
//    var bota = (clicked_id);
//}
