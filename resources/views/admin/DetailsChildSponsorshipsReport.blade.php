<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <style type="text/css">
      .extra{
        text-align: center;font-family: bold;color: red; font-size: 17px;
      }
  </style>

  <div class='panel panel-default'>
    <div class='panel-heading'>{{$page_title}}</div>
    <div class='panel-body'> 
         <ul class="nav" >
              
              <li class="activity_report_heading"> 
            		<table class="table table-bordered">
            			<tr>
            				<td>Person Submited Report</td>
            				<td>{{$row->name}}</td>
            			</tr> 
            			<tr>
            				<td>Period Under Review</td>
            				<td>{{$row->chi_periodReview}}</td>
            			</tr> 
            		</table>  
              </li>
           
              <li class="activity_data_table" style="    margin-top: -21px;">
                	<table class="table table-bordered"> 
                      	<tbody> 
                        	<tr>
                        		<td><label></label></td>
                        		<td><label> Male</label></td>
                        		<td><label> Female</label></td>
                        		<td><label> Total</label></td>
                        		<td><label> Comment</label></td>
                        	</tr>
                        	<tr>
                        		<td>Number of total links</td>
                        		<td>{{$row->totalLinks_m}}</td>
                        		<td>{{$row->totalLinks_f}}</td>
                        		<td>{{$row->totalLinks_t}}</td>
                        		<td>{{$row->totalLinks_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of Messages Collected</td>
                        		<td>{{$row->msgCollected_m}}</td>
                        		<td>{{$row->msgCollected_f}}</td>
                        		<td>{{$row->msgCollected_t}}</td>
                        		<td>{{$row->msgCollected_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of Outstanding Messages</td>
                        		<td>{{$row->outstandingMsg_m}}</td>
                        		<td>{{$row->outstandingMsg_f}}</td>
                        		<td>{{$row->outstandingMsg_t}}</td>
                        		<td>{{$row->outstandingMsg_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of photos collected</td>
                        		<td>{{$row->photosCollected_m}}</td>
                        		<td>{{$row->photosCollected_f}}</td>
                        		<td>{{$row->photosCollected_t}}</td>
                        		<td>{{$row->photosCollected_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of Outstanding Photos</td>
                        		<td>{{$row->outstandingPhotos_m}}</td>
                        		<td>{{$row->outstandingPhotos_f}}</td>
                        		<td>{{$row->outstandingPhotos_t}}</td>
                        		<td>{{$row->outstandingPhotos_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of queries of Follow ups</td>
                        		<td>{{$row->queriesFollow_m}}</td>
                        		<td>{{$row->queriesFollow_f}}</td>
                        		<td>{{$row->queriesFollow_t}}</td>
                        		<td>{{$row->queriesFollow_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of queries of follow ups outstanding</td>
                        		<td>{{$row->outstandingFollow_m}}</td>
                        		<td>{{$row->outstandingFollow_f}}</td>
                        		<td>{{$row->outstandingFollow_t}}</td>
                        		<td>{{$row->outstandingFollow_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of queries of follow ups completed</td>
                        		<td>{{$row->completedFollow_m}}</td>
                        		<td>{{$row->completedFollow_f}}</td>
                        		<td>{{$row->completedFollow_t}}</td>
                        		<td>{{$row->completedFollow_c}}</td>
                        	</tr>
                        	<tr>
                        		<td>Number of nwe links</td>
                        		<td>{{$row->newLinks_m}}</td>
                        		<td>{{$row->newLinks_f}}</td>
                        		<td>{{$row->newLinks_t}}</td>
                        		<td>{{$row->newLinks_c}}</td>
                        	</tr>
                        	 

                      	</tbody>
                    </table> 
              </li>   
              	<li class="activity_data_table" style="    margin-top: -21px;">
              		<table class="table table-bordered">
              			<tbody>
              			<tr><td class="extra">Successes in period</td></tr>
		              	<tr><td>{!!$row->chi_successes!!}</td></tr>
		              	<tr><td class="extra">Challenges faced in period</td></tr>
		              	<tr><td>{!!$row->chi_challenges!!}</td></tr>
		              	<tr><td class="extra">Recommendations</td></tr>
		              	<tr><td>{!!$row->chi_recommendation!!}</td></tr>
		              	<tr><td class="extra">Ptential stories of change</td></tr> 
                        <tr><td>{!!$row->chi_potentialStories!!}</td></tr>
		              	</tbody>
              		</table>
              	</li>
              	 
            </ul>
        
    </div>
  </div>
@endsection