@extends('admin.Layout.master')
@section('title', 'Assign Role')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Role to {{$user->name}}</h4>
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
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/assign-role').'/'.$id}}" >
                  @endif
                    @csrf
                   
                  
                      <div class="col-md-12">
                        <div class="form-group row">
                          
                          @foreach($data as $key=>$d)
                          
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="role[]" id="membershipRadios1" value="{{$d->name}}" 
                                @foreach($roles as $P) @if($P == $d->name) checked @endif @endforeach >
                                {{$d->name}}
                              </label>
                            </div>
                          </div>
                         
                          @endforeach
                          
                        </div>
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