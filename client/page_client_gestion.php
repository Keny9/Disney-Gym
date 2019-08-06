<!DOCTYPE html>

<!-- /****************************************
Fichier : page_client_gestion.php
Auteur : Guillaume Côté
Fonctionnalité : Page HTML de la gestion de client
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="client.js"></script>
  </head>

<?php
$nomPage = "Gestion des clients";
?>

<body>
  <div class="contenu">
    <?php include '../default/header.php'; ?>

    <main class = "gestion_employe col-m-12">

        <h1><?php echo $nomPage ?></h1>

        <div class="spacing col-m-12"></div>

        <div class="recherche col-m-12">
          <label for="">Rechercher par : </label>
          <select id="column">
            <option value="identifiant">Id</option>
            <option value="nom">Nom</option>
            <option value="prenom">Prénom</option>
            <option value="telephone">No. Tél</option>
          </select>
          <input id="critere" type="text" name="" value="">
          <input type="button" class="btn btn-default btnForfait" value="Rechercher" onclick="rechercheAjax()">
        </div>

        <div class="spacing col-m-12"></div>

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-2">Id</th>
              <th class="col-m-3">Nom</th>
              <th class="col-m-3">Prénom</th>
              <th class="col-m-4">No. Tél</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php
            require 'GestionAffichageClient.php';
            $gae = new GestionAffichageClient();
            echo $gae->getTableau(null, null);
            ?>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>

        <div class="col-m-12 col-t-6 col-6">
          <input class="btn btn-success" type="button" name="" onclick="clickInfo(); openForm();" value="Infos sur un client">
        </div>
        <div class="col-m-12 col-t-6 col-6">
          <input class="btn btn-danger" type="button" name="" onclick="clickSuppr(); openForm();" value="Supprimer un client">
        </div>

        <div class="spacing col-m-12"></div>


        <div class="form-popup" id="myForm">
          <form method="post" id="formulaire" name="formulaire" class="form-container">
            <h1 id="titre_myform"></h1>

            <label for="idClient"><b>Identifiant</b></label>
            <input type="text" placeholder="Identifiant" name="idClient" id="idClient" required>
            <span class="erreur" id="erreur"></span>

            <button type="button" onclick="siClientExiste();" id="btn_confirmer" class="btn">Confirmer</button>
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
