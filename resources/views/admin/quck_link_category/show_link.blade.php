@extends('admin.Layout.master')

@section('title', 'Quick link Section ')

@section('content')













<p class="card-description">



@if($errors->any())



<div class="alert alert-danger">



    <ul>



    @foreach ($errors->all() as $error)



        <li>{{ $error }}</li>



    @endforeach



    </ul>



</div>



@endif



@if(Session::has('error'))



<div class="alert alert-danger col-md-12 text-center">



<strong>Oops!</strong> {{ Session::get('error') }}



</div>



@endif



</p>



































<style type="text/css">

  .td-list p:last-child {

    border-right: none!important;

  }

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

                  <p class="card-title">Manage Link Section </p>

                  <div>

                      <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add_link')}}">Add New Link Section </a></button>

                    </div>

                  </div>



                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>S.No#</th>

                              <th>Section</th>

                              <th>Placement</th>

                              <th>Status</th>

                              <th>Action</th>



                            </tr>

                          </thead>

                          <tbody>

                          @foreach($data as  $K=>$value)



                         <tr>



                          <td>{{$K+1}}</td>





                      <td>{{$value->Section}}</td>

                      <td>{{$value->placement}}</td>







                  {{-- <td><span class="badge bg-success text-light">{{$value->status}}</span></td></td> --}}





                  <td>
                  @if(@checkRoute('StatusChange'))
                      @if($value->status==1) <a href="{{url('Accounts/status-change/0/'.dEncrypt($value->id).'/quick_linkcategories')}}" style="color:green;">Active</a> @else <a href="{{url('Accounts/status-change/1/'.dEncrypt($value->id).'/quick_linkcategories')}}" style="color:red;">Inactive</a> @endif
                  @else
                      @if($value->status==1) <span" style="color:green;">Active</span> @else <span style="color:red;">Inactive</span> @endif
                  @endif
                  </td>


                  <td>



                   <a href="{{ url('/Accounts/update_link/'.dEncrypt($value->id))}}" onclick="return confirm('Are you sure to delete this record?')"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;

                   <a href="{{ url('/Accounts/delete_link/'.dEncrypt($value->id))}}" onclick="return confirm('Are you sure to edit this record?')"><i class="ti-trash btn-icon-append" style="color:black;"></i></a> &nbsp;



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



       @endsection



