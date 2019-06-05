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

<div id="localisation"> > Gestion des articles</div>
<div id="contenu">
<?php
	$error = "";
	$success = false;
	if(isset($_POST['submit'])){
		Article::insertArticle($_POST);
		echo '<div class="success">Article ajouté !</div>';
		$success = true;
		echo '<meta http-equiv="refresh" content="0; URL='.ADRESSE.'admin/index.php?page=blog">';
	}
		?>
		<form method="post" id="fomulaire" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<table class="responsive table table-bordered">
			<tr>
				<td><?php echo "Titre :"; ?></td>
				<td style="text-align:left;"><input type="text" name="titre" value="<?php echo (isset($_POST['titre']) ? stripslashes($_POST['titre']) : '' ) ?>" /></td>
			</tr>
			<tr>
				<td><?php echo "Catégorie :"; ?></td>
				<td style="text-align:left;">
					<select name="categorieId">
					<?php
						$categories = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
						foreach($categories as $categorie)
							echo '<option value="'.$categorie->getId().'">'.$categorie->getNom().'</option>';
					?>
					</select>
				</td>
			</tr>
            <tr>
				<td><?php echo "Mots-clés :"; ?></td>
				<td style="text-align:left;"><input type="text" name="motscles" value="<?php echo (isset($_POST['motscles']) ? stripslashes($_POST['motscles']) : '' ) ?>" /></td>
			</tr>
            <tr>
				<td><?php echo "Description :"; ?></td>
				<td style="text-align:left;"><textarea name="description" cols="50" rows="6"><?php echo (isset($_POST['description']) ? stripslashes($_POST['description']) : '' ) ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="contenu" class="mceEditor" id="tMCE_contenu" style="width:600px; height:350px;" ><?php echo ((isset($_POST['tMCE_contenu'])) ? stripslashes($_POST['tMCE_contenu']) : '') ?></textarea></td>
		</table>
        
	<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href='index.php?page=blog'"><input type="submit" name="submit" value="Ajouter"/></div>
	</form>
		
</div>
		
	