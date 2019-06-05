{extends file='base.tpl'}
{block name=body}

{include file="modal_share.tpl"}

<script type="text/javascript">typeConteneur = '20';</script>
<script type="text/javascript">conteneurId = '{$groupe->getId()}';</script>
<script type="text/javascript">lastVerif = '{time()}';</script>
<script type="text/javascript" src="{$ADRESSE}js/jquery.form.min.js"></script>
<script type="text/javascript" src="{$ADRESSE}js/mur.js"></script>

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}discussions.html">Discussions</a>
	> {$groupe->getNom()}
</div>

	{if !empty($error)}
		<div class="error">
			{$error}
		</div>
	{/if}

	<div class="proposition">
		<div class="proposition_description">
			<h1>{$groupe->getNom()|escape:'html'}</h1>
			<div class="proposition_description_date">Ouvert le {$groupe->getCreation()|date_format:"%d/%m/%y"} par {$groupe->getUtilisateur()->getPseudo()|escape:'html'}</div>
			<div class="proposition_description_texte">{$groupe->getSujet()|escape:'html'|nl2br}</div>
			<div class="proposition_description_liens">
				<div style="float:left">
					<a href="#" data-toggle="modal" data-target="#shareModal"><img src="{$ADRESSE}images/share_email.png" style="margin-left:3px;" /></a>
					<div class="clear" style="height:10px;"></div>
					<span class='st_facebook_large' st_url="{$ADRESSE}discussion/{$groupe->getId()}.html"></span>
					<span class='st_twitter_large' st_url="{$ADRESSE}discussion/{$groupe->getId()}.html" st_via="{$MARQUE}"></span>
					<span class='st_googleplus_large' st_url="{$ADRESSE}discussion/{$groupe->getId()}.html"></span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Les participants
				</div>
				<div class="proposition_menu_contenu">
					{foreach from=$participants item=participant name=boucle}
						{$participant->getPseudo()|escape:'html'}<br />
					{foreachelse}
						Soyez le premier !
					{/foreach}
				</div>
			</div>

			<div id="mur_center">
					{if Utilisateur::estConnecte()}
					<div id="postmur">
						<form method="POST" action="{$smarty.server.REQUEST_URI}" name="form_postermur" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Statut <img src="{$ADRESSE}images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="{$ADRESSE}images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="message"></textarea></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="{$groupe->getId()}">
						<input type="hidden" name="typeConteneur" value="20">
						</form>
					</div>
					<div id="postphoto" style="display:none;">
						<form method="POST" action="{$smarty.server.REQUEST_URI}" name="form_posterphoto" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Statut <img src="{$ADRESSE}images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="{$ADRESSE}images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="titre"></textarea><br />Photo : <input type="file" name="photo" /><span class="percent"></span></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="{$groupe->getId()}">
						<input type="hidden" name="typeConteneur" value="20">
						</form>
					</div>
					{else}
						<div class="error">Connectez-vous pour participer à la discussion</div>
					{/if}
				<div id="mymur">
					{foreach from=$feed item=data name=boucle}
						{if Utilisateur::estConnecte()}
							{include file='view_feed.tpl' feed=$data}
						{else}
							{include file='view_feed_ro.tpl' feed=$data}
						{/if}
					{/foreach}
				</div>
			</div>
			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Les autres discussions
				</div>
				<div class="proposition_menu_contenu">
					{foreach from=$other_groupes item=other_groupe name=boucle}
						<a href="{$ADRESSE}discussion/{$other_groupe->getId()}.html">{$other_groupe->getNom()|escape:'html'}</a><br />
					{/foreach}
				</div>
			</div>
			<div class="clear"></div>

	</div>

	
	
{/block}