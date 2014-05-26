
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
                    <li><a href="{$site_root}/cabinet">Вернутся в кабинет</a></li>  
                </ul>
            </div>
            <!-- /.toolbar -->
        </header>
        <div  class="accordion-body collapse in body">
            <form class="form-horizontal" action="{$site_root}/addCuratorEvent" method="POST">
             
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
                <input type="hidden" name="id" value="{$abiturient_id}"/>
            </form>
        </div>
    </div>
    </div>
</div>