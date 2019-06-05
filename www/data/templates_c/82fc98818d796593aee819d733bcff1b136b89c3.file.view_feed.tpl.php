<?php /* Smarty version Smarty-3.1.14, created on 2014-12-03 15:03:24
         compiled from "/home/dev/www/livedem/templates/view_feed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1818276994547f182c493806-55423303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82fc98818d796593aee819d733bcff1b136b89c3' => 
    array (
      0 => '/home/dev/www/livedem/templates/view_feed.tpl',
      1 => 1417539849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1818276994547f182c493806-55423303',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'feed' => 0,
    'interaction' => 0,
    'commentaire' => 0,
    'utilisateur' => 0,
    'nblike' => 0,
    'mur' => 0,
    'commsfeed' => 0,
    'data' => 0,
    'utilisateurConnecte' => 0,
    'ADRESSE' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547f182cabe8a9_02445462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547f182cabe8a9_02445462')) {function content_547f182cabe8a9_02445462($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_relative_date')) include '/home/dev/www/livedem/lib/Smarty/plugins/modifier.relative_date.php';
?>
<?php $_smarty_tpl->tpl_vars['utilisateurConnecte'] = new Smarty_variable(Utilisateur::selectUtilisateur($_SESSION['id']), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==6||$_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['interaction'] = new Smarty_variable(Interaction::selectInteraction($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur_share'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['interaction']->value->getUtilisateurId()), null, 0);?>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==3){?>
	<?php $_smarty_tpl->tpl_vars['commentaire'] = new Smarty_variable(Commentaire::selectCommentaire($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['commentaire']->value->getUtilisateurId()), null, 0);?>
	<div class="commentaire" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="messagecomm">
			<b><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</b> <?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getMessage();?>

			<div class="date"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['commentaire']->value->getDate());?>
</span></div>
			<div class="interaction">
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span> - 
				<br />
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span> -
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
			</div>
		</div>
		<div class="clear"></div>
	</div>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),1), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==6){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),2), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==1||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==1)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['mur']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<?php echo $_smarty_tpl->tpl_vars['mur']->value->getMessage();?>

			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php echo $_smarty_tpl->getSubTemplate ('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0);?>

				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
				<?php if ($_smarty_tpl->tpl_vars['utilisateurConnecte']->value->estAdministrateur("mur",$_smarty_tpl->tpl_vars['mur']->value->getId())){?>
					<span class="supprimer"><a href="javascript:supprimer('mur', '<?php echo $_smarty_tpl->tpl_vars['mur']->value->getId();?>
')">Supprimer</a></span>
				<?php }?>
			</div>
			<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
" /><input type="hidden" name="objetId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
" /><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==2||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==2)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['photo']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<div style="text-align:center; margin-bottom:5px;"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
modules/get_image.php?width=430&image=data/photos/<?php echo $_smarty_tpl->tpl_vars['photo']->value->getLocalisation();?>
" /></div>
				<div style="text-align:center; font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['photo']->value->getTitre();?>
</div>
			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php echo $_smarty_tpl->getSubTemplate ('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0);?>

				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
			</div>
			<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
" /><input type="hidden" name="objetId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
" /><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>
<?php }?><?php }} ?>