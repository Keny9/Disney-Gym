
function siServiceExiste(){
  $(function($) {
    $("#erreur").html("");
    var id = $("#service").children("option:selected").val();
    $.ajax({
      url: 'siServiceExiste.php',
      type:"POST",
      data: {
        'id_service': id
      },

      success: function(data) {
        if(!data){
          document.getElementById('formulaire').submit();
          supprime();
        }
        else{
        //  document.getElementById("erreur").innerHTML=data;
          $("#service").focus();
          $("#service").select();
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
    var id = $("#service").children("option:selected").val();

    $.ajax({
      url: 'supprimerService.php',
      type:"POST",
      data: {
        "id_service": id
      },
      success: function(data) {
        if(!data){
          //location.href='page_modif_employe.php';
          document.getElementById('formulaire').submit();
        }
        else{
      //    document.getElementById("erreur").innerHTML=data;
          $("#service").focus();
          $("#service").select();
        }
      } ,
      error: function() {
        alert('Error occured');
      }
    });
  });
}
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function clickSuppr(){
  $("#titre_myform").html("supprimer");
  document.formulaire.action = "";
}
