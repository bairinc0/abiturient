
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
    
    
	{foreach item=elem from=$data}
    	<tr>
    		<td >
    			<a class="btn btn-default btn-sm" title="Редактировать" href="{$site_root}/addAbiturientForm/?user_id={$elem.id}">
                    <i class="icon-edit"></i>
                </a>
                <!-- <a class="btn btn-default btn-sm" title="Добавить событие" href="{$site_root}/addCuratorEventForm/?user_id={$elem.id}"> 
                <i class="icon-comments"></i>
                </a> -->
            </td>
	        <td>
	        	<a class="btn btn-default btn-sm" title="Добавить событие" href="{$site_root}/addCuratorEventForm/?user_id={$elem.id}"> 
                	<i class="icon-comments"></i>
                </a>
	        	{$elem.second_name} {if $elem.curator_events>0} (<a href="{$site_root}/showCuratorEvents/?abiturient_id={$elem.id}">{$elem.curator_events}</a>){/if}	        	
            </td>
	        <td>{$elem.name}</td>
	        <td>{$elem.patronymic}</td>
	        <td>{$elem.region}</td>
	        <td>{$elem.class}</td>
	        <td>{$elem.school}</td>
	        <td>{$elem.phone_number}</td>
	        <td>{$elem.adress}</td>
	        <td>
	        	{foreach item=ege from=$elem.ege}
	        		<b><a href="#" title="{$ege.subject_name}">{$ege.subject_icon}</a></b>
	        	{/foreach}
	        </td>
	        <td>
	        	{foreach item=event from=$elem.events}
	        		<b><a href="#" title="{$event.event_name}">{$event.event_icon}</a></b>
	        	{/foreach}
	        </td>
	        <td>{$elem.document}</td>            
    	</tr>	
    {/foreach}
    
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>