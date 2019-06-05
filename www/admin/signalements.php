<script type="text/javascript" src="js/tab.js"></script>
<div id="localisation"> > Gestion des signalements</div>
<?php

	if(isset($_POST['delete'])){
		$signalement = Signalement::selectSignalement($_POST['id']);
		switch($signalement->getTypeId()){
			case '1':
				$mur = Mur::selectMur($signalement->getObjetId());
				if($mur)
					$mur->setSuppression(1);
				break;
			case '2':
				$photo = Photo::selectPhoto($signalement->getObjetId());
				if($photo)
					$photo->setSuppression(1);
				break;
			case '3':
				Commentaire::deleteCommentaire($signalement->getObjetId());
				break;
		}
		Signalement::deleteSignalement($_POST['id']);
		echo '<div class="success">Signalement traité !</div>';
	}

	if(isset($_POST['ignore'])){
		Signalement::deleteSignalement($_POST['id']);
		echo '<div class="success">Signalement traité !</div>';
	}


	// Récupération
	$signalements = Signalement::selectSignalements(1, 0, array(), 'signalement_date DESC');

?>

<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">Date</th>
      <th data-placeholder="">Source</th>
      <th data-placeholder="">Info</th>
      <th data-placeholder="" class="filter-false sorter-false"></th>
      <th data-placeholder="" class="filter-false sorter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($signalements as $signalement){
    	switch($signalement->getTypeId()){
			case '1':
				$mur = Mur::selectMur($signalement->getObjetId());
				$container = $mur->getTypeConteneur();
				$containerId = $mur->getConteneurId();
				$signalement_texte = 'Publication : '.$mur->getMessage().'';
				break;
			case '2':
				$photo = Photo::selectPhoto($signalement->getObjetId());
				if($photo){
					$container = $photo->getTypeConteneur();
					$containerId = $photo->getConteneurId();
					$signalement_texte = 'Photo : <a target="_blank" href="'.ADRESSE.'modules/get_image.php?width=430&image=data/photos/'.$photo->getLocalisation().'">Voir la photo</a>';
				}
				else{
					$container = false;
				}
				break;
			case '3':
				$commentaire = Commentaire::selectCommentaire($signalement->getObjetId());
				if($commentaire->getTypeId() == 1 && $commentaire){
					$mur = Mur::selectMur($commentaire->getObjetId());
					if($mur){
						$container = $mur->getTypeConteneur();
						$containerId = $mur->getConteneurId();
					}
					else{
						$container = false;
					}
				}
				elseif($commentaire->getTypeId() == 2 && $commentaire){
					$photo = Photo::selectPhoto($commentaire->getObjetId());
					if($photo){
						$container = $photo->getTypeConteneur();
						$containerId = $photo->getConteneurId();
					}
					else{
						$container = false;
					}
				}
				$signalement_texte = 'Commentaire : '.$commentaire->getMessage().'';
				break;
		}

		switch($container){
			case '2' : 
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Proposition "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=2">Voir la proposition</a>';
				break;
			case '3' :
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Débat "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=3">Voir le débat</a>';
				break; 
			case '4' :
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Vote "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=4">Voir le vote</a>';
				break; 
			case '20' : 
				$proposition = Groupe::selectGroupe($containerId);
				$signalement_source = 'Discussion "'.$proposition->getNom().'" : <a href="'.ADRESSE.'discussion/'.$containerId.'.html">Voir la discussion</a>';
				break;
			default:
				$signalement_source = "-";
				break;
		}


		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.date('Y-m-d H:i', strtotime($signalement->getDate())).'</td>';
			echo '<td style="padding-left:5px;">'.$signalement_source.'</td>';
			echo '<td style="padding-left:5px;">'.$signalement_texte.'</td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=signalements" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$signalement->getId().'"><button type="submit" name="delete"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form></td>';
			echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=signalements" ><input type="hidden" name="id" value="'.$signalement->getId().'"><button type="submit" name="ignore"><img src="'.ADRESSE.'admin/images/icon_save.png" /></button></form></td>';
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