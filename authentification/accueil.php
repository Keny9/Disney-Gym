<?php
/****************************************
Fichier : acceuil.php
Auteur : Karl Boutin
Page d'acceuil suite a la connexion d'un employe
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
=========================================================
2019-05-03            William Gonin               Oui
2019-05-03            Guillaume Côté              Oui
2019-05-03            Maxime Lussier              Oui

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/

  require_once("../Employe/employe.php");
  require_once("../Employe/gestionEmploye.php");

  session_start();

  include("../default/checkLogin.php");
 ?>

 <!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="../css/style_accueil.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/script.js"></script>
</head>

<body class="standard col-9 col-t-9 col-m-12">

    <!-- Menu de navigation -->
    <?php include('../default/header.php');?>

    <!-- Main (gris) -->
    <main id="swup" class="transition-fade">
        <h1 class="titre">DISNEY'S WEIGHTLAND</h1>

        <div class="message-accueil col-12 col-t-12 col-m-12">
          <img class="col-6 col-t-9 col-m-12" id="bulle" src="../img/bulle2.png" alt="Bulle">
          <p class="salutation">Bienvenue, </br></br> <?php echo $employe->getPrenom() . " " . $employe->getNom()?></p>
        </div>

        <div class="bottom-accueil">
          <div class="container col-4 col-t-4 col-m-12">
            <img id="mickeyAccueil" src="../img/Logo.png" alt="Mickey Mouse">
          </div>
          <div class="container col-4 col-t-4 col-m-12">
            <button class="btn-demo" type="button" name="demo"><a href="/ProjetGym/projetgym/authentification/demo.php">Animation du changement de page</a></button>
          </div>
          <div class="container col-4 col-t-4 col-m-12">
            <img id="duck" src="../img/ducklifter1.gif" alt="Duck">
          </div>
        </div>

    </main>

    <!-- Footer / Copyrights (rose) -->
    <?php include('../default/footer.php') ?>

    <script src="../node_modules/swup/dist/swup.js"></script>
    <script src="../node_modules/swup/dist/plugins/swupMergeHeadPlugin.js"></script>

    <script>

      var options = {
        plugins: [
            swupMergeHeadPlugin
        ]
      }

      const swup = new Swup(options);
      swup.usePlugin(swupMergeHeadPlugin, {option: "true"});

    </script>

  </body>

</html>
