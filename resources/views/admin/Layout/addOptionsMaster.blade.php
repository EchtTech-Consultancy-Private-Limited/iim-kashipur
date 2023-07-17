@extends('admin.Layout.master')

@section('title', $title)

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{$title}}</h4>

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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-optionsmaster/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-optionsmaster')}}" enctype="multipart/form-data">

                @endif

                    @csrf



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="form_name"> Name Of Main *</label>

                            <input list="browsers" name="main" id="browser" class="form-control" placeholder="find or type main menu name to create new entry" @if($id) value="{{$data->main}}" @else value="{{old('main')}}" @endif >

                                <datalist id="browsers">

                                    @foreach($data1 as $D)

                                    <option value="{{$D->main}}" >{{$D->main}}</option>

                                    @endforeach

                                </datalist>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Option *</label> 
                                <input type="text" name="option"  class="form-control" placeholder="type option name to create new entry" @if($id) value="{{$data->option}}" @else value="{{old('option')}}" @endif >

                               
                         
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