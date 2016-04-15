<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 18:20:13
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\HookNavigation\templates\frontOffice\default\main-footer-body.html" */ ?>
<?php /*%%SmartyHeaderCode:12548570fc33d9d7659-17973656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a463dc0c3f312faa5ef2a68a2becd8cab720908' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookNavigation\\templates\\frontOffice\\default\\main-footer-body.html',
      1 => 1460457121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12548570fc33d9d7659-17973656',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bodyFolderId' => 0,
    'URL' => 0,
    'TITLE' => 0,
    'CHAPO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570fc33d9e6ae4_19214513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fc33d9e6ae4_19214513')) {function content_570fc33d9e6ae4_19214513($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"blog.articles")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"blog.articles"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<ul>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"content",'name'=>"blog.articles",'folder'=>$_smarty_tpl->tpl_vars['bodyFolderId']->value,'limit'=>3)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"content",'name'=>"blog.articles",'folder'=>$_smarty_tpl->tpl_vars['bodyFolderId']->value,'limit'=>3), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <li>
        <a href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['URL']->value,$_smarty_tpl);?>
">
            <h4 class="block-subtitle"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</h4>
            <p><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['CHAPO']->value,$_smarty_tpl);?>
</p>
        </a>
    </li>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"content",'name'=>"blog.articles",'folder'=>$_smarty_tpl->tpl_vars['bodyFolderId']->value,'limit'=>3), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</ul>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"blog.articles"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('elseloop', array('rel'=>"blog.articles")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"blog.articles"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<ul>
    <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"No articles currently",'d'=>"hooknavigation.fo.default"),$_smarty_tpl);?>
</li>
</ul>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"blog.articles"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
