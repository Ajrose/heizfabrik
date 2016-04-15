<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:39:41
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\category.html" */ ?>
<?php /*%%SmartyHeaderCode:17354570fd5dd900f52-73652825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f44fd63497dd987b509834c70f4235956ab2f417' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\category.html',
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
  'nocache_hash' => '17354570fd5dd900f52-73652825',
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
  'unifunc' => 'content_570fd5ddb463d6_30172988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd5ddb463d6_30172988')) {function content_570fd5ddb463d6_30172988($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php';
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

<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['category_id'] = new Smarty_variable($_tmp1, null, 0);?>


<?php if ($_smarty_tpl->tpl_vars['category_id']->value) {?>
    <?php $_smarty_tpl->tpl_vars['breadcrumbs'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category_path",'type'=>"category-path",'category'=>$_smarty_tpl->tpl_vars['category_id']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category_path",'type'=>"category-path",'category'=>$_smarty_tpl->tpl_vars['category_id']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('breadcrumbs', null, 0);
$_smarty_tpl->tpl_vars['breadcrumbs']->value[] = array('title'=>$_tmp2,'url'=>$_tmp3);?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category_path",'type'=>"category-path",'category'=>$_smarty_tpl->tpl_vars['category_id']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['category_id']->value) {?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category.seo.title",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.seo.title",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['META_TITLE']->value,$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['page_title'] = new Smarty_variable($_tmp4, null, 0);?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.seo.title",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>

<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_name"),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp5, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_description"),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp6, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"code"),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_code"] = new Smarty_variable($_tmp7, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"locale"),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_locale"] = new Smarty_variable($_tmp8, null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['store_name']->value) {?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Thelia V2'),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp9, null, 0);?><?php }?>
<?php if (!$_smarty_tpl->tpl_vars['store_description']->value) {?><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp10, null, 0);?><?php }?>


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
    
<?php if ($_smarty_tpl->tpl_vars['category_id']->value) {?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category.seo.meta",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.seo.meta",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php echo $_smarty_tpl->getSubTemplate ("includes/meta-seo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.seo.meta",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>


    <?php $_smarty_tpl->smarty->_tag_stack[] = array('stylesheets', array('file'=>'assets/dist/css/thelia.min.css')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <link rel="stylesheet" href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
">
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.stylesheet"),$_smarty_tpl);?>


    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.stylesheet"),$_smarty_tpl);?>



    
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
    
<?php if ($_smarty_tpl->tpl_vars['category_id']->value) {?>
    <link rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'All products in'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>'title'),$_smarty_tpl);?>
" href="<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"locale"),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>"id"),$_smarty_tpl);?>
<?php $_tmp12=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/feed/catalog/%lang/%category_id",'lang'=>$_tmp11,'category_id'=>$_tmp12),$_smarty_tpl);?>
" />
<?php }?>


    
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
<body class="page-category" itemscope itemtype="http://schema.org/WebPage">
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

<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_GET['limit'])===null||$tmp==='' ? 8 : $tmp),$_smarty_tpl);?>
<?php $_tmp13=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['limit'] = new Smarty_variable($_tmp13, null, 0);?>
<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_GET['page'])===null||$tmp==='' ? 1 : $tmp),$_smarty_tpl);?>
<?php $_tmp14=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['product_page'] = new Smarty_variable($_tmp14, null, 0);?>
<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_GET['order'])===null||$tmp==='' ? 'alpha' : $tmp),$_smarty_tpl);?>
<?php $_tmp15=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['product_order'] = new Smarty_variable($_tmp15, null, 0);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.top",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>


    <div class="main row">

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.main-top",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>


        <article class="col-main col-md-9 col-md-push-3 <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_GET['mode'])===null||$tmp==='' ? "grid" : $tmp),$_smarty_tpl);?>
" role="main">

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.content-top",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>


            <?php if ($_smarty_tpl->getConfigVariable('category_display_detail')&&$_smarty_tpl->tpl_vars['category_id']->value) {?>
            <section class="category-description">
                <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['category_id']->value,$_smarty_tpl);?>
<?php $_tmp16=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category.description",'type'=>"category",'id'=>$_tmp16,'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.description",'type'=>"category",'id'=>$_tmp16,'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <h1 id="main-label" class="page-header"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>"title"),$_smarty_tpl);?>
</h1>
                    <?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
<?php $_tmp17=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"category.image",'type'=>"image",'source'=>"category",'source_id'=>$_tmp17,'width'=>218,'height'=>146,'resize_mode'=>"borders")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.image",'type'=>"image",'source'=>"category",'source_id'=>$_tmp17,'width'=>218,'height'=>146,'resize_mode'=>"borders"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <p><img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
"></p>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.image",'type'=>"image",'source'=>"category",'source_id'=>$_tmp17,'width'=>218,'height'=>146,'resize_mode'=>"borders"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value) {?>
                    <div class="description">
                        <?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>

                    </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value) {?>
                    <small class="postscriptum">
                        <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['POSTSCRIPTUM']->value,$_smarty_tpl);?>

                    </small>
                    <?php }?>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"category.description",'type'=>"category",'id'=>$_tmp16,'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </section>
            <hr/>
            <?php }?>

            <?php if ($_smarty_tpl->getConfigVariable('category_display_subcategories')) {?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"subcategories")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"subcategories"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <div class="block-links">
                    <div class="block-content">
                        <ul>
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"subcategories",'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['category_id']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"subcategories",'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['category_id']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <li>
                                    <a href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['URL']->value,$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</a>
                                </li>
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"subcategories",'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['category_id']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        </ul>
                    </div>
                </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"subcategories"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"product_list")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"product_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['count'][0][0]->theliaCount(array('type'=>"product",'category'=>$_smarty_tpl->tpl_vars['category_id']->value),$_smarty_tpl);?>
<?php $_tmp18=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['amount'] = new Smarty_variable($_tmp18, null, 0);?>
                <div class="toolbar toolbar-top" role="toolbar">
                    <div class="sorter-container clearfix">
                    <span class="amount"><?php if (($_smarty_tpl->tpl_vars['amount']->value>1)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"%nb Items",'nb'=>((string)$_smarty_tpl->tpl_vars['amount']->value)),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"%nb Item",'nb'=>((string)$_smarty_tpl->tpl_vars['amount']->value)),$_smarty_tpl);?>
<?php }?></span>

                    <span class="limiter">
                        <label for="limit-top"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Show"),$_smarty_tpl);?>
</label>
                        <select id="limit-top" name="limit">
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>1,'limit'=>"4"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['limit']->value==4) {?>selected<?php }?>>4</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>1,'limit'=>"8"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['limit']->value==8) {?>selected<?php }?>>8</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>1,'limit'=>"12"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['limit']->value==12) {?>selected<?php }?>>12</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>1,'limit'=>"50"),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['limit']->value==50) {?>selected<?php }?>>50</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>1,'limit'=>"100000"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['limit']->value==100000) {?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"All"),$_smarty_tpl);?>
</option>
                        </select>
                        <span class="per-page"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"per page"),$_smarty_tpl);?>
</span>
                    </span><!-- /.limiter -->

                    <span class="sort-by">
                        <label for="sortby-top"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Sort By"),$_smarty_tpl);?>
</label>
                        <select id="sortby-top" name="sortby">
                            
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'order'=>"alpha"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['product_order']->value=="alpha") {?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Name ascending"),$_smarty_tpl);?>
</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'order'=>"alpha_reverse"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['product_order']->value=="alpha_reverse") {?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Name descending"),$_smarty_tpl);?>
</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'order'=>"min_price"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['product_order']->value=="min_price") {?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Price ascending"),$_smarty_tpl);?>
</option>
                            <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'order'=>"max_price"),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['product_order']->value=="max_price") {?>selected<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Price descending"),$_smarty_tpl);?>
</option>
                        </select>
                    </span><!-- /.sort-by -->

                    <span class="view-mode">
                        <span class="view-mode-label sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"View as"),$_smarty_tpl);?>
:</span>
                        <span class="view-mode-btn">
                            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'mode'=>"grid"),$_smarty_tpl);?>
" data-toggle="view" role="button" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Grid"),$_smarty_tpl);?>
" rel="nofollow" class="btn btn-default"><i class="fa fa-th"></i></a>
                            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'mode'=>"list"),$_smarty_tpl);?>
" data-toggle="view" role="button" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"List"),$_smarty_tpl);?>
" rel="nofollow" class="btn btn-default"><i class="fa fa-th-list"></i></a>
                        </span>
                    </span><!-- /.view-mode -->

                </div><!-- /.sorter -->
            </div>
            <div id="category-products">
                <div class="products-content">
                    <ul class="list-unstyled row">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"product",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <?php echo $_smarty_tpl->getSubTemplate ("includes/single-product.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_id'=>$_smarty_tpl->tpl_vars['ID']->value,'hasBtn'=>true,'hasDescription'=>true,'hasQuickView'=>true,'width'=>"218",'height'=>"146"), 0);?>

                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>$_smarty_tpl->tpl_vars['limit']->value,'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </div>
            </div><!-- /#category-products -->
            <div class="toolbar toolbar-bottom" role="toolbar">
                <?php if ($_smarty_tpl->tpl_vars['amount']->value>$_smarty_tpl->tpl_vars['limit']->value) {?>
                    <div class="pagination-container clearfix" role="pagination" aria-labelledby="pagination-label-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['toolbar']->value,$_smarty_tpl);?>
}">
                        <strong id="pagination-label-<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['toolbar']->value,$_smarty_tpl);?>
}" class="pagination-label sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Pagination"),$_smarty_tpl);?>
</strong>
                        <ul class="pagination pagination-sm">
                            <?php if ($_smarty_tpl->tpl_vars['product_page']->value<=1) {?>
                                <li class="disabled">
                                    <span class="prev"><i class="fa fa-caret-left"></i></span>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['product_page']->value-1,$_smarty_tpl);?>
<?php $_tmp19=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>$_tmp19),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Previous"),$_smarty_tpl);?>
" class="prev"><i class="fa fa-caret-left"></i></a>
                                </li>
                            <?php }?>

                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('pageloop', array('rel'=>"product_list")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['pageloop'][0][0]->theliaPageLoop(array('rel'=>"product_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <li<?php if ($_smarty_tpl->tpl_vars['PAGE']->value==$_smarty_tpl->tpl_vars['CURRENT']->value) {?> class="active"<?php }?>>
                                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>$_smarty_tpl->tpl_vars['PAGE']->value),$_smarty_tpl);?>
"> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['PAGE']->value,$_smarty_tpl);?>
 </a>
                                </li>
                                <?php if ($_smarty_tpl->tpl_vars['PAGE']->value==$_smarty_tpl->tpl_vars['LAST']->value) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['CURRENT']->value==$_smarty_tpl->tpl_vars['LAST']->value) {?>
                                        <li class="disabled">
                                            <span class="next"><i class="fa fa-caret-right"></i></span>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['NEXT']->value,$_smarty_tpl);?>
<?php $_tmp20=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('current'=>"1",'page'=>$_tmp20),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Next"),$_smarty_tpl);?>
" class="next"><i class="fa fa-caret-right"></i></a>
                                        </li>
                                    <?php }?>
                                <?php }?>
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['pageloop'][0][0]->theliaPageLoop(array('rel'=>"product_list"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        </ul>
                    </div>
                <?php }?>
            </div><!-- /.toolbar toolbar-bottom -->
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"product_list"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('elseloop', array('rel'=>"product_list")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"product_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <div class="alert alert-warning">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"No products available in this category"),$_smarty_tpl);?>

                </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"product_list"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.content-bottom",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>


        </article>

        <aside class="col-left col-md-3 col-md-pull-9" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
            <?php echo $_smarty_tpl->getSubTemplate ("includes/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </aside>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.main-bottom",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>


    </div>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.bottom",'category'=>((string)$_smarty_tpl->tpl_vars['category_id']->value)),$_smarty_tpl);?>

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
<?php $_tmp21=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['folder_information'] = new Smarty_variable($_tmp21, null, 0);?>
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


    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.after-javascript-include"),$_smarty_tpl);?>



    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.javascript-initialization"),$_smarty_tpl);?>

    <script>
       // fix path for addCartMessage
       // if you use '/' in your URL rewriting, the cart message is not displayed
       // addCartMessageUrl is used in thelia.js to update the mini-cart content
       var addCartMessageUrl = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>'ajax/addCartMessage'),$_smarty_tpl);?>
";
    </script>
    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.javascript-initialization"),$_smarty_tpl);?>



    <!-- Custom scripts -->
    <script src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['javascript'][0][0]->functionJavascript(array('file'=>'assets/dist/js/thelia.min.js'),$_smarty_tpl);?>
"></script>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.body-bottom"),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>
