<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<style type="text/css">
.meInfo{border: 1px solid #cdd; margin: 10px; padding: 14px;}
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
.pcontent{border: 1px solid; padding: 6px; width: 97%; min-height: 80px;}
.img1 {width: 20%; float: left; }
.img1 img{height: 150px; width: auto; margin: 5px; padding: 5px; border: 1px dotted #ccc; border-radius: 8px;}
</style>
<!-- Your html goes here -->
<div class='panel panel-default'>
  <div class='panel-heading'>
    <div class="row">
      <div class="col-lg-6">Test Demo Detail Page</div>
      <div class="col-lg-6">
        @if($row->acn_status == 1)
        <span style="font-weight: bold; color: green; float: right; margin-right: 22px;">This report is waiting for review by line manager.</span>
        @elseif($row->acn_status == 2)
        <span style="font-weight: bold; color: green; float: right; margin-right: 22px;">This report is waiting for checking by M&E officer.</span>
        @elseif($row->acn_status == 3)
        <span style="font-weight: bold; color: green; float: right; margin-right: 22px;">This report is waiting for approve by Head of department.</span>
        @elseif($row->acn_status == 100)
        <span style="font-weight: bold; color: green; float: right; margin-right: 22px;">This report has been approved. And ready to conduct.</span>
        @elseif($row->acn_status == 101)
        <span style="font-weight: bold; color: green; float: right; margin-right: 22px;">This report has been conducted. And you can't coduct again.</span>
        @else
        <span style="font-weight: bold; color: red; float: right; margin-right: 22px;">This report has been rejected!.</span>
        @endif
      </div></div>
    </div>
    {{-- query --}}
    <?php
    $reviewer = DB::table('cms_users')->where('id',$row->lineManager)->first();
    $checker = DB::table('cms_users')->where('id',$row->meOfficer)->first();
    $approver = DB::table('cms_users')->where('id',$row->headOfficer)->first();
    $rejecter = DB::table('cms_users')->where('id',$row->rejected_by)->first();
    ?>
    @if(!empty($row->rejected_by))
    <div class="row" style="margin: 10px;padding: 10px;">
      <div class="col-lg-4">
        <div style="float: left; margin-right: 15px;"><img src="{{url($rejecter->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
        <label>Rejected By:</label>
        <p>{{$rejecter->name}}</p>
        <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->rejected_date))}}</p>
      </div>
      <div class="col-lg-8 bg-danger" style=" min-height: 75px; padding: 5px;">
        <p>{{$row->rejected_comment}}</p>
      </div>
    </div>
    @if($row->userId == CRUDBooster::myId())
    <a href="{{url('/admin/ai_concept_note/edit/'.CRUDBooster::getCurrentId())}}" class="btn btn-primary" style="margin-left: 15px;">Edit</a>
    @endif
    <hr>
    @endif
    
    <div class='panel-body'>
    <table></table>
    <div class='form-group'>
      <div class="row">
        <div class="col-lg-8">
          <h3>{{$row->acn_name}}</h3>
        </div>
        @if(CRUDBooster::myPrivilegeId() == 10) {{--line manager--}}
        @if($row->acn_status == 1)
        <div class="col-lg-4" style="text-align: right;">
          <a href="{{url('/lmApprove/'.CRUDBooster::getCurrentId())}}" class="btn btn-primary">Approve</a>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
        </div>
        @endif
        @elseif(CRUDBooster::myPrivilegeId() == 13) {{--M&E Officer--}}
        @if($row->acn_status == 2)
        <div class="col-lg-4" style="text-align: right;">
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MEModal" style="margin-right: 5px;">Approve</a></button> --}}
        <a href="{{url('admin/ai_concept_note/edit/'.$currentId)}}" class="btn btn-primary">Approve</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
      </div>
      @endif
      @elseif(CRUDBooster::myPrivilegeId() == 5 || CRUDBooster::myPrivilegeId() == 3) {{--HOPP & HORD--}}
      @if($row->acn_status == 3)
      <div class="col-lg-4" style="text-align: right;">
        <a href="{{url('/headApprove/'.CRUDBooster::getCurrentId())}}/{{$row->userId}}" class="btn btn-primary">Approve</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
      </div>
      @endif
      @endif
    </div>
  </div>
  
  <ul class="nav">
    <li class="activity_report_heading">
      <label>Activity Lead:</label>
      <p>{{$row->name}}</p>
    </li>
    <li class="activity_report_heading">
      <label>Conducted Date:</label>
      <p>{{$row->acn_date}}</p>
    </li>
    <li class="activity_report_heading">
      <label>Implementing Unit(s):</label>
      <p>{{$row->acn_implementingUnit}}</p>
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
            <td>{{$row->acn_ap_total}}</td>
            <td>{{$row->acn_ap_male}}</td>
            <td>{{$row->acn_ap_female}}</td>
            <td  colspan="2">
              <ul class="nav data_tbl_nav">
                <li>
                  <label>Male</label>
                  <p>{{$row->acn_ap_child_m}}</p>
                </li>
                <li>
                  <label>FeMale</label>
                  <p>{{$row->acn_ap_child_f}}</p>
                </li>
              </ul>
            </td>
            <td  colspan="2">
              <ul class="nav data_tbl_nav">
                <li>
                  <label>Male</label>
                  <p>{{$row->acn_ap_youth_m}}</p>
                </li>
                <li>
                  <label>Female</label>
                  <p>{{$row->acn_ap_child_f}}</p>
                </li>
              </ul>
            </td>
            <td  colspan="2">
              <ul class="nav data_tbl_nav">
                <li>
                  <label>Male</label>
                  <p>{{$row->acn_ap_adult_m}}</p>
                </li>
                <li>
                  <label>Female</label>
                  <p>{{$row->acn_ap_adult_f}}</p>
                </li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </li>
    <br>
    <li class="activity_body_content">
      <label>Activities Aims?</label>
      <p class="pcontent">{{strip_tags($row->acn_aim)}}</p>
    </li>
    <li class="activity_body_content">
      <label>Activities Objectives  </label>
      <p class="pcontent">{{strip_tags($row->acn_objective)}}</p>
    </li>
    <li class="activity_body_content">
      <label>Activities Outcomes</label>
      <p class="pcontent">{{strip_tags($row->acn_outcome)}}</p>
    </li>
    <li class="activity_body_content">
      <label>Activities Follows</label>
      <p class="pcontent">{{strip_tags($row->acn_follow)}}</p>
    </li>
    <li class="activity_body_content">
      <label>Follow up activity(ies)/Date</label>
      <p class="pcontent">{{strip_tags($row->acn_ies)}}</p>
    </li>
  </ul>
  <hr>
  <!-- etc .... -->
  <div class="col-lg-3" style="">
    <div style="float: left; margin-right: 15px;"><img src="{{url($row->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
    <label>Created By:</label>
    <p>{{$row->name}}</p>
    <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->current_date))}}</p>
  </div>
  @if($row->line_date != NULL) {{-- line manager --}}
  <div class="col-lg-3">
    <div style="float: left; margin-right: 15px;"><img src="{{url($reviewer->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
    <label>Reviewed By:</label>
    <p>{{$reviewer->name}}</p>
    <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->line_date))}}</p>
  </div>
  @endif
  @if($row->me_date != NULL)  {{-- M&E Officer --}}
  <div class="col-lg-3">
    <div style="float: left; margin-right: 15px;"><img src="{{url($checker->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
    <label>Checked By:</label>
    <p>{{$checker->name}}</p>
    <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->me_date))}}</p>
  </div>
  @endif
  @if($row->head_date != NULL) {{-- Hopp or Hord --}}
  <div class="col-lg-3">
    <div style="float: left; margin-right: 15px;"><img src="{{url($approver->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
    <label>Approved By:</label>
    <p>{{$approver->name}}</p>
    <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->head_date))}}</p>
  </div>
  @endif
              <a href="{{url('admin/ai_concept_note/')}}" class="btn btn-primary">Back</a>
            <a href="{{url('makeCnPDF/'.$currentId)}}" target="_blank" class="btn btn-primary">Print</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{url('CNreject/')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label> Rejected Comments:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
          </div>
          <input type="hidden" name="id" value="{{CRUDBooster::getCurrentId()}}">
          <input type="hidden" name="userId" value="{{$row->userId}}">
          <button type="submit" class="btn btn-danger">Submit</button>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Reject it</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
{{-- $this->col[] = ["label"=>"Status","name"=>"acn_status","width"=>"100","callback" => function($row){
if(CRUDBooster::myPrivilegeId() == 11){ //pc
if($row->acn_status == '1' || $row->acn_status == '2' $row->acn_status == '3'){
return '<span class="label label-warning">Pending</span>';
}elseif($row->acn_status == '99'){
return '<span class="label label-danger">Rejected</span>';
}elseif($row->acn_status == '100'){
return '<span class="label label-primary">Approved</span>';
}elseif($row->acn_status == '101'){
return '<span class="label label-primary">Conducted</span>';
}
}elseif (CRUDBooster::myPrivilegeId() == 10) { //line manger
if($row->acn_status == '1'){
return '<span class="label label-info">New</span>';
}elseif($row->acn_status == '2' || $row->acn_status == '3'){
return '<span class="label label-warning">Pending</span>';
}elseif($row->acn_status == '99'){
return '<span class="label label-danger">Rejected</span>';
}elseif($row->acn_status == '100'){
return '<span class="label label-primary">Approved</span>';
}elseif($row->acn_status == '101'){
return '<span class="label label-primary">Conducted</span>';
}
}elseif (CRUDBooster::myPrivilegeId() == 13) { //M&E Officer
if($row->acn_status == '2'){
return '<span class="label label-info">New</span>';
}elseif($row->acn_status == '3'){
return '<span class="label label-warning">Pending</span>';
}elseif($row->acn_status == '99'){
return '<span class="label label-danger">Rejected</span>';
}elseif($row->acn_status == '100'){
return '<span class="label label-primary">Approved</span>';
}elseif($row->acn_status == '101'){
return '<span class="label label-primary">Conducted</span>';
}
}elseif (CRUDBooster::myPrivilegeId() == 5 || CRUDBooster::myPrivilegeId() == 6) { //hopp & Hord
if($row->acn_status == '3'){
return '<span class="label label-info">New</span>';
}elseif($row->acn_status == '99'){
return '<span class="label label-danger">Rejected</span>';
}elseif($row->acn_status == '100'){
return '<span class="label label-primary">Approved</span>';
}elseif($row->acn_status == '101'){
return '<span class="label label-primary">Conducted</span>';
}
}elseif(CRUDBooster::isSuperadmin()){ //Super Admin
if($row->acn_status == '1' || $row->acn_status == '2' || $row->acn_status == '3'){
return '<span class="label label-warning">Pending</span>';
}elseif($row->acn_status == '99'){
return '<span class="label label-danger">Rejected</span>';
}elseif($row->acn_status == '100'){
return '<span class="label label-primary">Approved</span>';
}elseif($row->acn_status == '101'){
return '<span class="label label-primary">Conducted</span>';
}
}else{ //admin and hord
return '<span class="label label-primary">Approved1</span>';
}
}]; --}}