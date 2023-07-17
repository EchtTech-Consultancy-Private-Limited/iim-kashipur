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

                  <h6 class="card-title">Manage Roles</h6>

                 <div>

                      @if(auth()->guard('admin')->user()->role('Super Admin'))

                      <button type="button" class="btn btn-primary" style="margin-left:5px;"><a href="{{route('admin.addRoles')}}">Add New Role</a></button>

                      @endif

                     

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>S.No#</th>

                              <th>Role Name</th>

                              <th>Permissions</th>

                              <th>Actions</th>

                              

                            </tr>

                          </thead>

                          <tbody>

                            @foreach($data as $K=>$D)

                            <tr>

                              <td>{{$K+1}}</td>

                              <td>{{$D->name}}</td>

                              <td>

                                <?php $perms= \Spatie\Permission\Models\Role::find($D->id)->getAllPermissions();?>

                                @if($perms)

                                @foreach($perms as $P)

                                {{$P->name}} | 

                                @endforeach

                                @endif

                              </td>

                              @if(auth()->guard('admin')->user()->role('Super Admin'))

                              <td><a href='{{url('Accounts/permissions').'/'.dEncrypt($D->id)}}'><i class="ti-pencil btn-icon-append" style="color:black;"></i></a>
                               @if(\Auth::guard('admin')->user()->id==1) |
                                <a href="{{url('Accounts/delete-Role').'/'.dEncrypt($D->id)}}" onclick="return confirm('Are you really sure?')"><i class="ti-archive btn-icon-append" style="color:black;"></i></a>
                                @endif
                              </td>

                              @endif

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