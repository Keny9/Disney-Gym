<?php
/****************************************
Fichier : siRendezvousExiste.php
Auteur : Guillaume Côté
Fonctionnalité : Script php pour vérifier si le rendez-vous existe dans la BD
Date : 2019-05-01
Vérification :
Date                  Nom                       Approuvé
2019-05-03            William                   Approuvé
2019-05-03            Karl                      Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEvenement.php';

$ge = new GestionEvenement();


if($ge->getEvenement($_POST['identifiant']) == null){
  echo "Identifiant invalide";
}
else{}


?>
