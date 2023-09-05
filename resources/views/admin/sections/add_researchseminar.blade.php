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
                                    action="{{ url('Accounts/add-edit-research-seminar/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-research-seminar') }}" enctype="multipart/form-data">
                            @endif

                            @csrf



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Speaker</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Speaker"placeholder="Please enter title" required
                                        @if ($id) value="{{ $data->Speaker }}" @else value="{{ old('Speaker') }}" @endif><br>
                                    <label for="Speaker" id="Speaker-error" class="error"></label>
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
                                <label for="inputText" class="col-form-label">Date</label>
                                <div class="">
                                    <input type="date" class="form-control"
                                        name="Date"placeholder="Please enter Date" required
                                        @if ($id) value="{{ $data->Date }}" @else value="{{ old('Date') }}" @endif><br>
                                    <label for="Date" id="Date-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Year</label>
                                <div class="">
                                    <input type="date" class="form-control"
                                        name="Year"placeholder="Please enter Year" required
                                        @if ($id) value="{{ $data->Year }}" @else value="{{ old('Year') }}" @endif><br>
                                    <label for="Year" id="Year-error" class="error"></label>
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
