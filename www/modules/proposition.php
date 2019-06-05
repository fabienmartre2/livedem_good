<?php

$proposition = Proposition::selectProposition($_GET['id']);
if($proposition && $proposition->getStatut() >= 1){
	$smarty->cache_lifetime = 60;
	$HEAD_TITLE = MARQUE.' - '.$proposition->getTitre();
	$HEAD_DESCRIPTION =  MARQUE;
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	$success = false;
	$success1 = false;
	$error = "";
	$error_access = false;

	if(isset($_GET['statut']) && ($_GET['statut'] == 2 || $_GET['statut'] == 3 || $_GET['statut'] == 4) && $_GET['statut'] < $proposition->getStatut())
		$statut = $_GET['statut'];
	else
		$statut = $proposition->getStatut();


	$smarty->assign('proposition', $proposition);

	if($statut == 1){
		$smarty->assign('page_actif', "propositions");

		if(isset($_POST['vote']) && $proposition->getStatut() == 1){

			if($global_utilisateur){
				if($global_utilisateur->getRang() > 0){
					$nb = Validation::getNbValidations(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
					if($nb > 0)
						$error .= "Vous avez déjà voté";
				}
				else{
					$error .= "Vous n'êtes pas citoyen référent. Vous ne pouvez pas valider les propositions. Pour le devenir, faites en la demande <a href=\"".ADRESSE."contact.html\" target=\"_blank\">ici</a> ";
				}
			}
			else{
				$error_access = true;
				$error .= "Vous devez vous connecter pour valider";
			}
			
			if(empty($error)){
				$data = array('propositionId' => $proposition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR'], 'statut' => $_POST['vote'], 'ip' => $_SERVER['REMOTE_ADDR']);
				$vote_id = Validation::insertValidation($data);
				// J'ai 2 votes OK
				$nb_ok = Validation::getNbValidations(array("proposition_id = '".$proposition->getId()."'", "validation_statut = 1"));
				$nb_ko = Validation::getNbValidations(array("proposition_id = '".$proposition->getId()."'", "validation_statut = 2"));
				if($nb_ok >= 2){
					$proposition->setStatut(2);
					$proposition->setUpdate(date('Y-m-d H:i:s'));
					PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 2, 'oldStatut' => 1));
					$blocmail_texte = BlocMail::selectBlocMail(7)->getContenu();
					$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
					$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
					$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
					$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
					$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
					Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
				}
				elseif($nb_ko < 2 && $_POST['vote'] == 2){
					// Vote négatif : Je contact un autre citoyen référent
					$referents = Utilisateur::selectUtilisateurs(1, 1, array('utilisateur_rang = 1', "utilisateur_id NOT IN (SELECT utilisateur_id FROM validation WHERE proposition_id = '".$proposition->getId()."')", "RAND()"));
					if($referents){
						$referent = $referents[0];
						$blocmail_texte = BlocMail::selectBlocMail(6)->getContenu();
						$blocmail_texte = str_replace('$PSEUDO$', $referent->getPseudo(), $blocmail_texte);
						$blocmail_texte = str_replace('$PRENOM$', $referent->getPrenom(), $blocmail_texte);
						$blocmail_texte = str_replace('$NOM$', $referent->getNom(), $blocmail_texte);
						$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
						$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
						Mail::send($referent->getEmail(), MARQUE." - Une proposition est en attente", $blocmail_texte);
					}
				}
				elseif($nb_ko >= 2){
					$proposition->setStatut(7);
					$proposition->setUpdate(date('Y-m-d H:i:s'));
					PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => 7, 'oldStatut' => 1));
					$blocmail_texte = BlocMail::selectBlocMail(1)->getContenu();
					$blocmail_texte = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $blocmail_texte);
					$blocmail_texte = str_replace('$PRENOM$', $proposition->getUtilisateur()->getPrenom(), $blocmail_texte);
					$blocmail_texte = str_replace('$NOM$', $proposition->getUtilisateur()->getNom(), $blocmail_texte);
					$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
					$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
					Mail::send($proposition->getUtilisateur()->getEmail(), MARQUE." - Votre proposition évolue", $blocmail_texte);
				}
				$success = true;
			}

		}
		$smarty->assign('defendeurs', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 1")));
		$smarty->assign('opposants', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 2")));
		$smarty->assign('participants', Feed::getParticipants(3, $proposition->getId()));
		$feed = Feed::getFeedSpecial(3, $proposition->getId());
		$smarty->assign('feed', $feed);
		$smarty->assign('votes_pour', Vote::selectVotes(1, 0, array("proposition_id = '".$proposition->getId()."'", "vote_statut = 1")));
		$smarty->assign('votes_contre', Vote::selectVotes(1, 0, array("proposition_id = '".$proposition->getId()."'", "vote_statut = 2")));
		$smarty->assign('nb_votes', Vote::getNbVotes(array("proposition_id = '".$proposition->getId()."'")));
	}
	elseif($statut == 2){
		/* Début Référencement */
		$HEAD_TITLE = Config::get('meta_titre_prop2');
		$HEAD_TITLE = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$ZONE$', $proposition->getZone(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_TITLE);
		$HEAD_DESCRIPTION = Config::get('meta_desc_prop2');
		$HEAD_DESCRIPTION = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$ZONE$', $proposition->getZone(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_DESCRIPTION);
		/* Fin Référencement */
		$smarty->assign('page_actif', "propositions");
		if(isset($_POST['soutenir']) && $proposition->getStatut() == $statut){
			if($global_utilisateur){
				$nb = Soutien::getNbSoutiens(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
				if($nb > 0)
					$error .= "Vous soutenez déjà la proposition";
			}
			else{
				$error .= "Vous devez vous connecter pour soutenir une proposition";
				$error_access = true;
			}

			if(empty($error)){
				$data = array('propositionId' => $proposition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR']);
				Soutien::insertSoutien($data);
				$success = true;
			}
		}
		$smarty->assign('soutiens', Soutien::selectSoutiens(1, 0, array("proposition_id = '".$proposition->getId()."'")));
		$feed = Feed::getFeedSpecial($proposition->getStatut(), $proposition->getId());
		$smarty->assign('feed', $feed);
	}
	elseif($statut == 3){
		/* Début Référencement */
		$HEAD_TITLE = Config::get('meta_titre_prop3');
		$HEAD_TITLE = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$ZONE$', $proposition->getZone(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_TITLE);
		$HEAD_DESCRIPTION = Config::get('meta_desc_prop3');
		$HEAD_DESCRIPTION = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$ZONE$', $proposition->getZone(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_DESCRIPTION);
		/* Fin Référencement */
		$smarty->assign('page_actif', "debats");
		if(isset($_POST['defendre']) && $proposition->getStatut() == $statut){
			if($global_utilisateur){
				$nb = Debat::getNbDebats(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
				if($nb > 0)
					$error .= "Vous êtes déjà inscrit au débat";
			}
			else{
				$error .= "Vous devez vous connecter pour vous inscrire au débat";
				$error_access = true;
			}
				

			if(empty($error)){
				$data = array('propositionId' => $proposition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR'], 'statut' => $_POST['defendre']);
				Debat::insertDebat($data);
				$success = true;
			}

		}
		if(isset($_POST['live']) && $proposition->getStatut() == $statut){

			if($global_utilisateur){
				$nb = DebatLive::getNbDebatLives(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
				if($nb > 0)
					$error .= "Vous êtes déjà inscrit au tirage au sort du débat en live";
			}
			else{
				$error .= "Vous devez vous connecter pour vous inscrire au débat en live";
				$error_access = true;
			}
			
			if(empty($error)){
				$data = array('propositionId' => $proposition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR']);
				DebatLive::insertDebatLive($data);
				$success1 = true;
			}
			
		}
		if($global_utilisateur){
			$smarty->assign('etre_inscrit', Debat::getNbDebats(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'")));
		}
		$smarty->assign('defendeurs', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 1")));
		$smarty->assign('opposants', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 2")));
		$smarty->assign('participants', Feed::getParticipants($proposition->getStatut(), $proposition->getId()));
		$feed = Feed::getFeedSpecial($proposition->getStatut(), $proposition->getId());
		$smarty->assign('feed', $feed);
	}
	elseif($statut == 4){
		/* Début Référencement */
		$HEAD_TITLE = Config::get('meta_titre_prop4');
		$HEAD_TITLE = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$ZONE$', $proposition->getZone(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_TITLE);
		$HEAD_TITLE = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_TITLE);
		$HEAD_DESCRIPTION = Config::get('meta_desc_prop4');
		$HEAD_DESCRIPTION = str_replace('$TITRE$', $proposition->getTitre(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$ZONE$', $proposition->getZone(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$PSEUDO$', $proposition->getUtilisateur()->getPseudo(), $HEAD_DESCRIPTION);
		$HEAD_DESCRIPTION = str_replace('$CATEGORIE$', $proposition->getCategorie()->getNom(), $HEAD_DESCRIPTION);
		/* Fin Référencement */
		$smarty->assign('page_actif', "votes");
		if(isset($_POST['vote']) && $proposition->getStatut() == 4){

			if($global_utilisateur){
				$nb = Vote::getNbVotes(array("proposition_id = '".$proposition->getId()."'", "utilisateur_id = '".$global_utilisateur->getId()."'"));
				if($nb > 0)
					$error .= "Vous avez déjà voté";
			}
			else{
				$error_access = true;
				$error .= "Vous devez vous connecter pour voter";
			}
			
			if(empty($error)){
				$code = random(10);
				$data = array('propositionId' => $proposition->getId(), 'utilisateurId' => $global_utilisateur->getId(), 'ip' => $_SERVER['REMOTE_ADDR'], 'statut' => $_POST['vote'], 'code' => $code);
				$vote_id = Vote::insertVote($data);
				$vote = Vote::selectVote($vote_id);
				$blocmail_texte = BlocMail::selectBlocMail(1)->getContenu();
				$blocmail_texte = str_replace('$PSEUDO$', $vote->getUtilisateur()->getPseudo(), $blocmail_texte);
				$blocmail_texte = str_replace('$PRENOM$', $vote->getUtilisateur()->getPrenom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM$', $vote->getUtilisateur()->getNom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM_PROPOSITION$', $vote->getProposition()->getTitre(), $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$vote->getProposition()->getId().'.html', $blocmail_texte);
				$blocmail_texte = str_replace('$CODE$', $code, $blocmail_texte);
				Mail::send($vote->getUtilisateur()->getEmail(), MARQUE." - Votre vote", $blocmail_texte);
				$success = true;
			}

		}
		$smarty->assign('defendeurs', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 1")));
		$smarty->assign('opposants', Debat::selectDebats(1, 0, array("proposition_id = '".$proposition->getId()."'", "debat_statut = 2")));
		$smarty->assign('participants', Feed::getParticipants(3, $proposition->getId()));
		$feed = Feed::getFeedSpecial(3, $proposition->getId());
		$smarty->assign('feed', $feed);
		$smarty->assign('votes_pour', Vote::selectVotes(1, 0, array("proposition_id = '".$proposition->getId()."'", "vote_statut = 1")));
		$smarty->assign('votes_contre', Vote::selectVotes(1, 0, array("proposition_id = '".$proposition->getId()."'", "vote_statut = 2")));
		$smarty->assign('nb_votes', Vote::getNbVotes(array("proposition_id = '".$proposition->getId()."'")));
	}


	$smarty->assign('HEAD_TITLE', $HEAD_TITLE);
	$smarty->assign('HEAD_DESCRIPTION', $HEAD_DESCRIPTION);

	$smarty->assign('link_share', ADRESSE.'share.html?propositionId='.$proposition->getId());

	$smarty->assign('success', $success);
	$smarty->assign('success1', $success1);
	$smarty->assign('error', $error);
	$smarty->assign('error_access', $error_access);
	$smarty->assign('statut', $statut);
	$smarty->display('proposition_'.$statut.'.tpl');
}

?>