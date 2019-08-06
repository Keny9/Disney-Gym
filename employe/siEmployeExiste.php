<?php
/****************************************
Fichier : siEmployeExiste.php
Auteur : Maxime Lussier
Fonctionnalité : Vérifie si l'employe existe dans la Base de donnée
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEmploye.php';

$ge = new GestionEmploye();

if($ge->getEmploye($_POST['identifiant']) == null){
  echo "Identifiant invalide";
}
else{}


 ?>
