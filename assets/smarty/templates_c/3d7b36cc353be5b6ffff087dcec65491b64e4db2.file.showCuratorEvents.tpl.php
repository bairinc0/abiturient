<?php /* Smarty version Smarty-3.1.15, created on 2014-02-21 05:04:38
         compiled from "Z:\home\imibsu_ru.ru\www\abiturient\application\view\showCuratorEvents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226085306de66394718-04042616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d7b36cc353be5b6ffff087dcec65491b64e4db2' => 
    array (
      0 => 'Z:\\home\\imibsu_ru.ru\\www\\abiturient\\application\\view\\showCuratorEvents.tpl',
      1 => 1392959058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226085306de66394718-04042616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'abiturient' => 0,
    'data' => 0,
    'elem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5306de6641e4b2_23317946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306de6641e4b2_23317946')) {function content_5306de6641e4b2_23317946($_smarty_tpl) {?><div class="row"> 
	<div class="col-lg-12">
		<div class="box">
		      <header>
		      	<h5>������� - <?php echo $_smarty_tpl->tpl_vars['abiturient']->value['second_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['abiturient']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['abiturient']->value['patronymic'];?>
</h5>
		      </header>
		</div>      
		<div id="collapse4" class="body">
			<?php  $_smarty_tpl->tpl_vars['elem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem']->key => $_smarty_tpl->tpl_vars['elem']->value) {
$_smarty_tpl->tpl_vars['elem']->_loop = true;
?>
				  <div class="col-lg-3">			  
				      <div class="well well-small">
						  <div id="add-event-form">
						  	  <form method="POST" action="/abiturient/addCuratorEvent">	
							      <fieldset>
								  <legend><?php echo $_smarty_tpl->tpl_vars['elem']->value['uploaddate'];?>
 (<b><?php echo $_smarty_tpl->tpl_vars['elem']->value['creator'];?>
</b>)</legend>
								  <span class="help-block">��������</span>
								  <textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['elem']->value['description'];?>
</textarea>
								  <label class="radio">
								      <input type="radio" name="type<?php echo $_smarty_tpl->tpl_vars['elem']->value['curator_event_id'];?>
" value="0" <?php if ($_smarty_tpl->tpl_vars['elem']->value['type']==0) {?>checked<?php }?>>
								      <span class="label label-info">������ �������</span>
								  </label>
								  <label class="radio">
								      <input type="radio" name="type<?php echo $_smarty_tpl->tpl_vars['elem']->value['curator_event_id'];?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['elem']->value['type']==1) {?>checked<?php }?>>
								      <span class="label label-success">����� ��������</span>
								  </label>						
								  <br>
								  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['abiturient'];?>
">
								  <input type="hidden" name="curator_event_id" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['curator_event_id'];?>
">
								  <input type="hidden" name="Location" value="addCuratorEventForm">
								  <input type="submit" class="btn btn-success" value="�������������">
							  </form>
						      </fieldset>
						  </div>		
				      </div>		
				  </div>	
			 <?php } ?>      
		</div>
	</div>
</div><?php }} ?>
