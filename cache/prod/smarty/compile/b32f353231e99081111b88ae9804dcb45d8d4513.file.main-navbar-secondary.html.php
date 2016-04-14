<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-12 12:52:32
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\HookSearch\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:6398570cd370ca49b3-26317768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b32f353231e99081111b88ae9804dcb45d8d4513' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookSearch\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460457121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6398570cd370ca49b3-26317768',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570cd370cb2778_33377455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570cd370cb2778_33377455')) {function content_570cd370cb2778_33377455($_smarty_tpl) {?><div class="search-container navbar-form navbar-left">
    <form id="form-search" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/search"),$_smarty_tpl);?>
" method="get" role="search" aria-labelledby="search-label">
        <label id="search-label" class="sr-only" for="q"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Search a product",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
</label>
        <input type="search" name="q" id="q" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Search...",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
" class="form-control" autocomplete="off" aria-required="true" required pattern=".{2,}" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Minimum 2 characters.",'d'=>"hooksearch.fo.default"),$_smarty_tpl);?>
">
        
    </form>
</div><?php }} ?>
