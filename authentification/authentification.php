<!--/****************************************
Fichier : authentification.php
Auteur : Karl Boutin
Fonctionnalité : Page de la connexion d'un utilisateur pour
la fonctionnalité W-07 Authentification
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

****************************************/-->

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_authentification.css">
    <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../js/script_authentification.js"></script>
    <script src="../js/script.js"></script>
  </head>
  <body class="col-9 col-t-9 col-m-12" id="body-connexion">
    <video autoplay muted loop id="myVideo">
      <source src="../video/Disney.mp4" type="video/mp4">
    </video>

      <div class="col-9 col-t-9 col-m-12 block-connexion">
        <h1 class="col-6" id="titre-connexion">DISNEY'S </br> WEIGHTLAND</h1>
        <form id="form-connexion" onsubmit="return validateFormAuthentification()" action="login.php" method="post">
          <div class="erreur-login" id="erreur-login">
            <?php
              if(isset($_SESSION["error"])){
                  $error = $_SESSION["error"];
                  echo $error;
              }
            ?>
          </div></br>

          <label class="label-connexion" for="nomUtilisateur">Nom d'utilisateur : </label>
          <input type="text" name="nomUtilisateur" id="nomUtilisateur" onfocus="clearError();"><br><br>

          <label class="label-connexion" for="motPasse">Mot de passe : </label>
          <input class="input-text" type="password" name="motPasse" id="motPasse" onfocus="clearError();">

          <br>

          <div id="block-button" class="block-button-connexion">
            <input class="button-connexion" type="submit" name="" value="Connecter">
            <input class="button-connexion" type="button" name="clear" value="Vider" onclick="clearInput();">
          </div>
          <br>
          <a id="forgotPassword" href="#">Mot de passe oublié ?</a>

        </form>
        <img class="col-6 col-t-12 col-m-12" id="img-connexion" src="../img/bask.png" alt="Bask">
      </div>
      <p class="footer-connexion">©Mickey Mouse Development Team, All Rights Reserved</p>
  </body>
</html>

<?php
  unset($_SESSION["error"]);
 ?>
