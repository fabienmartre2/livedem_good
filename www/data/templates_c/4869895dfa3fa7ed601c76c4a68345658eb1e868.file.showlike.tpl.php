<?php /* Smarty version Smarty-3.1.14, created on 2017-03-20 08:47:44
         compiled from "/home/livedem/www/templates/showlike.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188203177158cf89205016c7-06164555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4869895dfa3fa7ed601c76c4a68345658eb1e868' => 
    array (
      0 => '/home/livedem/www/templates/showlike.tpl',
      1 => 1449591567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188203177158cf89205016c7-06164555',
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
  'unifunc' => 'content_58cf8920543434_30158706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf8920543434_30158706')) {function content_58cf8920543434_30158706($_smarty_tpl) {?><div id="shadowbox">
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