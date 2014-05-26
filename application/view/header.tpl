<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8ru">
        <title>Проект Абитуриент</title>
        <link rel="stylesheet" href="{$site_root}/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{$site_root}/assets/css/{$css}"/>
        <link rel="stylesheet" href="{$site_root}/assets/Font-Awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="{$site_root}/assets/datatables/css/DT_bootstrap.css">  
        <script src="{$site_root}/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="{$site_root}/assets/jquery/jquery-2.0.3.min.js"></script>
        <script src="{$site_root}/assets/bootstrap/js/bootstrap.min.js"></script>              
        <script src="{$site_root}/assets/datatables/jquery.dataTables.js"></script>
		<script src="{$site_root}/assets/datatables/DT_bootstrap.js"></script>
		<script src="{$site_root}/assets/tablesorter/js/jquery.tablesorter.min.js"></script>
		<script src="{$site_root}/assets/js/main.js"></script>       
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
    	<a href="{$site_root}" class="navbar-brand">LOGO</a>
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
                <a  data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="{$site_root}/addAbiturientForm">
                    <i class="icon-file"></i>
                </a>
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                    <i class="icon-question-sign"></i>
                </a>
            </div>
            <div class="btn-group">
                <a href="{$site_root}/logOut" data-toggle="tooltip" data-original-title="Выйти из системы" data-placement="bottom" class="btn btn-metis-1 btn-sm">
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
	<img class="media-object img-thumbnail user-img" alt="User Picture" src="{$site_root}/assets/img/avatar.png">
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
	<a href="{$site_root}/cabinet" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#dashboard-nav">
	    <i class="icon-dashboard"></i> Сводная информация 
	    <span class="pull-right">
		<i class="icon-angle-left"></i>
            </span>
	</a>
	
    <li ><a href="{$site_root}/addAbiturientForm"><i class="icon-plus"></i> Добавить пользователя</a></li>
    
    <li><a href="{$site_root}/logOut"><i class="icon-signin"></i> Выйти из системы</a></li>
</ul>
<!-- /#menu -->
            </div>
            <!-- /#left -->

            <div id="content">
                <div class="outer">
                    <div class="inner">