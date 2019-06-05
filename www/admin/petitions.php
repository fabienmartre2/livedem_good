<script type="text/javascript" src="js/tab.js"></script>

<div id="localisation"> > Gestion des petitions</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des petition
// #####################################

	if(isset($_POST['delete'])){
		Petition::deletePetition($_POST['id']);
		echo '<div class="success">Elément supprimé !</div>';
	}

	// Pagination
	$page_max = 0;
	$page_element = Petition::getNbPetitions();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=petitions";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $petitions = Petition::selectPetitions($page_cur, $page_max, $where, "petition.petition_date DESC");
  
?>
<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">ID</th>
      <th data-placeholder="">Titre</th>
      <th data-placeholder="">Créateur</th>
      <th data-placeholder="">Date</th>
      <th data-placeholder="" class="filter-false"></th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($petitions as $petition){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$petition->getId().'</td>';
			echo '<td style="padding-left:5px;">'.$petition->getTitre().'</td>';
			echo '<td style="padding-left:5px;"><a href="'.ADRESSE.'admin/index.php?page=modif-utilisateur&id='.$petition->getUtilisateurId().'">'.$petition->getUtilisateur()->getPrenom().' '.mb_strtoupper($petition->getUtilisateur()->getNom()).'</a></td>';
			echo '<td style="padding-left:5px;">'.$petition->getDate().'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-petition&amp;id='.$petition->getId().'"  class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a></td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=petitions" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$petition->getId().'"><button type="submit" name="delete"  class="btn btn-default btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button></form></td>';
		echo '</tr>';
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