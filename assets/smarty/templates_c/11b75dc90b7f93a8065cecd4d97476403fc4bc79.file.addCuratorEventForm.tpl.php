<?php /* Smarty version Smarty-3.1.15, created on 2014-03-17 07:06:47
         compiled from "M:\home\test1_ru.ru\www\abiturient\application\view\addCuratorEventForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2963053269f078f63a2-18157146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b75dc90b7f93a8065cecd4d97476403fc4bc79' => 
    array (
      0 => 'M:\\home\\test1_ru.ru\\www\\abiturient\\application\\view\\addCuratorEventForm.tpl',
      1 => 1392898072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2963053269f078f63a2-18157146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_root' => 0,
    'abiturient_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53269f079f22b0_57498743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53269f079f22b0_57498743')) {function content_53269f079f22b0_57498743($_smarty_tpl) {?>
<!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
         <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Введите информацию о событии</h5>
            <!-- .toolbar -->
            <div class="toolbar">
                <ul class="nav">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/cabinet">Вернутся в кабинет</a></li>  
                </ul>
            </div>
            <!-- /.toolbar -->
        </header>
        <div  class="accordion-body collapse in body">
            <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addCuratorEvent" method="POST">
             
                <div class="form-group">
                    <label  class="control-label col-lg-4">Справка по событию</label>
                    <div class="col-lg-8">
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">Тип</label>
                    <div class="col-lg-8">
                        <select name="type" class="form-control">
						  <option value="0" >Личный контакт</option>						  
						  <option value="1" >Общее собрание</option>
						</select>
                    </div>
                </div>
                <div class="form-group">
                	<label  class="control-label col-lg-4">Дата события</label>
                	<div class="col-lg-8 ">
                			<div class="input-group">					    
					    		<input class="form-control" type="text" name="uploaddate" placeholder="yyyy-mm-dd"></input>
					    	</div>				    
					</div>
				</div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4"></label>
                    <div class="col-lg-8">
                         <input type="submit" class="btn btn-success" value="Отправить данные">
                    </div>
                </div>
                <input type="hidden" name="Location" value="addCuratorEventForm"/>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['abiturient_id']->value;?>
"/>
            </form>
        </div>
    </div>
    </div>
</div><?php }} ?>
