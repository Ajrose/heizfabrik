<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 16:06:22
         compiled from "C:\xampp\htdocs\thelia\local\modules\HookContact\templates\frontOffice\default\main-footer-body.html" */ ?>
<?php /*%%SmartyHeaderCode:11357570baf5ee54e03-21906750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0285ab61a60a3342fae3431464a9316ab4cd1209' => 
    array (
      0 => 'C:\\xampp\\htdocs\\thelia\\local\\modules\\HookContact\\templates\\frontOffice\\default\\main-footer-body.html',
      1 => 1459491142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11357570baf5ee54e03-21906750',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'store_name' => 0,
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570baf5eea7729_25744221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570baf5eea7729_25744221')) {function content_570baf5eea7729_25744221($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mailto')) include 'C:\\xampp\\htdocs\\thelia\\core\\vendor\\smarty\\smarty\\libs\\plugins\\function.mailto.php';
?><div itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
">
    <ul>
        <li class="contact-address">
            <address class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <span class="street-address" itemprop="streetAddress"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_address1"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_address2"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_address3"),$_smarty_tpl);?>
</span><br>
                <span class="postal-code" itemprop="postalCode"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_zipcode"),$_smarty_tpl);?>
</span>
                <span class="locality" itemprop="addressLocality">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_city"),$_smarty_tpl);?>

                    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_country"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1) {?>
                        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_country"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"country",'name'=>"address.country.title",'id'=>$_tmp2)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"country",'name'=>"address.country.title",'id'=>$_tmp2), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
, <span class="country-name"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</span><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"country",'name'=>"address.country.title",'id'=>$_tmp2), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php }?>
                </span>
            </address>
        </li>
        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_phone"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3) {?>
        <li class="contact-phone">
            <a href="tel:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_phone"),$_smarty_tpl);?>
" class="tel" itemprop="telephone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_phone"),$_smarty_tpl);?>
</a>
        </li>
        <?php }?>
        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_email"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4) {?>
        <li class="contact-email">
            <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_email"),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_mailto(array('address'=>$_tmp5,'encode'=>"hex",'extra'=>'class="email" itemprop="email"'),$_smarty_tpl);?>

        </li>
        <?php }?>
    </ul>
</div>
<?php }} ?>
