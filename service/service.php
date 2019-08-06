<?php
/****************************************
 Fichier : service.php
 Auteur : Jean-Christophe Boisvert
 Fonctionnalité : W-03 Classe de base de service
 Date : Lundi 15 Avril 2019

 Vérification :
 Date                       Nom                   Approuvé
 =========================================================
 Vendredi 3 Mai 2019  William Gonin               Approuvé
 Vendredi 3 Mai 2019  Guillaume Côté              Approuvé
 2019-05-03           Karl Boutin                 Approuvé

 Historique de modifications :
 Date                       Nom                 Description
 =========================================================

****************************************/

class service
{
  private $id_service;
  private $nom_service;
  private $description_service;


  function __construct($id_s, $nom_s, $description_s)//, $cout_s)
  {
    $this->id_service = $id_s;
    $this->nom_service = $nom_s;
    $this->description_service = $description_s;

  }

  public function getIdService()
  {
      return $this->id_service;
  }
  public function setIdService($id_s)
  {
    $this->id_service = $id_s;
  }

  public function getNomService()
  {
    return $this->nom_service;
  }
  public function setNomService($nom_s)
  {
    $this->nom_service = $nom_s;
  }

  public function getDescriptionService()
  {
    return $this->description_service;
  }
  public function setDescritionService($description_s)
  {
    $this->description_service = $description_s;
  }


}
?>
