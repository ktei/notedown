<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 11:07:41
         compiled from ".\app\views\templates\pages\note\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:758751c05e561e7df1-36938164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d3e7ee4993244248e2823b4c01a60dbd8a2c540' => 
    array (
      0 => '.\\app\\views\\templates\\pages\\note\\form.tpl',
      1 => 1371640052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '758751c05e561e7df1-36938164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c05e561efb50_51928738',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c05e561efb50_51928738')) {function content_51c05e561efb50_51928738($_smarty_tpl) {?><div class="row">
    <div class="large-12 columns">
        <h5>Create note</h5>
        <form>
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" placeholder="Title">
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <textarea placeholder="Content" class="large"></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="large-12 columns">
                    <a href="#" class="button">Create</a>
                    <a href="#" class="button secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>