{extends file='base.tpl'}
{block name=body}

{include file='search_bar.tpl'}


	<ol class="breadcrumb">
		<li><a href="{$ADRESSE}">Accueil</a></li>
		<li class="active">Agir</li>
	</ol>

	<h1 style="text-align:center;">Pour une démocratie directe</h1>

	<div class="agir_ligne1_1">
		<div class="agir_image"><img src="{$ADRESSE}images/agir_ligne1_1.png" /></div>
		<div class="agir_titre">Participez au site</div>
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(1)}
			{$bloctexte->getContenu()}
		</div>
	</div>
	<div class="agir_ligne1_2">
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(2)}
			{$bloctexte->getContenu()}
		</div>
		<div class="agir_bouton"><a href="{$ADRESSE}inscription.html"><img src="{$ADRESSE}images/agir_inscription.png" /></a></div>
	</div>
	<div class="agir_ligne1_3">
		<div class="agir_image"><img src="{$ADRESSE}images/agir_ligne1_3.png" /></div>
		<div class="agir_titre">L’association</div>
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(3)}
			{$bloctexte->getContenu()}
		</div>
	</div>
	
	<div class="clear" style="height:30px;"></div>

	<div class="agir_ligne2_1">
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(4)}
			{$bloctexte->getContenu()}
		</div>
		<div class="agir_bouton"><a href="{$ADRESSE}inscription.html"><img src="{$ADRESSE}images/agir_antenne.png" /></a></div>
	</div>
	<div class="agir_ligne2_2">
		<div class="agir_titre">Faire un don</div>
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(5)}
			{$bloctexte->getContenu()}
		</div>
		<div class="agir_bouton">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="business" value="{Config::get('paypal')}">
				<input type="hidden" name="lc" value="FR">
				<input type="hidden" name="item_name" value="{$MARQUE}">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
				<input type="image" src="{$ADRESSE}images/agir_dons.png" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
				<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
			</form>

		</div>
	</div>
	<div class="agir_ligne2_3">
		<div class="agir_texte">
			{assign var=bloctexte value=BlocTexte::selectBlocTexte(6)}
			{$bloctexte->getContenu()}
		</div>
		<div class="agir_bouton">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="business" value="{Config::get('paypal')}">
				<input type="hidden" name="lc" value="FR">
				<input type="hidden" name="item_name" value="{$MARQUE}">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
				<input type="image" src="{$ADRESSE}images/agir_don.png" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
				<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
	</div>


<div class="clear"></div>


{/block}