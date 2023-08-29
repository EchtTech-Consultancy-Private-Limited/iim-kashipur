@extends('admin.Layout.master')

@section('title','Manage dissertation')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ 'Manage dissertation' }}</h4>

                            <p class="card-description">

                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger col-md-12 text-center">

                                        <strong>Oops!</strong> {{ Session::get('error') }}

                                    </div>
                                @endif

                            </p>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="name"placeholder="Please enter  Name" required
                                        value="{{$data->name}}"  readonly><br>
                                    <label for="name" id="name-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Batch</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Batch"placeholder="Please enter  Batch" required
                                        value="{{ $data->Batch }}"  readonly><br>
                                    <label for="Batch" id="Batch-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Topic</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Topic"placeholder="Please enter Topic" required
                                         value="{{ $data->Topic }}" readonly><br>
                                    <label for="Topic" id="Topic-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Supervisor</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Supervisor"placeholder="Please enter Supervisor" required
                                        value="{{ $data->Supervisor }}"  readonly><br>
                                    <label for="Supervisor" id="Supervisor-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Image</label>



                                      <img src="{{ asset('uploads/dissertation/'.$data->file) }}" width="150"
                                    height="100" />


                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-sm-12 col-form-label">Image title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="image_title" readonly value="{{$data->image_title}}"
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>

@endsection
