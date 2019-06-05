{* C'est une interaction : Like / Partage *}
{if isset($smarty.session.id)}
	{$utilisateurConnecte = Utilisateur::selectUtilisateur($smarty.session.id)}
{else}
	{$utilisateurConnecte = false}
{/if}
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
					{include file='view_feed_ro.tpl' feed=$data}
				{/foreach}
			</div>
			<div>
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 1)}
				<span class="like" id="like{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a></span> - 
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 2)}
				<span class="dislike" id="dislike{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a></span>
			</div>
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
					{include file='view_feed_ro.tpl' feed=$data}
				{/foreach}
			</div>
			<div>
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 1)}
				<span class="like" id="like{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 1)">{if $nblike > 1} {$nblike} personnes aiment {else} {$nblike} personne aime {/if}</a></span> - 
				{$nblike = Interaction::getNb($feed->getType(), $feed->getId(), 2)}
				<span class="dislike" id="dislike{$feed->getType()}-{$feed->getId()}"><a href="javascript:showlikes({$feed->getType()}, '{$feed->getId()}', 2)">{if $nblike > 1} {$nblike} personnes n'aiment pas {else} {$nblike} personne n'aime pas {/if}</a></span>
			</div>
		</div>
		<div class="foot"></div>
	</div>
{/if}