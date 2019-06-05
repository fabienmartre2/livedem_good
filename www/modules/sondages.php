<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Sondages');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);


$liste_propositions = Sondage::selectSondages(1, 0, array(), 'sondage_date DESC');
$smarty->assign('liste_propositions', $liste_propositions);

$smarty->display('sondages.tpl');

?>