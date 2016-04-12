<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 20:18:53
         compiled from "C:\xampp\htdocs\heizfabrik\templates\frontOffice\default\misc\breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1942570bea8d246533-08384885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18d31d937527be5eb5df779a9923a68f2eeef3c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\misc\\breadcrumb.tpl',
      1 => 1460385125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1942570bea8d246533-08384885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'breadcrumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bea8d263cf7_92294551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bea8d263cf7_92294551')) {function content_570bea8d263cf7_92294551($_smarty_tpl) {?><nav class="nav-breadcrumb" role="navigation" aria-labelledby="breadcrumb-label">
    <strong id="breadcrumb-label" class="sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"You are here:"),$_smarty_tpl);?>
</strong>
    <ul class="breadcrumb" itemprop="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['navigate'][0][0]->navigateToUrlFunction(array('to'=>"index"),$_smarty_tpl);?>
" itemprop="url"><span itemprop="title"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Home"),$_smarty_tpl);?>
</span></a></li>

        <?php  $_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['breadcrumb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['breadcrumb']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->key => $_smarty_tpl->tpl_vars['breadcrumb']->value) {
$_smarty_tpl->tpl_vars['breadcrumb']->_loop = true;
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration++;
 $_smarty_tpl->tpl_vars['breadcrumb']->last = $_smarty_tpl->tpl_vars['breadcrumb']->iteration === $_smarty_tpl->tpl_vars['breadcrumb']->total;
?>
        <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value['title']) {?>
            <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->last) {?>
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><span itemprop="title"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(htmlspecialchars_decode($_smarty_tpl->tpl_vars['breadcrumb']->value['title'], ENT_QUOTES),$_smarty_tpl);?>
</span></li>
            <?php } else { ?>
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['breadcrumb']->value['url'])===null||$tmp==='' ? '#' : $tmp);?>
"  title="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(htmlspecialchars_decode($_smarty_tpl->tpl_vars['breadcrumb']->value['title'], ENT_QUOTES),$_smarty_tpl);?>
" itemprop="url"><span itemprop="title"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(htmlspecialchars_decode($_smarty_tpl->tpl_vars['breadcrumb']->value['title'], ENT_QUOTES),$_smarty_tpl);?>
</span></a></li>
            <?php }?>
        <?php }?>
        <?php } ?>
    </ul>
</nav><!-- /.nav-breadcrumb -->
<?php }} ?>
