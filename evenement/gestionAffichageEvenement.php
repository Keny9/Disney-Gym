<?php
/****************************************
Fichier : gestionAffichageEvenement.php
Auteur : Maxime Lussier
Fonctionnalité : Gestionnaire pour l'affichage des pages relatives aux evenements
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once '../employe/gestionEmploye.php';
include_once '../employe/employe.php';
include_once 'gestionEvenement.php';


class GestionAffichageEvenement{

/*
  Retourne tous les Cours dans une table
*/
  public function getTableau($noCours){
    $ge = new GestionEvenement();
    $evenement = $ge->getAllEvenement('id', $noCours);
    $tableau = "";

    if(!is_array($evenement)){
      $tableau .= "Aucun resultat trouvé.";
    }
    else{
      for ($i = 0; $i < sizeof($evenement); $i++){
        $tableau .= "
        <tr>
        <td class=\"col-m-3\"><span>".$evenement[$i]->getId()."</span></td>
        <td class=\"col-m-3\"><span>".$evenement[$i]->getIdModele()."</span></td>
        <td class=\"col-m-3\"><span>".$evenement[$i]->getDate()."</span></td>
        <td class=\"col-m-3\"><span>".$evenement[$i]->getIdEmploye()."</span></td>
        </tr>";
      }
    }

    return $tableau;
  }

/*
  Retourne les options pour le select des instructeurs en html
*/
  public function getOptionInstructeur(){
    $ge = new GestionEmploye();
    $employe = $ge->getAllEmploye(null,"");
    $html = "";

    if (!is_array($employe)){
      $html .= "Aucun resultat trouvé.";
    }
    else{
      for ($i = 0; $i < sizeof($employe); $i++){
        $html .= "
        <option value=\"".$employe[$i]->getIdentifiant()."\">".$employe[$i]->getPrenom()." ".$employe[$i]->getNom()."</option>";
      }
    }

    return $html;
  }


  /*
    Retourne les options pour le select des modeles en html
  */
  public function getOptionModele(){
    $ge = new GestionEvenement();
    $modele = $ge->getAllModele();
    $html = "";

    if (!is_array($modele)){
      $html .= "Aucun resultat trouvé.";
    }
    else{
      for ($i = 0; $i < sizeof($modele); $i++){
        $html .= "
        <option value=\"".$modele[$i]->getId()."\">".$modele[$i]->getNom()."</option>";
      }
    }

    return $html;
  }
  /*
    Retourne les options pour le select des états en html
  */
    public function getOptionEtat(){
      $ge = new GestionEmploye();
      $etats = $ge->getAllEtat();
      $html = "";

      if (!is_array($etats)){
        $html .= "Aucun resultat trouvé.";
      }
      else{
        for ($i = 0; $i < sizeof($etats); $i++){
          $html .= "
          <option value=\"".$etats[$i]->getId()."\">".$etats[$i]->getEtat()."</option>";
        }
      }

      return $html;
    }
}
 ?>
