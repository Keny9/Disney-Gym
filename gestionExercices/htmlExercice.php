<!--
 Fichier : gestionExercices.html
 Auteur : William Gonin
 Fonctionnalité : W-07 Page html requise pour faire la Gestion des Exercices
 Date : Mercredi 17 Avril 2019
 Vérification :
 Date                 Nom                           Approuvé
2019-05-03           Guillaume                      Approuvé
2019-05-03            Karl                            Oui
 =========================================================
 Historique de modifications :
 Date Nom Description
 ========================================================= -->
 <?php
   session_start();

   include("../default/checkLogin.php");
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="../css/bootstrap.min.css">

     <link rel="stylesheet" href="../css/style.css" />
     <link rel="stylesheet" href="../css/style-max.css" />

     <link rel="icon"  href="img/favicon.ico" />
     <link rel="icon"  href="../img/favicon.ico" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script src="exercice.js"></script>
     <script src="../js/script.js"></script>
     <meta charset="utf-8">
     <title>Gestion des Exercices</title>
   </head>

   <body>

       <!-- Main (gris) -->
       <div class="contenu">
         <?php include '../default/header.php'; ?>

         <main class = "gestion_employe col-m-12">


             <h1 class="ha">Gestion des Exercices</h1>

             <div class="spacing col-m-12"></div>

             <div class="gestion_employe_filler col-m-1"></div>
             <table class="fixed_header col-m-10">
               <thead>
                 <tr>
                   <th class="col-m-2">Nom</th>
                   <th class="col-m-3">Description</th>
                   <th class="col-m-3">Image</th>
                   <th class="col-m-4">Type</th>
                 </tr>
               </thead>
               <tbody id="tbody">
                 <?php
                 require 'gestionAffichageExercices.php';
                 $gae = new gestionAffichageExercices();
                 echo $gae->getTableau();
                 ?>
               </tbody>
             </table>
             <div class="gestion_employe_filler col-m-1"></div>

             <div class="spacing col-m-12"></div>


             <div class="conteneur_bouton col-m-12 col-t-4 col-4">
               <input class="btn btn-success btnForfait" type="button" onclick="location.href='page_ajout_exercice.php';" value="Ajouter">
             </div>
             <div class="conteneur_bouton col-m-12 col-t-4 col-4">
               <input class="btn btn-primary btnForfait" type="button" onclick="clickModif(); openForm();" value="Modifier">
             </div>
             <div class="conteneur_bouton col-m-12 col-t-4 col-4">
               <input class="btn btn-danger btnForfait"  type="button" onclick="clickSuppr(); openForm();" value="Supprimer">
             </div>

             <div class="spacing col-m-12"></div>

             <div class="form-popup" id="myForm">
               <form method="post" id="formulaire" name="formulaire" class="form-container">
                 <h1 id="titre_myform"></h1>

                 <label for="idExercice"><b>Identifiant</b></label>
                 <input type="text" placeholder="Identifiant" name="idExercice" id="idExercice" required>
                 <span class="erreur" id="erreur"></span>

                 <button type="button" onclick="siExerciceExiste()" id="btn_confirmer" class="btn">Confirmer</button>
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
