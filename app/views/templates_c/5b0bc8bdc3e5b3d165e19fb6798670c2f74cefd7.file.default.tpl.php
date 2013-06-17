<?php /* Smarty version Smarty-3.1.13, created on 2013-06-16 12:41:05
         compiled from ".\app\views\templates\layouts\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3380519b28d2212386-85258270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b0bc8bdc3e5b3d165e19fb6798670c2f74cefd7' => 
    array (
      0 => '.\\app\\views\\templates\\layouts\\default.tpl',
      1 => 1371386462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3380519b28d2212386-85258270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_519b28d221aa35_72595122',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519b28d221aa35_72595122')) {function content_519b28d221aa35_72595122($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php if (isset($_smarty_tpl->tpl_vars['title']->value)){?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php }?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/static/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="/static/css/app.css" type="text/css">

    </head>

    <body>

        <?php echo $_smarty_tpl->getSubTemplate ("layouts/header_public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("pages/".((string)$_smarty_tpl->tpl_vars['page']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <script src="/static/js/vendor/jquery-2.0.2.min.js"></script>
        <script src="/static/js/vendor/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>

    </body>
</html>
<?php }} ?>