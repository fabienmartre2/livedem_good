<link rel="stylesheet" href="{$ADRESSE}js/fileinput.min.css" />
<script src="{$ADRESSE}js/fileinput.min.js"></script>
<script src="{$ADRESSE}js/fileinput_locale_fr.js"></script>
{literal}
<script type="text/javascript">
$(document).ready(function() {
	$("#csv").fileinput({'showUpload':false, 'browseLabel':'Parcourir', 'removeLabel':'Supprimer', 'allowedFileExtensions': ['csv', 'txt'], 'showPreview': false});
});
</script>
{/literal}

{* FORM Partage *}
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="shareModalLabel">Partager par e-mail</h4>
			</div>
			<div class="modal-body">
				Pour partager cette page avec vos amis, vous pouvez vous connectez à l'un des services suivants :<br />
				<div style="text-align:center;">
					<a href="{$link_share}&type=facebook" target="_blank"><img src="{$ADRESSE}images/share_facebook.png" title="Facebook" alt="Facebook" /></a>
					<a href="{$link_share}&type=gmail" target="_blank"><img src="{$ADRESSE}images/share_gmail.png" title="Gmail" alt="Gmail" /></a>
					<a href="{$link_share}&type=live" target="_blank"><img src="{$ADRESSE}images/share_live.png" title="Live" alt="Live" /></a>
					<a href="{$link_share}&type=yahoo" target="_blank"><img src="{$ADRESSE}images/share_yahoo.png" title="Yahoo" alt="Yahoo" /></a>
				</div>
				<div class="clear" style="height:20px;"></div>
				Vous pouvez aussi importez vos contacts au format CSV : <br />
				<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{$link_share}&type=csv" target="_blank">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group" >
							<label for="csv" class="col-sm-4 control-label">Fichier CSV : </label>
							<div class="col-sm-8">
								<input type="file" name="csv" id="csv" />
								<p class="help-block">Max : 3Mo</p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div style="text-align:center;">
						<button type="submit" class="btn btn-sm btn-red" name="csv"> Envoyer</button>
					</div>
				</form>
				<div class="clear" style="height:20px;"></div>
				Ou envoyez une invitation rapide : <br />
				<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{$link_share}&type=fast" target="_blank">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group" >
							<label for="nom" class="col-sm-4 control-label">Votre nom * : </label>
							<div class="col-sm-8">
								<input type="text" name="nom" id="nom" placeholder="Votre nom" value="{if isset($smarty.post.nom)}{$smarty.post.nom}{/if}" class="form-control"/>
							</div>
						</div>
						<div class="form-group" >
							<label for="email" class="col-sm-4 control-label">E-mail de votre ami * : </label>
							<div class="col-sm-8">
								<input type="text" name="email" id="email" placeholder="E-mail de votre ami" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div style="text-align:center;">
						<button type="submit" class="btn btn-sm btn-red" name="fast"> Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>