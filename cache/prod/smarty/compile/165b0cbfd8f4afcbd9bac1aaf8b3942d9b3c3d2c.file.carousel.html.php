<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-11 15:56:54
         compiled from "C:\xampp\htdocs\thelia\local\modules\Carousel\templates\frontOffice\default\carousel.html" */ ?>
<?php /*%%SmartyHeaderCode:8059570bad2655b711-22739319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165b0cbfd8f4afcbd9bac1aaf8b3942d9b3c3d2c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\thelia\\local\\modules\\Carousel\\templates\\frontOffice\\default\\carousel.html',
      1 => 1459491142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8059570bad2655b711-22739319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOOP_COUNT' => 0,
    'URL' => 0,
    'IMAGE_URL' => 0,
    'ALT' => 0,
    'TITLE' => 0,
    'DESCRIPTION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570bad2657b2e7_49365436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bad2657b2e7_49365436')) {function content_570bad2657b2e7_49365436($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"carousel.front")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"carousel.front"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<section class="carousel-container">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-wrapper">
            <div class="carousel-inner">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"carousel",'name'=>"carousel.front",'width'=>"1200",'height'=>"390",'resize_mode'=>"borders")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"carousel",'name'=>"carousel.front",'width'=>"1200",'height'=>"390",'resize_mode'=>"borders"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <figure class="item <?php if ($_smarty_tpl->tpl_vars['LOOP_COUNT']->value==1) {?>active<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['URL']->value) {?><a href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_smarty_tpl->tpl_vars['URL']->value)===null||$tmp==='' ? '#' : $tmp),$_smarty_tpl);?>
"><?php }?>
                    <img src="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['IMAGE_URL']->value,$_smarty_tpl);?>
" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ALT']->value,$_smarty_tpl);?>
">
                    <?php if ($_smarty_tpl->tpl_vars['URL']->value) {?></a><?php }?>

                    <div class="carousel-caption">
                        <?php if ($_smarty_tpl->tpl_vars['TITLE']->value) {?><h3><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
</h3><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value) {?><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
<?php }?>
                    </div>
                </figure>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"carousel",'name'=>"carousel.front",'width'=>"1200",'height'=>"390",'resize_mode'=>"borders"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </div>
        </div>
        <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="icon-prev"></span></a>
        <a class="right carousel-control" href="#carousel" data-slide="next"><span class="icon-next"></span></a>
    </div>
</section><!-- #carousel -->
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"carousel.front"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
