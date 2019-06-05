<?php
if(isset($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']))
if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST)!=$_SERVER['HTTP_HOST'])
exit('Anti-CSRF mechanism!');
?>

<script type="text/javascript" src="js/tab.js"></script>
<div id="localisation"> > Gestion des e-mails</div>
<?php

	// Récupération
	$blocmails = BlocMail::selectBlocMails(1, 0, array());
?>

<table class="tablesorter">
  <thead>
    <tr>
      <th data-placeholder="">Nom</th>
      <th data-placeholder="" class="filter-false sorter-false"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($blocmails as $blocmail){
		// On affiche la catégorie
		echo '<tr>';
			echo '<td style="padding-left:5px;">'.$blocmail->getNom().'</td>';
			echo '<td style="text-align:center;"><a href="index.php?page=modif-blocmail&amp;id='.$blocmail->getId().'"><img src="'.ADRESSE.'admin/images/icon_edit.png" /></a></td>';
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