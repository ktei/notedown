<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 11:09:50
         compiled from ".\app\views\templates\pages\public\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217351c1917ed34e90-91577841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f68fe7a08b6798de09d0018eb3862ada1559e7b1' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\public\\login.tpl',
      1 => 1371640182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217351c1917ed34e90-91577841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c1917ed63cc5_22483487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c1917ed63cc5_22483487')) {function content_51c1917ed63cc5_22483487($_smarty_tpl) {?><div class="row">
    <div class="large-8 large-centered columns">
        <h5>Welcome back</h5>
        <form method="POST">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username"
                           placeholder="Email or username"/>
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password"
                           placeholder="Password"/>
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