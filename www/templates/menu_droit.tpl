{if isset($home_question) && $home_question}
<div class="home_menu_item" style="background:#e7e7e7; padding:15px; border:0; border-radius:10px;">
	<h3>La question du jour</h3>
	<div style="text-align:left;">
		{$home_question->getQuestion()}<br /><br />
		<form action="{$ADRESSE}sondage/{$home_question->getId()}.html" method="POST">
			<label><input type="radio" value="1" name="statut" /> Oui</label><br />
			<label><input type="radio" value="2" name="statut" /> Non</label><br />
			<label><input type="radio" value="3" name="statut" /> NSP (Vote blanc)</label><br /><br />
			<div style="text-align:center;">
				<button class="design" name="voter" type="submit">Voter</button>
			</div>
		</form>
	</div>
</div>
{/if}
<div class="home_menu_item">
	<h3>Recherche par région</h3>
	<div style="text-align:center;">
			<div style="background:transparent url('{$ADRESSE}images/cartes/regions.png')no-repeat;padding:0;margin:0;width:226px;height:251px; margin:auto;">
				<div id="mapRegion" style="background: transparent url('{$ADRESSE}images/cartes/map_blank.png')">
					<img border="0" usemap="#Map" src="http://www.location-et-vacances-france.fr/images/carte/map_blank.png">
				</div>
			</div>
			<map name="Map" id="Map">
				<area shape="poly" title="Nord-Pas-de-Calais - Picardie" href="{$ADRESSE}localite/region/nord-pas-de-calais-picardie.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('nord-pas-de-calais-picardie')" coords="109,28,112,32,114,36,114,41,114,45,115,48,115,50,119,50,123,50,127,51,130,52,134,52,138,52,140,55,143,57,146,56,147,52,147,46,152,45,154,41,154,36,156,32,155,21,151,20,147,20,146,16,143,15,141,15,140,12,138,10,136,9,134,10,127,1,124,2,118,4,113,6,112,15" href="" />
				<area shape="poly" title="Alsace - Champagne-Ardenne - Lorraine" href="{$ADRESSE}localite/region/alsace-champagne-ardenne-lorraine.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('alsace-champagne-ardenne-lorraine')" coords="157,30,160,31,163,29,165,25,167,28,167,32,167,34,170,34,172,35,175,37,177,40,181,39,184,40,186,42,189,41,192,41,195,41,198,47,200,48,203,47,205,49,209,49,210,47,213,49,214,51,223,51,223,56,220,60,219,65,217,70,216,73,216,76,216,80,215,85,217,88,214,91,210,92,207,87,204,84,200,82,198,81,194,80,191,80,189,79,185,82,184,84,183,87,179,88,177,90,174,89,170,87,170,84,168,82,165,80,164,79,161,82,158,82,154,82,151,80,148,77,146,74,144,71,143,67,145,65,144,63,144,58,146,57,147,54,147,52,147,47,150,46,152,45,155,44,155,41,154,38,154,36,156,34" href="" />
				<area shape="poly" title="Ile-de-France" href="{$ADRESSE}localite/region/ile-de-france.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('ile-de-france')" coords="110,53,112,53,114,50,117,51,122,50,126,51,128,52,131,52,136,52,139,54,141,56,144,58,144,63,144,66,143,68,142,70,136,71,136,75,134,77,130,77,128,77,127,75,127,73,123,72,121,73,119,73,117,70,115,68,113,66,112,63,111,59" />
				<area shape="poly" title="Normandie" href="{$ADRESSE}localite/region/normandie.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('normandie')" coords="52,34,55,36,58,36,61,35,63,37,63,40,64,42,65,44,69,44,71,45,75,45,77,45,79,46,81,47,85,46,87,45,89,44,86,42,87,38,89,35,93,34,97,33,101,32,104,31,107,29,108,29,111,31,112,34,113,35,113,37,114,40,114,44,114,46,115,48,114,50,112,52,111,53,110,55,110,57,109,59,106,61,104,61,100,62,98,63,99,65,101,67,100,69,98,72,97,76,94,74,91,73,90,70,89,68,87,70,86,71,83,70,81,68,81,65,77,67,74,68,70,68,68,66,65,66,63,65,61,67,59,66,58,64,59,62,58,60,58,57,57,53,58,48,56,44,54,41" href="" />
				<area shape="poly" title="Bourgogne - Franche-Comté" href="{$ADRESSE}localite/region/bourgogne-franche-comte.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('bourgogne-franche-comte')" coords="137,112,138,109,137,105,136,103,135,99,135,96,135,92,134,89,135,87,137,84,138,81,137,78,136,75,138,72,141,71,143,72,145,74,148,78,151,82,154,83,159,83,163,82,164,81,167,83,170,85,170,88,173,89,177,90,179,90,182,88,184,85,185,83,188,80,191,80,195,81,198,82,201,83,205,85,207,88,208,91,206,94,207,96,205,100,201,104,198,106,197,109,197,112,195,113,193,116,192,120,190,122,188,124,184,124,180,124,177,120,177,119,172,119,170,121,169,124,168,126,166,124,164,124,162,124,160,126,160,128,156,128,152,127,154,124,155,121,154,118,150,116,146,114,144,114,140,115" href="" />
				<area shape="poly" title="Centre" href="{$ADRESSE}localite/region/centre.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('centre')" coords="98,76,98,73,99,71,102,68,100,66,98,64,101,63,105,61,108,60,110,58,111,62,113,66,114,68,116,71,119,73,121,73,125,73,126,74,127,77,130,78,135,77,137,79,138,82,137,85,134,88,134,92,134,95,135,100,136,104,136,107,138,110,136,113,132,114,129,115,129,119,125,120,123,122,118,121,112,122,107,123,104,123,103,119,100,117,99,113,96,110,96,106,91,107,88,106,86,102,86,99,87,94,87,92,91,91,94,88,97,85,97,82,98,79" href="" />
				<area shape="poly" title="Pays-de-la-Loire" href="{$ADRESSE}localite/region/pays-de-la-loire.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('pays-de-la-loire')" coords="65,75,65,69,66,67,69,68,71,69,76,68,80,66,82,69,84,71,85,71,89,69,90,72,92,74,95,76,97,77,97,81,96,85,92,88,88,91,86,91,85,96,84,101,80,103,75,103,72,105,69,106,67,106,68,109,70,112,70,117,71,122,68,123,65,123,60,123,52,119,49,115,44,108,46,105,45,102,40,97,39,93,42,92,46,90,49,88,53,87,58,84,60,85,63,84,65,81" href="" />
				<area shape="poly" title="Bretagne" href="{$ADRESSE}localite/region/bretagne.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('bretagne')" coords="6,60,11,58,15,58,18,60,21,59,23,59,24,55,29,55,31,56,34,60,37,63,38,64,41,63,43,63,47,63,49,63,50,62,54,63,57,64,58,67,63,67,64,68,64,75,64,81,61,82,57,84,54,85,49,87,45,89,42,92,38,91,35,88,31,88,27,88,24,84,20,82,16,82,14,78,11,80,8,80,7,78,4,75,2,73,6,73,9,72,8,70,5,70,2,67,1,62" href="" />
				<area shape="poly" title="Aquitaine - Limousin - Poitou-Charentes" href="{$ADRESSE}localite/region/aquitaine-limousin-poitou-charentes.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('aquitaine-limousin-poitou-charentes')" coords="63,124,68,124,71,123,72,120,71,116,71,112,68,107,70,107,73,105,76,104,80,104,84,102,86,105,88,108,93,108,95,110,97,113,99,118,102,120,103,123,107,124,111,124,116,122,120,122,123,124,125,125,127,127,130,131,129,134,127,136,125,138,126,141,128,142,127,145,127,148,124,151,121,155,120,159,115,160,112,158,109,158,107,159,106,165,103,168,101,171,100,175,98,175,98,179,94,183,91,183,87,184,82,185,79,185,76,187,76,193,78,196,79,199,80,202,78,205,75,207,74,210,74,213,71,215,67,213,66,211,59,209,57,207,52,207,52,203,51,201,47,199,50,196,53,191,55,182,57,175,58,169,62,166,59,164,57,163,60,145,60,138,57,131,54,125,59,126" href="" />
				<area shape="poly" title="Auvergne - Rhône-Alpes" href="{$ADRESSE}localite/region/auvergne-rhone-alpes.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('auvergne-rhone-alpes')" coords="124,122,126,119,129,120,129,116,131,115,136,113,139,115,142,115,145,115,149,117,153,119,154,122,153,125,152,126,155,128,160,128,161,125,165,124,167,126,169,125,170,122,173,119,176,121,178,123,182,124,186,124,190,123,193,121,193,124,190,127,192,127,194,125,196,122,200,120,204,121,205,123,204,126,207,129,209,131,208,133,206,134,205,138,209,140,210,142,212,144,212,147,211,149,210,151,207,152,204,154,200,154,196,153,196,155,197,158,197,159,193,161,189,164,186,167,184,169,184,172,182,172,185,176,187,179,184,180,179,178,177,176,174,174,171,175,166,175,164,175,161,176,158,174,155,170,154,167,153,163,151,162,147,162,145,161,144,159,139,161,138,163,137,167,135,164,134,161,132,161,128,164,127,167,123,167,120,164,120,160,122,156,123,153,125,152,127,149,128,146,128,142,125,139,127,137,130,134,131,132,129,128,125,125" href="" />
				<area shape="poly" title="Languedoc-Roussillon - Midi-Pyrénées" href="{$ADRESSE}localite/region/languedoc-roussillon-midi-pyrenees.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('languedoc-roussillon-midi-pyrenees')" coords="75,213,75,208,78,205,80,202,80,200,79,196,76,193,76,188,79,187,82,186,87,185,91,183,94,183,98,179,99,175,100,175,102,171,106,166,107,162,108,159,111,159,113,160,116,160,119,160,120,164,121,167,124,168,127,167,129,164,131,162,133,162,134,164,136,167,138,167,138,163,140,161,142,161,145,162,149,163,151,164,153,167,154,171,155,173,159,176,163,177,165,176,168,179,168,182,170,183,169,186,167,189,166,191,164,192,162,196,160,197,157,196,154,196,151,199,148,200,143,204,140,207,138,210,137,214,136,222,139,224,135,225,129,226,119,227,115,224,111,220,106,219,102,217,97,215,94,215,92,217,85,217,78,217" href="" />
				<area shape="poly" title="Provences-Alpes-Côte d'Azur" href="{$ADRESSE}localite/region/provence-alpes-cote-d-azur.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('provence-alpes-cote-d-azur')" coords="166,176,171,176,173,177,175,176,179,179,183,181,187,179,187,177,185,174,185,171,186,168,189,166,193,162,197,161,198,156,198,155,202,155,206,157,207,160,211,161,210,165,209,169,209,171,210,174,212,176,216,177,219,178,224,177,224,181,222,185,221,188,217,191,213,193,210,195,208,198,206,201,206,203,199,206,191,207,187,204,182,202,179,201,173,199,172,201,166,198,162,198,165,194,168,191,169,187,171,183,168,179" href="" />
				<area shape="poly" title="Corse" href="{$ADRESSE}localite/region/corse.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('corse')" coords="204,222,209,217,212,215,216,216,216,207,219,207,220,218,221,226,222,230,220,234,217,252,209,245,210,244,207,239,206,234,204,227" href="" />
			</map>
	</div>
	<div class="clear" style="height:16px;"></div>
	<h3>Recherche par département</h3>
	<div style="font-size:11px;text-align:center;"><a href="{$ADRESSE}departements.html">Afficher la carte des départements</a></div>
	<div class="clear" style="height:16px;"></div>
	<h3>Recherche par ville</h3>
	<div style="text-align:center;">
		<form action="{$ADRESSE}localite.html" method="GET"  class="form-horizontal">
			<div style="font-size:11px;">Indiquez votre ville ou votre code postal</div>
			<div style="margin-top:4px;" class="form-group form-group-sm"><input type="text" name="searchville" placeholder="12345 / Paris" class="form-control" autocomplete="off" data-provide="typeahead" style="max-w" /><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Rechercher</button></div>
			<input type="hidden" name="villeId" id="villeId" value="" />
			<div class="clear"></div>
		</form>
	</div>

</div>
<div class="home_menu_item theme">
	<h3>Thématique</h3>
	<div style="text-align:left;">
		<ul>
		{foreach from=$home_categories item=categorie name=boucle}
			<li><a href="{$ADRESSE}categorie/{$categorie->getId()}.html">{$categorie->getNom()}</a></li>
		{/foreach}
		</ul>
	</div>
</div>