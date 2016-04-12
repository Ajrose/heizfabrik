<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 15:56:54
         compiled from "C:\xampp\htdocs\thelia\local\modules\HookKonfigurator\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:28857570bad2601dbe9-54126651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bffbef915775828292a409b0cd52a205141d16df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\thelia\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460130540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28857570bad2601dbe9-54126651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bad26023e43_27333355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bad26023e43_27333355')) {function content_570bad26023e43_27333355($_smarty_tpl) {?><ul class="nav navbar-nav navbar-konfigurator navbar-right">
	<li>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"konfigurator"),$_smarty_tpl);?>
" class="konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Configurator",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</a>
	</li>
</ul><?php }} ?>
