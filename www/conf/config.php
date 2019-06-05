<?php
session_start();
// Base de données : A Modifier
define("SERVER","localhost");
define("USER","livedem");
define("PASSWD","jSh8Nf7n4QxY54D");
define('DB_NAME', "livedem");
define('PORT', "3306");
define("PDO_DSN","mysql:host=" . SERVER . ";port=" . PORT . ";dbname=" . DB_NAME);
define('VERSION', '1.0');
// Connexion à la BDD : NE PAS TOUCHER
try{
	$connexion = new PDO(PDO_DSN, USER, PASSWD);
}
catch(Exception $e){
	echo 'Connexion impossible a la base de donnees. Veuillez renouveller votre demande dans quelques secondes 1.';
	die();
}
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->query("SET NAMES utf8");

// Configuation Générale
define('LOCALISATION', $_SERVER['DOCUMENT_ROOT'].'/');
define('ADRESSE', "http://www.livedem.org/");
define('MARQUE', "LiveDem");
define('EMAIL', "contact@livedem.org");
define("PAYPAL","contact@livedem.org");

// fonction
include(LOCALISATION.'lib/fonctions.php');

// Langue FR
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

// Configuration Facebook
define('APP_ID', "1454089631509734");
define('APP_SECRET', "6bc138eb05d7c04cccb30cefdc0147e2");

// Smarty
require(LOCALISATION.'lib/Smarty/Smarty.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir(LOCALISATION.'templates/');
$smarty->setCompileDir(LOCALISATION.'data/templates_c/');
$smarty->setCacheDir(LOCALISATION.'data/cache/');
$smarty->caching = false;
$smarty->force_compile = true;
$smarty->assign('ADRESSE', ADRESSE);
$smarty->assign('MARQUE', MARQUE);
$smarty->assign('PAYPAL', PAYPAL);
$smarty->assign('EMAIL', EMAIL);

// Swift
require(LOCALISATION.'lib/Swift/swift_required.php');

// TCPDF
require(LOCALISATION.'lib/tcpdf/tcpdf.php');

// AutoLoad
include(LOCALISATION.'conf/autoload.php');


?>