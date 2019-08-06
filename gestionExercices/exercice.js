/****************************************
Fichier : exercice.js
Auteur : William Gonin
Fonctionnalité : Fichier pour les donnees du permier tableau de Tabulator
Date : 2019-04-24

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03            Karl                      Oui
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/
function ajout(){

  // Create our XMLHttpRequest object
  var hr = new XMLHttpRequest();
  // Create some variables we need to send to our PHP file
  var url = "scriptAjouterExercice.php";
  var nom = document.getElementById('nom').value;
  var description = document.getElementById('description').value;
  var type = document.getElementById('id_type').value;

  var vars = "nom="+nom
  +"&description="+description
  +"&type="+type;

  hr.open("POST", url, true);
  // Set content type header information for sending url encoded variables in the request
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Access the onreadystatechange event for the XMLHttpRequest object
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
      // Si erreur sql
      if(return_data != ""){
        document.getElementById('erreurNom').innerHTML= return_data;
      }
      else{
        clearFields();
        alert("L'ajout s'est effectué avec succès!");
      }
    }
  };
  // Send the data to PHP now... and wait for response to update the status div
  hr.send(vars); // Actually execute the request
}
function clearFields(){
document.getElementById('nom').value = "";
document.getElementById('description').value = "";
document.getElementById('id_type').value = "";
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

function modif(oldId){
  var id = document.getElementById('id').value;
  var nom = document.getElementById('nom').value;
  var description = document.getElementById('description').value;
  var image = document.getElementById('image').getAttribute("src");
  var type = document.getElementById('id_type').value;

  image = "img/planche.png";
  console.log(image);

  $(function($) {
    $.ajax({
      url: 'scriptModifierExercice.php',
      type:"POST",
      data: {id: id, nom: nom, description: description, image: image, type: type,},
      success: function(data) {
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
	function siExerciceExiste(){
	  $(function($) {
	    $("#erreur").html("");
	    var id = $("#idExercice").val();
	    $.ajax({
	      url: 'siExerciceExiste.php',
	      type:"POST",
	      data: {"identifiant" : id},
	      success: function(data) {
	        if(!data){
	          //location.href='page_modif_employe.php';
	          document.formulaire.submit();
	        }
	        else{
	          document.getElementById("erreur").innerHTML=data;
	          $("#idExercice").focus();
	          $("#idExercice").select();
	        }
	      } ,
	      error: function() {
	        alert('Error occured');
	      }
	    });
	  });
	}

  function submitForm(){
      document.getElementById("formulaire").submit();
  }

	function openForm() {
	  document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("myForm").style.display = "none";
	}

function clickModif(){
  console.log("exercice");
  $("#titre_myform").html("Modifier un exercice");
  document.formulaire.action = "page_modif_exercice.php";
  //document.getElementById('btn_confirmer').setAttribute('onclick', "siEmployeExiste()");
}

function clickSuppr(){
  $("#titre_myform").html("Supprimer un exercice");
  document.formulaire.action = "scriptSupprimerExercice.php";
  document.getElementById('btn_confirmer').onclick= function(){submitForm();} ;
  alert("Ceci est une action destructrice. Prenez garde.");
}
