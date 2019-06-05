{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Sondages</li>
</ol>

<div id="mur_center" style="margin-left:220px;">
	{foreach from=$liste_propositions item=proposition name=boucle}
		<div class="liste_proposition">
		<div class="liste_proposition_description">
			<h3>{$proposition->getQuestion()|escape:'html'}</h3>
			<div class="liste_proposition_description_lien">
				<a href="{$ADRESSE}sondage/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_sondage.png" /></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>
	{/foreach}
</div>

<div class="clear"></div>
	
{/block}