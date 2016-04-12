<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-12 10:11:44
         compiled from "C:\xampp\htdocs\heizfabrik\local\modules\HookLinks\templates\frontOffice\default\main-footer-body.html" */ ?>
<?php /*%%SmartyHeaderCode:17132570cadc05440f4-84370377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '813075f2985e1bed3e76359eb3232753f0c3f3f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookLinks\\templates\\frontOffice\\default\\main-footer-body.html',
      1 => 1460385118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17132570cadc05440f4-84370377',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570cadc0575b33_18773737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570cadc0575b33_18773737')) {function content_570cadc0575b33_18773737($_smarty_tpl) {?><ul>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"footer_links",'type'=>"content",'folder'=>"2")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"footer_links",'type'=>"content",'folder'=>"2"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <li><a href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['URL']->value,$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</a></li>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"footer_links",'type'=>"content",'folder'=>"2"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"auth",'name'=>"customer_is_logged",'role'=>"CUSTOMER")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"auth",'name'=>"customer_is_logged",'role'=>"CUSTOMER"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/logout"),$_smarty_tpl);?>
" class="logout"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Log out!",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/account"),$_smarty_tpl);?>
" class="account"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"My Account",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"auth",'name'=>"customer_is_logged",'role'=>"CUSTOMER"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('elseloop', array('rel'=>"customer_is_logged")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"customer_is_logged"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/login"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Login",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/register"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Register",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"customer_is_logged"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/cart"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Cart",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/order/delivery"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Checkout",'d'=>"hooklinks.fo.default"),$_smarty_tpl);?>
</a></li>
</ul><?php }} ?>
