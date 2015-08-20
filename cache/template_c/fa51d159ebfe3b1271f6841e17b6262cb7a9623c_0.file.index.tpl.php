<?php /* Smarty version 3.1.24, created on 2015-08-19 09:58:09
         compiled from "D:/www/yafapp/application/views/index/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1128055d43711707071_25774994%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa51d159ebfe3b1271f6841e17b6262cb7a9623c' => 
    array (
      0 => 'D:/www/yafapp/application/views/index/index.tpl',
      1 => 1439969686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1128055d43711707071_25774994',
  'variables' => 
  array (
    'contentaa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55d43711741a02_53817395',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d43711741a02_53817395')) {
function content_55d43711741a02_53817395 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1128055d43711707071_25774994';
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