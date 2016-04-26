<!doctype html>
<!--



Copyright (c) SEPA
email : office@sepa.at
web : http://www.hausfabrik.at


-->

{* Declare assets directory, relative to template base directory *}
{declare_assets directory='assets/dist'}
{* Set the default translation domain, that will be used by {intl} when the 'd' parameter is not set *}
{default_translation_domain domain='fo.default'}

{* -- Define some stuff for Smarty ------------------------------------------ *}
{config_load file='variables.conf'}
{block name="init"}{/block}
{block name="no-return-functions"}{/block}
{assign var="store_name" value={config key="store_name"}}
{assign var="store_description" value={config key="store_description"}}
{assign var="lang_code" value={lang attr="code"}}
{assign var="lang_locale" value={lang attr="locale"}}
{if not $store_name}{assign var="store_name" value={intl l='Thelia V2'}}{/if}
{if not $store_description}{assign var="store_description" value={$store_name}}{/if}

{* paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither *}
<!--[if lt IE 7 ]><html class="no-js oldie ie6" lang="{$lang_code}"> <![endif]-->
<!--[if IE 7 ]><html class="no-js oldie ie7" lang="{$lang_code}"> <![endif]-->
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="{$lang_code}"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="{$lang_code}" class="no-js"> <!--<![endif]-->
<head>
    {hook name="main.head-top"}
    {* Test if javascript is enabled *}
    <script>(function(H) { H.className=H.className.replace(/\bno-js\b/,'js') } )(document.documentElement);</script>

    <meta charset="utf-8">

    {* Page Title *}
    <title>{block name="page-title"}{strip}{if $page_title}{$page_title}{elseif $breadcrumbs}{foreach from=$breadcrumbs|array_reverse item=breadcrumb}{$breadcrumb.title|unescape} - {/foreach}{$store_name}{else}{$store_name}{/if}{/strip}{/block}</title>

    {* Meta Tags *}
    <meta name="generator" content="{intl l='Thelia V2'}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    {block name="meta"}
        <meta name="description" content="{if $page_description}{$page_description}{else}{$store_description|strip|truncate:120}{/if}">
    {/block}

    {stylesheets file='assets/dist/css/thelia.min.css'}
        <link rel="stylesheet" href="{$asset_url}">
    {/stylesheets}

    {hook name="main.stylesheet"}

    {block name="stylesheet"}{/block}

    {* Favicon *}
    <link rel="shortcut icon" type="image/x-icon" href="{image file='assets/dist/img/favicon.ico'}">
    <link rel="icon" type="image/png" href="{image file='assets/dist/img/favicon.png'}" />

    {* Feeds *}
    <link rel="alternate" type="application/rss+xml" title="{intl l='All products'}" href="{url path="/feed/catalog/%lang" lang=$lang_locale}" />
    <link rel="alternate" type="application/rss+xml" title="{intl l='All contents'}" href="{url path="/feed/content/%lang" lang=$lang_locale}" />
    <link rel="alternate" type="application/rss+xml" title="{intl l='All brands'}"   href="{url path="/feed/brand/%lang" lang=$lang_locale}" />
    {block name="feeds"}{/block}

    {* HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries *}
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    {javascripts file="assets/dist/js/vendors/html5shiv.min.js"}
        <script>window.html5 || document.write('<script src="{$asset_url}"><\/script>');</script>
    {/javascripts}

    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    {javascripts file="assets/dist/js/vendors/respond.min.js"}
        <script>window.respond || document.write('<script src="{$asset_url}"><\/script>');</script>
    {/javascripts}
    <![endif]-->
   <script src="{javascript file='assets/dist/js/vendors/modernizr.custom.js'}"></script>

    {hook name="main.head-bottom"}
</head>
<body class="{block name='body-class'}{/block}" itemscope itemtype="http://schema.org/WebPage">
    {hook name="main.body-top"}

    <!-- Accessibility -->
    <a class="sr-only" href="#content">{intl l="Skip to content"}</a>

    <div class="page" role="document">

        <div class="header-container" itemscope itemtype="http://schema.org/WPHeader">
            {hook name="main.header-top"}
            <div class="navbar  navbar-default navbar-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <div class="container">

                    <div class="navbar-header">
                        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-secondary">
                            <span class="sr-only">{intl l="Toggle navigation"}</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" href="{navigate to="index"}">{$store_name}</a>
                    </div>

                    {ifhook rel="main.navbar-secondary"}
                        {* Place everything within .nav-collapse to hide it until above 768px *}
                        <nav class="navbar-collapse collapse nav-secondary" role="navigation" aria-label="{intl l="Secondary Navigation"}">
                            {hook name="main.navbar-secondary"}
                        </nav>
                    {/ifhook}
                </div>
            </div>


            <header class="container" role="banner">
                <h1 class="logo  hidden-xs col-sm-4" >
                        <a href="{navigate to="index"}" title="{$store_name}">
                            <img src="{image file='assets/dist/img/logo.png'}" alt="{$store_name}">
                        </a>
                </h1>
                <div class="col-sm-4 zertifikat-logos">
               <img src={image file='assets/dist/img/installateur_fachbetrieb-logo.png'} style="width:80px">
                <img src={image file='assets/dist/img/shk_innung.png'}  style="width:80px">       
                </div>
                
                <div class="hotline">
               
                    <div class="hotline-icon"> <span></span></div>
                    <div class="hotline-text">
                    <h3>0800/022573</h3>
                    <small> Mo-Fr:  8-20 Uhr<br>
                        Sa:  11-17 Uhr</small>
                    </div>               
                </div>
                <div style="clear:both"></div>
                <div class="header row">
                   
                    
                   
                    
                    {hook name="main.navbar-primary"}
                </div>
            </header><!-- /.header -->

            {hook name="main.header-bottom"}
        </div><!-- /.header-container -->

        <main class="main-container" role="main">
            <div class="container">
                {hook name="main.content-top"}
                {block name="breadcrumb"}{include file="misc/breadcrumb.tpl"}{/block}
                <div id="content">{block name="main-content"}{/block}
                    
                    
                    
              
 
                   

      
		
                    
                    
                </div>
                {hook name="main.content-bottom"}
            </div><!-- /.container -->
        </main><!-- /.main-container -->

        <section class="footer-container" itemscope itemtype="http://schema.org/WPFooter">

            {ifhook rel="main.footer-top"}
                <section class="footer-block">
                    <div class="container">
                        <div class="blocks row">
                            {hook name="main.footer-top"}
                        </div>
                    </div>
                </section>
            {/ifhook}
            {elsehook rel="main.footer-top"}
                <section class="footer-banner">
                    <div class="container">
                        <div class="banner row banner-col-3">
                            <div class="col col-sm-4">
                                <span class="shopicon shop-lieferung highlightcolor fa-flip-horizontal"></span>
                                <div><strong>{intl l="LIEFERUNG"}</strong></div> <div><br><small>{intl l="Wir berechnen Festpreise pro Adresse, die von der Lieferoption abhängen. Liefergebühren.
Die Standardlieferung dauert bis 3 Arbeitstage."}</small></div>
                            </div>
                            <div class="col col-sm-4">
                                <span class="shopicon shop-bezahlung highlightcolor"></span>
                                <div><strong>{intl l="BEZAHLUNG"} </strong></div><div><br><small>{intl l="Die folgenden Zahlungsmethoden stehen Ihnen zur Verfügung:"}</small></div>
                                <div>
                                    <img src="{image file='assets/dist/img/paymentsystems/paypal.jpg'}" alt="paypal"/>
                                    <img src="{image file='assets/dist/img/paymentsystems/mastercard.jpg'}" alt="paypal"/>
                                    <img src="{image file='assets/dist/img/paymentsystems/visa.jpg'}" alt="paypal"/>
                                    <img src="{image file='assets/dist/img/paymentsystems/western.jpg'}" alt="paypal"/>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <span class="shopicon shop-kontakt highlightcolor"></span>
                                <div>
                                    <strong>{intl l="KONTAKT"} </strong>
                                </div>
                                <div>
                                    <h3><strong>{intl l="0800/022573"}</strong></h3>
                                    <h5>Mo-Fr: 8-20Uhr</h5>
                                    <h5>Sa: 11-17Uhr</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.footer-banner -->
            {/elsehook}

            {*ifhook rel="main.footer-body"}
                <section class="footer-block">
                    <div class="container">
                        <div class="blocks row">
                            {hookblock name="main.footer-body"  fields="id,class,title,content"}
                            {forhook rel="main.footer-body"}
                                <div class="col col-sm-3">
                                    <section {if $id} id="{$id}"{/if} class="block {if $class} block-{$class}{/if}">
                                        <div class="block-heading"><h3 class="block-title">{$title}</h3></div>
                                        <div class="block-content">
                                            {$content nofilter}
                                        </div>
                                    </section>
                                </div>
                            {/forhook}
                            {/hookblock}
                        </div>
                    </div>
                </section>
            {/ifhook*}

            {ifhook rel="main.footer-bottom"}
                <footer class="footer-info" role="contentinfo">
                    <div class="container">
                        <div class="info row">
                            <div class="col-lg-9">
                                {hook name="main.footer-bottom"}
                            </div>
                            <div class="col-lg-3">
                                <section class="copyright">{intl l="Copyright"} &copy; <time datetime="{'Y-m-d'|date}">{'Y'|date}</time> <a href="http://www.hausfabrik.at" rel="external">HAUSFABRIK</a></section>
                            </div>
                        </div>
                    </div>
                </footer>
            {/ifhook}
            {elsehook rel="main.footer-bottom"}
                <footer class="footer-info" role="contentinfo">
                    <div class="container">
                        <div class="info row">
                            <nav class="nav-footer col-lg-9" role="navigation">
                                <!--ul class="list-unstyled list-inline">
                                    {$folder_information={config key="information_folder_id"}}
                                    {if $folder_information}
                                        {loop name="footer_links" type="content" folder=$folder_information}
                                            <li><a href="{$URL nofilter}">{$TITLE}</a></li>
                                        {/loop}
                                    {/if}
                                    <li><a href="{url path="/contact"}">{intl l="Contact Us"}</a></li>
                                </ul-->
                            </nav>
                            <section class="copyright col-lg-3">{intl l="Copyright"} &copy; <time datetime="{'Y-m-d'|date}">{'Y'|date}</time> <a href="http://thelia.net" rel="external">HEIZFABRIK</a></section>
                        </div>
                    </div>
                </footer><!-- /.footer-info -->
            {/elsehook}

        </section><!-- /.footer-container -->

    </div><!-- /.page -->
    
    <div class="sehrgut"><img src={image file='assets/dist/img/sehrgut.png'}></div>

    {block name="before-javascript-include"}{/block}
    <!-- JavaScript -->

    <!-- Jquery -->
    <!--[if lt IE 9]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->
    {javascripts file="assets/dist/js/vendors/jquery.min.js"}
        <script>window.jQuery || document.write('<script src="{$asset_url}"><\/script>');</script>
    {/javascripts}

    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    {* do no try to load messages_en, as this file does not exists *}
    {if $lang_code != 'en'}
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_{$lang_code}.js"></script>
    {/if}

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    {javascripts file="assets/dist/js/vendors/bootstrap.min.js"}
        <script>if(typeof($.fn.modal) === 'undefined') { document.write('<script src="{$asset_url}"><\/script>'); }</script>
    {/javascripts}

    {javascripts file="assets/dist/js/vendors/bootbox.js"}
        <script src="{$asset_url}"></script>
    {/javascripts}

    {hook name="main.after-javascript-include"}

    {block name="after-javascript-include"}{/block}

    {hook name="main.javascript-initialization"}
    <script>
       // fix path for addCartMessage
       // if you use '/' in your URL rewriting, the cart message is not displayed
       // addCartMessageUrl is used in thelia.js to update the mini-cart content
       var addCartMessageUrl = "{url path='ajax/addCartMessage'}";
    </script>
    {block name="javascript-initialization"}{/block}

    <!-- Custom scripts -->
    <script src="{javascript file='assets/dist/js/thelia.min.js'}"></script>
  

    {hook name="main.body-bottom"}
</body>
</html>
