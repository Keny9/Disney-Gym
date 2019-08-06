<?php
/****************************************
Fichier : etat.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui contient les informations relatives à un état d'employé.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
2019-05-03            William                    Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
class Etat{
  private $id;
  private $etat;
  private $description;

  function __construct($id, $etat, $description){
    $this->setId($id);
    $this->setEtat($etat);
    $this->setDescription($description);
  }

  public function setId($var){$this->id = $var;}
  public function setEtat($var){$this->etat = $var;}
  public function setDescription($var){$this->description = $var;}

  public function getId(){return $this->id;}
  public function getEtat(){return $this->etat;}
  public function getDescription(){return $this->description;}
} ?>
