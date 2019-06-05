<?php

$nomClasse = "Sondage";
$nomTable = "sondage";
$identifiant_table = "sondage_id";

$tableau = array(
	'sondage_id' => 'id',
	'sondage_question' => 'question',
	'sondage_date' => 'date',
	'sondage_datefin' => 'dateFin'
);

include('../create.php');

?>