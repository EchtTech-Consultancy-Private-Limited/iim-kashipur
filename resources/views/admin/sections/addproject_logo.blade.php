@extends('admin.Layout.master')

@section('title',$title)

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

                  <form class="forms-sample row col-md-12" method="POST"  action="{{url('Accounts/add_edit_project_logo/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" id="regForm" action="{{url('Accounts/add_edit_project_logo')}}" enctype="multipart/form-data">

                @endif

                    @csrf



                    <div class="col-md-6">

                   <div class="form-group"> <label for="name">NAME *</label> <input id="name" type="text" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif name="name" class="form-control" placeholder="Please enter name*"  >


                    <label for="name"  id="name-error" class="error">
                        @error('name')
                         {{ $message }}
                        @enderror
                    </label>

                </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group"> <label for="name_h">NAME[Hindi] *</label> <input id="name_h"  @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif type="text" name="name_h" class="form-control" placeholder="Please enter name_h*"  >


                        <label for="name_h"  id="name_h-error" class="error">
                            @error('name_h')
                             {{ $message }}
                            @enderror
                        </label>

                    </div>

                </div>




                 <div class="col-md-6">

                  <div class="form-group"><label for="number">Number *</label> <input id="number" type="text" @if($id) value="{{$data->number}}" @else value="{{old('number')}}" @endif  name="number"  class="form-control" placeholder="Please enter number *"  >


                    <label for="number"  id="number-error" class="error">
                        @error('number')
                         {{ $message }}
                        @enderror
                    </label>


                </div>

                   </div>


                 <div class="col-md-6">

                 <div class="form-group"> <label for="image">Image (45px * 45px)</label> <input id="image" type="file" name="image" accept=".jpeg,.png,.gif,.jpg" class="form-control" >


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


