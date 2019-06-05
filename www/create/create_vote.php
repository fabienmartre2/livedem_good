<?php

$nomClasse = "Vote";
$nomTable = "vote";
$identifiant_table = "vote_id";

$tableau = array(
	'vote_id' => 'id',
	'proposition_id' => 'propositionId',
	'utilisateur_id' => 'utilisateurId',
	'vote_date' => 'date',
	'vote_ip' => 'ip',
	'vote_code' => 'code',
	'vote_statut' => 'statut'
);

include('../create.php');

?>