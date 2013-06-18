<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 13:42:27
         compiled from ".\app\views\templates\pages\note\create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3093051c05e560dc642-88679293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7553d6e553aa347e69a8f04b56357014bcc0a992' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\note\\create.tpl',
      1 => 1371562944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3093051c05e560dc642-88679293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c05e561b52d0_13237258',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c05e561b52d0_13237258')) {function content_51c05e561b52d0_13237258($_smarty_tpl) {?><div class="row">
    <div class="large-12 columns">
        <ul class="breadcrumbs">
            <li><a href="#">Folders</a></li>
            <li><a href="#">Folder A</a></li>
            <li class="current">Create note</li>
        </ul>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("pages/note/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>