@extends('admin.Layout.master')
@section('title', 'Add Roles')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add roles</h4>
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
                  <form class="forms-sample" method="POST" action="{{route('admin.addRoles')}}" >
                    @csrf
                    <div class="form-group">
                      
                      <input type="text" class="form-control" name="name" placeholder="role name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
       @endsection