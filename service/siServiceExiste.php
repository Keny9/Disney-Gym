<?php
/*
À revoir. Peut-être inutile
*/
include_once 'gestionServices.php';

$ge = new GestionServices();


if($ge->getService($_POST['id_service']) == null){
  echo "Identifiant invalide";
}
else{}


 ?>
