<?php
/****************************************
Fichier : gestionStats.php
Auteur : Guillaume Côté
Fonctionnalité : Classe qui va gérer les statistiques du SI
Date : 2019-04-17

Vérification :
Date                  Nom                       Approuvé
2019-04-24           William                    Approuvé
2019-04-25            Karl                      Approuvé
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/

include_once '../Outils/connexion.php';
include_once 'stats.php';
include_once '../forfait/gestionForfait.php';
include_once '../evenement/gestionEvenement.php';
include_once '../client/gestionClient.php';

  class GestionStats{
    /**
    * Obtenir tous les stats sur les forfaits de la base de donnée.
    * Retourne une liste de stats
    */
    public function getStatsForfaits(){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $geForfait = new GestionForfait();
      $forfait = $geForfait->getAllForfait();

      $array;
      $statsForfaits;

      for($i = 0; $i < count($forfait); $i++){
        $requete= "SELECT COUNT(nom) FROM client WHERE id_forfait = '".$forfait[$i]->getId()."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        while($row = $result->fetch_assoc()) {
          $array[0] = $forfait[$i]->getNom();
          $array[1] = $row['COUNT(nom)'];
          $statsForfaits[] = new Stats($array);
        }
      }

      return $statsForfaits;
    }

    /**
    * Obtenir tous les stats sur les cours de la base de donnée.
    * Retourne une liste de stats.

    */
    public function getStatsCours(){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $geCours = new GestionEvenement();
      $cours = $geCours->getAllCours();


      $array=NULL;
      $stats=NULL;


      for($i = 0; $i < count($cours); $i++){
        $requete= "SELECT COUNT(id_evenement) FROM ta_client_evenement WHERE id_evenement = '".$cours[$i]->getId()."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        while($row = $result->fetch_assoc()) {
          $array[0] = $geCours->getNomCours($cours[$i]->getIdModele());
          $array[1] = $cours[$i]->getDate();
          $array[2] = $row['COUNT(id_evenement)'];
          $stats[] = new Stats($array);
        }
      }

      return $stats;
    }


    /**
    * Obtenir tous les stats sur les rendez-vous de la base de donnée.
    * Retourne une liste de stats
    */
    public function getStatsEmploye(){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $geEve = new GestionEvenement();
      $rendezvous = $geEve->getAllRendezvous();


      $array;
      $stats;


      for($i = 0; $i < count($rendezvous); $i++){

        $requete= "SELECT COUNT(poste.nom)
                    FROM evenement
                    INNER JOIN employe AS emp ON identifiant_employe = identifiant
                    INNER JOIN poste_employe AS poste ON id_poste = poste.id
                    WHERE id_type = 2 AND poste.id = '".$id."';";

        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        while($row = $result->fetch_assoc()) {
          $array[0] = $geEve->getPosteEmploye($rendezvous[$i]->getIdType());
          $array[1] = $row['COUNT(poste.nom)'];
          $stats[] = new Stats($array);
        }
      }

      return $stats;
    }

    /**
    * Obtenir tous les stats sur les rendez-vous de la base de donnée.
    * Retourne une liste de stats
    */
    function getAllForfaitClient($client){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

      $array;
      $forfait = null;

      $requete = "SELECT nom, date_debut, date_echeance
                  FROM ta_forfait_client
                  INNER JOIN forfait AS forfait ON id_forfait = id
                WHERE identifiant_client = '".$client->getIdentifiant()."';";

      $result = $conn->query($requete);

      if(!$result){
        trigger_error($conn->error);
      }

      while($row = $result->fetch_assoc()){
        $array[0] = $row['nom'];
        $array[1] = $row['date_debut'];
        $array[2] = $row['date_echeance'];

        $forfait[] = new Stats($array);
      }

      return $forfait;
    }

    public function getAllCoursClient($client){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $cours = null;

      $requete= "SELECT nom, date
                  FROM ta_client_evenement
                    INNER JOIN evenement AS evenement ON id_evenement = id
                    INNER JOIN modele_cours AS modele ON id_modele = modele.id
                  WHERE id_type = 1 AND id_client = '".$client->getIdentifiant()."';";


      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $array[0] = $row['nom'];
          $array[1] = $row['date'];

          $cours[] = new Stats($array);
        }
      }
        return $cours;
      }

      /**
      * Obtenir tous les infos des rendez vous d'un client
      * Retourne une liste de stats
      */
      public function getAllRendezvousClient($client){
        $tempconn = new Connexion();
        $conn = $tempconn->getConnexion();
        $evenement = null;

        $requete= "SELECT id_evenement, date, heure, poste_employe.nom
                   FROM ta_client_evenement
                      INNER JOIN evenement AS evenement ON id_evenement = id
                      INNER JOIN employe AS employe ON identifiant_employe = identifiant
                      INNER JOIN poste_employe AS poste_employe ON poste_employe.id = id_poste
                    WHERE id_type = 2 AND id_client = '".$client->getIdentifiant()."';";


        $result = $conn->query($requete);
        if(!$result){
          trigger_error($conn->error);
        }

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $array[0] = $row['id_evenement'];
            $array[1] = $row['date'];
            $array[2] = $row['heure'];
            $array[3] = $row['nom'];

            $evenement[] = new Stats($array);
          }
        }
          return $evenement;
        }


        /**
        * Obtenir tous les stats sur les rendez-vous d'un employe de la base de donnée.
        * Retourne une liste de stats
        */
        public function getAllRendezvousCritere($column, $critere, $identifant){
            $tempconn = new Connexion();
            $conn = $tempconn->getConnexion();
            $stats = null;

            $requete= "SELECT evenement.id, ta_client_evenement.id_client, date, poste.nom FROM evenement
                        INNER JOIN employe AS employe ON identifiant = identifiant_employe
                        INNER JOIN poste_employe AS poste ON poste.id = id_poste
                        INNER JOIN ta_client_evenement as ta_client_evenement ON ta_client_evenement.id_evenement = evenement.id
                        WHERE id_type = 2 AND identifiant_employe = '$identifant'";

            if($critere != ""){
              $requete .= " AND ".$column." LIKE '%{$critere}%';";
            }

          $result = $conn->query($requete);
          if(!$result){
            trigger_error($conn->error);
          }

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $array[0] = $row['id'];
              $array[1] = $row['id_client'];
              $array[2] = $row['date'];
              $array[3] = $row['nom'];

              $stats[] = new Stats($array);
            }
          }
          return $stats;
        }

  }
?>
