{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Propositions</li>
</ol>

<div class="proposition_menu">
	<div class="proposition_menu_header">
		Les Propositions
	</div>
	<div class="proposition_menu_contenu" style="color:#8e0000;">
		<a href="{$ADRESSE}proposition_add.html">Créer une nouvelle proposition</a>
	</div>
</div>

<div id="mur_center">
{foreach from=$liste_propositions item=proposition name=boucle}
	{include file='propositions_view.tpl' proposition=$proposition}
{/foreach}
</div>
<div class="clear"></div>
	
{/block}