<div id="menu_recherche">
	<form method="GET" action="{$ADRESSE}recherche.html">
		<div class="recherche_element">Recherche : </div>
		<div class="recherche_element"><input type="text" name="keyword" placeholder="Mots-Clés" value="{if isset($smarty.get.keyword)}{$smarty.get.keyword|escape:'html'}{/if}" /></div>
		{if isset($smarty.get.niveauId)}
			{assign var=get_niveau value=$smarty.get.niveauId}
		{else}
			{assign var=get_niveau value=""}
		{/if}
		<div class="recherche_element"><select name="niveauId"><option value="">Niveau</option>{html_options options=Niveau::selectArray() selected=$get_niveau}</select></div>
		<div class="recherche_element"><input type="text" name="date" class="calendrier" placeholder="Date" style="width:100px;" value="{if isset($smarty.get.date)}{$smarty.get.date|escape:'html'}{/if}" /></div>
		{if isset($smarty.get.categorieId)}
			{assign var=get_categorie value=$smarty.get.categorieId}
		{else}
			{assign var=get_categorie value=""}
		{/if}
		<div class="recherche_element"><select name="categorieId"><option value="">Catégorie</option>{html_options options=Categorie::selectArray() selected=$get_categorie}</select></div>
		{if isset($smarty.get.statut)}
			{assign var=get_statut value=$smarty.get.statut}
		{else}
			{assign var=get_statut value=""}
		{/if}
		<div class="recherche_element"><select name="statut"><option value="">Statut</option>{html_options options=Proposition::$statutArray selected=$get_statut}</select></div>
		<div class="recherche_element" style="float:right; margin-top:-2px;"><input type="image" src="{$ADRESSE}images/btn_chercher.png" title="Chercher" alt="Chercher" /></div>
		<div class="clear"></div>
	</form>
</div>