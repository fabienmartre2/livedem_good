<?php

$nomClasse = "Utilisateur";
$nomTable = "utilisateur";
$identifiant_table = "utilisateur_id";

$tableau = array(
	'utilisateur_id' => 'id',
	'utilisateur_pseudo' => 'pseudo',
	'utilisateur_nom' => 'nom',
	'utilisateur_prenom' => 'prenom',
	'utilisateur_email' => 'email',
	'utilisateur_password' => 'password',
	'utilisateur_adresse' => 'adresse',
	'ville_id' => 'villeId',
	'utilisateur_datenaissance' => 'dateNaissance',
	'utilisateur_telfixe' => 'telFixe',
	'utilisateur_telport' => 'telPort',
	'utilisateur_inscription' => 'inscription',
	'utilisateur_numsecu' => 'numSecu',
	'utilisateur_numelecteur' => 'numElecteur',
	'utilisateur_bureauvote' => 'bureauVote',
	'utilisateur_valid' => 'valid',
	'utilisateur_ip' => 'ip',
	'utilisateur_rang' => 'rang',
	'utilisateur_admin' => 'admin'
);

include('../create.php');

?>