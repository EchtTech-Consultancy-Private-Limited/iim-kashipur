@extends('admin.Layout.master')

@section('title', 'Audit Log Date')

@section('content')
<style>


</style>
      <div class="main-panel">

        <div class="content-wrapper">

                @if(Session::has('success'))

              <div class="alert alert-success col-md-12 text-center">

                  <strong>Success!</strong> {{ Session::get('success') }}

                </div>

                 @endif

                @if(Session::has('error'))

              <div class="alert alert-danger col-md-12 text-center">

                  <strong>Oops!</strong> {{ Session::get('error') }}

                </div>

                 @endif

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <div class="top-menu-button">

                  <p class="card-title">Audit Log Date</p>



                  </div>



                  <div class="row">



                    <div class="col-12">
                    <form  action="{{url('/Accounts/Audit-data-show')}}" method="post">
                   @csrf
                   <div class="row input-daterange">

                   <div class="col-4">
                  <input type="date" name="start_date" id="from_date" class="form-control" placeholder="From Date" value="{{request()->start_date}}" >
                  </div>

                 <div class="col-4">
                 <input type="date" name="end_date" id="to_date" class="form-control" placeholder="To Date" value="{{request()->end_date}}" >
                 </div>
                <div class="col-2">
                <button type="submit" name="filter" id="filter" class="btn btn-primary">Filter</button>

                 </div>
                <div  class="col-2">
                <a class="btn btn-warning" href="{{ url('/Accounts/file-export') }}?start_date={{request()->start_date}}&end_date={{request()->end_date}}">Export Action Event</a>
                </div>
                 </div>
                </form><br><br>


                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">


                        <thead>
                                <tr>
                                   <th scope="col">ID#</th>
                                   <th scope="col">Date </th>
                                   <th scope="col">Time </th>
                                   <th scope="col">User Name</th>
                                   <th scope="col">Ip Address</th>
                                   <th scope="col">Event Action</th>

                                </tr>
                             </thead>

                           <tbody id="user_detail">

                              @foreach($data as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td> {{ $value->created_at->format('H:i:s')}}  </td>
                                <td>{{$value->user_name}}</td>
                                <td>{{$value->IP_address}}</td>
                                <td>{{$value->action_event}}</td>
                            </tr>
                           @endforeach
                             </tbody>

<tbody id="tablefilter">

</tbody>



                         </table>
                         {{$data->links('pagination::bootstrap-5')}}
                      </div>

                    </div>

                  </div>

                  </div>

                </div>

              </div>

            </div>

        </div>


       <!--modal-->

<div class="modal fade "id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

  <div class="modal-content">

   <!--   <span style="margin-left:500px;"><b>Press Esc to Exit</b></span>

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>-->

        <div id="1"></div>

    </div>

  </div>

</div>



<script type="text/javascript">

function abc(id){

  a='<?php echo asset('uploads');?>';

  src = a+"/"+id;

  $("#1").html('<img src="'+src+'" style="width:100%;height:100%;">');

}

</script>

<script>

  /*$(document).ready(function(){

    $.ajaxSetup({
              headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
   $.ajax({
     type:"GET",
     url:"{{url('/Accounts/ajax_log_table')}}",
     success:function(data){
      //console.log(data.data);

      var output='';
        for(var i=0; i<data.data.length; i++){
          var output=output+'<tr>'
          +'<td>'+data.data[i].id+'</td>'
          +'<td>'+data.data[i].created_at+'</td>'
          +'<td>'+data.data[i].user_name+'</td>'
          +'<td>'+data.data[i].IP_address+'</td>'
          +'<td>'+data.data[i].action_event+'</td>'*/
         /* output=output+'<td>'
           +'<a href="{{url('/Accounts/add-edit-announcements')}}/'+data.data[i].id+'">'+'<i class="ti-pencil btn-icon-append" style="color:black;">'+'</i>'+'</a>'+' '
          // +'<a  href="{{url('/Accounts/delete-announcements')}}/'+data.data[i].id+'" onclick="return confirm('+"'"+'Are You Sure?'+"'"+')">'+'<i class="ti-archive btn-icon-append" style="color:black;">'+'</i>'+'</a>'
           +'</td>';   */

        /*  +'</tr>';

      }
      $('#tablefilter').html(output);
    }
  });
});*/
</script>

       @endsection

