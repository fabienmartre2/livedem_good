<div class="home_colonne_contenu_item">
	<div class="home_colonne_contenu_titre">{$proposition->getTitre()|truncate:50}</div>
	<div class="home_colonne_contenu_liens">
		<div style="padding-top:6px; float:left;"><a href="{$ADRESSE}proposition/{$proposition->getId()}.html">voir proposition complète</a></div>
		<a class="button" href="{$ADRESSE}proposition/{$proposition->getId()}.html" style="font-size:10px; float:right; padding:2px 1px;"><b>{if $proposition->getStatut() == 2}Soutenez{elseif $proposition->getStatut() == 3}Débattez{elseif $proposition->getStatut() == 4}Votez{else}Soutenez{/if}</b></a>
		<div class="clear"></div>
	</div>
	<div class="home_colonne_contenu_social">
		<span class='st_facebook' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html" st_title="{$proposition->getTitre()|truncate:90}"></span>
		<span class='st_twitter' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html" st_via="LivedemOrg" st_title="{$proposition->getTitre()|truncate:90}"></span>
		<span class='st_googleplus' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html" st_title="{$proposition->getTitre()|truncate:90}"></span>
	</div>
	<div class="clear"></div>
</div>