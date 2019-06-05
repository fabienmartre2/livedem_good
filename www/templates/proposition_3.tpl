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
	> <a href="{$ADRESSE}debats.html">Débats</a>
	> {$proposition->getTitre()|escape:'html'}
</div>

	{if $statut < $proposition->getStatut()}
		<div class="info">Cette page est accessible en lecture uniquement. La proposition en est maintenant au stade <b>{$proposition->getStatutTexte()|escape:'html'}</b>.<br />
		<a href="{$ADRESSE}proposition/{$proposition->getId()}.html" style="font-weight:900; color:#DA2B2B;">Cliquez-ici pour y accéder</a></div>
	{/if}

	{if $success}
		<div class="success">
			Votre inscription au débat a bien été prise en compte.<br />
			Vous pouvez désormais exprimer votre opinion.
		</div>
	{/if}

	{if $success1}
		<div class="success">
			Votre inscription au tirage au sort du débat live a été prise en compte.
		</div>
	{/if}

	{if ($error_access)}
		{include file="error_access.tpl"}
	{else}
		{if !empty($error)}
			<div class="error">
				{$error}
			</div>
		{/if}
	{/if}

	<div class="proposition">
		<div class="proposition_image">
			{if $proposition->getImage()}
				<img src="{$ADRESSE}get_fixed/350-300/data/upload/{$proposition->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{elseif $proposition->getCategorie()->getImage()}
					<img src="{$ADRESSE}get_fixed/350-300/data/categorie/{$proposition->getCategorie()->getImage()}" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{else}
				<img src="{$ADRESSE}get_fixed/350-300/images/no_photo.png" title="{$proposition->getTitre()}" alt="{$proposition->getTitre()}" />
			{/if}<br />
			<br />
			<div style="text-align:right;">
				{if Utilisateur::estConnecte()}
				<form method="POST" action="{$smarty.server.REQUEST_URI}">
					<input type="hidden" name="live" value="1">
					Le tirage au sort du débat live aura lieu le {strtotime("+ 8 weeks", strtotime($proposition->getDate()))|date_format:"%d/%m/%Y"}<br />
					<button type="submit" class="btn btn-red "name="debatlive">S'inscrire au tirage au sort du débat live</button>
				</form>
				{else}
					Le tirage au sort du débat live aura lieu le {strtotime("+ 8 weeks", strtotime($proposition->getDate()))|date_format:"%d/%m/%Y"}<br />
					<a data-target="#myModal" data-toggle="modal" href="#" class="btn btn-red">S'inscrire au tirage au sort du débat live</a>
				{/if}
			</div>
		</div>
		<div class="proposition_description">
			<h1>{$proposition->getTitre()|escape:'html'}</h1>
			<div class="proposition_description_date">{$proposition->getUtilisateur()->getVille()->getNom()}, le {$proposition->getDate()|date_format:"%d/%m/%y"} par {$proposition->getUtilisateur()->getPseudo()|escape:'html'}</div>
			<div class="proposition_description_texte">{$proposition->getDescription()|escape:'html'|nl2br}</div>
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
					<form action="{$smarty.server.REQUEST_URI}" method="POST" style="float:right; margin-right:15px;">
						<input type="hidden" name="defendre" value="1" />
						<input type="image" src="{$ADRESSE}images/btn_defendre.png" />
					</form>
					<form action="{$smarty.server.REQUEST_URI}" method="POST" style="float:right; margin-right:15px;">
						<input type="hidden" name="defendre" value="2" />
						<input type="image" src="{$ADRESSE}images/btn_sopposer.png" />
					</form>
					{else}
						<a data-target="#myModal" data-toggle="modal" href="#" style="float:right; margin-right:15px;"><input type="image" src="{$ADRESSE}images/btn_defendre.png" /></a>
						<a data-target="#myModal" data-toggle="modal" href="#" style="float:right; margin-right:15px;"><input type="image" src="{$ADRESSE}images/btn_sopposer.png" /></a>
					{/if}
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

		{if Utilisateur::estConnecte()}

			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Les participants à ce débats
				</div>
				<div class="proposition_menu_intertitre" style="background:#8e0000;">Défendeurs</div>
				<div class="proposition_menu_contenu" style="color:#8e0000;">
					{foreach from=$defendeurs item=defendeur name=boucle}
						{$defendeur->getUtilisateur()->getPseudo()|escape:'html'}<br />
					{/foreach}
				</div>
				<div class="proposition_menu_intertitre" style="background:#034066;">Opposants</div>
				<div class="proposition_menu_contenu" style="color:#034066;">
					{foreach from=$opposants item=opposant name=boucle}
						{$opposant->getUtilisateur()->getPseudo()|escape:'html'}<br />
					{/foreach}
				</div>
			</div>

			<div id="mur_center">
				{if $etre_inscrit > 0}
					<div id="postmur">
						<form method="POST" action="{$smarty.server.REQUEST_URI}" name="form_postermur" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Statut <img src="{$ADRESSE}images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="{$ADRESSE}images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="message"></textarea></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="hidden" name="groupe" value="{$groupeId}"><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="{$proposition->getId()}">
						<input type="hidden" name="typeConteneur" value="{$proposition->getStatut()}">
						</form>
					</div>
					<div id="postphoto" style="display:none;">
						<form method="POST" action="{$smarty.server.REQUEST_URI}" name="form_posterphoto" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Ecrire <img src="{$ADRESSE}images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="{$ADRESSE}images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="titre"></textarea><br />Photo : <input type="file" name="photo" /><span class="percent"></span></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="hidden" name="groupe" value="{$groupeId}"><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="{$proposition->getId()}">
						<input type="hidden" name="typeConteneur" value="{$proposition->getStatut()}">
						</form>
					</div>
				{else}
					<div class="error">Vous devez prendre position (s'opposer ou défendre) pour participer au débat</div>
				{/if}
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
			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Citoyens ayant participé ou montré de l'intérêt pour ce débat
				</div>
				<div class="proposition_menu_contenu">
					{foreach from=$participants item=participant name=boucle}
						{$participant->getPseudo()|escape:'html'}<br />
					{/foreach}
				</div>
			</div>
			<div class="clear"></div>
		{else}
			{include file="error_access.tpl"}
		{/if}

	</div>

	
	
{/block}