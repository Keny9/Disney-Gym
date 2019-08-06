/****************************************
Fichier : rendezvous.js
Auteur : Guillaume Côté
Fonctionnalité : Fichier js pour les rendez-vous
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            William                   Approuvé
2019-05-03            Karl                      Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/


/*
  Requete Ajax pour la recherche
*/
function rechercheAjax(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "scriptRecherche.php";
    var column = document.getElementById("column").value;
    var critere = document.getElementById("critere").value;
    var employe = document.getElementById("employe").value;
    var vars = "column="+column+"&critere="+critere+"&employe="+employe;
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
}

/*
  Vérifie si l'employe existe
*/
function siRendezvousExiste(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idRendezvous").val();
    $.ajax({
      url: 'siRendezvousExiste.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          document.formulaire.submit();
          supprime();
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idRendezvous").focus();
          $("#idRendezvous").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

/*
  Requete Ajax qui se rend dans le fichier scripSupprimerRendezvous.php avec l'id du rendez-vous
*/
function supprime(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idRendezvous").val();
    $.ajax({
      url: 'scriptSupprimerRendezvous.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          //location.href='page_modif_employe.php';
          document.formulaire.submit();
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idRendezvous").focus();
          $("#idRendezvous").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

//Ouvre le formulaire pour entrer l'id du rendez-vous
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

//Ferme le formulaire pour entrer l'id du rendez-vous
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

//Click sur le bouton supprimer. Change le titre du formulaire
function clickSuppr(){
  $("#titre_myform").html("Supprimer un rendez-vous");
  document.formulaire.action = "";
}
