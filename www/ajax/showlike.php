<?php
include('../conf/config.php');

$interactions = Interaction::selectInteractions(1, 0, array("type_id = '".$_GET['typeID']."'", "interaction_objetid = '".$_GET['objetID']."'", "interaction_valeur = '1'", "interaction_delete = 0"));
$utilisateurs = array();
foreach($interactions as $data){
	$interaction = Interaction::selectInteraction($data);
	$utilisateurs[] = $interaction->getUtilisateurId();
}
$smarty->assign('utilisateurs', $utilisateurs);
$smarty->display('showlike.tpl');