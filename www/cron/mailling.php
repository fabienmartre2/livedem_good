<?php
include('../conf/config.php');

// Nouvelles propositions
$propositions = Proposition::selectPropositions(1, 0, array('proposition_statut = 2', "proposition_update >= DATE_SUB(NOW(), INTERVAL 7 DAY)", "proposition_update <= NOW()"));
$debats = Proposition::selectPropositions(1, 0, array('proposition_statut = 3', "proposition_update >= DATE_SUB(NOW(), INTERVAL 7 DAY)", "proposition_update <= NOW()"));
$votes = Proposition::selectPropositions(1, 0, array('proposition_statut = 4', "proposition_update >= DATE_SUB(NOW(), INTERVAL 7 DAY)", "proposition_update <= NOW()"));
$votes_ok = Proposition::selectPropositions(1, 0, array('proposition_statut = 6', "proposition_update >= DATE_SUB(NOW(), INTERVAL 7 DAY)", "proposition_update <= NOW()"));
$votes_ko = Proposition::selectPropositions(1, 0, array('proposition_statut = 7', "proposition_update >= DATE_SUB(NOW(), INTERVAL 7 DAY)", "proposition_update <= NOW()"));

$news_proposition = "";
if(sizeof($propositions) == 0 ){
	$news_proposition = "Il n'y a pas eu de nouvelle proposition cette semaine. Déposer dès maintenant votre proposition sur ".ADRESSE;
}
foreach($propositions as $proposition){
	$news_proposition .= '- <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>, postée par '.$proposition->getUtilisateur()->getPseudo().'<br />';
}

$news_debat = "";
if(sizeof($debats) == 0 ){
	$news_debat = "Il n'y a pas eu de nouveau débat cette semaine. Déposer dès maintenant votre débat sur ".ADRESSE;
}
foreach($debats as $proposition){
	$news_debat .= '- <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>, postée par '.$proposition->getUtilisateur()->getPseudo().'<br />';
}

$news_vote = "";
if(sizeof($votes) == 0 ){
	$news_vote = "Il n'y a pas eu de nouveau vote cette semaine. Retrouvez l'ensemble des votes sur ".ADRESSE;
}
foreach($votes as $proposition){
	$news_vote .= '- <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>, postée par '.$proposition->getUtilisateur()->getPseudo().'<br />';
}

$news_voteok = "";
if(sizeof($votes_ok) == 0 ){
	$news_voteok = "Il n'y a pas eu de nouvelle proposition acceptée cette semaine. Retrouvez l'ensemble des votes sur ".ADRESSE;
}
foreach($votes_ok as $proposition){
	$news_voteok .= '- <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>, postée par '.$proposition->getUtilisateur()->getPseudo().'<br />';
}

$news_voteko = "";
if(sizeof($votes_ko) == 0 ){
	$news_voteko = "Il n'y a pas eu de nouvelle proposition refusée cette semaine. Retrouvez l'ensemble des votes sur ".ADRESSE;
}
foreach($votes_ko as $proposition){
	$news_voteko .= '- <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>, postée par '.$proposition->getUtilisateur()->getPseudo().'<br />';
}


//$utilisateurs = Utilisateur::selectUtilisateurs(1, 0, array("utilisateur_newsletter = 1", "utilisateur_id = 1"));
$utilisateurs = Utilisateur::selectUtilisateurs(1, 0, array("utilisateur_newsletter = 1"));

foreach($utilisateurs as $utilisateur){
	// Mail
	$blocmail_texte = BlocMail::selectBlocMail(12)->getContenu();
	$blocmail_texte = str_replace('$PSEUDO$', $utilisateur->getPseudo(), $blocmail_texte);
	$blocmail_texte = str_replace('$PRENOM$', $utilisateur->getPrenom(), $blocmail_texte);
	$blocmail_texte = str_replace('$NOM$', $utilisateur->getNom(), $blocmail_texte);
	$blocmail_texte = str_replace('$NEWS_PROPOSITION$', $news_proposition, $blocmail_texte);
	$blocmail_texte = str_replace('$NEWS_DEBAT$', $news_debat, $blocmail_texte);
	$blocmail_texte = str_replace('$NEWS_VOTE$', $news_vote, $blocmail_texte);
	$blocmail_texte = str_replace('$NEWS_VOTEOK$', $news_voteok, $blocmail_texte);
	$blocmail_texte = str_replace('$NEWS_VOTEKO$', $news_voteko, $blocmail_texte);
	Mail::send($utilisateur->getEmail(), MARQUE." - La newsletter hebdo", $blocmail_texte);
}