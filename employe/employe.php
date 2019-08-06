<?php
/****************************************
Fichier : employe.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui contient les informations relatives à un employé.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-15
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
  class Employe{
    private $identifiant;
    private $prenom;
    private $nom;
    private $poste; // Directeur, entraineur, etc.
    private $courriel;
    private $dateNaissance;
    private $dateEmbauche;
    private $telephone;
    private $nas;
    private $etat; //malade, en congé, disponible, etc.
    private $motDePasse;
    private $rue;
    private $no;
    private $ville;

    function __construct( $identifiant,
                          $nom,
                          $prenom,
                          $courriel,
                          $dateNaissance,
                          $dateEmbauche,
                          $telephone,
                          $nas,
                          $motDePasse,
                          $ville,
                          $rue,
                          $no,
                          $poste,
                          $etat){
      $this->setIdentifiant($identifiant);
      $this->setPrenom($prenom);
      $this->setNom($nom);
      $this->setPoste($poste);
      $this->setCourriel($courriel);
      $this->setDateNaissance($dateNaissance);
      $this->setDateEmbauche($dateEmbauche);
      $this->setTelephone($telephone);
      $this->setNas($nas);
      $this->setRue($rue);
      $this->setMotDePasse($motDePasse);
      $this->setVille($ville);
      $this->setNo($no);
      $this->setEtat($etat);
    }

    public function getIdentifiant(){
      return $this->identifiant;
    }

    public function setIdentifiant($identifiant){
      $this->identifiant = $identifiant;
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

    public function getPoste(){
      return $this->poste;
    }

    public function setPoste($poste){
      $this->poste = $poste;
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

    public function setDateNaissance($dateNaissance){
      $this->dateNaissance = $dateNaissance;
    }
    public function getDateEmbauche(){
      return $this->dateEmbauche;
    }

    public function setDateEmbauche($dateEmbauche){
      $this->dateEmbauche = $dateEmbauche;
    }

    public function getTelephone(){
      return $this->telephone;
    }

    public function setTelephone($telephone){
      $this->telephone = $telephone;
    }

    public function getNas(){
      return $this->nas;
    }

    public function setNas($nas){
      $this->nas = $nas;
    }

    public function getEtat(){
      return $this->etat;
    }

    public function setEtat($etat){
      $this->etat = $etat;
    }

    public function getRue(){
      return $this->rue;
    }

    public function setRue($rue){
      $this->rue = $rue;
    }

    public function getNo(){
      return $this->no;
    }

    public function setNo($no){
      $this->no = $no;
    }

    public function setVille($ville){
      $this->ville = $ville;
    }

    public function getVille(){
      return $this->ville;
    }

    public function setMotDePasse($motDePasse){
      $this->motDePasse = $motDePasse;
    }

    public function getMotDePasse(){
      return $this->motDePasse;
    }
  }
 ?>
