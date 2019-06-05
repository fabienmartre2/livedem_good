<?php

if($categorie = Categorie::selectCategorie($_GET['id'])){

	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - Propositions');
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);


	$liste_propositions = Proposition::selectPropositions(1, 0, array(array("categorie_id = :categorie_id"), array(':categorie_id' => $categorie->getId())), 'proposition_date DESC');
	$smarty->assign('liste_propositions', $liste_propositions);
	$smarty->assign('categorie', $categorie);

	$smarty->display('categorie.tpl');

}
else
	include('404.php');
?>