<!DOCTYPE html>

<!-- /****************************************
Fichier : page_gestion_cours.js
Auteur : Maxime Lussier
Fonctionnalité : Page HTML de l'affichage de gestion des cours
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-02            Karl                       Approuvé
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
  <script src="../js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="cours.js"></script>
</head>

<?php
$nomPage = "Gestion des cours";
?>


<body>
  <div class="contenu">
    <?php include '../default/header.php'; ?>

    <main class = "gestion_cours col-m-12">

        <h1><?php echo $nomPage ?></h1>

        <div class="form_contain col-m-12 col-t-7">
          <form name="formulaire_1" id="formulaire_1" method="post">
            <p class="sous_titre">Infos cours</p>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="id">ID du cours :</label>
              </div>
              <div class="col-m-6">
                <input type="text" name="id" id="id" value="">
              </div>
              <span class="erreur" id="erreur_id"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="modele">Modele :</label>
              </div>
              <div class="col-m-6">
                <select class="" name="modele" id="modele">
                  <option disabled selected value> -- Choisir une option -- </option>
                  <?php
                    require_once 'gestionAffichageEvenement.php';
                    $gae = new GestionAffichageEvenement();
                    echo $gae->getOptionModele();
                   ?>
                </select>
              </div>
              <span class="erreur" id="erreur_modele"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="instructeur">Instructeur :</label>
              </div>
              <div class="col-m-6">
                <select class="" name="instructeur" id="instructeur">
                  <option disabled selected value> -- Choisir une option -- </option>
                  <?php
                    require_once 'gestionAffichageEvenement.php';
                    $gae = new GestionAffichageEvenement();
                    echo $gae->getOptionInstructeur();
                   ?>
                </select>
              </div>
              <span class="erreur" id="erreur_instructeur"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="date">Date :</label>
              </div>
              <div class="col-m-6">
                <input type="date" name="date" id="date" value="">
              </div>
              <span class="erreur" id="erreur_date"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="heure">Heure :</label>
              </div>
              <div class="col-m-6">
                <select class="" name="heure" id="heure">
                  <option value="5">5h</option>
                  <option value="6">6h</option>
                  <option value="7">7h</option>
                  <option value="8">8h</option>
                  <option value="9">9h</option>
                  <option value="10">10h</option>
                  <option value="11">11h</option>
                  <option value="12">12h</option>
                  <option value="13">13h</option>
                  <option value="14">14h</option>
                  <option value="15">15h</option>
                  <option value="16">16h</option>
                  <option value="17">17h</option>
                  <option value="18">18h</option>
                  <option value="19">19h</option>
                  <option value="20">20h</option>
                </select>
              </div>
              <span class="erreur" id="erreur_heure"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="duree">Durée en heures :</label>
              </div>
              <div class="col-m-6">
                <input type="text" name="duree" id="duree" value="">
              </div>
              <span class="erreur" id="erreur_duree"></span>
            </div>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="prix">Prix :</label>
              </div>
              <div class="col-m-6">
                <input type="text" name="prix" id="prix" value="">
              </div>
              <span class="erreur" id="erreur_prix"></span>
            </div>

            <input type="hidden" id="old_id" name="old_id" value="">

            <div class="cours_ligne cours_ligne_centre col-m-12">
              <div class="col-m-6">
                <button class="btn btn-success btnGlobal" type="button" onclick="validerAjout()" name="ajouter">Ajouter</button>
              </div>
              <div class="col-m-6">
                <button class="btn btn-primary btnGlobal" type="button" onclick="validerModif()" name="modifier">Modifier</button>
              </div>
            </div>
          </form>
        </div>

        <div class="form_contain col-m-12 col-t-5">
          <form class="" action="index.html" method="post">
            <p class="sous_titre">Cours</p>

            <div class="cours_ligne col-m-12">
              <div class="col-m-6">
                <label for="no_cours">No Cours :</label>
              </div>
              <div class="col-m-6">
                <input type="text" name="no_cours" id="no_cours" value="">
              </div>
            </div>
            <div class="col-m-12">
              <button class="btn btn-default btnGlobalLong" type="button" onclick="rechercheCours()" name="recherche">Rechercher</button>
            </div>

            <div class="cours_ligne cours_ligne_centre col-m-12">
              <table class="fixed_header">

                <thead>
                  <th class="col-m-3">No. Cours</th>
                  <th class="col-m-3">Modele</th>
                  <th class="col-m-3">Date</th>
                  <th class="col-m-3">Instructeur</th>
                </thead>
                <tbody id="tbody">
                  <script>
                  //  rechercheAjax();
                  </script>
                  <?php
                  require_once 'gestionAffichageEvenement.php';
                  $gae = new GestionAffichageEvenement();
                  echo $gae->getTableau("");
                  ?>
                </tbody>
              </table>
            </div>
            <div class="spacing"></div>
            <input class="btn btn-info btnGlobalLong" type="button" name="afficher_cours" id="afficher_cours" onclick="clickAffiche(); openForm();" value="Afficher un cours">
            <div class="spacing"></div>
            <input class="btn btn-danger btnGlobalLong" type="button" name="supprimer_cours" value="Supprimer un cours" onclick="clickSuppr(); openForm();">
            <div class="spacing"></div>
          </form>
        </div>


        <div class="form-popup" id="myForm">
          <form method="post" id="formulaire" name="formulaire" class="form-container">
            <h1 id="titre_myform">Cours à afficher</h1>

            <label for="no_a_modif"><b>No. cours</b></label>
            <input type="text" placeholder="C00001" name="no_a_modif" id="no_a_modif" required>
            <span class="erreur" id="erreur"></span>

            <button class="btnGlobal" type="button" onclick="siCoursExiste()" id="btn_confirmer" class="btn">Confirmer</button>
            <button class="btnGlobal" type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
          </form>
        </div>
      </main>

    <?php
    include '../default/footer.php';
    ?>
  </div>
</body>

</html>
