<div id="localisation"> > Gestion des Questions du jour</div>
<div id="contenu">
<?php
	$error = "";
	$success = false;
	if(isset($_POST['submit'])){
		Sondage::insertSondage($_POST);
		echo '<div class="success">Ajout effectué avec succès !</div>';
		$success = true;
		echo '<meta http-equiv="refresh" content="0; URL='.ADRESSE.'admin/index.php?page=sondage">';
	}
		?>
		<form method="post" id="fomulaire" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<table class="responsive table table-bordered">
			<tr>
				<td>Question :</td>
				<td style="text-align:left;"><input type="text" name="question" value="<?php echo (isset($_POST['question']) ? stripslashes($_POST['question']) : '' ) ?>" /></td>
			</tr>
			<tr>
				<td>Date de fin :</td>
				<td style="text-align:left;"><input type="text" name="dateFin" class="datepicker" value="<?php echo (isset($_POST['dateFin']) ? stripslashes($_POST['dateFin']) : '' ) ?>" /></td>
			</tr>
        </table>
        
	<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href='index.php?page=sondage'"><input type="submit" name="submit" value="Ajouter"/></div>
	</form>
		
</div>
		
	