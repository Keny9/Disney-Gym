<?php
/****************************************
 Fichier : siteService.php
 Auteur : Jean-Christophe Boisvert
 Fonctionnalité : W-03 Classe requise pour faire Gestion des services
 Date : Vendredi 3 Mai 2019

 Vérification :
 Date                       Nom                   Approuvé
 =========================================================
 Vendredi 3 Mai 2019  William Gonin               Approuvé
 Vendredi 3 Mai 2019  Guillaume Côté              Approuvé

 Historique de modifications :
 Date                       Nom                 Description
 =========================================================

****************************************/
  session_start();

  include("../default/checkLogin.php");

  require_once("gestionServices.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Gestion des services</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="../js/script.js"></script>
      <script src="../js/service.js"></script>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/service.css">
  </head>

  <body class="standard col-9 col-t-9 col-m-12">

      <?php include("../default/header.php"); ?>

      <main>
          <h1>Gestion des services</h1>
        <p>
        <div id="form1" class="form1 col-9" name="form1">
        <form action="../service/gestionServices.php" method="post">

          <label class="col-3" for="id">Id du service </label><input class="text col-4" type="text" name="id" id="id_service" /><br />
          <label class="col-3" for="nom">Nom du service </label><input class="text col-4" type="text" name="nom" id="nom"  /><br />
          <label class="col-3" for="description" id="description">Description </label> <textarea class="text col-4" rows="5" col="20" name="description" placeholder="Entrez la description du service"></textarea><br />
          <div class="col-12">
            <button id="bouton1" class="btn btn-success col-6" id="bouton1" type="submit" formaction="ajouter.php">Ajouter</button>
            <button id="bouton2" class="btn btn-primary col-6" id="bouton2" type="submit" formaction="modifier.php">Modifier</button>
          </div>

        </form>

        </p>
        </div>
        <div id="form2" class="form2 col-3" name="form2">

        <form method="post" name = "formulaire" id="formulaire">
            <h2>Service</h2>

           <select id="service" name="service" selectedIndex="1" multiple="multiple" size="5">
                 <?php
                   require 'gestionAffichageService.php';
                   $gas = new GestionAffichageService();
                   echo $gas->getOptionService();
                 ?>
           </select>
         </br>
            <div class="col-12">
                <button id="bouton3" class="btn btn-danger" type="button" onclick="siServiceExiste();">Supprimer</button>
            </div>

        </form>

        </div>
      </main>

      <?php include("../default/footer.php"); ?>

  </body>
</html>
