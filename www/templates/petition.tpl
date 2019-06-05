{extends file='base.tpl'}
{block name=body}

{include file="modal_share.tpl"}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}petition.html">Pétitions</a>
	> {$petition->getTitre()|escape:'html'}
</div>

	{if $success}
		<div class="success">
			Votre signature a bien été prise en compte.
		</div>
	{/if}

	{if !empty($error)}
		<div class="error">
			{$error}
		</div>
	{/if}

	<div class="proposition">
		<div class="proposition_image">
			<img src="{$ADRESSE}get_fixed/350-300/data/upload/{$petition->getImage()}" title="{$petition->getTitre()}" alt="{$petition->getTitre()}" />
			<div style="margin-top:10px; text-align:right;">
				<a href="#" data-toggle="modal" data-target="#shareModal"><img src="{$ADRESSE}images/share_email.png" style="margin-left:3px;" /></a>
				<div class="clear" style="height:10px;"></div>
				<span class='st_facebook_large' st_url="{$ADRESSE}petition/{$petition->getId()}.html"></span>
				<span class='st_twitter_large' st_url="{$ADRESSE}petition/{$petition->getId()}.html"></span>
				<span class='st_googleplus_large' st_url="{$ADRESSE}petition/{$petition->getId()}.html"></span>
			</div>
		</div>
		<div class="proposition_description">
			<h1 style="font-size:26px;">{$petition->getTitre()|escape:'html'}</h1>
			<div class="proposition_description_date" style="font-size:14px;">
				<i class="glyphicon glyphicon-map-marker"></i> A {$petition->getUtilisateur()->getVille()->getNom()|escape:'html'} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="glyphicon glyphicon-time"></i> Le {$petition->getDate()|date_format:"%d/%m/%y"}<br />
				<i class="glyphicon glyphicon-user"></i> Posté par {$petition->getUtilisateur()->getPseudo()|escape:'html'}<br />
				<br />
				<i class="glyphicon glyphicon-leaf"></i> Il y a actuellement <b>{sizeof($signatures)}</b> signataire{if sizeof($signatures) > 1}s{/if}
			</div>
			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />
			<div class="proposition_description_texte">{$petition->getDescription()|escape:'html'|nl2br}</div>
			<div class="proposition_description_liens">
				
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />
		{if Utilisateur::estConnecte()}
			<div class="proposition_add_commentaire">
				<form action="{$smarty.server.REQUEST_URI}" method="POST">
					<div class="proposition_add_commentaire_titre">Signer la pétition</div>
					<table>
						<tr style="vertical-align:top;">
							<td>
								<input type="text" name="pseudo" placeholder="Pseudo" value="{$global_utilisateur->getPseudo()}" readonly="readonly" /><br /><br />
								<input type="text" name="pseudo" placeholder="Âge" value="{$global_utilisateur->getAge()} ans" readonly="readonly" /><br />
							</td>
							<td style="padding-left:20px;">
								<textarea name="message"></textarea>
							</td>
						</tr>
						<tr><td colspan="2">
							<div style="text-align:right; margin-top:10px;">{if isset($deja_vote) && $deja_vote}Vous avez déjà voté{else}<input type="image" src="{$ADRESSE}images/btn_signer_petition.png" />{/if}</div>
						</td></tr>
					</table>
				</form>
			</div>
		{else}
			{include file="error_access.tpl"}
		{/if}
		<h3>Les signatures ({sizeof($signatures)})</h3>
		{foreach from=$signatures item=signature name=boucle}
			<div class="mur" style="margin:auto; margin-bottom:15px;">
				<div class="top"></div>
				<div class="body">
					<div class="posteur">
						<div class="pseudo">{$signature->getUtilisateur()->getPseudo()|escape:'html'}</div>
						<div class="heure"><span data-livestamp="{$signature->getDate()}">{$signature->getDate()|relative_date}</span></div>
						<div class="clear"></div>
					</div>
					<div class="message">
						{$signature->getMessage()|escape:'html'}
					</div>
				</div>
				<div class="foot"></div>
			</div>
		{/foreach}
	</div>

	
	
{/block}