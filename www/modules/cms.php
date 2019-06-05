<?php

// Initialisation des variables
$success = false;
$error = "";
// Traitement du formulaire
// Formulaire correctement rempli
if($pages = Annexe::selectAnnexes(1, 1, array(array("annexe_fichier = :fichier"), array(':fichier' => $_GET['id'])) )){
	$page = $pages[0];
	$HEAD_TITLE = MARQUE." - ".$page->getTitre();
	$HEAD_DESCRIPTION = $page->getDescription();


	$smarty->assign('HEAD_TITLE', $HEAD_TITLE);
	$smarty->assign('HEAD_DESCRIPTION', $HEAD_DESCRIPTION);

	$smarty->assign('page', $page);

	$smarty->display('cms.tpl');
}
else{
	include('404.php');
}
?>