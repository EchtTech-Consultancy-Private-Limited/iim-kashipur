@extends('admin.Layout.master')

@section('title', 'Manage Profile Sections')

@section('content')

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

                  <p class="card-title">Manage Profile Sections </p>

                  <div>


                    <button type="button" class="btn btn-primary" ><a href="{{route('admin.add_biography')}}">Add Profile detail</a></button>


                    </div>




                  </div>



                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>Sr.No</th>

                              <th>Title</th>

                              <th>Title[Hindi]</th>

                              <th>Photo</th>

                              <th>Action</th>



                            </tr>

                          </thead>

                          <tbody>

                            @foreach($data as $K=>$D)

                            <tr>

                              <td>{{$K+1}}</td>

                              <td>{{$D->Title}}</td>

                              <th>{{ $D->title_h }}</th>

                              <td>@if($D->image != null || $D->image!='')<img class="thumb"  style="height:50px; width:100px;" src="{{url('uploads/organisation/'.$D->image)}}" data-toggle="modal" data-target="#exampleModal" rel="{{$D->image}}" onclick="abc('{{$D->image}}')">

                                @endif</td>


                             <td>

                              <a href="{{url('Accounts/add-edit-profile/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;


                              @if (\Auth::guard('admin')->user()->id == 1  )
                              <a href="{{url('Accounts/delete-profile/'.dEncrypt($D->id))}}" onclick="return confirm('Are You Sure?')"><i class="ti-archive btn-icon-append" style="color:black;"></i></a>
                               @endif
                             </td>



                            </tr>

                            @endforeach

                          </tbody>

                      </table>

                      </div>

                    </div>

                  </div>

                  </div>

                </div>





              </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

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

  a='<?php echo asset('uploads/organisation');?>';

  src = a+"/"+id;

  $("#1").html('<img src="'+src+'" style="width:100%;height:100%;">');

}

</script>



       @endsection



