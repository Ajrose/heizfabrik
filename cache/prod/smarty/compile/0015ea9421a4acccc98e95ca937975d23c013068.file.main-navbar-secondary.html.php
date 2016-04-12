<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 20:18:52
         compiled from "C:\xampp\htdocs\heizfabrik\local\modules\HookKonfigurator\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:13763570bea8c449cd2-55154313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0015ea9421a4acccc98e95ca937975d23c013068' => 
    array (
      0 => 'C:\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460385118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13763570bea8c449cd2-55154313',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bea8c44fdd0_83611156',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bea8c44fdd0_83611156')) {function content_570bea8c44fdd0_83611156($_smarty_tpl) {?><ul class="nav navbar-nav navbar-konfigurator navbar-right">
	<li>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"konfigurator"),$_smarty_tpl);?>
" class="konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Configurator",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</a>
	</li>
</ul><?php }} ?>
