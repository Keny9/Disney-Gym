<?php
/****************************************
Fichier : recherche.php
Auteur : Guillaume Côté
Fonctionnalité : Script qui récupère les données de la requete Ajax et retourne
                  le tableau à afficher.
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
2019-05-02          Karl                     Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

  include_once 'gestionAffichageClient.php';

  $gae = new gestionAffichageClient();

  echo $gae->getTableau($_POST['column'], $_POST['critere']);
?>
