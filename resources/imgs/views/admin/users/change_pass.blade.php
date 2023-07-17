@extends('admin.Layout.master')
@section('title', 'Change Password')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>
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
                  
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/change-password')}}" >
                 
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> New Password *</label> <input id="form_name" type="text" name="password" class="form-control" placeholder="Please enter new password *" required="required" > </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> <label for="Roll_number">Retype Password *</label> <input id="Roll_number" type="text" name="retype_password" class="form-control" placeholder="Please repeat password *" required="required" > </div>
                    </div>


                    <div class="clearfix"></div>
                   <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
       @endsection