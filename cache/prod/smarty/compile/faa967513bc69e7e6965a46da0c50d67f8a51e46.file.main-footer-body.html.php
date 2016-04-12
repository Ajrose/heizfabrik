<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 20:18:53
         compiled from "C:\xampp\htdocs\heizfabrik\local\modules\HookSocial\templates\frontOffice\default\main-footer-body.html" */ ?>
<?php /*%%SmartyHeaderCode:5555570bea8d601e36-91101042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faa967513bc69e7e6965a46da0c50d67f8a51e46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookSocial\\templates\\frontOffice\\default\\main-footer-body.html',
      1 => 1460385118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5555570bea8d601e36-91101042',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bea8d649c98_42462503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bea8d649c98_42462503')) {function content_570bea8d649c98_42462503($_smarty_tpl) {?><ul role="presentation">
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"hooksocial_facebook"),$_smarty_tpl);?>
<?php $_tmp28=ob_get_clean();?><?php if ($_tmp28) {?>
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
<?php $_tmp29=ob_get_clean();?><?php if ($_tmp29) {?>
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
<?php $_tmp30=ob_get_clean();?><?php if ($_tmp30) {?>
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
<?php $_tmp31=ob_get_clean();?><?php if ($_tmp31) {?>
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
<?php $_tmp32=ob_get_clean();?><?php if ($_tmp32) {?>
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
<?php $_tmp33=ob_get_clean();?><?php if ($_tmp33) {?>
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
<?php $_tmp34=ob_get_clean();?><?php if ($_tmp34) {?>
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
