/****************************************
Fichier : client.js
Auteur : Guillaume Côté
Fonctionnalité : Code javascript de la gestion de client
Date : 2019-04-29
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
2019-05-03        Karl Boutin                Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

var type = 0;
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
}

/*
  Vérifie si le client existe
*/
function siClientExiste(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idClient").val();
    $.ajax({
      url: 'siClientExiste.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          document.formulaire.submit();
          if(type == 1){
            supprime();
          }
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idClient").focus();
          $("#idClient").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}

/*
  Requete Ajax qui se rend dans le fichier scriptSupprimerClient.php avec l'id du client
*/
function supprime(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#idClient").val();
    $.ajax({
      url: 'scriptSupprimerClient.php',
      type:"POST",
      data: {"identifiant" : id},
      success: function(data) {
        if(!data){
          document.formulaire.submit();
        }
        else{
          document.getElementById("erreur").innerHTML=data;
          $("#idClient").focus();
          $("#idClient").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
  rechercheAjax();
}

/*
  Clique sur le bouton infos clients. Change le titre du formulaire
*/
function clickInfo(){
  type = 0;
  $("#titre_myform").html("Infos sur un client");
  document.formulaire.action = "page_info_client.php";
}

/*
  Clique sur le bouton supprimer. Change le titre du formulaire
*/
function clickSuppr(){
  type = 1;
  $("#titre_myform").html("Supprimer un client");
  document.formulaire.action = "";
}

//Ouvre le formulaire pour entrer l'id du client
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

//Ferme le formulaire pour entrer l'id du client
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
