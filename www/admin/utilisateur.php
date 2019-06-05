<script type="text/javascript" src="js/tab.js"></script>

<div id="localisation"> > Gestion des utilisateurs</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des utilisateur
// #####################################

	if(isset($_POST['delete'])){
		Utilisateur::deleteUtilisateur($_POST['id']);
		echo '<div class="success">Utilisateur supprimé !</div>';
	}

	// Pagination
	$page_max = 0;
	$page_element = Utilisateur::getNbUtilisateurs();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=utilisateur";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $utilisateurs = Utilisateur::selectUtilisateurs($page_cur, $page_max, $where, "utilisateur.utilisateur_inscription DESC");
  
?>
<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">ID</th>
      <th data-placeholder="">Pseudo</th>
      <th data-placeholder="">E-Mail</th>
      <th data-placeholder="">Date</th>
      <th data-placeholder="" class="filter-false"></th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($utilisateurs as $utilisateur){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$utilisateur->getId().'</td>';
			echo '<td style="padding-left:5px;">'.$utilisateur->getPseudo().'</td>';
			echo '<td style="padding-left:5px;">'.$utilisateur->getEmail().'</td>';
			echo '<td style="padding-left:5px;">'.date('Y-m-d', strtotime($utilisateur->getInscription())).'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-utilisateur&amp;id='.$utilisateur->getId().'"  class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a></td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=utilisateur" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$utilisateur->getId().'"><button type="submit" name="delete"  class="btn btn-default btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button></form></td>';
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