{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> Recherche
</div>

{foreach from=$liste_propositions item=proposition name=boucle}
	{include file='propositions_view.tpl' proposition=$proposition}
{foreachelse}
	<div class="error">Il n'y a aucun résultat</div>
{/foreach}
	
	
{/block}