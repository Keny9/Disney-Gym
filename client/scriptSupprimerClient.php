<?php
/****************************************
Fichier : scriptSupprimerClient.php
Auteur : Guillaume Côt.
Fonctionnalité : Script php pour supprimer un client
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionClient.php';

$ge = new GestionClient();
$ge->supprimerClient($_POST['identifiant'])
 ?>
