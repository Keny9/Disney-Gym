<?php
/****************************************
Fichier : data1.php
Auteur : William Gonin
Fonctionnalité : Fichier pour les donnees du deuxieme tableau de Tabulator
Date : 2019-04-23

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03            Karl                        Oui
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/
require_once 'gestionStats.php';
$ge = new GestionStats();

$cours = $ge->getStatsCours();

            $json= [];

            for($i= 0; $i< 2; $i++){
                    $json1=["nom"=>''.$cours[$i]->getArray()[0].'',"date"=>''.$cours[$i]->getArray()[1].'',"nb"=>''.$cours[$i]->getArray()[2].''];
                    array_push($json,$json1);

                }
           echo (json_encode($json));

?>
