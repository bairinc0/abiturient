<?php /* Smarty version Smarty-3.1.15, created on 2014-02-20 12:16:37
         compiled from "Z:\home\imibsu_ru.ru\www\abiturient\application\view\addCuratorEventForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1965305e690a56be9-57882921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45a6ccf7d48419e47a2152f87aea65c78652cee6' => 
    array (
      0 => 'Z:\\home\\imibsu_ru.ru\\www\\abiturient\\application\\view\\addCuratorEventForm.tpl',
      1 => 1392898072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1965305e690a56be9-57882921',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5305e690b28958_24637103',
  'variables' => 
  array (
    'site_root' => 0,
    'abiturient_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5305e690b28958_24637103')) {function content_5305e690b28958_24637103($_smarty_tpl) {?>
<!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
         <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>������� ���������� � �������</h5>
            <!-- .toolbar -->
            <div class="toolbar">
                <ul class="nav">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/cabinet">�������� � �������</a></li>  
                </ul>
            </div>
            <!-- /.toolbar -->
        </header>
        <div  class="accordion-body collapse in body">
            <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['site_root']->value;?>
/addCuratorEvent" method="POST">
             
                <div class="form-group">
                    <label  class="control-label col-lg-4">������� �� �������</label>
                    <div class="col-lg-8">
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">���</label>
                    <div class="col-lg-8">
                        <select name="type" class="form-control">
						  <option value="0" >������ �������</option>						  
						  <option value="1" >����� ��������</option>
						</select>
                    </div>
                </div>
                <div class="form-group">
                	<label  class="control-label col-lg-4">���� �������</label>
                	<div class="col-lg-8 ">
                			<div class="input-group">					    
					    		<input class="form-control" type="text" name="uploaddate" placeholder="yyyy-mm-dd"></input>
					    	</div>				    
					</div>
				</div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4"></label>
                    <div class="col-lg-8">
                         <input type="submit" class="btn btn-success" value="��������� ������">
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
