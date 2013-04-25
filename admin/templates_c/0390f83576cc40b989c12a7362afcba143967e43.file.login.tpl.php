<?php /* Smarty version Smarty-3.1.12, created on 2013-04-25 21:01:24
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3115151730be2d828d1-65494530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0390f83576cc40b989c12a7362afcba143967e43' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1366923675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3115151730be2d828d1-65494530',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51730be2d86956_96255730',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51730be2d86956_96255730')) {function content_51730be2d86956_96255730($_smarty_tpl) {?><div class="center login">
<div class="box round center">
                <h2>Login</h2>
                <div class="block">
                   <form method="post" id="adminLoginForm" name="adminLoginFrom">
                    <table class="form">
                        <tbody>
                        
                        <tr>
                            <td>
                                <label>
                                    Username:</label>
                            </td>
                            <td>
                                <input type="text" class="large" name="username" id="username" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Password:</label>
                            </td>
                            <td>
                                <input type="password" class="large" name="password" id="password" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                <button class="btn-icon btn-blue btn-arrow-right" name="adminLoginSubmit" id="adminLoginSubmit"><span></span>Login</button>
                            </td>
                        </tr>
                    </tbody></table>
                    </form>
                </div>
            </div>
            </div><?php }} ?>