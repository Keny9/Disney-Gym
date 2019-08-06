<?php
/****************************************
Fichier : forfait.php
Auteur : Karl Boutin
Fonctionnalité : Classe qui représente un forfait dans le gym
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

class Forfait{

  private $id;
  private $nom;
  private $prix;
  private $description;
  private $duree;
  private $heureDebutSemaine;
  private $heureFinSemaine;
  private $heureDebutFds;
  private $heureFinFds;
  private $etat;
  private $arrService = array();

  /**
  * Constructeur d'un forfait
  * @param id
  * @param nom
  * @param prix
  * @param description
  * @param duree
  * @param arrService tableau de tous les services compris dans le forfait
  */
  function __construct($id,$nom,$prix,$description,$duree,$heureDebutSemaine,$heureFinSemaine,$heureDebutFds,$heureFinFds,$etat,$arrService){
    $this->setId($id);
    $this->setNom($nom);
    $this->setPrix($prix);
    $this->setDescription($description);
    $this->setDuree($duree);
    $this->setService($arrService);
    $this->setHeureDebutSemaine($heureDebutSemaine);
    $this->setHeureFinSemaine($heureFinSemaine);
    $this->setHeureDebutFds($heureDebutFds);
    $this->setHeureFinFds($heureFinFds);
    $this->setEtat($etat);
  }

  /**
  * Appliquer un id au forfaits
  * @param id
  */
  public function setId($id){
    $this->id = $id;
  }

  /**
  * Appliquer un nom au forfait
  * @param nom
  */
  public function setNom($nom){
    $this->nom = $nom;
  }

  /**
  * Appliquer un prix au forfait
  * @param prix
  */
  public function setPrix($prix){
    $this->prix = $prix;
  }

  /**
  * Appliquer une description au forfait
  * @param description
  */
  public function setDescription($description){
    $this->description = $description;
  }

  /**
  * Appliquer une duree au forfait
  * @param duree
  */
  public function setDuree($duree){
    $this->duree = $duree;
  }

  /**
  * Appliquer des services a un forfait
  * @param arrService tableau des services
  */
  public function setService($arrService){
    $this->arrService = $arrService;
  }

  /**
  * Appliquer un etat au forfaits
  * @param etat
  */
  public function setEtat($etat){
    $this->etat = $etat;
  }

  /**
  * Appliquer l'heure de debut a laquelle on peut s'entrainer pendant la semaine
  * @param heureDebutSemaine
  */
  public function setHeureDebutSemaine($heureDebutSemaine){
    $this->heureDebutSemaine = $heureDebutSemaine;
  }

  /**
  * Appliquer l'heure de fin a laquelle on peut s'entrainer pendant la semaine
  * @param heureFinSemaine
  */
  public function setHeureFinSemaine($heureFinSemaine){
    $this->heureFinSemaine = $heureFinSemaine;
  }

  /**
  * Appliquer l'heure de debut a laquelle on peut s'entrainer pendant la fin de semaine
  * @param heureFinFds
  */
  public function setHeureDebutFds($heureDebutFds){
    $this->heureDebutFds = $heureDebutFds;
  }

  /**
  * Appliquer l'heure de fin a laquelle on peut s'entrainer pendant la fin de semaine
  * @param heureFinFds
  */
  public function setHeureFinFds($heureFinFds){
    $this->heureFinFds = $heureFinFds;
  }

  public function getId(){
    return $this->id;
  }

  public function getNom(){
    return $this->nom;
  }

  public function getPrix(){
    return $this->prix;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getDuree(){
    return $this->duree;
  }

  public function getHeureDebutSemaine(){
    return $this->heureDebutSemaine;
  }

  public function getHeureFinSemaine(){
    return $this->heureFinSemaine;
  }

  public function getHeureDebutFds(){
    return $this->heureDebutFds;
  }

  public function getHeureFinFds(){
    return $this->heureFinFds;
  }

  public function getServices(){
    return $this->arrService;
  }

  public function getEtat(){
    return $this->etat;
  }

}
?>
