/****************************************
Fichier : employe.js
Auteur : Maxime Lussier
Fonctionnalité : Code JS pour l'affichage d'employe
Date : 2019-04-24
Vérification :
Date                  Nom                        Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
2019-05-03            William                    Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

function rechercheAjax(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "scriptRecherche.php";
    var column = document.getElementById("column").value;
    var critere = document.getElementById("critere").value;
    var vars = "column="+column+"&critere="+critere;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
        document.getElementById("tbody").innerHTML = return_data;
	    }
    };
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}

/*
  Vérifie si l'employe existe
*/
function siEmployeExiste(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idEmploye").val();
    $.ajax({
      url: 'siEmployeExiste.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          //location.href='page_modif_employe.php';
          document.formulaire.submit();
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idEmploye").focus();
          $("#idEmploye").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}




function supprime(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idEmploye").val();
    $.ajax({
      url: 'scriptSupprimerEmploye.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          //location.href='page_modif_employe.php';
          document.formulaire.submit();
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idEmploye").focus();
          $("#idEmploye").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

function clearFields(){
document.getElementById('nom').value = "";
document.getElementById('prenom').value = "";
document.getElementById('identifiant').value = "";
document.getElementById('password').value = "";
document.getElementById('telephone').value = "";
document.getElementById('nas').value = "";
document.getElementById('poste').value = "";
document.getElementById('etat').value = "";
document.querySelector("input[name='dateNaissance']").value = "";
document.querySelector("input[name='dateEmbauche']").value = "";
document.getElementById('courriel').value = "";
document.getElementById('noPorte').value = "";
document.getElementById('rue').value = "";
document.getElementById('ville').value = "";
}

function ajout(){

  // Create our XMLHttpRequest object
  var hr = new XMLHttpRequest();
  // Create some variables we need to send to our PHP file
  var url = "scriptAjouterEmploye.php";
  var nom = document.getElementById('nom').value;
  var prenom = document.getElementById('prenom').value;
  var identifiant = document.getElementById('identifiant').value;
  var password = document.getElementById('password').value;
  var telephone = document.getElementById('telephone').value;
  var nas = document.getElementById('nas').value;
  var poste = document.getElementById('poste').value;
  var etat = document.getElementById('etat').value;
  var dateNaissance = document.querySelector("input[name='dateNaissance']").value;
  var dateEmbauche = document.querySelector("input[name='dateEmbauche']").value;
  var courriel = document.getElementById('courriel').value;
  var noPorte = document.getElementById('noPorte').value;
  var rue = document.getElementById('rue').value;
  var ville = document.getElementById('ville').value;

  var vars = "nom="+nom
  +"&prenom="+prenom
  +"&identifiant="+identifiant
  +"&courriel="+courriel
  +"&dateNaissance="+dateNaissance
  +"&dateEmbauche="+dateEmbauche
  +"&telephone="+telephone
  +"&nas="+nas
  +"&password="+password
  +"&ville="+ville
  +"&rue="+rue
  +"&noPorte="+noPorte
  +"&poste="+poste
  +"&etat="+etat;

  hr.open("POST", url, true);
  // Set content type header information for sending url encoded variables in the request
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Access the onreadystatechange event for the XMLHttpRequest object
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
      // Si erreur sql
      if(return_data != ""){
        document.getElementById('erreurIdentifiant').innerHTML="L'identifiant existe déjà";
      }
      else{
        clearFields();
        alert("L'ajout s'est effectué avec succès!");
      }
    }
  }
  // Send the data to PHP now... and wait for response to update the status div
  hr.send(vars); // Actually execute the request
  document.getElementById("status").innerHTML = "processing...";
}

function modif(oldId){
  var nom = document.getElementById('nom').value;
  var prenom = document.getElementById('prenom').value;
  var identifiant = document.getElementById('identifiant').value;
  var password = document.getElementById('password').value;
  var telephone = document.getElementById('telephone').value;
  var nas = document.getElementById('nas').value;
  var poste = document.getElementById('poste').value;
  var etat = document.getElementById('etat').value;
  var dateNaissance = document.querySelector("input[name='dateNaissance']").value;
  var dateEmbauche = document.querySelector("input[name='dateEmbauche']").value;
  var courriel = document.getElementById('courriel').value;
  var noPorte = document.getElementById('noPorte').value;
  var rue = document.getElementById('rue').value;
  var ville = document.getElementById('ville').value;


  $(function($) {
    $.ajax({
      url: 'scriptModifierEmploye.php',
      type:"POST",
      data: {nom: nom, prenom: prenom, identifiant: identifiant, courriel: courriel,
            dateNaissance: dateNaissance, dateEmbauche: dateEmbauche, telephone: telephone,
            nas: nas, password: password, ville: ville, rue: rue, noPorte: noPorte, poste: poste,
            etat: etat, oldId: oldId},
      success: function(data) {
        console.log(data);
        if(!data){
            alert("La modification s'est effectuée avec succès!");
        }
        else{
            document.getElementById('erreurIdentifiant').innerHTML="L'identifiant existe déjà";
            console.log(data);
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

function validerModification(oldId){
  var valide = true;

  if(validerNom() == false){valide = false;}
  if(validerPrenom() == false){valide = false;}
  if(validerIdentifiant()==false){valide=false;}
  if(validerMotDePasse()==false){valide = false;}
  if(validerTelephone() == false){valide = false;}
  if(validerNas() == false){valide = false;}
  if(validerPoste() == false){valide = false;}
  if(validerEtat() == false){valide = false;}
  if(validerDateNaissance() == false){valide = false;}
  if(validerCourriel() == false){valide = false;}
  if(validerNoPorte() == false){valide = false;}
  if(validerRue() == false){valide = false;}
  if(validerVille() == false){valide = false;}
  if(validerDateEmbauche()==false){valide=false;}

  if(valide == true){
    modif(oldId);
  }
}

function validerAjout(){
  var valide = true;

  if(validerNom() == false){valide = false;}
  if(validerPrenom() == false){valide = false;}
  if(validerIdentifiant()==false){valide=false;}
  if(validerMotDePasse()==false){valide = false;}
  if(validerTelephone() == false){valide = false;}
  if(validerNas() == false){valide = false;}
  if(validerPoste() == false){valide = false;}
  if(validerEtat() == false){valide = false;}
  if(validerDateNaissance() == false){valide = false;}
  if(validerCourriel() == false){valide = false;}
  if(validerNoPorte() == false){valide = false;}
  if(validerRue() == false){valide = false;}
  if(validerVille() == false){valide = false;}
  if(validerDateEmbauche()==false){valide=false;}

  if(valide == true){
    ajout();
  }
}

function validerNom(){
  var nom = document.getElementById('nom');
  var nomRegex = /^([A-Z][a-z]{1,}([- ][A-Z][a-z]{1,}){0,})$/;

  if (nomRegex.test(nom.value) == false)
  {
    document.getElementById('erreurNom').innerHTML="Le nom est invalide";
    return false;
  }
  document.getElementById('erreurNom').innerHTML="";
  return true;
}

function validerPrenom(){
  var prenom = document.getElementById('prenom');
  var prenomRegex = /^([A-Z][a-z]{1,}([- ][A-Z][a-z]{1,}){0,})$/;

  if (prenomRegex.test(prenom.value) == false)
  {
    document.getElementById('erreurPrenom').innerHTML="Le prénom est invalide";
    return false;
  }
  document.getElementById('erreurPrenom').innerHTML="";
}

function validerIdentifiant(){
  var identifiant = document.getElementById('identifiant');
  var identifiantRegex = /^[A-Za-z0-9]{6,30}$/;

  if(identifiantRegex.test(identifiant.value) == false){
    document.getElementById('erreurIdentifiant').innerHTML="L'identifiant est invalide. Il doit contenir entre 6 et 30 caractères de lettres ou chiffres";
    return false;
  }
  /*if(siEmployeExiste()==false){
    document.getElementById('erreurIdentifiant').innerHTML="L'identifiant existe déjà";
  }*/
  document.getElementById('erreurIdentifiant').innerHTML="";
}

function validerMotDePasse(){
  var password = document.getElementById('password');
  var erreurPassword = /^[A-Za-z0-9]{6,30}$/;

  if(erreurPassword.test(password.value) == false){
    document.getElementById('erreurPassword').innerHTML="Le mot de passe est invalide. Il doit contenir entre 6 et 30 caractères de lettres ou chiffres";
    return false;
  }
  document.getElementById('erreurPassword').innerHTML="";
}

function validerTelephone(){
  var telephone = document.getElementById('telephone');
  var telephoneRegex = /^[0-9]{7,11}$/;

  if (telephoneRegex.test(telephone.value) == false)
  {
    document.getElementById('erreurTelephone').innerHTML="Le numéro de téléphone est invalide";
    return false;
  }
  document.getElementById('erreurTelephone').innerHTML="";
}

function validerNas(){
  var nas = document.getElementById('nas');
  var nasRegex = /^[0-9]{9}$/;

  if(nasRegex.test(nas.value) == false){
    document.getElementById('erreurNas').innerHTML="Le NAS est invalide";
    return false;
  }
  document.getElementById('erreurNas').innerHTML="";
}

function validerPoste(){
  var poste = document.getElementById('poste');
  var selected = poste.options[poste.selectedIndex].value;
  if(selected == ""){
    document.getElementById('erreurPoste').innerHTML="Veuiller choisir un poste";
    return false;
  }
  document.getElementById('erreurPoste').innerHTML="";
}

function validerEtat(){
  var etat = document.getElementById('etat');
  var selected = etat.options[etat.selectedIndex].value;
  if(selected == ""){
    document.getElementById('erreurEtat').innerHTML="Veuiller choisir un état";
    return false;
  }
  document.getElementById('erreurEtat').innerHTML="";
}

function validerDateNaissance(){
  var date = document.querySelector("input[name='dateNaissance']");

  if(date.value.length != 10){
    document.getElementById('erreurDateNaissance').innerHTML="Veuiller choisir une date";
    return false;
  }
  document.getElementById('erreurDateNaissance').innerHTML="";
}

function validerDateEmbauche(){
  var date = document.querySelector("input[name='dateEmbauche']");

  if(date.value.length != 10){
    document.getElementById('erreurDateEmbauche').innerHTML="Veuiller choisir une date";
    return false;
  }
  document.getElementById('erreurDateEmbauche').innerHTML="";
}

function validerCourriel(){
  var courriel = document.getElementById('courriel');
  var courrielRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(courrielRegex.test(courriel.value) == false){
      document.getElementById('erreurCourriel').innerHTML="L'adresse courriel est invalide";
      return false;
    }
    document.getElementById('erreurCourriel').innerHTML="";
}

//À REVOIR PCQ PAS SûR
function validerNoPorte(){
  var noPorte = document.getElementById('noPorte');
  //var noPorteRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(noPorte.value == ""){
      document.getElementById('erreurNoPorte').innerHTML="Le numéro de porte est invalide";
      return false;
    }
    document.getElementById('erreurNoPorte').innerHTML="";
}

function validerRue(){
  var rue = document.getElementById('rue');

  if(rue.value == ""){
    document.getElementById('erreurRue').innerHTML="La rue est invalide";
    return false;
  }
  document.getElementById('erreurRue').innerHTML="";
}

function validerVille(){
  var ville = document.getElementById('ville');

  if(ville.value == ""){
    document.getElementById('erreurVille').innerHTML="La ville est invalide";
    return false;
  }
  document.getElementById('erreurVille').innerHTML="";
}


function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

/*Set les select (poste et etat) lors d'une modification*/
function setSelectModif(etat, poste){
  document.getElementById("etat").selectedIndex = etat;
  document.getElementById("poste").selectedIndex = poste;
}

function clickModif(){
  $("#titre_myform").html("Modifier un employé");
  document.formulaire.action = "page_modif_employe.php";
  //document.getElementById('btn_confirmer').setAttribute('onclick', "siEmployeExiste()");
}

function clickSuppr(){
  $("#titre_myform").html("Supprimer un employé");
  document.formulaire.action = "scriptSupprimerEmploye.php";
  alert("Ceci est une action destructrice. Prenez garde.");
}
