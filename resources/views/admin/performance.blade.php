@extends('crudbooster::admin_template')
@section('content')
<form>
  <select>
    <option>all</option>
    <option>pri 1</option>
    <option>pri 2</option>
    <option>pri 3</option>
  </select>
  <button>asdf</button>
</form>
<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th>Actitities Name</th>
        <th>Field</th> 
        <th>Jan</th> 
        <th>Feb</th> 
        <th>Mar</th> 
        <th>Apr</th> 
        <th>May</th> 
        <th>Jun</th> 
        <th>Jul</th> 
        <th>Aug</th> 
        <th>Sep</th> 
        <th>Oct</th> 
        <th>Nov</th> 
        <th>Dec</th> 
        <th>Cur-Total</th> 
        <th>Terget & Achivement</th>  
       </tr>
  </thead>
  <tbody>
    {{-- @foreach($result as $row) --}}
      <tr>
        <td rowspan="7" style="max-width: 170px; min-width: 137px; word-wrap: break-word;/*vertical-align: middle*/;">Support and link women, young people, their organizatio</td>
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td rowspan="6" style="text-align: center;vertical-align: middle;">Current yea
        Target 2300<br>
         Achieve 200<br>
          Variance 100<br>
           Total Target 2022 <br>
            Target 2300 <br>
          Achieve 200<br>
           Variance 100</td> 
        {{-- <td>
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
          @endif
        </td> --}}
       </tr> 
       <?php for($i=0;$i<6;$i++){?>
        <tr> 
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td>  
         
       </tr>
       <?php }?>
       <tr style="color: red; background: yellow">
        <td></td>
       <td>Total</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td style="text-align: center;">351</td> 
        </tr>

       <tr>
        <td rowspan="7" style="max-width: 170px; min-width: 137px; word-wrap: break-word;">Conscientize women, girls and their organizations on policy and legal framework promoting their economic rights of adequate access and control of productive resources, reduction of unpaid care work and decent work environments</td>
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td rowspan="7" style="text-align: center;vertical-align: middle;">Current yea
        Target 2300<br>
         Achieve 200<br>
          Variance 100<br>
           Total Target 2022 <br>
            Target 2300 <br>
          Achieve 200<br>
           Variance 100</td> 
        {{-- <td>
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
          @endif
        </td> --}}
       </tr> 
       <?php for($i=0;$i<6;$i++){?>
        <tr> 
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td>  
         
       </tr>
       <?php }?>
       <tr style="color: red; background: yellow">
        <td></td>
       <td>Total</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td style="text-align: center;">351</td> 
        </tr>
       <br>
       <tr>
        <td rowspan="7" style="text-align: center;vertical-align: middle;">Activites 3</td>
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td rowspan="7" style="text-align: center;vertical-align: middle;">Current yea
        Target 2300<br>
         Achieve 200<br>
          Variance 100<br>
           Total Target 2022 <br>
            Target 2300 <br>
          Achieve 200<br>
           Variance 100</td> 
        {{-- <td>
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
          @endif
        </td> --}}
       </tr> 
       <?php for($i=0;$i<6;$i++){?>
        <tr> 
        <td>Male</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td>  
         
       </tr>
       <?php }?>
       <tr style="color: red; background: yellow">
        <td></td>
       <td>Total</td> 
        <td>51</td> 
        <td>15</td> 
        <td>15</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td>85</td> 
        <td>0</td> 
        <td>4</td> 
        <td>13</td> 
        <td>15</td> 
        <td>35</td> 
        <td>15</td> 
        <td style="text-align: center;">351</td> 
        </tr>
  {{--  @endforeach --}}
  </tbody>
</table>

<!-- ADD A PAGINATION -->
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
@endsection