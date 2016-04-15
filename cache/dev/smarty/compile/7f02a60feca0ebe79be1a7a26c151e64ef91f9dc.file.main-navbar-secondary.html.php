<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-15 12:32:40
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\HookKonfigurator\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:107735710c348139666-39204214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f02a60feca0ebe79be1a7a26c151e64ef91f9dc' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460715003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107735710c348139666-39204214',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5710c34813e213_54991746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5710c34813e213_54991746')) {function content_5710c34813e213_54991746($_smarty_tpl) {?><ul class="nav navbar-nav navbar-konfigurator navbar-right">
	<li>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"konfigurator"),$_smarty_tpl);?>
" class="konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Configurator",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</a>
	</li>
</ul><?php }} ?>
