{extends file='base.tpl'}
{block name=body}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}sondages.html">Sondages</a>
	> {$sondage->getQuestion()|escape:'html'}
</div>

	{if $success}
		<div class="success">
			Votre vote a bien été pris en compte.
		</div>
	{/if}

	{if !empty($error)}
		<div class="error">
			{$error}
		</div>
	{/if}

	<h1 class="titre">{$sondage->getQuestion()|escape:'html'}</h1>

	{if $deja_vote == 0}
	<div style="text-align:center;">
		<form action="{$ADRESSE}sondage/{$sondage->getId()}.html" method="POST">
			<label><input type="radio" value="1" name="statut" /> Oui</label><br />
			<label><input type="radio" value="2" name="statut" /> Non</label><br />
			<label><input type="radio" value="3" name="statut" /> NSP (Vote blanc)</label><br /><br />
			<button class="design" name="voter" type="submit">Voter</button>
		</form>
	</div>
	{/if}

	<div class="proposition">
		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />

		<div class="proposition_menu" style="margin-left:230px;">
			<div class="proposition_menu_header">
				Les votes
			</div>
			<div class="proposition_menu_intertitre" style="background:#8e0000;">Pour</div>
			<div class="proposition_menu_contenu" style="color:#8e0000; text-align:center;">
				{$votes_1} votes<br />
				{if ($votes_1+$votes_2+$votes_3) == 0}
					0%
				{else}
					{($votes_1/($votes_1+$votes_2+$votes_3))*100|string_format:"%d"} %
				{/if}
			</div>
		</div>

		<div class="proposition_menu">
			<div class="proposition_menu_header">
				Les votes
			</div>
			<div class="proposition_menu_intertitre" style="background:#034066;">Contre</div>
			<div class="proposition_menu_contenu" style="color:#034066; text-align:center;">
				{$votes_2} votes<br />
				{if ($votes_1+$votes_2+$votes_3) == 0}
					0%
				{else}
					{($votes_2/($votes_1+$votes_2+$votes_3))*100|string_format:"%d"} %
				{/if}
			</div>
		</div>

		<div class="clear"></div>
	</div>
{/block}