@extends('admin.Layout.master')

@section('title', 'Add Upcoming Section Layout')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Add Upcoming Section Layout</h4>

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

                

                  <form class="forms-sample row col-md-12" method="POST" action="{{route('admin.addupcoming')}}" enctype="multipart/form-data">

                  

                    @csrf

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Name *</label> <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter title *" required="required" value="{{old('name')}}" > </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group"> <label for="Roll_number">Image *</label> <input id="Roll_number" type="file"  name="image" class="form-control" accept="image/png, image/jpeg"> </div>

                    </div>



                   <div class="col-md-6">

                        <div class="form-group"> <label for="Roll_number">File *</label> <input id="Roll_number" type="file"  name="file" class="form-control" accept=".html,.php"> </div>

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