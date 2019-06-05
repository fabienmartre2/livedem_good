<?php /* Smarty version Smarty-3.1.14, created on 2014-11-26 16:47:05
         compiled from "/home/dev/www/livedem/templates/menu_droit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4751984655475f5f90b75a3-53501239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fb6194e45a59fa4d90ded60b7f01182517418c9' => 
    array (
      0 => '/home/dev/www/livedem/templates/menu_droit.tpl',
      1 => 1416564799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4751984655475f5f90b75a3-53501239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ADRESSE' => 0,
    'MARQUE' => 0,
    'anniversaires' => 0,
    'data' => 0,
    'user' => 0,
    'lastusers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5475f5f91c5ca7_39171881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5475f5f91c5ca7_39171881')) {function content_5475f5f91c5ca7_39171881($_smarty_tpl) {?><div class="element">
	<div class="titre"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/titre_parrainage.jpg" title="Parrainez vos amis et voisins !" alt="Parrainez vos amis et voisins !"/></div>
	<div class="data">
		En parrainant mes amis et mes voisins, j’apporte du monde aux sorties, ce qui me rend populaire et je gagne des points ainsi que des pépètes !<br />
		<br />
		Les points me permettent d’offrir des cadeaux virtuels à d’autres membres <img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/mini_logo.png" alt="<?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
"/>, ce qui est idéal pour faire des rencontres.<br />
		<br />
		Je peux aussi convertir les pépettes que j’accumule en bons d’achats, pour acquérir gratuitement, ou acheter moinscher selon le montantde mes bons d’achats,sur des sites partenaires.<br />
		<br />
		<a href="<?php echo Config::get('facebook');?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/icon_facebook.png" alt="Facebook <?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" style="margin-right:-2px;"/></a>
		<a href="<?php echo Config::get('twitter');?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/icon_twitter.png" alt="Twitter <?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" style="margin-right:-2px;"/></a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
rss.html" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/icon_rss.png" alt="RSS <?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" style="margin-right:-2px;"/></a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
contact.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/icon_mail.png" alt="Contact <?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" style="margin-right:-2px;"/></a>
		<br /><br />
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
parrainage.html">En savoir plus sur le parrainage...</a>
	</div>
</div>
<div class="element">
	<div class="titre"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/titre_anniversaire.jpg" title="Joyeux anniversaire !" alt="Joyeux anniversaire !"/></div>
	<div class="data">
		<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/gateau.png" />
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['anniversaires']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['user']->value->getURL();?>
" class="sexe<?php echo $_smarty_tpl->tpl_vars['user']->value->getSexe();?>
" style="line-height:16px; text-decoration:none;"><b><?php echo $_smarty_tpl->tpl_vars['user']->value->getPseudo();?>
</b></a><br />
		<?php }
if (!$_smarty_tpl->tpl_vars['data']->_loop) {
?>
			<div>Il n'y a pas d'anniversaire aujourd'hui</div>
		<?php } ?>
	</div>
</div>
<div class="element">
	<div class="titre"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/titre_dernierinscrit.jpg" title="Ils sont des nôtres !" alt="Ils sont des nôtres !"/></div>
	<div class="data">
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lastusers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['user']->value->getURL();?>
" class="sexe<?php echo $_smarty_tpl->tpl_vars['user']->value->getSexe();?>
" style="line-height:16px; text-decoration:none;"><b><?php echo $_smarty_tpl->tpl_vars['user']->value->getPseudo();?>
</b></a><br />
		<?php } ?>
	</div>
</div>
<div class="element">
	<div class="titre"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/titre_fan.jpg" title="Devenez vous aussi des Fans de onVsortir" alt="Devenez vous aussi des Fans de onVsortir"/></div>
	<div class="data">
		<div class="fb-like-box" data-href="https://www.facebook.com/cocacola" data-width="115" data-height="360" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	</div>
</div><?php }} ?>