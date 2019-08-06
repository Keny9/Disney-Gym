<!DOCTYPE html>
<!-- /****************************************
Fichier : page_ajout_employe.js
Auteur : Maxime Lussier
Fonctionnalité : Page HTML pour l'ajout d'un employe
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
2019-05-03            William                    Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/ -->
<?php
  session_start();

  include("../default/checkLogin.php");
?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-max.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="employe.js"></script>
  </head>
  <?php $nomPage = "Ajout d'Employé" ?>
  <body>
    <div class="contenu">
      <?php include '../default/header.php' ?>

      <main class="gestion_employe col-m-12">
        <h1><?php echo $nomPage ?></h1>

        <div class="spacing col-m-12"></div>

        <form class="formulaire_employe" id="formulaire" method="post">

          <div class="">
            <label class="col-m-5 col-t-3" for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="">
            <span class="erreur" id="erreurNom"></span>
          </div>


          <div class="">
            <label class="col-m-5 col-t-3" for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="">
            <span class="erreur" id="erreurPrenom"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="identifiant">Identifiant</label>
            <input type="text" name="identifiant" id="identifiant" value="">
            <span class="erreur" id="erreurIdentifiant"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="">
            <span class="erreur" id="erreurPassword"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="dateNaissance">Date de naissance</label>
            <input type="date" name="dateNaissance" id="dateNaissance" value="null">
            <span class="erreur" id="erreurDateNaissance"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="telephone">No. Tél</label>
            <input type="text" name="telephone" id="telephone" value="">
            <span class="erreur" id="erreurTelephone"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="nas">NAS</label>
            <input type="text" name="nas" id="nas" value="">
            <span class="erreur" id="erreurNas"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="poste">Poste</label>
            <select id="poste" name="poste">
              <option disabled selected value> -- Choisir une option -- </option>
              <?php
              require 'gestionAffichageEmploye.php';
              $gae = new GestionAffichageEmploye();
              echo $gae->getOptionPoste();
              ?>
            </select>
            <span class="erreur" id="erreurPoste"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="etat">État</label>
            <select id="etat" name="etat">
              <option disabled selected value> -- Choisir une option -- </option>
              <?php
              //require 'gestionAffichageEmploye.php';
              //$gae = new GestionAffichageEmploye();
              echo $gae->getOptionEtat();
              ?>
            </select>
            <span class="erreur" id="erreurEtat"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="dateEmbauche">Date d'embauche</label>
            <input type="date" name="dateEmbauche" id="dateEmbauche" value="">
            <span class="erreur" id="erreurDateEmbauche"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="courriel">Courriel</label>
            <input type="text" name="courriel" id="courriel" value="">
            <span class="erreur" id="erreurCourriel"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="noPorte">No. Porte</label>
            <input type="text" name="noPorte" id="noPorte" value="">
            <span class="erreur" id="erreurNoPorte"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="rue">Rue</label>
            <input type="text" name="rue" id="rue" value="">
            <span class="erreur" id="erreurRue"></span>
          </div>

          <div class="">
            <label class="col-m-5 col-t-3" for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="">
            <span class="erreur" id="erreurVille"></span>
          </div>


          <div class=" col-m-12">
            <div class="conteneur_bouton col-m-12 col-t-6">
              <input class="btn btn-success btnGlobal" type="button" onclick="validerAjout()" name="" value="Confirmer">
            </div>
            <div class="conteneur_bouton col-m-12 col-t-6">
              <input class="btn btn-default btnGlobal" type="button" onclick="location.href='page_employe_gestion.php';" value="Retour">
            </div>
          </div>
        </form>

        <div class="spacing col-m-12"></div>
      </main>

      <?php include '../default/footer.php' ?>
    </div>
  </body>
</html>
