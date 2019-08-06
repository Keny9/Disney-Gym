/*Pour la connexion au site Web*/

//Verifier que les champs ne sont pas vide lors de l'envoi du formulaire
function validateFormAuthentification(){
  var user = document.getElementById('nomUtilisateur');
  var password = document.getElementById('motPasse');
  var element = document.getElementById('erreur-login');

  pExist = document.getElementById("erreur-login");
  if(pExist != null){pExist.innerHTML = "";}

  if(user.value == "" || password.value == ""){
    element.innerHTML = "Veuillez remplir les champs qui sont vides.";
    return false;
  } else {return true;}
}

//Enlever le message d'erreur lorsque l'utilisateur met le focus dans les inputs
function clearError(){
  var errorElement = document.getElementById('erreur-login');
  errorElement.innerHTML = "";
}

//Vider les input de connexion de la page d'authentification
function clearInput(){
  var userInput = document.getElementById('nomUtilisateur');
  var passInput = document.getElementById('motPasse');

  userInput.value = "";
  passInput.value = "";
}
