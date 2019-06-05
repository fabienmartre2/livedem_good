<?php

	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', MARQUE.' - Recherche');
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	$where = array();
	$whereData = array();
	$current_url = ADRESSE."recherche.html?1=1";
	if(isset($_GET['categorieId']) && !empty($_GET['categorieId'])){
		$current_url .= "&categorieId=".htmlentities($_GET['categorieId']);
		$where[] = "proposition.categorie_id = :categorieId";
		$whereData['categorieId'] = $_GET['categorieId'];
	}
	if(isset($_GET['niveauId']) && !empty($_GET['niveauId'])){
		$current_url .= "&niveauId=".htmlentities($_GET['niveauId']);
		$where[] = "proposition.niveau_id = :niveauId";
		$whereData['niveauId'] = $_GET['niveauId'];
	}
	if(isset($_GET['statut']) && !empty($_GET['statut'])){
		$current_url .= "&statut=".htmlentities($_GET['statut']);
		$where[] = "proposition.proposition_statut = :statut";
		$whereData['statut'] = $_GET['statut'];
	}
	if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
		$current_url .= "&keyword=".htmlentities($_GET['keyword']);
		$where[] = "proposition.proposition_description LIKE :keyword OR proposition.proposition_titre LIKE :keyword";
		$whereData['keyword'] = '%'.$_GET['keyword'].'%';
	}
	if(isset($_GET['date']) && !empty($_GET['date'])){
		$current_url .= "&date=".htmlentities($_GET['date']);
		$where[] = "proposition.proposition_date LIKE :date";
		$whereData['date'] = Date::frtoen($_GET['date']).'%';
	}
	if(isset($_GET['cp']) && !empty($_GET['cp'])){
		$current_url .= "&cp=".htmlentities($_GET['cp']);
		$where[] = "ville.ville_codepostal LIKE :cp";
		$whereData['cp'] = $_GET['cp'];
	}

	$join_array = array(
		'JOIN utilisateur' => "utilisateur.utilisateur_id = proposition.utilisateur_id",
		'JOIN ville' => "utilisateur.ville_id = ville.ville_id"
	);

	$liste_propositions = Proposition::selectPropositions(1, 0, array($where, $whereData), 'proposition_date DESC', $join_array);
	$smarty->assign('liste_propositions', $liste_propositions);

	$smarty->display('recherche.tpl');

?>