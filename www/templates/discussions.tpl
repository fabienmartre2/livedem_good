{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Discussions</li>
</ol>

<div class="proposition_menu">
	<div class="proposition_menu_header">
		Les discussions
	</div>
	<div class="proposition_menu_contenu" style="color:#8e0000;">
		<a href="{$ADRESSE}discussion_add.html">Créer une nouvelle discussion</a>
	</div>
</div>

<div id="mur_center">
	{foreach from=$liste_propositions item=proposition name=boucle}
		<div class="liste_proposition">
		<div class="liste_proposition_description">
			<h3>{$proposition->getNom()}</h3>
			<div class="liste_proposition_description_texte">{$proposition->getSujet()|truncate:200}</div>
			<div class="liste_proposition_description_lien">
				<a href="{$ADRESSE}discussion/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_discussion.png" /></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>
	{/foreach}
</div>

<div class="clear"></div>
	
{/block}