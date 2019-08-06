<?php
/****************************************
Fichier : dataForfait.php
Auteur : Karl Boutin
Fonctionnalité : Obtient des donnees pour les retourner en json pour le ajax
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
=========================================================
2019-05-03            William Gonin               Approuvé
2019-05-03            Guillaume Côté              Approuvé
2019-05-03            Maxime Lussier              Approuvé

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/
  require_once('forfait.php');
  require_once('gestionForfait.php');

  //Convert to UTF-8
  //Sinon du vide etait afficher
  function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

  $gestionForfait = new GestionForfait();

  $data = $gestionForfait->getAllForfaitData();

  echo json_encode(utf8ize($data));

?>
