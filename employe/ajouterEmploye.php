<?php
/****************************************
Fichier : recherche.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour ajouter un employe
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
****************************************/
include_once 'gestionEmploye.php';
include_once 'employe.php';

$ge = new GestionEmploye();
$employe = new Employe( $_POST['identifiant'],
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['courriel'],
                        $_POST['dateNaissance'],
                        $_POST['dateEmbauche'],
                        $_POST['telephone'],
                        $_POST['nas'],
                        $_POST['password'],
                        $_POST['ville'],
                        $_POST['rue'],
                        $_POST['noPorte'],
                        $_POST['poste'],
                        $_POST['etat']);
$ge->ajouterEmploye($employe);

 ?>
