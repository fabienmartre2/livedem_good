<?php
include('../conf/config.php');

// Passer d'une proposition à un débat
$propositions = Proposition::selectPropositions(1, 0, array('proposition_statut = 2', "DATE_ADD(proposition_update, INTERVAL proposition_dureesoutien WEEK) <= NOW()"));
foreach($propositions as $proposition){
	$soutiens = Soutien::getNbSoutiens(array("proposition_id = '".$proposition->getId()."'"));
	switch($proposition->getNiveauId()){
		case 1:
			$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id = '.$proposition->getUtilisateur()->getVille()->getId().''));
			break;
		case 2:
			$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id IN (SELECT ville_id FROM ville WHERE departement_id = '.$proposition->getUtilisateur()->getDepartement()->getId().')'));
			break;
		case 3:
			$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id IN (SELECT ville_id FROM ville WHERE departement_id IN (SELECT departement_id FROM departement WHERE region_id = '.$proposition->getUtilisateur()->getRegion()->getId().'))'));
			break;
		case 4:
			$utilisateur = Utilisateur::getNbUtilisateurs();
			break;
	}

	if($soutiens / $utilisateur > (Config::get('pourcentage_soutien')/100)){
		// Je passe en Débats
		$proposition->setStatut(3);
		$proposition->setUpdate(date('Y-m-d H:i:s'));
		PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 3, 'oldStatut' => 2));
		// Mail
		$blocmail_texte = BlocMail::selectBlocMail(1)->getContenu();
		$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
		$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
		$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
		Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);


	}
	else{
		// Fin de la proposition
		$proposition->setStatut(7);
		$proposition->setUpdated(date('Y-m-d H:i:s'));
		PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 7, 'oldStatut' => 2));
		// Mail
		$blocmail_texte = BlocMail::selectBlocMail(2)->getContenu();
		$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
		$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
		$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
		Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
	}
}

// Passer d'un débat au vote
$propositions = Proposition::selectPropositions(1, 0, array('proposition_statut = 3', "DATE_ADD(proposition_update, INTERVAL proposition_dureedebat WEEK) <= NOW()"));
foreach($propositions as $proposition){
	// Je passe en Vote
	$proposition->setStatut(4);
	$proposition->setUpdate(date('Y-m-d H:i:s'));
	PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 4, 'oldStatut' => 3));
	// Mail
	$blocmail_texte = BlocMail::selectBlocMail(3)->getContenu();
	$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
	$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
	$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
	$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
	$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
	Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
}

// // Passer d'un vote à la fin
$propositions = Proposition::selectPropositions(1, 0, array('proposition_statut = 4', "DATE_ADD(proposition_update, INTERVAL proposition_dureevote WEEK) <= NOW()"));
foreach($propositions as $proposition){
	$vote_pour = Vote::getNbVotes(array("proposition_id = '".$proposition->getId()."'", "vote_statut = 1"));
	$vote_contre = Vote::getNbVotes(array("proposition_id = '".$proposition->getId()."'", "vote_statut = 2"));
	// La proposition est acceptée
	if($vote_pour >= $vote_contre){
		$proposition->setStatut(6);
		$proposition->setUpdate(date('Y-m-d H:i:s'));
		PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 6, 'oldStatut' => 4));
		// Mail
		$blocmail_texte = BlocMail::selectBlocMail(4)->getContenu();
		$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
		$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
		$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
		Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
	}
	else{
		$proposition->setStatut(7);
		$proposition->setUpdated(date('Y-m-d H:i:s'));
		PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 7, 'oldStatut' => 4));
		// Mail
		$blocmail_texte = BlocMail::selectBlocMail(5)->getContenu();
		$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
		$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
		$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
		$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
		Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
	}
}
