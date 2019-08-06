<?php
/****************************************
Fichier : scriptModifierEmploye.php
Auteur : Maxime Lussier
Fonctionnalité : Script php pour modifier un employe
Date : 2019-04-24
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/
include_once 'gestionEmploye.php';
include_once 'employe.php';
include_once '../evenement/gestionEvenement.php';
include_once '../evenement/evenement.php';
include_once '../Outils/connexion.php';

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

$gev = new GestionEvenement();

$tempconn = new Connexion();
$conn = $tempconn->getConnexion();

$newId = $_POST['identifiant'];
$oldId = $_POST['oldId'];

/*$evenement = $gev->getAllEvenement('identifiant_employe', $_POST['oldId']);

if($evenement != null){
  for($i = 0; $i < sizeof($evenement); $i++){
    //Change l'id de l'employe dans l'evenement
    $evenement[$i]->setIdEmploye($_POST['identifiant']);
    //Fait la modification*/
$requete = "SET AUTOCOMMIT = 0;
SET FOREIGN_KEY_CHECKS = 0;
SET UNIQUE_CHECKS = 0;

LOCK TABLES employe WRITE, evenement WRITE;

UPDATE evenement SET identifiant_employe = '$newId'
WHERE identifiant_employe = '$oldId';

UPDATE employe
          SET identifiant = '".$employe->getIdentifiant()."',
          nom = '".$employe->getNom()."',
          prenom = '".$employe->getPrenom()."',
          courriel = '".$employe->getCourriel()."',
          date_naissance = '".$employe->getDateNaissance()."',
          date_embauche = '".$employe->getDateEmbauche()."',
          telephone = '".$employe->getTelephone()."',
          nas = '".$employe->getNas()."',
          mot_passe = '".$employe->getMotDePasse()."',
          ville = '".$employe->getVille()."',
          nom_rue = '".$employe->getRue()."',
          no_porte = '".$employe->getNo()."',
          id_poste = '".$employe->getPoste()."',
          id_etat = '".$employe->getEtat()."'
          WHERE identifiant = '$oldId';

UNLOCK TABLES;

SET AUTOCOMMIT = 1;
SET FOREIGN_KEY_CHECKS = 1;
SET UNIQUE_CHECKS = 1;";

$resultat = $conn->multi_query($requete);
if(!$resultat){
  trigger_error($conn->error);
}

$ge->modifierEmploye($employe, $_POST['identifiant']);
?>
