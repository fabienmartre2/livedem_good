<?php

$sondage = Sondage::selectSondage($_GET['id']);
if($sondage){
	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - '.$sondage->getQuestion());
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

		$success = false;
	$error = "";

	if(isset($_POST['voter'])){
		if(!Utilisateur::estConnecte())
			$error .= "Vous devez vous connecter pour voter <br />";
		if(!isset($_POST['statut']) && ($_POST['statut'] != 1 || $_POST['statut'] != 2 || $_POST['statut'] != 3))
			$error .= "Vote invalide <br />";
		if(Utilisateur::estConnecte()){		
			$nb = VoteSondage::getNbVoteSondages(array("sondage_id = '".$sondage->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
			if($nb > 0)
				$error .= "Vous avez déjà voté pour ce sondage <br />";
		}

		if(empty($error)){
			$data = array('sondageId' => $sondage->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR'], 'statut' => $_POST['statut']);
			$vote_id = VoteSondage::insertVoteSondage($data);
			$success = true;
		}
	}



	$smarty->assign('sondage', $sondage);

	$votes_1 = VoteSondage::getNbVoteSondages(array('sondage_id = "'.$sondage->getId().'"', 'votesondage_statut = 1'));
	$votes_2 = VoteSondage::getNbVoteSondages(array('sondage_id = "'.$sondage->getId().'"', 'votesondage_statut = 2'));
	$votes_3 = VoteSondage::getNbVoteSondages(array('sondage_id = "'.$sondage->getId().'"', 'votesondage_statut = 3'));
	if($global_utilisateur)
		$deja_vote = VoteSondage::getNbVoteSondages(array("sondage_id = '".$sondage->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
	else
		$deja_vote = 0;
	$smarty->assign('votes_1', $votes_1);
	$smarty->assign('votes_2', $votes_2);
	$smarty->assign('votes_3', $votes_3);
	$smarty->assign('deja_vote', $deja_vote);

	$smarty->assign('success', $success);
	$smarty->assign('error', $error);
	$smarty->display('sondage.tpl');
}

?>