<?php /* Smarty version Smarty-3.1.19-dev, created on 2016-04-14 19:39:41
         compiled from "C:\Development\programs\xampp\htdocs\heizfabrik\templates\frontOffice\default\includes\meta-seo.html" */ ?>
<?php /*%%SmartyHeaderCode:27248570fd5ddc849a2-97395781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1c8269b5cfce697502d35cb71f04036fd0a0591' => 
    array (
      0 => 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\templates\\frontOffice\\default\\includes\\meta-seo.html',
      1 => 1460457122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27248570fd5ddc849a2-97395781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'META_DESCRIPTION' => 0,
    'CHAPO' => 0,
    'META_KEYWORDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_570fd5ddc8f104_90080904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570fd5ddc8f104_90080904')) {function content_570fd5ddc8f104_90080904($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Development\\programs\\xampp\\htdocs\\heizfabrik\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['META_DESCRIPTION']->value) {?>
<meta name="description" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['META_DESCRIPTION']->value,$_smarty_tpl);?>
">
<?php } elseif ($_smarty_tpl->tpl_vars['CHAPO']->value) {?>
<meta name="description" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape(smarty_modifier_truncate($_smarty_tpl->tpl_vars['CHAPO']->value,150,''),$_smarty_tpl);?>
">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['META_KEYWORDS']->value) {?><meta name="keywords" content="<?php echo TheliaSmarty\Template\SmartyParser::theliaEscape($_smarty_tpl->tpl_vars['META_KEYWORDS']->value,$_smarty_tpl);?>
"><?php }?><?php }} ?>
