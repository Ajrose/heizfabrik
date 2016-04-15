<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:39:46
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\product.html" */ ?>
<?php /*%%SmartyHeaderCode:10511570fd5e297a5c2-35997120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b3870a6cd2b841dfb7cde131b567469e9ed5596' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\product.html',
      1 => 1460457122,
      2 => 'file',
    ),
    'b53d6f326a654ceb772f9626399e1f61a9876432' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\layout.tpl',
      1 => 1460457122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10511570fd5e297a5c2-35997120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'store_name' => 0,
    'store_description' => 0,
    'lang_code' => 0,
    'page_title' => 0,
    'breadcrumbs' => 0,
    'breadcrumb' => 0,
    'page_description' => 0,
    'asset_url' => 0,
    'lang_locale' => 0,
    'id' => 0,
    'class' => 0,
    'title' => 0,
    'content' => 0,
    'folder_information' => 0,
    'URL' => 0,
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570fd5e2cb2c91_78328851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd5e2cb2c91_78328851')) {function content_570fd5e2cb2c91_78328851($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php';
?><!doctype html>
<!--
 ______   __  __     ______     __         __     ______
/\__  _\ /\ \_\ \   /\  ___\   /\ \       /\ \   /\  __ \
\/_/\ \/ \ \  __ \  \ \  __\   \ \ \____  \ \ \  \ \  __ \
   \ \_\  \ \_\ \_\  \ \_____\  \ \_____\  \ \_\  \ \_\ \_\
    \/_/   \/_/\/_/   \/_____/   \/_____/   \/_/   \/_/\/_/


Copyright (c) OpenStudio
email : info@thelia.net
web : http://www.thelia.net

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the
GNU General Public License : http://www.gnu.org/licenses/
-->


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['declare_assets'][0][0]->declareAssets(array('directory'=>'assets/dist'),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['default_translation_domain'][0][0]->setDefaultTranslationDomain(array('domain'=>'fo.default'),$_smarty_tpl);?>



<?php  $_config = new Smarty_Internal_Config('variables.conf', $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>

    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['product'][0][0]->productDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_variable($_tmp1, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['pse_count'] = new Smarty_variable(1, null, 0);?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['product'][0][0]->productDataAccess(array('attr'=>"virtual"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['product_virtual'] = new Smarty_variable($_tmp2, null, 0);?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"check-available-stock",'default'=>"1"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['check_availability'] = new Smarty_variable($_tmp3, null, 0);?>


    <?php $_smarty_tpl->tpl_vars['breadcrumbs'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"product",'name'=>"product_breadcrumb",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"product_breadcrumb",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category_path",'type'=>"category-path",'category'=>((string)$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category_path",'type'=>"category-path",'category'=>((string)$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('breadcrumbs', null, 0);
$_smarty_tpl->tpl_vars['breadcrumbs']->value[] = array('title'=>$_tmp4,'url'=>$_tmp5);?>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category_path",'type'=>"category-path",'category'=>((string)$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('breadcrumbs', null, 0);
$_smarty_tpl->tpl_vars['breadcrumbs']->value[] = array('title'=>$_tmp6,'url'=>$_tmp7);?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"product_breadcrumb",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"product.seo.title",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.seo.title",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['META_TITLE']->value,$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['page_title'] = new Smarty_variable($_tmp8, null, 0);?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.seo.title",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_name"),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp9, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_description"),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp10, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"code"),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_code"] = new Smarty_variable($_tmp11, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"locale"),$_smarty_tpl);?>
<?php $_tmp12=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_locale"] = new Smarty_variable($_tmp12, null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['store_name']->value) {?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Thelia V2'),$_smarty_tpl);?>
<?php $_tmp13=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp13, null, 0);?><?php }?>
<?php if (!$_smarty_tpl->tpl_vars['store_description']->value) {?><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
<?php $_tmp14=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp14, null, 0);?><?php }?>


<!--[if lt IE 7 ]><html class="no-js oldie ie6" lang="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['lang_code']->value,$_smarty_tpl);?>
"> <![endif]-->
<!--[if IE 7 ]><html class="no-js oldie ie7" lang="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['lang_code']->value,$_smarty_tpl);?>
"> <![endif]-->
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['lang_code']->value,$_smarty_tpl);?>
"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['lang_code']->value,$_smarty_tpl);?>
" class="no-js"> <!--<![endif]-->
<head>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.head-top"),$_smarty_tpl);?>

    
    <script>(function(H) { H.className=H.className.replace(/\bno-js\b/,'js') } )(document.documentElement);</script>

    <meta charset="utf-8">

    
    <title><?php if ($_smarty_tpl->tpl_vars['page_title']->value) {?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['page_title']->value,$_smarty_tpl);?>
<?php } elseif ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {?><?php  $_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['breadcrumb']->_loop = false;
 $_from = array_reverse($_smarty_tpl->tpl_vars['breadcrumbs']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->key => $_smarty_tpl->tpl_vars['breadcrumb']->value) {
$_smarty_tpl->tpl_vars['breadcrumb']->_loop = true;
?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(htmlspecialchars_decode($_smarty_tpl->tpl_vars['breadcrumb']->value['title'], ENT_QUOTES),$_smarty_tpl);?>
 - <?php } ?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
<?php } else { ?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
<?php }?></title>

    
    <meta name="generator" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Thelia V2'),$_smarty_tpl);?>
">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"product.seo.meta",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.seo.meta",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php echo $_smarty_tpl->getSubTemplate ("includes/meta-seo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.seo.meta",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



    <?php $_smarty_tpl->smarty->_tag_stack[] = array('stylesheets', array('file'=>'assets/dist/css/thelia.min.css')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <link rel="stylesheet" href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
">
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.stylesheet"),$_smarty_tpl);?>


    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.stylesheet"),$_smarty_tpl);?>



    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->functionImage(array('file'=>'assets/dist/img/favicon.ico'),$_smarty_tpl);?>
">
    <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->functionImage(array('file'=>'assets/dist/img/favicon.png'),$_smarty_tpl);?>
" />

    
    <link rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'All products'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/feed/catalog/%lang",'lang'=>$_smarty_tpl->tpl_vars['lang_locale']->value),$_smarty_tpl);?>
" />
    <link rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'All contents'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/feed/content/%lang",'lang'=>$_smarty_tpl->tpl_vars['lang_locale']->value),$_smarty_tpl);?>
" />
    <link rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'All brands'),$_smarty_tpl);?>
"   href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/feed/brand/%lang",'lang'=>$_smarty_tpl->tpl_vars['lang_locale']->value),$_smarty_tpl);?>
" />
    

    
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('javascripts', array('file'=>"assets/dist/js/vendors/html5shiv.min.js")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/html5shiv.min.js"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <script>window.html5 || document.write('<script src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
"><\/script>');</script>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/html5shiv.min.js"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('javascripts', array('file'=>"assets/dist/js/vendors/respond.min.js")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/respond.min.js"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <script>window.respond || document.write('<script src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
"><\/script>');</script>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/respond.min.js"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <![endif]-->

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.head-bottom"),$_smarty_tpl);?>

</head>
<body class="page-product" itemscope itemtype="http://schema.org/WebPage">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.body-top"),$_smarty_tpl);?>


    <!-- Accessibility -->
    <a class="sr-only" href="#content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Skip to content"),$_smarty_tpl);?>
</a>

    <div class="page" role="document">

        <div class="header-container" itemscope itemtype="http://schema.org/WPHeader">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.header-top"),$_smarty_tpl);?>

            <div class="navbar navbar-default navbar-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <div class="container">

                    <div class="navbar-header">
                        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-secondary">
                            <span class="sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Toggle navigation"),$_smarty_tpl);?>
</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['navigate'][0][0]->navigateToUrlFunction(array('to'=>"index"),$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
</a>
                    </div>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"main.navbar-secondary")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.navbar-secondary"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        
                        <nav class="navbar-collapse collapse nav-secondary" role="navigation" aria-label="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Secondary Navigation"),$_smarty_tpl);?>
">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.navbar-secondary"),$_smarty_tpl);?>

                        </nav>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.navbar-secondary"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            </div>


            <header class="container" role="banner">
                <div class="header row">
                    <h1 class="logo container hidden-xs">
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['navigate'][0][0]->navigateToUrlFunction(array('to'=>"index"),$_smarty_tpl);?>
" title="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
">
                            <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->functionImage(array('file'=>'assets/dist/img/logo.gif'),$_smarty_tpl);?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
">
                        </a>
                    </h1>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.navbar-primary"),$_smarty_tpl);?>

                </div>
            </header><!-- /.header -->

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.header-bottom"),$_smarty_tpl);?>

        </div><!-- /.header-container -->

        <main class="main-container" role="main">
            <div class="container">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.content-top"),$_smarty_tpl);?>

                <?php echo $_smarty_tpl->getSubTemplate ("misc/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <div id="content">
    <?php if ($_smarty_tpl->tpl_vars['product_id']->value) {?>
    <div class="main">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"product.details",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1",'with_prev_next_visible'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.details",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1",'with_prev_next_visible'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <article id="product" class="col-main row" role="main" itemscope itemtype="http://schema.org/Product">

            <?php $_smarty_tpl->tpl_vars['pse_count'] = new Smarty_variable($_smarty_tpl->tpl_vars['PSE_COUNT']->value, null, 0);?>

            
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"brand.feature",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand.feature",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <meta itemprop="brand" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
">
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand.feature",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.top",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)),$_smarty_tpl);?>


            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"product.gallery")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"product.gallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

               <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.gallery",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)),$_smarty_tpl);?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"product.gallery"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('elsehook', array('rel'=>"product.gallery")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"product.gallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <section id="product-gallery" class="col-sm-6">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"image.main")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.main"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <figure class="product-image">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"image",'name'=>"image.main",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.main",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
" class="img-responsive" itemprop="image" data-toggle="magnify">
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.main",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </figure>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.main"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"image.carousel")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carousel"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <div id="product-thumbnails" class="carousel slide" style="position:relative;">
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="list-inline">
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"image.carousel",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"5")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"image.carousel",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"5"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" class="thumbnail <?php if ($_smarty_tpl->tpl_vars['LOOP_COUNT']->value==1) {?>active<?php }?>">
                                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"image",'name'=>"image.thumbs",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.thumbs",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                            <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
">
                                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.thumbs",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                    </a>
                                </li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"image.carousel",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'limit'=>"5"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </ul>
                        </div>
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"image.carouselsup")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carouselsup"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <div class="item">
                            <ul class="list-inline">
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"image.carouselsup",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'offset'=>"5")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"image.carouselsup",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'offset'=>"5"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" class="thumbnail">
                                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"image",'name'=>"image.thumbssup",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.thumbssup",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                                <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
">
                                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"image",'name'=>"image.thumbssup",'id'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>((string)$_smarty_tpl->tpl_vars['OBJECT_ID']->value),'width'=>"118",'height'=>"85",'resize_mode'=>"borders"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                        </a>
                                    </li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"image.carouselsup",'type'=>"image",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'width'=>"560",'height'=>"445",'resize_mode'=>"borders",'offset'=>"5"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </ul>
                        </div>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carouselsup"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </div>
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"image.carouselsup")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carouselsup"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <a class="left carousel-control" href="#product-thumbnails" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                        <a class="right carousel-control" href="#product-thumbnails" data-slide="next"><i class="fa fa-caret-right"></i></a>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carouselsup"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"image.carousel"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </section>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"product.gallery"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <section id="product-details" class="col-sm-6">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.details-top",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)),$_smarty_tpl);?>


                <div class="product-info">
                    <h1 class="name"><span itemprop="name"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</span><span id="pse-name" class="pse-name"></span></h1>
                    <?php if ($_smarty_tpl->tpl_vars['REF']->value) {?><span itemprop="sku" class="sku"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Ref.'),$_smarty_tpl);?>
: <span id="pse-ref"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['REF']->value,$_smarty_tpl);?>
</span></span><?php }?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <p><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"More information about this brand"),$_smarty_tpl);?>
"><span itemprop="brand"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</span></a></p>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    <?php if ($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value) {?><div class="short-description">
                        <p><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value,$_smarty_tpl);?>
</p>
                    </div><?php }?>
                </div>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"sale",'name'=>"product-sale-info",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'active'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"sale",'name'=>"product-sale-info",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'active'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <div class="product-promo">
                        <p class="sale-label"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['SALE_LABEL']->value,$_smarty_tpl);?>
</p>
                        <p class="sale-saving"> <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['PRICE_OFFSET_VALUE']->value,$_smarty_tpl);?>
<?php $_tmp15=ob_get_clean();?><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['PRICE_OFFSET_SYMBOL']->value,$_smarty_tpl);?>
<?php $_tmp16=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Save %amount%sign on this product",'amount'=>$_tmp15,'sign'=>$_tmp16),$_smarty_tpl);?>
</p>
                        <?php if ($_smarty_tpl->tpl_vars['HAS_END_DATE']->value) {?>
                            <p class="sale-period"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->formatDate(array('date'=>$_smarty_tpl->tpl_vars['END_DATE']->value,'output'=>"date"),$_smarty_tpl);?>
<?php $_tmp17=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"This offer is valid until %date",'date'=>$_tmp17),$_smarty_tpl);?>
</p>
                        <?php }?>
                    </div>
                 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"sale",'name'=>"product-sale-info",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'active'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <div class="availability">
                        <span class="availibity-label sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Availability"),$_smarty_tpl);?>
: </span>
                        <span itemprop="availability" href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['current_stock_href']->value,$_smarty_tpl);?>
" class="" id="pse-availability">
                            <span class="in"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'In Stock'),$_smarty_tpl);?>
</span>
                            <span class="out"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Out of Stock'),$_smarty_tpl);?>
</span>
                        </span>
                    </div>

                    <div class="price-container">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"category",'name'=>"category_tag",'id'=>$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"category",'name'=>"category_tag",'id'=>$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <meta itemprop="category" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
">
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"category",'name'=>"category_tag",'id'=>$_smarty_tpl->tpl_vars['DEFAULT_CATEGORY']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        
                        <meta itemprop="itemCondition" itemscope itemtype="http://schema.org/NewCondition">
                        
                        <meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
">

                        <span id="pse-promo">
                            <span class="special-price"><span itemprop="price" class="price-label"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Special Price:"),$_smarty_tpl);?>
 </span><span id="pse-price" class="price"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp18=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['TAXED_PROMO_PRICE']->value,'symbol'=>$_tmp18),$_smarty_tpl);?>
</span></span>
                            <?php if ($_smarty_tpl->tpl_vars['SHOW_ORIGINAL_PRICE']->value) {?>
                                <span class="old-price"><span class="price-label"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Regular Price:"),$_smarty_tpl);?>
 </span><span id="pse-price-old" class="price"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp19=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['TAXED_PRICE']->value,'symbol'=>$_tmp19),$_smarty_tpl);?>
</span></span>
                            <?php }?>
                        </span>
                    </div>

                    <div id="pse-validity" class="validity alert alert-warning" style="display: none;" >
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Sorry but this combination does not exist."),$_smarty_tpl);?>

                    </div>

                </div>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"thelia.cart.add")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"thelia.cart.add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <form id="form-product-details" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/cart/add"),$_smarty_tpl);?>
" method="post" class="form-product">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_hidden_fields'][0][0]->renderHiddenFormField(array(),$_smarty_tpl);?>

                    <input type="hidden" name="view" value="product">
                    <input type="hidden" name="product_id" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"append")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"append"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <input type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="1">
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"append"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    <?php if ($_smarty_tpl->tpl_vars['form_error']->value) {?><div class="alert alert-error"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['form_error_message']->value,$_smarty_tpl);?>
</div><?php }?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"product")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"product"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <input id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
 >
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"product"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>'product_sale_elements_id')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'product_sale_elements_id'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <input id="pse-id" class="pse-id" type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['PRODUCT_SALE_ELEMENT']->value,$_smarty_tpl);?>
" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
 >
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'product_sale_elements_id'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    <?php if ($_smarty_tpl->tpl_vars['pse_count']->value>1) {?>
                        
                        <fieldset id="pse-options" class="product-options">
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"attributes",'type'=>"attribute",'product'=>((string)$_smarty_tpl->tpl_vars['product_id']->value),'order'=>"manual")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"attributes",'type'=>"attribute",'product'=>((string)$_smarty_tpl->tpl_vars['product_id']->value),'order'=>"manual"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <div class="option option-option">
                                <label for="option-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
" class="option-heading"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</label>
                                <div class="option-content clearfix">
                                    <select id="option-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
" name="option-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
" class="form-control input-sm pse-option" data-attribute="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
"></select>
                                </div>
                            </div>
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"attributes",'type'=>"attribute",'product'=>((string)$_smarty_tpl->tpl_vars['product_id']->value),'order'=>"manual"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            <div class="option option-fallback">
                                <label for="option-fallback" class="option-heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Options"),$_smarty_tpl);?>
</label>
                                <div class="option-content clearfix">
                                    <select id="option-fallback" name="option-fallback" class="form-control input-sm pse-option pse-fallback" data-attribute="0"></select>
                                </div>
                            </div>
                        </fieldset>


                    <?php }?>

                    <fieldset class="product-cart form-inline">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>'quantity')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'quantity'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <div class="form-group group-qty <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>has-error<?php } elseif ($_smarty_tpl->tpl_vars['value']->value!=''&&!$_smarty_tpl->tpl_vars['error']->value) {?>has-success<?php }?>">
                            <label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label']->value,$_smarty_tpl);?>
</label>
                            <input type="number" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" class="form-control" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_smarty_tpl->tpl_vars['value']->value)===null||$tmp==='' ? 1 : $tmp),$_smarty_tpl);?>
" min="1" required>
                            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
                                <span class="help-block"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['message']->value,$_smarty_tpl);?>
</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['value']->value!=''&&!$_smarty_tpl->tpl_vars['error']->value) {?>
                                <span class="help-block"><i class="fa fa-check"></i></span>
                            <?php }?>
                        </div>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'quantity'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <div class="form-group group-btn">
                            <button id="pse-submit" type="submit" class="btn btn_add_to_cart btn-primary"><i class="fa fa-chevron-right"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Add to cart"),$_smarty_tpl);?>
</button>
                        </div>
                    </fieldset>

                </form>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"thelia.cart.add"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.details-bottom",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)),$_smarty_tpl);?>

            </section>

            <?php $_smarty_tpl->_capture_stack[0][] = array("additional", null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"feature_info")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"feature_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<ul><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"feature_info",'type'=>"feature",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"feature_info",'type'=>"feature",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"feature_value_info")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"feature_value_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<li><strong><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</strong> :<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['product'][0][0]->productDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp20=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"feature_value_info",'type'=>"feature_value",'feature'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>$_tmp20)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"feature_value_info",'type'=>"feature_value",'feature'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>$_tmp20), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php if ($_smarty_tpl->tpl_vars['LOOP_COUNT']->value>1) {?>, <?php } else { ?> <?php }?><span><?php if ($_smarty_tpl->tpl_vars['IS_FREE_TEXT']->value==1) {?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['FREE_TEXT_VALUE']->value,$_smarty_tpl);?>
<?php } else { ?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
<?php }?></span><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"feature_value_info",'type'=>"feature_value",'feature'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'product'=>$_tmp20), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</li><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"feature_value_info"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"feature_info",'type'=>"feature",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</ul><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"feature_info"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

            <?php $_smarty_tpl->_capture_stack[0][] = array("brand_info", null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<p><strong><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</a></strong></p><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['LOGO_IMAGE_ID']->value,$_smarty_tpl);?>
<?php $_tmp21=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"brand.image",'type'=>"image",'source'=>"brand",'id'=>$_tmp21,'width'=>218,'height'=>146,'resize_mode'=>"borders")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand.image",'type'=>"image",'source'=>"brand",'id'=>$_tmp21,'width'=>218,'height'=>146,'resize_mode'=>"borders"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<p><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
"></a></p><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand.image",'type'=>"image",'source'=>"brand",'id'=>$_tmp21,'width'=>218,'height'=>146,'resize_mode'=>"borders"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php if ($_smarty_tpl->tpl_vars['CHAPO']->value) {?><div class="chapo"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['CHAPO']->value,$_smarty_tpl);?>
</div><?php }?><?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value) {?><div class="description"><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</div><?php }?><?php if ($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value) {?><small class="postscriptum"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value,$_smarty_tpl);?>
</small><?php }?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"brand_info",'type'=>"brand",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value),'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

            <section id="product-tabs" class="col-sm-12">
                <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['product'][0][0]->productDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp22=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hookblock', array('name'=>"product.additional",'product'=>$_tmp22,'fields'=>"id,class,title,content")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['hookblock'][0][0]->processHookBlock(array('name'=>"product.additional",'product'=>$_tmp22,'fields'=>"id,class,title,content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="active" role="presentation"><a id="tab1" href="#description" data-toggle="tab" role="tab"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Description"),$_smarty_tpl);?>
</a></li>
                    <?php if (Smarty::$_smarty_vars['capture']['additional']!='') {?><li role="presentation"><a id="tab2" href="#additional" data-toggle="tab" role="tab"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Additional Info"),$_smarty_tpl);?>
</a></li><?php }?>
                    <?php if (Smarty::$_smarty_vars['capture']['brand_info']!='') {?><li role="presentation"><a id="tab3" href="#brand_info" data-toggle="tab" role="tab"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Brand information"),$_smarty_tpl);?>
</a></li><?php }?>
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('forhook', array('rel'=>"product.additional")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"product.additional"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li role="presentation"><a id="tab<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl);?>
" href="#<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl);?>
" data-toggle="tab" role="tab"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['title']->value,$_smarty_tpl);?>
</a></li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"product.additional"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in" id="description" itemprop="description" role="tabpanel" aria-labelledby="tab1">
                        <p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['DESCRIPTION']->value)===null||$tmp==='' ? 'N/A' : $tmp);?>
</p>
                    </div>
                    <?php if (Smarty::$_smarty_vars['capture']['additional']!='') {?>
                        <div class="tab-pane" id="additional" role="tabpanel" aria-labelledby="tab2">
                            <?php echo Smarty::$_smarty_vars['capture']['additional'];?>

                        </div>
                    <?php }?>
                    <?php if (Smarty::$_smarty_vars['capture']['brand_info']!='') {?>
                        <div class="tab-pane" id="brand_info" role="tabpanel" aria-labelledby="tab3">
                            <?php echo Smarty::$_smarty_vars['capture']['brand_info'];?>

                        </div>
                    <?php }?>
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('forhook', array('rel'=>"product.additional")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"product.additional"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <div class="tab-pane" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl);?>
" role="tabpanel" aria-labelledby="tab<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl);?>
">
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    </div>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"product.additional"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['hookblock'][0][0]->processHookBlock(array('name'=>"product.additional",'product'=>$_tmp22,'fields'=>"id,class,title,content"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </section>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.bottom",'product'=>((string)$_smarty_tpl->tpl_vars['ID']->value)),$_smarty_tpl);?>



<?php $_smarty_tpl->tpl_vars['pse'] = new Smarty_variable(array(), null, 0);?>
<?php $_smarty_tpl->tpl_vars['combination_label'] = new Smarty_variable(array(), null, 0);?>
<?php $_smarty_tpl->tpl_vars['combination_values'] = new Smarty_variable(array(), null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['product'][0][0]->productDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp23=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"pse",'type'=>"product_sale_elements",'product'=>$_tmp23)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"pse",'type'=>"product_sale_elements",'product'=>$_tmp23), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['QUANTITY']->value,$_smarty_tpl);?>
<?php $_tmp24=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp25=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['TAXED_PRICE']->value,'symbol'=>$_tmp25),$_smarty_tpl);?>
<?php $_tmp26=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp27=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['TAXED_PROMO_PRICE']->value,'symbol'=>$_tmp27),$_smarty_tpl);?>
<?php $_tmp28=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('pse', null, 0);
$_smarty_tpl->tpl_vars['pse']->value[$_smarty_tpl->tpl_vars['ID']->value] = array("id"=>$_smarty_tpl->tpl_vars['ID']->value,"isDefault"=>$_smarty_tpl->tpl_vars['IS_DEFAULT']->value,"isPromo"=>$_smarty_tpl->tpl_vars['IS_PROMO']->value,"isNew"=>$_smarty_tpl->tpl_vars['IS_NEW']->value,"ref"=>((string)$_smarty_tpl->tpl_vars['REF']->value),"ean"=>((string)$_smarty_tpl->tpl_vars['EAN']->value),"quantity"=>$_tmp24,"price"=>$_tmp26,"promo"=>$_tmp28);?>
    <?php $_smarty_tpl->tpl_vars['pse_combination'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"combi",'type'=>"attribute_combination",'product_sale_elements'=>((string)$_smarty_tpl->tpl_vars['ID']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"combi",'type'=>"attribute_combination",'product_sale_elements'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php if (!$_smarty_tpl->tpl_vars['combination_label']->value[$_smarty_tpl->tpl_vars['ATTRIBUTE_ID']->value]) {?>
            <?php $_smarty_tpl->createLocalArrayVariable('combination_label', null, 0);
$_smarty_tpl->tpl_vars['combination_label']->value[$_smarty_tpl->tpl_vars['ATTRIBUTE_ID']->value] = array("name"=>((string)$_smarty_tpl->tpl_vars['ATTRIBUTE_TITLE']->value),"values"=>array());?>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['combination_values']->value[$_smarty_tpl->tpl_vars['ATTRIBUTE_AVAILABILITY_ID']->value]) {?>
            <?php $_smarty_tpl->createLocalArrayVariable('combination_label', null, 0);
$_smarty_tpl->tpl_vars['combination_label']->value[$_smarty_tpl->tpl_vars['ATTRIBUTE_ID']->value]["values"][] = $_smarty_tpl->tpl_vars['ATTRIBUTE_AVAILABILITY_ID']->value;?>
            <?php $_smarty_tpl->createLocalArrayVariable('combination_values', null, 0);
$_smarty_tpl->tpl_vars['combination_values']->value[$_smarty_tpl->tpl_vars['ATTRIBUTE_AVAILABILITY_ID']->value] = array(((string)$_smarty_tpl->tpl_vars['ATTRIBUTE_AVAILABILITY_TITLE']->value),$_smarty_tpl->tpl_vars['ATTRIBUTE_ID']->value);?>
        <?php }?>
        <?php $_smarty_tpl->createLocalArrayVariable('pse_combination', null, 0);
$_smarty_tpl->tpl_vars['pse_combination']->value[] = $_smarty_tpl->tpl_vars['ATTRIBUTE_AVAILABILITY_ID']->value;?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"combi",'type'=>"attribute_combination",'product_sale_elements'=>((string)$_smarty_tpl->tpl_vars['ID']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->createLocalArrayVariable('pse', null, 0);
$_smarty_tpl->tpl_vars['pse']->value[$_smarty_tpl->tpl_vars['ID']->value]["combinations"] = $_smarty_tpl->tpl_vars['pse_combination']->value;?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"pse",'type'=>"product_sale_elements",'product'=>$_tmp23), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<script type="text/javascript">
    // Product sale elements
    var PSE_FORM = true;
    var PSE_COUNT = <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['pse_count']->value,$_smarty_tpl);?>
;
    <?php if ($_smarty_tpl->tpl_vars['check_availability']->value==0||$_smarty_tpl->tpl_vars['product_virtual']->value==1) {?>
        var PSE_CHECK_AVAILABILITY = false;
    <?php } else { ?>
        var PSE_CHECK_AVAILABILITY = true;
    <?php }?>
    var PSE_DEFAULT_AVAILABLE_STOCK = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"default_available_stock",'default'=>"100"),$_smarty_tpl);?>
;
    var PSE = <?php echo json_encode($_smarty_tpl->tpl_vars['pse']->value);?>
;
    var PSE_COMBINATIONS = <?php echo json_encode($_smarty_tpl->tpl_vars['combination_label']->value);?>
;
    var PSE_COMBINATIONS_VALUE = <?php echo json_encode($_smarty_tpl->tpl_vars['combination_values']->value);?>
;
</script>

        </article><!-- /#product -->

        <ul class="pager">
            <?php if ($_smarty_tpl->tpl_vars['HAS_PREVIOUS']->value==1) {?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"product",'name'=>"prev_product",'id'=>((string)$_smarty_tpl->tpl_vars['PREVIOUS']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"prev_product",'id'=>((string)$_smarty_tpl->tpl_vars['PREVIOUS']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li class="previous"><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><i class="fa fa-chevron-left"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Previous product"),$_smarty_tpl);?>
</a></li>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"prev_product",'id'=>((string)$_smarty_tpl->tpl_vars['PREVIOUS']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['HAS_NEXT']->value==1) {?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"product",'name'=>"next_product",'id'=>((string)$_smarty_tpl->tpl_vars['NEXT']->value))); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"next_product",'id'=>((string)$_smarty_tpl->tpl_vars['NEXT']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li class="next"><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><i class="fa fa-chevron-right"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Next product"),$_smarty_tpl);?>
</a></li>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"next_product",'id'=>((string)$_smarty_tpl->tpl_vars['NEXT']->value)), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>
        </ul>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product.details",'type'=>"product",'id'=>$_smarty_tpl->tpl_vars['product_id']->value,'limit'=>"1",'with_prev_next_info'=>"1",'with_prev_next_visible'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    </div><!-- /.main -->
    <?php } else { ?>
    <div class="main">
        <article id="content-main" class="col-main" role="main" aria-labelledby="main-label">
            <?php echo $_smarty_tpl->getSubTemplate ("includes/empty.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </article>
    </div><!-- /.layout -->
    <?php }?>
</div>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.content-bottom"),$_smarty_tpl);?>

            </div><!-- /.container -->
        </main><!-- /.main-container -->

        <section class="footer-container" itemscope itemtype="http://schema.org/WPFooter">

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"main.footer-top")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-top"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <section class="footer-block">
                    <div class="container">
                        <div class="blocks row">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.footer-top"),$_smarty_tpl);?>

                        </div>
                    </div>
                </section>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-top"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('elsehook', array('rel'=>"main.footer-top")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"main.footer-top"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <section class="footer-banner">
                    <div class="container">
                        <div class="banner row banner-col-3">
                            <div class="col col-sm-4">
                                <span class="fa fa-truck fa-flip-horizontal"></span>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Free shipping"),$_smarty_tpl);?>
 <small><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Orders over "."$"."50"),$_smarty_tpl);?>
</small>
                            </div>
                            <div class="col col-sm-4">
                                <span class="fa fa-credit-card"></span>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Secure payment"),$_smarty_tpl);?>
 <small><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Multi-payment platform"),$_smarty_tpl);?>
</small>
                            </div>
                            <div class="col col-sm-4">
                                <span class="fa fa-info"></span>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Need help ?"),$_smarty_tpl);?>
 <small><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Questions ? See our F.A.Q."),$_smarty_tpl);?>
</small>
                            </div>
                        </div>
                    </div>
                </section><!-- /.footer-banner -->
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"main.footer-top"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"main.footer-body")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <section class="footer-block">
                    <div class="container">
                        <div class="blocks row">
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hookblock', array('name'=>"main.footer-body",'fields'=>"id,class,title,content")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['hookblock'][0][0]->processHookBlock(array('name'=>"main.footer-body",'fields'=>"id,class,title,content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('forhook', array('rel'=>"main.footer-body")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"main.footer-body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <div class="col col-sm-3">
                                    <section <?php if ($_smarty_tpl->tpl_vars['id']->value) {?> id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl);?>
"<?php }?> class="block <?php if ($_smarty_tpl->tpl_vars['class']->value) {?> block-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['class']->value,$_smarty_tpl);?>
<?php }?>">
                                        <div class="block-heading"><h3 class="block-title"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['title']->value,$_smarty_tpl);?>
</h3></div>
                                        <div class="block-content">
                                            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                        </div>
                                    </section>
                                </div>
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['forhook'][0][0]->processForHookBlock(array('rel'=>"main.footer-body"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['hookblock'][0][0]->processHookBlock(array('name'=>"main.footer-body",'fields'=>"id,class,title,content"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        </div>
                    </div>
                </section>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-body"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"main.footer-bottom")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-bottom"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <footer class="footer-info" role="contentinfo">
                    <div class="container">
                        <div class="info row">
                            <div class="col-lg-9">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.footer-bottom"),$_smarty_tpl);?>

                            </div>
                            <div class="col-lg-3">
                                <section class="copyright"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Copyright"),$_smarty_tpl);?>
 &copy; <time datetime="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(date('Y-m-d'),$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(date('Y'),$_smarty_tpl);?>
</time> <a href="http://thelia.net" rel="external">Thelia</a></section>
                            </div>
                        </div>
                    </div>
                </footer>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"main.footer-bottom"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('elsehook', array('rel'=>"main.footer-bottom")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"main.footer-bottom"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <footer class="footer-info" role="contentinfo">
                    <div class="container">
                        <div class="info row">
                            <nav class="nav-footer col-lg-9" role="navigation">
                                <ul class="list-unstyled list-inline">
                                    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"information_folder_id"),$_smarty_tpl);?>
<?php $_tmp29=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['folder_information'] = new Smarty_variable($_tmp29, null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['folder_information']->value) {?>
                                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"footer_links",'type'=>"content",'folder'=>$_smarty_tpl->tpl_vars['folder_information']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"footer_links",'type'=>"content",'folder'=>$_smarty_tpl->tpl_vars['folder_information']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</a></li>
                                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"footer_links",'type'=>"content",'folder'=>$_smarty_tpl->tpl_vars['folder_information']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                    <?php }?>
                                    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/contact"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Contact Us"),$_smarty_tpl);?>
</a></li>
                                </ul>
                            </nav>
                            <section class="copyright col-lg-3"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Copyright"),$_smarty_tpl);?>
 &copy; <time datetime="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(date('Y-m-d'),$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(date('Y'),$_smarty_tpl);?>
</time> <a href="http://thelia.net" rel="external">Thelia</a></section>
                        </div>
                    </div>
                </footer><!-- /.footer-info -->
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"main.footer-bottom"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


        </section><!-- /.footer-container -->

    </div><!-- /.page -->

    
    <!-- JavaScript -->

    <!-- Jquery -->
    <!--[if lt IE 9]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('javascripts', array('file'=>"assets/dist/js/vendors/jquery.min.js")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/jquery.min.js"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <script>window.jQuery || document.write('<script src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
"><\/script>');</script>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/jquery.min.js"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    
    <?php if ($_smarty_tpl->tpl_vars['lang_code']->value!='en') {?>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['lang_code']->value,$_smarty_tpl);?>
.js"></script>
    <?php }?>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('javascripts', array('file'=>"assets/dist/js/vendors/bootstrap.min.js")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/bootstrap.min.js"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <script>if(typeof($.fn.modal) === 'undefined') { document.write('<script src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
"><\/script>'); }</script>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/bootstrap.min.js"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php $_smarty_tpl->smarty->_tag_stack[] = array('javascripts', array('file'=>"assets/dist/js/vendors/bootbox.js")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/bootbox.js"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <script src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
"></script>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['javascripts'][0][0]->blockJavascripts(array('file'=>"assets/dist/js/vendors/bootbox.js"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.after-javascript-include"),$_smarty_tpl);?>


    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.after-javascript-include"),$_smarty_tpl);?>



    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.javascript-initialization"),$_smarty_tpl);?>

    <script>
       // fix path for addCartMessage
       // if you use '/' in your URL rewriting, the cart message is not displayed
       // addCartMessageUrl is used in thelia.js to update the mini-cart content
       var addCartMessageUrl = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>'ajax/addCartMessage'),$_smarty_tpl);?>
";
    </script>
    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"product.javascript-initialization"),$_smarty_tpl);?>



    <!-- Custom scripts -->
    <script src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['javascript'][0][0]->functionJavascript(array('file'=>'assets/dist/js/thelia.min.js'),$_smarty_tpl);?>
"></script>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.body-bottom"),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>
