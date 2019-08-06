<?php
/****************************************
Fichier : siExerciceExiste.php
Auteur : William Gonin
Fonctionnalité : Script php pour verifier si l'exercice existe
Date : 2019-04-24
Vérification :
Date                            Nom               Approuvé
2019-05-03                    Guillaume           Approuvé
2019-05-03                     Karl               Oui
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

include_once 'gestionExercices.php';

$ge = new GestionExercices();

//return $ge->getEmploye($_POST['identifiant']);
if($ge->getExercice($_POST['identifiant']) == null){
  echo "Identifiant invalide";
}
else{}

 ?>
