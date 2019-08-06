<?php
/****************************************
Fichier : scriptModifCours.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour modifier un cours
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

$tempconn = new Connexion();
$conn = $tempconn->getConnexion();

$newId = $_POST['id'];
$oldId = $_POST['old_id'];

    //Fait la modification*/
$requete = "SET AUTOCOMMIT = 0;
SET FOREIGN_KEY_CHECKS = 0;
SET UNIQUE_CHECKS = 0;

LOCK TABLES ta_client_evenement WRITE, evenement WRITE;

UPDATE evenement SET id = '$newId'
WHERE id = '$oldId';

UPDATE ta_client_evenement
          SET id_evenement = '$newId'
          WHERE id_evenement = '$oldId';

UNLOCK TABLES;

SET AUTOCOMMIT = 1;
SET FOREIGN_KEY_CHECKS = 1;
SET UNIQUE_CHECKS = 1;";

$resultat = $conn->multi_query($requete);

$ge->modifierEvenement($event, $newId);
trigger_error($conn->error);
header('Location: page_gestion_cours.php');
 ?>
