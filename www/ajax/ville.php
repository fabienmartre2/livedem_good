<?php
include('../conf/config.php');
$villes = Ville::selectVilles(1, 0, array('ville_codepostal = "'.$_GET['cp'].'"'));
foreach($villes as $ville){
	echo '<option value="'.$ville->getId().'">'.$ville->getNom().'</option>';
}
?>