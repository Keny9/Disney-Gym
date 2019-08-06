<?php
/****************************************
Fichier : gestionAffichageClient.php
Auteur : Guillaume Côté
Fonctionnalité : Gestionnaire pour l'affichage des pages relatives aux clients
Date : 2019-04-29
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
2019-05-03        Karl Boutin                Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionClient.php';
include_once 'client.php';
include_once '../statistiques/gestionStats.php';
include_once '../statistiques/stats.php';

class GestionAffichageClient{

/*
  Retourne tous les client dans une table
*/
  public function getTableau($column, $critere){
    $ge = new GestionClient();
    $client = $ge->getAllClient($column, $critere);
    $tableau = "";

    if(!is_array($client)){
      $tableau .= "Aucun resultat trouvé.";
    }

    else{
      for ($i = 0; $i < sizeof($client); $i++){
        $tableau .= "
        <tr>
        <td class=\"col-m-2\">".$client[$i]->getIdentifiant()."</td>
        <td class=\"col-m-3\">".$client[$i]->getNom()."</td>
        <td class=\"col-m-3\">".$client[$i]->getPrenom()."</td>
        <td class=\"col-m-4\">".$client[$i]->getTelephone()."</td>
        </tr>";
      }
    }
    return $tableau;
  }

  /*
    Retourne tous les client dans une table
  */
    public function getTableauForfait($client){
      $ge = new GestionStats();
      $stats = $ge->getAllForfaitClient($client);
      $tableau = "";

      if(!is_array($stats)){
  //      $tableau .= "Aucun resultat trouvé.";
      }

      else{
        for ($i = 0; $i < sizeof($stats); $i++){
          $tableau .= "
          <tr>
          <td class=\"col-m-4\">".$stats[$i]->getArray()[0]."</td>
          <td class=\"col-m-4\">".$stats[$i]->getArray()[1]."</td>
          <td class=\"col-m-4\">".$stats[$i]->getArray()[2]."</td>
          </tr>";
        }
      }
      return $tableau;
    }

    /*
      Retourne toutes les infos des cours d'un dans une table
    */
      public function getTableauCours($client){
        $ge = new GestionStats();
        $stats = $ge->getAllCoursClient($client);
        $tableau = "";

        if(!is_array($stats)){
    //      $tableau .= "Aucun resultat trouvé.";
        }

        else{
          for ($i = 0; $i < sizeof($stats); $i++){
            $tableau .= "
            <tr>
            <td class=\"col-m-6\">".$stats[$i]->getArray()[0]."</td>
            <td class=\"col-m-6\">".$stats[$i]->getArray()[1]."</td>
            </tr>";
          }
        }
        return $tableau;
      }



      /*
        Retourne toutes les infos des rendez-vous d'un dans une table
      */
        public function getTableauRendezvous($client){
          $ge = new GestionStats();
          $stats = $ge->getAllRendezvousClient($client);
          $tableau = "";

          if(!is_array($stats)){
    //        $tableau .= "Aucun resultat trouvé.";
          }

          else{
            for ($i = 0; $i < sizeof($stats); $i++){
              $tableau .= "
              <tr>
              <td class=\"col-m-2\">".$stats[$i]->getArray()[0]."</td>
              <td class=\"col-m-3\">".$stats[$i]->getArray()[1]."</td>
              <td class=\"col-m-3\">".$stats[$i]->getArray()[2]."</td>
              <td class=\"col-m-4\">".$stats[$i]->getArray()[3]."</td>
              </tr>";
            }
          }
          return $tableau;
        }

}
 ?>
