<div id="localisation"> > Gestion des pages annexes</div>
<?php


// Variable pour la pagination
$MAX_SUJET = 150;

// Préparation de la pagination
if(isset($_GET['limit']) && is_numeric($_GET['limit'])){
	if($_GET['limit'] < 1)
		$from = 0;
	else
		$from = ($_GET['limit'] - 1) * $MAX_SUJET;
}
else
	$from = 0;

// #####################################
// Affichage de la liste des catégories
// #####################################

  // On récupère la liste des paiements
    $reqCat = "SELECT * FROM annexe ORDER BY annexe_id DESC LIMIT $from, $MAX_SUJET";
	$resCat = $connexion->prepare($reqCat, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$resCat->execute();
	echo '<table class="responsive table table-bordered">';
	echo '<thead><tr>
					<th>Titre</th>
					<th style="width:60px;">Voir/Modifier</th>
				</tr></thead>';
	while ($cat = $resCat->fetch(PDO::FETCH_ASSOC)){
		// On affiche la catégorie
		echo '<tr>
			<td style="padding-left:5px;"><b>'.stripslashes($cat['annexe_titre']).'</b></td>
			<td style="text-align:center;"><a href="'.ADRESSE.'admin/index.php?page=modif-annexe&id='.$cat['annexe_id'].'">Voir/Modifier</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	
	// Affichages des nombres de pages
	
	$reqNbSujet = "SELECT * FROM annexe";
	$resNbSujet = $connexion->prepare($reqNbSujet, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$resNbSujet->execute();
	$nbsujet = $resNbSujet->rowCount();
	
	$nbPage = $nbsujet / $MAX_SUJET + 1;
	
	echo '<div class="pagination">Page : ';
	for($i=1; $i <= $nbPage; $i++){
		if((!isset($_GET['limit']) && $i == 1) || (isset($_GET['limit']) && $i == $_GET['limit']))
			echo ' '.$i.' ';
		else
			echo ' <a href="index.php?page=annexes&amp;limit='.$i.'">'.$i.'</a> ';
	}
	echo '</div>';

?>