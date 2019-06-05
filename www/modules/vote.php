<?php

$sondage = Sondage::selectSondage($_GET['id']);
if($sondage){
	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - '.$sondage->getQuestion());
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	$success = false;
	$error = "";

	$smarty->assign('sondage', $sondage);

	$votes_1 = VoteSondage::getNbVoteSondage(array('sondage_id = "'.$sondage->getId().'"', 'votesondate_statut = 1'));
	$votes_2 = VoteSondage::getNbVoteSondage(array('sondage_id = "'.$sondage->getId().'"', 'votesondate_statut = 2'));
	$votes_3 = VoteSondage::getNbVoteSondage(array('sondage_id = "'.$sondage->getId().'"', 'votesondate_statut = 3'));
	$smarty->assign('votes_1', $votes_1);
	$smarty->assign('votes_2', $votes_2);
	$smarty->assign('votes_3', $votes_3);

	$smarty->assign('success', $success);
	$smarty->assign('error', $error);
	$smarty->display('vote.tpl');
}

?>