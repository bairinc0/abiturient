<!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
         <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>{if $abiturient_id==0}Введите информацию о абитуриенте{else}Внесите исправления{/if}</h5>
            <!-- .toolbar -->
            <div class="toolbar">
                <ul class="nav">
                    <li><a href="{$site_root}/cabinet">Вернутся в кабинет</a></li>
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
            <form class="form-horizontal" action="{$site_root}/addAbiturient" method="POST">
                <div class="form-group">
                    <label class="control-label col-lg-4">Фамилия</label>
                    <div class="col-lg-8">
                        <input name="second_name" placeholder="Фамилия" class="form-control" value="{$data.second_name}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4">Имя</label>
                    <div class="col-lg-8">
                        <input name="name" placeholder="Имя" class="form-control"  value="{$data.name}">
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-4">Отчество</label>
                    <div class="col-lg-8">
                        <input name="patronymic" placeholder="Отчество" class="form-control" value="{$data.patronymic}">
                    </div>
                </div>
                <div class="form-group">
                    <label  row=2 class="control-label col-lg-4">Контактный телефон</label>
                    <div class="col-lg-8">
                        <textarea name="phone_number" class="form-control">{$data.phone_number}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">Адрес</label>
                    <div class="col-lg-8">
                        <textarea name="adress" class="form-control">{$data.adress}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-lg-4">Класс</label>
                    <div class="col-lg-8">
                        <select name="class" class="form-control">
						  <option value="11" {if $data.class==11}selected{/if}>11</option>
						  <option value="10" {if $data.class==10}selected{/if}>10</option>
						  <option value="9" {if $data.class==9}selected{/if}>9</option>
						  <option value="8" {if $data.class==8}selected{/if}>8</option>
						  <option value="7" {if $data.class==7}selected{/if}>7</option>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Школа</label>
                    <div class="col-lg-8">
                        <select name="school_id" class="form-control">
                          {foreach item=school from=$schools}
						  		<option value="{$school.id}" {if $data.school_id==$school.id}selected{/if}>{$school.school_name} ({$school.region_name})</option>						  
						  {/foreach}
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Экзамены ЕГЭ</label>
                    <div class="col-lg-8">
                    	{if $ege[1]}
                        	Физика <input type="checkbox" name="fiz" checked>
                        {else}
                        	Физика <input type="checkbox" name="fiz">
                        {/if} 
                        <br/>
                        {if $ege[2]} 
                        	Информатика <input type="checkbox" name="math" checked>
                        {else}
                        	Информатика <input type="checkbox" name="math">	
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">События</label>
                    <div class="col-lg-8">
                    	{foreach item=event from=$events}
                    		<input type="checkbox" name="event{$event.event_id}" {if $event.checked}checked{/if}> {$event.event_name}<br/>
                    	{/foreach}                    	 
                    </div>
                </div>
            
           
                <div class="form-group">
                    <label for="tags" class="control-label col-lg-4">Документы</label>
                    <div class="col-lg-8">
  
                    	{if $data.document==1}
                        	Сдал(а) <input type="checkbox" name="document" checked>
                        {else}
                          	Cдал(а) <input type="checkbox" name="document">
                        {/if} 
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
                <input type="hidden" name="id" value="{$abiturient_id}"/>
            </form>
        </div>
    </div>
    </div>
</div>