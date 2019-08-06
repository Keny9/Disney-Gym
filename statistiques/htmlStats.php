<!DOCTYPE html>
<!--
Fichier : htmlStats.php
Auteur : William Gonin
Fonctionnalité : Page pour afficher les statistiques
Date : 2019-04-23

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03            Karl                      Oui
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================
 -->
 <?php
   session_start();

   include("../default/checkLogin.php");
 ?>

 <html lang="en" dir="ltr">
   <head>
     <script type="text/javascript" src="jquery-3.4.0.min.js"></script>
     <link href="tabulator-master/dist/css/tabulator.css" rel="stylesheet"/>
     <script type="text/javascript" src="tabulator-master/dist/js/tabulator.js"></script>
     <link rel="icon"  href="../img/favicon.ico" />
     <link rel="stylesheet" href="../css/style.css" />
     <link rel="stylesheet" href="style.css" />
     <script src="../js/script.js"></script>
     <script src="script.js"></script>
     <meta charset="utf-8">
     <title>Statistiques</title>
   </head>
   <body class="standard col-9">

     <!-- Menu de navigation -->
       <?php include '../default/header.php'; ?>
       <!-- Main (gris) -->
           <main>
             <h1 class="ha">Statistiques pour les forfaits</h1><br />

             <div id="example-table"></div>
             <h1 class="ha">Statistiques pour les cours</h1><br />
             <div id="example-table1"></div>
             <div  class="buttonAjax" id="ajax-trigger"> Ajax Load Stats</div>
             <div  class="buttonGuide">^Cliquer sur le button ci-haut pour obtenir les statistiques^</div>

             <script  src="script.js"></script>

           </main>

           <!-- Footer / Copyrights (rose) -->
           <?php
            include '../default/footer.php';
            ?>
   </body>
 </html>
