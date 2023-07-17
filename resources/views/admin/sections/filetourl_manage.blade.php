@extends('admin.Layout.master')

@section('title', 'Manage File2URL ')

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

                  <p class="card-title">Manage File2URL </p>

                  <div>

                      <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-file2url')}}">Add New File2URL </a></button>



                    </div>

                  </div>



                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>S.No#</th>





                              <th>Type</th>
                              <th>Title</th>


                               <th>File Name</th>
                              <th>Url</th>

                              <th>Action</th>



                            </tr>

                          </thead>

                          <tbody>

                            @foreach($data as $K=>$D)

                            <tr>

                              <td>{{$K+1}}</td>
                              <td>{{$D->type}}</td>

                              <td>{{$D->title}}</td>
                                  <td> {{$D->file}}</td>
                              <td>{{$D->url}}</td>

                              <td>

                                <a href="{{url('Accounts/add-edit-file2url/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;

                                <a href="{{url('Accounts/delete-file2url/'.dEncrypt($D->id))}}" onclick="return confirm('Are You Sure?')"><i class="ti-archive btn-icon-append" style="color:black;"></i></a>

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



