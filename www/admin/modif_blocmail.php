<div id="localisation"> > Gestion des textes e-mail</div>
<div id="contenu">
<?php
$reqAnnexe = "SELECT * FROM blocmail WHERE blocmail_id = :id";
$resAnnexe = $connexion->prepare($reqAnnexe);
$resAnnexe->execute(array('id' => intval($_GET['id'])));
$blocmail = $resAnnexe->fetch(PDO::FETCH_ASSOC);
if(isset($blocmail) && !empty($blocmail)){
$error = "";
$success = false;
if(isset($_POST['submit']))
{
	// Traitement des données
	
	if(empty($error)){
		$reqUpdate = "UPDATE blocmail SET 
			blocmail_nom = :nom,
			blocmail_contenu = :contenu
			WHERE blocmail_id = :id";
		$resUpdate = $connexion->prepare($reqUpdate);
		$data = array(
			'id' => $blocmail['blocmail_id'],
			'nom' => $_POST['nom'],
			'contenu' => $_POST['tMCE_contenu']
		);
		$resUpdate->execute($data);
		
		echo '<div class="success">Page blocmail modifiée !</div>';
		$success = true;
	}
	else
	{
		echo "<div class=\"error\">".$error."</div>";
	}
}
		?>
		<form method="post" id="fomulaire" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<table width="80%" align="center">
			<th width="40%"></th><th width="60%"></th>
			<tr style="height:23px; background-color:#F2F2F2">
				<td><?php echo "Titre :"; ?></td>
				<td><input type="text" name="nom" value="<?php echo (isset($_POST['nom']) ? stripslashes($_POST['nom']) : stripslashes($blocmail['blocmail_nom']) ) ?>" /></td>
			</tr>
			<tr style="height:23px; background-color:#F2F2F2">
				<td colspan="2"><textarea name="tMCE_contenu" class="tinymce" id="tMCE_contenu" rows="15" cols="60" ><?php echo ((isset($_POST['tMCE_contenu'])) ? stripslashes($_POST['tMCE_contenu']) : stripslashes($blocmail['blocmail_contenu'])) ?></textarea></td>
			</tr>
			<tr style="height:23px; background-color:#F2F2F2">
				<td colspan="2"><?php echo stripslashes($blocmail['blocmail_variable']); ?></td>
			</tr>
		</table>
        
	<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href='index.php?page=blocmails'"><input type="submit" name="submit" value="Mettre à jour"/></div>
	</form>
		<?php
	}
		

		else{
			echo '<div class="error">Vous devez être connecté pour accéder à cette page.</div>';
			echo '<meta http-equiv="refresh" content="5; URL='.ADRESSE.'connexion.php">';
		}
			?>
</div>