<div class="row"> 
	<div class="col-lg-12">
		<div class="box">
		      <header>
		      	<h5>События - {$abiturient.second_name} {$abiturient.name} {$abiturient.patronymic}</h5>
		      </header>
		</div>      
		<div id="collapse4" class="body">
			{foreach item=elem from=$data}
				  <div class="col-lg-3">			  
				      <div class="well well-small">
						  <div id="add-event-form">
						  	  <form method="POST" action="/abiturient/addCuratorEvent">	
							      <fieldset>
								  <legend>{$elem.uploaddate} (<b>{$elem.creator}</b>)</legend>
								  <span class="help-block">Описание</span>
								  <textarea name="description" class="form-control">{$elem.description}</textarea>
								  <label class="radio">
								      <input type="radio" name="type{$elem.curator_event_id}" value="0" {if $elem.type==0}checked{/if}>
								      <span class="label label-info">Личный контакт</span>
								  </label>
								  <label class="radio">
								      <input type="radio" name="type{$elem.curator_event_id}" value="1" {if $elem.type==1}checked{/if}>
								      <span class="label label-success">Общее собрание</span>
								  </label>						
								  <br>
								  <input type="hidden" name="id" value="{$elem.abiturient}">
								  <input type="hidden" name="curator_event_id" value="{$elem.curator_event_id}">
								  <input type="hidden" name="Location" value="addCuratorEventForm">
								  <input type="submit" class="btn btn-success" value="Редактировать">
							  </form>
						      </fieldset>
						  </div>		
				      </div>		
				  </div>	
			 {/foreach}      
		</div>
	</div>
</div>