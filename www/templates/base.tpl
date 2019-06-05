<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$HEAD_TITLE}</title>
	<meta name="title" content="{$HEAD_TITLE}" />
	<meta name="description" content="{$HEAD_DESCRIPTION}" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="{$MARQUE}" />
	<meta name="language" content="fr" />
	<link rel="shortcut icon" href="{$ADRESSE}images/favicon.ico" type="image/x-icon" /> 
	<link rel="stylesheet" href="{$ADRESSE}lib/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="{$ADRESSE}lib/bootstrap/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="{$ADRESSE}templates/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="{$ADRESSE}js/redmond/jquery-ui.min.css" media="screen" />
	<script type="text/javascript" src="{$ADRESSE}js/jquery.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/fonctions.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/jquery.form.min.js"></script>
	<script>
		$(document).ready(function () {
			$("form[name=form_connexion]").submit(function(ev){
				ev.preventDefault();
				$.ajax({
					type: "POST",
					url: ADRESSE+"ajax/ajax_connexion.php", // 
					data: $('form[name=form_connexion]').serialize(),
					success: function(msg){
						var data = $.parseJSON(msg);
						if(data.success){
							location.reload();
						}
						if(data.error){
							$('#loginError').html(data.error);
							$('#loginError').css('display', 'block');
						}
					}
				});
			});
		});
    </script>
	<script type="text/javascript">var ADRESSE = '{$ADRESSE}';</script>
</head>
<body>
	<div id="fb-root" class="container"></div>
	{* FORM DE CONNEXION *}
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Connexion</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" id="loginError" style="display:none;"></div>
					<form enctype="multipart/form-data" class="form-horizontal" method="POST" name="form_connexion" action="{$smarty.server.REQUEST_URI|escape:'html'}">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
								<div class="col-sm-8">
									<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="{if isset($smarty.post.pseudo)}{$smarty.post.pseudo}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group" >
								<label for="password" class="col-sm-4 control-label">Mot de passe * : </label>
								<div class="col-sm-8">
									<input type="password" name="password" id="password" placeholder="Mot de passe" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div style="text-align:center;">
							<button type="submit" class="btn btn-sm btn-red" name="connexion"><i class="glyphicon glyphicon-ok"></i> &nbsp; Se connecter</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div style="text-align:center;">
						<a href="{$ADRESSE}inscription.html">S'inscrire</a> - <a href="{$ADRESSE}pass.html">Mot de passe perdu</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="header">
		<div id="header_container">
			<div id="header_logo"><a href="{$ADRESSE}"><img src="{$ADRESSE}images/logo.png" title="{$MARQUE}" alt="{$MARQUE}"/></a></div>
			<div id="header_description">
				<div class="header_description_titre">Livedem.org : Inventons ensemble la démocratie 2.0 !</div>
				<div class="header_description_texte">Livedem.org est un outil collaboratif permettant l'expression populaire, le débat public non partisan et le relais auprès des élus.</div>
			</div>
			<div id="header_compte">
				{if $global_utilisateur}
					<a href="{$ADRESSE}mon-compte.html"><img src="{$ADRESSE}images/header_moncompte.png" title="Mon Compte" alt="Mon Compte" /></a>
					<div class="header_compte_inscription"><a href="{$ADRESSE}deconnexion.html">Déconnexion</a></div>
				{else}
					<a href="#" data-toggle="modal" data-target="#myModal"><img src="{$ADRESSE}images/header_seconnecter.png" title="Se connecter" alt="Se connecter" /></a>
					<div class="header_compte_inscription"><a href="{$ADRESSE}inscription.html">Inscription</a></div>
				{/if}
				
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div id="menu">
		<div id="menu_container">
			<ul>
				<li class="item {if (!isset($page_actif) || $page_actif == "accueil") && !isset($smarty.get.statut)}actif{/if}"><a href="{$ADRESSE}">Accueil</a></li>
				<li class="item {if (isset($page_actif) && $page_actif == "propositions") || (isset($smarty.get.statut) && $smarty.get.statut == 2)}actif{/if} "><a href="{$ADRESSE}propositions.html">Propositions</a></li>
				<li class="item {if (isset($page_actif) && $page_actif == "debats")  || (isset($smarty.get.statut) && $smarty.get.statut == 3)}actif{/if}"><a href="{$ADRESSE}debats.html">Débats</a></li>
				<li class="item {if (isset($page_actif) && $page_actif == "votes")  || (isset($smarty.get.statut) && $smarty.get.statut == 4)}actif{/if}"><a href="{$ADRESSE}votes.html">Votes</a></li>
				<li class="item {if isset($page_actif) && $page_actif == "discussions"}actif{/if}"><a href="{$ADRESSE}discussions.html">Discussions</a></li>
				<li class="item {if isset($page_actif) && $page_actif == "petitions"}actif{/if}"><a href="{$ADRESSE}petitions.html">Pétitions</a></li>
				<li class="item {if isset($page_actif) && $page_actif == "agir"}actif{/if}"><a href="{$ADRESSE}agir.html">Agir</a></li>
				{if $global_utilisateur}
					<li class="item {if isset($page_actif) && $page_actif == "mon-compte"}actif{/if}" style="background-image:none;"><a href="{$ADRESSE}mon-compte.html">Ma page perso</a></li>
				{else}
					<li class="item {if isset($page_actif) && $page_actif == "mon-compte"}actif{/if}" style="background-image:none;"><a href="{$ADRESSE}connexion.html">Ma page perso</a></li>
				{/if}
			</ul>
			<div class="clear"></div>
		</div>
	</div>

	<div id="body">
		<div id="body_container">
			{block name=body}{/block}
		</div>

		<div class="clear"></div>
		<div id="footer">
			<div id="footer_container">
				<div class="footer_colonne">
					<a href="{$ADRESSE}cms/qui-sommes-nous.html">Qui sommes nous?</a> <br />
					<a href="{$ADRESSE}cms/charte-et-utilisation.html">Charte et utilisation</a> <br />
					<a href="{$ADRESSE}cms/espace-presse.html">Espace presse</a> <br />
					<a href="{$ADRESSE}cms/partenaires.html">Partenaires</a> <br />
					<a href="{$ADRESSE}cms/mentions-legales.html">Mentions légales</a> <br />
					<a href="{$ADRESSE}cms/charte.html">Charte du site</a> <br />
					<a href="{$ADRESSE}contact.html">Contact</a> <br />
				</div>
				<div class="footer_colonne">
					<a href="{$ADRESSE}cms/charte-moderation.html">Charte de modération</a><br />
					<a href="{$ADRESSE}cms/reglement-interieur.html">Reglement intérieur</a><br />
					<a href="{$ADRESSE}cms/comment-ca-marche.html">Comment ça marche?</a><br />
				</div>
				<div class="footer_colonne">
					<a href="{$ADRESSE}cms/faq.html">FAQ</a><br />
					<a href="{$ADRESSE}cms/comment-s-exprimer.html">Comment participer ?</a><br />
					<a href="{$ADRESSE}cms/comment-se-presenter.html">Comment se présenter ?</a><br />
				</div>
				<div class="footer_colonne" style="text-align:right; border-right:0;">
					<div style="line-height:16px; margin-bottom:25px;"><a href="{$ADRESSE}contact.html">Créer mon livedem pour mon association / entreprise / collectivité</a></div>
					<a href="{Config::get('facebook')}"><img src="{$ADRESSE}images/footer_facebook.png" /></a>&nbsp;&nbsp;
					<a href="{Config::get('twitter')}"><img src="{$ADRESSE}images/footer_twitter.png" /></a>&nbsp;&nbsp;
					<a href="{Config::get('youtube')}"><img src="{$ADRESSE}images/footer_youtube.png" /></a>
					<div style="margin-top:60px; font-size:9px;">
						<a style="text-decoration:none;" href="http://www.breizhmasters.fr/" target="_blank"><img src="http://www.breizhmasters.fr/images/mini_logo.png" style="vertical-align:middle;"> Réalisé par BreizhMasters</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--[if lt IE 9]>
	  <script src="{$ADRESSE}lib/bootstrap/js/respond.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="{$ADRESSE}lib/bootstrap/js/bootstrap.min.js"></script>
	{literal}
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "f57625ec-d400-4101-bd79-8a1f30c87c41", doNotHash: true, doNotCopy: true, hashAddressBar: true, shorten:false, popup:true});</script>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-71662346-1', 'auto');
				ga('send', 'pageview');
			</script>
	{/literal}
	{block name=foot}{/block}
</body>
</html>
