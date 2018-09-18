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
			$this->col[] = ["label"=>"Parent Act.","name"=>"p_act_id","join"=>"ai_activities,act_name","width"=>"220"];
			$this->col[] = ["label"=>"Act. Name","name"=>"cn_id","join"=>"ai_concept_note,acn_name","width"=>"200"];
			$this->col[] = ["label"=>"Vanue","name"=>"ar_venue","width"=>"100"];
			$this->col[] = ["label"=>"Implementer","name"=>"ar_implementingUnit","width"=>"150"];
			$this->col[] = ["label"=>"Attendence","name"=>"ar_ap_total","width"=>"150"];
			$this->col[] = ["label"=>"Lead By","name"=>"user_id","join"=>"cms_users,name","width"=>"150"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Activities Name','name'=>'cn_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_concept_note,acn_name','help'=>'For conducted must approve your concept note.','datatable_where'=>'acn_status = 100 && userId ='.CRUDBooster::myId()];
			$this->form[] = ['label'=>'Line Manager','name'=>'flow_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges=10 && status = "Active"'];
			$this->form[] = ['label'=>'Activities Date','name'=>'ar_date','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Venue','name'=>'ar_venue','type'=>'custom','validation'=>'required|min:1|max:255','width'=>'col-sm-10','html'=>'<input type=\'text\' title="Activities Venue"               required  placeholder=\'Type your venue\'  maxlength=255 class=\'form-control\'               name="ar_venue" id="ar_venue" value=\'\'/>        <div class="text-danger"></div>        <div id="ar_venue1"></div>        <p class=\'help-block\'></p><script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>    <script type="text/javascript">        $(\'#ar_venue\').keyup(function(){                        var ar_venue = $(this).val();                        if(ar_venue != \'\'){                             $.ajax({                                url:\'http://localhost/actionaid/public/checkVenue/\'+ ar_venue,                                method:\'GET\',                                success:function(data){                                      $(\'#ar_venue1\').fadeIn();                                    $(\'#ar_venue1\').html(data);                                }                            });                        }                    });                     $(document).on(\'click\',\'li\',function(){                        $(\'#ar_venue\').val($(this).text());                        $(\'#ar_venue1\').fadeOut();                     });    </script>'];
			$this->form[] = ['label'=>'Implementing Unit','name'=>'ar_implementingUnit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Child M','name'=>'ar_ap_child_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Activities Youth M','name'=>'ar_ap_youth_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Activities Adult M','name'=>'ar_ap_adult_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Activities Child F','name'=>'ar_ap_child_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Activities Youth F','name'=>'ar_ap_youth_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Activities Adult F','name'=>'ar_ap_adult_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Total Participant','name'=>'ar_ap_total','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-5','readonly'=>'true'];
			$this->form[] = ['label'=>'Activities Comments','name'=>'ar_comments','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Aims','name'=>'ar_ac_aims','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Follow Up','name'=>'ar_ac_follow','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Process','name'=>'ar_ac_process','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Challenges','name'=>'ar_ac_challenges','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Improve','name'=>'ar_ac_improve','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Ies','name'=>'ar_ac_ies','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Comments','name'=>'ar_ac_comments','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Attendance Register','name'=>'ar_at_attendence','type'=>'filemanager','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','filemanager_type'=>'file','help'=>'upload your docx or pdf (max:1000 KB)'];
			$this->form[] = ['label'=>'Activities Minutes','name'=>'ar_at_minute','type'=>'filemanager','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','filemanager_type'=>'file','help'=>'upload your docx or pdf (max:1000 KB)'];
			$this->form[] = ['label'=>'Cover Picture','name'=>'ar_at_pic1','type'=>'upload','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','help'=>'All image are allowed only 1000 Kb'];
			$this->form[] = ['label'=>'Picture Two','name'=>'ar_at_pic2','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Picture Three','name'=>'ar_at_pic3','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Picture Four','name'=>'ar_at_pic4','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Picture Five','name'=>'ar_at_pic5','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Extra Link','name'=>'ar_at_link','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Activities Action Plan','name'=>'ar_at_actionPlan','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Others Attachment','name'=>'ar_at_others','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Activities Name','name'=>'cn_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'ai_concept_note,acn_name','help'=>'For conducted must approve your concept note.','datatable_where'=>'acn_status = 100'];
			//$this->form[] = ['label'=>'Line Manager','name'=>'flow_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges=10 && status = "Active"'];
			//$this->form[] = ['label'=>'Activities Date','name'=>'ar_date','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Venue','name'=>'ar_venue','type'=>'custom','validation'=>'required|min:1|max:255','width'=>'col-sm-10','html'=>'<input type=\'text\' title="Activities Venue"               required  placeholder=\'Type your venue\'  maxlength=255 class=\'form-control\'               name="ar_venue" id="ar_venue" value=\'\'/>        <div class="text-danger"></div>        <div id="ar_venue1"></div>        <p class=\'help-block\'></p><script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>    <script type="text/javascript">        $(\'#ar_venue\').keyup(function(){                        var ar_venue = $(this).val();                        if(ar_venue != \'\'){                             $.ajax({                                url:\'http://localhost/actionaid/public/checkVenue/\'+ ar_venue,                                method:\'GET\',                                success:function(data){                                      $(\'#ar_venue1\').fadeIn();                                    $(\'#ar_venue1\').html(data);                                }                            });                        }                    });                     $(document).on(\'click\',\'li\',function(){                        $(\'#ar_venue\').val($(this).text());                        $(\'#ar_venue1\').fadeOut();                     });    </script>'];
			//$this->form[] = ['label'=>'Implementing Unit','name'=>'ar_implementingUnit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Child M','name'=>'ar_ap_child_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Activities Youth M','name'=>'ar_ap_youth_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Activities Adult M','name'=>'ar_ap_adult_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Activities Child F','name'=>'ar_ap_child_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Activities Youth F','name'=>'ar_ap_youth_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Activities Adult F','name'=>'ar_ap_adult_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Total Participant','name'=>'ar_ap_total','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-5','readonly'=>'true'];
			//$this->form[] = ['label'=>'Activities Comments','name'=>'ar_comments','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Aims','name'=>'ar_ac_aims','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Follow Up','name'=>'ar_ac_follow','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Process','name'=>'ar_ac_process','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Challenges','name'=>'ar_ac_challenges','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Improve','name'=>'ar_ac_improve','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Ies','name'=>'ar_ac_ies','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Comments','name'=>'ar_ac_comments','type'=>'wysiwyg','validation'=>'required|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Attendance Register','name'=>'ar_at_attendence','type'=>'filemanager','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','filemanager_type'=>'file','help'=>'upload your docx or pdf (max:1000 KB)'];
			//$this->form[] = ['label'=>'Activities Minutes','name'=>'ar_at_minute','type'=>'filemanager','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','filemanager_type'=>'file','help'=>'upload your docx or pdf (max:1000 KB)'];
			//$this->form[] = ['label'=>'Cover Picture','name'=>'ar_at_pic1','type'=>'upload','validation'=>'required|min:1|max:1000','width'=>'col-sm-10','help'=>'All image are allowed only 1000 Kb'];
			//$this->form[] = ['label'=>'Picture Two','name'=>'ar_at_pic2','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Picture Three','name'=>'ar_at_pic3','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Picture Four','name'=>'ar_at_pic4','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Picture Five','name'=>'ar_at_pic5','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Extra Link','name'=>'ar_at_link','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Activities Action Plan','name'=>'ar_at_actionPlan','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Others Attachment','name'=>'ar_at_others','type'=>'upload','validation'=>'max:1000','width'=>'col-sm-10'];
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
	        $this->script_js = "$('#ar_ap_adult_f').blur(function(){

                        // var acn_ap_male 	= 	$('#acn_ap_male').val();
                        // var acn_ap_female 	= 	$('#acn_ap_female').val();
                        var ar_ap_child_m 	= 	$('#ar_ap_child_m').val();
                        var ar_ap_youth_m 	= 	$('#ar_ap_youth_m').val();
                        var ar_ap_adult_m 	= 	$('#ar_ap_adult_m').val();
                        var ar_ap_child_f 	= 	$('#ar_ap_child_f').val();
                        var ar_ap_youth_f 	= 	$('#ar_ap_youth_f').val();
                        var ar_ap_adult_f 	= 	$('#ar_ap_adult_f').val();

                       // var sum1 = +acn_ap_male + +acn_ap_female; 
                         var sum2 = +ar_ap_child_m + +ar_ap_youth_m + +ar_ap_adult_m+ +ar_ap_child_f+ +ar_ap_youth_f+ +ar_ap_adult_f; 
                        // if(sum1 != sum2){
                        // 	alert('Your total participant is :'+ sum1 +' But you given :'+ sum2 +' . Please try again!'); 
                        // 	document.getElementById('acn_ap_adult_f').value = '';
                        // } else{ 
                        	document.getElementById('ar_ap_total').value = sum2;
                        //}
                   });  ";


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
	        $postdata['user_Id'] = CRUDBooster::myId(); 
	        $postdata['ar_ap_male']	= $postdata['ar_ap_child_m']+$postdata['ar_ap_youth_m']+$postdata['ar_ap_adult_m'];
	        $postdata['ar_ap_female'] = $postdata['ar_ap_child_f']+$postdata['ar_ap_youth_f']+$postdata['ar_ap_adult_f'];

	        $parents = DB::table('ai_concept_note')->where('id',$postdata['cn_id'])->first();
	        $postdata['pri_id'] 	= $parents->pri_id;
	        $postdata['foc_id'] 	= $parents->foc_id;
	        $postdata['ind_id'] 	= $parents->ind_id;
	        $postdata['p_act_id'] 	= $parents->p_act_id;

	        $time = time();
			$month = date("m",$time);
			$year = date("Y",$time); 

	        $postdata['reporting_month']	= $month;
	        $postdata['reporting_year']		= $year;
	        //dd($postdata);

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
	    	// $ar = CRUDBooster::first('ai_activity_report',$id);
	    	// dd($ar);
	    	// echo $id;
	    	$conducted = DB::table('ai_activity_report')
	    			->join('ai_concept_note','ai_concept_note.id','=','ai_activity_report.cn_id')
	    			->where('ai_activity_report.id','=',$id)
	    			->first();
	    	// dd($conducted);

	    	CRUDBooster::sendNotification($config=[
				'content'	=> 'An Activities Report Has Been Conducted',
				'to'		=> url('admin/ai_concept_note/detail/'.$id),
				'id_cms_users'	=> [$conducted->flow_id,$conducted->meOfficer,$conducted->headOfficer]
			]);

			DB::table('ai_concept_note')->where('id',$conducted->cn_id)->update(['acn_status' => '101']);
			// dd($conducted->cn_id);
			// exit();
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
	        $postdata['ar_ap_male']	= $postdata['ar_ap_child_m']+$postdata['ar_ap_youth_m']+$postdata['ar_ap_adult_m'];
	        $postdata['ar_ap_female'] = $postdata['ar_ap_child_f']+$postdata['ar_ap_youth_f']+$postdata['ar_ap_adult_f'];

	        $parents = DB::table('ai_concept_note')->where('id',$postdata['cn_id'])->first();
	        $postdata['pri_id'] 	= $parents->pri_id;
	        $postdata['foc_id'] 	= $parents->foc_id;
	        $postdata['ind_id'] 	= $parents->ind_id;
	        $postdata['p_act_id'] 	= $parents->p_act_id;

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
		  	->join('ai_activities', 'ai_activities.id', '=', 'ai_activity_report.p_act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_activity_report.user_id') 
		  	->where('ai_activity_report.id',$id)->first(); 

		  $this->cbView('admin.DetailsActivitiesReport',$data);
		}

	    //By the way, you can still create your own method in here... :) 


	}