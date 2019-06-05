{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Pétitions</li>
</ol>

<div class="proposition_menu">
	<div class="proposition_menu_header">
		Les Pétitions
	</div>
	<div class="proposition_menu_contenu" style="color:#8e0000;">
		<a href="{$ADRESSE}petition_add.html">Créer une nouvelle pétition</a>
	</div>
</div>

<div id="mur_center">
{foreach from=$liste_petitions item=petition name=boucle}
	{include file='petitions_view.tpl' petition=$petition}
{/foreach}
</div>

<div class="clear"></div>	
	
{/block}