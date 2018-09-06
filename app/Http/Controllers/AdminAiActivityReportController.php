<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminAiActivityReportController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
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
			$this->button_export = false;
			$this->table = "ai_activity_report";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Cover Picture","name"=>"ar_at_pic1","image"=>true,"width"=>"120"];
			$this->col[] = ["label"=>"Activities Name","name"=>"act_id","join"=>"ai_activities,act_name","width"=>"200"];
			$this->col[] = ["label"=>"Date","name"=>"ar_date","width"=>"80"];
			$this->col[] = ["label"=>"Venue","name"=>"ar_venue","width"=>"150"];
			$this->col[] = ["label"=>"Implementing Unit","name"=>"ar_implementingUnit","width"=>"150"];
			$this->col[] = ["label"=>"Total Participant","name"=>"ar_ap_total","width"=>"150"];
			$this->col[] = ["label"=>"User Name","name"=>"user_id","join"=>"cms_users,name","width"=>"100"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Priority Area','name'=>'pri_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_priorityarea,pri_name','default'=>'Select Priority Area'];
			$this->form[] = ['label'=>'Focus Area','name'=>'foc_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_focusarea,foc_name','parent_select'=>'pri_id','default'=>'Select Focus Area'];
			$this->form[] = ['label'=>'Indicator Name','name'=>'ind_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_indicators,ind_name','parent_select'=>'foc_id','default'=>'Select Indicator Name'];
			$this->form[] = ['label'=>'Activities Name','name'=>'act_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_activities,act_name','datatable_where'=>'act_status = 1','parent_select'=>'ind_id','default'=>'Select Activities Name'];
			$this->form[] = ['label'=>'Line Manager','name'=>'flow_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','help'=>'Select a Line Manager who responsible for this report.','datatable_where'=>'id_cms_privileges=10 && status = "Active"','default'=>'Please Select Line Manager'];
			$this->form[] = ['label'=>'Activities Date','name'=>'ar_date','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$id = CRUDBooster::getCurrentId();
			$row = CRUDBooster::first($this->table,$id);
			$custom_element = view('admin.customInput',compact('row'))->render();
			$this->form[] = ['label'=>'Activities Venue','name'=>'ar_venue','type'=>'custom','validation'=>'required|min:1|max:255','width'=>'col-sm-10','html'=>$custom_element];
			$this->form[] = ['label'=>'Ar ImplementingUnit','name'=>'ar_implementingUnit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Implementing Unit'];
			$this->form[] = ['label'=>'Total  Male','name'=>'ar_ap_male','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'participant total female.'];
			$this->form[] = ['label'=>'Total Female','name'=>'ar_ap_female','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'participant total male.'];
			$this->form[] = ['label'=>'Children Male','name'=>'ar_ap_child_m','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Under 15 years male'];
			$this->form[] = ['label'=>'Children Female','name'=>'ar_ap_child_f','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Under 15 years female'];
			$this->form[] = ['label'=>'Youth Male','name'=>'ar_ap_youth_m','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Between 15-35 years male'];
			$this->form[] = ['label'=>'Youth Female','name'=>'ar_ap_youth_f','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Between 15-35 years female'];
			$this->form[] = ['label'=>'Adult Male','name'=>'ar_ap_adult_m','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Above 35 years male'];
			$this->form[] = ['label'=>'Adult Female','name'=>'ar_ap_adult_f','type'=>'number','validation'=>'required|integer','width'=>'col-sm-5','placeholder'=>'Above 35 years female'];
			$this->form[] = ['label'=>'Participant Total','name'=>'ar_ap_total','type'=>'text','validation'=>'required','width'=>'col-sm-5','readonly'=>'true'];
			$this->form[] = ['label'=>'Activities Comment','name'=>'ar_comments','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Comments..'];
			$this->form[] = ['label'=>'Activities Aims','name'=>'ar_ac_aims','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Were the activity aims met?*If yes, how? If not, why?'];
			$this->form[] = ['label'=>'Activities Follow','name'=>'ar_ac_follow','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'How does the activity follow on from previous interventions, if any? *'];
			$this->form[] = ['label'=>'Activities Process','name'=>'ar_ac_process','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Activity Process: What took place? What went well? *'];
			$this->form[] = ['label'=>'Activities Challenges','name'=>'ar_ac_challenges','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Challenges faced& mitigation measures employed during the activity: *'];
			$this->form[] = ['label'=>'Activities Improve','name'=>'ar_ac_improve','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'What could be done to improve next time? *'];
			$this->form[] = ['label'=>'Activities Ies','name'=>'ar_ac_ies','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Follow up activity(ies)/Date *'];
			$this->form[] = ['label'=>'Activities Recommendations','name'=>'ar_ac_comments','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'Additional comments/recommendations on the activity: *'];
			$this->form[] = ['label'=>'Attendance Register','name'=>'ar_at_attendence','type'=>'filemanager','validation'=>'required|min:1|max:255','width'=>'col-sm-10','filemanager_type'=>'file','help'=>'Allowed only pdf or docx copy'];
			$this->form[] = ['label'=>'Activities Minutes','name'=>'ar_at_minute','type'=>'filemanager','validation'=>'required|min:1|max:255','width'=>'col-sm-10','help'=>'Allowed only pdf or docx copy'];
			$this->form[] = ['label'=>'Cover Picture','name'=>'ar_at_pic1','type'=>'upload','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','help'=>'Allowed max size is 1000kb.'];
			$this->form[] = ['label'=>'Picture Two','name'=>'ar_at_pic2','type'=>'upload','width'=>'col-sm-10','help'=>'Allowed max size is 1000kb.'];
			$this->form[] = ['label'=>'Picture Three','name'=>'ar_at_pic3','type'=>'upload','width'=>'col-sm-10','help'=>'Allowed max size is 1000kb.'];
			$this->form[] = ['label'=>'Picture Four','name'=>'ar_at_pic4','type'=>'upload','width'=>'col-sm-10','help'=>'Allowed max size is 1000kb.'];
			$this->form[] = ['label'=>'Picture Five','name'=>'ar_at_pic5','type'=>'upload','width'=>'col-sm-10','help'=>'Allowed max size is 1000kb.'];
			$this->form[] = ['label'=>'Activities Link','name'=>'ar_at_link','type'=>'text','width'=>'col-sm-10','placeholder'=>'Put your youtube video link'];
			$this->form[] = ['label'=>'Activities  Action Plan','name'=>'ar_at_actionPlan','type'=>'filemanager','width'=>'col-sm-10','help'=>'Allowed only pdf or docx copy'];
			$this->form[] = ['label'=>'Activities Others attachment','name'=>'ar_at_others','type'=>'filemanager','width'=>'col-sm-10','help'=>'Allowed only pdf or docx copy'];
			# END FORM DO NOT REMOVE THIS LINE
 
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
	        	 $('#ar_ap_adult_f').blur(function(){

                        var ar_ap_male 		= 	$('#ar_ap_male').val();
                        var ar_ap_female 	= 	$('#ar_ap_female').val();
                        var ar_ap_child_m 	= 	$('#ar_ap_child_m').val();
                        var ar_ap_child_f 	= 	$('#ar_ap_child_f').val();
                        var ar_ap_youth_m 	= 	$('#ar_ap_youth_m').val();
                        var ar_ap_youth_f 	= 	$('#ar_ap_youth_f').val();
                        var ar_ap_adult_m 	= 	$('#ar_ap_adult_m').val();
                        var ar_ap_adult_f 	= 	$('#ar_ap_adult_f').val();

                        var sum1 = +ar_ap_female + +ar_ap_male; 
                        var sum2 = +ar_ap_child_m + +ar_ap_child_f + +ar_ap_youth_m+ +ar_ap_youth_f+ +ar_ap_adult_m+ +ar_ap_adult_f; 
                        if(sum1 != sum2){
                        	alert('Your total participant is :'+ sum1 +' But you given :'+ sum2 +' . Please try again!'); 
                        	document.getElementById('ar_ap_adult_f').value = '';
                        } else{ 
                        	document.getElementById('ar_ap_total').value = sum1;
                        }
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
	        $this->style_css = "
	        	.className{margin:10px;}
	        ";
	        
	        
	        
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
	        if(!CRUDBooster::isSuperadmin()){
	        	$query->where('user_id',CRUDBooster::myId())->orwhere('flow_id',CRUDBooster::myId());
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
	        $postdata['user_id'] = CRUDBooster::myId(); 
	        $sum1 	= $postdata['ar_ap_female']+$postdata['ar_ap_male'];
	        $sum2	= $postdata['ar_ap_child_m']+$postdata['ar_ap_child_f']+$postdata['ar_ap_adult_m']+$postdata['ar_ap_adult_f']+$postdata['ar_ap_youth_m']+$postdata['ar_ap_youth_f'];
	        if($sum1 != $sum2){
	    		CRUDBooster::redirectBack(
               	 'Sorry Your Total Participant Dose not match!' 
         	   );
	    	}

	        $flow_id =  $postdata['flow_id']; 
	    	CRUDBooster::sendNotification($config=[
	        	'content' 		=> 'Conducts An Activities',
	        	'to'			=>	CRUDBooster::mainpath(),
	        	'id_cms_users'	=>	[$flow_id],
	        ]);
	        //$data = ['name'=>'John Doe','address'=>'Lorem ipsum dolor...'];
			//CRUDBooster::sendEmail(['to'=>'john@gmail.com','data'=>$data,'template'=>'order_success']);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
	        // $row = CRUDBooster::first($this->table,$id);
	        // dd($row);
	    	// echo $id.' id';
	    	// $result = DB::table('ai_activity_report')->where('id',$id)->first();
	    	// dd($result);
	     //    CRUDBooster::sendNotification($config=[
	     //    	'content' 		=> 'Conducts An Activities',
	     //    	'to'			=>	url("admin/ai_activity_report/detail/$id"),
	     //    	'id_cms_users'	=>	$result->flow_id,
	     //    ]);

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
	        //Your code here
	        $sum1 	= $postdata['ar_ap_female']+$postdata['ar_ap_male'];
	        $sum2	= $postdata['ar_ap_child_m']+$postdata['ar_ap_child_f']+$postdata['ar_ap_adult_m']+$postdata['ar_ap_adult_f']+$postdata['ar_ap_youth_m']+$postdata['ar_ap_youth_f'];
	        if($sum1 != $sum2){
	    		CRUDBooster::redirectBack(
               	 'Sorry Your Total Participant Dose not match!' 
         	   );
	    	}

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


	    public function getDetail($id) {
		  //Create an Auth
		  if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
		    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		  }
		  
		  $data = [];
		  $data['page_title'] = 'Detail Data';
		  $data['row'] = DB::table('ai_activity_report')
		  	->join('ai_activities', 'ai_activities.id', '=', 'ai_activity_report.act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_activity_report.user_id') 
		  	->where('ai_activity_report.id',$id)->first(); 

		  $this->cbView('admin.DetailsActivitiesReport',$data);
		}


	    //By the way, you can still create your own method in here... :) 


	}