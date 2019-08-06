<?php
/****************************************
Fichier : scriptAjouterCours.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour ajouter un cours
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEvenement.php';
include_once 'evenement.php';

$ge = new GestionEvenement();
$event = new Evenement( $_POST['id'],
                          $_POST['modele'],
                          1, // Le type d'Evenement
                          null, // Le jour, toujours à null
                          $_POST['instructeur'],
                          $_POST['date'],
                          $_POST['heure'],
                          $_POST['duree'],
                          $_POST['prix']);
$ge->ajouterEvenement($event);

header('Location: page_gestion_cours.php');
 ?>
