<?php

include('./conf/config.php');
$config = LOCALISATION . 'lib/hybridauth/config.php';
require_once( "lib/hybridauth/Hybrid/Auth.php" );


// init hybridauth
  $hybridauth = new Hybrid_Auth( $config );
 
  // try to authenticate with twitter
  $adapter = $hybridauth->authenticate( "Facebook" );
 
  // return Hybrid_User_Profile object intance
  $user_profile = $adapter->getUserProfile();
 
  echo "Hi there! " . $user_profile->displayName;

  // grab the user's friends list
  $user_contacts = $adapter->getUserContacts();
 
  // iterate over the user friends list
  foreach( $user_contacts as $contact ){
     echo $contact->displayName.' '.$contact->email. "<hr />";
  }


// $regions = Region::selectRegions(1, 0);
// foreach($regions as $region){
// 	$region->setFichier(formater_url($region->getNom()));
// }

// $departements = Departement::selectDepartements(1, 0);
// foreach($departements as $departement){
// 	$departement->setFichier(formater_url($departement->getNom()));
// }

// $villes = Ville::selectVilles(1, 0);
// foreach($villes as $ville){
// 	$ville->setFichier(formater_url($ville->getNom()));
// }

// $referent = Utilisateur::selectUtilisateur(1);
// $proposition = Proposition::selectProposition(5);

// $blocmail_texte = BlocMail::selectBlocMail(6)->getContenu();
// $blocmail_texte = str_replace('$PSEUDO$', $referent->getPseudo(), $blocmail_texte);
// $blocmail_texte = str_replace('$PRENOM$', $referent->getPrenom(), $blocmail_texte);
// $blocmail_texte = str_replace('$NOM$', $referent->getNom(), $blocmail_texte);
// $blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
// $blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
// Mail::send($referent->getEmail(), MARQUE." - Une proposition est en attente", $blocmail_texte);