<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Recherche par départements');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$home_categories = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
$smarty->assign('home_categories', $home_categories);

$home_question = Sondage::selectSondages(1, 1, array('sondage_datefin >= NOW()'), 'sondage_date DESC');
if($home_question){
	$smarty->assign('home_question', $home_question[0]);
}

$smarty->display('departements.tpl');