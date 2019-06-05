<script type="text/javascript" src="js/tab.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>js/shadowbox.css" media="screen" />
<script type="text/javascript" src="<?php echo ADRESSE; ?>js/shadowbox.js"></script>
<script type="text/javascript">Shadowbox.init();</script>

<div id="localisation"> > Gestion des photos</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des photo
// #####################################

	if(isset($_POST['delete'])){
		Photo::deletePhoto($_POST['id']);
		echo '<div class="success">Photo supprimée !</div>';
	}

	// Pagination
	$page_max = 0;
	$page_element = Photo::getNbPhotos();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=photo";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $photos = Photo::selectPhotos($page_cur, $page_max, $where, "photo.photo_date DESC");
  
?>
<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="" class="filter-false"></th>
      <th data-placeholder="">Utilisateur</th>
      <th data-placeholder="">Message</th>
      <th data-placeholder="">Date</th>
      <th data-placeholder="">IP</th>
      <th data-placeholder="" class="filter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($photos as $data){
    	$photo = Photo::selectPhoto($data);
    	$utilisateur = Utilisateur::selectUtilisateur($photo->getUtilisateurId());
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;"><a href="'.ADRESSE.'modules/get_image.php?width=800&height=800&image=data/photos/'.$photo->getLocalisation().'" rel="shadowbox;player=img"><img src="'.ADRESSE.'modules/get_square.php?image=data/photos/'.$photo->getLocalisation().'&width=40" /></a></td>';
			echo '<td style="padding-left:5px;">'.$utilisateur->getPseudo().'</td>';
			echo '<td style="padding-left:5px;">'.$photo->getTitre().'</td>';
			echo '<td style="padding-left:5px;">'.$photo->getDate().'</td>';
			echo '<td style="padding-left:5px;">'.$photo->getIp().'</td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=photo" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$photo->getId().'"><button type="submit" name="delete"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form></td>';
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