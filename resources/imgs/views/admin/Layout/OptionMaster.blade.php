@extends('admin.Layout.master')
@section('title', 'Manage Options Master ')
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
                  <p class="card-title">Manage Options </p>
                  <div>
                      <button type="button" class="btn btn-primary" ><a href="{{route('admin.addOptionMaster')}}">Add New Option Master </a></button>
                     
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S.No#</th>
                           
                              <th>Title</th>
                              <th>Options</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $K=>$D)
                            <tr>
                              <td>{{$K+1}}</td>
                              <td>{{$D->main}}</td>
                              <td>{{$D->option}}</td>
                             <td>
                              <a href="{{url('Accounts/add-edit-optionsmaster/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;
                              <a href="{{url('Accounts/delete-optionsmaster/'.dEncrypt($D->id))}}" onclick="return confirm('Are You Sure?')"><i class="ti-archive btn-icon-append" style="color:black;"></i></a>
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


       @endsection

