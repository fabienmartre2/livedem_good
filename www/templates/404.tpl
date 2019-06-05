{extends file='base.tpl'}

{block name=body}
	<!-- BODY -->
	<h1 class="titre">Erreur 404</h1>
	<div class="error">La page que vous demandez n'existe malheureusement pas.</div>
	<br />
	Nous vous invitons à :<br />
	<ul class="design">
		<li>Effectuer une recherche depuis la page d'accueil</li>
		<li>Rechercher la page depuis les liens suivants :</li>
	</ul>
	<h2 class="design">Nos propositions</h3>
	<ul class="design">
		{foreach from=$home_propositions item=proposition name=boucle}
			<li><a href="{$ADRESSE}proposition/{$proposition->getId()}.html">{$proposition->getTitre()}</a></li>
		{/foreach}
	</ul>
	<h2 class="design">Nos débats</h3>
	<ul class="design">
		{foreach from=$home_debats item=proposition name=boucle}
			<li><a href="{$ADRESSE}proposition/{$proposition->getId()}.html">{$proposition->getTitre()}</a></li>
		{/foreach}
	</ul>
	<h2 class="design">Nos votes</h3>
	<ul class="design">
		{foreach from=$home_votes item=proposition name=boucle}
			<li><a href="{$ADRESSE}proposition/{$proposition->getId()}.html">{$proposition->getTitre()}</a></li>
		{/foreach}
	</ul>
{/block}