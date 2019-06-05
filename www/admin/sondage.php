<script type="text/javascript" src="js/tab.js"></script>

<div id="localisation"> > Gestion des Questions du jour</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des sondage
// #####################################

	if(isset($_POST['delete'])){
		Sondage::deleteSondage($_POST['id']);
		echo '<div class="success">Suppression effectuée !</div>';
	}

	// Pagination
	$page_max = 0;
	$page_element = Sondage::getNbSondages();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=sondage";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $sondages = Sondage::selectSondages($page_cur, $page_max, $where, "sondage.sondage_date DESC");
  
?>
	<div style="padding:10px; text-align:center;"><a href="<?php echo ADRESSE; ?>admin/index.php?page=ajout-sondage">Ajouter une question</a></div>

<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">ID</th>
      <th data-placeholder="">Question</th>
      <th data-placeholder="">Date de fin</th>
      <th data-placeholder="" class="filter-false"></th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($sondages as $sondage){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$sondage->getId().'</td>';
			echo '<td style="padding-left:5px;">'.$sondage->getQuestion().'</td>';
			echo '<td style="padding-left:5px;">'.date('d/m/Y', strtotime($sondage->getDateFin())).'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-sondage&amp;id='.$sondage->getId().'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a></td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=sondage" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$sondage->getId().'"><button type="submit" name="delete"  class="btn btn-default btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button></form></td>';
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