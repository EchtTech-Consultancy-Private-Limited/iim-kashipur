@extends('admin.Layout.master')

@section('title','View Client Logo')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">


          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{'View Client Logo'}}</h4>

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


                    <div class="col-md-12">

                        <div class="form-group"> <label for="type">Type *</label>


                            <label for="type"> <b>{{ $data->type ??'' }}</b></label>



                         </div>

                    </div>



                      <div class="col-md-12">

                        <div class="form-group">

                            <label for="title">Title *</label>


                            <label for="type"><b>{{ $data->title ??'' }}</b></label>




                        </div>

                    </div>



                     <div class="col-md-12">

                            <div class="form-group">


                                <label for="title">Image *</label>

                             {{-- <span style="color:green;font-size:12px;"> [{{$data->file}}] </span> --}}


                             <img src="{{ asset('uploads/'.$data->file) ??''}}" width="200"
                                 height="100" />





                            </div>

                    </div>




                    <div class="col-md-12">

                      <div class="form-group"> <label for="url">External url *</label>

                        <label for="type"><b>{{ $data->url }}</b></label>

                    </div>

                  </div>


                    <div class="clearfix"></div>

                </div>

              </div>

            </div>

            </div>

        </div>



       @endsection
