<?php /* Smarty version Smarty-3.1.14, created on 2014-12-04 09:58:46
         compiled from "/home/dev/www/livedem/templates/showlike.tpl" */ ?>
<?php /*%%SmartyHeaderCode:421924720548022460a8654-93385991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91bbd23da4ea9b165870ef66c69ac4eaf5ab1d4d' => 
    array (
      0 => '/home/dev/www/livedem/templates/showlike.tpl',
      1 => 1417430264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '421924720548022460a8654-93385991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ADRESSE' => 0,
    'utilisateurs' => 0,
    'data' => 0,
    'utilisateur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5480224610f026_10923494',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480224610f026_10923494')) {function content_5480224610f026_10923494($_smarty_tpl) {?><div id="shadowbox">
	<div id="box" class="window">
		<div class="close"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/close_box.png"  title="Fermer la fenêtre" alt="X" /></div>
		<div id="showlike">
			<div id="contenu">
				<table>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['utilisateurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</td>
				</tr>
				<?php }
if (!$_smarty_tpl->tpl_vars['data']->_loop) {
?>
				<tr>
					<td colspan="2" style="text-align:center;">Cette publication n'a pas encore reçu de J'aime</td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div><?php }} ?>