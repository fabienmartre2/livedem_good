<?php

$petition = Petition::selectPetition($_GET['id']);
if($petition){
	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - '.$petition->getTitre());
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	$success = false;
	$error = "";

	$smarty->assign('petition', $petition);

	$smarty->assign('page_actif', "petitions");
	if(isset($_POST['message'])){

		if($global_utilisateur){
			$nb = Signature::getNbSignatures(array("petition_id = '".$petition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
			if($nb > 0){
				$error .= "Vous avez déjà signé la pétition";
			}
		}
		else
			$error .= "Vous devez vous connecter pour signer la pétition";
		
		if(empty($error)){
			$data = array('petitionId' => $petition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR'], 'message' => $_POST['message']);
			$vote_id = Signature::insertSignature($data);
			$success = true;
		}

	}

	$smarty->assign('signatures', Signature::selectSignatures(1, 0, array("petition_id = '".$petition->getId()."'")));
	if($global_utilisateur){
		$nb = Signature::getNbSignatures(array("petition_id = '".$petition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
		if($nb > 0){
			$smarty->assign('deja_vote', true);
		}
	}


	$smarty->assign('link_share', ADRESSE.'share.html?petitionId='.$petition->getId());

	$smarty->assign('success', $success);
	$smarty->assign('error', $error);
	$smarty->display('petition.tpl');
}

?>