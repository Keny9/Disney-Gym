<?php
/****************************************
Fichier : rechercheEvenement.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour la fonction recherche de cours.js
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

  include_once 'gestionAffichageEvenement.php';

  $gae = new gestionAffichageEvenement();

  echo $gae->getTableau($_POST['no_cours']);
?>
