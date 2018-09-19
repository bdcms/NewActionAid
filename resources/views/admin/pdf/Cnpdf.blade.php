.<!DOCTYPE html>
<html>
<head>
	<title></title>
 	<link href="{{asset('/public/vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
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
                <h3 style="text-align: center;">Activities Concept Note Report</h3>
              </li>
              
              <li class="activity_report_heading">
               
                <p> <span>Activity Name:</span> {{$row->acn_name}} </p>
              </li>
              <li class="activity_report_heading">
               
                <p> <span>Activity Lead:</span> {{$row->name}}</p>
              </li>
              <li class="activity_report_heading">
                
                <p><span>Activity Date(s):</span> {{$row->acn_date}}</p>
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
                          <td class="table_data_column_small">{{$row->acn_ap_total}}</td>
                          <td class="table_data_column_small">{{$row->acn_ap_male}}</td>
                          <td class="table_data_column_small">{{$row->acn_ap_female}}</td>

                          	<td class="table_data_column_large">  
                                <p><span>Male</span><br/>{{$row->acn_ap_child_m}}</p>
                                <p><span>Female</span><br/>{{$row->acn_ap_child_f}}</p>
                           	</td>

                          <td  class="table_data_column_large">
                            	<p><span>Male</span><br/>{{$row->acn_ap_youth_m}}</p>
                                <p><span>Female</span><br/>{{$row->acn_ap_youth_f}}</p> 
                          </td>

                          <td class="table_data_column_large">
                           		<p><span>Male</span><br/>{{$row->acn_ap_adult_m}}</p>
                                <p><span>Female</span><br/>{{$row->acn_ap_adult_f}}</p>  
                          </td>

                        </tr>
                         
                        
                      </tbody>
                    </table> 
              </li>  
              <br>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Activities Aims?</label>
                 {!!$row->acn_aim!!}
              </li>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Activities Objectives</label>
                {!!$row->acn_objective!!}
              </li>
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Activities Outcomes</label>
                 {!!$row->acn_outcome!!}
              </li> 
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Activities Follows</label>
               {!!$row->acn_follow!!} 
              </li> 
              <li class="activity_body_content">
                <label style="color:green;font-size: 14px;font-weight: bold;">Follow up activity(ies)/Date</label>
                 {!!$row->acn_ies!!} 
              </li> 

               
            </ul>

            <hr>
              
          
          

    </div>
  <div>
           		<div class="col-lg-3" style="float: left;width: 25%; font-size: 10px;">
				    <label >Created By:</label>
				    <p>{{$row->name}}</p>
				    <p><span class="">ON </span> {{date('d M Y',strtotime($row->current_date))}}</p>
				  </div>

				  @if($row->line_date != NULL) {{-- line manager --}}
				  <div class="col-lg-3" style="float: left;width: 25%; font-size: 10px;">
				    <label >Reviewed By:</label>
				    <p>{{$reviewer->name}}</p>
				    <p><span class="">ON </span> {{date('d M Y',strtotime($row->line_date))}}</p>
				  </div>

				  @endif
				  @if($row->me_date != NULL)  {{-- M&E Officer --}}
				  <div class="col-lg-3"  style="float: left;width: 25%; font-size: 10px;">
				    <label >Checked By:</label>
				    <p>{{$checker->name}}</p>
				    <p><span class="">ON </span> {{date('d M Y',strtotime($row->me_date))}}</p>
				  </div>

				  @endif
				  @if($row->head_date != NULL) {{-- Hopp or Hord --}}
				  <div class="col-lg-3"  style="float: left;width: 25%; font-size: 10px;">
				    <label >Approved By:</label>
				    <p>{{$approver->name}}</p>
				    <p><span class="">ON </span> {{date('d M Y',strtotime($row->head_date))}}</p>
				  </div>

				  @endif
           </div>
</body>
</html>