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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MEModal" style="margin-right: 5px;">Approve</a></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
      </div>
      @endif
      @elseif(CRUDBooster::myPrivilegeId() == 5 || CRUDBooster::myPrivilegeId() == 6) {{--HOPP & HORD--}}
      @if($row->acn_status == 3)
      <div class="col-lg-4" style="text-align: right;">
        <a href="{{url('/headApprove/'.CRUDBooster::getCurrentId())}}/{{$row->userId}}" class="btn btn-primary">Approve</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
      </div>
      @endif
      @endif
    </div>
  </div>
  <hr>
  @if($row->act_id != NULL)
  <?php
  $ParentAct = DB::table('ai_activities')
  ->join('ai_indicators','ai_indicators.id','=','ai_activities.ind_id')
  ->join('ai_focusarea','ai_focusarea.id','=','ai_activities.foc_id')
  ->join('ai_priorityarea','ai_priorityarea.id','=','ai_activities.pri_id')
  ->where('ai_activities.id',$row->act_id)
  ->select('ai_indicators.ind_name','ai_focusarea.foc_name','ai_priorityarea.pri_name','ai_activities.*')
  ->first();
  //dd($ParentAct);
  ?>
  <div class='form-group'>
    <div class="meInfo">
      <dl class="dl-horizontal">
        <dt>Priotiry Area</dt>
        <dd>{{$ParentAct->pri_name}}</dd>
        <dt>Focus Area</dt>
        <dd>{{$ParentAct->foc_name}}</dd>
        <dt>Indicator Area</dt>
        <dd>{{$ParentAct->ind_name}}</dd>
        <dt>Parent Activities</dt>
        <dd>
        <?php
        $parentactName = DB::table('ai_activities')->where('is_parent',$ParentAct->is_parent)->first();
        echo $parentactName->act_name;
        ?>
        </dd>
      </dl>
      {{--  @if(CRUDBooster::myPrivilegeId() == 13 && $row->acn_status == 3)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MEModalEdit" style="margin-right: 5px;">Edit</a></button>
    @endif --}}
  </div>
</div>
@endif
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
<!--M&E Model-->
<div class="modal fade" id="MEModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width: 900px;" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Approvement Model</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class='form-horizontal' id="form" action='{{url("meApprove/")}}'  method='post'>
        {{csrf_field()}}
        <input type='hidden' name='return_url' value='http://localhost/actionaid/public/admin/ai_concept_note'/>
        <input type='hidden' name='is_user' value='{{$row->userId}}'/>
        <input type='hidden' name='cNid' value='{{CRUDBooster::getCurrentId()}}'/>
        <input type='hidden' name='ref_mainpath' value='http://localhost/actionaid/public/admin/ai_activities'/>
        <input type='hidden' name='ref_parameter' value='return_url=http://localhost/actionaid/public/admin/ai_activities&amp;parent_id=&amp;parent_field='/>
        <div class="box-body" id="parent-form-area">
          <div class='form-group header-group-0 ' id='form-group-act_number' style="">
            <label class='control-label col-sm-2'>
              Activity Number
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity Number"
              required  placeholder='Activity Number'  maxlength=255 class='form-control'
              name="act_number" id="act_number" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'>E.g (A 3.2.4.1:)</p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_name' style="">
            <label class='control-label col-sm-2'>Activity Name
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <textarea name="act_name" id="act_name"
              required  placeholder='Name of the activity'  maxlength=500 class='form-control'
              rows='5'> {{$row->acn_name}}</textarea>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_baseline' style="">
            <label class='control-label col-sm-2'>
              Activity Baseline
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity Baseline"
              required    maxlength=255 class='form-control'
              name="act_baseline" id="act_baseline" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_target2022' style="">
            <label class='control-label col-sm-2'>
              Activity Target-2022
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity Target-2022"
              required    maxlength=255 class='form-control'
              name="act_target2022" id="act_target2022" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_target2018' style="">
            <label class='control-label col-sm-2'>
              Activity Target-2018
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity Target-2018"
              class='form-control'
              name="act_target2018" id="act_target2018" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_mov' style="">
            <label class='control-label col-sm-2'>Activity Mov
            </label>
            <div class="col-sm-10">
              <textarea name="act_mov" id="act_mov"
              class='form-control'
              rows='5'></textarea>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_dataCollection' style="">
            <label class='control-label col-sm-2'>
              Activity DataCollection
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity DataCollection"
              class='form-control'
              name="act_dataCollection" id="act_dataCollection" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_frequency' style="">
            <label class='control-label col-sm-2'>
              Activity Frequency
            </label>
            <div class="col-sm-10">
              <input type='text' title="Activity Frequency"
              class='form-control'
              name="act_frequency" id="act_frequency" value=''/>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_assumption' style="">
            <label class='control-label col-sm-2'>Activity Assumption
            </label>
            <div class="col-sm-10">
              <textarea name="act_assumption" id="act_assumption"
              class='form-control'
              rows='5'></textarea>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-pri_id' style="">
            <label class='control-label col-sm-2'>Priority Area
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <select class='form-control' id="pri_id" data-value='' required    name="pri_id">
                <option value=''>Select Priority Area</option>
                <option  value='5'>Priority Five</option>
                <option  value='4'>Priority Four</option>
                <option  value='1'>Priority One</option>
                <option  value='3'>Priority Three</option>
                <option  value='2'>Priority Two</option>
              </select>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-foc_id' style="">
            <label class='control-label col-sm-2'>Focus Area
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <select class='form-control' id="foc_id" data-value='' required    name="foc_id">
                <option value=''>Select Focus Area</option>
              </select>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-ind_id' style="">
            <label class='control-label col-sm-2'>Indicator Area
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <select class='form-control' id="ind_id" data-value='' required  name="ind_id">
                <option value=''>Select an Indicator</option>
              </select>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-act_id' style="">
            <label class='control-label col-sm-2'>Activities Name
              <span class='text-danger' title='This field is required'>*</span>
            </label>
            <div class="col-sm-10">
              <select class='form-control' id="act_id" data-value='' required    name="act_id">
                <option value=''>Select Activities Name</option>
              </select>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          <div class='form-group header-group-0 ' id='form-group-headOfficer' style="">
            <label class='control-label col-sm-2'>Head Officer
            </label>
            <div class="col-sm-10">
              <select class='form-control' id="headOfficer" data-value=''     name="headOfficer">
                <option value=''>** Please select a Head of the Department</option>
                <?php
                $headofficers = DB::table('cms_users')->where('id_cms_privileges',5)->orwhere('id_cms_privileges',6)
                ->join('cms_privileges','cms_privileges.id','=','cms_users.id_cms_privileges')
                ->select('cms_privileges.name AS role_name','cms_users.*')
                ->get();
                foreach ($headofficers as $head) { ?>
                <option  value='{{$head->id}}'>{{$head->name}}-{{$head->role_name}}</option>
                <?php } ?>
              </select>
              <div class="text-danger"></div>
              <p class='help-block'></p>
            </div>
          </div>
          </div><!-- /.box-body -->
          <div class="box-footer" style="background: #F5F5F5">
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-10">
                <a href='http://localhost/actionaid/public/admin/ai_activities' class='btn btn-default'><i
                class='fa fa-chevron-circle-left'></i> Back</a>
                {{-- <input type="submit" name="submit" value='Save &amp; Add More' class='btn btn-success'> --}}
                <input type="submit" name="submit" value='Save' class='btn btn-success'>
              </div>
            </div>
            </div><!-- /.box-footer-->
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--M&E Model exit-->
</div>
<script src="http://localhost/actionaid/public/vendor/crudbooster/assets/js/main.js?r=1536254603"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<!-- load js -->
<script type="text/javascript">
var site_url = "http://localhost/actionaid/public";
</script>
<script type="text/javascript">
$(function () {
$('#pri_id, input:radio[name=pri_id]').change(function () {
var $current = $("#foc_id");
var parent_id = $(this).val();
var fk_name = "pri_id";
var fk_value = $(this).val();
var datatable = "ai_focusarea,foc_name".split(',');
var datatableWhere = "";
var table = datatable[0].trim('');
var label = datatable[1].trim('');
var value = "";
if (fk_value != '') {
$current.html("<option value=''>Please wait loading... Focus Area");
  $.get("http://localhost/actionaid/public/admin/ai_activities/data-table?table=" + table + "&label=" + label + "&fk_name=" + fk_name + "&fk_value=" + fk_value + "&datatable_where=" + encodeURI(datatableWhere), function (response) {
  if (response) {
  $current.html("<option value=''>Select Focus Area");
    $.each(response, function (i, obj) {
    var selected = (value && value == obj.select_value) ? "selected" : "";
    $("<option " + selected + " value='" + obj.select_value + "'>" + obj.select_label + "</option>").appendTo("#foc_id");
    })
    $current.trigger('change');
    }
    });
    } else {
    $current.html("<option value=''>Select Focus Area");
      }
      })
      $('#pri_id').trigger('change');
      $("input[name='pri_id']:checked").trigger("change");
      $("#foc_id").trigger('change');
      })
      </script>
      <script type="text/javascript">
      $(function () {
      $('#foc_id, input:radio[name=foc_id]').change(function () {
      var $current = $("#ind_id");
      var parent_id = $(this).val();
      var fk_name = "foc_id";
      var fk_value = $(this).val();
      var datatable = "ai_indicators,ind_name".split(',');
      var datatableWhere = "";
      var table = datatable[0].trim('');
      var label = datatable[1].trim('');
      var value = "";
      if (fk_value != '') {
      $current.html("<option value=''>Please wait loading... Indicator Area");
        $.get("http://localhost/actionaid/public/admin/ai_activities/data-table?table=" + table + "&label=" + label + "&fk_name=" + fk_name + "&fk_value=" + fk_value + "&datatable_where=" + encodeURI(datatableWhere), function (response) {
        if (response) {
        $current.html("<option value=''>Select an Indicator");
          $.each(response, function (i, obj) {
          var selected = (value && value == obj.select_value) ? "selected" : "";
          $("<option " + selected + " value='" + obj.select_value + "'>" + obj.select_label + "</option>").appendTo("#ind_id");
          })
          $current.trigger('change');
          }
          });
          } else {
          $current.html("<option value=''>Select an Indicator");
            }
            })
            $('#foc_id').trigger('change');
            $("input[name='foc_id']:checked").trigger("change");
            $("#ind_id").trigger('change');
            });
            $(function () {
            $('#ind_id, input:radio[name=ind_id]').change(function () {
            var $current = $("#act_id");
            var parent_id = $(this).val();
            var fk_name = "ind_id";
            var fk_value = $(this).val();
            var datatable = "ai_activities,act_name".split(',');
            var datatableWhere = "act_status = 1";
            var table = datatable[0].trim('');
            var label = datatable[1].trim('');
            var value = "";
            if (fk_value != '') {
            $current.html("<option value=''>Please wait loading... Activities Name");
              $.get("http://localhost/actionaid/public/admin/ai_activity_report/getDataTable1/"+fk_value, function (response) {
              if (response) {
              $current.html(response);
              // $.each(response, function (i, obj) {
              //     //alert();
              //    // if(obj.parent == '0'){
              //         var selected = (value && value == obj.select_value) ? "selected" : "";
              //         $("<option " + selected + " value='" + obj.select_value + "'>" + obj.select_label + "</option>").appendTo("#act_id");
              //     //}
              // })
              //response.appendTo("#act_id");
              $current.trigger('change');
              }
              });
              } else {
              $current.html("<option value=''>Select Activities Name");
                }
                })
                $('#ind_id').trigger('change');
                $("input[name='ind_id']:checked").trigger("change");
                $("#act_id").trigger('change');
                })
                </script>
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