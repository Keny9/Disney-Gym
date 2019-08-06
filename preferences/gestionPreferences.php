<?php
/****************************************
 Fichier : gestionPreferences.php
 Auteur : William Gonin
 Fonctionnalité : W-11 Classe requise pour faire les Preferences
 Date : Mardi 16 Avril 2019
 Vérification :
 Date                    Nom                    Approuvé
 2019-05-03           Guillaume                 Approuvé
 2019-05-03             Karl                    Oui
 =========================================================

 Historique de modifications :
 Date                    Nom                   Description
 =========================================================
 23-04-2019              Guillaume Côté       Correction et continuation
****************************************/
  include_once 'preferences.php';

  class GestionPreferences
  {

    private $preference;

    function  __construct(Client $client){
      $this->preference = new preference();
      $monFichier = fopen('../preference.txt', 'r');

      while (($line = fgets($monFichier)) !== false) {
          // process the line read.
          $mot = explode(" ", $line); //return word array
          if($mot[0] == $client->getIdentifiant()){
            $this->preference->setTheme($mot[1]);
            $this->preference->setPolice($mot[2]);
          }
      }

      fclose($monFichier);
    }

    /**
    * Methode qui sauvegarde la nouvelle préférence dans le fichier preference.txt
    * @param client
    * @param theme
    * @param police
    */
    function sauvegarderPreferences($client, $theme, $police){
      $monFichier = fopen('../preference.txt', 'a');

      $txt = $client->getIdentifiant().' '.$theme.' '.$police."\n";
      $ancienTxt = $client->getIdentifiant().' '.$this->preference->getTheme().' '.$this->preference->getPolice();
      $count = 0;

      $contents = file_get_contents('../preference.txt');
      $contents = str_replace($ancienTxt, $txt, $contents, $count);
      file_put_contents('../preference.txt', $contents);

      //L'utilisateur n'est pas dans le fichier préférence
      if($count == 0){
        echo "nouveau";

        fwrite($monFichier, $txt);
      }
      fclose($monFichier);
    }

    /**
    * Restaure les valeurs de préférences par celle par défaut
    */
    function restaurerDefaut(){
      $this->preference->setTheme(1);
      $this->preference->setPolice(14);
    }

    /**
    * Methode qui renvoit la préférence
    * retourne un objet préférence
    */
    function getPreference(){
      return $this->preference;
    }

  }

?>
