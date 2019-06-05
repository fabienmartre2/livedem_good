<?php

$groupe = Groupe::selectGroupe($_GET['id']);
if($groupe){
	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - '.$groupe->getNom());
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);
	$smarty->assign('page_actif', "discussions");

	$success = false;
	$error = "";

	$smarty->assign('groupe', $groupe);

	$feed = Feed::getFeedSpecial(20, $groupe->getId());
	$smarty->assign('feed', $feed);

	$other_groupes = Groupe::selectGroupes(1, 5, array(array('groupe_id != :groupe_id'), array(':groupe_id' => $_GET['id'])), 'RAND()');

	$smarty->assign('participants', Feed::getParticipants(20, $groupe->getId()));

	$smarty->assign('link_share', ADRESSE.'share.html?groupeId='.$groupe->getId());

	$smarty->assign('other_groupes', $other_groupes);
	$smarty->assign('success', $success);
	$smarty->assign('error', $error);
	$smarty->display('discussion.tpl');
}

?>