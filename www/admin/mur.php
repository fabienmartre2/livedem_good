<script type="text/javascript" src="js/tab.js"></script>

<div id="localisation"> > Gestion des murs</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des mur
// #####################################

	if(isset($_POST['delete'])){
		Mur::deleteMur($_POST['id']);
		echo '<div class="success">Message supprimée !</div>';
	}

	if(isset($_POST['deleteCommentaire'])){
		Commentaire::deleteCommentaire($_POST['id']);
		echo '<div class="success">Message supprimée !</div>';
	}

	// Pagination
	$page_max = 0;
	$page_element = Mur::getNbMurs();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=mur";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $murs = Mur::selectMurs($page_cur, $page_max, $where, "mur.mur_date DESC");
  
?>
<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">Utilisateur</th>
      <th data-placeholder="">Message</th>
      <th data-placeholder="">Date</th>
      <th data-placeholder="">IP</th>
      <th data-placeholder="" class="filter-false"></th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($murs as $data){
    	$mur = Mur::selectMur($data);
    	$utilisateur = Utilisateur::selectUtilisateur($mur->getUtilisateurId());
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$utilisateur->getPseudo().'</td>';
			echo '<td style="padding-left:5px;">'._substr($mur->getMessage(), 120, 3).'</td>';
			echo '<td style="padding-left:5px;">'.$mur->getDate().'</td>';
			echo '<td style="padding-left:5px;">'.$mur->getIp().'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-mur&amp;id='.$mur->getId().'"><img src="'.ADRESSE.'admin/images/icon_edit.png" /></a></td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=mur" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$mur->getId().'"><button type="submit" name="delete"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form></td>';
		echo '</tr>';
		$commentaires = Commentaire::selectCommentaires(1, 0, array('type_id = 1', 'commentaire_objetid = "'.$mur->getId().'"'));
		foreach($commentaires as $data1){
	    	$commentaire = Commentaire::selectCommentaire($data1);
	    	$utilisateur = Utilisateur::selectUtilisateur($commentaire->getUtilisateurId());
			// On affiche la catégorie
			echo '<tr>';
				echo '<td style="padding-left:5px;">'.$utilisateur->getPseudo().'</td>';
				echo '<td style="padding-left:25px;"> - '.$commentaire->getMessage().'</td>';
				echo '<td style="padding-left:5px;">'.$commentaire->getDate().'</td>';
				echo '<td style="padding-left:5px;">'.$commentaire->getIp().'</td>';
				echo '<td style="text-align:center;"><a href="index.php?page=modif-commentaire&amp;id='.$commentaire->getId().'"><img src="'.ADRESSE.'admin/images/icon_edit.png" /></a></td>';
				echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=mur" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$commentaire->getId().'"><button type="submit" name="deleteCommentaire"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form></td>';
			echo '</tr>';
		}
	}
  ?>
  </tbody>
</table>

<div id="pager" class="pager pagination">
	<form>
		<img src="images/first.png" class="first"/>
		<img src="images/prev.png" class="prev"/>
		<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
		<img src="images/next.png" class="next"/>
		<img src="images/last.png" class="last"/>
	</form>
</div>