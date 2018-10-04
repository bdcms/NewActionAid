@extends('crudbooster::admin_template')
@section('content')
<form role="form" action="{{url('datafilter/')}}" method="post"> 
  {{csrf_field()}}
  
<section class="content-header">
  <select name="priority" style="    padding: 4px 10px; margin: 0px;">
    <option value="">Priority All</option>
    @foreach($prioritys as $priority)
    <option value="{{$priority->id}}">{{$priority->pri_name}}</option> 
    @endforeach
  </select>
  <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Filter" >
   
</form>
  <a href="{{url('performance_export/')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data"> <i class="fa fa-upload"></i> Export Report</a>
</section>
 
 

{{-- <div class="observer_reg_class"><div class="linkk"><a href="export.php?users='users'">Export</a></div> --}}
<style type="text/css">
.performance{margin-top: 30px;background: #ecf0f5;font-size: 12px !important}
  .performance,.performance ul,.performance ul li ul{float: left;width: 100%; }
  .performance ul li{float: left;padding: 0px;text-align: center;width: 43px; }
  .subtotal span{float: left;width: 100%;
  }
   
</style>
 

<div class="performance">
  <ul style="padding: 0px; float: left;width: 100%;list-style: none;font-weight: bold; border:1px solid #ccc;margin:0px;line-height: 22px;padding-left:5px;">
    <li style="width:15%;text-align: left;">Activity Name</li>
    <li style="width:12%;text-align: left;">Indicator </li>
    <li style="width: 63%;">
      <ul style="padding: 0px; float: left;width: 100%;list-style: none;">
          <li style="width:80px;text-align: left;">Male</li>
          <li>Jan</li> 
          <li>Feb</li> 
          <li>Mar</li> 
          <li>Apr</li> 
          <li>May</li> 
          <li>Jun</li> 
          <li>Jul</li> 
          <li>Aug</li> 
          <li>Sep</li> 
          <li>Oct</li> 
          <li>Nov</li> 
          <li>Dec</li>
          <li>Total</li>
          <li>Subtotal</li>
      </ul>
    </li> 
    <li style="width:10%;">Ter&A</li>
  </ul> 
  {{-- __________________________________________________________________________________________________________________ --}}
  <?php 
    for ($i=0; $i <$count ; $i++) {  
      if(isset($info[$i]["activity_name"]->act_name)){ 
  ?>
  <ul style="padding: 0px; float: left;width: 100%;list-style: none; border:1px solid #ccc;padding-left:5px;">
    <li style="width:15%;text-align: left;padding-right: 5px;">{{$info[$i]["activity_name"]->act_name}}</li>
    <li style="width:12%;text-align: left;padding-right: 5px;">{{$info[$i]["indicator_name"]->ind_name}}</li>
    <li style="width: 63%;">
       
      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">Child Male</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["child_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["c_male_t"]}}</li>
          <li>{{$info[$i]['y_ttl_mel_child']}}</li>
      </ul>

      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">Child Female</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["child_f_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["c_F_male_t"]}}</li>
          <li>{{$info[$i]["y_ttl_fmel_child"]}}</li>
      </ul>

      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">Youth Male</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["youth_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["youth_male_T"]}}</li>
          <li>{{$info[$i]["y_ttl_youth_mel"]}}</li>
      </ul>
      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">youth Female</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["youth_f_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["youth_f_male_T"]}}</li>
          <li>{{$info[$i]["y_ttl_youth_F_mel"]}}</li>
      </ul>
      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">Audult Male</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["audult_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["audult_male_t"]}}</li>
          <li>{{$info[$i]["y_ttl_adult_mel"]}}</li>
      </ul>
      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;">
          <li style="width:80px;text-align: left;">Audult Female</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["audult_F_male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["audult_F_male_t"]}}</li>
          <li>{{$info[$i]["y_ttl_adult_F_mel"]}}</li>
      </ul>  

      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;background: #B8CCE4;">
          <li style="width:80px;text-align: left;">Total Male</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]["male"][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["male_total"]}}</li>
          <li>{{$info[$i]["y_ttl_total_mel"]}}</li>
      </ul>
      <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;background: #B8CCE4;">
          <li style="width:80px;text-align: left;">Total FeMale</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]['female'][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["female_total"]}}</li>
          <li>{{$info[$i]["y_ttl_total_F_mel"]}}</li>
      </ul>

     <ul style="padding: 0px; float: left;width: 100%;list-style: none; border-bottom: 1px solid #ccc;background: #95B3D7;font-weight: bold;">
          <li style="width:80px;text-align: left;">Total Monthly</li>
          <?php for ($j=1; $j <=12 ; $j++) { ?>
            <li>{{$info[$i]['female_sub_to'][$j]}}</li>  
          <?php } ?>
          <li>{{$info[$i]["female_total"]+$info[$i]["male_total"]}}</li>
          <li>{{$info[$i]["y_ttl_total_sub"]}}</li>
      </ul>
 
       
       
    </li> 
    <li class="subtotal" style="width:10%;text-align: left;padding-left: 3px;">
      <span style="background: #254061;color:#fff;">Target Yearly 202300</span> 
      <span>Achieve: 200</span>   
      <span>Variance: 100</span>                                     
      <span style="background:#254061;color:#fff; ">Total Target 2002022</span>                
      <span>Target: 2300  </span>         
      <span>Achieve: 200 </span>  
      <span>Variance: 100</span>
    </li>
  </ul>
  <?php }} ?>
  {{-- _________________________________________________________________________________________________________ --}}

</div>

<!-- ADD A PAGINATION -->
 
@endsection