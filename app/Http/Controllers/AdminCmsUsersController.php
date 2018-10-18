<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;

class AdminCmsUsersController extends \crocodicstudio\crudbooster\controllers\CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';	
		$this->button_import 	   = FALSE;	
		$this->button_export 	   = FALSE;	
		# END CONFIGURATION DO NOT REMOVE THIS LINE
	
		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Name","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);	
		$this->col[] = ["label"=>"Status","name"=>"status","callback" => function($row){
				if($row->status == 'Active'){
					return Enable;
				}else{
					return Disable;
				}
			}];	
		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = array(); 		
		$this->form[] = array("label"=>"Name","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
		$this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());	

		$this->form[] = array("label"=>"Mobile","name"=>"mobile",'required'=>true,'validation'=>'required|Numeric');
		$this->form[] = array("label"=>"Man Number","name"=>"man_number",'required'=>true,'validation'=>'required|string|min:3');
		$this->form[] = array("label"=>"Location","name"=>"location","type"=>"select","datatable"=>"ai_location,loc_name",'required'=>true);
		$this->form[] = array("label"=>"Department","name"=>"department","type"=>"select","datatable"=>"ai_department,dep_name",'required'=>true);
		if(CRUDBooster::isSuperadmin()){
		$this->form[] = array("label"=>"Date Engaged","name"=>"date_engeged","type" =>"date",'required'=>true,'validation'=>'required');
		$this->form[] = array("label"=>"Contract Begin(Date) ","name"=>"date_beging","type" =>"date",'required'=>true,'validation'=>'required');
		$this->form[] = array("label"=>"Contract Expire(Date)","name"=>"date_expaire","type" =>"date",'required'=>true,'validation'=>'required');
		}else{
			$this->form[] = array("label"=>"Date Engaged","name"=>"date_engeged",'readonly'=>true,'required'=>true,'validation'=>'required');
		$this->form[] = array("label"=>"Contract Begin(Date) ","name"=>"date_beging",'readonly'=>true,'required'=>true,'validation'=>'required');
		$this->form[] = array("label"=>"Contract Expire(Date)","name"=>"date_expaire",'readonly'=>true,'required'=>true,'validation'=>'required');
		}
		$this->form[] = array("label"=>"Photo","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'required'=>true,'validation'=>'required|image|max:1000','resize_width'=>90,'resize_height'=>90);											
		$this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);

		$url = url()->current();
	        $ss = explode('/',$url);
	        $s = array_search("add",$ss);
	        if($ss[$s] != 'add'){ 
		$this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
	        }				
		# END FORM DO NOT REMOVE THIS LINE
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
	        if(CRUDBooster::isSuperadmin()){
		        $this->addaction = array(
		        	[
		        		'label' => '',
		        		'url'	=> url('/useractive/[id]'),
		        		'icon'=>'fa fa-toggle-off',
		        		'color'=>'primary',
		        		'showIf'=> '[status] == "0"',
		        		'confirmation' => true
		        	],
		        	[
		        		'label' => '',
		        		'url'	=> url('/userdeactive/[id]'),
		        		'icon'=>'fa fa-toggle-on',
		        		'color'=>'warning',
		        		'showIf'=> '[status] == "Active"',
		        		'confirmation' => true
		        	]
		        );
		    } 


		/* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array(
	        	['condition'=>"[status] == '0'","color"=>"danger"],['condition'=>"[status] == 'Active'","color"=>"info"]
	        ); 

				
	}

	public function hook_before_add(&$postdata) {  
		$rand_string = str_random(8);
	    $password = \Hash::make($rand_string); 
		$postdata['password'] = $password; 
		$mailData = ['name'=>$postdata['name'],'password'=>$rand_string,'link' => 'https://www.progtech.online/actionaid/public/admin/'];
		CRUDBooster::sendEmail(['to' => $postdata['email'], 'data' => $mailData, 'template' => 'send_user_password']);
		//dd($postdata);
	}
	// public function hook_after_add($id) {        
	//         //Your code here
	//         echo $id.' Id';
	//          $row = CRUDBooster::first($this->table,$id);
	//          dd($row);
	//         //  CRUDBooster::sendNotification($config=[
	//         // 	'content' 		=> 'Conducts An Activities',
	//         // 	'to'			=>	url("admin/ai_activity_report/detail/$id"),
	//         // 	'id_cms_users'	=>	$row->flow_id,
	//         // ]);

	//     }


	public function getProfile() {			

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;			
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;	
		$this->hide_form 	  = ['id_cms_privileges'];

		$data['page_title'] = trans("crudbooster.label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',CRUDBooster::myId());		
		$this->cbView('crudbooster::default.form',$data);				
	}

	public function useractive($id){
        if(\CRUDBooster::isSuperadmin()){
            $done = DB::table('cms_users')->where('id', $id)->update(['status'=> 'Active']);
            if($done){   
                return redirect('/admin/users');
            } 
        }else{
            return redirect('/admin/users');
        }
    }
    public function userdeactive($id){
        if(\CRUDBooster::isSuperadmin()){
            $done = DB::table('cms_users')->where('id', $id)->update(['status'=> '0']);
            if($done){   
                return redirect('/admin/users');
            } 
        }else{
            return redirect('/admin/users');
        }
    }
}
