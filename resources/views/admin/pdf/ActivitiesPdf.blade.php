<!DOCTYPE html>
<html>
<head>
	<title></title>
 
	  <style type="text/css"> 
 
.activity_report_heading p{font-size: 12px; font-weight: normal;}
.activity_report_heading p span{font-size: 12px;font-weight: bold;}
body{font-size: 12px;}
label,p{font-size: 12px !important;}
.table_data{float: left;width: 100%;overflow: hidden; font-size: 10px;}
.table_data_column_small{float: left;width: 10%; font-size: 10px;text-align: center;}
.table_data_column_large{text-align: center; float: left;width: 23%; font-size: 10px;}
.table_data_column_small_top{float: left;width: 100%; font-size: 10px;}
table thead{width: 100%;float: left; font-size: 10px;}
table thead tr{width: 100%;float: left; font-size: 10px;}
 ul{list-style: none;text-decoration: none;}
 .col-lg-3 p, .col-lg-3 label{font-size: 10px; line-height: 14px;margin: 0;padding: 0;
}
 
/*.nav li,.panel-body ul,.panel-body{float: left;width: 100%;}*/
  </style>
</head>
<body> 
    <div class='panel-body'>  
      
            <ul class="nav">
              <li class="activity_report_heading">
                <h3 style="text-align: center;">Activity Report</h3>
              </li>
              <li class="activity_report_heading">
                <h4>Background Data:</h4>
              </li>
              <li class="activity_report_heading">
               
                <p> <span>Activity Name:</span> {{$row->act_number}} : {{$row->act_name}}</p>
              </li>
              <li class="activity_report_heading">
               
                <p> <span>Activity Lead:</span> {{$row->name}}</p>
              </li>
              <li class="activity_report_heading">
                
                <p><span>Activity Date(s):</span> {{$row->ar_date}}</p>
              </li>
              <li class="activity_report_heading"> 
                
                <p><span>Implementing Unit(s):</span> {{$row->ar_implementingUnit}}</p> 
              </li>
              <br>
              
              <li class="activity_data_table" style="width:100%;float: left;">
              	<table class="table_data">
                      <thead>
                        <tr> 
                          <th class="table_data_column_small">Total</th>
                          <th class="table_data_column_small">Male</th>
                          <th class="table_data_column_small">Female</th>
                          <th class="table_data_column_large">Children(< 15yrs): </th>
                          <th class="table_data_column_large">Youths(15-35yrs):</th>
                          <th class="table_data_column_large">Adults(>35yrs)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr> 
                          <td class="table_data_column_small">{{$row->ar_ap_total}}</td>
                          <td class="table_data_column_small">{{$row->ar_ap_male}}</td>
                          <td class="table_data_column_small">{{$row->ar_ap_female}}</td>

                          	<td class="table_data_column_large">  
                                <p><span>Male</span><br/>{{$row->ar_ap_child_m}}</p>
                                <p><span>Female</span><br/>{{$row->ar_ap_child_f}}</p>
                           	</td>

                          <td  class="table_data_column_large">
                            	<p><span>Male</span><br/>{{$row->ar_ap_youth_m}}</p>
                                <p><span>Female</span><br/>{{$row->ar_ap_child_f}}</p> 
                          </td>

                          <td class="table_data_column_large">
                           		<p><span>Male</span><br/>{{$row->ar_ap_adult_m}}</p>
                                <p><span>Female</span><br/>{{$row->ar_ap_adult_f}}</p>  
                          </td>

                        </tr>
                         
                        
                      </tbody>
                    </table> 
              </li> 
              <li><p><strong>Comments:</strong> {{$row->ar_comments}}</p> </li>  
              <br>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Were the activity aims met?*If yes, how? If not, why?</label>
                 {!! $row->ar_ac_aims !!} 
              </li>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">How does the activity follow on from previous interventions, if any?</label>
                {!!$row->ar_ac_follow!!} 
              </li>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Activity Process: What took place? What went well? *</label>
                 {!!$row->ar_ac_process!!} 
              </li> 
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Challenges faced& mitigation measures employed during the activity:</label>
               {!!$row->ar_ac_challenges!!} 
              </li> 
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">What could be done to improve next time?</label>
                 {!!$row->ar_ac_improve!!} 
              </li>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Follow up activity(ies)/Date</label>
                 <p>{!!$row->ar_ac_ies!!} 
              </li>

              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Additional comments/recommendations on the activity:</label>
                 {!! $row->ar_ac_comments !!} 

              </li>

               
              <li class="activity_body_content"><p style="font-size: 12px;">A COMPLETE ACTIVITY REPORTS HAS ALL THE FIELDS VALUES <strong>AND</strong> ATTACHMENTS</p></li> 
            </ul>

         	<div style="float: left;width: 100%; font-size: 10px; ">
           		<div class="col-lg-3" style="width: 20%;float: right; text-align: center;">
			    <label >Created By:</label>
			    <p>{{$row->name}}</p>
			    <p><span class="">ON </span> {{date('d M Y',strtotime($row->created_at))}}</p>
			  	</div>
			</div>  
           {{--  <div class="col-lg-4" style="">
          <div style="float: left; margin-right: 15px;">
          	<img src="{{url($row->photo)}}" height="80" width="70" style="margin-top: -5px;">
          </div>
            <label>Created By:</label>
            <p>{{$row->name}}</p>
            <p><span class="text-primary">ON </span> {{$row->created_at}}</p>
         </div>  --}}
          


    </div>
 
</body>
</html>