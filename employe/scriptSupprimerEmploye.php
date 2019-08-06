<?php
/****************************************
Fichier : scriptSupprimerEmploye.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour modifier un employe
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
include_once 'employe.php';

$ge = new GestionEmploye();
$tempconn = new Connexion();
$conn = $tempconn->getConnexion();
$emp = $_POST['idEmploye'];
$requete = "SET AUTOCOMMIT = 0;
SET FOREIGN_KEY_CHECKS = 0;
SET UNIQUE_CHECKS = 0;

LOCK TABLES employe WRITE, evenement WRITE;

DELETE FROM evenement WHERE identifiant_employe = '$emp';

DELETE FROM employe WHERE identifiant = '$emp';

UNLOCK TABLES;

SET AUTOCOMMIT = 1;
SET FOREIGN_KEY_CHECKS = 1;
SET UNIQUE_CHECKS = 1;";

$resultat = $conn->multi_query($requete);
if(!$resultat){
  trigger_error($conn->error);
}

echo $_POST['idEmploye'];

header('Location: page_employe_gestion.php');
 ?>
