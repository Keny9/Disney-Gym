<?php
/****************************************
Fichier : scriptRecherche.php
Auteur : Guillaume Côté
Fonctionnalité : Script php pour la fonction rechercheAjax() de rendez-vous.php
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

  include_once 'gestionAffichageRendezvous.php';

  $gae = new gestionAffichageRendezvous();

  echo $gae->getTableau($_POST['column'], $_POST['critere'], $_POST['employe']);
?>
