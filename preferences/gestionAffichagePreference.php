<?php
/****************************************
Fichier : gestionAffichagePreference.php
Auteur : Guillaume Côté
Fonctionnalité : Gestionnaire pour l'affichage de la page préférence
Date : 2019-04-25
Vérification :
Date                  Nom                         Approuvé
2019-05-03          William                       Approuvé
2019-05-03            Karl                        Oui
=========================================================

Historique de modifications :
Date                  Nom                       Description
=========================================================

****************************************/
include_once 'gestionPreference.php';
include_once 'preference.php';

class GestionAffichagePreference{

/*
  Retourne les options pour le combobox du thème
*/
  public function getTheme(){
    $ge = new GestionPreferences();
    $pref = $ge->getPreference();
    $html = "";

    if (!is_array($postes)){
      $html .= "Aucun resultat trouvé.";
    }
    else{
        $html .= "
        <option selected=\"selected\" value="\".$pref->getTheme()</option>"\">".$pref->getNomTheme()."</option>";

        if($pref->getTheme() == 1){
          $html .= "
          <option selected=\"selected\" value="\"0\"</option>"\">Sombre</option>";
        }else{
          $html .= "
          <option selected=\"selected\" value=\"1\"</option>\">Clair</option>";
        }
    }

    return $html;
  }

  /*
    Retourne la taille d'écriture choisi dans les préférences
  */
    public function getPolice(){
      $ge = new GestionPreferences();
      $pref = $ge->getPreference();
      $html = "";

      if (!is_array($etats)){
        $html .= "Aucun resultat trouvé.";
      }
      else{
        $html .= "
        <input type=\"text\" name=\"police\" value="\".$pref->getPolice()."\">";
      }

      return $html;
    }
}
 ?>
