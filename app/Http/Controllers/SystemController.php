<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;
use App\performanceModel;
use Exporter;
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

	public function performance(Request $request){
		if(isset($request->priority)){ 
			$priority=$request->priority; 
			$area=$priority;

		}else{
			$area="";
		}

		$data = [];
	   	$data['page_title'] = 'Products Data';
	   	$data['result'] = DB::table('demo_test')->orderby('id','desc')->paginate(10);
	   	$activity = performanceModel::activity_select_all(); 
	   	$a_report = performanceModel::activity_report_select_all($area); 
	   	$priority=DB::table('ai_priorityarea')->get();
	   	$activity_count=count($activity);
	   	
	    
	   	for ($i=0; $i <$activity_count ; $i++) { //Activity Count for Loop start 
        		$info[$i]["activity_name"]		= performanceModel::activity_name_with_actitity_report($a_report[$i]->p_act_id,$area);  
        		$info[$i]["indicator_name"]		= performanceModel::indicator_name_with_actitity_report($a_report[$i]->id,$area);

        	for ($j=1; $j <=12 ; $j++) {  //Monthly data fatch forLoop start 

        		$info[$i]["child_male"][$j]		= performanceModel::activity_report_child_male($activity[$i]->id,$j,$area);  

        		$info[$i]["c_male_t"] 			= $info[$i]["c_male_t"] + $info[$i]["child_male"][$j];
        		$info[$i]["c_male_st"]			= $info[$i]["c_male_st"]+$info[$i]["c_male_t"];

        		$info[$i]["child_f_male"][$j]	= performanceModel::activity_report_child_F_male($activity[$i]->id,$j,$area); 
        		$info[$i]["c_F_male_t"] 		= $info[$i]["c_F_male_t"] + $info[$i]["child_f_male"][$j];
        		$info[$i]["c_F_male_st"]		= $info[$i]["c_F_male_st"]+$info[$i]["c_F_male_t"];

        		$info[$i]["youth_male"][$j]		= performanceModel::activity_report_youth_male($activity[$i]->id,$j,$area); 
        		$info[$i]["youth_male_T"] 		= $info[$i]["youth_male_T"] + $info[$i]["youth_male"][$j];
        		$info[$i]["youth_male_S_T"]		= 	$info[$i]["youth_male_S_T"]+$info[$i]["youth_male_T"]; 


        		$info[$i]["youth_f_male"][$j]	= performanceModel::activity_report_youth_F_male($activity[$i]->id,$j,$area); 
        		$info[$i]["youth_f_male_T"] 	= $info[$i]["youth_f_male_T"] + $info[$i]["youth_f_male"][$j];
        		$info[$i]["youth_f_male_S_T"]	= $info[$i]["youth_f_male_S_T"]+$info[$i]["youth_f_male_T"];

        		$info[$i]["audult_male"][$j]	= performanceModel::activity_report_audult_male($activity[$i]->id,$j,$area); 
        		$info[$i]["audult_male_t"] 		= $info[$i]["audult_male_t"] + $info[$i]["audult_male"][$j];
        		$info[$i]["audult_male_s_t"]	= $info[$i]["audult_male_s_t"]+$info[$i]["audult_male_t"];


        		$info[$i]["audult_F_male"][$j]	= performanceModel::activity_report_audult_F_male($activity[$i]->id,$j,$area); 
        		$info[$i]["audult_F_male_t"] 	= $info[$i]["audult_F_male_t"] + $info[$i]["audult_F_male"][$j];
        		$info[$i]["audult_F_male_s_t"]	= $info[$i]["audult_F_male_s_t"]+$info[$i]["audult_F_male_t"];


        		$info[$i]["male"][$j]			= performanceModel::activity_report_jan_male($activity[$i]->id,$j,$area); 
        		$info[$i]["male_total"] 		= $info[$i]["male_total"] + $info[$i]["male"][$j];
        		$info[$i]["male_sub_total"]		= $info[$i]["male_sub_total"]+$info[$i]["male_total"];

        		$info[$i]["female"][$j]			= performanceModel::activity_report_jan_female($activity[$i]->id,$j,$area); 
        		$info[$i]["female_total"] 		= $info[$i]["female_total"] + $info[$i]["female"][$j];
        		$info[$i]["female_sub_total"]	= $info[$i]["female_sub_total"]+$info[$i]["female_total"];

        		$info[$i]['female_sub_to'][$j]  = $info[$i]['female_sub_to'][$j] + $info[$i]["child_male"][$j]+$info[$i]["child_f_male"][$j]+$info[$i]["youth_male"][$j]+$info[$i]["youth_f_male"][$j]+$info[$i]["audult_male"][$j]+$info[$i]["audult_F_male"][$j]; 
        	}//Monthly data fatch forLoop exit
        	// dd($info[$i]["child_male"]);
        		$info[$i]['y_ttl_mel_child']	= performanceModel::activity_report_child_mel_year_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_fmel_child']	= performanceModel::activity_report_child_fmel_year_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_youth_mel']	= performanceModel::activity_report_youth_melyear_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_youth_F_mel']	= performanceModel::activity_report_youth_F_melyear_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_adult_mel']	= performanceModel::activity_report_adult_melyear_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_adult_F_mel']	= performanceModel::activity_report_adult_F_melyear_subtotal($activity[$i]->id);
        		// $info[$i]['y_ttl_total_F_mel']	= performanceModel::activity_report_total_F_melyear_subtotal($activity[$i]->id);

        		$info[$i]['y_ttl_total_mel']	= performanceModel::activity_report_total_melyear_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_total_F_mel']	= performanceModel::activity_report_total_F_melyear_subtotal($activity[$i]->id);
        		$info[$i]['y_ttl_total_sub']	= $info[$i]['y_ttl_total_sub']+$info[$i]['y_ttl_adult_F_mel']+$info[$i]['y_ttl_adult_mel']+$info[$i]['y_ttl_youth_F_mel']+$info[$i]['y_ttl_youth_mel']+$info[$i]['y_ttl_fmel_child']+$info[$i]['y_ttl_mel_child'];

        }//Activity Count for Loop exit Audult Male
        // dd($info[0]['year_total']);

		return view('admin.performance',$data)->with('count',$activity_count)->with('info',$info)->with('prioritys',$priority);
		//echo "string"; male_total
	}
public function performance_export(Request $request){
 
	 	$query = DB::table('ai_activity_report')
	 	->join('ai_activities','ai_activity_report.p_act_id','=','ai_activities.id')
	 	->join('ai_priorityarea','ai_activity_report.pri_id','=','ai_priorityarea.id')
	 	->join('ai_focusarea','ai_activity_report.foc_id','=','ai_focusarea.id')  
	 	->join('ai_indicators','ai_activity_report.ind_id','=','ai_indicators.id')
	 	->join('cms_users','ai_activity_report.user_id','=','cms_users.id')
	 	->where('ai_activity_report.ar_status',1)->get();
	 	// ->join('cms_users','ai_activity_report.flow_id','=','cms_users.id') 

	 	// ->select('ai_activities.act_name','ai_priorityarea.pri_name','ai_focusarea.foc_name','ai_indicators.ind_name','cms_users.name','ai_activity_report.ar_date','ai_activity_report.ar_venue','ai_activity_report.ar_implementingUnit','ai_activity_report.ar_ap_female','ai_activity_report.ar_ap_male','ai_activity_report.ar_ap_youth_m','ai_activity_report.ar_ap_adult_m','ai_activity_report.ar_ap_child_f','ai_activity_report.ar_ap_youth_f','ai_activity_report.ar_ap_adult_f','ai_activity_report.ar_ap_total','ai_activity_report.reporting_month','ai_activity_report.reporting_year');

 
	 	// dd($query);
		$output .='
				<table class="table" bordered="1">
				<tr  style="border:1px solid #ccc;"> 
					<th style="border:1px solid #ccc;">Name Of Activity</th>
					<th style="border:1px solid #ccc;">Priority Area</th>
					<th style="border:1px solid #ccc;">Focush Area</th>
					<th style="border:1px solid #ccc;">Indicators</th>
					<th style="border:1px solid #ccc;">Reporter Name</th>
					<th style="border:1px solid #ccc;">Date</th>
					<th style="border:1px solid #ccc;">Month</th>
					<th style="border:1px solid #ccc;">Year</th>
					<th style="border:1px solid #ccc;">Venue</th>
					<th style="border:1px solid #ccc;">Implementing Unit</th>
					<th style="border:1px solid #ccc;">Total Female</th>
					<th style="border:1px solid #ccc;">Total Male</th>
					<th style="border:1px solid #ccc;"> Youth Male</th>
					<th style="border:1px solid #ccc;"> Adult Male</th>
					<th style="border:1px solid #ccc;">Child Female</th>
					<th style="border:1px solid #ccc;">Youth Female</th>
					<th style="border:1px solid #ccc;">Adult Female</th>
					<th style="border:1px solid #ccc;">Total</th>
					
					 
				</tr>
			';
			foreach($query as $row){
 
					$output .='
						<tr>
							<td style="border:1px solid #ccc;">'.$row->act_name.'</td>
							<td style="border:1px solid #ccc;">'.$row->pri_name.'</td>
							<td style="border:1px solid #ccc;">'.$row->foc_name.'</td>
							<td style="border:1px solid #ccc;">'.$row->ind_name.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->name.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_date.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->reporting_month.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->reporting_year.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_venue.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_implementingUnit.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_female.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_youth_f.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_youth_m.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_adult_m.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_child_f.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_youth_f.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_adult_f.'</td>
							<td style="border:1px solid #ccc;text-align:center;">'.$row->ar_ap_total.'</td>
							
							 
						</tr>
					';
				}
				$output .='</table>';
				header("Content-Type: application/xls");
				header("Content-Disposition:attachment; filename=activity_report.xls");
				print_r($output) ;
 
	}

// public function performance_export(Request $request){
 
// 	 	$query = DB::table('ai_activity_report')
// 	 	->join('ai_activities','ai_activity_report.p_act_id','=','ai_activities.id')
// 	 	->join('ai_priorityarea','ai_activity_report.pri_id','=','ai_priorityarea.id')
// 	 	->join('ai_focusarea','ai_activity_report.foc_id','=','ai_focusarea.id')  
// 	 	->join('ai_indicators','ai_activity_report.ind_id','=','ai_indicators.id')
// 	 	->join('cms_users','ai_activity_report.user_id','=','cms_users.id')
// 	 	// ->join('cms_users','ai_activity_report.flow_id','=','cms_users.id') 

// 	 	->select('ai_activities.act_name','ai_priorityarea.pri_name','ai_focusarea.foc_name','ai_indicators.ind_name','cms_users.name','ai_activity_report.ar_date','ai_activity_report.ar_venue','ai_activity_report.ar_implementingUnit','ai_activity_report.ar_ap_female','ai_activity_report.ar_ap_male','ai_activity_report.ar_ap_youth_m','ai_activity_report.ar_ap_adult_m','ai_activity_report.ar_ap_child_f','ai_activity_report.ar_ap_youth_f','ai_activity_report.ar_ap_adult_f','ai_activity_report.ar_ap_total','ai_activity_report.reporting_month','ai_activity_report.reporting_year');
// 	 	// dd($query);
// 		$excel = Exporter::make('Excel');
// 		$excel->loadQuery($query);
// 		return $excel->stream("report.xls");
 
// 	}

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