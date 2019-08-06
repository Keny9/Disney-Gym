<?php
/****************************************
Fichier : client.php
Auteur : Guillaume Côté
Fonctionnalité : Objet qui contient les informations relatives à un client.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-15
Vérification :
Date Nom Approuvé
2019-04-24            William                   Approuvé
2019-04-28            Karl                      Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
  class Client{
    private $identifiant;
    private $id_forfait;
    private $prenom;
    private $nom;
    private $courriel;
    private $date_naissance;
    private $telephone;
    private $mot_de_passe;

    function __construct($identifiant, $id_forfait, $nom, $prenom, $date_naissance, $courriel, $telephone, $mot_de_passe){
      $this->setIdentifiant($identifiant);
      $this->setIdForfait($id_forfait);
      $this->setPrenom($prenom);
      $this->setNom($nom);
      $this->setCourriel($courriel);
      $this->setDateNaissance($date_naissance);
      $this->setTelephone($telephone);
      $this->setMotDePasse($mot_de_passe);
    }

    public function getIdentifiant(){
      return $this->identifiant;
    }

    public function setIdentifiant($identifiant){
      $this->identifiant = $identifiant;
    }

    public function setIdForfait($id_forfait){
      $this->id_forfait = $id_forfait;
    }

    public function getIdForfait(){
      return $this->id_forfait;
    }

    public function getPrenom(){
      return $this->prenom;
    }

    public function setPrenom($prenom){
      $this->prenom = $prenom;
    }

    public function getNom(){
      return $this->nom;
    }

    public function setNom($nom){
      $this->nom = $nom;
    }

    public function getCourriel(){
      return $this->courriel;
    }

    public function setCourriel($courriel){
      $this->courriel = $courriel;
    }

    public function getDateNaissance(){
      return $this->dateNaissance;
    }

    public function setDateNaissance($date_naissance){
      $this->dateNaissance = $date_naissance;
    }

    public function getTelephone(){
      return $this->telephone;
    }

    public function setTelephone($telephone){
      $this->telephone = $telephone;
    }

    public function getMotDePasse(){
      return $this->mot_de_passe;
    }

    public function setMotDePasse($mot_de_passe){
      $this->mot_de_passe = $mot_de_passe;
    }
  }
 ?>
