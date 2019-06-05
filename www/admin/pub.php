<div id="localisation"> > Gestion des pubs</div>
<?php

// ###############################
// Affichage de la liste des pubs
// ###############################

	// On récupère la liste des pages
	$reqCat = "SELECT * FROM pub ORDER BY pub_bloc";
	$resCat = $connexion->prepare($reqCat, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$resCat->execute();
	echo '<div style="text-align:center; padding:10px;"><a href="index.php?page=ajout-pub">Ajouter une publicité</a></div>';
	echo '<table width = "100%">';
	echo '<tr style="text-align:center; background-color:#082450; color:white; font-weight:bold;">
					<td>Format</td>
					<td style="width:60px;">Modification</td>
				</tr>';
	$i = 0;
  while ($cat = $resCat->fetch(PDO::FETCH_ASSOC)){
		if($i%2 == 0)
			$color = "#F2F2F2";
		else
			$color = "#CEDEF0";

		switch($cat['pub_bloc']){
			case 1 : $bloc = "Accueil Header : 728x92"; break;
			case 2 : $bloc = "Accueil Gauche : 250x250"; break;
		}

		// On affiche la catégorie
		echo '<tr style="background-color:'.$color.';">
						<td style="padding-left:5px;"><b>'.stripslashes($bloc).' - '.stripslashes($cat['pub_annonceur']).'</b></td>
						<td style="text-align:center;"><a href="index.php?page=modif-pub&amp;id='.$cat['pub_id'].'">Modifier</a></td>';
		echo '</tr>';
	$i ++;	
	}
	echo '</table>';	

?>