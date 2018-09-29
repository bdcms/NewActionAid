<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;

class SystemController extends Controller{
    
	public function CNreject(Request $request){
		$this->validate($request,[ 
	            'comment'	=> 'required',   
	        ]);
		$time = time();
		$time = date("Y-m-d H:m:s",$time);  
		$data = [
			'acn_status'			=> 99,
			'rejected_comment'		=> $request->comment,
			'rejected_by'			=> \CRUDBooster::myId(),
			'rejected_date'			=> $time,
		];
		// echo $request->id;
		// dd($data);
		$done = \DB::table('ai_concept_note')->where('id',$request->id)->update($data);

		if($done){
			\CRUDBooster::sendNotification($config=[
				'content'	=> 'Your concept note is rejected!...',
				'to'		=> url('admin/ai_concept_note/detail/'.$request->id),
				'id_cms_users'	=> [$request->userId],
			]);
			$to = url('/admin/ai_concept_note');
			$message = "Rejected Successfull";
			$type	= "info";
			\CRUDBooster::redirect($to,$message,$type);
			//return redirect()->route('demo_test')->with('message', trans("crudbooster.message_forgot_password"));
		}
	}

//approving system
	public function is_LineManagerApprove($cNid){
		//echo $cNid;
		$time = time();
		$time = date("Y-m-d H:m:s",$time);  
		$data = [
			'acn_status'			=> 2,
			'meOfficer'				=> 11, 
			'line_date'				=> $time,
		];
		// echo $request->id;
		// dd($data);
		$done = \DB::table('ai_concept_note')->where('id',$cNid)->update($data);

		if($done){
			\CRUDBooster::sendNotification($config=[
				'content'	=> 'Waiting a Concept Note For Check...',
				'to'		=> url('admin/ai_concept_note/detail/'.$cNid),
				'id_cms_users'	=> ['11'],
			]);
			$to = url('/admin/ai_concept_note');
			$message = "Approved Successfull";
			$type	= "info";
			\CRUDBooster::redirect($to,$message,$type);
		}	
	}

	public function is_MEOfficerApprove(Request $request){
		//dd($request);
		// $this->validate($request,[ 
	 //            'comment'	=> 'required',   
	 //        ]);
		$data = [
			'act_number'		=> 		$request->act_number,
			'act_name'			=> 		$request->act_name,
			'act_baseline'		=> 		$request->act_baseline,
			'act_target2022'	=> 		$request->act_target2022,
			'act_target2018'	=> 		$request->act_target2018,
			'act_mov'			=> 		$request->act_mov,
			'act_dataCollection'=> 		$request->act_dataCollection,
			'act_frequency'		=> 		$request->act_frequency,
			'act_assumption'	=> 		$request->act_assumption,
			'pri_id'			=> 		$request->pri_id,
			'foc_id'			=> 		$request->foc_id,
			'ind_id'			=> 		$request->ind_id, 
			'is_parent'			=> 		$request->act_id,
			'is_user'			=> 		$request->is_user,
			//'headOfficer'		=>		$request->headOfficer,
			'is_conduct'		=> 		1,
		]; 
		//dd($data);
		$act_id = DB::table('ai_activities')->insertGetId($data);

		if($act_id){
			$time = time();
			$time = date("Y-m-d H:m:s",$time);  
			$dataCN = [
				'acn_status'			=> 		3,
				'headOfficer'			=> 		$request->headOfficer, 
				'me_date'				=> 		$time,
				'act_id'				=> 		$act_id,
			];
			$done = DB::table('ai_concept_note')->where('id',$request->cNid)->update($dataCN);

			if($done){
				\CRUDBooster::sendNotification($config=[
					'content'	=> 'Waiting a Concept Note For Check...',
					'to'		=> url('admin/ai_concept_note/detail/'.$request->cNid),
					'id_cms_users'	=> [$request->headOfficer],
				]);
				$to = url('/admin/ai_concept_note');
				$message = "Approved Successfull";
				$type	= "info";
				\CRUDBooster::redirect($to,$message,$type);
			}


		}


	}

	public function is_HeadOfficerApprove($cNid,$userId){
		//echo $cNid;
		$time = time();
		$time = date("Y-m-d H:m:s",$time);  
		$data = [
			'acn_status'			=> 100, 
			'head_date'				=> $time,
		]; 
		$done = \DB::table('ai_concept_note')->where('id',$cNid)->update($data); 
		if($done){
			\CRUDBooster::sendNotification($config=[
				'content'	=> 'Your Concept Note is Approved..',
				'to'		=> url('admin/ai_concept_note/detail/'.$cNid),
				'id_cms_users'	=> [$userId],
			]);
			$to = url('/admin/ai_concept_note');
			$message = "Approved Successfull";
			$type	= "info";
			\CRUDBooster::redirect($to,$message,$type);
		}	
	}

	public function performance(){
		$data = [];
	   	$data['page_title'] = 'Products Data';
	   	$data['result'] = DB::table('demo_test')->orderby('id','desc')->paginate(10);
		return view('admin.performance',$data);
		//echo "string";
	}


//ajax request
	public function checkVenue($value){
		$getVenue = DB::table('ai_activity_report')->select('ar_venue')->distinct()->where('ar_venue','like','%'.$value.'%')->get();
		//dd($getVenue);
		$result = '';
		$result .= '<div class = "skill"><ul>';
		if(!empty($getVenue)){
			 foreach ($getVenue as $value) { 
				$result.='<li>'.$value->ar_venue.'</li>';
			}
		}else{
			$result .= '<li>Result Not Found</li>';
		}
		$result .= '</ul></div>';
		echo $result; 
	}




	public function getDataTable1($fk_value){
        $table = 'ai_activities';
        $label = 'act_name'; 
        $foreign_key_name = 'ind_id';
        $foreign_key_value = $fk_value;
        if ($table && $label && $foreign_key_name && $foreign_key_value) {
        	$data = "<option  value=' '>Select an Activities</option>"; 
        	$query = DB::table($table)->where($foreign_key_name, $foreign_key_value)->get(); 
            	foreach ($query as $value) { 
            		if($value->is_parent == NULL){
            			$data .= "<option  value='".$value->id."'>".$value->act_name."</option>"; 
            		}elseif($value->is_user == \CRUDBooster::myId() && $value->is_conduct == 1){
            			$data .= "<option  value='".$value->id."'>".$value->act_name."</option>"; 
            		}
            	}
            return response()->json($data);
        } else {
            return response()->json([]);
        }
    }




	//pdf

	public function makePDF($id){
    	$data['row'] = DB::table('ai_activity_report')
		  	->join('ai_activities', 'ai_activities.id', '=', 'ai_activity_report.p_act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_activity_report.user_id') 
		  	->where('ai_activity_report.id',$id)->first(); 
    	
    	$pdf = PDF::loadView('admin.pdf.ActivitiesPdf', $data);
    	//return $pdf->stream();
		return $pdf->stream('ActivitiesPdf.pdf');
    }

    public function makeCnPDF($id){
		  	 $data['row'] = DB::table('ai_concept_note')
		  	->join('ai_activities', 'ai_activities.id', '=', 'ai_concept_note.p_act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_concept_note.userId') 
		  	->where('ai_concept_note.id',$id)->first(); 
    	
    	$pdf = PDF::loadView('admin.pdf.CnPdf', $data);
    	//return $pdf->stream();
		return $pdf->stream('CnPdf.pdf');
    }

}

// //$query->select('id as select_value', $label.' as select_label','is_parent as parent','is_user as user','is_conduct as conduct');
            // $query->where($foreign_key_name, $foreign_key_value);
            // $query->orderby($label, 'asc');
            // $all = $query->get();
            //dd($all);
            // $i = 0; 
            // foreach ($all as $value) {
            // 	 if($value->is_parent == NULL){
            // 	 	echo $i.' ';
            // 	 	$data = [
            // 	 		$i 	=>	[
            // 	 			'select_value' => $value->id,
	           //  			'select_label' => $value->act_name, 
            // 	 		],
            // 	 	];
            // 	 }
            // 	 $i++;
            // 	 echo $i;
          //  }
         //    $some = [

	        // '0'	=>  [
	        //     	'select_value' => 4,
	        //     	'select_label' => 'asdfa', 
	        //     ],

	        // '1'	=>  [
	        //     	'select_value' => 5,
	        //     	'select_label' => '31', 
	        //     ],    
	        // ];    
            //  $data = (object) $data;
            // echo "<pre>"; 
            // print_r($data);
            // echo "</pre>";