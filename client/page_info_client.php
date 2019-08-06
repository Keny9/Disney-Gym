<!DOCTYPE html>
<!-- /****************************************
Fichier : page_info_client.php
Auteur : Guillaume Côté
Fonctionnalité : page HTML de la page info client
Date : 2019-04-29
Vérification :
Date Nom Approuvé
2019-05-02        William Gonin              Approuvé
2019-05-03        Karl Boutin                Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/ -->

<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-max.css">
  <script src="../js/script.js"></script>
  <script src="client.js"></script>
</head>

<?php
$nomPage = "Infos d'un clients";
require_once 'client.php';
require_once 'gestionClient.php';
$ge = new GestionClient();
$client = $ge->getClient($_POST['idClient']);
?>

<body>
  <div class="contenu">
    <?php include '../default/header.php'; ?>

    <main class = "gestion_employe col-m-12">

        <h1><?php echo $nomPage ?></h1>

        <div class="spacing col-m-12"></div>

<!--         Tableau forfaits          -->

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-4">Abonnement</th>
              <th class="col-m-4">Date de début</th>
              <th class="col-m-4">Date de fin</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php
            require 'GestionAffichageClient.php';
            $gac = new GestionAffichageClient();
            $gc = new GestionClient();
            $client = $gc->getClient($client->getIdentifiant());
            echo $gac->getTableauForfait($client);
            ?>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>



<!--         Tableau cours          -->
        <div class="spacing col-m-12"></div>

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-6">Cours</th>
              <th class="col-m-6">Date</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php
            $client = $gc->getClient($client->getIdentifiant());
            echo $gac->getTableauCours($client);
            ?>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>


<!--         Tableau rendez-vous          -->
        <div class="spacing col-m-12"></div>

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-2">Rendez-vous</th>
              <th class="col-m-3">Date</th>
              <th class="col-m-3">Heure (h)</th>
              <th class="col-m-4">Spécialiste</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php
            $client = $gc->getClient($client->getIdentifiant());
            echo $gac->getTableauRendezvous($client);
            ?>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>

        <div class="col-m-12 col-t-4">
          <input class="btn btn-default btnForfait"  type="button" onclick="location.href='page_client_gestion.php';" value="Retour">
        </div>

        <div class="spacing col-m-12"></div>


        <div class="form-popup" id="myForm">
          <form action="/action_page.php" class="form-container">
            <h1>Login</h1>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="btn">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
        </div>
      </main>

    <?php
    include '../default/footer.php';
    ?>
  </div>
</body>

</html>
