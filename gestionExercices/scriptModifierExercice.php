<?php
/****************************************
Fichier : scriptModifierExercice.php
Auteur : William Gonin
Fonctionnalité : Script php pour modifier un exercice
Date : 2019-04-24
Vérification :
Date                  Nom                       Approuvé
2019-05-03          Guillaume                   Approuvé
2019-05-03          Karl                        Oui
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'GestionExercices.php';
include_once 'exercice.php';
include_once '../Outils/connexion.php';

$ge = new GestionExercices();
$exercice = new Exercice(
                        $_POST['type'],
                        $_POST['nom'],
                        $_POST['description'],
                        $_POST['image']);
$exercice->setId_exercice($_POST['id']);

$tempconn = new Connexion();
$conn = $tempconn->getConnexion();

$ge->modifierExercices($exercice);
?>
