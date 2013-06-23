<?php /* Smarty version Smarty-3.1.13, created on 2013-06-23 08:17:39
         compiled from ".\app\views\templates\pages\folder\_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1185151c6a66ab9d1d9-93573480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01d99c6140f9a89d0060a641cff78ddf7aa6f13b' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\folder\\_form.tpl',
      1 => 1371975455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1185151c6a66ab9d1d9-93573480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c6a66aba02a2_28364418',
  'variables' => 
  array (
    'action' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c6a66aba02a2_28364418')) {function content_51c6a66aba02a2_28364418($_smarty_tpl) {?><?php if (!is_callable('smarty_function_field_error')) include 'C:\\dev\\github\\notedown\\app\\libs\\smarty\\plugins\\function.field_error.php';
?><form <?php if ($_smarty_tpl->tpl_vars['action']->value=='create'){?>action="/folder/create"<?php }else{ ?>action="/folder/edit/<?php echo $_smarty_tpl->tpl_vars['model']->value->folderId;?>
"<?php }?> method="POST">
    <div class="row">
        <div class="large-12 columns">
            <input type="text" placeholder="Give folder a name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->name;?>
">
            <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'name'),$_smarty_tpl);?>

        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button" <?php if ($_smarty_tpl->tpl_vars['action']->value=='create'){?>value="Create"<?php }else{ ?>value="Save changes"<?php }?>/>
            <a href="/folder" class="button secondary">Cancel</a>
        </div>
    </div>
</form><?php }} ?>