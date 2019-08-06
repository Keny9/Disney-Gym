<?php
/****************************************
Fichier : scriptSiCoursExiste.php
Auteur : Maxime Lussier
Fonctionnalité : Vérifie si le cours existe dans la Base de donnée
Date : 2019-05-01
Vérification :
Date Nom Approuvé
2019-05-03            Guillaume                  Approuvé
2019-05-03            Karl                       Approuvé
=========================================================
Historique de modifications :
Date Nom Description
=========================================================
****************************************/

include_once 'gestionEvenement.php';

$ge = new GestionEvenement();
$evenement = null;

//return $ge->getEmploye($_POST['identifiant']);

if(($evenement = $ge->getEvenement($_POST['no_cours'])) == null){
  echo "No_cours invalide";
}
else{

  $filePath = 'evenement.xml';
  $dom = new DOMDocument('1.0', 'utf-8');
  $root = $dom->createElement('cours');

    $id = $evenement->getId();
    $id_modele = $evenement->getIdModele();
    $instructeur = $evenement->getIdEmploye();
    $date = $evenement->getDate();
    $heure = $evenement->getHeure();
    $duree = $evenement->getDuree();
    $prix = $evenement->getPrix();

    $event = $dom->createElement('evenement');
    $event->setAttribute('id', $id);

    $xmlId = $dom->createElement('id', $id);
    $event->appendChild($xmlId);

    $xmlIdModele = $dom->createElement('modele', $id_modele);
    $event->appendChild($xmlIdModele);

    $xmlInstructeur = $dom->createElement('instructeur', $instructeur);
    $event->appendChild($xmlInstructeur);

    $xmlDate = $dom->createElement('date', $date);
    $event->appendChild($xmlDate);

    $xmlHeure = $dom->createElement('heure', $heure);
    $event->appendChild($xmlHeure);

    $xmlDuree = $dom->createElement('duree', $duree);
    $event->appendChild($xmlDuree);

    $xmlPrix = $dom->createElement('prix', $prix);
    $event->appendChild($xmlPrix);

    $root->appendChild($event);

  $dom->appendChild($root);
  $dom->save($filePath);

  include_once 'domValidator.php';
  $validator = new DomValidator;
  $validated = $validator->validateFeeds('evenement.xml');
  if (!$validated) {
    print_r("Une erreur est survenu, les données ne respectent pas le format XSD : ".$validator->displayErrors());
  }
}


 ?>
