<script type="text/javascript" src="js/tab.js"></script>

<div id="localisation"> > Gestion des catégories</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des categorie
// #####################################

	// Pagination
	$page_max = 0;
	$page_element = Categorie::getNbCategories();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=categorie";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $categories = Categorie::selectCategories($page_cur, $page_max, $where, "categorie.categorie_nom ASC");
  
?>
<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">ID</th>
      <th data-placeholder="">Nom</th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($categories as $categorie){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$categorie->getId().'</td>';
			echo '<td style="padding-left:5px;">'.$categorie->getNom().'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-categorie&amp;id='.$categorie->getId().'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a></td>';
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