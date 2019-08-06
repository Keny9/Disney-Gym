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
  require_once('../Outils/connexion.php');
  require_once('forfait.php');
  require_once('../service/gestionServices.php');

  class GestionForfait{

    /**
    * Methode pour obtenir un forfait de la bd
    * @param id identifiant du forfait qu'on desire recuperer
    */
    public function getForfait($id){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $gestionService = new GestionServices();

      $query = "SELECT * FROM forfait WHERE id = $id;";
      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0){
        $forfait = null;
      }
      else{
        $row = mysqli_fetch_assoc($result);
        $arrService = $gestionService->getServicesOfForfait($id);
        $forfait = new Forfait($row['id'],$row['nom'],$row['prix'],$row['description'],$row['duree'],$row['heure_debut_semaine'],$row['heure_fin_semaine'],$row['heure_debut_fds'],$row['heure_fin_fds'],$row['etat'],$arrService);
      }
      return $forfait;
    }


    /**
    * Methode pour obtenir un forfait de la bd
    * @param name nom du forfait qu'on desire recuperer
    */
    public function getForfaitByName($name){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $gestionService = new GestionServices();

      $query = "SELECT * FROM forfait WHERE nom = '$name';";
      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0){
        $forfait = null;
      }
      else{
        $row = mysqli_fetch_assoc($result);
        $arrService = $gestionService->getServicesOfForfait($row['id']);
        $forfait = new Forfait($row['id'],$row['nom'],$row['prix'],$row['description'],$row['duree'],$row['heure_debut_semaine'],$row['heure_fin_semaine'],$row['heure_debut_fds'],$row['heure_fin_fds'],$row['etat'],$arrService);
      }
      return $forfait;
    }

    /**
    * Obtenir tous les forfaits disponibles auquels un client peut adérer
    */
    public function getAllForfait(){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $gestionService = new GestionServices();

      $query = "SELECT * FROM forfait;";
      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0){
        $forfait = null;
      }
      else{
        while($row = mysqli_fetch_assoc($result)){
          $arrService = $gestionService->getServicesOfForfait($row['id']);
          $forfait[] = new Forfait($row['id'],$row['nom'],$row['prix'],$row['description'],$row['duree'],$row['heure_debut_semaine'],$row['heure_fin_semaine'],$row['heure_debut_fds'],$row['heure_fin_fds'],$row['etat'],$arrService);
        }
      }

      return $forfait;
    }

    /**
    * Obtenir tous les forfaits disponibles auquels un client peut adérer sous forme de donnees
    */
    public function getAllForfaitData(){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $data = array();

      $query = "SELECT * FROM forfait;";
      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0){
        $data = null;
      }
      else{
        while($row = mysqli_fetch_assoc($result)){
          $data[] = $row;
        }
      }
      return $data;
    }

    /**
    * Retourne le dernier id utiliser pour un forfait pour pouvoir appliquer le id
    * suivant a notre objet
    *
    */
    public function getLastId(){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $query = "SELECT MAX(ID) as id FROM forfait;";
      $result = mysqli_query($conn,$query);

      $row = mysqli_fetch_assoc($result);
      $lastId = $row['id'];

      return $lastId;
    }

    /**
    * Ajouter un forfait dans la base de donnee et qui existera desormais dans le gym pour etre
    * offert aux utilisateurs
    * @param forfait
    * @param arrService le tableau de service des forfaits
    */
    public function add(Forfait $forfait){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $query = "INSERT INTO forfait(nom, prix, description, duree, heure_debut_semaine, heure_fin_semaine, heure_debut_fds, heure_fin_fds,etat) VALUES
              ('".$forfait->getNom()."', '".$forfait->getPrix()."', '".$forfait->getDescription()."','".$forfait->getDuree()."',
              '".$forfait->getHeureDebutSemaine()."','".$forfait->getHeureFinSemaine()."','".$forfait->getHeureDebutFds()."','".$forfait->getHeureFinFds()."',
              '".$forfait->getEtat()."');";

      $result = $conn->query($query);
      if(!$result){
        trigger_error($conn->error);
      }
  }

  /**
  * Creer les liens entre les forfaits et les services que contient dans la table d'association de la bd
  * @param forfait le forfait
  * @param arrService les services liés au forfait
  */
  public function addServiceOfForfait(Forfait $forfait, Service $service){
    $connection = new Connexion();
    $conn = $connection->getConnexion();

    $query = "INSERT INTO ta_forfait_service(id_forfait, id_service) VALUES ('".$forfait->getId()."', '".$service->getIdService()."');";

    $result = $conn->query($query);

    if(!$result){
      trigger_error($conn->error);
    }
  }

  /**
  * Modifier un forfait de la base de donnee par de nouvelles informations
  * @param forfait Le forfait qu'on a modifier
  */
  public function update(?Forfait $forfait){

    if($forfait != null){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $query = "UPDATE forfait SET nom = '".$forfait->getNom()."', prix = '".$forfait->getPrix()."', description = '".$forfait->getDescription()."',
       duree = '".$forfait->getDuree()."', heure_debut_semaine = '".$forfait->getHeureDebutSemaine()."', heure_fin_semaine = '".$forfait->getHeureFinSemaine()."',
       heure_debut_fds = '".$forfait->getHeureDebutFds()."', heure_fin_fds = '".$forfait->getHeureFinFds()."', etat = '".$forfait->getEtat()."' WHERE id = '".$forfait->getId()."';";

      $result = $conn->query($query);

      if(!$result){
        trigger_error($conn->error);
      }
    }

  }

  /**
  * Supprimer un forfait
  * @param forfait
  */
  public function delete(?Forfait $forfait){

    if($forfait != null){
      $connection = new Connexion();
      $conn = $connection->getConnexion();

      $query = "UPDATE forfait SET etat = 0 WHERE id = '".$forfait->getId()."';";

      $result = $conn->query($query);

      if(!$result){
        trigger_error($conn->error);
      }
    }
  }

  }
?>
