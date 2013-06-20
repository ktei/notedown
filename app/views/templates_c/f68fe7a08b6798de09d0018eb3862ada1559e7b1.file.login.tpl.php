<?php /* Smarty version Smarty-3.1.13, created on 2013-06-20 12:39:15
         compiled from ".\app\views\templates\pages\public\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217351c1917ed34e90-91577841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f68fe7a08b6798de09d0018eb3862ada1559e7b1' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\public\\login.tpl',
      1 => 1371731952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217351c1917ed34e90-91577841',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c1917ed63cc5_22483487',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c1917ed63cc5_22483487')) {function content_51c1917ed63cc5_22483487($_smarty_tpl) {?><?php if (!is_callable('smarty_function_show_errors')) include 'C:\\dev\\github\\notedown\\app\\libs\\smarty\\plugins\\function.show_errors.php';
if (!is_callable('smarty_function_field_error')) include 'C:\\dev\\github\\notedown\\app\\libs\\smarty\\plugins\\function.field_error.php';
?><div class="row">
    <div class="large-8 large-centered columns">
        <h5>Welcome back</h5>
        <?php echo smarty_function_show_errors(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'login','title'=>'Login failed'),$_smarty_tpl);?>

        <form action="/public/login" method="POST">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->username;?>
"
                           placeholder="Email or username"/>
                    <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'username'),$_smarty_tpl);?>

                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->password;?>
"
                           placeholder="Password"/>
                    <?php echo smarty_function_field_error(array('model'=>$_smarty_tpl->tpl_vars['model']->value,'name'=>'password'),$_smarty_tpl);?>

                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input class="button" type="submit" value="Log in"/>
                    <a href="/" class="button secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>