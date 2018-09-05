<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SystemController extends Controller{
    
	public function reject(Request $request){
		$this->validate($request,[ 
	            'comment'	=> 'required',   
	        ]);
		$time = time();
		$time = date("Y-m-d H:m:s",$time);  
		$data = [
			'status'				=> 99,
			'rejected_comment'		=> $request->comment,
			'rejected_by'			=> \CRUDBooster::myId(),
			'rejected_date'			=> $time,
		];
		//dd($data);
		$done = \DB::table('demo_test')->where('id',$request->id)->update($data);
		if($done){
			$to = 'http://localhost/actionaid/public/admin/demo_test';
			$message = "Rejected Successfull";
			$type	= "info";
			\CRUDBooster::redirect($to,$message,$type);
			//return redirect()->route('demo_test')->with('message', trans("crudbooster.message_forgot_password"));
		}
	}

	public function checkVenue($value){
		$getVenue = DB::table('ai_activity_report')->where('ar_venue','like','%'.$value.'%')->get();
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

}
