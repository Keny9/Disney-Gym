<?php
/****************************************
Fichier : poste.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui contient les informations relatives à un poste d'employé.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
class Poste{
  private $id;
  private $nom;
  private $description;

  function __construct($id, $nom, $description){
    $this->setId($id);
    $this->setNom($nom);
    $this->setDescription($description);
  }

  public function setId($var){$this->id = $var;}
  public function setNom($var){$this->nom = $var;}
  public function setDescription($var){$this->description = $var;}

  public function getId(){return $this->id;}
  public function getNom(){return $this->nom;}
  public function getDescription(){return $this->description;}
} ?>
