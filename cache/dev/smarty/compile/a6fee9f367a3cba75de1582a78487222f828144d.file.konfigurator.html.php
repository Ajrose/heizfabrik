<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:37:51
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\konfigurator.html" */ ?>
<?php /*%%SmartyHeaderCode:10203570fd56f37e250-97893357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6fee9f367a3cba75de1582a78487222f828144d' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\konfigurator.html',
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
  'nocache_hash' => '10203570fd56f37e250-97893357',
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
  'unifunc' => 'content_570fd56f5a40b8_12324357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd56f5a40b8_12324357')) {function content_570fd56f5a40b8_12324357($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php';
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


    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Configurator",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/konfigurator"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['breadcrumbs'] = new Smarty_variable(array(array('title'=>$_tmp1,'url'=>$_tmp2)), null, 0);?>

<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_name"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp3, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"store_description"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp4, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"code"),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_code"] = new Smarty_variable($_tmp5, null, 0);?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0][0]->langDataAccess(array('attr'=>"locale"),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang_locale"] = new Smarty_variable($_tmp6, null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['store_name']->value) {?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>'Thelia V2'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_name"] = new Smarty_variable($_tmp7, null, 0);?><?php }?>
<?php if (!$_smarty_tpl->tpl_vars['store_description']->value) {?><?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['store_name']->value,$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["store_description"] = new Smarty_variable($_tmp8, null, 0);?><?php }?>


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
    
        <meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['page_description']->value) {?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['page_description']->value,$_smarty_tpl);?>
<?php } else { ?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(smarty_modifier_truncate(preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['store_description']->value),120),$_smarty_tpl);?>
<?php }?>">
    

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('stylesheets', array('file'=>'assets/dist/css/thelia.min.css')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <link rel="stylesheet" href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['asset_url']->value,$_smarty_tpl);?>
">
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['stylesheets'][0][0]->blockStylesheets(array('file'=>'assets/dist/css/thelia.min.css'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.stylesheet"),$_smarty_tpl);?>


    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"register.stylesheet"),$_smarty_tpl);?>



    
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
<body class="page-konfigurator" itemscope itemtype="http://schema.org/WebPage">
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
    <div class="main">
        <article class="col-main grid" role="main" aria-labelledby="main-label">
            <h1 id="main-label" class="page-header"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Your personal offer",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</h1>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"konfigurator.top"),$_smarty_tpl);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"konfigurator.heizlast.berechnung")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"konfigurator.heizlast.berechnung"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <form id="form-konfigurator" class="form-horizontal" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/konfigurator/ajax"),$_smarty_tpl);?>
" method="post">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>'error_message')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'error_message'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <input type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"missing or invalid data"),$_smarty_tpl);?>
" />
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'error_message'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_hidden_fields'][0][0]->renderHiddenFormField(array(),$_smarty_tpl);?>

                <?php if ($_smarty_tpl->tpl_vars['form_error']->value) {?><div class="alert alert-danger"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['form_error_message']->value,$_smarty_tpl);?>
</div><?php }?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"konfigurator.form-top"),$_smarty_tpl);?>

                <fieldset id="konfigurator-info" class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Here you can configure your heating system",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>

                    </div>
                    <div class="panel-body">
					
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"gebaeudeart")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"gebaeudeart"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<!--form=$form -->
			
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<div class="radio-group-konfigurator">
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp9) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
							</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"gebaeudeart"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"baujahr")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"baujahr"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp10) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"baujahr"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
									
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"lage_des_gebaeudes")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"lage_des_gebaeudes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp11) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"lage_des_gebaeudes"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"windlage_des_gebaudes")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"windlage_des_gebaudes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp12=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp12) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"windlage_des_gebaudes"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"lage_des_raumes")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"lage_des_raumes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp13=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp13) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"lage_des_raumes"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"anzahl_aussenwaende")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"anzahl_aussenwaende"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp14=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp14) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"anzahl_aussenwaende"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"fenster")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"fenster"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp15=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp15) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"fenster"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"verglaste_flaeche")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"verglaste_flaeche"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp16=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp16) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"verglaste_flaeche"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"wohnraumtemperatur")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"wohnraumtemperatur"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp17=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp17) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"wohnraumtemperatur"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"aussentemperatur")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"aussentemperatur"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp18=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp18) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"aussentemperatur"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"waermedaemmung")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"waermedaemmung"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<?php  $_smarty_tpl->tpl_vars['choice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['choice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['choice']->key => $_smarty_tpl->tpl_vars['choice']->value) {
$_smarty_tpl->tpl_vars['choice']->_loop = true;
?>
							<div class="radio radio-konfigurator">
								<label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
">
									<input type="radio" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
"<?php ob_start();?><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->value,$_smarty_tpl);?>
<?php $_tmp19=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['value']->value===$_tmp19) {?> checked<?php }?>> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['choice']->value->label,$_smarty_tpl);?>

								</label>
							</div>
							<?php } ?>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"waermedaemmung"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
						
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"flaeche")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"flaeche"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator group-text<?php if ($_smarty_tpl->tpl_vars['error']->value) {?> has-error<?php }?>">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<div class="control-input radio-konfigurator">
								<input type="text" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl);?>
" class="form-control input-sm" maxlength="50" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['required']->value) {?>aria-required="true" required<?php }?><?php if (!$_smarty_tpl->tpl_vars['value']->value||$_smarty_tpl->tpl_vars['error']->value) {?> autofocus<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
									<span class="help-block"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['message']->value,$_smarty_tpl);?>
</span>
									<?php $_smarty_tpl->tpl_vars["error_focus"] = new Smarty_variable("true", null, 0);?>
								<?php } elseif (!$_smarty_tpl->tpl_vars['value']->value) {?>
									<?php $_smarty_tpl->tpl_vars["error_focus"] = new Smarty_variable("true", null, 0);?>
								<?php }?>
							</div>
						 </div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"flaeche"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>
									
						<fieldset>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"waermebedarf")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"waermebedarf"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="radio-group-konfigurator group-text<?php if ($_smarty_tpl->tpl_vars['error']->value) {?> has-error<?php }?>">
						<legend class="legend-konfigurator"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>((string)$_smarty_tpl->tpl_vars['label']->value),'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</legend>
							<div class="control-input radio-konfigurator">
								<input type="text" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl);?>
" class="form-control input-sm" maxlength="50" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
>
							</div>
						 </div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"waermebedarf"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</fieldset>		
						<button type="submit">Submit</button>				
                    </div>
                </fieldset>

				
            </form>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"konfigurator.heizlast.berechnung"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		<section id="products-new">	
			<div class="products-heading">
				<h2><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Suggestions",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/view_all",'type'=>"new"),$_smarty_tpl);?>
" class="btn-all"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"+ View All",'d'=>"hookkonfigurator.fo.default"),$_smarty_tpl);?>
</a></h2>
			</div>
			<div id="category-products">
            </div><!-- /#category-products -->
			</section><!-- #products-heizung -->	
		


	
			        </article>
				


		
		
		
	<div id="product_suggestion">
	<ul id="products">
	</ul>
	</div>
    </div><!-- /.layout -->
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
<?php $_tmp20=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['folder_information'] = new Smarty_variable($_tmp20, null, 0);?>
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


    
<script>
$('body').on('submit', '.form-horizontal', function (e) {
    e.preventDefault();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize()
    })
    .done(function (data, textStatus, request) {
    	$waermebedarf = request.getResponseHeader('waermebedarf');
    	if($waermebedarf != null) 
    		$('input[name="konfigurator[waermebedarf]"]').val($waermebedarf);
    	$("#category-products").empty().append(data);
      /*  if (typeof data.message !== 'undefined') {
        	$('input[name="konfigurator[waermebedarf]"]').val(data.waermebedarf);
        	
        }*/
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        if (typeof jqXHR.responseJSON !== 'undefined') {
            if (jqXHR.responseJSON.hasOwnProperty('form')) {
                $('#form_body').html(jqXHR.responseJSON.form);
            }
            $('.form_error').html(jqXHR.responseJSON.message);
        } else {
            alert(errorThrown);
        }
    });
});
</script>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"register.after-javascript-include"),$_smarty_tpl);?>



    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.javascript-initialization"),$_smarty_tpl);?>

    <script>
       // fix path for addCartMessage
       // if you use '/' in your URL rewriting, the cart message is not displayed
       // addCartMessageUrl is used in thelia.js to update the mini-cart content
       var addCartMessageUrl = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>'ajax/addCartMessage'),$_smarty_tpl);?>
";
    </script>
    
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"register.javascript-initialization"),$_smarty_tpl);?>



    <!-- Custom scripts -->
    <script src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['javascript'][0][0]->functionJavascript(array('file'=>'assets/dist/js/thelia.min.js'),$_smarty_tpl);?>
"></script>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"main.body-bottom"),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>
