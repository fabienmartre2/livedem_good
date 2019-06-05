{extends file='base.tpl'}
{block name=body}

{include file="modal_share.tpl"}

{if $statut == $proposition->getStatut()}
	<script type="text/javascript">typeConteneur = '{$proposition->getStatut()}';</script>
	<script type="text/javascript">conteneurId = '{$proposition->getId()}';</script>
	<script type="text/javascript">lastVerif = '{time()}';</script>
	<script type="text/javascript" src="{$ADRESSE}js/jquery.form.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/mur.js"></script>
{/if}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}propositions.html">Propositions</a>
	> {$proposition->getTitre()|escape:'html'}
</div>

	{if $statut < $proposition->getStatut()}
		<div class="info">Cette page est accessible en lecture uniquement. La proposition en est maintenant au stade <b>{$proposition->getStatutTexte()|escape:'html'}</b>.<br />
		<a href="{$ADRESSE}proposition/{$proposition->getId()}.html" style="font-weight:900; color:#DA2B2B;">Cliquez-ici pour y accéder</a></div>
	{/if}

	{if $success}
		<div class="success">
			Votre soutien à été pris en compte
		</div>
	{/if}

	{if !empty($error)}
		<div class="error">
			{$error}
		</div>
	{/if}

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
			<div class="proposition_description_texte">
				{$proposition->getDescription()|escape:'html'|nl2br}<br />
				<b>Période de soutien</b> : Du {$proposition->getUpdateDate(2)|date_format:"d/m/Y"} au {$proposition->getNext(2)|date_format:"d/m/Y"}<br />
				<b>Nombre de soutiens</b> : {$proposition->getNbSoutiens()} sur {$proposition->getNbSoutiensTotal()} nécessaire
			</div>
			<div class="proposition_description_liens">
				<a href="#" data-toggle="modal" data-target="#shareModal"><img src="{$ADRESSE}images/share_email.png" style="margin-left:3px;" /></a>
				<div class="clear" style="height:10px;"></div>
				<div style="float:left">
					<span class='st_facebook_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html"></span>
					<span class='st_twitter_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html" st_via="LivedemOrg"></span>
					<span class='st_googleplus_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html"></span>
				</div>
				<div style="float:right; margin-top:3px;">
					{if Utilisateur::estConnecte()}
						<form action="{$smarty.server.REQUEST_URI}" method="POST">
							<input type="hidden" name="soutenir" value="soutenir" />
							<input type="image" src="{$ADRESSE}images/btn_soutenir.png" />
						</form>
						<div class="clear" style="height:8px;"></div>
						<a href="#proposition_add_commentaire"><input type="image" src="{$ADRESSE}images/commenter_proposition.png" /></a>
					{else}
						<a data-target="#myModal" data-toggle="modal" href="#"><input type="image" src="{$ADRESSE}images/btn_soutenir.png" /></a>
						<div class="clear" style="height:8px;"></div>
						<a data-target="#myModal" data-toggle="modal" href="#"><input type="image" src="{$ADRESSE}images/commenter_proposition.png" /></a>
					{/if}
				</div>
				<div class="clear"></div>
			</div>
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

		{if Utilisateur::estConnecte()}

			<div class="proposition_add_commentaire" id="proposition_add_commentaire">
				<form action="{$smarty.server.REQUEST_URI}" method="POST" name="form_postermur">
					<div class="proposition_add_commentaire_titre">Publier un commentaire</div>
					<table>
						<tr style="vertical-align:top;">
							<td>
								<input type="text" name="pseudo" placeholder="Pseudo" value="{$global_utilisateur->getPseudo()|escape:'html'}" readonly="readonly" /><br /><br />
								<input type="text" name="pseudo" placeholder="Âge" value="{$global_utilisateur->getAge()|escape:'html'} ans" readonly="readonly" /><br />
							</td>
							<td style="padding-left:20px;">
								<textarea name="message"></textarea>
							</td>
						</tr>
						<tr><td colspan="2">
							<div style="text-align:right; margin-top:10px;"><input type="image" src="{$ADRESSE}images/btn_valider_commentaire.png" /></div>
						</td></tr>
					</table>
					<input type="hidden" name="conteneurId" value="{$proposition->getId()}">
					<input type="hidden" name="typeConteneur" value="{$proposition->getStatut()}">
				</form>
			</div>

			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Citoyens soutenant la proposition
				</div>
				<div class="proposition_menu_contenu">
					{foreach from=$soutiens item=soutien name=boucle}
						{$soutien->getUtilisateur()->getPseudo()|escape:'html'}<br />
					{/foreach}
				</div>
			</div>
			<div id="mur_center">
				<div id="mymur">
					{if $statut == $proposition->getStatut()}
						{foreach from=$feed item=data name=boucle}
							{include file='view_feed.tpl' feed=$data}
						{/foreach}
					{else}
						{foreach from=$feed item=data name=boucle}
							{include file='view_feed_ro.tpl' feed=$data}
						{/foreach}
					{/if}
				</div>
			</div>

			<div class="clear"></div>
		{else}
			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Citoyens soutenant la proposition
				</div>
				<div class="proposition_menu_contenu">
					{foreach from=$soutiens item=soutien name=boucle}
						{$soutien->getUtilisateur()->getPseudo()|escape:'html'}<br />
					{/foreach}
				</div>
			</div>
			<div id="mur_center">
				<div id="mymur">
					{foreach from=$feed item=data name=boucle}
						{include file='view_feed_ro.tpl' feed=$data}
					{/foreach}
				</div>
			</div>

		{/if}

	</div>

	
	
{/block}