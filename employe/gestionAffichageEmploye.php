<?php
/****************************************
Fichier : gestionAffichageEmploye.php
Auteur : Maxime Lussier
Fonctionnalité : Gestionnaire pour l'affichage des pages relatives aux employés
Date : 2019-04-18
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
include_once 'gestionEmploye.php';
include_once 'employe.php';
class GestionAffichageEmploye{

/*
  Retourne tous les employés dans une table
*/
  public function getTableau($column, $critere){
    $ge = new GestionEmploye();
    $employe = $ge->getAllEmploye($column, $critere);
    $tableau = "";

    if(!is_array($employe)){
      $tableau .= "Aucun resultat trouvé.";
    }
    else{
      for ($i = 0; $i < sizeof($employe); $i++){
        $tableau .= "
        <tr>
        <td class=\"col-m-3\"><span>".$employe[$i]->getIdentifiant()."</span></td>
        <td class=\"col-m-3\"><span>".$employe[$i]->getNom()."</span></td>
        <td class=\"col-m-3\"><span>".$employe[$i]->getPrenom()."</span></td>
        <td class=\"col-m-3\"><span>".$employe[$i]->getTelephone()."</span></td>
        </tr>";
      }
    }

    return $tableau;
  }

/*
  Retourne les options pour le select des postes en html
*/
  public function getOptionPoste(){
    $ge = new GestionEmploye();
    $postes = $ge->getAllPoste();
    $html = "";

    if (!is_array($postes)){
      $html .= "Aucun resultat trouvé.";
    }
    else{
      for ($i = 0; $i < sizeof($postes); $i++){
        $html .= "
        <option value=\"".$postes[$i]->getId()."\">".$postes[$i]->getNom()."</option>";
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
