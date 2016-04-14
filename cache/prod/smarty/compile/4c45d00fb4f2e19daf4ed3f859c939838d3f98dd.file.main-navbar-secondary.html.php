<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-12 12:52:32
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\HookLang\templates\frontOffice\default\main-navbar-secondary.html" */ ?>
<?php /*%%SmartyHeaderCode:11449570cd370c80004-95626946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c45d00fb4f2e19daf4ed3f859c939838d3f98dd' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookLang\\templates\\frontOffice\\default\\main-navbar-secondary.html',
      1 => 1460457121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11449570cd370c80004-95626946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOCALE' => 0,
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570cd370c8b8f2_82541663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570cd370c8b8f2_82541663')) {function content_570cd370c8b8f2_82541663($_smarty_tpl) {?><ul class="nav navbar-nav navbar-lang navbar-left">
    <li class="dropdown">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/login"),$_smarty_tpl);?>
" class="language-label dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"title"),$_smarty_tpl);?>
</a>
        <ul class="dropdown-menu">
            <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp13=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"lang",'name'=>"lang_available",'exclude'=>$_tmp13)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"lang",'name'=>"lang_available",'exclude'=>$_tmp13), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <li><a href="<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['navigate'][0][0]->navigateToUrlFunction(array('to'=>"current"),$_smarty_tpl);?>
<?php $_tmp14=ob_get_clean();?><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['LOCALE']->value,$_smarty_tpl);?>
<?php $_tmp15=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>$_tmp14,'lang'=>$_tmp15),$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"lang",'name'=>"lang_available",'exclude'=>$_tmp13), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </ul>
    </li>
</ul><?php }} ?>
