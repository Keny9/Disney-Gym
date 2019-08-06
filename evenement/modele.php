<?php
/****************************************
Fichier : modele.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui contient les informations relatives à un modele de cours.
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
class Modele{
  private $id;
  private $nom;

  function __construct($id, $nom){
    $this->setId($id);
    $this->setNom($nom);
  }

  public function setId($var){$this->id = $var;}
  public function setNom($var){$this->nom = $var;}

  public function getId(){return $this->id;}
  public function getNom(){return $this->nom;}
} ?>
