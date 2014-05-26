<?php /* Smarty version Smarty-3.1.15, created on 2014-05-05 17:30:06
         compiled from "M:\home\test1_ru.ru\www\abiturient\application\view\cabinet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2599853269a4ba6b005-46740139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29af0fdcd7a8caf99bfa6b784e0d03b985541786' => 
    array (
      0 => 'M:\\home\\test1_ru.ru\\www\\abiturient\\application\\view\\cabinet.tpl',
      1 => 1399311004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2599853269a4ba6b005-46740139',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53269a4bbbe391_55771289',
  'variables' => 
  array (
    'data' => 0,
    'site_root' => 0,
    'elem' => 0,
    'ege' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53269a4bbbe391_55771289')) {function content_53269a4bbbe391_55771289($_smarty_tpl) {?>
<!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
        <div class="box">
            <header>
                 <h5>Таблица Абитуриентов</h5>
            </header>
            <div id="collapse4" class="body">
                <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
    <tr>
    	<th></th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Район</th>
        <th>Класс</th>
        <th>Школа</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>ЕГЭ</th>
        <th>Соб</th>
        <th>Документы</th>        
    </tr>
</thead>
<tbody>
    
    
	<?php  $_smarty_tpl->tpl_vars['elem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem']->key => $_smarty_tpl->tpl_vars['elem']->value) {
$_smarty_tpl->tpl_vars['elem']->_loop = true;
?>
    	<tr>
    		<td >
    			<a class="btn btn-default btn-sm" title="Редактировать" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addAbiturientForm/?user_id=<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
">
                    <i class="icon-edit"></i>
                </a>
                <!-- <a class="btn btn-default btn-sm" title="Добавить событие" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addCuratorEventForm/?user_id=<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
"> 
                <i class="icon-comments"></i>
                </a> -->
            </td>
	        <td>
	        	<a class="btn btn-default btn-sm" title="Добавить событие" href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addCuratorEventForm/?user_id=<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
"> 
                	<i class="icon-comments"></i>
                </a>
	        	<?php echo $_smarty_tpl->tpl_vars['elem']->value['second_name'];?>
 <?php if ($_smarty_tpl->tpl_vars['elem']->value['curator_events']>0) {?> (<a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/showCuratorEvents/?abiturient_id=<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['elem']->value['curator_events'];?>
</a>)<?php }?>	        	
            </td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['name'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['patronymic'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['region'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['class'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['school'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['phone_number'];?>
</td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['adress'];?>
</td>
	        <td>
	        	<?php  $_smarty_tpl->tpl_vars['ege'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ege']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elem']->value['ege']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ege']->key => $_smarty_tpl->tpl_vars['ege']->value) {
$_smarty_tpl->tpl_vars['ege']->_loop = true;
?>
	        		<b><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['ege']->value['subject_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['ege']->value['subject_icon'];?>
</a></b>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elem']->value['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
	        		<b><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['event']->value['event_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value['event_icon'];?>
</a></b>
	        	<?php } ?>
	        </td>
	        <td><?php echo $_smarty_tpl->tpl_vars['elem']->value['document'];?>
</td>            
    	</tr>	
    <?php } ?>
    
</tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php }} ?>
