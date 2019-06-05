{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> Recherche
</div>

Plusieurs villes répondent à votre recherche. Merci de choisir votre ville : <br />

<ul>
{foreach from=$villes item=ville name=boucle}
	<li><a href="{$ADRESSE}localite/ville/{$ville->getFichier()}.html">{$ville->getNom()}</a></li>
{foreachelse}
	<div class="error">Il n'y a aucun résultat</div>
{/foreach}
</ul>
	
	
{/block}