{extends file='base.tpl'}
{block name=foot}
<script type="text/javascript" src="{$ADRESSE}js/bootstrap-typeahead.min.js"></script>
<script>
$(document).ready(function() {
	$('input[name="searchville"]').typeahead({
		ajax: {
	        url: ADRESSE+'ajax/search_ville.php',
	        displayField: "name",
	        triggerLength: 3,
	        method: "get",     
	    },
	    onSelect: function(item) {
	        $('#villeId').val(item.value);
	    },
	});
});
</script>
{/block}

{block name=body}

{include file='search_bar.tpl'}

	<div style="margin-bottom:15px; text-align:center;"><img src="{$ADRESSE}images/banniere-livedem.jpg" title="Comment ça marche" alt="Livedem - Comment ça marche ?"/></div>

	<div class="clear"></div>

<div class="home_body">

	{if isset($titre_h1) && $titre_h1}
		<h1>{$titre_h1}</h1>
	{/if}

	<div class="home_colonne" style="margin-left:0;">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Propositions</div>
			<div class="home_colonne_titre_photo"><img src="{$ADRESSE}images/illu_proposition.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="{$ADRESSE}propositions.html?filter=date">date</a> | <a href="{$ADRESSE}propositions.html?filter=niveau">niveau électoral</a> | <a href="{$ADRESSE}propositions.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			{foreach from=$home_propositions item=home_proposition name=boucle}
				{include file='accueil_item.tpl' proposition=$home_proposition}
			{/foreach}
			<div style="text-align:center; padding:8px 0;"><a href="{$ADRESSE}propositions.html" style="color:#c22222">Toutes les propostions</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="{$ADRESSE}proposition_add.html">Je propose</a>
		</div>
	</div>

	<div class="home_colonne">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Débats</div>
			<div class="home_colonne_titre_photo"><img src="{$ADRESSE}images/illu_debat.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="{$ADRESSE}debats.html?filter=date">date</a> | <a href="{$ADRESSE}debats.html?filter=niveau">niveau électoral</a> | <a href="{$ADRESSE}debats.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			{foreach from=$home_debats item=home_debat name=boucle}
				{include file='accueil_item.tpl' proposition=$home_debat}
			{/foreach}
			<div style="text-align:center; padding:8px 0;"><a href="{$ADRESSE}debats.html" style="color:#c22222">Tous les débats</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="{$ADRESSE}debats.html">Je débats</a>
		</div>
	</div>
	<div class="home_colonne" style="margin-right:0;">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Votes</div>
			<div class="home_colonne_titre_photo"><img src="{$ADRESSE}images/illu_vote.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="{$ADRESSE}votes.html?filter=date">date</a> | <a href="{$ADRESSE}votes.html?filter=niveau">niveau électoral</a> | <a href="{$ADRESSE}votes.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			{foreach from=$home_votes item=home_vote name=boucle}
				{include file='accueil_item.tpl' proposition=$home_vote}
			{/foreach}
			<div style="text-align:center; padding:8px 0;"><a href="{$ADRESSE}votes.html" style="color:#c22222">Tous les votes</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="{$ADRESSE}votes.html">Je vote</a>
		</div>
	</div>
	<div class="clear" style="height:20px;"></div>

	<div class="home_vosvotes">
		<div class="home_vosvotes_titre">Ce que deviennent vos votes</div>
		<div class="home_vosvotes_body">
			{foreach from=$home_vosvotes item=home_vosvote name=boucle}
			<div class="home_vosvotes_proposition">
				<div class="home_vosvotes_proposition_titre">Le vote sur le proposition : <b>{$home_vosvote->getTitre()}</b></div>
				<div class="home_vosvotes_proposition_date">Vote effectué le {$home_vosvote->getUpdateDate(6)|date_format:"%d/%m/%Y"} - Transmis aux élus le {$home_vosvote->getTransmission()|date_format:"%d/%m/%Y"}</div>
				{*<div class="home_vosvotes_proposition_lien"><a href="#">Voir la liste des élus / décideurs</a></div>*}
				<div class="home_vosvotes_proposition_statut">Résultat : <span>{$home_vosvote->getResultatTexte()}</span></div>
			</div>
			{/foreach}
		</div>
	</div>

	<div class="clear" style="height:20px;"></div>
	<div class="home_chiffres">
		<div class="home_chiffres_titre">Livedem en chiffres</div>
		<div class="home_chiffres_body">
			<ul>
				<li>{Proposition::getNbPropositions(array('proposition_statut >= 2'))} Propositions</li>
				<li>{Proposition::getNbPropositions(array('proposition_statut >= 3'))} Débats</li>
				<li>{Proposition::getNbPropositions(array('proposition_statut >= 4'))} Votes</li>
				<li>{Petition::getNbPetitions()} Pétitions</li>
				<li>{Proposition::getNbPropositions(array('proposition_statut >= 6'))} votes pris en compte</li>
				<li>{Utilisateur::getNbUtilisateurs()} citoyens</li>
			</ul>
		</div>
	</div>
	<div class="home_discussions">
		<div class="home_discussions_titre">Discussions</div>
		<div class="home_discussions_body">
			<table style="width:100%;">
				{foreach from=$discussions item=discussion name=boucle}
					<tr><td>{$discussion->getNom()|truncate:100}</td><td style="width:40px;"><a href="{$ADRESSE}discussion/{$discussion->getId()}.html">Voir</a></td></tr>
				{/foreach}
			</table>
			<div class="home_discussions_more"><a href="{$ADRESSE}discussions.html">Voir toutes les discussions</a></div>
		</div>
	</div>

	<div class="clear" style="height:20px;"></div>
	<div class="home_mode_emploi">
		<b style="font-size:18px;">Livedem : mode d’emploi</b><br />
		<br />
		<b>Objectif </b><br />
		Redonner la parole et par ce biais le pouvoir au peuple<br />
		<br />
		<b>Comment?</b><br />
		Grace au site internet collaboratif livedem.org<br />
		- Les citoyens peuvent proposer, débattre et voter sur des questions locales ou nationales<br />
		- Les élus et décideurs/leaders d'opinions sont informés des résultats et invités à agir en conséquence<br />
		<br />
		<b>Qui ?</b><br />
		Vous, et tous les citoyens.
	</div>
</div>

<div class="home_menu">
	{include file="menu_droit.tpl"}
</div>

<div class="clear"></div>


{/block}