<?php /* Smarty version Smarty-3.1.15, created on 2014-05-06 04:49:57
         compiled from "M:\home\test1_ru.ru\www\abiturient\application\view\addAbiturientForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1873353269ab9325008-02194273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed21e9f32b2eea607fe73f345108a5065a618b1f' => 
    array (
      0 => 'M:\\home\\test1_ru.ru\\www\\abiturient\\application\\view\\addAbiturientForm.tpl',
      1 => 1399351795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1873353269ab9325008-02194273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53269ab9650a34_80560838',
  'variables' => 
  array (
    'abiturient_id' => 0,
    'site_root' => 0,
    'data' => 0,
    'schools' => 0,
    'school' => 0,
    'ege' => 0,
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53269ab9650a34_80560838')) {function content_53269ab9650a34_80560838($_smarty_tpl) {?><!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
         <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php if ($_smarty_tpl->tpl_vars['abiturient_id']->value==0) {?>Введите информацию о абитуриенте<?php } else { ?>Внесите исправления<?php }?></h5>
            <!-- .toolbar -->
            <div class="toolbar">
                <ul class="nav">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/cabinet">Вернутся в кабинет</a></li>
                   <!-- 
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-th-large"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">q</a></li>
                            <li><a href="">a</a></li>
                            <li><a href="">b</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                            <i class="icon-chevron-up"></i>
                        </a>
                    </li>
                     -->
                </ul>
            </div>
            <!-- /.toolbar -->
        </header>
        <div  class="accordion-body collapse in body">
            <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addAbiturient" method="POST">
                <div class="form-group">
                    <label class="control-label col-lg-4">Фамилия</label>
                    <div class="col-lg-8">
                        <input name="second_name" placeholder="Фамилия" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['second_name'];?>
">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4">Имя</label>
                    <div class="col-lg-8">
                        <input name="name" placeholder="Имя" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-4">Отчество</label>
                    <div class="col-lg-8">
                        <input name="patronymic" placeholder="Отчество" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['patronymic'];?>
">
                    </div>
                </div>
                <div class="form-group">
                    <label  row=2 class="control-label col-lg-4">Контактный телефон</label>
                    <div class="col-lg-8">
                        <textarea name="phone_number" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['phone_number'];?>
</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">Адрес</label>
                    <div class="col-lg-8">
                        <textarea name="adress" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['adress'];?>
</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">Класс</label>
                    <div class="col-lg-8">
                        <select name="class" class="form-control">
						  <option value="11" <?php if ($_smarty_tpl->tpl_vars['data']->value['class']==11) {?>selected<?php }?>>11</option>
						  <option value="10" <?php if ($_smarty_tpl->tpl_vars['data']->value['class']==10) {?>selected<?php }?>>10</option>
						  <option value="9" <?php if ($_smarty_tpl->tpl_vars['data']->value['class']==9) {?>selected<?php }?>>9</option>
						  <option value="8" <?php if ($_smarty_tpl->tpl_vars['data']->value['class']==8) {?>selected<?php }?>>8</option>
						  <option value="7" <?php if ($_smarty_tpl->tpl_vars['data']->value['class']==7) {?>selected<?php }?>>7</option>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Школа</label>
                    <div class="col-lg-8">
                        <select name="school_id" class="form-control">
                          <?php  $_smarty_tpl->tpl_vars['school'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['school']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['schools']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['school']->key => $_smarty_tpl->tpl_vars['school']->value) {
$_smarty_tpl->tpl_vars['school']->_loop = true;
?>
						  		<option value="<?php echo $_smarty_tpl->tpl_vars['school']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['school_id']==$_smarty_tpl->tpl_vars['school']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['school']->value['school_name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['school']->value['region_name'];?>
)</option>						  
						  <?php } ?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Экзамены ЕГЭ</label>
                    <div class="col-lg-8">
                    	<?php if ($_smarty_tpl->tpl_vars['ege']->value[1]) {?>
                        	Физика <input type="checkbox" name="fiz" checked>
                        <?php } else { ?>
                        	Физика <input type="checkbox" name="fiz">
                        <?php }?> 
                        <br/>
                        <?php if ($_smarty_tpl->tpl_vars['ege']->value[2]) {?> 
                        	Информатика <input type="checkbox" name="math" checked>
                        <?php } else { ?>
                        	Информатика <input type="checkbox" name="math">	
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">События</label>
                    <div class="col-lg-8">
                    	<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
                    		<input type="checkbox" name="event<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['event']->value['checked']) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['event']->value['event_name'];?>
<br/>
                    	<?php } ?>                    	 
                    </div>
                </div>
            
           <!--    
                <div class="form-group">
                    <label  class="control-label col-lg-4">Оки доки</label>
                    <div class="col-lg-8">
                        <select name="class" class="form-control">
						  <option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['document']==0) {?>selected<?php }?>>Не сдал лузер</option>
						  <option value="1"    <?php if ($_smarty_tpl->tpl_vars['data']->value['document']==1) {?>selected<?php }?>>Сдал</option>
						</select>
                    </div>
                </div>
            -->   
           
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Документы</label>
                    <div class="col-lg-8">
                        тадааам = <?php echo $_smarty_tpl->tpl_vars['data']->value['document'];?>
 
                    	<?php if ($_smarty_tpl->tpl_vars['data']->value['document']==1) {?>
                        	Сдал(а) <input type="checkbox" name="document" checked>
                        <?php } else { ?>
                          	Cдал(а) <input type="checkbox" name="document">
                        <?php }?> 
                        <br/>
                    </div>
                </div>            
                    
                       
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4"></label>
                    <div class="col-lg-8">
                         <input type="submit" class="btn btn-success" value="Отправить данные">
                    </div>
                </div>
                <input type="hidden" name="Location" value="addAbiturientForm"/>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['abiturient_id']->value;?>
"/>
            </form>
        </div>
    </div>
    </div>
</div><?php }} ?>
