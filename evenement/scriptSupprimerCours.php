<?php
/****************************************
Fichier : scriptSupprimerCours.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour supprimer un cours
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
2019-05-03            William                    Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEvenement.php';
include_once 'evenement.php';
include_once '../Outils/connexion.php';


$tempconn = new Connexion();
$conn = $tempconn->getConnexion();

$id = $_POST['no_a_modif'];

$requete = "SET AUTOCOMMIT = 0;
SET FOREIGN_KEY_CHECKS = 0;
SET UNIQUE_CHECKS = 0;

LOCK TABLES ta_client_evenement WRITE, evenement WRITE;

DELETE FROM evenement WHERE id = '$id';

DELETE FROM ta_client_evenement WHERE id_evenement = '$id';

UNLOCK TABLES;

SET AUTOCOMMIT = 1;
SET FOREIGN_KEY_CHECKS = 1;
SET UNIQUE_CHECKS = 1;";

$resultat = $conn->multi_query($requete);

trigger_error($conn->error);
header('Location: page_gestion_cours.php');
 ?>
