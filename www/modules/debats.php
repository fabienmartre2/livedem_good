<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Débats');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('page_actif', "debats");

$liste_propositions = Proposition::selectPropositions(1, 0, array('proposition_statut >= 3'), 'IF(proposition_statut="3", -1, proposition_statut) ASC, proposition_date DESC');
$smarty->assign('liste_propositions', $liste_propositions);
$smarty->assign('statut', 3);

$smarty->display('debats.tpl');

?>