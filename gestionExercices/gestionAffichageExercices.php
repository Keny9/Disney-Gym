<?php
/****************************************
Fichier : gestionAffichageExercices.php
Auteur : William Gonin
Fonctionnalité : Page qui gere l'affichage des exercices
Date : 2019-04-23

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03            Karl                      Oui
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/

require_once '../Outils/connexion.php';
require_once 'exercice.php';
require_once 'gestionExercices.php';

class gestionAffichageExercices
{

/*
La fonction qui sert a ajouter un exercice dans la base de donnee
*/
public function getTableau(){
  $ge = new gestionExercices();
  $exercice = $ge->getAllExercices();
  $tableau = "";

  if(!is_array($exercice)){
    $tableau .= "Aucun resultat trouvé.";
  }

  else{
    for ($i = 0; $i < sizeof($exercice); $i++){

      $tableau .= "
      <tr>
      <td class=\"col-m-2\">".$exercice[$i]->getNom()."</td>
      <td class=\"col-m-3\">".$exercice[$i]->getDescription()."</td>
      <td class=\"col-m-3\">".$exercice[$i]->getImage()."</td>
      <td class=\"col-m-4\">".$exercice[$i]->getId_type()."</td>
      </tr>";
    }
  }
  return $tableau;
}

}
?>
