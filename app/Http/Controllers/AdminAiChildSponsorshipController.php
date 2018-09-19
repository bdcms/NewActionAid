<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminAiChildSponsorshipController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_import = true;
			$this->button_export = false;
			$this->table = "ai_child_sponsorship";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Period Under Review","name"=>"chi_periodReview","width"=>"150"];
			 $this->col[] = ["label"=>"#of total links","name"=>"totalLinks_t","width"=>"80"];
			$this->col[] = ["label"=>"#of messages collected","name"=>"msgCollected_t","width"=>"80"];
			$this->col[] = ["label"=>"#of outstanding messages","name"=>"outstandingMsg_t","width"=>"80"];
			$this->col[] = ["label"=>"#of outstanding photos","name"=>"outstandingPhotos_t","width"=>"80"];
			$this->col[] = ["label"=>"#of queries","name"=>"queriesFollow_t","width"=>"80"];
			$this->col[] = ["label"=>"#of follow ups outstanding","name"=>"outstandingFollow_t","width"=>"80"];
			$this->col[] = ["label"=>"follow ups completed","name"=>"completedFollow_t","width"=>"80"];
			$this->col[] = ["label"=>"#of new links","name"=>"newLinks_t","width"=>"80"];
			$this->col[] = ["label"=>"Lead By","name"=>"chi_userId","join"=>"cms_users,name","width"=>"100"]; 
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Period under Review','name'=>'chi_periodReview','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of Total Links F','name'=>'totalLinks_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of Total Links M','name'=>'totalLinks_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'totalLinks_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of messages collected F','name'=>'msgCollected_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of messages collected M','name'=>'msgCollected_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'msgCollected_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of outstanding messages F','name'=>'outstandingMsg_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of outstanding messages M','name'=>'outstandingMsg_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'outstandingMsg_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of photos collected F','name'=>'photosCollected_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of photos collected M','name'=>'photosCollected_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'photosCollected_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of outstanding photos F','name'=>'outstandingPhotos_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of outstanding photos M','name'=>'outstandingPhotos_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'outstandingPhotos_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of queries or follow ups F','name'=>'queriesFollow_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of queries or follow ups M','name'=>'queriesFollow_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'queriesFollow_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of follow ups outstanding F','name'=>'outstandingFollow_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of follow ups outstanding M','name'=>'outstandingFollow_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'outstandingFollow_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of follow ups completed F','name'=>'completedFollow_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of follow ups completed M','name'=>'completedFollow_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'completedFollow_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'#of new links F','name'=>'newLinks_f','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'#of new links M','name'=>'newLinks_m','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Comments','name'=>'newLinks_c','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Successes in period','name'=>'chi_successes','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Challenges faced in period','name'=>'chi_challenges','type'=>'textarea','validation'=>'string|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Recommendations','name'=>'chi_recommendation','type'=>'textarea','validation'=>'string|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Potential Stories of Change','name'=>'chi_potentialStories','type'=>'textarea','validation'=>'string|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Chi UserId","name"=>"chi_userId","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Chi PeriodReview","name"=>"chi_periodReview","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"TotalLinks F","name"=>"totalLinks_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"TotalLinks M","name"=>"totalLinks_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"TotalLinks T","name"=>"totalLinks_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"TotalLinks C","name"=>"totalLinks_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"MsgCollected F","name"=>"msgCollected_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"MsgCollected M","name"=>"msgCollected_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"MsgCollected T","name"=>"msgCollected_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"MsgCollected C","name"=>"msgCollected_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"OutstandingMsg F","name"=>"outstandingMsg_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingMsg M","name"=>"outstandingMsg_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingMsg T","name"=>"outstandingMsg_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingMsg C","name"=>"outstandingMsg_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"PhotosCollected F","name"=>"photosCollected_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"PhotosCollected M","name"=>"photosCollected_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"PhotosCollected T","name"=>"photosCollected_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"PhotosCollected C","name"=>"photosCollected_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"OutstandingPhotos F","name"=>"outstandingPhotos_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingPhotos M","name"=>"outstandingPhotos_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingPhotos T","name"=>"outstandingPhotos_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingPhotos C","name"=>"outstandingPhotos_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"QueriesFollow F","name"=>"queriesFollow_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"QueriesFollow M","name"=>"queriesFollow_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"QueriesFollow T","name"=>"queriesFollow_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"QueriesFollow C","name"=>"queriesFollow_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"OutstandingFollow F","name"=>"outstandingFollow_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingFollow M","name"=>"outstandingFollow_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingFollow T","name"=>"outstandingFollow_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"OutstandingFollow C","name"=>"outstandingFollow_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"CompletedFollow F","name"=>"completedFollow_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"CompletedFollow M","name"=>"completedFollow_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"CompletedFollow T","name"=>"completedFollow_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"CompletedFollow C","name"=>"completedFollow_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"NewLinks F","name"=>"newLinks_f","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"NewLinks M","name"=>"newLinks_m","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"NewLinks T","name"=>"newLinks_t","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"NewLinks C","name"=>"newLinks_c","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Chi Successes","name"=>"chi_successes","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Chi Challenges","name"=>"chi_challenges","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Chi Recommendation","name"=>"chi_recommendation","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Chi PotentialStories","name"=>"chi_potentialStories","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Chi FlowId","name"=>"chi_flowId","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
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
	        $this->script_js = NULL;


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
	        $postdata['totalLinks_t'] = $postdata['totalLinks_f']+$postdata['totalLinks_m'];
	        $postdata['msgCollected_t'] = $postdata['msgCollected_f']+$postdata['msgCollected_m'];
	        $postdata['outstandingMsg_t'] = $postdata['outstandingMsg_f']+$postdata['outstandingMsg_m'];
	        $postdata['photosCollected_t'] = $postdata['photosCollected_f']+$postdata['photosCollected_m'];
	        $postdata['outstandingPhotos_t'] = $postdata['outstandingPhotos_f']+$postdata['outstandingPhotos_m'];
	        $postdata['queriesFollow_t'] = $postdata['queriesFollow_f']+$postdata['queriesFollow_m'];
	        $postdata['outstandingFollow_t'] = $postdata['outstandingFollow_f']+$postdata['outstandingFollow_m'];
	        $postdata['completedFollow_t'] = $postdata['completedFollow_f']+$postdata['completedFollow_m'];
	        $postdata['newLinks_t'] = $postdata['newLinks_f']+$postdata['newLinks_m'];
	        $postdata['chi_userId'] = CRUDBooster::myId();
	        $postdata['chi_flowId'] = 1;

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
		  $data['row'] = DB::table('ai_child_sponsorship') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_child_sponsorship.chi_userId') 
		  	->where('ai_child_sponsorship.id',$id)->first(); 

		  $this->cbView('admin.DetailsChildSponsorshipsReport',$data);
		}



	    //By the way, you can still create your own method in here... :) 


	}