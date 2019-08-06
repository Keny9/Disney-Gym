<!DOCTYPE html>
<!-- /****************************************
Fichier : page_employe_gestion.php
Auteur : Maxime Lussier
Fonctionnalité : Page HTML pour la gestion d'employe
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

<?php
$nomPage = "Gestion des employés";
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
          <input class="btn btn-default btnGlobalLong" type="button" value="Rechercher" onclick="rechercheAjax()">
        </div>

        <div class="spacing col-m-12"></div>

        <div class="gestion_employe_filler col-m-1"></div>
        <table class="fixed_header col-m-10">
          <thead>
            <tr>
              <th class="col-m-3">Id</th>
              <th class="col-m-3">Nom</th>
              <th class="col-m-3">Prénom</th>
              <th class="col-m-3">No. Tél</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <script>
            //  rechercheAjax();
            </script>
            <?php
            require 'gestionAffichageEmploye.php';
            $gae = new GestionAffichageEmploye();
            echo $gae->getTableau(null, null);
            ?>
          </tbody>
        </table>
        <div class="gestion_employe_filler col-m-1"></div>

        <div class="spacing col-m-12"></div>

        <div class="conteneur_bouton col-m-12 col-t-4">
          <input class="btn btn-success btnGlobalLong" type="button" onclick="location.href='page_ajout_employe.php';" value="Ajouter un employé">
        </div>
        <div class="conteneur_bouton col-m-12 col-t-4">
          <input class="btn btn-primary btnGlobalLong" type="button" name="" onclick="clickModif(); openForm();" value="Modifier un employé">
        </div>
        <div class="col-m-12 col-t-4">
          <input class="btn btn-danger btnGlobalLong" type="button" name="" onclick="clickSuppr(); openForm();" value="Supprimer un employé">
        </div>

        <div class="spacing col-m-12"></div>


        <div class="form-popup" id="myForm">
          <form method="post" id="formulaire" name="formulaire" class="form-container">
            <h1 id="titre_myform"></h1>

            <label for="idEmploye"><b>Identifiant</b></label>
            <input type="text" placeholder="Identifiant" name="idEmploye" id="idEmploye" required>
            <span class="erreur" id="erreur"></span>

            <button type="button" onclick="siEmployeExiste()" id="btn_confirmer" class="btn">Confirmer</button>
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
