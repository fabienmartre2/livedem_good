<?php

$smarty->cache_lifetime = 60;
$page = Annexe::selectAnnexe($_GET['id']);
if($page){
	$smarty->assign('HEAD_TITLE', MARQUE.' - '.$page->getTitre());
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	
	$smarty->assign('page', $page);
	if($utilisateur)
		$smarty->display('page_online.tpl');
	else
		$smarty->display('page.tpl');
}
?>