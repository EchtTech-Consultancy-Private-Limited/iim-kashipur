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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-usp/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-usp')}}" enctype="multipart/form-data">

                @endif

                    @csrf

                     



                      <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">URL [Select from Dropdown]*</label> 
                            <select name="url" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($data1 as $D)
                                <option value="{{$D->url}}" @if($id) @if($D->url == $data->url) selected @endif @endif>{{url($D->url)}}</option>
                                @endforeach
                            </select>
                         </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name[English] *</label> <input id="form_name" type="text" name="name" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif class="form-control" placeholder="Please enter name *"  > </div>

                    </div>


                        <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name[Hindi] *</label> <input id="form_name" type="text" name="name_h" @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif class="form-control" placeholder="Please enter name_h *"  > </div>

                    </div>



                 

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Image (45px * 45px)</label> <input id="form_name" type="file" name="image" accept=".jpeg,.png,.gif,.jpg" class="form-control" > </div>

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