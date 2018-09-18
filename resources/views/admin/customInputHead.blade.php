<select class="form-control" id="headOfficer" data-value="5" required="" name="headOfficer">
    <option value="" selected="">Please select your Head of Department</option>
    	<?php
    		$heads = DB::table('cms_users')
    					->join('cms_privileges', 'cms_privileges.id','=','cms_users.id_cms_privileges')
    					->select('cms_users.*','cms_privileges.name as role')
    					->where('cms_users.id_cms_privileges','=','5')->orwhere('cms_users.id_cms_privileges','=','3')
    					->get(); 
    	foreach ($heads as $head) { ?> 
	    <option value="{{$head->id}}">{{$head->name}} - {{$head->role}}</option>
    	<?php	}
    	?>     
</select>

<div class="text-danger"></div>
<div id="headOfficer"></div>
<p class='help-block'></p>