<?php /* Smarty version Smarty-3.1.13, created on 2013-06-23 07:42:35
         compiled from ".\app\views\templates\pages\folder\create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1717851c6a66ab2c6d2-99132869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0207cda5a4b341684f052c9e34b49fdee61fa8c' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\folder\\create.tpl',
      1 => 1371973353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1717851c6a66ab2c6d2-99132869',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c6a66ab85468_24967255',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c6a66ab85468_24967255')) {function content_51c6a66ab85468_24967255($_smarty_tpl) {?><div class="row">
    <div class="large-12 columns">
        <h3></h3>
        <ul class="breadcrumbs">
            <li><a href="/folder">Folders</a></li>
            <li class="current"><a href="#">Create</a></li>
        </ul>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("pages/folder/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>