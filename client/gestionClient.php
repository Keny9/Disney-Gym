<?php
/****************************************
Fichier : gestionnaireClient.php
Auteur : Guillaume Côté
Fonctionnalité : Classe qui va gérer les clients du gym
pour la fonctionnalité W-06 Gestion des clients
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
2019-04-24           William                   Approuvé et j'ai rajouter des tests
2019-04-28           Karl                       Approuvé
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
2019-04-17            Guillaume               Ajout de l'inscription
****************************************/

include_once '../Outils/connexion.php';
include_once 'client.php';
include_once '../forfait/gestionForfait.php';

  class GestionClient{
    /**
    * Obtenir tous les clients de la base de donnée.
    * Retourne une liste de clients
    */
    public function getAllClient($column, $critere){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $clients = null;

      $requete= "SELECT * FROM client";

      if($critere != ""){
        $requete .= " WHERE ".$column." LIKE '%{$critere}%';";
      }

      $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $clients[] = new Client($row['identifiant'], $row['id_forfait'], $row['nom'], $row['prenom'], $row['date_naissance'], $row['courriel'],$row['telephone'], $row['mot_de_passe']);
          }
      }
      return $clients;
    }

    /**
    * Methode qui permet de recuperer un client seulement à partir son identifiant
    * Retourne un client
    * @param identifiant
    */
    public function getClient($identifiant){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();
      $client = null;

        $requete= "SELECT *  FROM client WHERE identifiant = '".$identifiant."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }


        if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $client = new Client($row['identifiant'], $row['id_forfait'], $row['nom'], $row['prenom'], $row['date_naissance'], $row['courriel'],$row['telephone'], $row['mot_de_passe']);
        }

      return $client;
    }

    /**
    * Lors de la connexion d'un client, on cherche dans la base de donnee
    * a l'aide de l'identifiant et du mot de passe
    * Retourne un client
    * @param identifiant
    * @param password
    */
    public function login($identifiant, $password){
      $tempconn = new Connexion();
      $conn = $tempconn->getConnexion();

        $requete= "SELECT * FROM client WHERE identifiant = '".$identifiant."' AND mot_de_passe = '".$password."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        if(mysqli_num_rows($result)==0){
          $client = null;
        }
        else{
          $row = $result->fetch_assoc();
          $client = new Client($row['identifiant'], $row['id_forfait'], $row['nom'], $row['prenom'], $row['date_naissance'], $row['courriel'],$row['telephone'], $row['mot_de_passe']);
        }

      return $client;
    }

    /*
      Ajoute un client à la BD (inscription)
    */
      public function inscription($client){
        if (!is_a($client, 'Client')){
          return;
        }
        $tempconn = new Connexion();
        $conn = $tempconn->getConnexion();

          //Vérifie s'il n'y a pas de client avec le meme identifiant
          $requete= "SELECT * FROM client WHERE identifiant = '".$client->getIdentifiant()."';";
          $result = $conn->query($requete);

          if(!$result){
            trigger_error($conn->error);
          }

          //Si il n'y a pas de résultat
          if(mysqli_num_rows($result)==0){
            //Vérifie s'il n'y a pas de client avec le meme courriel
            $requete= "SELECT * FROM client WHERE courriel = '".$client->getCourriel()."';";
            $result = $conn->query($requete);

            if(!$result){
              trigger_error($conn->error);
            }

            //Si il n'y a pas de résultat, ajoute le client
            if(mysqli_num_rows($result)==0){
              //Ajoute le client
              $requete = "INSERT INTO client (identifiant, id_forfait, nom, prenom, date_naissance, courriel, telephone, mot_de_passe) VALUES
                        ('".$client->getIdentifiant()."',
                        '".$client->getIdForfait()."',
                         '".$client->getNom()."',
                          '".$client->getPrenom()."',
                           '".$client->getDateNaissance()."',
                           '".$client->getCourriel()."',
                            '".$client->getTelephone()."',
                         '".$client->getMotDePasse()."');";

                 $result = $conn->query($requete);
                 if(!$result){
                   trigger_error($conn->error);
                 }

               }else{
                 echo "Le courriel n'est pas disponible";
               }
             }else{
               echo "L'identifiant n'est pas disponible";
             }
        }

        /**
        * Methode qui permet de recuperer un client seulement à partir son identifiant
        * Retourne un client
        * @param identifiant
        */
        public function getIdPlan($identifiant){
          $tempconn = new Connexion();
          $conn = $tempconn->getConnexion();
          $id = null;

            $requete= "SELECT id FROM plan_personnalise WHERE identifiant_client = '".$identifiant."';";
            $result = $conn->query($requete);

            if(!$result){
              trigger_error($conn->error);
            }

            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
                  $id[] = $row['id'];
                }
            }

          return $id;
        }

      /**
      * Permet de supprimer un client de la base de donnée
      * a l'aide de l'identifiant
      * @param identifiant
      */
      public function supprimerClient($identifiant){
        $tempconn = new Connexion();
        $conn = $tempconn->getConnexion();

        $requete= "DELETE FROM ta_forfait_client WHERE identifiant_client = '".$identifiant."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        $idPlan = $this->getIdPlan($identifiant);

        for ($i=0; $i < sizeof($idPlan); $i++) {
          $requete= "DELETE FROM ta_exercice_plan_personnalise WHERE id_plan = '".$idPlan[$i]."';";
          $result = $conn->query($requete);

          if(!$result){
            trigger_error($conn->error);
          }
        }

        $requete= "DELETE FROM plan_personnalise WHERE identifiant_client = '".$identifiant."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        $requete= "DELETE FROM ta_client_evenement WHERE id_client = '".$identifiant."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }

        $requete= "DELETE FROM client WHERE identifiant = '".$identifiant."';";
        $result = $conn->query($requete);

        if(!$result){
          trigger_error($conn->error);
        }
      }

      /*
      La fonction qui sert a modifier un client dans la base de donnee
      */
      function modifierClient($id_client, $choix, $valeur)
      {
        $tempconn = new Connexion;
        $conn = $tempconn->getConnexion();

        $requete="UPDATE client SET ".$choix."='".$valeur."' WHERE identifiant='".$id_client."'";

        $result = $conn->query($requete);
          if(!$result){
            trigger_error($conn->error);
          }
      }

      /*
        La fonction sert a récupérer le forfait d'un clients
        Retourne un objet Forfait
      */
      function getForfaitClient($id_forfait){
        $gf = new GestionForfait();
        $forfait = $gf->getForfait($id_forfait);

        return $forfait;
      }

  }
?>
