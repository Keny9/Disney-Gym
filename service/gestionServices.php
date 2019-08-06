<?php
/****************************************
 Fichier : gestionCours.php
 Auteur : Jean-Christophe Boisvert
 Fonctionnalité : W-03 Gestion des services
 Date : Lundi 15 Avril 2019
 Vérification :
 Date                 Nom                       Approuvé
 =========================================================
 2019-05-03           Karl                      Oui
 2019-05-03           William                   Approuvé
 2019-05-03           Guillaume                 Approuvé

 Historique de modifications :
 Date                 Nom                     Description
 =========================================================
 2019-04-16           Karl Boutin             Ajout de la methode "getServicesOfForfait"
                                              pour obtenir les services d'un forfait
****************************************/

require_once('../Outils/connexion.php');
require_once("service.php");

class GestionServices
{

  public function ajouterService($service)
  {
    if (!is_a($service, 'Service')){
      echo "hein";
      return;
    }
    $tempconn = new Connexion();
    $conn = $tempconn->getConnexion();

    if ($conn->connect_error){
      $tempconn->closeConnexion();
      die("Connection failed: " . $conn->connect_error);
    }
    else{
      //Crée l'adresse
      $requete = "INSERT INTO service (id, nom, description) VALUES ('".$service->getIdService()."', '".$service->getNomService()."', '".$service->getDescriptionService()."');";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
        return;
      }

    }
  }

  public function supprimerService($id)
  {
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

      if($conn->connect_error)
      {
        $tempconn->closeConnexion();
      die("Connexion failed: " . $conn->connect_error);
      }
      else
      {
        $requete = "DELETE FROM ta_forfait_service
                    WHERE id_service = $id";
        $result = $conn->query($requete);
        if(!$result){
          trigger_error($conn->error);
          return;
        }
        $requete = "DELETE FROM service
                    WHERE id = $id";
        $result = $conn->query($requete);
        if(!$result){
          trigger_error($conn->error);
          return;
        }
      }
  }

  public function modifierService($service)
  {
    $tempconn = new Connexion();
    $conn = $tempconn->getConnexion();

    if ($conn->connect_error){
      $tempconn->closeConnexion();
      die("Connection failed: " . $conn->connect_error);
    }
    else{
      $requete = "UPDATE service SET nom = '".$service->getNomService()."', description = '".$service->getDescriptionService()."' WHERE id = '".$service->getIdService()."';";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
        return;
      }
    }
  }

  public function getService($id)
  {
    $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $service;

      if ($conn->connect_error){
        $tempconn->closeConnexion();
        die("Connection failed: " . $conn->connect_error);
      }
      else{
        $requete= "SELECT s.id, s.nom, s.description
                    FROM service AS s
                    WHERE s.id = '".$id."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }


        if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $service = new Service($row['id'], $row['nom'], $row['description']);
        }
      }
      return $service;
  }

  public function getServiceByName($name)
  {
    $connection = new Connexion();
      $conn = $connection->getConnexion();

      $gestionService = new GestionServices();
       $query = "SELECT * FROM service WHERE nom = '$name';";
       $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0)
      {
        $service = null;
      }
      else
      {
        while($row = mysqli_fetch_assoc($result))
        {
          $service = new Service($row['id'],$row['nom'],$row['description']);
        }
      }
       return $service;
  }

  public function getAllService()
  {
    $tempconn = new Connexion();
    $conn = $tempconn->getConnexion();

    if ($conn->connect_error)
    {
      $tempconn->closeConnexion();
      die("Connection failed: " . $conn->connect_error);
    }
    else
    {
      $requete = "SELECT s.id, s.nom, s.description
                  FROM service as s";
      $result = $conn->query($requete);

      if(!$result)
      {
        trigger_error($conn->error);
      }

      if ($result->num_rows > 0)
      {

        while($row = $result->fetch_assoc())
        {
          $service[] = new Service($row['id'], $row['nom'], $row['description']);
        }
      }

    }
    return $service;
    }


  /**
  * Methode qui permet d'obtenir les services d'un forfaits
  * @param idForfait le forfait dont on veut obtenir les services
  */
  public function getServicesOfForfait($idForfait){
    $connexion = new Connexion();
    $conn = $connexion->getConnexion();

    if ($conn->connect_error){
      $connexion->closeConnexion();
      die("Connection failed: " . $conn->connect_error);
    }

    $queryService = "SELECT tfs.id_service, s.nom, s.description FROM ta_forfait_service AS tfs
              INNER JOIN forfait AS f ON tfs.id_forfait = f.id
              INNER JOIN service AS s ON tfs.id_service = s.id
              WHERE tfs.id_forfait = $idForfait;";

    $resultService = mysqli_query($conn,$queryService);

    if(mysqli_num_rows($resultService) == 0){
      $service = null;
    }
    else{
      while($rowService = mysqli_fetch_assoc($resultService)){
        $service[] = new Service($rowService['id_service'],$rowService['nom'],$rowService['description']);
      }
    }
    return $service;
  }
}
?>
