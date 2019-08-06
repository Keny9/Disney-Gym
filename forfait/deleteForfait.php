<?php
/****************************************
Fichier : deleteForfait.php
Auteur : Karl Boutin
Fonctionnalité : Script quand un forfait est supprimé
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
=========================================================
2019-05-03            William Gonin               Approuvé
2019-05-03            Guillaume Côté              Approuvé
2019-05-03            Maxime Lussier              Approuvé

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/

  require_once('forfait.php');
  require_once('gestionForfait.php');

  $gestionForfait = new GestionForfait();

  //Obtenir les forfaits qu'on desire Supprimer
  if(!empty($_POST['forfaits'])){
    foreach($_POST['forfaits'] as $selectedOption){
      $forfait = $gestionForfait->getForfaitByName($selectedOption);
      $gestionForfait->delete($forfait);
    }
    header('Location: pgGestionForfait.php');
    exit;
  }else {
    $error = "Veuillez sélectionner un forfait que vous désirez supprimer.";
    $_SESSION['error'] = $error;
    header('Location: pgGestionForfait.php');
    exit;
  }

?>
