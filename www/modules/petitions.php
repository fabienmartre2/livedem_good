<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Petitions');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('page_actif', "petitions");

$liste_petitions = Petition::selectPetitions(1, 0, null, 'petition_date DESC');
$smarty->assign('liste_petitions', $liste_petitions);

$smarty->display('petitions.tpl');

?>