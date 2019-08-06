<?php
require_once("gestionServices.php");
require_once("service.php");
$service = new service($_POST['id_service'], $_POST['nom'], $_POST['description']);
$gestion = new GestionServices();
$gestion->ajouterService($service);
header('Location: siteService.php');
?>
