<?php
/****************************************
 Fichier : backup.php
 Auteur : William Gonin
 Fonctionnalité : W-10 Classe requise pour faire la Gestion de Backup
 Date : Mardi 16 Avril 2019
 Vérification :
 Date Nom Approuvé
 2019-05-03 Guillaume Approuvé
 2019-05-03 Karl      Approuvé
 =========================================================
 Historique de modifications :
 Date Nom Description
 =========================================================
****************************************/
class backup
{
  private $id_backup;
  private $nom;
  private $date;

  /*
  Constructeur de la classe backup, le script est le String du chemin ou il est situer
  */
  function __construct( $id_backup_b, $nom_b,$date_b,$script_b)
  {

    $this->setId_backup($id_backup_b);

    $this->setNom($nom_b);
    $this->setDate($date_b);
    $this->setScript($script_b);

  }
  public function getId_backup()
  {
    return $this->id_backup;
  }

  public function setId_backup($id_backup_b)
  {
    $this->id_backup = $id_backup_b;
  }
  public function getNom()
  {
    return $this->nom;
  }

  public function setNom($nom_b)
  {
    $this->nom = $nom_b;
  }

   public function getDate()
  {
    return $this->date;
  }

  public function setDate($date_b)
  {
    $this->date = $date_b;
  }
    public function getScript()
  {
    return $this->script;
  }

  public function setScript($script_b)
  {
    $this->script = $script_b;
  }
}
?>
