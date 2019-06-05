{extends file='base.tpl'}
{block name=body}

{include file="modal_share.tpl"}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}propositions.html">Propositions</a>
	> {$proposition->getTitre()|escape:'html'}
</div>

	<div class="proposition">
			<div class="proposition_image">
				{if $proposition->getImage()}
					<img src="{$ADRESSE}get_fixed/350-300/data/upload/{$proposition->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
				{elseif $proposition->getCategorie()->getImage()}
					<img src="{$ADRESSE}get_fixed/350-300/data/categorie/{$proposition->getCategorie()->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
				{else}
					<img src="{$ADRESSE}get_fixed/350-300/images/no_photo.png" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
				{/if}
			</div>
			<div class="proposition_description">
				<h1>{$proposition->getTitre()|escape:'html'}</h1>
				<div class="proposition_description_date">{$proposition->getUtilisateur()->getVille()->getNom()}, le {$proposition->getDate()|date_format:"%d/%m/%y"} par {$proposition->getUtilisateur()->getPseudo()|escape:'html'}</div>
				<div class="proposition_description_texte">{$proposition->getDescription()|escape:'html'|nl2br}<br /></div>
				<div class="proposition_description_liens">La proposition a été votée et a été transmise aux élus pour être étudiée.<br /><br /><b>Résultats : {$proposition->getResultatTexte()|escape:'html'}</b></div>	
			</div>
			<div class="clear"></div>

			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

			<h2>Champ d'application</h2>

			<div class="champ_application">
				<div class="champ_application_titre">Thématique</div>
				<div class="champ_application_info">{$proposition->getCategorie()->getNom()|escape:'html'}</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Niveau Electoral</div>
				<div class="champ_application_info">
					{$proposition->getNiveau()->getNom()|escape:'html'}
					{if $proposition->getNiveauId() == 1}
						{if $proposition->getVille()}<br />{$proposition->getVille()->getNom()}{/if}
					{elseif $proposition->getNiveauId() == 2}
						{if $proposition->getDepartement()}<br />{$proposition->getDepartement()->getNom()}{/if}
					{elseif $proposition->getNiveauId() == 3}
						{if $proposition->getRegion()}<br />{$proposition->getRegion()->getNom()}{/if}
					{/if}
				</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Coût proposition</div>
				<div class="champ_application_info">{$proposition->getCout()|escape:'html'}</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Zone géographique impactée </div>
				<div class="champ_application_info">{$proposition->getZone()|escape:'html'}</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Source de financement</div>
				<div class="champ_application_info">{$proposition->getFinancement()|escape:'html'}</div>
			</div>

			<div class="champ_application">
				<div class="champ_application_titre">Population impactée</div>
				<div class="champ_application_info">{$proposition->getImpact()|escape:'html'}</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Délai mise en place</div>
				<div class="champ_application_info">{$proposition->getDelai()|escape:'html'}</div>
			</div>
			<div class="champ_application">
				<div class="champ_application_titre">Période d’application</div>
				<div class="champ_application_info">{$proposition->getPeriode()|escape:'html'}</div>
			</div>

			<div class="clear"></div>

			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>
	</div>
	
	
{/block}