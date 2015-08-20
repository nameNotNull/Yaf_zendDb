<?php /* Smarty version 3.1.24, created on 2015-08-19 09:58:09
         compiled from "D:/www/yafapp/application/views/error/error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2125755d4371195cb80_74885732%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41a947c9f8e15440a5075ac717465e9c5d9d03ac' => 
    array (
      0 => 'D:/www/yafapp/application/views/error/error.tpl',
      1 => 1439969292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2125755d4371195cb80_74885732',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55d4371199f213_82663647',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d4371199f213_82663647')) {
function content_55d4371199f213_82663647 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2125755d4371195cb80_74885732';
?>
<div><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
<?php }
}
?>