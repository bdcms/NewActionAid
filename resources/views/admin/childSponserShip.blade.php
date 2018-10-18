   @extends('crudbooster::admin_template')
@section('content')
  
  <link rel="stylesheet" type="text/css" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
  <style type="text/css">
  #area-chart,
#line-chart,
#bar-chart,
#stacked,
#pie-chart{
  min-height: 250px;
}
.font{font-size: 6px;};
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


<h3 class="text-primary text-center">
    Sponsorship Summaries
  </h3>
  <div class"row"> 
    <div class="col-sm-6 text-center">
       <label class="label label-success">Line Chart</label>
      <div id="line-chart"></div>
    </div>
    <div  class="col-sm-6 text-center">
       <label class="label label-success">Bar Chart</label>
      <div id="bar-chart" ></div>
    </div>
    
  </div>
  <?php
    $lrps = DB::table('ai_child_sponsorship')
              ->join('ai_location', 'ai_child_sponsorship.lrp_id', '=', 'ai_location.id')
              ->select('ai_child_sponsorship.lrp_id','ai_location.loc_name')->distinct()->orderBy('ai_location.loc_name',asc)->get();

    //dd($lrps);
    
    $i = 0;
    $barChart = array();
    $lineChart = array();
    $loc_name = '';
    foreach ($lrps as $lrp) {
      $lname =  str_replace(" ","_", $lrp->loc_name);
      $loc_name .= "'".$lname."',";
      $datas = DB::table('ai_child_sponsorship')
              ->where('lrp_id',$lrp->lrp_id)
              ->get();

      $a = 0;
      $b = 0;
      foreach ($datas as $spon) {
        $month = date('m', strtotime($spon->created_at));
        $year = date('Y', strtotime($spon->created_at)); 

        if($year == date("Y")){   //checking current year
          if($month > 6 ){ //after june to december
            $a = $a+$spon->newLinks_t+$spon->msgCollected_t+$spon->outstandingMsg_t+$spon->photosCollected_t+$spon->outstandingPhotos_t+$spon->queriesFollow_t+$spon->outstandingFollow_t+$spon->completedFollow_t+$spon->newLinks_t; 
          }else{ //january to june 
            $b = $b+$spon->newLinks_t+$spon->msgCollected_t+$spon->outstandingMsg_t+$spon->photosCollected_t+$spon->outstandingPhotos_t+$spon->queriesFollow_t+$spon->outstandingFollow_t+$spon->completedFollow_t+$spon->newLinks_t; 
          }
        }   
      }

      $barChar = [ 
              'y' => $lrp->loc_name, 
              'a' => $a,
              'b' => $b 
       ]; 
      array_push($barChart, $barChar);

      

      //$lineChart = 

     // { y: '2018-06', dhaka: 75,  b: 60, c: 56, d: 56}, 


    }
    // echo $loc_name;
    // exit();
     // $users = DB::table('ai_child_sponsorship')
       // ->select('ai_child_sponsorship.lrp_id',DB::raw('newLinks_t + newLinks_m as total_sales'),DB::raw('MONTH(created_at) month'))

        //->orderBy('created_at', 'asc')
        //->groupby('month')
        //->having('ai_child_sponsorship.lrp_id',$lrp->lrp_id)
        //->get();
    $lineChart = [];
    $lineData = '';
    $sql  = "select DATE_FORMAT(created_at,'%m') as month, DATE_FORMAT(created_at,'%Y') as year  from  ai_child_sponsorship group by DATE_FORMAT(created_at,'%m') order by created_at asc LIMIT 12";
    $months = DB::select($sql);
//dd($months);
    foreach ($months as $month) { 
      $v = $month->year.'-'.$month->month;
      $lineData = "{ y: '".$v."',";
     //echo $lineData;
     //exit();
      //$sql  = "select SUM(newLinks_t + newLinks_m) as value, lrp_id, id, created_at from ai_child_sponsorship group by lrp_id having 'id' = 1 order by created_at asc LIMIT 12";
      //$lineData = DB::select($sql);
      $lineDatas = DB::table('ai_child_sponsorship as ch')
                ->join('ai_location', 'ch.lrp_id', '=', 'ai_location.id')
                ->select('ch.lrp_id','ai_location.loc_name', DB::raw('SUM(ch.newLinks_t+ch.msgCollected_t+ch.outstandingMsg_t+ch.photosCollected_t+ch.outstandingPhotos_t+ch.queriesFollow_t+ch.outstandingFollow_t+ch.completedFollow_t+ch.newLinks_t) as value'))
                ->groupBy('ch.lrp_id')
                ->whereMonth('ch.created_at', $month->month)
                ->get();
        $i = 0;
        $len = count($lineDatas); 

        foreach ($lineDatas as $val) {
         $val->loc_name =  str_replace(" ","_", $val->loc_name);
           $lrp =" ".$val->loc_name." : ".$val->value.",";
           $lineData = $lineData.$lrp;
           if ($i == $len - 1){
            $lineData .= "},";
           }
          $needle   = "}";
          $flag = strstr($lineData, $needle); 
          if ($flag){  
            array_push($lineChart,$lineData);
          }
           $i++;
        } 
    } 


    

 ?>

 

     
  <script type="text/javascript">

    var data = [
    <?php 
      foreach ($barChart as $val) { ?>
       { y: '{{$val["y"]}}', a: {{$val["a"]}}, b: {{$val["b"]}}},
     <?php }
    ?> 
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['December {{date("Y")}}', 'June {{date("Y")}}'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };

config.element = 'bar-chart';
Morris.Bar(config);



var data = [ 
      <?php
        foreach ($lineChart as $value) {
         echo $value;
        } 
      ?> 
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: [<?php echo $loc_name;?>],
      labels: [<?php echo $loc_name;?>],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['Orange','Plum','gray','red','black','green','Blue','pink','gold']
  };
config.element = 'line-chart';
Morris.Line(config);

    
  </script>

<?php
  $childSponser = DB::table('ai_child_sponsorship')
    ->join('ai_location','ai_location.id','ai_child_sponsorship.lrp_id')
    ->join('cms_users','cms_users.id','ai_child_sponsorship.chi_userId')
    ->select('ai_child_sponsorship.*','cms_users.name','ai_location.loc_name')
    ->get();
?>

<div class="custom" style="background: #eee; min-height: 1650px;">
<div id="box-statistic" class="row">
  <div class="col-sm-3">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3>
              <?php
                $msgC = DB::table('ai_child_sponsorship as ch') 
                  ->select(DB::raw('SUM(ch.msgCollected_t) as value'))
                  ->get();
                  foreach ($msgC as $result) {
                    echo $result->value;
                  }
              ?>                
            </h3>
            <p># of Message Collected</p>
        </div>
        <div class="icon">
            <i class="fa fa-envelope-square"></i>
        </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3>
              <?php
                $msgC = DB::table('ai_child_sponsorship as ch') 
                  ->select(DB::raw('SUM(ch.photosCollected_t) as value'))
                  ->get();
                  foreach ($msgC as $result) {
                    echo $result->value;
                  }
              ?>                
            </h3>
            <p># of Photos Collected</p>
        </div>
        <div class="icon">
            <i class="fa fa-camera-retro"></i>
        </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3>
              <?php
                $msgC = DB::table('ai_child_sponsorship as ch') 
                  ->select(DB::raw('SUM(ch.totalLinks_t) as value'))
                  ->get();
                  foreach ($msgC as $result) {
                    echo $result->value;
                  }
              ?>                
            </h3>
            <p># of Links</p>
        </div>
        <div class="icon">
            <i class="fa fa-link"></i>
        </div>
    </div>
  </div>
</div>

<section class="content-header">
  <h1>
    <i class="fa fa-tencent-weibo"></i> Messages & Photo Collection &nbsp;&nbsp; 
      <a href="{{url('/')}}/admin/ai_child_sponsorship/add?return_url={{url('/childSponserShip/')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
        <i class="fa fa-plus-circle"></i> Add Data
      </a>
  </h1> 
</section> 

<table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px;">
        <thead>
            <tr>
                <th>Period</th>
                <th>total Links</th>
                <th>messages collected</th>
                <th>Photos collected</th>
                <th>outstanding messages</th>
                <th>outstanding photos</th>
                <th>queries</th>
                <th>follow ups outstanding</th>
                <th>follow ups completed</th>
                <th>new links</th>
                <th style="width: 75px!important;">Lead By</th>
                <th>LRP</th> 
                <th style="width: 38px!important;">Action</th> 
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($childSponser as $cvalue) {?>
            <tr>
                <td>{{$cvalue->chi_periodReview}}</td>
                <td>{{$cvalue->totalLinks_t}}</td>
                <td>{{$cvalue->msgCollected_t}}</td>
                <td>{{$cvalue->photosCollected_t}}</td>
                <td>{{$cvalue->outstandingMsg_t}}</td>
                <td>{{$cvalue->outstandingPhotos_t}}</td>
                <td>{{$cvalue->queriesFollow_t}}</td>
                <td>{{$cvalue->outstandingFollow_t}}</td>
                <td>{{$cvalue->completedFollow_t}}</td>
                <td>{{$cvalue->newLinks_t}}</td>
                <td>{{$cvalue->name}}</td>
                <td>{{$cvalue->loc_name}}</td>
                <td>
                  <div class="button_action" style="text-align:right">
                    <a class="btn btn-xs btn-primary btn-detail font" title="Detail Data" href="{{url('/')}}/admin/ai_child_sponsorship/detail/{{$cvalue->id}}?return_url={{url('/childSponserShip/')}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-xs btn-success btn-edit font" title="Edit Data" href="{{url('/')}}/admin/ai_child_sponsorship/edit/{{$cvalue->id}}?return_url={{url('/childSponserShip/')}}"><i class="fa fa-pencil"></i></a> 
                    <a class='btn btn-xs btn-warning btn-delete font' title='Delete' href='javascript:;'
                      onclick='swal({   
                      title: "Are you sure ?",   
                      text: "You will not be able to recover this record data!",   
                      type: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#ff0000",   
                      confirmButtonText: "Yes!",  
                      cancelButtonText: "No",  
                      closeOnConfirm: false }, 
                      function(){  location.href="{{url('/')}}/admin/ai_child_sponsorship/delete/{{$cvalue->id}}" });'><i class='fa fa-trash'></i>
                    </a>
                  </div>
                </td>
            </tr>
          <?php  }   ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Period</th>
                <th>total Links</th>
                <th>messages collected</th>
                <th>Photos collected</th>
                <th>outstanding messages</th>
                <th>outstanding photos</th>
                <th>queries</th>
                <th>follow ups outstanding</th>
                <th>follow ups completed</th>
                <th>new links</th>
                <th>Lead By</th>
                <th>LRP</th> 
                <th>Status</th> 
            </tr>
        </tfoot>
    </table>

    <section class="content-header">
  <h1>
    <i class="fa fa-stumbleupon"></i> Sponsorship Activities &nbsp;&nbsp; 
      <a href="{{url('/')}}/admin/ai_activities_sponsorship" id="btn_add_new_data" class="btn btn-sm btn-success" title="See All">
        <i class="fa fa-eye"></i> See All
      </a>
  </h1> 
</section> 

<div class="row">
  <div class="col-lg-6">

<?php
  $childActivites = DB::table('ai_activities_sponsorship')
    ->join('ai_location','ai_location.id','ai_activities_sponsorship.lrp_id') 
    ->select('ai_activities_sponsorship.*','ai_location.loc_name')
    ->latest('ai_activities_sponsorship.created_at')
    ->get(); 
  //exit();
?>




    <h4>Upcoming</h4>
    <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px">
  <thead>
      <tr>
          <th>Activity Name</th>
          <th>Activity Date</th> 
          <th>LRP</th> 
      </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      foreach ($childActivites as $cA) { 
        $today = date_create(date("Y-m-d")); 
        $conducted = date_create($cA->spo_date); 
        $dif = date_diff($today, $conducted);
        $diff = $dif->format('%R%a'); 
        if($diff > 0){ ?>

        <tr>
          <td>{{$cA->spo_name}}</td>
          <td><?php echo date('d M\'y', strtotime($cA->spo_date))?></td> 
          <td>{{$cA->loc_name}}</td> 
        </tr> 

    <?php }
       if($i>6){
          break;
        } 
        $i++; 
      } 
     ?>
      
      
  </tbody> 
</table>
  </div>
  <div class="col-lg-6">
    <h4>Conducted</h4>
    <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px">
  <thead>
      <tr>
          <th>Activity Name</th>
          <th>Activity Date</th> 
          <th>LRP</th>  
      </tr>
  </thead>
  <tbody>
      <?php
          $i = 1;
          foreach ($childActivites as $cA) { 
            $today = date_create(date("Y-m-d")); 
            $conducted = date_create($cA->spo_date); 
            $dif = date_diff($today, $conducted);
            $diff = $dif->format('%R%a'); 
            if($diff < 0){ ?>

            <tr>
              <td>{{$cA->spo_name}}</td>
              <td><?php echo date('d M\'y', strtotime($cA->spo_date))?></td> 
              <td>{{$cA->loc_name}}</td> 
            </tr> 

        <?php } 
           if($i>6){
              break;
            } 
            $i++; 
          } 
         ?>
      
  </tbody> 
</table>
  </div>
</div>









  </div>

@endsection



