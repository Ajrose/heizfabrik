<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 15:56:53
         compiled from "C:\xampp\htdocs\thelia\local\modules\HookSearch\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:21251570bad25ccda37-95410209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83ea02677d1d251dad1244eab75dfb68c0c6d2ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\thelia\\local\\modules\\HookSearch\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1459491142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21251570bad25ccda37-95410209',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bad25cdd1e9_84719401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bad25cdd1e9_84719401')) {function content_570bad25cdd1e9_84719401($_smarty_tpl) {?><div class="search-container navbar-form navbar-left">
    <form id="form-search" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/search"),$_smarty_tpl);?>
" method="get" role="search" aria-labelledby="search-label">
        <label id="search-label" class="sr-only" for="q"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Search a product",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
</label>
        <input type="search" name="q" id="q" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Search...",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
" class="form-control" autocomplete="off" aria-required="true" required pattern=".{2,}" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Minimum 2 characters.",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
">
        
    </form>
</div><?php }} ?>
