<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminAiConceptNoteController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "acn_name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = true;
			$this->table = "ai_concept_note";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Name","name"=>"acn_name","width"=>"250"];
			$this->col[] = ["label"=>"Date","name"=>"acn_date","width"=>"80"];
			$this->col[] = ["label"=>"Venue","name"=>"acn_venue","width"=>"100"];
			$this->col[] = ["label"=>"Implement Unit","name"=>"acn_implementUnit","width"=>"130"];
			$this->col[] = ["label"=>"Total Participant","name"=>"acn_ap_total","width"=>"150"];
			$this->col[] = ["label"=>"Lead By","name"=>"userId","join"=>"cms_users,name","width"=>"150"];
			$this->col[] = ["label"=>"Status","name"=>"acn_status","width"=>"100","callback" => function($row){
			 	if(CRUDBooster::myPrivilegeId() == 11){ //pc
			 		if($row->acn_status == '1' || $row->acn_status == '2' || $row->acn_status == '3'){
						return '<span class="label label-warning">Pending</span>';
					}elseif($row->acn_status == '99'){
						return '<span class="label label-danger">Rejected</span>';
					}elseif($row->acn_status == '100'){
						return '<span class="label label-primary">Approved</span>';
					}elseif($row->acn_status == '101'){
						return '<span class="label label-success">Conducted</span>';
					} 
			 	}elseif (CRUDBooster::myPrivilegeId() == 10) { //line manger
			 		if($row->acn_status == '1'){
						return '<span class="label label-info">New</span>';
					}elseif($row->acn_status == '2' || $row->acn_status == '3'){
						return '<span class="label label-warning">Pending</span>';
					}elseif($row->acn_status == '99'){
						return '<span class="label label-danger">Rejected</span>';
					}elseif($row->acn_status == '100'){
						return '<span class="label label-primary">Approved</span>';
					}elseif($row->acn_status == '101'){
						return '<span class="label label-success">Conducted</span>';
					} 
			 	}elseif (CRUDBooster::myPrivilegeId() == 13) { //M&E Officer
			 		if($row->acn_status == '2'){
						return '<span class="label label-info">New</span>';
					}elseif($row->acn_status == '3'){
						return '<span class="label label-warning">Pending</span>';
					}elseif($row->acn_status == '99'){
						return '<span class="label label-danger">Rejected</span>';
					}elseif($row->acn_status == '100'){
						return '<span class="label label-primary">Approved</span>';
					}elseif($row->acn_status == '101'){
						return '<span class="label label-success">Conducted</span>';
					} 
			 	}elseif (CRUDBooster::myPrivilegeId() == 5 || CRUDBooster::myPrivilegeId() == 3) { //hopp & hofsp
			 		if($row->acn_status == '3'){
						return '<span class="label label-info">New</span>';
					}elseif($row->acn_status == '99'){
						return '<span class="label label-danger">Rejected</span>';
					}elseif($row->acn_status == '100'){
						return '<span class="label label-primary">Approved</span>';
					}elseif($row->acn_status == '101'){
						return '<span class="label label-success">Conducted</span>';
					} 
			 	}elseif(CRUDBooster::isSuperadmin()){ //Super Admin
			 		if($row->acn_status == '1' || $row->acn_status == '2' || $row->acn_status == '3'){
						return '<span class="label label-warning">Pending</span>';
					}elseif($row->acn_status == '99'){
						return '<span class="label label-danger">Rejected</span>';
					}elseif($row->acn_status == '100'){
						return '<span class="label label-primary">Approved</span>';
					}elseif($row->acn_status == '101'){
						return '<span class="label label-success">Conducted</span>';
					} 
			 	}else{ //admin and hofsp
			 		return '<span class="label label-primary">Approved</span>';
			 	} 
			}];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			$this->form[] = ['label'=>'Priority Area','name'=>'pri_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_priorityarea,pri_name','default'=>'Select Priority Area'];
			$this->form[] = ['label'=>'Focus Area','name'=>'foc_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_focusarea,foc_name','parent_select'=>'pri_id','default'=>'Select Focus Area'];
			$this->form[] = ['label'=>'Indicator Name','name'=>'ind_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_indicators,ind_name','parent_select'=>'foc_id','default'=>'Select Indicator Name'];
			$this->form[] = ['label'=>'Parent Activities','name'=>'p_act_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_activities,act_name','datatable_where'=>'act_status = 1','parent_select'=>'ind_id','default'=>'Select Activities Name'];

			$this->form[] = ['label'=>'Activities Name','name'=>'acn_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Name of your concept note..'];
			$this->form[] = ['label'=>'Date to Conduct','name'=>'acn_date','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Venue','name'=>'acn_venue','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Type your venue'];
			$this->form[] = ['label'=>'Implement Unit','name'=>'acn_implementUnit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Implementing Unit'];
			// $this->form[] = ['label'=>'Participant Male','name'=>'acn_ap_male','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			// $this->form[] = ['label'=>'Participant Female','name'=>'acn_ap_female','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Child Male','name'=>'acn_ap_child_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Child Female','name'=>'acn_ap_child_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Youth Male','name'=>'acn_ap_youth_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Youth Female','name'=>'acn_ap_youth_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Adult Male','name'=>'acn_ap_adult_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Target Adult Female','name'=>'acn_ap_adult_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Participant Total','name'=>'acn_ap_total','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-5','readonly'=>'true'];
			$this->form[] = ['label'=>'Activities Aim(s)','name'=>'acn_aim','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'Aim(s) of the activity'];
			$this->form[] = ['label'=>'Activities Objectives','name'=>'acn_objective','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'Write about objectives of the activity'];
			$this->form[] = ['label'=>'Activities Contributes','name'=>'acn_ies','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'How activity contributes to organizational priority(ies)?:'];
			$this->form[] = ['label'=>'Activities Outcome','name'=>'acn_outcome','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Follow Up','name'=>'acn_follow','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Budget','name'=>'acn_budget','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Budget Code','name'=>'acn_budgetCode','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			if(CRUDBooster::myPrivilegeId() == 13){
			$custom_element = view('admin.customInputHead')->render();
			$this->form[] = ['label'=>'Head of Dapartment','name'=>'headOfficer','type'=>'custom','validation'=>'required|min:1|max:255','width'=>'col-sm-10','html'=>$custom_element];
			}else{
			$this->form[] = ['label'=>'Line Manager','name'=>'lineManager','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges=10 && status = "Active"','default'=>'Please Select Line Manager'];
			}
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Concept Note Name','name'=>'acn_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Name of your concept note..'];
			//$this->form[] = ['label'=>'Concept Note Date','name'=>'acn_date','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Concept Note Venue','name'=>'acn_venue','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Type your venue'];
			//$this->form[] = ['label'=>'Implement Unit','name'=>'acn_implementUnit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Implementing Unit'];
			//$this->form[] = ['label'=>'Participant Male','name'=>'acn_ap_male','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Participant Female','name'=>'acn_ap_female','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Child Male','name'=>'acn_ap_child_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Child Female','name'=>'acn_ap_child_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Youth Male','name'=>'acn_ap_youth_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Youth Female','name'=>'acn_ap_youth_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Adult Male','name'=>'acn_ap_adult_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Adult Female','name'=>'acn_ap_adult_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Participant Total','name'=>'acn_ap_total','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-5','readonly'=>'true'];
			//$this->form[] = ['label'=>'Activities Aim(s)','name'=>'acn_aim','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'Aim(s) of the activity'];
			//$this->form[] = ['label'=>'Activities Objectives','name'=>'acn_objective','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'Write about objectives of the activity'];
			//$this->form[] = ['label'=>'Activities Contributes','name'=>'acn_ies','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10','help'=>'How activity contributes to organizational priority(ies)?:'];
			//$this->form[] = ['label'=>'Activities Outcome','name'=>'acn_outcome','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Follow Up','name'=>'acn_follow','type'=>'wysiwyg','validation'=>'required|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Budget','name'=>'acn_budget','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Budget Code','name'=>'acn_budgetCode','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Line Manager','name'=>'lineManager','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges=10 && status = "Active"','default'=>'Please Select Line Manager'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = " 
	        	 $('#acn_ap_adult_f').blur(function(){

                        // var acn_ap_male 	= 	$('#acn_ap_male').val();
                        // var acn_ap_female 	= 	$('#acn_ap_female').val();
                        var acn_ap_child_m 	= 	$('#acn_ap_child_m').val();
                        var acn_ap_child_f 	= 	$('#acn_ap_child_f').val();
                        var acn_ap_youth_m 	= 	$('#acn_ap_youth_m').val();
                        var acn_ap_youth_f 	= 	$('#acn_ap_youth_f').val();
                        var acn_ap_adult_m 	= 	$('#acn_ap_adult_m').val();
                        var acn_ap_adult_f 	= 	$('#acn_ap_adult_f').val();

                       // var sum1 = +acn_ap_male + +acn_ap_female; 
                         var sum2 = +acn_ap_child_m + +acn_ap_child_f + +acn_ap_youth_m+ +acn_ap_youth_f+ +acn_ap_adult_m+ +acn_ap_adult_f; 
                        // if(sum1 != sum2){
                        // 	alert('Your total participant is :'+ sum1 +' But you given :'+ sum2 +' . Please try again!'); 
                        // 	document.getElementById('acn_ap_adult_f').value = '';
                        // } else{ 
                        	document.getElementById('acn_ap_total').value = sum2;
                        //}
                   });    
	        ";


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	        // if(CRUDBooster::isSuperadmin()){ //super Admin
	        // 	$query->where('acn_status',100)->orwhere('userId', CRUDBooster::myId());
	        //}else
	        if(CRUDBooster::myPrivilegeId() == 5 || CRUDBooster::myPrivilegeId() == 3){ //HOPP & hofsp
	        	$query->where('headOfficer',CRUDBooster::myId())->orwhere('userId', CRUDBooster::myId());
	        }elseif (CRUDBooster::myPrivilegeId() == 10) { //line manager
	        	$query->where('lineManager',CRUDBooster::myId())->orwhere('userId', CRUDBooster::myId());
	        }elseif (CRUDBooster::myPrivilegeId() == 13) { //M & E Manager
	        	$query->where('meOfficer',CRUDBooster::myId())->orwhere('userId', CRUDBooster::myId());
	        }elseif (CRUDBooster::myPrivilegeId() == 11) { //pc
	        	$query->where('userId', CRUDBooster::myId());
	        }    
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
	        $postdata['userId'] = CRUDBooster::myId(); 
	        $postdata['acn_ap_male']	= $postdata['acn_ap_child_m']+$postdata['acn_ap_adult_m']+$postdata['acn_ap_youth_m'];
	        $postdata['acn_ap_female'] = $postdata['acn_ap_child_f']+$postdata['acn_ap_adult_f']+$postdata['acn_ap_youth_f'];
	        $flow_id =  $postdata['lineManager'];   
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {   
	    $row = CRUDBooster::first($this->table,$id);     
	       CRUDBooster::sendNotification($config=[
	        	'content' 		=> 'Conducted An Concept Note...',
	        	'to'			=>	CRUDBooster::mainpath($id),
	        	'id_cms_users'	=>	[$row->lineManager],
	        ]);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) { 
	     	$postdata['acn_ap_male']	= $postdata['acn_ap_child_m']+$postdata['acn_ap_adult_m']+$postdata['acn_ap_youth_m'];
	        $postdata['acn_ap_female'] = $postdata['acn_ap_child_f']+$postdata['acn_ap_adult_f']+$postdata['acn_ap_youth_f']; 
	        if(CRUDBooster::myPrivilegeId() == 13) { 
	        	$time = time();
				$time = date("Y-m-d H:m:s",$time); 
				$postdata['acn_status'] = 3;
				$postdata['me_date'] = $time;
				//$postdata['headOfficer'] = $postdata['headOfficer']; 
				//dd($postdata);
	        }      
	        //Your code here
	     //    $postdata['userId'] = CRUDBooster::myId(); 
	     //    $sum1 	= $postdata['acn_ap_female']+$postdata['acn_ap_male'];
	     //    $sum2	= $postdata['acn_ap_child_m']+$postdata['acn_ap_child_f']+$postdata['acn_ap_adult_m']+$postdata['acn_ap_adult_f']+$postdata['acn_ap_youth_m']+$postdata['acn_ap_youth_f'];
	     //    if($sum1 != $sum2){
	    	// 	CRUDBooster::redirectBack(
      //          	 'Sorry Your Total Participant Dose not match!' 
      //    	   );
	    	// }

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 
	        if(CRUDBooster::myPrivilegeId() == 11){
		        $result = CRUDBooster::first($this->table,$id);
		    	if($result->acn_status == 99 && $result->rejected_by != NULL){
		    		$userRole = DB::table(cms_users)->where('id',$result->rejected_by)->first(); 
		    		if($userRole->id_cms_privileges == 10){ //line manager
		    			DB::table($this->table)->where('id', $id)->update([
		    				'rejected_by'=> NULL, 'rejected_date'=> NULL,'rejected_comment'=> NULL,'acn_status' => 1,
		    			]);
		    			CRUDBooster::sendNotification($config=[
				        	'content' 		=> 'A rejected concept is back to review again...',
				        	'to'			=>	url('/admin/ai_concept_note/detail/'.$id),
				        	'id_cms_users'	=>	[$userRole->id],
				        ]);
		    		}elseif ($userRole->id_cms_privileges == 13) { //M&E Officer
		    			DB::table($this->table)->where('id', $id)->update([
		    				'rejected_by'=> NULL, 'rejected_date'=> NULL,'rejected_comment'=> NULL,'acn_status' => 2,
		    			]);
		    			CRUDBooster::sendNotification($config=[
				        	'content' 		=> 'A rejected concept is back to check again...',
				        	'to'			=>	url('/admin/ai_concept_note/detail/'.$id),
				        	'id_cms_users'	=>	[$userRole->id],
				        ]);
		    		}elseif ($userRole->id_cms_privileges == 5 || $userRole->id_cms_privileges == 3 ) { //HOPP & hofsp
		    			DB::table($this->table)->where('id', $id)->update([
		    				'rejected_by'=> NULL, 'rejected_date'=> NULL,'rejected_comment'=> NULL,'acn_status' => 3,
		    			]);
		    			CRUDBooster::sendNotification($config=[
				        	'content' 		=> 'A rejected concept is back to approvement...',
				        	'to'			=>	url('/admin/ai_concept_note/detail/'.$id),
				        	'id_cms_users'	=>	[$userRole->id],
				        ]);
		    		}  
		    	}
	    	}elseif(CRUDBooster::myPrivilegeId() == 13) { //m&e
	   //  		$time = time();
				// $time = date("Y-m-d H:m:s",$time);  
				// $dataCN = [
				// 	'acn_status'			=> 		3,
				// 	'headOfficer'			=> 		$request->headOfficer, 
				// 	'me_date'				=> 		$time,
				// 	'act_id'				=> 		$act_id,
				// ];
				//$done = DB::table('ai_concept_note')->where('id',$request->cNid)->update($dataCN);
				$result = CRUDBooster::first($this->table,$id);
				//if($done){
					CRUDBooster::sendNotification($config=[
						'content'	=> 'Waiting a Concept Note For Check...',
						'to'		=> url('admin/ai_concept_note/detail/'.$id),
						'id_cms_users'	=> [$result->headOfficer],
					]);
					// $to = url('/admin/ai_concept_note');
					// $message = "Approved Successfull";
					// $type	= "info";
					// \CRUDBooster::redirect($to,$message,$type);
				//}	
	    	}
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 

	    public function getDetail($id) {
		  //Create an Auth
		  if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
		    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		  }
		  
		  $data = [];
		  $data['currentId'] = $id;
		  $data['page_title'] = 'Detail Data';
		  $data['row'] = DB::table('ai_concept_note')
		  	//->join('ai_activities', 'ai_activities.id', '=', 'ai_concept_note.act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_concept_note.userId') 
		  	->where('ai_concept_note.id',$id)->first(); 

		// $result = DB::table('demo_test')->where('id',$id)->first();
		// $data['row'] = $result;
		// $data['created']	= DB::table('cms_users')->where('id',$result->user_id)->first();

		  $this->cbView('admin.DetailsActivitiesConceptNote',$data);
		}



	}