<?php
require_once("gestionServices.php");
require_once("service.php");
$service = new service($_POST['id'], $_POST['nom'], $_POST['description']);
$gestion = new GestionServices();
$gestion->modifierService($service);
header('Location: siteService.php');
?>
