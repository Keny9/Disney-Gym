<?php
/****************************************
Fichier : gestionEvenement.php
Auteur : Maxime Lussier
Fonctionnalité : Objet qui s'occupe de faire la communication avec la BD
en ce qui concerne les evenements
Date : 2019-04-15
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once '../Outils/connexion.php';
include_once 'evenement.php';
include_once 'modele.php';

class GestionEvenement{
  /*
    Retourne l'evenement dans la BD avec l'id passé en paramètre
  */
  public function getEvenement($id){
    $tempconn = new Connexion();
    $conn = $tempconn->getConnexion();
    $evenement = null;

    $requete= "SELECT * FROM evenement WHERE id = '$id';";

    $result = $conn->query($requete);
    if(!$result){
      trigger_error($conn->error);
    }

    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $evenement = new Evenement($row['id'], $row['id_modele'], $row['id_type'], $row['id_jour'], $row['identifiant_employe'], $row['date'], $row['heure'], $row['duree'], $row['prix']);
    }
    return $evenement;
  }


  /*
    Retourne un tableau contenant tous les evenements contenus dans la BD
    Prend des critères de recherche en paramètres.
    Le paramètre doit être 'null' s'il ne contient pas de critère de recherche
  */
    public function getAllEvenement($column, $critere){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $evenement = null;

      $requete= "SELECT * FROM evenement";


      if($critere != "" || $critere != null){
        $requete .= " WHERE ".$column." LIKE '%{$critere}%';";
      }

    $result = $conn->query($requete);
    if(!$result){
      trigger_error($conn->error);
    }

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $evenement[] = new Evenement($row['id'], $row['id_modele'], $row['id_type'], $row['id_jour'], $row['identifiant_employe'], $row['date'], $row['heure'], $row['duree'], $row['prix']);
      }
    }
    return $evenement;
  }

    /*
    Ajoute un employe à la BD ainsi que son adresse
    */
  public function ajouterEvenement($evenement){
    if (!is_a($evenement, 'Evenement')){
      trigger_error("L'objet en paramètre doit être un evenement");
      return;
    }
    else{
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

      //Crée l'evenement
      $requete= "INSERT INTO evenement VALUES(
                  '".$evenement->getId()."',
                  '".$evenement->getIdModele()."',
                  '".$evenement->getIdType()."',
                  null,
                  '".$evenement->getIdEmploye()."',
                  '".$evenement->getDate()."',
                  '".$evenement->getHeure()."',
                  '".$evenement->getDuree()."',
                  '".$evenement->getPrix()."');";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }
    }
  }

  /*
      Modifie un evenement dans la BD
      Le paramètre oldId contient l'identifiant de l'evenement avant la modification,
      puisque l'identifiant peut être modifié et qu'il est la clé primaire
  */
  public function modifierEvenement($evenement, $oldId){
    /*if (!is_a($evenement, 'Evenement')){
      echo "L'objet en paramètre doit être un evenement";
      return;
    }*/
  /*  else*/{
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

      $requete= "UPDATE evenement
                SET id = '".$evenement->getId()."',
                id_modele = '".$evenement->getIdModele()."',
                id_type = '1',
                id_jour = null,
                identifiant_employe = '".$evenement->getIdEmploye()."',
                date = '".$evenement->getDate()."',
                heure = '".$evenement->getHeure()."',
                duree = '".$evenement->getDuree()."',
                prix = '".$evenement->getPrix()."'
                WHERE id = '$oldId';";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }
    }
  }

  /*
    Supprime un evenement dans la BD en prenant son identifiant en paramètre
  */
    public function supprimerEvenement($idEvenement){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

      $requete= "DELETE FROM ta_client_evenement
                WHERE id_evenement = '$idEvenement';";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

      $requete= "DELETE FROM evenement
                WHERE id = '$idEvenement';";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }
    }

    public function getAllModele(){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $modele = null;

      $requete= "SELECT * FROM modele_cours;";
      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }
      else{
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $modele[] = new Modele($row['id'], $row['nom']);
          }
        }
      }
      return $modele;
    }

/*
   Retourne un tableau contenant tous les cours contenus dans la BD (evenement)
 */
 public function getAllCours(){
     $tempconn = new Connexion();
     $conn = $tempconn->getConnexion();
     $evenement = null;

     $requete= "SELECT * FROM evenement WHERE id_type = 1;";

   $result = $conn->query($requete);
   if(!$result){
     trigger_error($conn->error);
   }

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
      $evenement[] = new Evenement($row['id'], $row['id_modele'], $row['id_type'], $row['id_jour'], $row['identifiant_employe'], $row['date'], $row['heure'], $row['duree'], $row['prix']);
     }
   }
   return $evenement;
 }

 /*
   Retourne le nom d'un cours à l'aide du type de cours
 */
 public function getNomCours($modele){
     $tempconn = new Connexion();
     $conn = $tempconn->getConnexion();
     $evenement = null;

     $requete= "SELECT nom FROM modele_cours WHERE id = '$modele';";

   $result = $conn->query($requete);
   if(!$result){
     trigger_error($conn->error);
   }

   if($result->num_rows > 0){
     $row = $result->fetch_assoc();
     return $row['nom'];
   }
   return null;
 }

 /*
   Retourne le nom d'un poste d'employe à l'aide de l'id du poste
 */
 public function getPosteEmploye($idPoste){
     $tempconn = new Connexion();
     $conn = $tempconn->getConnexion();
     $evenement = null;

     $requete= "SELECT nom FROM poste_employe WHERE id = '$idPoste';";

   $result = $conn->query($requete);
   if(!$result){
     trigger_error($conn->error);
   }

   if($result->num_rows > 0){
     $row = $result->fetch_assoc();
     return $row['nom'];
   }
   return null;
 }

 /*
   Retourne un tableau contenant tous les rendez-vous contenus dans la BD (evenement)
 */
 public function getAllRendezvous(){
     $tempconn = new Connexion();
     $conn = $tempconn->getConnexion();
     $evenement = null;

     $requete= "SELECT * FROM evenement WHERE id_type = 2;";

   $result = $conn->query($requete);
   if(!$result){
     trigger_error($conn->error);
   }

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       $evenement[] = new Evenement($row['id'], $row['id_modele'], $row['id_type'], $row['id_jour'], $row['identifiant_employe'], $row['date'], $row['heure'], $row['duree'], $row['prix']);
     }
   }
   return $evenement;
 }

}
 ?>
