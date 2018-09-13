<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
    <style type="text/css">
    .activity_row li label{font-weight: bold;font-size: 14px;}
           .activity_report_heading  label{
                float: left; margin-right: 20px;
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
              .activity_row h5,.activity_report_heading p {color:green;}
            .pcontent{border: 1px solid; padding: 6px; width: 97%; min-height: 80px;}
            .img1 {width: 20%; float: left; }
            .img1 img{height: 150px; width: auto; margin: 5px; padding: 5px; border: 1px dotted #ccc; border-radius: 8px;}
  </style>
  <div class='panel panel-default'>
    <div class='panel-heading'>Add Form</div>
    <div class='panel-body'>
      {{-- <form method='post' action='{{CRUDBooster::mainpath('add-save')}}'>
        <div class='form-group'>
          <label>Label 1</label>
          <input type='text' name='label1' required class='form-control'/>
        </div>
         

        
      </form> --}}
      <ul class="nav">
        <li class="activity_report_heading">
          <label>Project Name:</label>
          <p> {{$row->pro_name}} </p>
        </li>
        <li class="activity_report_heading">
          <label>Project Desctiprion:</label><br/>
          {!!$row->pro_desc!!}
        </li> 
        <li class="activity_report_heading">
          <label>Project Donor:</label>
          {{-- <p><a href="{{url('admin/ai_donor/detail/'.$row->donor.id)}}">{{$row->don_name}}</a></p> --}}
          <p>{{$row->don_name}}</p>
        </li> 
        <li class="activity_report_heading">
          <label>Priority Area:</label>
          <p>{{$row->pri_name}}</p>
        </li> 
        <li class="activity_report_heading">
          <label>Implementing Partners:</label><br>
          <?php
            $partners = explode(';', $row->patnerId);
            foreach ($partners as $partner) {  
              $partner = DB::table('ai_implementing_patner')->where('id',$partner)->first(); ?> 
           <p> {{$partner->imp_name}}</p>
          <?php  } ?> 
        </li> 
        <li class="activity_report_heading">
          <label>Contarct No.</label>
          <p>{{$row->pro_contractNo}}</p>
        </li> 
        <li class="activity_report_heading">
          <label>Created By:</label>
          <p>{{$row->name}}</p>
        </li> 

      </ul>  


    </div>
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    </div>
  </div>
@endsection