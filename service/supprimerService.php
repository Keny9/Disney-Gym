<?php
include_once 'gestionServices.php';

$ge = new GestionServices();
$ge->supprimerService($_POST['id_service']);

 ?>
