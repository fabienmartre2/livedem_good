<?php


$_SESSION['id'] = "";
header('Refresh:2; url='.ADRESSE);

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Déconnexion');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->display('deconnexion.tpl');

?>