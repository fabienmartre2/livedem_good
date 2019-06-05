<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Discussions');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('page_actif', "discussions");

$liste_propositions = Groupe::selectGroupes(1, 0, array(), 'groupe_creation DESC');
$smarty->assign('liste_propositions', $liste_propositions);

$smarty->display('discussions.tpl');

?>