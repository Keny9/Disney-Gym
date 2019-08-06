<?php
/****************************************
Fichier : siClientExiste.php
Auteur : Guillaume Côté
Fonctionnalité : Vérifie si le client que l'on veut sélectionner existe dans la BD
Date : 2019-04-29
Vérification :
Date Nom Approuvé
2019-05-03            Karl                       Approuvé
2019-05-03            William                    Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionClient.php';

$ge = new GestionClient();

if($ge->getClient($_POST['identifiant']) == null){
  echo "Identifiant invalide";
}
else{}


 ?>
