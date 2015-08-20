<?php /* Smarty version 3.1.27, created on 2015-08-19 09:38:33
         compiled from "D:\www\yafapp\application\views\error\error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1638055d4327931df19_89411964%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5d8389b89a5eeb0e58324b804412d3ef7ff0938' => 
    array (
      0 => 'D:\\www\\yafapp\\application\\views\\error\\error.tpl',
      1 => 1439969292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1638055d4327931df19_89411964',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d4327932d926_25350510',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d4327932d926_25350510')) {
function content_55d4327932d926_25350510 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1638055d4327931df19_89411964';
?>
<div><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
<?php }
}
?>