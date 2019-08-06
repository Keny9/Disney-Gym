<!DOCTYPE html>
<!-- /****************************************
Fichier : header.php
Auteur : Karl Boutin
Page HTML header. On appel cette page dans toutes les autres page afin d'afficher le Header
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
2019-05-03            Guillaume                 Approuvé
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/ -->
<!-- Menu de navigation -->
<title><?php echo $nomPage ?></title>

<nav class="dropdown">
  <button class="menu" onclick="window.location = '../authentification/accueil.php'">Accueil</button>

  <button onclick="derouler()" class="dropdown menu">Gestionnaire</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="../employe/page_employe_gestion.php">Employé</a>
    <a href="../client/page_client_gestion.php">Client</a>
    <a href="../forfait/pgGestionForfait.php">Forfait</a>
    <a href="../service/siteService.php">Service</a>
    <a href="../evenement/page_gestion_cours.php">Cours</a>
    <a href="../evenement/page_rendezvous_gestion.php">Rendez-vous</a>
    <a href="../gestionExercices/htmlExercice.php">Exercices</a>
    <a href="../statistiques/htmlStats.php">Statistiques</a>
  </div>
  <button class="menu">Options</button>
  <button class="menu" onclick="window.location = '../authentification/deconnexion.php'">Se déconnecter</button>
</nav>
