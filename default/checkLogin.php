<?php
/****************************************
Fichier : checkLogin.php
Auteur : Karl Boutin
Fonctionnalité : Script php pour verifier si un employe est bel et bien connecter
et qu'il a bien le droit d'accéder à la page
Date : 2019-04-24
Vérification :
Date Nom Approuvé

=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

if($_SESSION['loggedIn']){
  $employe = $_SESSION['employe'];
}
else{
  header('Location: ../authentification/authentification.php');
}

?>
