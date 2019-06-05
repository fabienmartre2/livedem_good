<?php

// Configuration générale
include('conf/config.php');
$page = ((isset($_GET['page'])) ? $_GET['page'] : '');

// Utilisateur
$global_utilisateur = Utilisateur::estConnecte();
$smarty->assign('global_utilisateur', $global_utilisateur);

if($page != "inscription" && $page != "connexion" && $page != "deconnexion")
	$_SESSION['precedent'] = $_SERVER['REQUEST_URI'];


// Contrôleur général
if(empty($page))
	include('modules/accueil.php');
elseif(file_exists('modules/'.$_GET['page'].'.php'))
	include('modules/'.$_GET['page'].'.php');
else
	include('modules/404.php');
