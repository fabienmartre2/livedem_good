<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Accueil');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);


$home_propositions = Proposition::selectPropositions(1, 4, array('proposition_statut = 2'), 'proposition_date DESC');
$smarty->assign('home_propositions', $home_propositions);

$home_debats = Proposition::selectPropositions(1, 4, array('proposition_statut = 3'), 'proposition_date DESC');
$smarty->assign('home_debats', $home_debats);

$home_votes = Proposition::selectPropositions(1, 4, array('proposition_statut = 4'), 'proposition_date DESC');
$smarty->assign('home_votes', $home_votes);

$home_categories = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
$smarty->assign('home_categories', $home_categories);

$home_vosvotes = Proposition::selectPropositions(1, 3, array('proposition_statut = 6', "proposition_resultat > 0"), 'proposition_date DESC');
$smarty->assign('home_vosvotes', $home_vosvotes);

$discussions = Groupe::selectGroupes(1, 6, array(), 'groupe_creation DESC');
$smarty->assign('discussions', $discussions);

$home_question = Sondage::selectSondages(1, 1, array('sondage_datefin >= NOW()'), 'sondage_date DESC');
if($home_question){
	$smarty->assign('home_question', $home_question[0]);
}

$smarty->display('accueil.tpl');