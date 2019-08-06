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

        <div class="container col-4 col-t-12 col-m-12">
          <img id="mickeyAccueil" src="../img/Logo.png" alt="Mickey Mouse">
        </div>
        <div id="container-p" class="container col-4 col-t-12 col-m-12">
          <p>
            Voici une démonstration de l'effet d'animation lorsqu'on change de page. Pour faire l'animation j'ai
            utilisé le script "swup.js". J'aurais aimé l'intégré à chaque page du site web, mais plusieurs difficultés ont été rencontrés.
          </p><br>
          <p>
            D'abord, lors de la transition de page mes fichiers css et javascript ne s'intégrait pas à la page web. À la place la transition gardait seulement
            les fichiers de l'anciennne page. Par la suite, j'ai trouvé un plugin de swup pour permettre de changer le head de mes pages web lors des transitions, mais
            les liens css n'étaient pas affichés dans l'ordre voulu et les scripts php n'étaient pas fonctionnels.
          </p><br>
          <p>
            Également, je crois que le script faisais du "overwrite" de l'url.
            Étant donné qu'on donne un id particulier à chaque main de nos pages pour faire fonctionner le script, je crois que seulement le main change
            sans réellement changer de page. Se serait juste un "swap" du main.
          </p><br>
          <p>
            Configuration : Vous devez donner l'id "swup" à la balise main de vos pages. Ensuite, il faut inclure le script de swup, ainsi que son plugin
            si on désire faire changer le head de nos pages web lors de la transition. swup.js et swupMergeHeadPlugin.js . Puis, dans un script il faut créer swup
            avec "const swup = new Swup(options);". Vous devez utiliser des balises "a" entre le changement de vos pages et vous assurez que vous mettez un chemin
            absolu aux liens entre lesquels vous changer de page.

          </p>
        </div>
        <div class="container col-4 col-t-12 col-m-12">
          <img id="duck" src="../img/ducklifter1.gif" alt="Duck">
        </div>
        <div class="container col-12" id="container-button">
          <button id="btn-accueil2" class="btn-demo" type="button" name="demo"><a href="/ProjetGym/projetgym/authentification/accueil.php">Accueil</a></button>
        </div>
    </main>

    <!-- Footer / Copyrights (rose) -->
    <?php include('../default/footer.php') ?>

  </body>

</html>
