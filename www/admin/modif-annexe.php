<script type="text/javascript" src="./js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		editor_selector : "mceEditor",
		editor_deselector : "mceNoEditor",
		plugins : "safari,layer,table,advhr,advimage,advlink,iespell,inlinepopups,media,contextmenu,paste,directionality,noneditable",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,|,forecolor,backcolor,|,code",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		// Example content CSS (should be your site CSS)
		 
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "js/template_list.js",
		external_link_list_url : "js/link_list.js",
		external_image_list_url : "js/image_list.js",
		media_external_list_url : "js/media_list.js",
		relative_urls : false, // Default value
		document_base_url : '<?php echo ADRESSE; ?>',
		convert_urls : false
	});
</script>

<div id="localisation"> > Gestion de la page annexe</div>
<div id="contenu">
<?php
$reqAnnexe = "SELECT * FROM annexe WHERE annexe_id = :id";
$resAnnexe = $connexion->prepare($reqAnnexe);
$resAnnexe->execute(array('id' => intval($_GET['id'])));
$annexe = $resAnnexe->fetch(PDO::FETCH_ASSOC);
if(isset($annexe) && !empty($annexe)){
$error = "";
$success = false;
if(isset($_POST['submit']))
{
	// Traitement des données
	
	if(empty($error)){
		$reqUpdate = "UPDATE annexe SET 
			annexe_titre = :titre,
			annexe_contenu = :contenu,
			annexe_description = :description,
			annexe_keywords = :keywords
			WHERE annexe_id = :id";
		$resUpdate = $connexion->prepare($reqUpdate);
		$data = array(
			'id' => $_GET['id'],
			'titre' => stripslashes($_POST['titre']),
			'contenu' => stripslashes($_POST['tMCE_contenu']),
			'description' => stripslashes($_POST['description']),
			'keywords' => stripslashes($_POST['keywords']),
		);
		$resUpdate->execute($data);
		
		echo '<div class="success">Page annexe modifiée !</div>';
		$success = true;
	}
	else
	{
		echo "<div class=\"error\">".$error."</div>";
	}
}
		?>
		<form method="post" id="fomulaire" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<table class="responsive table table-bordered">
			<tr>
				<td><?php echo "Titre :"; ?></td>
				<td style="text-align:left;"><input type="text" name="titre" value="<?php echo (isset($_POST['titre']) ? stripslashes($_POST['titre']) : stripslashes($annexe['annexe_titre']) ) ?>" /></td>
			</tr>
            <tr>
				<td><?php echo "Mots-clés :"; ?></td>
				<td style="text-align:left;"><input type="text" name="keywords" value="<?php echo (isset($_POST['keywords']) ? stripslashes($_POST['keywords']) : stripslashes($annexe['annexe_keywords']) ) ?>" /></td>
			</tr>
            <tr>
				<td><?php echo "Description :"; ?></td>
				<td style="text-align:left;"><textarea name="description" cols="50" rows="6" onkeyup="this.value = this.value.slice(0, 2000)" onchange="this.value = this.value.slice(0, 2000)"><?php echo (isset($_POST['description']) ? stripslashes($_POST['description']) : stripslashes($annexe['annexe_description']) ) ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="tMCE_contenu" class="mceEditor" id="tMCE_contenu" style="width:600px; height:350px;" ><?php echo ((isset($_POST['tMCE_contenu'])) ? stripslashes($_POST['tMCE_contenu']) : stripslashes($annexe['annexe_contenu'])) ?></textarea></td>
		</table>
        
	<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href='index.php?page=annexes'"><input type="submit" name="submit" value="Mettre à jour"/></div>
	</form>
		<?php
	}
		

		else{
			echo '<div class="error">Vous devez être connecté pour accéder à cette page.</div>';
			echo '<meta http-equiv="refresh" content="5; URL='.ADRESSE.'connexion.php">';
		}
			?>
</div>
		
	