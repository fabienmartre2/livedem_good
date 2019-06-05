<?php
	$id = intval($_GET['id']);
	if(!$categorie = Categorie::selectCategorie($id)){
		echo '<div class="alert alert-danger">Catégorie inconnu</div>';
	}
	else{
?>

<div id="localisation"> > Gestion des catégories</div>
<div id="contenu">

<?php

$error = '';

// #####################
if(isset($_POST['submit'])){
	// Traitement de la mise à jour
	
	if(!empty($_FILES['image']["name"])){
		$ext = strtolower(pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION));
		$extallow = array('jpg', 'jpeg', 'gif','png');
		if($_FILES['image']["error"] != 0){
			$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
		}
		if(!in_array($ext, $extallow)){
			$error .= "Extension du fichier non-autorisé : JPG, GIF et PNG uniquement<br />";
		}
		if($_FILES['image']['size'] > 3000000){
			$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
		}
	}
	if(empty($error)){
		if(!empty($_FILES['image']["name"])){
			$image = Image::upload($_FILES['image'], 600, 600, "categorie");
			$_POST['image'] = $image;
		}
		if(empty($_POST['password']))
			unset($_POST['password']);
		$categorie->updateCategorie($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" enctype="multipart/form-data">
	<table class="responsive table table-bordered">
		<tr><td>Nom : </td><td style="text-align:left;"><input type="text" name="email" class="form-control" value="<?php echo $categorie->getNom(); ?>" /></td></tr>
		<tr>
			<td>Image : </td>
			<td style="text-align:left;">
				<?php echo ($categorie->getImage() ? '<div class="alert alert-success">Une image est déjà chargée : <a href="'.ADRESSE.'get_image/500-500/data/categorie/'.$categorie->getImage().'" target="_blank">Visualiser</a></div>' : ''); ?>
				<input type="file" name="image" />
				<p class="help-block">Taille idéale : 350px x 300px</p>
			</td>
		</tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=categories'" />
		<input type="submit" name="submit" class="btn btn-default" value="Enregistrer" />
	</div>
</form>

</div>
<?php
}
?>