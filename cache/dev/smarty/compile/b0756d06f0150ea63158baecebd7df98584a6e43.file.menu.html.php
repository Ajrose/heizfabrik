<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:39:42
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\includes\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:7790570fd5de3ff0b3-27961598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0756d06f0150ea63158baecebd7df98584a6e43' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\includes\\menu.html',
      1 => 1460457122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7790570fd5de3ff0b3-27961598',
  'function' => 
  array (
    'menu' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'parent_cat' => 0,
    'PARENT' => 0,
    'ID' => 0,
    'level' => 0,
    'parent' => 0,
    'parent_cat_ids' => 0,
    'CHILD_COUNT' => 0,
    'URL' => 0,
    'TITLE' => 0,
    'collapsed' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570fd5de445047_08882753',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd5de445047_08882753')) {function content_570fd5de445047_08882753($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.sidebar-top"),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('ifhook', array('rel'=>"category.sidebar-body")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"category.sidebar-body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

   <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.sidebar-body"),$_smarty_tpl);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['ifhook'][0][0]->ifHook(array('rel'=>"category.sidebar-body"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('elsehook', array('rel'=>"category.sidebar-body")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"category.sidebar-body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<section id="categories" class="block block-nav" role="navigation" aria-labelledby="categories-label">
    <div class="block-heading">
        <h3 class="block-title" id="categories-label"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['intl'][0][0]->translate(array('l'=>"Categories"),$_smarty_tpl);?>
</h3>
    </div>
    <div class="block-content">
        <nav class="nav-categories">

            <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['category'][0][0]->categoryDataAccess(array('attr'=>"parent"),$_smarty_tpl);?>
<?php $_tmp29=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["parent_cat"] = new Smarty_variable($_tmp29, null, 0);?>

            <?php $_smarty_tpl->tpl_vars["parent_cat_ids"] = new Smarty_variable(array(), null, 0);?>

            
            <?php while ($_smarty_tpl->tpl_vars['parent_cat']->value!=0) {?>
                <?php $_smarty_tpl->tpl_vars["current_loop_cat"] = new Smarty_variable($_smarty_tpl->tpl_vars['parent_cat']->value, null, 0);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"set_parent_category",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['parent_cat']->value)); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"set_parent_category",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['parent_cat']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <?php $_smarty_tpl->tpl_vars["parent_cat"] = new Smarty_variable($_smarty_tpl->tpl_vars['PARENT']->value, null, 0);?>
                    <?php $_smarty_tpl->createLocalArrayVariable("parent_cat_ids", null, 0);
$_smarty_tpl->tpl_vars["parent_cat_ids"]->value[] = $_smarty_tpl->tpl_vars['ID']->value;?>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"set_parent_category",'type'=>"category",'id'=>$_smarty_tpl->tpl_vars['parent_cat']->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>

            
            <?php if (!function_exists('smarty_template_function_menu')) {
    function smarty_template_function_menu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['menu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
            <?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?>
                <ul id="category" class="accordion">
            <?php } else { ?>
                <?php if (in_array($_smarty_tpl->tpl_vars['parent']->value,$_smarty_tpl->tpl_vars['parent_cat_ids']->value)) {?>
                    <ul id="collapse<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['parent']->value,$_smarty_tpl);?>
" class="in">
                <?php } else { ?>
                    <ul id="collapse<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['parent']->value,$_smarty_tpl);?>
" class="collapse">
                <?php }?>
            <?php }?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('loop', array('name'=>"cat-parent-".((string)$_smarty_tpl->tpl_vars['level']->value),'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['parent']->value,'need_count_child'=>1,'not_empty'=>"1")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"cat-parent-".((string)$_smarty_tpl->tpl_vars['level']->value),'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['parent']->value,'need_count_child'=>1,'not_empty'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if ($_smarty_tpl->tpl_vars['CHILD_COUNT']->value>0) {?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl->tpl_vars['parent_cat_ids']->value)) {?>
                        <?php $_smarty_tpl->tpl_vars["collapsed"] = new Smarty_variable('', null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["collapsed"] = new Smarty_variable("collapsed", null, 0);?>
                    <?php }?>

                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">
                            <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
 (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['count'][0][0]->theliaCount(array('type'=>"product",'category'=>$_smarty_tpl->tpl_vars['ID']->value),$_smarty_tpl);?>
)
                        </a>

                        <a href="#collapse<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
" class="accordion-toggle <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['collapsed']->value,$_smarty_tpl);?>
" data-toggle="collapse" data-parent="#collapse<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['ID']->value,$_smarty_tpl);?>
"></a>

                        <?php smarty_template_function_menu($_smarty_tpl,array('parent'=>$_smarty_tpl->tpl_vars['ID']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">
                            <?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl);?>
 (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['count'][0][0]->theliaCount(array('type'=>"product",'category'=>$_smarty_tpl->tpl_vars['ID']->value),$_smarty_tpl);?>
)
                        </a>
                    </li>
                <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['loop'][0][0]->theliaLoop(array('name'=>"cat-parent-".((string)$_smarty_tpl->tpl_vars['level']->value),'type'=>"category",'parent'=>$_smarty_tpl->tpl_vars['parent']->value,'need_count_child'=>1,'not_empty'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            </ul>
            <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


            <?php smarty_template_function_menu($_smarty_tpl,array('parent'=>'0'));?>


        </nav>
    </div>
</section>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['elsehook'][0][0]->elseHook(array('rel'=>"category.sidebar-body"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->processHookFunction(array('name'=>"category.sidebar-bottom"),$_smarty_tpl);?>

<?php }} ?>
