<?php /* Smarty version Smarty-3.1.15, created on 2014-05-11 10:31:52
         compiled from "/var/sites/ikvts2013.bsu.ru/site/www//abiturient/application/view/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237798713536ed3087370b9-42057464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54c6a30ef8bc78a15a0ed2370f5a6e91b70f1294' => 
    array (
      0 => '/var/sites/ikvts2013.bsu.ru/site/www//abiturient/application/view/header.tpl',
      1 => 1399692522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237798713536ed3087370b9-42057464',
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
  'unifunc' => 'content_536ed30884b111_28515062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ed30884b111_28515062')) {function content_536ed30884b111_28515062($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8ru">
        <title>Проект Абитуриент</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/css/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
"/>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/Font-Awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/datatables/css/DT_bootstrap.css">  
        <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/jquery/jquery-2.0.3.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/bootstrap/js/bootstrap.min.js"></script>              
        <script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/datatables/DT_bootstrap.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/tablesorter/js/jquery.tablesorter.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/js/main.js"></script>       
        <script>
            $(function() { 
                metisTable(); metisSortable();
                });
        </script>
        
    </head>
<body>
        <div id="wrap">
            <div id="top">
                <!-- .navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <header class="navbar-header">	    
    	<a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
" class="navbar-brand">LOGO</a>
    </header>
    <div class="topnav">
        <div class="btn-toolbar">
            <div class="btn-group">
                <a data-placement="bottom" data-original-title="Показать / Скрыть левое меню" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
                    <i class="icon-resize-horizontal"></i>
                </a>
            </div>
           <!-- <div class="btn-group">
                <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip" class="btn btn-default btn-sm">
                    <i class="icon-envelope"></i>
                    <span class="label label-warning">5</span>
                </a>
                <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                    <i class="icon-comments"></i>
                    <span class="label label-danger">4</span>
                </a>
            </div> --> 
            <div class="btn-group">
                <a  data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addAbiturientForm">
                    <i class="icon-file"></i>
                </a>
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                    <i class="icon-question-sign"></i>
                </a>
            </div>
            <div class="btn-group">
                <a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/logOut" data-toggle="tooltip" data-original-title="Выйти из системы" data-placement="bottom" class="btn btn-metis-1 btn-sm">
		  			<i class="icon-off"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- /.navbar -->

                <!-- header.head -->
                <header class="head">
                    <div class="search-bar">
                        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                            <i class="icon-sort"></i>
                        </a>
                    </div>
                    <!-- ."main-bar -->
                    <div class="main-bar">
                        <h3><i class="icon-table"></i> Table</h3>
                    </div>
                    <!-- /.main-bar -->
                </header>
                <!-- end header.head -->


            </div>
            <!-- /#top -->

            <div id="left">
                <div class="media user-media">
    <a class="user-link" href="">
	<img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/assets/img/avatar.png">
	<span class="label label-danger user-label">16</span>
    </a>

    <div class="media-body">
	<h5 class="media-heading">Archie</h5>
	<ul class="list-unstyled user-info">
	    <li><a href="">Administrator</a></li>
	    <li>Last Access : <br>
		<small><i class="icon-calendar"></i> 16 Mar 16:32</small>
	    </li>
	</ul>
    </div>
</div>
<!-- #menu -->
<ul id="menu" class="collapse">
    <li class="nav-header">Menu</li>
    <li class="nav-divider"></li>
    <li class="panel ">
	<a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/cabinet" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#dashboard-nav">
	    <i class="icon-dashboard"></i> Сводная информация 
	    <span class="pull-right">
		<i class="icon-angle-left"></i>
            </span>
	</a>
	
    <li ><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addAbiturientForm"><i class="icon-plus"></i> Добавить пользователя</a></li>
    
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/logOut"><i class="icon-signin"></i> Выйти из системы</a></li>
</ul>
<!-- /#menu -->
            </div>
            <!-- /#left -->

            <div id="content">
                <div class="outer">
                    <div class="inner"><?php }} ?>
