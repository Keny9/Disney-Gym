<?php
/****************************************
Fichier : scriptUpload.php
Auteur : Guillaume Côté
Fonctionnalité : Sert à enregistrer l'image dans le dossier image du site
Date : 2019-04-17

Vérification :
Date                  Nom                       Approuvé
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/

  $data = $_POST['photo'];
  $nom = $_POST['nom'];

  list($type, $data) = explode(';', $data);
  list(, $data)      = explode(',', $data);
  $data = base64_decode($data);

  mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

  file_put_contents("../gestionExercices/img/".$nom.'.png', $data);
?>
