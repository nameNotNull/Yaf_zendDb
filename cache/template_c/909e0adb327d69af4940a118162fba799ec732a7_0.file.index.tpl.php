<?php /* Smarty version 3.1.27, created on 2015-08-19 09:38:33
         compiled from "D:\www\yafapp\application\views\index\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1457555d432790e3991_84117482%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '909e0adb327d69af4940a118162fba799ec732a7' => 
    array (
      0 => 'D:\\www\\yafapp\\application\\views\\index\\index.tpl',
      1 => 1439969686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1457555d432790e3991_84117482',
  'variables' => 
  array (
    'contentaa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d432790f3390_78606027',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d432790f3390_78606027')) {
function content_55d432790f3390_78606027 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1457555d432790e3991_84117482';
?>

<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
<?php echo $_smarty_tpl->tpl_vars['contentaa']->value;?>
 
 </body>
</html>
<?php }
}
?>