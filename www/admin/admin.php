<script type="text/javascript" src="js/tab.js"></script>
<div id="localisation"> > Gestion des Administrateur</div>
<?php

	// Suppression
	if(isset($_POST['delete'])){
		if($_POST['id'] != $_SESSION['admin']){
			Admin::deleteAdmin($_POST['id']);
			echo '<div class="success">Administrateur Supprimé</div>';
		}
	}

	// Récupération
	$admins = Admin::selectAdmins(1, 0, array("admin_pseudo != 'myadmin'"), 'admin_pseudo ASC');
?>

<div style="padding:10px; text-align:center;"><a href="<?php echo ADRESSE; ?>admin/index.php?page=ajout-admin">Ajouter un administrateur</a></div>

<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">Pseudo</th>
      <th data-placeholder="" class="filter-false sorter-false"></th>
      <th data-placeholder="" class="filter-false sorter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($admins as $list_admin){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$list_admin->getPseudo().'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-admin&amp;id='.$list_admin->getId().'"><img src="'.ADRESSE.'admin/images/icon_edit.png" /></a></td>';
			echo '<td style="text-align:center;">';
				echo '<form method="post" action="'.ADRESSE.'admin/index.php?page=admin" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$list_admin->getId().'"><button type="submit" class="suppr" name="delete"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form>';
			echo '</td>';
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