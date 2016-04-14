<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-12 12:52:32
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\HookKonfigurator\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:8876570cd370dcd020-59486158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f02a60feca0ebe79be1a7a26c151e64ef91f9dc' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460457121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8876570cd370dcd020-59486158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570cd370dd1611_24360244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570cd370dd1611_24360244')) {function content_570cd370dd1611_24360244($_smarty_tpl) {?><ul class="nav navbar-nav navbar-konfigurator navbar-right">
	<li>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"konfigurator"),$_smarty_tpl);?>
" class="konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Configurator",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</a>
	</li>
</ul><?php }} ?>
