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
		<div class="info">Cette page est accessible en lecture uniquement. La proposition en est maintenant au stade <b>{$proposition->getStatutTexte()}</b>.<br />
		<a href="{$ADRESSE}proposition/{$proposition->getId()}.html" style="font-weight:900; color:#DA2B2B;">Cliquez-ici pour y accéder</a></div>
	{/if}

	{if $success}
		<div class="success">
			Votre vote a bien été pris en compte. Vous avez reçu votre "Code vote" confidentiel par e-mail.<br />
			Ce code vous permet de vérifier qu'il a bien été comptabilisé.
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
				{/if}
			<div style="margin-top:10px; text-align:right;">
				<a href="#" data-toggle="modal" data-target="#shareModal"><img src="{$ADRESSE}images/share_email.png" style="margin-left:3px;" /></a>
				<div class="clear" style="height:10px;"></div>
				<span class='st_facebook_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html"></span>
				<span class='st_twitter_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html" st_via="LivedemOrg"></span>
				<span class='st_googleplus_large' st_url="{$ADRESSE}proposition/{$proposition->getId()}.html"></span>
			</div>
			<div style="margin-top:10px; text-align:right;">
				<a href="#debat" class="button">Accéder aux échanges des participants sur ce débat</a><br /><br />
				<a href="#votes"> >> voir le{if $nb_votes > 1}s {$nb_votes}{/if} vote{if $nb_votes > 1}s{/if}</a>
			</div>
		</div>
		<div class="proposition_description">
			<h1>{$proposition->getTitre()|escape:'html'}</h1>
			<div class="proposition_description_date">{$proposition->getUtilisateur()->getVille()->getNom()}, le {$proposition->getDate()|date_format:"%d/%m/%y"} par {$proposition->getUtilisateur()->getPseudo()|escape:'html'}</div>
			<div class="proposition_description_texte">
				{$proposition->getDescription()|escape:'html'|nl2br}<br />
				<b>Période de vote</b> : Du {$proposition->getUpdateDate(4)|date_format:"d/m/Y"} au {$proposition->getNext(4)|date_format:"d/m/Y"}<br />
			</div>
			<div class="proposition_description_liens">
				<div style="margin-top:3px;">
					{if Utilisateur::estConnecte()}
						<form action="{$smarty.server.REQUEST_URI}" method="POST" style="float:right; margin-right:25px;">
							<input type="hidden" name="vote" value="1" />
							<input type="image" src="{$ADRESSE}images/btn_vote_pour.png" />
						</form>
						<form action="{$smarty.server.REQUEST_URI}" method="POST" style="float:right; margin-right:25px;">
							<input type="hidden" name="vote" value="2" />
							<input type="image" src="{$ADRESSE}images/btn_vote_contre.png" />
						</form>
					{else}
						<a data-target="#myModal" data-toggle="modal" href="#" style="float:right; margin-right:25px;"><input type="image" src="{$ADRESSE}images/btn_vote_pour.png" /></a>
						<a data-target="#myModal" data-toggle="modal" href="#" style="float:right; margin-right:25px;"><input type="image" src="{$ADRESSE}images/btn_vote_contre.png" /></a>
					{/if}
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />

		<div class="proposition_menu" style="margin-left:230px;">
			<div class="proposition_menu_header">
				Les votes
			</div>
			{assign var=total_votes value=(sizeof($votes_pour) + sizeof($votes_contre))}
			{if $total_votes == 0}
				{assign var=total_votes value=1}
			{/if}
			<div class="proposition_menu_intertitre" style="background:#8e0000;">Pour ({(sizeof($votes_pour) / ($total_votes))*100|string_format:"%d"}%)</div>
			<div class="proposition_menu_contenu" style="color:#8e0000;">
				{foreach from=$votes_pour item=vote name=boucle}
					Code #{$vote->getCode()}<br />
				{/foreach}
			</div>
		</div>

		<div class="proposition_menu">
			<div class="proposition_menu_header">
				Les votes
			</div>
			<div class="proposition_menu_intertitre" style="background:#034066;">Contre ({(sizeof($votes_contre) / ($total_votes))*100|string_format:"%d"}%)</div>
			<div class="proposition_menu_contenu" style="color:#034066;">
				{foreach from=$votes_contre item=vote name=boucle}
					Code #{$vote->getCode()}<br />
				{/foreach}
			</div>
		</div>
		<div class="clear"></div>
		<div style="font-size:10px; text-align:center; font-style:italic;">*Afin de conserver l'anonymat des votants, seul un code vote est affiché. Vous pouvez vérifier la prise en compte de votre vote grâce au code reçu par e-mail après avoir voter.</div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="debat" />

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
						{$defendeur->getUtilisateur()->getPseudo()|escape:'html'}<br />
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