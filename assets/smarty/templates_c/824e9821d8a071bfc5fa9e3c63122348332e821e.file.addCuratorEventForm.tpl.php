<?php /* Smarty version Smarty-3.1.15, created on 2014-05-12 08:55:46
         compiled from "/var/sites/ikvts2013.bsu.ru/site/www//abiturient/application/view/addCuratorEventForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181862656253700e020b52c9-04983378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '824e9821d8a071bfc5fa9e3c63122348332e821e' => 
    array (
      0 => '/var/sites/ikvts2013.bsu.ru/site/www//abiturient/application/view/addCuratorEventForm.tpl',
      1 => 1399692521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181862656253700e020b52c9-04983378',
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
  'unifunc' => 'content_53700e021547b9_71967206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53700e021547b9_71967206')) {function content_53700e021547b9_71967206($_smarty_tpl) {?>
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
