<?php
/****************************************
Fichier : recherche.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour la fonction rechercheAjax() de employe.js
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

  include_once 'gestionAffichageEmploye.php';

  $gae = new gestionAffichageEmploye();

  echo $gae->getTableau($_POST['column'], $_POST['critere']);
?>
