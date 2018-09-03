<?php

namespace App\Http\Controllers;

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

}
