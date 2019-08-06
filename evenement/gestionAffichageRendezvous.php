<?php
/****************************************
Fichier : gestionAffichageClient.php
Auteur : Guillaume Côté
Fonctionnalité : Gestionnaire pour l'affichage des pages relatives aux rendez-vous
Date : 2019-04-30
Vérification :
Date Nom Approuvé
2019-05-03            William                   Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEvenement.php';
include_once 'evenement.php';
include_once '../employe/gestionEmploye.php';
include_once '../employe/employe.php';
include_once '../statistiques/gestionStats.php';
include_once '../statistiques/stats.php';

class GestionAffichageRendezvous{

/*
  Retourne tous les client dans une table
*/
  public function getTableau($column, $critere, $identifiant){
    $ge = new GestionStats();
    $stats = $ge->getAllRendezvousCritere($column, $critere, $identifiant);
    $tableau = "";

    if(!is_array($stats)){
      $tableau .= "Aucun resultat trouvé.";
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

  /*
    Retourne tous les client dans une table
  */
    public function getOptionEmploye(){
      $ge = new GestionEmploye();
      $employe = $ge->getAllEmploye(null, null);
      $html = "";

      if (!is_array($employe)){
        $html .= "Aucun resultat trouvé.";
      }
      else{
        for ($i = 0; $i < sizeof($employe); $i++){
          $html .= "
          <option value=\"".$employe[$i]->getIdentifiant()."\">".$employe[$i]->getIdentifiant()."</option>";
        }
      }


      return $html;
    }


}
 ?>
