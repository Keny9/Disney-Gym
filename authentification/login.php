<?php
/****************************************
Fichier : login.php
Auteur : Karl Boutin
Fonctionnalité : Procédé de la connexion pour la
fonctionnalité W-07 Authentification
Date : 2019-04-15

Vérification :
Date                    Nom                     Approuvé
=========================================================
2019-05-03            William Gonin               Oui
2019-05-03            Guillaume Côté              Oui
2019-05-03            Maxime Lussier              Oui

Historique de modifications :
Date                    Nom                  Description
=========================================================

****************************************/

require_once("../Employe/employe.php");
require_once("../Employe/gestionEmploye.php");

session_start();

$nomUtilisateur = $_POST["nomUtilisateur"];
$motPasse = $_POST["motPasse"];

$gestionEmploye = new GestionEmploye();

$employe = $gestionEmploye->getEmployeLogin($nomUtilisateur,$motPasse);

$_SESSION['employe'] = $employe;

if($employe == null){
  $error = "Votre nom d'utilisateur ou votre mot de passe est incorrect.";
  $_SESSION['error'] = $error;
  header("location: authentification.php");
  exit;
}
else{
  $_SESSION['loggedIn'] = true;
  header('Location: accueil.php');
  exit;
}
?>
