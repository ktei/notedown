<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 12:50:37
         compiled from ".\app\views\templates\pages\public\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1618351c19086301b45-14574596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f64435980c71d0e2ae69c1eb3fea6bc50628bf1' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\public\\signup.tpl',
      1 => 1371646228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1618351c19086301b45-14574596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c190863cf2b4_99753560',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c190863cf2b4_99753560')) {function content_51c190863cf2b4_99753560($_smarty_tpl) {?><?php if (!is_callable('smarty_function_field_error')) include 'C:\\dev\\github\\notedown\\app\\libs\\smarty\\plugins\\function.field_error.php';
?><div class="row">
    <div class="large-8 large-centered columns">
        <h5>Create free personal account</h5>
        <form action="/public/signup" method="POST">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->username;?>
"
                           placeholder="Pick up a username"/>
                    <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'username'),$_smarty_tpl);?>

                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->email;?>
"
                           placeholder="Provide a valid email"/>
                    <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'email'),$_smarty_tpl);?>

                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->password;?>
"
                           placeholder="Create a password"/>
                    <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'password'),$_smarty_tpl);?>

                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input class="button" type="submit" value="Sign up"/>
                    <a href="/" class="button secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>