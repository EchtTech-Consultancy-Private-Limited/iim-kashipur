@extends('admin.Layout.master')
@section('title', $title)
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
                  <p class="card-title">Manage Users</p>
                  <div>
                      <button type="button" class="btn btn-primary" ><a href="{{route('admin.addadmin')}}">Add New User</a></button>
                     
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S.No#</th>
                              <th>Name</th>
                              <th>Mail Id</th>
                              <th>Mobile No</th>
                              <th>A/c Type</th>
                              <th>Status</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $K=>$D)
                            <tr>
                              <td>{{$K+1}}</td>
                              <td>{{$D->name}}</td>
                              <td>{{$D->email}}</td>
                              <td>{{$D->mobile}}</td>
                              <td>{{$D->getRoleNames()}}</td>
                              <td>
                                @if($D->status == 1)

                                    <a href="{{url('Accounts/change-status/0').'/'.dEncrypt($D->id)}}"><span class="badge rounded-pill bg-success">Active</span>

                               @else

                                    <a href="{{url('Accounts/change-status/1').'/'.dEncrypt($D->id)}}"><span class="badge rounded-pill bg-danger">In Active</span></a>

                               @endif
                              </td>
                              <td>
                               @if(auth()->guard('admin')->user()->role('Super Admin'))
                                <button class="btn btn-outline-success"><a href="{{url('Accounts/assign-role')}}/{{dEncrypt($D->id)}}" style="color:black;" >Assign Role</a></button>&nbsp;
                               @endif
                              
                                <button class="btn btn-outline-warning"><a href="{{url('Accounts/add-edit-admin')}}/{{dEncrypt($D->id)}}" style="color:black;" >Edit</a></button>&nbsp;
                                <button class="btn btn-outline-danger"><a style="color:black;" href="{{url('Accounts/delete-admin')}}/{{dEncrypt($D->id)}}" onclick="return confirm('Are You Sure?');">Delete</a></button>
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