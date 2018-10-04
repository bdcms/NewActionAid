<?php

namespace App;
use DB;
use Session;


use Illuminate\Database\Eloquent\Model;

class performanceModel extends Model
{
    //
    public static function activity_select_all(){ 
    	return DB::table('ai_activities')->where('act_status',1)->get();
    }
    public static function activity_report_select_all($area){

    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')  ->where('ind_id',$area)->where('ar_status',1)->get();
    	}else{ 
    	return DB::table('ai_activity_report')->where('ar_status',1)->get();
    	}
    }

    public static function activity_name_with_actitity_report($id){
    	return DB::table('ai_activities')->where('id',$id)->first();
    }

    public static function indicator_name_with_actitity_report($id,$area){
    	return DB::table('ai_activity_report')
    	->join('ai_indicators','ai_activity_report.ind_id','=','ai_indicators.id')
    	->where('ai_activity_report.id',$id)->first();
    }
 

    public static function activity_report_jan_male($activity,$month,$area){
    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y'))->where('pri_id',$area) ->where('reporting_month',$month)->sum('ar_ap_male'); 
    	}else{
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y'))->where('reporting_month',$month)->sum('ar_ap_male'); 
    	}
    }

    public static function activity_report_child_male($activity,$month,$area){ 
    	 if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->where('pri_id',$area) ->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_child_m');
    	}else{
    		
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_child_m');
    	}
    }  

    public static function activity_report_child_F_male($activity,$month,$area){
    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_child_f');
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_child_f');
    	}
    }
    public static function activity_report_youth_male($activity,$month,$area){
    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_youth_m');
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_youth_m');
    	}
    }

 
    public static function activity_report_youth_F_male($activity,$month,$area){
    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_youth_f');
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_youth_f');
    	}
    } 
    public static function activity_report_audult_male($activity,$month,$area){
    	  if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_adult_m');
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_adult_m');
    	}
    }  
    public static function activity_report_audult_F_male($activity,$month,$area){
    	 if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_adult_f');
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_adult_f');
    	}
    } 
    public static function activity_report_jan_female($activity,$month,$area){
    	if(!empty($area)){ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('pri_id',$area)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_female'); 
    	}else{ 
    	return DB::table('ai_activity_report')->where('p_act_id',$activity)->where('reporting_year',date('Y')) ->where('reporting_month',$month)->sum('ar_ap_female'); 
    	}
    }




    public static function activity_report_child_mel_year_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_child_m'); 
    }
    public static function activity_report_child_fmel_year_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_child_f'); 
    }
    public static function activity_report_youth_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_youth_m'); 
    }
    public static function activity_report_youth_F_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_youth_f'); 
    }
    public static function activity_report_adult_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_adult_m'); 
    }
    public static function activity_report_adult_F_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_adult_f'); 
    }
    public static function activity_report_total_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_male'); 
    }
    public static function activity_report_total_F_melyear_subtotal($activity){
    	return DB::table('ai_activity_report')->where('p_act_id',$activity) ->sum('ar_ap_female'); 
    }

    

}
