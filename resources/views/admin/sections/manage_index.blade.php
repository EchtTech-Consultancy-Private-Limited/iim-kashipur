@extends('admin.Layout.master')

@section('title', 'Manage Counter')

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

                  <p class="card-title">Manage Counter </p>

                  <div>

                      <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add_edit_project_logo')}}">Add New  index</a></button>



                    </div>

                  </div>



                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>Sr.No</th>
                              <th>Name</th>
                              <th>Name[hindi]</th>
                              <th>Number</th>
                              <th>Status</th>
                              <th>Action</th>



                            </tr>

                          </thead>

                          <tbody>

                            @foreach($data as $K=>$D)

                            <tr>

                            <td>{{$K+1}}</td>
                            <td>{{$D->name}}</td>
                            <td>{{$D->name_h}}</td>
                            <td> {{$D->number}}</td>

                            <td>
                                @if (@checkRoute('StatusChange'))
                                    @if ($D->status == 1)
                                        <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/project_logos') }}"
                                            style="color:green;">Active</a>
                                    @else
                                        <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/project_logos') }}"
                                            style="color:red;">Inactive</a>
                                    @endif
                                @else
                                    @if ($D->status == 1)
                                        <span" style="color:green;">Active</span>
                                        @else
                                            <span style="color:red;">Inactive</span>
                                    @endif
                                @endif
                            </td>

                              <td>

                                <a href="{{url('Accounts/add_edit_project_logo/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;

                                <a href="{{url('Accounts/view_index/'.dEncrypt($D->id))}}"><i class="ti-eye btn-icon-append" style="color:black;"></i></a> &nbsp;


                                <a href="{{url('Accounts/project_index/'.dEncrypt($D->id))}}" onclick="return confirm('Are You Sure?')"><i class="ti-archive btn-icon-append" style="color:black;"></i></a>

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

       @endsection



