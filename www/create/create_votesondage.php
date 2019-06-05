<?php

$nomClasse = "VoteSondage";
$nomTable = "votesondage";
$identifiant_table = "votesondage_id";

$tableau = array(
	'votesondage_id' => 'id',
	'sondage_id' => 'sondageId',
	'utilisateur_id' => 'utilisateurId',
	'votesondage_date' => 'date',
	'votesondage_ip' => 'ip',
	'votesondage_statut' => 'statut'
);

include('../create.php');

?>