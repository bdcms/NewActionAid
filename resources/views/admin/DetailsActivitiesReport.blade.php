<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <style type="text/css">
    .activity_row li label{font-weight: bold;font-size: 14px;}
           .activity_report_heading  label{
                float: left;width: 14%;
           }
           .activity_data_table, .activity_data_table thead th{text-align: center;}
           .activity_data_table tbody tr td .data_tbl_nav li{    width: 50%;
              float: left;}
             .activity_body_content label{}
             .activity_body_content p{margin-bottom: 25px;
              float: left;width: 100%;}
             .activity_submit{float: right;
              padding: 20px 50px;
              font-size: 14px;
              border-radius: 0px;margin-bottom: 100px;background: #4F81BD}
              .activity_row h6{color:#4F81BD;font-size: 16px;}
              .activity_row h5,.activity_report_heading p {color:red;}
            .pcontent{  padding: 6px; width: 97%; min-height: 80px;}
            .img1 {width: 20%; float: left; }
            .img1 img{height: 150px; width: auto; margin: 5px; padding: 5px; border: 1px dotted #ccc; border-radius: 8px;}
            .table-bordered, .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{border: 1px solid #ccc;}
            .pcontent{display: none;}
            .headding{color: green;}
  </style>
  
<div class='panel panel-default'>
  <div class='panel-heading'>Activities Detail Page</div>
    <div class='panel-body'>  
      
            <ul class="nav">
              <li class="activity_report_heading">
                <h5>Activity Report Template</h5>
              </li>
              <li class="activity_report_heading">
                <h6>Background Data:</h6>
              </li>
              <li class="activity_report_heading">
                <label>Activity Name:</label>
                <p>{{$row->act_number}} : {{$row->act_name}}</p>
              </li>
              <li class="activity_report_heading">
                <label>Activity Lead:</label>
                <p>{{$row->name}}</p>
              </li>
              <li class="activity_report_heading">
                <label>Activity Date(s):</label>
                <p>{{$row->ar_date}}</p>
              </li>
              <li class="activity_report_heading"> 
                <label>Implementing Unit(s):</label>
                <p>{{$row->ar_implementingUnit}}</p> 
              </li>
              <br>
              <li class="activity_data_table">
                <table class="table table-bordered">
                      <thead>
                        <tr> 
                          <th>Total</th>
                          <th>Male</th>
                          <th>Female</th>
                          <th colspan="2">Children(<15yrs):</th>
                          <th colspan="2">Youths(15-35yrs):</th>
                          <th colspan="2">Adults(>35yrs)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr> 
                          <td>{{$row->ar_ap_total}}</td>
                          <td>{{$row->ar_ap_male}}</td>
                          <td>{{$row->ar_ap_female}}</td>

                          <td  colspan="2">
                            <ul class="nav data_tbl_nav">
                              <li>
                                <label>Male</label>
                                <p>{{$row->ar_ap_child_m}}</p>
                              </li>
                              <li>
                                <label>FeMale</label>
                                <p>{{$row->ar_ap_child_f}}</p>
                              </li>
                            </ul>
                          </td>

                          <td  colspan="2">
                            <ul class="nav data_tbl_nav">
                              <li>
                                <label>Male</label>
                                <p>{{$row->ar_ap_youth_m}}</p>
                              </li>
                              <li>
                                <label>Female</label>
                                <p>{{$row->ar_ap_child_f}}</p>
                              </li>
                            </ul>
                          </td>

                          <td  colspan="2">
                            <ul class="nav data_tbl_nav">
                              <li>
                                <label>Male</label>
                                <p>{{$row->ar_ap_adult_m}}</p>
                              </li>
                              <li>
                                <label>Female</label>
                                <p>{{$row->ar_ap_adult_f}}</p>
                              </li>
                            </ul>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="9">
                            <p style="float: left;"><strong>Comments:</strong> {{$row->ar_comments}}</p> 
                          </td>
                        </tr>
                        
                      </tbody>
                    </table> 
              </li>   
              <br>
              <li class="activity_body_content">
                <label class="headding">Were the activity aims met?*If yes, how? If not, why?</label>
                {!! $row->ar_ac_aims !!}
              </li>
              <li class="activity_body_content">
                <label class="headding">How does the activity follow on from previous interventions, if any?</label>
                {!!$row->ar_ac_follow!!}
              </li>
              <li class="activity_body_content">
                <label class="headding">Activity Process: What took place? What went well? *</label>
                {!!$row->ar_ac_process!!}
              </li> 
              <li class="activity_body_content">
                <label class="headding">Challenges faced& mitigation measures employed during the activity:</label>
                {!!$row->ar_ac_challenges!!}
              </li> 
              <li class="activity_body_content">
                <label class="headding">What could be done to improve next time?</label>
                {!!$row->ar_ac_improve!!}
              </li>
              <li class="activity_body_content">
                <label class="headding">Follow up activity(ies)/Date</label>
                <p>{!!$row->ar_ac_ies!!}
              </li>

              <li class="activity_body_content">
                <label class="headding">Additional comments/recommendations on the activity:</label>
                {!! $row->ar_ac_comments !!}

              </li>

              <li class="activity_body_content">
                <label>Images:</label>
                <div class="images">
                  @if(!empty($row->ar_at_pic1))
                    <div class="img1">
                      <a target="_blank" href="{{url($row->ar_at_pic1)}}">
                        <img src="{{url($row->ar_at_pic1)}}">
                      </a>
                    </div>
                  @endif
                  @if(!empty($row->ar_at_pic2))
                    <div class="img1">
                      <a target="_blank" href="{{url($row->ar_at_pic2)}}">
                        <img src="{{url($row->ar_at_pic2)}}">
                      </a>
                    </div>
                  @endif 
                  @if(!empty($row->ar_at_pic3))
                    <div class="img1">
                      <a target="_blank" href="{{url($row->ar_at_pic3)}}">
                        <img src="{{url($row->ar_at_pic3)}}">
                      </a>
                    </div>
                  @endif 
                  @if(!empty($row->ar_at_pic4))
                    <div class="img1">
                      <a target="_blank" href="{{url($row->ar_at_pic4)}}">
                        <img src="{{url($row->ar_at_pic4)}}">
                      </a>
                    </div>
                  @endif 
                  @if(!empty($row->ar_at_pic5))
                    <div class="img1">
                      <a target="_blank" href="{{url($row->ar_at_pic5)}}">
                        <img src="{{url($row->ar_at_pic5)}}">
                      </a>
                    </div>
                  @endif  
                </div> 
              </li>

 
              <li class="activity_body_content" style="float: left;width: 100%;"> 
                
                <label>ATTACH THE FOLLOWING FILES TO THIS REPORT</label>
                <table class="table"> 
                    <tbody style="width:50%;"> 
                      <tr> 
                        <td>Attendence Register</td>
                        <td><a href="{{url($row->ar_at_attendence)}}">Download</a></td> 
                      </tr>
                      <tr> 
                        <td>Minutes</td>
                        <td><a href="{{url($row->ar_at_minute)}}">Download</a></td> 
                      </tr> 
                      @if(!empty($row->ar_at_link))
                      <tr> 
                        <td>Link</td>
                        <td><a href="{{url($row->ar_at_minute)}}">View</a></td> 
                      </tr>
                      @endif
                      @if(!empty($row->ar_at_actionPlan))
                      <tr> 
                        <td>Action plan</td>
                        <td><a href="{{url($row->ar_at_actionPlan)}}">Download</a></td> 
                      </tr>
                      @endif
                      @if(!empty($row->ar_at_others))
                      <tr> 
                        <td>Other Docs</td>
                        <td><a href="{{url($row->ar_at_others)}}">Download</a></td> 
                      </tr> 
                      @endif
                    </tbody>
                  </table> 
              </li>
              <li  style="float: left;width: 100%;" class="activity_body_content"><h5>A COMPLETE ACTIVITY REPORTS HAS ALL THE FIELDS VALUES <strong>AND</strong> ATTACHMENTS</h5></li> 
            </ul>

            <hr>
            <div class="col-lg-4" style="">
          <div style="float: left; margin-right: 15px;"><img src="{{url($row->photo)}}" height="80" width="70" style="margin-top: -5px;"></div>
            <label>Created By:</label>
            <p>{{$row->name}}</p>
            <p><span class="text-primary">ON </span> {{$row->created_at}}</p>
         </div>
            <a href="{{url('admin/ai_activity_report/')}}" class="btn btn-primary">Back</a>
            <a href="{{url('makePDF/'.$currentID)}}" target="_blank" class="btn btn-primary">Print</a>
          


    </div>
  </div>
 
@endsection