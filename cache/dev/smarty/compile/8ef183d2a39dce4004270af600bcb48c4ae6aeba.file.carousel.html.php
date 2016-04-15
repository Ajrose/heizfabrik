<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:39:39
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\local\modules\Carousel\templates\frontOffice\default\carousel.html" */ ?>
<?php /*%%SmartyHeaderCode:31960570fd5db13d5b6-69355720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ef183d2a39dce4004270af600bcb48c4ae6aeba' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\local\\modules\\Carousel\\templates\\frontOffice\\default\\carousel.html',
      1 => 1460457121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31960570fd5db13d5b6-69355720',
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
  'unifunc' => 'content_570fd5db153889_92175031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd5db153889_92175031')) {function content_570fd5db153889_92175031($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('ifloop', array('rel'=>"carousel.front")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifloop'][0][0]->theliaIfLoop(array('rel'=>"carousel.front"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

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
