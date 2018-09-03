<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
<div class='panel panel-default'>
  <div class='panel-heading'>Test Demo Detail Page</div>

  @if(!empty($row->rejected_by))
    <div class="row" style="margin: 10px;padding: 10px;">
      <div class="col-lg-4">
        <div style="float: left; margin-right: 15px;"><img src="{{url($rejected->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
           <label>Rejected By:</label>
          <p>{{$rejected->name}}</p>
          <p><span class="text-primary">ON </span> {{date('d M Y',strtotime($row->rejected_date))}}</p>
       </div>
      <div class="col-lg-8 bg-danger">
        <p>{{$row->rejected_comment}}</p>
      </div>
    </div> 
    <hr>
  @endif
    
    <div class='panel-body'> 
      <table></table>     
        <div class='form-group'> 
          <div class="row">
          <div class="col-lg-8">
            <h3>{{$row->title}}</h3>
          </div>
          
          <div class="col-lg-4" style="text-align: right;">
            <a href="#" class="btn btn-primary">Approve</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
          </div>

          </div> 
        </div>
          <hr>
        <div class='form-group'> 
          <p>{!!$row->description!!}</p>
          <hr>
        </div>  
        <!-- etc .... -->
         <div class="col-lg-4" style="text-align: center;">
          <div style="float: left; margin-right: 15px;"><img src="{{url($created->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
            <label>Created By:</label>
            <p>{{$created->name}}</p>
            <p><span class="text-primary">ON </span> 17 May 2018</p>
         </div>
         <div class="col-lg-4"  style="text-align: center;">
          <div style="float: left; margin-right: 15px;"><img src="{{url($created->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
            <label>Checked By:</label>
            <p>{{$created->name}}</p>
            <p><span class="text-primary">ON </span> 17 May 2018</p>
         </div>
         <div class="col-lg-4">
          <div style="float: left; margin-right: 15px;"><img src="{{url($created->photo)}}" height="80" width="70" style="margin-top: -9px;"></div>
             <label>Approved By:</label>
            <p>{{$created->name}}</p>
            <p><span class="text-primary">ON </span> 17 May 2018</p>
         </div>
    
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
              <form role="form" action="{{url('reject/')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label> Rejected Comments:</label>
                  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                </div> 
                <input type="hidden" name="id" value="{{$row->id}}">
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