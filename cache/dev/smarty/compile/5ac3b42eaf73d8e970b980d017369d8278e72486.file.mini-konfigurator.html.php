<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-12 10:11:46
         compiled from "C:\xampp\htdocs\heizfabrik\local\modules\HookKonfigurator\templates\frontOffice\default\mini-konfigurator.html" */ ?>
<?php /*%%SmartyHeaderCode:26646570cadc2ca2e56-08091825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ac3b42eaf73d8e970b980d017369d8278e72486' => 
    array (
      0 => 'C:\\xampp\\htdocs\\heizfabrik\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default\\mini-konfigurator.html',
      1 => 1460385118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26646570cadc2ca2e56-08091825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category_id' => 0,
    'product_page' => 0,
    'product_order' => 0,
    'ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570cadc2cc1740_19773340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570cadc2cc1740_19773340')) {function content_570cadc2cc1740_19773340($_smarty_tpl) {?><div class="products-content">
	<ul class="list-unstyled">
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('type'=>"product_heizung",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"8",'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product_heizung",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"8",'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

			<?php echo $_smarty_tpl->getSubTemplate ("includes/single-product.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_id'=>$_smarty_tpl->tpl_vars['ID']->value,'hasBtn'=>true,'hasDescription'=>true,'hasQuickView'=>true,'width'=>"218",'height'=>"146"), 0);?>

		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('type'=>"product_heizung",'name'=>"product_list",'category'=>$_smarty_tpl->tpl_vars['category_id']->value,'limit'=>"8",'page'=>$_smarty_tpl->tpl_vars['product_page']->value,'order'=>$_smarty_tpl->tpl_vars['product_order']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	</ul>
</div>    
<?php }} ?>
