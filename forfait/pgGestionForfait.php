<?php
/****************************************
Fichier : pgGestionForfait.php
Auteur : Karl Boutin
Page web qui nous permet de gérer les différents type de forfaits
offert dans le gym
Date : 2019-04-15

Vérification :
Date                  Nom                       Approuvé
=========================================================
2019-05-03            William Gonin               Approuvé
2019-05-03            Guillaume Côté              Approuvé
2019-05-03            Maxime Lussier              Approuvé

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/

  require_once("../Employe/employe.php");
  require_once('../forfait/forfait.php');
  require_once('../forfait/gestionForfait.php');
  require_once('../service/service.php');
  require_once('../service/gestionServices.php');

  session_start();

  include("../default/checkLogin.php");

  $gestionService = new GestionServices();
  $gestionForfait = new GestionForfait();

  $arrForfait = $gestionForfait->getAllForfait();
  $arrService = $gestionService->getAllService();

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion Forfait</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_forfait.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script_forfait.js"></script>
    <script src="../js/script.js"></script>
  </head>
  <body class="standard col-9 col-t-9 col-m-12" onload="init();">

      <!-- Menu de navigation -->
      <?php include('../default/header.php');?>

      <!-- Main (gris) -->
      <main>

        <div id="alert" class="alert col-6 col-t-6 col-m-12">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <span id="textErreur"></span>
        </div>

        <form action="ajouterModifierForfait.php" method="post">

          <div class="form-forfait col-8 col-t-11 col-m-11" >
            <h1 class="gestionTitre">Gestion des forfaits</h1>

            <div id="erreurNom" class="erreur">
              <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo $error;
                }
              ?>
            </div>

            <div class="group-input col-12">
              <label for="nomAbo" class="col-3 col-t-3 col-m-12">Nom du forfait : </label>
              <input class="col-3 col-t-3 col-m-10" type="text" name="nomAbo" id="nomAbo"><br><br><br>
            </div>
            <div class="erreur"></div>

            <div class="group-input">
              <label for="duree" class="col-3 col-t-3 col-m-12">Durée du forfait : </label>
              <select class="col-2 col-t-2 col-m-10" name="duree" id="duree">
                <option value="1">1 mois</option>
                <option value="3">3 mois</option>
                <option value="6">6 mois</option>
                <option value="12">12 mois</option>
              </select><br><br><br>
            </div>

            <div id="erreurPrix" class="erreur"></div>
            <div class="group-input">
              <label for="prix" class="col-3 col-t-3 col-m-12">Prix :</label>
              <input class="col-1 col-t-1 col-m-10" type="text" name="prix" id="prix" value="">
              <span class="signeF">$</span><br><br><br>
            </div>

            <div class="group-input">
              <label class="col-3 col-t-3" for="service">Service(s) : <i class="fa fa-question-circle tooltip"><span class="tooltiptext">En sélectionnant un forfait de la liste des forfaits, vous devez sélectionner les services désirés à nouveau.</span></i></label>
              <select class="listForfait col-3 col-t-4 col-m-10" multiple="multiple" size="3" name="services[]" tabindex="1">
                <?php
                  foreach($arrService as $service){
                    echo "<option value='".$service->getNomService()."'> ".$service->getNomService()."</option>";
                  }
                ?>
              </select><br><br><br>
            </div>

            <div id="erreurDescription" class="erreur"></div>
            <div class="group-input">
              <label for="description" class="col-3 col-t-3 col-m-12">Description :</label>
              <textarea class="" name="description" id="description" rows="5" cols="28"></textarea><br><br>
            </div>

            <p class="gestionTitre col-m-12 col-t-12">Horaire d'accès au gym</p>

            <div class="row">

              <div class="column col-6 col-t-12 col-m-12">
                <p class="headerF">Semaine</p><br>

                <div id="erreurHeureDebutSemaine" class="erreur"></div>
                <div class="group-input">
                  <label class="col-5 col-t-5 col-m-12" for="heureDebutSemaine">Heure de début :</label>
                  <input class="col-1 col-t-1 col-m-10"type="text" name="heureDebutSemaine" id="heureDebutSemaine">
                  <p class="signeF">h</p><br><br>
                </div>


                <div id="erreurHeureFinSemaine" class="erreur"></div>
                <div class="group-input">
                  <label class="col-5 col-t-5 col-m-12" for="heureFinSemaine">Heure de fin :</label>
                  <input class="col-1 col-t-1 col-m-10" type="text" name="heureFinSemaine" id="heureFinSemaine">
                  <p class="signeF">h</p>
                </div>
              </div>

              <div class="column col-6 col-t-12 col-m-12" id="column2">
                <p class="headerF">Fin de semaine</p><br>

                <div id="erreurHeureDebutFds" class="erreur"></div>
                <div class="group-input">
                  <label class="col-5 col-t-5 col-m-12" for="heureDebutFds">Heure de début :</label>
                  <input class="col-1 col-t-1 col-m-10" type="text" name="heureDebutFds" id="heureDebutFds">
                  <p class="signeF">h</p><br><br>
                </div>

                <div id="erreurHeureFinFds" class="erreur"></div>
                <div class="group-input">
                  <label class="col-5 col-t-5 col-m-12" for="heureFinFds">Heure de fin :</label>
                  <input class="col-1 col-t-1 col-m-10" type="text" name="heureFinFds" id="heureFinFds">
                  <p class="signeF">h</p>
                </div>
              </div>
            </div>

            <br><br>

            <div class="btnGestionForfait">
              <input class="btn btn-success btnForfait" type="submit" name="btnAjouter" value="Ajouter" onclick="return validateFormForfait()">
              <input class="btn btn-primary btnForfait" type="submit" name="btnModifier" value="Modifier" onclick="return validateFormForfait()">
            </div>

          </div>

          <div class="form-forfait col-3 col-t-11 col-m-11">
            <p id="titreForfait">Forfaits</p>

            <select id="list2" class="listForfait" multiple="multiple" size="7" name="forfaits[]" tabindex="1" onchange="changeFunc();">
              <option id="optionVide" value="vide" selected="selected">vide</option>
              <?php
                foreach($arrForfait as $forfait){
                  if($forfait->getEtat() == 1){
                    echo "<option value='".$forfait->getNom()."'> ".$forfait->getNom()."</option>";
                  }
                }
              ?>
            </select>
            <input class="btn btn-danger btnForfait" id="btnSuppForfait" type="submit" formaction="deleteForfait.php" name="supprimer" value="Supprimer" onclick="return ifSelected()">
            <br><br>

          </div>
        </form>
        <img id="goofy" class="col-3 col-t-12 col-m-12" src="../img/goofy.png" alt="Goofy">

      </main>

      <!-- Footer / Copyrights (rose) -->
      <?php include('../default/footer.php') ?>
  </body>
</html>

<?php
  unset($_SESSION["error"]);
 ?>
