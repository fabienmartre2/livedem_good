<?php
if(isset($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']))
if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST)!=$_SERVER['HTTP_HOST'])
exit('Anti-CSRF mechanism!');
?>

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

<div id="localisation"> > Gestion des emails > Modification</div>
<div id="contenu">
<?php
$blocmail = BlocMail::selectBlocMail($_GET['id']);
if(isset($blocmail) && !empty($blocmail)){
$error = "";
$success = false;
if(isset($_POST['submit']))
{
	// Traitement des données
	
	if(empty($error)){
		$blocmail->updateBlocMail($_POST);
		echo '<div class="alert alert-success">Modification réussie !</div>';
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
				<td>Nom</td>
				<td style="text-align:left;"><?php echo $blocmail->getNom(); ?></td>
			</tr>
			<tr>
				<td colspan="2">Texte : <br /><textarea name="contenu" class="mceEditor" rows="15" cols="60" ><?php echo ((isset($_POST['tMCE_contenu'])) ? stripslashes($_POST['tMCE_contenu']) : $blocmail->getContenu()) ?></textarea></td>
			</tr>
			<tr>
				<td>Variable</td>
				<td style="text-align:left;"><?php echo nl2br($blocmail->getVariable()); ?></td>
			</tr>
		</table>
		<div style="text-align:center;">
			<button class="btn btn-default" name="submit" type="button" onclick="window.location.href='index.php?page=blocmails'"><span class="glyphicon glyphicon-arrow-left"></span> Retour</button>
			<button class="btn btn-default" name="submit" type="submit"><span class="glyphicon glyphicon-ok"></span> Modifier</button>
		</div>
	</form>
		<?php
	}
		

		else{
			echo '<div class="error">Vous devez être connecté pour accéder à cette page.</div>';
			echo '<meta http-equiv="refresh" content="5; URL='.ADRESSE.'connexion.php">';
		}
			?>
</div>