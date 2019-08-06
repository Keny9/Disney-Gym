<?php
/****************************************
Fichier : scriptSupprimerRendezvous.php
Auteur : Guillaume Côt.
Fonctionnalité : Script php pour supprimer un rendez-vous
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            William                   Approuvé
2019-05-03            Karl                      Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEvenement.php';

$ge = new GestionEvenement();
$ge->supprimerEvenement($_POST['identifiant'])
 ?>
