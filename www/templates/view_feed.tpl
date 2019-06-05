{* C'est une interaction : Like / Partage *}
{$utilisateurConnecte = Utilisateur::selectUtilisateur($smarty.session.id)}
{if $feed->getType() == 6 || $feed->getType() == 5}
	{$interaction = Interaction::selectInteraction($feed->getId())}
	{$utilisateur_share = Utilisateur::selectUtilisateur($interaction->getUtilisateurId())}
{/if}


{* Commentaire *}
{if $feed->getType() == 3}
	{$commentaire = Commentaire::selectCommentaire($feed->getId())}
	{$utilisateur = Utilisateur::selectUtilisateur($commentaire->getUtilisateurId())}
	<div class="commentaire" id="feed{$feed->getType()}-{$feed->getId()}">
		<div class="messagecomm">
			<b>{$utilisateur->getPseudo()|escape:'html'}</b> {$commentaire->getMessage()|escape:'html'|nl2br}
			<div class="date"><span data-livestamp="{$commentaire->getDate()}">{$commentaire->getDate()|relative_date}</span></div>
			<div class="interaction">
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 1)}
				<span class="like" id="like{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a></span> - 
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 2)}
				<span class="dislike" id="dislike{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a></span> - 
				<br />
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-1"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 1)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 1)}Vous aimez{else}J'aime{/if}</a></span> -
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-2"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 2)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 2)}Vous n'aimez pas{else}J'aime pas{/if}</a></span> - 
				{if $utilisateurConnecte->estAdministrateur("commentaire", $commentaire->getId())}
					<span class="supprimer"><a href="javascript:supprimer('commentaire', '{$commentaire->getId()}')">Supprimer</a></span> -
				{/if}
				<span class="signaler"><a href="javascript:signaler({$feed->getType()}, '{$feed->getId()}')">Signaler</a></span>
			</div>
		</div>
		<div class="clear"></div>
	</div>

{* Like *}
{elseif $feed->getType() == 5}
	{$nblike = Interaction::getNb($interaction->getTypeId(), $interaction->getObjetId(), 1)}
	<a href="javascript:showlikes({$interaction->getTypeId()}, '{$interaction->getObjetId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a>
{* Like *}
{elseif $feed->getType() == 6}
	{$nblike = Interaction::getNb($interaction->getTypeId(), $interaction->getObjetId(), 2)}
	<a href="javascript:showlikes({$interaction->getTypeId()}, '{$interaction->getObjetId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a>

{* Message sur le mur *}
{elseif $feed->getType() == 1 || ($feed->getType() == 6 && $interaction->getTypeId() == 1) }
	{if isset($interaction)}
		{$mur = Mur::selectMur($interaction->getObjetId())}
	{else}
		{$mur = Mur::selectMur($feed->getId())}
	{/if}
	{$utilisateur = Utilisateur::selectUtilisateur($mur->getUtilisateurId())}
	<div class="mur" id="feed{$feed->getType()}-{$feed->getId()}">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo">{$utilisateur->getPseudo()|escape:'html'}</div>
				<div class="heure"><span data-livestamp="{$feed->getDate()}">{$feed->getDate()|relative_date}</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				{$mur->getMessage()|escape:'html'|nl2br}
			</div>
			<div class="commentaires">
				{$commsfeed = Feed::getFeedCommentaires($feed->getType(), $feed->getId())}
				{foreach from=$commsfeed item=data name=boucle}
					{include file='view_feed.tpl' feed=$data}
				{/foreach}
			</div>
			<div>
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 1)}
				<span class="like" id="like{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a></span> - 
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 2)}
				<span class="dislike" id="dislike{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-1"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 1)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 1)}Vous aimez{else}J'aime{/if}</a></span>
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-2"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 2)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 2)}Vous n'aimez pas{else}J'aime pas{/if}</a></span>
				<span class="commenter">Commenter</span>
				{if $utilisateurConnecte->estAdministrateur("mur", $mur->getId())}
					<span class="supprimer"><a href="javascript:supprimer('mur', '{$mur->getId()}')">Supprimer</a></span>
				{/if}
				<span class="signaler"><a href="javascript:signaler({$feed->getType()}, '{$feed->getId()}')">Signaler</a></span>
			</div>
			<form method="POST" action="{$smarty.server.REQUEST_URI}" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="{$feed->getType()}" /><input type="hidden" name="objetId" value="{$feed->getId()}" /><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>
{* Photos *}
{elseif $feed->getType() == 2 || ($feed->getType() == 6 && $interaction->getTypeId() == 2) }
	{if isset($interaction)}
		{$photo = Photo::selectPhoto($interaction->getObjetId())}
	{else}
		{$photo = Photo::selectPhoto($feed->getId())}
	{/if}
	{$utilisateur = Utilisateur::selectUtilisateur($photo->getUtilisateurId())}
	<div class="mur" id="feed{$feed->getType()}-{$feed->getId()}">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo">{$utilisateur->getPseudo()|escape:'html'}</div>
				<div class="heure"><span data-livestamp="{$feed->getDate()}">{$feed->getDate()|relative_date}</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<div style="text-align:center; margin-bottom:5px;"><img src="{$ADRESSE}modules/get_image.php?width=430&image=data/photos/{$photo->getLocalisation()}" /></div>
				<div style="text-align:center; font-size:12px;">{$photo->getTitre()|escape:'html'}</div>
			</div>
			<div class="commentaires">
				{$commsfeed = Feed::getFeedCommentaires($feed->getType(), $feed->getId())}
				{foreach from=$commsfeed item=data name=boucle}
					{include file='view_feed.tpl' feed=$data}
				{/foreach}
			</div>
			<div>
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 1)}
				<span class="like" id="like{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a></span> - 
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 2)}
				<span class="dislike" id="dislike{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-1"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 1)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 1)}Vous aimez{else}J'aime{/if}</a></span>
				<span class="aimer" id="aimer{$feed->getType()}-{$feed->getId()}-2"><a href="javascript:like({$feed->getType()}, '{$feed->getId()}', 2)">{if Interaction::existInteraction($smarty.session.id, $feed->getType(), $feed->getId(), 2)}Vous n'aimez pas{else}J'aime pas{/if}</a></span>
				<span class="commenter">Commenter</span>
				{if $utilisateurConnecte->estAdministrateur("photo", $photo->getId())}
					<span class="supprimer"><a href="javascript:supprimer('photo', '{$photo->getId()}')">Supprimer</a></span>
				{/if}
				<span class="signaler"><a href="javascript:signaler({$feed->getType()}, '{$feed->getId()}')">Signaler</a></span>
			</div>
			<form method="POST" action="{$smarty.server.REQUEST_URI}" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="{$feed->getType()}" /><input type="hidden" name="objetId" value="{$feed->getId()}" /><input type="image" src="{$ADRESSE}images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>
{/if}