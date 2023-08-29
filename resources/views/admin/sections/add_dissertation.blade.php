@extends('admin.Layout.master')

@section('title', $title)

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ $title }}</h4>

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

                            @if ($id)
                                <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                    action="{{ url('Accounts/add-edit-dissertation/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-dissertation') }}" enctype="multipart/form-data">
                            @endif

                            @csrf



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="name"placeholder="Please enter  Name" required
                                        @if ($id) value="{{ $data->name }}" @else value="{{ old('name') }}" @endif><br>
                                    <label for="name" id="name-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Batch</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Batch"placeholder="Please enter  Batch" required
                                        @if ($id) value="{{ $data->Batch }}" @else value="{{ old('Batch') }}" @endif><br>
                                    <label for="Batch" id="Batch-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Topic</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Topic"placeholder="Please enter Topic" required
                                        @if ($id) value="{{ $data->Topic }}" @else value="{{ old('Topic') }}" @endif><br>
                                    <label for="Topic" id="Topic-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Supervisor</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Supervisor"placeholder="Please enter Supervisor" required
                                        @if ($id) value="{{ $data->Supervisor }}" @else value="{{ old('Supervisor') }}" @endif><br>
                                    <label for="Supervisor" id="Supervisor-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="file"
                                        placeholder="Please browse image" accept=".jpeg,.jpg,.gif,.png"><br>


                                </div>


                                @if($id)

                                      <img src="{{ asset('uploads/dissertation/'.$data->file) }}" width="150"
                                    height="100" />
                                @endif

                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-sm-12 col-form-label">Image title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="image_title" @if($id) value="{{$data->image_title}}" @else {{old('image_title')}} @endif
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>

                                </div>
                            </div>


                            <input type="hidden"  @if($id) value="{{ $data->status }}" @else value="0" @endif name="status">


                            <div class="col-md-12">
                                <div class="col-sm-10">
                                    {{-- <button type="reset" class="btn btn-danger" class="form-control">Reset</button> --}}
                                    <button type="submit" class="btn btn-primary" onclick="load();"  class="form-control">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>

@endsection
