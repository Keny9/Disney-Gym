<!DOCTYPE html>
<!-- /****************************************
Fichier : page_ajout_exercice.php
Auteur : William Gonin
Fonctionnalité : Fichier pour afficher la page ajout d'exercice
Date : 2019-04-28

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03            Karl                      Oui
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
****************************************/ -->
<?php
  session_start();

  include("../default/checkLogin.php");
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../webcam/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="exercice.js"></script>
  </head>
  <?php $nomPage = "Ajout d'Exercice" ?>
  <body>
    <div class="contenu">
      <?php include '../default/header.php' ?>

      <main class="gestion_employe col-m-12">
        <h1><?php echo $nomPage ?></h1>

        <div class="spacing col-m-12"></div>

        <form class="formulaire_employe" id="formulaire" method="post">

          <div class="group-input">
            <label class="col-m-5 col-t-3" for="nom"> Nom de l'exercice (La photo aura le même nom)</label>
            <input type="text" name="nom" id="nom" value="">
            <span class="erreur" id="erreurNom"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="description"> Description</label>
            <input type="text" name="description" id="description" value="">
            <span class="erreur" id="erreurNom"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="type"> Type (1 = haut du corps, 2 = bas du corps)</label>
            <input type="text" name="type" id="id_type" value="">
            <span class="erreur" id="erreurNom"></span>

          </div>

<!-- PHOTO -->
          <div class="">
            <div class="col-m-5 col-t-3 col-12">
              <img src="../img/logo.png" alt="" id="hidden" width="1px" height="1px">
              <video id="video" width="400" height="300" autoplay=""></video>
              <img src="../img/photo.png" alt="Prendre une photo !" id="snap" class="link" title="Prendre une photo">
              <canvas id="canvas" width="400" height="300"></canvas>
            </div>

            <input type="text" id="dataImage" name="" value="">
            <div class="col-12">
              <a id="download" class="link"><img src="../img/save.png" alt="Sauvegarder l'image" title="Sauvegarder la photo sur votre PC"></a>
            </div>

          </div>

          <div class="spacing col-m-12"></div>

          <div class="col-m-12">
            <div class="conteneur_bouton col-m-12 col-t-6">
              <input class="btn btn-success" type="button" onclick="ajout()" name="" value="Confirmer" id="btn_confirmer">
            </div>
            <div class="conteneur_bouton col-m-12 col-t-6">
              <input class="btn btn-default" type="button" onclick="location.href='htmlExercice.php';" value="Retour">
            </div>
          </div>

        </form>

        <div class="spacing col-m-12"></div>

      </main>

      <script src="../webcam/webcam.js" charset="utf-8"></script>

      <?php include '../default/footer.php' ?>
    </div>
  </body>
</html>
