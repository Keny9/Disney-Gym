/****************************************
Fichier : cours.js
Auteur : Maxime Lussier
Fonctionnalité : Code JS de l'affichage des cours
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            William                    Approuvé
2019-05-03            Karl                       Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

function rechercheCours(){

  var no_cours = document.getElementById('no_cours').value;
  
  $(function($) {
    $.ajax({
      url: 'scriptRechercheEvenement.php',
      type:"POST",
      data: {no_cours: no_cours},
      dataType: 'html',
      success: function(data) {
        console.log(data);
        if(!data){
            $("#tbody").html("Aucun résultat trouvé.");
        }
        else{
            $("#tbody").html(data);
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

function ajout(){
    document.getElementById("formulaire_1").action="scriptAjouterCours.php";
  document.getElementById("formulaire_1").submit();
  alert("Ajout effectué");
}

function modif(){
  document.getElementById("formulaire_1").action="scriptModifCours.php";
  document.getElementById("formulaire_1").submit();
  alert("Modification effectuée");
}

function validerModif(){
  var valide = true;

  if(validerId() == false){valide = false;}
  if(validerModele() == false){valide = false;}
  if(validerInstructeur() == false){valide = false;}
  if(validerDate() == false){valide = false;}
  if(validerHeure() == false){valide = false;}
  if(validerDuree() == false){valide = false;}
  if(validerPrix() == false){valide = false;}

  if (valide == true){
    modif();
  }
}


function validerAjout(){
  var valide = true;

  if(validerId() == false){valide = false;}
  if(validerModele() == false){valide = false;}
  if(validerInstructeur() == false){valide = false;}
  if(validerDate() == false){valide = false;}
  if(validerHeure() == false){valide = false;}
  if(validerDuree() == false){valide = false;}
  if(validerPrix() == false){valide = false;}

  if (valide == true){
    ajout();
  }
}

function validerId(){
  var id = document.getElementById('id');
  var regex = /^[A-Za-z][0-9]{5}$/;

  if(regex.test(id.value) == false){
    document.getElementById('erreur_id').innerHTML="L'id est invalide. Il doit commencer par une lettre suivit de 5 chiffres.";
    return false;
  }
  document.getElementById('erreur_id').innerHTML="";
  return true;
}

function validerModele(){
  var modele = document.getElementById('modele');
  var selected = modele.options[modele.selectedIndex].value;
  if(selected == ""){
    document.getElementById('erreur_modele').innerHTML="Veuiller choisir un modèle";
    return false;
  }
  document.getElementById('erreur_modele').innerHTML="";
  return true;
}

function validerInstructeur(){
  var instructeur = document.getElementById('instructeur');
  var selected = instructeur.options[instructeur.selectedIndex].value;
  if(selected == ""){
    document.getElementById('erreur_instructeur').innerHTML="Veuiller choisir un instructeur";
    return false;
  }
  document.getElementById('erreur_instructeur').innerHTML="";
  return true;
}

function validerDate(){
  var date = document.querySelector("input[name='date']");
  //alert(new Date(date.value));
  if(date.value.length != 10){
    document.getElementById('erreur_date').innerHTML="Veuiller saisir une date";
    return false;
  }
  if(new Date(date.value) < Date.now()){
    document.getElementById('erreur_date').innerHTML="Veuiller saisir une date du futur";
    return false;
  }
  document.getElementById('erreur_date').innerHTML="";
  return true;
}

function validerHeure(){
  var heure = document.getElementById('heure');
  var selected = heure.options[heure.selectedIndex].value;
  if(selected == ""){
    document.getElementById('erreur_heure').innerHTML="Veuiller choisir une heure";
    return false;
  }
  document.getElementById('erreur_heure').innerHTML="";
  return true;
}

function validerDuree(){
  var duree = document.getElementById('duree');
  regex = /^[0-9]{1,2}$/;

  if(regex.test(duree.value) == false || duree.value < 1){
    document.getElementById('erreur_duree').innerHTML="La durée doit être un nombre entier d'au moins 1h et moins de 100h";
    return false;
  }
  document.getElementById('erreur_duree').innerHTML="";
  return true;
}

function validerPrix(){
  var prix = document.getElementById('prix');
  regex = /^[0-9]{1,3}[.][0-9]{2}$/;

  if(regex.test(prix.value) == false || prix.value < 1){
    document.getElementById('erreur_prix').innerHTML="Le prix doit respecter le format : 000.00";
    return false;
  }
  document.getElementById('erreur_prix').innerHTML="";
  return true;
}


function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

/*Set les select (poste et etat) lors d'une modification*/
/*function setSelectModif(etat, poste){
  document.getElementById("etat").selectedIndex = etat;
  document.getElementById("poste").selectedIndex = poste;
}*/

function clickAffiche(){
  $("#titre_myform").html("Cours à afficher");
  document.getElementById('btn_confirmer').onclick=function(){siCoursExiste();};
  //document.getElementById('btn_confirmer').setAttribute('onclick', "siEmployeExiste()");
}

function clickSuppr(){
  $("#titre_myform").html("Cours à supprimer");
  document.formulaire.action = "scriptSupprimerCours.php";
  document.getElementById('btn_confirmer').onclick= function(){submitForm();} ;
  alert("Ceci est une action destructrice. Prenez garde.");

}

function submitForm(){
    document.getElementById("formulaire").submit();
}

function siCoursExiste(){
    var no_cours = $("#no_a_modif").val();
    if(!no_cours){
      document.getElementById("erreur").innerHTML="Entrer un numéro de cours";
      $("#no_a_modif").focus();
      $("#no_a_modif").select();
      return;
    }
  $(function($) {
    $("#erreur").html("");

    $.ajax({
      url: 'scriptSiCoursExiste.php',
      type:"POST",
      data: {"no_cours" : no_cours},
      success: function(data) {
        if(!data){
          var request = new XMLHttpRequest();
          request.open("GET", "evenement.xml", false);
          request.send();
          var xml = request.responseXML;
          var id = xml.getElementsByTagName("id");

          var x = xml.getElementsByTagName("evenement");
          alert(x[0].childNodes[0].innerHTML);
          document.getElementById('id').value = x[0].childNodes[0].innerHTML;
          document.getElementById('modele').selectedIndex=x[0].childNodes[1].innerHTML;
          document.getElementById('instructeur').value=x[0].childNodes[2].innerHTML;
          document.getElementById('date').value = x[0].childNodes[3].innerHTML;
          document.getElementById('heure').value = x[0].childNodes[4].innerHTML;
          document.getElementById('duree').value = x[0].childNodes[5].innerHTML;
          document.getElementById('prix').value = x[0].childNodes[6].innerHTML;
          document.getElementById('old_id').value =x[0].childNodes[0].innerHTML;
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#no_a_modif").focus();
          $("#no_a_modif").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}
