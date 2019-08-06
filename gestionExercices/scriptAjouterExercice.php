<?php
/****************************************
Fichier : scriptAjouterExercice.php
Auteur : William Gonin
Fonctionnalité : Script php pour ajouter un exercice
Date : 2019-04-24
Vérification :
Date                  Nom                       Approuvé
2019-05-03          Guillaume                   Approuvé
2019-05-03            Karl                      Oui
=========================================================
Historique de modifications :
Date                    Nom                   Description
=========================================================
****************************************/
include_once 'gestionExercices.php';
include_once 'exercice.php';

$ge = new gestionExercices();
$exercice = new Exercice( $_POST['type'],
                        $_POST['nom'],
                        $_POST['description'],
                        'img/'.$_POST['nom'].'.png');
$ge->ajouterExercices($exercice);

 ?>
