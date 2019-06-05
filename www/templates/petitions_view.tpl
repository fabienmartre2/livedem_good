<div class="liste_proposition">
	<div class="liste_proposition_image">
		<img src="{$ADRESSE}get_fixed/200-150/data/upload/{$petition->getImage()}" title="{$petition->getTitre()|escape:'html'}" alt="{$petition->getTitre()|escape:'html'}" />
	</div>
	<div class="liste_proposition_description">
		<h3>{$petition->getTitre()|escape:'html'}</h3>
		<div class="liste_proposition_description_date">{$petition->getUtilisateur()->getVille()->getNom()}, le {$petition->getDate()|date_format:"%d/%m/%y"} par {$petition->getUtilisateur()->getPseudo()|escape:'html'}</div>
		<div class="liste_proposition_description_texte">
			{$petition->getDescription()|truncate:150|escape:'html'}<br />
			{assign var=petitionId value=$petition->getId()}
			<div class="clear" style="height:5px;"></div>
			<i class="glyphicon glyphicon-leaf"></i> Il y a actuellement <b>{Signature::getNbSignatures(array("petition_id = $petitionId"))}</b> signataire{if Signature::getNbSignatures(array("petition_id = $petitionId")) > 1}s{/if}
		</div>
		<div class="liste_proposition_description_lien">
			<a href="{$ADRESSE}petition/{$petition->getId()}.html"><img src="{$ADRESSE}images/btn_voir_petition.png" /></a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>