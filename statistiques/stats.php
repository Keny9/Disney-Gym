<?php
/****************************************
Fichier : stats.php
Auteur : Guillaume Côté
Fonctionnalité : Objet qui contient les informations relatives au tableau de la page des statistiques.
Contient un constructeur avec paramètres et des gets/sets.
Date : 2019-04-17
Vérification :
Date                    Nom                       Approuvé
=========================================================
2019-04-24              William                   Approuvé
2019-04-25               Karl                     Oui

Historique de modifications :
Date                      Nom                 Description
=========================================================
****************************************/
  class Stats{
    private $array;   //Un array contenant des stats et les infos des statistiques


    function __construct($array){
      $this->setArray($array);
    }

    public function getArray(){
      return $this->array;
    }

    public function setArray($array){
      $this->array = $array;
    }

  }
 ?>
