@extends('admin.Layout.master')
@section('title', $title)
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add / Edit User</h4>
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
                  @if($id)
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-admin').'/'.$id}}" >
                  @else
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-admin')}}" >
                  @endif
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Name *</label> <input id="form_name" type="text" value="{{$data->name}}" name="name" class="form-control" placeholder="Please enter name *" required="required" data-error="Firstname is required."> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> <label for="Roll_number">Email *</label> <input id="Roll_number" type="email" value="{{$data->email}}" name="email" class="form-control" placeholder="Please enter mail id *" required="required" data-error="Roll no. is required."> </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Mobile *</label> <input id="form_name" type="text" value="{{$data->mobile}}" name="mobile" class="form-control" placeholder="Please enter mobile no *" maxlength="10" required="required" > </div>
                    </div>

                    <div class="clearfix"></div>
                   <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
       @endsection