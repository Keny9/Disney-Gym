<?php
/****************************************
Fichier : evenement.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui contient les informations relatives à un evenement.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-17
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            William                     Approuvé
2019-05-03            Karl                        Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
class Evenement{
  private $id;
  private $id_modele;
  private $id_type;
  private $id_jour;
  private $identifiant_employe;
  private $date;
  private $heure;
  private $duree;
  private $prix;

  function __construct($id, $id_modele, $id_type, $id_jour, $identifiant_employe, $date, $heure, $duree, $prix){
    $this->setId($id);
    $this->setIdModele($id_modele);
    $this->setIdType($id_type);
    $this->setIdJour($id_jour);
    $this->setIdEmploye($identifiant_employe);
    $this->setDate($date);
    $this->setHeure($heure);
    $this->setDuree($duree);
    $this->setPrix($prix);
  }

  public function setId($var){$this->id = $var;}
  public function setIdModele($var){$this->id_modele = $var;}
  public function setIdType($var){$this->id_type = $var;}
  public function setIdJour($var){$this->id_jour = $var;}
  public function setIdEmploye($var){$this->identifiant_employe = $var;}
  public function setDate($var){$this->date = $var;}
  public function setHeure($var){$this->heure = $var;}
  public function setDuree($var){$this->duree = $var;}
  public function setPrix($var){$this->prix = $var;}

  public function getId(){return $this->id;}
  public function getIdModele(){return $this->id_modele;}
  public function getIdType(){return $this->id_type;}
  public function getIdJour(){return $this->id_jour;}
  public function getIdEmploye(){return $this->identifiant_employe;}
  public function getDate(){return $this->date;}
  public function getHeure(){return $this->heure;}
  public function getDuree(){return $this->duree;}
  public function getPrix(){return $this->prix;}

}
?>
