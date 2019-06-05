<div class="liste_proposition">
	<div class="liste_proposition_image">
		<a href="{$ADRESSE}proposition/{$proposition->getId()}.html{if isset($statut) && $statut != $proposition->getStatut()}?statut={$statut}{/if}">
			{if $proposition->getImage()}
				<img src="{$ADRESSE}get_fixed/200-150/data/upload/{$proposition->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{elseif $proposition->getCategorie()->getImage()}
				<img src="{$ADRESSE}get_fixed/200-150/data/categorie/{$proposition->getCategorie()->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{else}
				<img src="{$ADRESSE}get_fixed/200-150/images/no_photo.png" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{/if}
		</a>
	</div>
	<div class="liste_proposition_description">
		<h3>{$proposition->getTitre()}</h3>
		<div class="liste_proposition_description_date">{$proposition->getUtilisateur()->getVille()->getNom()}, le {$proposition->getDate()|date_format:"%d/%m/%y"} par {$proposition->getUtilisateur()->getPseudo()}</div>
		<div class="liste_proposition_description_texte">{$proposition->getDescription()|truncate:150}<br /><b>Statut : {$proposition->getStatutTexte()}</b></div>
		<div class="liste_proposition_description_lien">
			{if (isset($statut) && $statut == 2 && $statut != $proposition->getStatut())}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html?statut={$statut}"><img src="{$ADRESSE}images/btn_voir_proposition.png" /></a>
			{elseif (isset($statut) && $statut == 3 && $statut != $proposition->getStatut())}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html?statut={$statut}"><img src="{$ADRESSE}images/btn_voir_debat.png" /></a>
			{elseif (isset($statut) && $statut == 4 && $statut != $proposition->getStatut())}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html?statut={$statut}"><img src="{$ADRESSE}images/btn_voir_vote.png" /></a>
			{elseif $proposition->getStatut() == 2}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_proposition.png" /></a>
			{elseif $proposition->getStatut() == 3}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_debat.png" /></a>
			{elseif $proposition->getStatut() == 4}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_vote.png" /></a>
			{else}
				<a href="{$ADRESSE}proposition/{$proposition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_proposition.png" /></a>
			{/if}
			
		</div>
	</div>
	<div class="clear"></div>
</div>
<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>