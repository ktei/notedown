<?php /* Smarty version Smarty-3.1.13, created on 2013-06-23 11:05:00
         compiled from ".\app\views\templates\pages\folder\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1813951bf07c7481ee7-88460838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43ba166c9795e5c502e30c6e19d4d23096e80f2f' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\folder\\index.tpl',
      1 => 1371985494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1813951bf07c7481ee7-88460838',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bf07c74850e8_73101775',
  'variables' => 
  array (
    'folders' => 0,
    'folder' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bf07c74850e8_73101775')) {function content_51bf07c74850e8_73101775($_smarty_tpl) {?><div class="row">
    <div class="large-12 columns">
        <ul class="breadcrumbs">
            <li class="current"><a href="#">Folders</a></li>
            <li><a href="/folder/create"><i class="icon-plus icon-large"></i></a></li>
        </ul>
        <table class="table">
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['folder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['folder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['folders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['folder']->key => $_smarty_tpl->tpl_vars['folder']->value){
$_smarty_tpl->tpl_vars['folder']->_loop = true;
?>
                    <tr>
                        <td width=30><i class="icon-folder-close-alt icon-large"></i></td>
                        <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['folder']->value['name'];?>
</a></td>
                        <td width=200 class="show-for-medium-up">Created on <?php echo date("j M Y",strtotime($_smarty_tpl->tpl_vars['folder']->value['created_date']));?>
</td>
                        <td width=55>
                            <a href="#"><i class="icon-edit icon-large"></i></a>
                            <a href="/folder/delete/<?php echo $_smarty_tpl->tpl_vars['folder']->value['id'];?>
"><i class="icon-trash icon-large"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php }} ?>