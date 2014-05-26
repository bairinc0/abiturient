<?php /* Smarty version Smarty-3.1.15, created on 2014-01-31 06:21:06
         compiled from "Z:\home\imibsu_ru.ru\www\abiturient\application\view\loginPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:459952eb40d2299170-14726240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26fb1d515433367bd70c39f417e4d355b435f9ae' => 
    array (
      0 => 'Z:\\home\\imibsu_ru.ru\\www\\abiturient\\application\\view\\loginPage.tpl',
      1 => 1390894320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '459952eb40d2299170-14726240',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_root' => 0,
    'css' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52eb40d236cc91_93088144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52eb40d236cc91_93088144')) {function content_52eb40d236cc91_93088144($_smarty_tpl) {?><!-- Страница логина -->
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8ru">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Страница логина">
    <meta name="author" content="Баир Хабитуев">
    <title>Страница логина</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/css/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/js/html5shiv.js"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="auth">
        <h3 class="form-signin-heading">Введите логин и пароль</h3>
        <input name="login" type="text" class="form-control" placeholder="Логин" autofocus>
        <input name="password" type="password" class="form-control" placeholder="Пароль">
        <input name="Location" type="hidden" value="LoginPage"/>        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
<?php }} ?>
