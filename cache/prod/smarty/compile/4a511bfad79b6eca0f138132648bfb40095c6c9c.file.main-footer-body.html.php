<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 16:06:23
         compiled from "C:\xampp\htdocs\thelia\local\modules\HookSocial\templates\frontOffice\default\main-footer-body.html" */ ?>
<?php /*%%SmartyHeaderCode:12633570baf5f285461-11286246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a511bfad79b6eca0f138132648bfb40095c6c9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\thelia\\local\\modules\\HookSocial\\templates\\frontOffice\\default\\main-footer-body.html',
      1 => 1459491142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12633570baf5f285461-11286246',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570baf5f2cad70_55963195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570baf5f2cad70_55963195')) {function content_570baf5f2cad70_55963195($_smarty_tpl) {?><ul role="presentation">
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_facebook"),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6) {?>
    <li>
        <a href="http://facebook.com/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_facebook"),$_smarty_tpl);?>
" rel="nofollow" class="facebook" data-toggle="tooltip" data-placement="top"
           title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Facebook",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
" target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-facebook fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Facebook",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_twitter"),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7) {?>
    <li>
        <a href="https://twitter.com/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_twitter"),$_smarty_tpl);?>
" rel="nofollow" class="twitter" data-toggle="tooltip" data-placement="top"
           title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Twitter",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
" target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-twitter fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Twitter",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_pinterest"),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8) {?>
    <li>
        <a href="https://www.pinterest.com/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_pinterest"),$_smarty_tpl);?>
" class="pinterest" rel="nofollow" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Pinterest",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
"
        target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-pinterest fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Pinterest",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_instagram"),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9) {?>
    <li>
        <a href="http://instagram.com/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_instagram"),$_smarty_tpl);?>
" rel="nofollow" class="instagram" data-toggle="tooltip" data-placement="top"
           title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Instagram",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
" target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-instagram fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Instagram",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_google"),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10) {?>
    <li>
        <a href="http://plus.google.com/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_google"),$_smarty_tpl);?>
" rel="nofollow" class="google-plus" data-toggle="tooltip" data-placement="top"
           title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Google+",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
" target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-google-plus fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Google+",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_youtube"),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11) {?>
    <li>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_youtube"),$_smarty_tpl);?>
" rel="nofollow" class="youtube" data-toggle="tooltip" data-placement="top"
           title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Youtube",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
" target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-youtube fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Youtube",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_rss"),$_smarty_tpl);?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12) {?>
    <li>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_rss"),$_smarty_tpl);?>
" class="rss" rel="nofollow" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"RSS",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
"
        target="_blank">
            <span class="fa-stack fa-lg">
                <span class="fa fa-circle fa-stack-2x"></span>
                <span class="fa fa-rss fa-stack-1x fa-inverse"></span>
            </span>
            <span class="visible-print"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"RSS",'d'=>"hooksocial.fo.default"),$_smarty_tpl);?>
</span>
        </a>
    </li>
    <?php }?>
</ul><?php }} ?>
