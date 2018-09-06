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


	//pdf

	public function makePDF($id){
    	$data['row'] = DB::table('ai_activity_report')
		  	->join('ai_activities', 'ai_activities.id', '=', 'ai_activity_report.act_id') 
		  	->join('cms_users', 'cms_users.id', '=', 'ai_activity_report.user_id') 
		  	->where('ai_activity_report.id',$id)->first(); 
    	
    	$pdf = PDF::loadView('admin.pdf.ActivitiesPdf', $data);
    	//return $pdf->stream();
		return $pdf->stream('ActivitiesPdf.pdf');
    }

}
