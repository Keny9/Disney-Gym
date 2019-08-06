<?php
/****************************************
Fichier : scriptSupprimerExercice.php
Auteur : William Gonin
Fonctionnalité : Script php pour supprimer un exercice
Date : 2019-04-24
Vérification :
Date                        Nom                   Approuvé
2019-05-03                Guillaume               Approuvé
2019-05-03                  Karl                  Oui
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionExercices.php';
include_once 'exercice.php';

$ge = new GestionExercices();

$ge->supprimerExercices($_POST['idExercice']);
header('Location: htmlExercice.php');
 ?>
