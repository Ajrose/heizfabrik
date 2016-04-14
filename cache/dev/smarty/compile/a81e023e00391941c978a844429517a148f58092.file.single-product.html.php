<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 16:29:18
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\includes\single-product.html" */ ?>
<?php /*%%SmartyHeaderCode:20843570fa93e9f15a9-27125658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a81e023e00391941c978a844429517a148f58092' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\includes\\single-product.html',
      1 => 1460457122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20843570fa93e9f15a9-27125658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colClass' => 0,
    'PSE_COUNT' => 0,
    'TITLE' => 0,
    'product_id' => 0,
    'ID' => 0,
    'URL' => 0,
    'hasQuickView' => 0,
    'width' => 0,
    'height' => 0,
    'IMAGE_URL' => 0,
    'productTitle' => 0,
    'hasDescription' => 0,
    'DESCRIPTION' => 0,
    'VIRTUAL' => 0,
    'QUANTITY' => 0,
    'current_stock_href' => 0,
    'current_stock_content' => 0,
    'IS_PROMO' => 0,
    'combination_count' => 0,
    'BEST_TAXED_PRICE' => 0,
    'SHOW_ORIGINAL_PRICE' => 0,
    'TAXED_PRICE' => 0,
    'hasBtn' => 0,
    'hasSubmit' => 0,
    'name' => 0,
    'form_error' => 0,
    'form_error_message' => 0,
    'PRODUCT_SALE_ELEMENT' => 0,
    'attr' => 0,
    'label_attr' => 0,
    'error' => 0,
    'value' => 0,
    'label' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570fa93eaa6d13_81746149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fa93eaa6d13_81746149')) {function content_570fa93eaa6d13_81746149($_smarty_tpl) {?><li class="item <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_smarty_tpl->tpl_vars['colClass']->value)===null||$tmp==='' ? "col-md-3" : $tmp),$_smarty_tpl);?>
">
    <?php if ($_smarty_tpl->tpl_vars['PSE_COUNT']->value>1) {?>
        <?php $_smarty_tpl->tpl_vars["hasSubmit"] = new Smarty_variable(false, null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["hasSubmit"] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars["productTitle"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['TITLE']->value), null, 0);?>
	<?php if (!$_smarty_tpl->tpl_vars['product_id']->value) {?>
	   <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['ID']->value, null, 0);?>
	<?php }?>
    <article class="row" itemscope itemtype="http://schema.org/Product">
		
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"singleproduct.top",'product'=>((string)$_smarty_tpl->tpl_vars['product_id']->value)),$_smarty_tpl);?>


        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
" itemprop="url" tabindex="-1" class="product-image<?php if ($_smarty_tpl->tpl_vars['hasQuickView']->value==true) {?> product-quickview<?php }?> overlay col-sm-3">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"product_thumbnail",'type'=>"image",'product'=>$_smarty_tpl->tpl_vars['product_id']->value,'width'=>((string)$_smarty_tpl->tpl_vars['width']->value),'height'=>((string)$_smarty_tpl->tpl_vars['height']->value),'resize_mode'=>"borders",'limit'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product_thumbnail",'type'=>"image",'product'=>$_smarty_tpl->tpl_vars['product_id']->value,'width'=>((string)$_smarty_tpl->tpl_vars['width']->value),'height'=>((string)$_smarty_tpl->tpl_vars['height']->value),'resize_mode'=>"borders",'limit'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_URL']->value;?>
" class="img-responsive" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['productTitle']->value,$_smarty_tpl);?>
">
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"product_thumbnail",'type'=>"image",'product'=>$_smarty_tpl->tpl_vars['product_id']->value,'width'=>((string)$_smarty_tpl->tpl_vars['width']->value),'height'=>((string)$_smarty_tpl->tpl_vars['height']->value),'resize_mode'=>"borders",'limit'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('elseloop', array('rel'=>"product_thumbnail")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"product_thumbnail"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <img itemprop="image" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->functionImage(array('file'=>'assets/dist/img/218x146.png'),$_smarty_tpl);?>
" class="img-responsive" alt="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['productTitle']->value,$_smarty_tpl);?>
">
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elseloop'][0][0]->theliaElseloop(array('rel'=>"product_thumbnail"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </a>

        <div class="product-info col-sm-6">
            <h2 class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><span itemprop="name"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['productTitle']->value,$_smarty_tpl);?>
</span></a></h2>
            <?php if ($_smarty_tpl->tpl_vars['hasDescription']->value) {?>
            <div class="description" itemprop="description">
                <p><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</p>
            </div>
            <?php }?>
        </div>

        
        <?php $_smarty_tpl->tpl_vars["current_stock_content"] = new Smarty_variable("in_stock", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["current_stock_href"] = new Smarty_variable("http://schema.org/InStock", null, 0);?>
        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['config'][0][0]->configDataAccess(array('key'=>"check-available-stock"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=0) {?>
            <?php if ($_smarty_tpl->tpl_vars['VIRTUAL']->value==0&&$_smarty_tpl->tpl_vars['QUANTITY']->value<=0) {?>
                <?php $_smarty_tpl->tpl_vars["current_stock_content"] = new Smarty_variable("out_stock", null, 0);?>
                <?php $_smarty_tpl->tpl_vars["current_stock_href"] = new Smarty_variable("http://schema.org/OutOfStock", null, 0);?>
            <?php }?>
        <?php }?>

        <div class="product-price col-sm-3">
            <div class="price-container row" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <meta itemprop="category" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>"title"),$_smarty_tpl);?>
">
                
                <meta itemprop="itemCondition" itemscope itemtype="http://schema.org/NewCondition">
                
                <meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
">
                <link itemprop="availability" href="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['current_stock_href']->value,$_smarty_tpl);?>
" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['current_stock_content']->value,$_smarty_tpl);?>
" />
                <?php if ($_smarty_tpl->tpl_vars['IS_PROMO']->value) {?>

                    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['count'][0][0]->theliaCount(array('type'=>"product_sale_elements",'promo'=>"1",'product'=>$_smarty_tpl->tpl_vars['ID']->value),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["combination_count"] = new Smarty_variable($_tmp2, null, 0);?>
                    <span class="special-price col-xs-6"><span itemprop="price" class="price-label"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Special Price:"),$_smarty_tpl);?>
 </span><span class="price">
                        <?php if ($_smarty_tpl->tpl_vars['combination_count']->value>1) {?>
                            <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['BEST_TAXED_PRICE']->value,'symbol'=>$_tmp3),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"From %price",'price'=>$_tmp4),$_smarty_tpl);?>

                        <?php } else { ?>
                            <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['BEST_TAXED_PRICE']->value,'symbol'=>$_tmp5),$_smarty_tpl);?>

                        <?php }?>
                    </span></span>
                    <?php if ($_smarty_tpl->tpl_vars['SHOW_ORIGINAL_PRICE']->value) {?>
                    <span class="old-price col-xs-6"><span class="price-label"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Regular Price:"),$_smarty_tpl);?>
 </span><span class="price"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['TAXED_PRICE']->value,'symbol'=>$_tmp6),$_smarty_tpl);?>
</span></span>
                    <?php }?>
                <?php } else { ?>
                    <span class="regular-price col-xs-12"><span itemprop="price" class="price"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['currency'][0][0]->currencyDataAccess(array('attr'=>"symbol"),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_money'][0][0]->formatMoney(array('number'=>$_smarty_tpl->tpl_vars['BEST_TAXED_PRICE']->value,'symbol'=>$_tmp7),$_smarty_tpl);?>
</span></span>
                <?php }?>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['hasBtn']->value==true) {?>
                <?php if ($_smarty_tpl->tpl_vars['hasSubmit']->value==true&&$_smarty_tpl->tpl_vars['current_stock_content']->value=="in_stock") {?>
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"thelia.cart.add")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"thelia.cart.add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <form id="form-product-details<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['product_id']->value,$_smarty_tpl);?>
" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrlFunction(array('path'=>"/cart/add"),$_smarty_tpl);?>
" method="post" class="form-product">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_hidden_fields'][0][0]->renderHiddenFormField(array(),$_smarty_tpl);?>

                        <input type="hidden" name="view" value="product">
                        <input type="hidden" name="product_id" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['product_id']->value,$_smarty_tpl);?>
">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"append")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"append"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <input type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="1">
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"append"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php if ($_smarty_tpl->tpl_vars['form_error']->value) {?><div class="alert alert-error"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['form_error_message']->value,$_smarty_tpl);?>
</div><?php }?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>'product_sale_elements_id')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'product_sale_elements_id'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <input type="hidden" class="pse-id" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['PRODUCT_SALE_ELEMENT']->value,$_smarty_tpl);?>
" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'product_sale_elements_id'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>"product")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"product"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <input id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" type="hidden" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['product_id']->value,$_smarty_tpl);?>
" <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl);?>
 >
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>"product"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <fieldset class="product-cart form-inline">
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('form_field', array('field'=>'quantity')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'quantity'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <div class="form-group group-qty hide <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>has-error<?php } elseif ($_smarty_tpl->tpl_vars['value']->value!=''&&!$_smarty_tpl->tpl_vars['error']->value) {?>has-success<?php }?>">
                                    <label for="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
"><?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label']->value,$_smarty_tpl);?>
</label>
                                    <input type="number" name="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl);?>
" id="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['label_attr']->value['for'],$_smarty_tpl);?>
" class="form-control" value="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape((($tmp = @$_smarty_tpl->tpl_vars['value']->value)===null||$tmp==='' ? 1 : $tmp),$_smarty_tpl);?>
" min="0" required>
                                    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
                                        <span class="help-block"><i class="fa fa-remove"></i> <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['message']->value,$_smarty_tpl);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['value']->value!=''&&!$_smarty_tpl->tpl_vars['error']->value) {?>
                                        <span class="help-block"><i class="fa fa"></i></span>
                                    <?php }?>
                                </div>
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form_field'][0][0]->renderFormField(array('field'=>'quantity'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            <div>
                                <div class="product-btn">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Add to cart"),$_smarty_tpl);?>
</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]->generateForm(array('name'=>"thelia.cart.add"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php } else { ?>
                    <div>
                        <div class="product-btn">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"View product"),$_smarty_tpl);?>
</a>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"singleproduct.bottom",'product'=>((string)$_smarty_tpl->tpl_vars['product_id']->value)),$_smarty_tpl);?>


    </article><!-- /product -->
</li>
<?php }} ?>
