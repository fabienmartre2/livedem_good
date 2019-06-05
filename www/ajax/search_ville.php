<?php
header('Content-Type: text/json');
include('../conf/config.php');
$retour = array();
$villes = Ville::selectVilles(1, 0, array(array('(ville_codepostal LIKE :data OR ville_nom LIKE :data1)'), array(':data' => $_GET['query']."%", ':data1' => "%".$_GET['query']."%")));
foreach($villes as $ville){
	$retour[] = array('id' => $ville->getId(), 'name' => $ville->getCodepostal().' - '.$ville->getNom());
}
echo json_encode($retour);
?>