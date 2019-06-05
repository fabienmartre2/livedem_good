{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> {$categorie->getNom()}
</div>

{foreach from=$liste_propositions item=proposition name=boucle}
	{include file='propositions_view.tpl' proposition=$proposition}
{/foreach}
	
	
{/block}