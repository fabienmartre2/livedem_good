<div id="localisation"> > Gestion des transactions</div>
<div id="id" style="width:0px; height:0px;"> </div>
<?php

// #####################################
// Affichage de la liste des transaction
// #####################################

	if(isset($_POST['delete'])){
		Transaction::deleteTransaction($_POST['id']);
		echo '<div class="success">Transaction supprimé !</div>';
	}

	// Pagination
	$page_max = 20;
	$page_element = Transaction::getNbTransactions();
	$page_cur = (isset($_GET['limit']) ? $_GET['limit'] : 1);
	$page_lien = "index.php?page=transaction";
	
	

	
  // On récupère la liste des prestataires
  $where = array();
  if(isset($_GET['recherche'])){
		$where[] = $_GET['champs']." = '".$_GET['recherche']."'";
  }
  $transactions = Transaction::selectTransactions($page_cur, $page_max, $where, "transaction.transaction_date DESC");
  
	echo '<div style="padding:10px; text-align:center;">
			<form method="post" action="'.ADRESSE.'admin/index.php?page=transaction">
				<select name="champs">
					<option value="transaction.transaction_id" '.((isset($_GET['champs']) && $_GET['champs'] == "transaction.transaction_id" ) ? 'SELECTED' : '').'>Identifiant</option>
				</select>
				<input type="text" name="recherche" value="'.((isset($_GET['recherche'])) ? $_GET['recherche'] : "").'" />
				<input type="submit" name="submit" value="Recherche" />
			</form>
			</div>';

 
	echo '<table class="responsive table table-bordered">';
	echo '<thead><tr>
					<th>Id</th>
					<th>Compte</th>
					<th>Date</th>
					<th>Statut</th>
					<th style="width:80px;">Visualiser</th>
					<th style="width:80px;">Supprimer</th>
		  </tr></thead>';
	foreach($transactions as $transaction){
		$compte = Compte::selectCompte($transaction->getCompteId());
		if($compte){
			// On affiche la catégorie
			echo '<tr>';
				echo '<td style="padding-left:5px;">'.$transaction->getId().'</td>';
				echo '<td style="padding-left:5px; text-align:left;""><a href="'.ADRESSE.'admin/index.php?page=modif-compte&id='.$compte->getId().'">'.$compte->getPseudo().'</a></td>';
				echo '<td style="padding-left:5px;">'.date('d/m/Y H:i', strtotime($transaction->getDate())).'</td>';
				echo '<td style="padding-left:5px;">'.$transaction->getStatutTexte().'</td>';
				echo '<td style="text-align:center;"><a href="index.php?page=modif-transaction&amp;id='.$transaction->getId().'"><img src="'.ADRESSE.'admin/images/icon_info.png" /></a></td>';
				echo '<td style="text-align:center;"><form method="post" action="'.ADRESSE.'admin/index.php?page=transaction" onSubmit="return confirmation();"><input type="hidden" name="id" value="'.$transaction->getId().'"><button type="submit" name="delete"><img src="'.ADRESSE.'admin/images/icon_remove.png" /></button></form></td>';
			echo '</tr>';
		}
	}
	echo '</table>';	
	
	include('pagination.php');
?>