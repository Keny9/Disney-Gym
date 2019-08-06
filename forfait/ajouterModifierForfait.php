<?php
/****************************************
Fichier : gestionForfait.php
Auteur : Karl Boutin
Fonctionnalité : Classe qui va gérer les forfaits du gym
pour la fonctionnalité W-05 Gestion des types de forfait
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
  require_once('../service/service.php');
  require_once('../service/gestionServices.php');

  session_start();

  $arrServiceSelected = array(); //Les services selectionnees
  $arrService = array(); //Les services a ajouter dans la bd

  $gestionService = new GestionServices();
  $gestionForfait = new GestionForfait();

  $arrAllService = $gestionService->getAllService(); //tous les services existant
  $newId = $gestionForfait->getLastId() + 1;

  if(!empty($_POST['services'])){
    foreach($_POST['services'] as $selectedOption){
      foreach($arrAllService as $service){
        if($selectedOption == $service->getNomService()){
          $arrService[] = $service;
        }
      }
    }
  }

  if(isset($_POST['btnAjouter'])){
    $forfait = new Forfait($newId,$_POST['nomAbo'],$_POST['prix'],$_POST['description'],$_POST['duree'],$_POST['heureDebutSemaine'],$_POST['heureFinSemaine'],$_POST['heureDebutFds'],$_POST['heureFinFds'],1,$arrService);

    //Verifier si le forfait existe a ce nom
    $forfaitExist = $gestionForfait->getForfaitByName($_POST['nomAbo']);

    if($forfaitExist == null){
      $gestionForfait->add($forfait);

      foreach($arrService as $service){
        $gestionForfait->addServiceOfForfait($forfait,$service);
      }

      header("location: pgGestionForfait.php");
      exit;
    }
    else{
      $error = "Ce forfait existe déjà, veuillez changer de nom pour en créer un nouveau.";
      $_SESSION['error'] = $error;
      header("location: pgGestionForfait.php");
      exit;
    }
  }
  else if(isset($_POST['btnModifier'])){

    //Obtenir les forfaits qu'on desire Supprimer
    if(!empty($_POST['forfaits'])){
      foreach($_POST['forfaits'] as $selectedOption){
        $nom = $selectedOption;
        break;
      }
    }
    else{
      $nom = " ";
    }

    $forfait = $gestionForfait->getForfaitByName($nom);

    if($forfait == null){
      $error = "Ce forfait n'existe pas. Il ne peut pas être modifié.";
      $_SESSION['error'] = $error;
      header("location: pgGestionForfait.php");
      exit;
    }
    else{

      $newForfait = new Forfait($forfait->getId(),$_POST['nomAbo'],$_POST['prix'],$_POST['description'],$_POST['duree'],$_POST['heureDebutSemaine'],$_POST['heureFinSemaine'],$_POST['heureDebutFds'],$_POST['heureFinFds'],1,$arrService);
      $gestionForfait->update($newForfait);

      if(!empty($arrService)){
        foreach($arrService as $service){
          $gestionForfait->addServiceOfForfait($forfait,$service);
        }
      }

      header("location: pgGestionForfait.php");
      exit;
    }

  }
?>
