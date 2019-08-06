/****************************************
Fichier : script_forfait.js
Auteur : Karl Boutin
Fonctionnalité : JavaScript pour la fonctionnalité de gestion des forfaits
Date : 2019-04-29
Vérification :
Date                      Nom                     Approuvé
=========================================================

Historique de modifications :
Date                      Nom                  Description
=========================================================

****************************************/

//Ajouter des actions listeners sur les differents input
function init(){
  var erreurVide = document.getElementById("alert");
  var nom = document.getElementById("nomAbo");
  var prix = document.getElementById("prix");
  var description = document.getElementById("description");
  var heureDebutSemaine = document.getElementById("heureDebutSemaine");
  var heureFinSemaine = document.getElementById("heureFinSemaine");
  var heureDebutFds = document.getElementById("heureDebutFds");
  var heureFinFds = document.getElementById("heureFinFds");

  nom.addEventListener("blur",verifieNom);
  prix.addEventListener("blur",verifiePrix);
  description.addEventListener("blur",verifieDescription);
  heureDebutSemaine.addEventListener("blur",verifieHeureDebutSemaine);
  heureFinSemaine.addEventListener("blur",verifieHeureFinSemaine);
  heureDebutFds.addEventListener("blur",verifieHeureDebutFds);
  heureFinFds.addEventListener("blur",verifieHeureFinFds);
}

//Verifie si une option est selectionner lorsqu'on veut supprimer un forfait
function ifSelected(){
  var erreurVide = document.getElementById("alert");
  var select = document.getElementById("list2");
  var selectedValue = select.options[select.selectedIndex].value;

  if(selectedValue == "vide"){
    erreurVide.style.display = "block";
    document.getElementById("textErreur").innerHTML = "Veuillez sélectionner un forfait que vous désirez supprimer.";
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    return false;
  }
  return true;
}

//Verifier que les champs respectent les conditions avant d'etre ajouter ou modifier
function validateFormForfait(){

  var erreurVide = document.getElementById("alert");
  var nom = document.getElementById("nomAbo");
  var prix = document.getElementById("prix");
  var description = document.getElementById("description");
  var heureDebutSemaine = document.getElementById("heureDebutSemaine");
  var heureFinSemaine = document.getElementById("heureFinSemaine");
  var heureDebutFds = document.getElementById("heureDebutFds");
  var heureFinFds = document.getElementById("heureFinFds");

  if(!verifierSiVide(nom.value) || !verifierSiVide(prix.value) || !verifierSiVide(description.value) || !verifierSiVide(heureDebutSemaine.value) ||
    !verifierSiVide(heureFinSemaine.value || !verifierSiVide(heureDebutFds.value) || !verifierSiVide(heureFinFds.value))){

    erreurVide.style.display = "block";
    document.getElementById("textErreur").innerHTML = "<strong>Attention</strong>, veuillez remplir les champs qui sont vides.";
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    return false;
  }

  //Verifie les entrees dans les input (Regex)
  if(!verifieNom() || !verifiePrix() || !verifieDescription() || !verifieHeureDebutSemaine() ||
  !verifieHeureFinSemaine() || !verifieHeureDebutFds() || !verifieHeureFinFds()){
    return false;
  }

  return true;
}

//Verifie si le champ est vide
function verifierSiVide(value){
 if(value == null || value == ""){
   return false;
 }
 return true;
}

//Verifier information entree
function verifieNom(){
  var nom = document.getElementById("nomAbo");
  var nomRegex = /^([A-Z][a-z]{1,}([- ][A-Z][a-z]{1,}){0,})$/;

  if (nomRegex.test(nom.value) == false)
  {
    document.getElementById('erreurNom').innerHTML="Le nom du forfait est invalide.";
    return false;
  }
  document.getElementById('erreurNom').innerHTML="";
  return true;
}

//Verifie le prix entree
function verifiePrix(){
  var prix = document.getElementById("prix");
  var value = prix.value;
  var prixRegex = /^([0-9])+([.,][0-9]{1,2})?$/;
  regex = /,/g;
  res = value.match(regex);

  if(prixRegex.test(prix.value) == false){
    document.getElementById('erreurPrix').innerHTML="Seulement les valeurs numériques sont acceptés. Ex: 249.99";
    return false;
  }

  if(res != null){
    pa = document.getElementById("prix").value = value.replace(regex,".");
  }
  document.getElementById('erreurPrix').innerHTML = "";
  return true;
}

//Verifie la description entree
function verifieDescription(){
  var description = document.getElementById("description");
  var descRegex = /^[a-zA-Z]+([ \,\.-]*[a-zA-Z]*)*$/;

  if(descRegex.test(description.value) == false){
    document.getElementById('erreurDescription').innerHTML = "La description du forfait est invalide. Utiliser que des lettres.";
    return false;
  }
  document.getElementById('erreurDescription').innerHTML = "";
  return true;
}

//Verifie l'entree l'heure de debut de la semaine
function verifieHeureDebutSemaine(){
  var heureDebutSemaine = document.getElementById("heureDebutSemaine");
  var heureRegex = /^[0-9]{1,2}$/;

  if(heureRegex.test(heureDebutSemaine.value) == false || heureDebutSemaine.value > 24){
    document.getElementById('erreurHeureDebutSemaine').innerHTML = "Entrer une heure valide.";
    return false;
  }
  document.getElementById('erreurHeureDebutSemaine').innerHTML = "";
  return true;
}

//Verifie l'entree l'heure de fin de la semaine
function verifieHeureFinSemaine(){
  var heureFinSemaine = document.getElementById("heureFinSemaine");
  var heureRegex = /^[0-9]{1,2}$/;

  if(heureRegex.test(heureFinSemaine.value) == false || heureFinSemaine.value > 24){
    document.getElementById('erreurHeureFinSemaine').innerHTML = "Entrer une heure valide.";
    return false;
  }
  document.getElementById('erreurHeureFinSemaine').innerHTML = "";
  return true;
}

//Verifie l'entree de l'heure debut Fds
function verifieHeureDebutFds(){
  var heureDebutFds = document.getElementById("heureDebutFds");
  var heureRegex = /^[0-9]{1,2}$/;

  if(heureRegex.test(heureDebutFds.value) == false || heureDebutFds.value > 24){
    document.getElementById('erreurHeureDebutFds').innerHTML = "Entrer une heure valide.";
    return false;
  }
  document.getElementById('erreurHeureDebutFds').innerHTML = "";
  return true;
}

//Verifie l'entree de l'heure fin Fds
function verifieHeureFinFds(){
  var heureFinFds = document.getElementById("heureFinFds");
  var heureRegex = /^[0-9]{1,2}$/;

  if(heureRegex.test(heureFinFds.value) == false || heureFinFds.value > 24){
    document.getElementById('erreurHeureFinFds').innerHTML = "Entrer une heure valide.";
    return false;
  }
  document.getElementById('erreurHeureFinFds').innerHTML = "";
  return true;
}

//Lorsqu'un  forfait est selectionner on insere les donnees dans les differents input
//Utilisation de Ajax
function changeFunc(){
  var request = new XMLHttpRequest();
  var method = "POST";
  var url = "dataForfait.php";

  request.open(method, url, true);

  request.send();

  request.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
      var data = JSON.parse(this.responseText);
      console.log(data); //For debugging

      var list = document.getElementById("list2");
      var listDuree = document.getElementById("duree");
      var value = list.options[list.selectedIndex].value;

      for(var i = 0; i < data.length; i++){
        if(data[i].nom == value){
          document.getElementById("nomAbo").value = data[i].nom;
          document.getElementById("prix").value = data[i].prix;
          document.getElementById("description").value = data[i].description;
          document.getElementById("heureDebutSemaine").value = data[i].heure_debut_semaine;
          document.getElementById("heureFinSemaine").value = data[i].heure_fin_semaine;
          document.getElementById("heureDebutFds").value = data[i].heure_debut_fds;
          document.getElementById("heureFinFds").value = data[i].heure_fin_fds;

          if(data[i].duree == 1){
            listDuree.selectedIndex = "0";
          }
          else if(data[i].duree == 3){
            listDuree.selectedIndex = "1";
          }
          else if(data[i].duree == 6){
            listDuree.selectedIndex = "2";
          }
          else{
            listDuree.selectedIndex = "3";
          }

        }
      }

    }
  };

}
