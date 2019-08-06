<?php
require_once 'gestionStats.php';
$ge = new GestionStats();

$employes = $ge->getStatsEmploye();

            $json= [];

            for($i= 0; $i< 2; $i++){
              echo $employes[$i]->getArray()[0];
              echo $employes[$i]->getArray()[1];
                    $json1=["nom"=>''.$employes[$i]->getArray()[0].'',"nb"=>''.$employes[$i]->getArray()[1].''];
                    array_push($json,$json1);

                }




           echo (json_encode($json));

?>
