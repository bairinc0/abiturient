
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
                    <li><a href="{$site_root}/cabinet">�������� � �������</a></li>  
                </ul>
            </div>
            <!-- /.toolbar -->
        </header>
        <div  class="accordion-body collapse in body">
            <form class="form-horizontal" action="{$site_root}/addCuratorEvent" method="POST">
             
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
                <input type="hidden" name="id" value="{$abiturient_id}"/>
            </form>
        </div>
    </div>
    </div>
</div>