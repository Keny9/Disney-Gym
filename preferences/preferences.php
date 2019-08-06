<?php
/****************************************
 Fichier : preferences.php
 Auteur : William Gonin
 Fonctionnalité : W-11 Classe requise pour faire Preferences
 Date : Mardi 16 Avril 2019
 Vérification :
 Date                   Nom                        Approuvé
 2019-05-03           Guillaume                    Approuvé
 2019-05-03           Karl                         Approuvé
 =========================================================



 Historique de modifications :
 Date                   Nom                        Description
 =========================================================
  23-04-2019             Guillaume Côté            Finaliser
****************************************/
class Preference
{
  private $theme = 1;   //0 = dark, 1 = light
  private $nomTheme;
  private $police = 14;  //14 = valeur de base

  function __construct()
  {
    $this->setDefaut();
  }

  public function getTheme()
  {
    return $this->theme;
  }

  public function setTheme($theme_p)
  {
    $this->theme = $theme_p;
    if($theme_p == 1){
      $this->setNomTheme("Clair");
    }else{
      $this->setNomTheme("Sombre");
    }
  }
  public function getPolice()
  {
    return $this->police;
  }

  public function setPolice($police_p)
  {
    $this->police = $police_p;
  }

  public function getNomTheme()
  {
    return $this->nomTheme;
  }

  public function setNomTheme($nom)
  {
    $this->nomTheme = $nom;
  }

  function setDefaut()
  {
    $this->setTheme(1);
    $this->setPolice(14);
  }
}
?>
