<?php

$where = array();
$whereData = array();

if(isset($_GET['villeId']) && !empty($_GET['villeId'])){
	$villes = Ville::selectVilles(1, 0, array(array('ville_id = :villeId'), array(':villeId' => $_GET['villeId'])) );
	if($villes && sizeof($villes) == 1){
		$ville = $villes[0];
		header('Status: 301 Moved Permanently', false, 301);      
  		header('Location: '.ADRESSE.'localite/ville/'.$ville->getFichier().'.html');  
	}
	elseif($villes && sizeof($villes) > 1){
		$smarty->assign('villes', $villes);
		$smarty->display('recherche_ville.tpl');
	}
	else{
		include('./modules/404.php');
		exit;
	}
}

elseif(isset($_GET['id']) && isset($_GET['id1'])){
	switch($_GET['id']){
		case 'region':
			$regions = Region::selectRegions(1, 1, array(array('region_fichier = :id1'), array(':id1' => $_GET['id1'])));
			if($regions){
				$region = $regions[0];
				$where = array('niveau_id IN (1, 2, 3)', '(region_id = :region_id OR departement_id IN (SELECT departement_id FROM departement WHERE region_id = :region_id) OR proposition.ville_id IN (SELECT ville.ville_id FROM ville JOIN departement ON departement.departement_id = ville.departement_id WHERE region_id = :region_id))');
				$whereData = array('region_id' => $region->getId());
				$titre = MARQUE.' dans votre région : '.$region->getNom().'';
				$titre_h1 = $region->getNom();
			}
			else{
				include('./modules/404.php');
				exit;
			}
			break;
		case 'departement':
			$departements = Departement::selectDepartements(1, 1, array(array('departement_fichier = :id1'), array(':id1' => $_GET['id1'])));
			if($departements){
				$departement = $departements[0];
				$where = array('niveau_id IN (1, 2)', '(departement_id = :departement_id OR proposition.ville_id IN (SELECT ville.ville_id FROM ville WHERE departement_id = :departement_id))');
				$whereData = array('departement_id' => $departement->getId());

				$titre = MARQUE.' dans votre département : '.$departement->getNom().'';
				$titre_h1 = $departement->getNom();
			}
			else{
				include('./modules/404.php');
				exit;
			}
			break;
		case 'ville':
			$villes = Ville::selectVilles(1, 1, array(array('ville_fichier = :id1'), array(':id1' => $_GET['id1'])));
			if($villes){
				$ville = $villes[0];
				$where = array('proposition.ville_id = "'.$ville->getId().'"');
				$titre = MARQUE.' dans votre ville : '.$ville->getNom().'';
				$titre_h1 = $ville->getNom();
			}
			else{
				include('./modules/404.php');
				exit;
			}
			break;
		default:
			include('./modules/404.php');
			exit;

	}

	$smarty->cache_lifetime = 60;
	$smarty->assign('HEAD_TITLE', $titre);
	$smarty->assign('HEAD_DESCRIPTION', $titre.' : Les actions citoyennes proches de chez vous');
	$smarty->assign('HEAD_KEYWORDS', MARQUE);



	$home_propositions = Proposition::selectPropositions(1, 4, array(array_merge($where, array('proposition_statut = 2')), $whereData), 'proposition_date DESC', array('JOIN utilisateur' => "utilisateur.utilisateur_id = proposition.utilisateur_id"));
	$smarty->assign('home_propositions', $home_propositions);

	$home_debats = Proposition::selectPropositions(1, 4, array(array_merge($where, array('proposition_statut = 3')), $whereData), 'proposition_date DESC', array('JOIN utilisateur' => "utilisateur.utilisateur_id = proposition.utilisateur_id"));
	$smarty->assign('home_debats', $home_debats);

	$home_votes = Proposition::selectPropositions(1, 4, array(array_merge($where, array('proposition_statut = 4')), $whereData), 'proposition_date DESC', array('JOIN utilisateur' => "utilisateur.utilisateur_id = proposition.utilisateur_id"));
	$smarty->assign('home_votes', $home_votes);

	$home_categories = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
	$smarty->assign('home_categories', $home_categories);

	$home_vosvotes = Proposition::selectPropositions(1, 3, array(array_merge($where, array('proposition_statut = 6', "proposition_resultat > 0")), $whereData), 'proposition_date DESC', array('JOIN utilisateur' => "utilisateur.utilisateur_id = proposition.utilisateur_id"));
	$smarty->assign('home_vosvotes', $home_vosvotes);

	$discussions = Groupe::selectGroupes(1, 6, array(), 'groupe_creation DESC');
	$smarty->assign('discussions', $discussions);

	$home_question = Sondage::selectSondages(1, 1, array('sondage_datefin >= NOW()'), 'sondage_date DESC');
	if($home_question){
		$smarty->assign('home_question', $home_question[0]);
	}


	$smarty->assign('region', (isset($region) ? $region : false ));
	$smarty->assign('departement', (isset($departement) ? $departement : false ));
	$smarty->assign('ville', (isset($ville) ? $ville : false ));
	$smarty->assign('titre_h1', (isset($titre_h1) ? $titre_h1 : false ));

	$smarty->display('accueil.tpl');
}
else{
	include('./modules/404.php');
}