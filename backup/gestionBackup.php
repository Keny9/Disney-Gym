<?php
/****************************************
 Fichier : gestionBackup.php
 Auteur : William Gonin
 Fonctionnalité : W-10 Classe requise pour faire la gestion des Backup
 Date : Mardi 16 Avril 2019
 Vérification :
 Date Nom Approuvé
 2019-05-03 Guillaume Approuvé
 2019-05-03 Karl Approuvé
 =========================================================
 Historique de modifications :
 Date Nom Description
 =========================================================
****************************************/


require_once 'connexion.php';
require_once 'backup.php';

class gestionBackup
{

  /*
  La fonction qui creer une Backup, pour linstant on doit creer la backup avec la commande a la ligne 32
  qu'on doit inserer dans le shell de xaamp et tout le backup fonctionne, donc la fonction sert a
  marquer dans la base de donne le chemin du script et sa date pour sen rapeller
  */
  function creerBackup($backup)
  {

    $tempconn = new Connexion;
    $conn = $tempconn->getConnexion();

    $requete1="mysqldump --user=root --password='' gymcentral > gymcentral.sql";

    $conn->query($requete1);

    $requete="INSERT INTO backup(id_backup, nom, date_backup, script) VALUES ('".$backup->getId_backup()."', '".$backup->getNom()."', '".$backup->getDate()."', '".$backup->getScript()."')";

    $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

  }
/*
Fonction pour supprimer une backup de la base de donne
*/
  function supprimerBackup($id_backup_b)
  {
    $tempconn = new Connexion;
    $conn = $tempconn->getConnexion();

    $requete="DELETE FROM backup WHERE id_backup = '".$id_backup_b."'";

    $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

  }
  /*
  Fonction pour trouver une backup a partir de son nom
*/
  function rechercherBackup($nom_b)
  {
    $tempconn = new Connexion;
    $conn = $tempconn->getConnexion();

    $requete="SELECT * FROM backup WHERE nom='".$nom_b."'";

    $result = $conn->query($requete);
      if(!$result){
        trigger_error($conn->error);
      }

      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $backup = new Backup($row['id_backup'], $row['nom'], $row['date_backup'], $row['script']);
      }

    return $backup;

  }
}
?>
