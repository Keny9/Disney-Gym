<!DOCTYPE html>

<!-- /****************************************
Fichier : page_rendezvous_gestion.php
Auteur : Guillaume Côté
Fonctionnalité : Page HTML de la gestion de rendez-vous
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
2019-05-01        Karl                       Approuvé
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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-max.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="../js/script.js"></script>
  <script src="rendezvous.js"></script>
</head>

<?php
  $nomPage = "Gestion des Rendez-vous";
?>

<body>
  <div class="contenu">
    <?php include '../default/header.php'; ?>

    <main class = "gestion_employe col-m-12">

        <h1><?php echo $nomPage ?></h1><br>

        <div class="spacing col-m-12"></div>

        <div class="recherche col-m-12">
          <label for="">Rechercher par : </label>
          <select id="column">
            <option value="evenement.id">Id de l'evenement</option>
            <option value="id_client">Identifiant client</option>
            <option value="date">Date</option>
            <option value="poste.nom">Spécialiste</option>
          </select>
          <input id="critere" type="text" name="" value="">
          <input type="button" class="btn btn-default btnForfait" value="Rechercher" onclick="rechercheAjax()">
        </div>

        <div class="spacing col-m-12"></div>

        <div class="recherche col-m-12">
          <label for="employe">Employes :   </label>
          <select id="employe" name="employe" selectedIndex="1" onchange="rechercheAjax();">
            <option disabled selected value> -- Choisir un employe -- </option>
            <?php
            require 'gestionAffichageRendezvous.php';
            $gae = new GestionAffichageRendezvous();
            echo $gae->getOptionEmploye();
            ?>
          </select>
          <span class="erreur" id="erreurPoste"></span>
        </div>


        <div class="spacing col-m-12"></div>

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-2">Id</th>
              <th class="col-m-3">Identifiant du Client</th>
              <th class="col-m-3">Date</th>
              <th class="col-m-4">Spécialiste</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <script type="text/javascript">
              rechercheAjax();
            </script>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>

        <div class="spacing col-m-12"></div>

        <div class="col-m-12 col-t-4">
          <input type="button" class="btn btn-danger btnForfait" name="" onclick="clickSuppr(); openForm();" value="Supprimer un rendez-vous">
        </div>

        <div class="spacing col-m-12"></div>


        <div class="form-popup" id="myForm">
          <form method="post" id="formulaire" name="formulaire" class="form-container">
            <h1 id="titre_myform"></h1>

            <label for="idRendezvous"><b>Identifiant</b></label>
            <input type="text" placeholder="Identifiant" name="idEmploye" id="idRendezvous" required>
            <span class="erreur" id="erreur"></span>

            <button type="button" onclick="siRendezvousExiste()" id="btn_confirmer" class="btn">Confirmer</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
          </form>
        </div>

      </main>

    <?php
    include '../default/footer.php';
    ?>
  </div>
</body>

</html>
